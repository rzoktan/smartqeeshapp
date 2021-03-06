<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Plant.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Dimas Fauzan
 *  Date Created          : 26/03/2022
 *  Quots of the code     : Kadang susah kalo udah nyaman sama framework sebelah :D
 */
class Plant extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		login_check();
		$this->load->model('/Manajemen/M_plant', 'plant');
	}

	public function getsPlant()
	{
		try {
			$allData = $this->plant->getsPlantActive();

			echo json_encode($allData);
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}

	public function index()
	{
		$data['title'] 	= 'Smart Qeesh App';
		$data['page'] 		= 'Manajemen Plant';
		$data['subpage'] 	= 'Blank Page';
		$data['content'] 	= 'pages/manajemen/v_plant';
		$this->load->view('template', $data);
	}

	public function getDataTable()
	{
		echo json_encode($this->plant->get_datatables());
	}

	public function getById()
	{
		$id 	= $this->input->get('intIdPlant');
		$data 	= $this->plant->getById($id);
		if ($data != null) {
			echo json_encode([
				'code' 		=> 200,
				'status' 	=> true,
				'msg' 		=> 'Berhasil',
				'data' 		=> $data
			]);
		} else {
			echo json_encode([
				'code' 		=> 404,
				'status' 	=> true,
				'msg' 		=> 'Data Tidak Ditemukan !',
				'data' 		=> null
			]);
		}
	}


	public function simpan()
	{
		$dateNow = date("Y-m-d");
		$data = [
			"txtNamaPlant" 		=> strtoupper($this->input->post('txtNamaPlant')),
			"txtSingkatan" 		=> strtoupper($this->input->post('txtSingkatan')),
			"bitActive" 		=> $this->input->post('bitActive'),
			"intInsertedBy" 	=> $this->session->userdata('user_id'),
			"dtmInsertedDate" 	=> $dateNow
		];
		$this->plant->simpan($data);
		$response = [
			'code' 		=> 200,
			'status' 	=> true,
			'msg' 		=> 'Berhasil disimpan.',
			'data' 		=> "-"
		];
		echo json_encode($response);
	}

	public function update()
	{
		$dateNow 	= date("Y-m-d");
		$intIdPlant = $this->input->post('intIdPlant');
		$data = [
			"txtNamaPlant" 		=> strtoupper($this->input->post('txtNamaPlant')),
			"txtSingkatan" 		=> strtoupper($this->input->post('txtSingkatan')),
			"bitActive" 		=> $this->input->post('bitActive'),
			"intUpdatedBy" 		=> $this->session->userdata('user_id'),
			"dtmUpdatedDate" 	=> $dateNow
		];
		$this->plant->update($data, $intIdPlant);
		$response = [
			'code' 		=> 200,
			'status' 	=> true,
			'msg' 		=> 'Berhasil disimpan.',
			'data' 		=> "-"
		];
		echo json_encode($response);
	}

	// code by rz oktan 19/05/2022
	public function getData_v2()
	{
		if ($this->input->is_ajax_request()) {
			$data = $this->plant->getData_v2()->result_array();
			$response = [
				'code'    => 200,
				'status'  => true,
				'msg'     => 'Berhasil',
				'data'    => $data
			];
		} else {
			$response = [
				'code'    => 500,
				'status'  => false,
				'msg'     => 'Internal Server Error',
				'data'    => null
			];
		}
		echo json_encode($response);
	}
}
