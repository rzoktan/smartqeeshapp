<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Activity.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Reki Maulid
 *  Date Created          : 28/03/2022
 *  Quots of the code     : sukses itu ketika running code pertama dan tidak ada error :D
 */

class Activity extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          login_check();
          $this->load->model("Manajemen/M_Activity", "activity");
          $this->load->model("Manajemen/M_department", "departemen");
          $this->load->model("Manajemen/M_section", "section");
     }

     public function index()
     {
          $data['title']           = 'Smart Qeesh App';
          $data['page']            = 'Manajemen';
          $data['subpage']         = 'Manajemen Activity';
          $data['content']         = 'pages/manajemen/v_activity';

          // $data["activities"]     	= $this->activity->getsActivityDepartment();
          $data["section"]		= $this->section->getSectionActive();
          $this->load->view('template', $data);
     }

	public function getDataTable()
	{
		echo json_encode($this->activity->get_datatables());
	}

     public function initiateData()
     {
          try {
               $data = [
                    "intIdActivity"     => 0,
                    "intIdDepartement"  => 0,
                    "txtNamaActivity"   => "",
                    "bitActive"         => true,
                    "intInsertedBy"     => 0,
                    "dtmInsertedDate"   => "",
                    "intUpdatedBy"      => 0,
                    "dtmUpdatedDate"    => ""
               ];

               echo json_encode($data);
          } catch (\Exception $e) {
               die($e->getMessage());
          }
     }

     public function getData()
     {
          try {
               $id = $this->input->post("id");

               $data = $this->activity->getActivity($id);

               echo json_encode($data);
          } catch (\Exception $e) {
               die($e->getMessage());
          }
     }

     public function saveData()
     {
          $data = $this->input->post("data");
          $parseData = json_decode($data, true);

          $validasi = $this->validasiSaveData($parseData);

          if ($validasi["status"]) {
               $id = $parseData["intIdActivity"];
               if ($id == 0) {
                    //CREATE
                    $parseData["intInsertedBy"]   = $this->session->userdata('user_id');
                    $parseData["dtmInsertedDate"] = date("Y-m-d");
                    $parseData["intUpdatedBy"]    = $this->session->userdata('user_id');
                    $parseData["dtmUpdatedDate"]  = date("Y-m-d");

                    $id = $this->activity->insertData($parseData);
                    $parseData["intIdActivity"] = $id;

                    $validasi["pesan"] = "Berhasil simpan";
               } else {
                    //UPDATE
                    $dataDB = $this->activity->getActivity($parseData["intIdActivity"]);

                    $parseData["intInsertedBy"]   = $dataDB["intInsertedBy"];
                    $parseData["dtmInsertedDate"] = $dataDB["dtmInsertedDate"];
                    $parseData["intUpdatedBy"]    = $this->session->userdata('user_id');
                    $parseData["dtmUpdatedDate"]  = date("Y-m-d");

                    $validasi["pesan"] = "Berhasil simpan perubahan";

                    $this->activity->updateData($parseData, $parseData["intIdActivity"]);
               }
          }

          $response = [
               'code'    => $validasi["code"],
               'status'  => $validasi["status"],
               'msg'     => $validasi["pesan"],
               'data'    => $parseData
          ];

          echo json_encode($response);
     }

     private function validasiSaveData($data)
     {
          if ($data["intIdActivity"] == null) {
               $pesan = "ID Activity tidak boleh kosong";
          } elseif ($data["intIdDepartement"] == null || $data["intIdDepartement"] == 0) {
               $pesan = "Department tidak boleh kosong";
          } elseif ($data["txtNamaActivity"] == null) {
               $pesan = "Nama Activity tidak boleh kosong";
          } else {
               $pesan = "";
          }

          if ($data["intIdActivity"] == 0) {
               //CREATE
               $validasi = $this->activity->validateDepartmentActivity($data["intIdDepartement"], $data["txtNamaActivity"]);

               if ($validasi != null) {
                    $pesan = "Nama Activity sudah tersedia di department tersebut, silahkan gunakan nama lain";
               }
          } else {
               //UPDATE
               $dataDB = $this->activity->getActivity($data["intIdActivity"]);
               if ($dataDB["intIdDepartement"] == $data["intIdDepartement"]) {
                    //JIKA SECTION TIDAK BERUBAH
                    if ($dataDB["txtNamaActivity"] != $data["txtNamaActivity"]) {
                         $validasi = $this->activity->validateDepartmentActivity($data["intIdDepartement"], $data["txtNamaActivity"]);

                         if ($validasi != null) {
                              $pesan = "Nama Activity sudah tersedia di department tersebut, silahkan gunakan nama lain";
                         }
                    }
               } else {
                    $validasi = $this->activity->validateDepartmentActivity($data["intIdDepartement"], $data["txtNamaActivity"]);

                    if ($validasi != null) {
                         $pesan = "Nama Activity sudah tersedia di department tersebut, silahkan gunakan nama lain";
                    }
               }
          }

          if ($pesan == "") {
               $status = true;
               $code = 200;
          } else {
               $status = false;
               $code = 400;
          }

          $returnData = [
               "status"  => $status,
               "pesan"   => $pesan,
               "code"    => $code
          ];

          return $returnData;
     }

     public function getActivityBySection()
     {
          $id                = $this->input->get('id');
          $data_dept      = $this->activity->getActivityBySection($id);
          $opt           = '<option value ="">Silahkan Pilih Activity</option>';
          if (!empty($data_dept)) {
               foreach ($data_dept as $item) {
                    $opt .= '<option value="' . $item["intIdActivity"] . '"> ' . $item["txtNamaActivity"] . '</option>';
               }
          }
          $response = [
               'code'    => 200,
               'status'  => "OK",
               'msg'     => "OK",
               'data'    => $opt
          ];

          echo json_encode($response);
     }

     public function getActivityByDepartemen()
     {
          $data_dept      = $this->activity->getActivityBySection($this->session->userdata('id_departemen'));
          $opt           = '';
          if (!empty($data_dept)) {
               foreach ($data_dept as $item) {
                    $opt .= '<option value="' . $item["txtNamaActivity"] . '"></option>';
               }
          }
          $response = [
               'code'    => 200,
               'status'  => "OK",
               'msg'     => "OK",
               'data'    => $opt
          ];

          echo json_encode($response);
     }
}
