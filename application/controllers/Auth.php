<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Auth.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 27/01/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'user');
    }

    public function index()
    {
        redirect('auth/login');
    }

    public function login()
    {
        // code here...
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Auth';
        $data['content'] = 'pages/v_login';
        $this->load->view('template', $data);
    }

    public function process_login()
    {
        if ($this->input->is_ajax_request()) {
            $email_or_username = $this->input->post('email_or_username');
            $password = $this->input->post('password');
            $field = '`user`.user_id, `user`.`password`, `user`.role_id, `user`.is_active, mEmployee.intIdEmployee, mEmployee.txtNameEmployee as name, mEmployee.txtNikEmployee, mEmployee.txtEmail, mEmployee.intIdDepartment, mEmployee.intIdJabatan, isDefaultPassword';
            $contition = "user.username='" . $email_or_username . "'";
            $data_user = $this->user->get_user($field, $contition)->row_array();
			// var_dump($data_user);exit;
            if ($data_user != null) {
                // cek password
                if ($data_user['password'] === md5($password)) {
                    if ($data_user['is_active'] > 0) {
                        $session_login = [
                            'user_id' 			=> $data_user['user_id'],
                            'id_departemen' 	=> $data_user['intIdDepartment'],
                            'id_jabatan' 		=> $data_user['intIdJabatan'],
                            'nama_employee' 	=> $data_user['name'],
                            'id_employee' 		=> $data_user['intIdEmployee'],
                            'isDefaultPassword' => $data_user['isDefaultPassword'],
                        ];
                        $this->session->set_userdata($session_login);
                        $data_user = $session_login;
                        $data = [
                            'code' => 200,
                            'status' => true,
                            'msg' => 'Berhasil login.',
                            'data' => $data_user
                        ];
                    } else {
                        $data = [
                            'code' => 402,
                            'status' => false,
                            'msg' => 'Akun Belum Aktif.',
                            'data' => null
                        ];
                    }
                } else {
                    $data = [
                        'code' => 403,
                        'status' => false,
                        'msg' => 'Password salah.',
                        'data' => null
                    ];
                }
            } else {
                $data = [
                    'code' => 404,
                    'status' => false,
                    'msg' => 'Akun tidak ditemukan!',
                    'data' => $data_user
                ];
            }
        } else {
            $data = [
                'code' => 500,
                'status' => false,
                'msh' => 'Invalid request',
                'data' => null
            ];
        }
        echo json_encode($data);
    }

    public function registration()
    {
        // code here...
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Auth';
        $data['content'] = 'pages/v_registration';
        $this->load->view('template', $data);
    }

    public function process_registration()
    {
        if ($this->input->is_ajax_request()) {
            $curent_time = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
            $date = $curent_time->format('Y-m-d');
            $post_regist = $this->input->post();


            // data insert user detail
            $tbl = 'user_detail';
            $data_detail_user = [
                'nama'      	=> $post_regist['nama_user'],
                'email'     	=> $post_regist['email_user'],
                'divisi'    	=> "-",
                'jabatan'   	=> $post_regist['jabatan_user'],
                'id_departemen' => $post_regist['id_departemen'],
                'tlp'       	=> 62,
                'img'       	=> 'default.jpg'
            ];

            $id_detail_user = $this->user->insert_data($tbl, $data_detail_user);
            if (!$id_detail_user) {
                // error
                $data = [
                    'code' => 500,
                    'status' => false,
                    'msh' => 'Gagal insert data user detail.',
                    'data' => null
                ];
            } else {
                $tbl = 'user';
                $data_user_regist = [
                    'username'          => $post_regist['username'],
                    'password'          => md5($post_regist['password']),
                    'date_created'      => strtotime($date),
                    'role_id'           => 2,
                    'user_detail_id'    => $id_detail_user,
                    'is_active'         => 0
                ];
                $insert_user = $this->user->insert_data($tbl, $data_user_regist);
                if (!$insert_user) {
                    $data = [
                        'code' => 500,
                        'status' => false,
                        'msh' => 'Gagal insert data user.',
                        'data' => null
                    ];
                } else {
                    $data = [
                        'code' => 200,
                        'status' => true,
                        'msg' => 'Data registarsi berhasil di simpan.',
                        'data' => $post_regist['nama_user'],
                    ];
                }
            }
        } else {
            $data = [
                'code' => 500,
                'status' => false,
                'msh' => 'Invalid request',
                'data' => null
            ];
        }
        echo json_encode($data);
    }

	public function changePassword() {
		$data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Auth';
        $data['content'] = 'pages/v_change_pass';
        $this->load->view('template', $data);
	}

	public function change_my_password()
	{		
		if ($this->input->is_ajax_request()) {
			$password 	= $this->input->post('password');
			$id_user 	= $this->session->userdata('user_id');
			
			$where = [
				'user_id' => $id_user
			];
			$data_update = [
				'password' => md5($password),
				'isDefaultPassword' => 1
			];
			$update = $this->user->update_user_password($data_update, $where);
			if ($update["status"]) {
				$data = [
					'code' => 200,
					'status' => true,
					'msg' => $update["message"],
					'data' => null
				];
			} else {
				$data = [
					'code' => 500,
					'status' => false,
					'msg' => $update["message"],
					'data' => null
				];
			}
		} else {
            $data = [
                'code' => 500,
                'status' => false,
                'msg' => "Invalid Request",
                'data' => null
            ];
        }
        echo json_encode($data);
	}

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Berhasil Logout!</div>');
        redirect('Auth');
    }
}
