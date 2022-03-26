<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Department.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Reki Maulid
 *  Date Created          : 26/03/2022
 *  Quots of the code     : sukses itu ketika running code pertama dan tidak ada error :D
 */
class Department extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          login_check();
          $this->load->model("Manajemen/M_department", "department");
     }

     public function index()
     {
          $data['title']      = 'Smart Qeesh App';
          $data['page']       = 'Manajemen';
          $data['subpage']    = 'Manajemen Department';
          $data['content']    = 'pages/manajemen/v_department';
          $this->load->view('template', $data);
     }

     public function initiateData()
     {
          try {
               $data = [
                    "intIdDepartement"       => 0,
                    "intIdPlant"             => 0,
                    "txtNamaDepartement"     => "",
                    "bitActive"              => true,
                    "intInsertedBy"          => 0,
                    "dtmInsertedDate"        => "",
                    "intUpdatedBy"           => 0,
                    "dtmUpdatedDate"         => ""
               ];

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
               $parseData["txtNamaDepartement"] = strtoupper($parseData["txtNamaDepartement"]);
               $departmentID = $parseData["intIdDepartement"];
               if ($departmentID == 0) {
                    //CREATE
                    $parseData["intInsertedBy"]   = $this->session->userdata('user_id');
                    $parseData["dtmInsertedDate"] = date("Y-m-d");
                    $parseData["intUpdatedBy"]    = $this->session->userdata('user_id');
                    $parseData["dtmUpdatedDate"]  = date("Y-m-d");

                    $this->department->insertData($parseData);
               } else {
                    //UPDATE
                    $parseData["intUpdatedBy"]    = $this->session->userdata('user_id');
                    $parseData["dtmUpdatedDate"]  = date("Y-m-d");
               }

               echo json_encode($parseData);
          } else {
               echo json_encode($validasi);
          }
     }

     private function validasiSaveData($data)
     {
          if ($data["intIdDepartement"] == null) {
               $pesan = "ID Department tidak boleh kosong";
          } elseif ($data["intIdPlant"] == null || $data["intIdPlant"] == 0) {
               $pesan = "Plant tidak boleh kosong";
          } elseif ($data["txtNamaDepartement"] == null) {
               $pesan = "Nama Department tidak boleh kosong";
          } else {
               $pesan = "";
          }

          if ($data["intIdDepartement"] == 0) {
               //CREATE
               $validasiIdPlantNamaDepartment = $this->department->validatePlantNamaDepartment($data["intIdPlant"], $data["txtNamaDepartement"]);

               if ($validasiIdPlantNamaDepartment != null) {
                    $pesan = "Nama Department sudah tersedia, silahkan gunakan nama lain";
               }
          } else {
               //UPDATE
          }

          if ($pesan == "") {
               $status = true;
          } else {
               $status = false;
          }

          $returnData = [
               "status"  => $status,
               "pesan"   => $pesan
          ];

          return $returnData;
     }
}