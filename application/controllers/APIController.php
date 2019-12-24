<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class APIController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $model = ['ExtModel','LynModel','PtnModel','SettingModel','JwbModel','UsrModel'];
        $this->load->model($model);
    }

    public function apiLayanan()
    {
        $data = $this->LynModel->lihat();
        if ($data) {
        echo json_encode(array('kode'=> 1,'result' => $data));    
        }else{
            echo json_encode(array('kode'=> 2,'pesan' => 'data tidak ditemukan'));
        }
        
    }
    public function apiPertanyaan()
    {
        $data = $this->PtnModel->lihat();
        if ($data) {
        echo json_encode(array('kode'=> 1,'result' => $data));    
        }else{
            echo json_encode(array('kode'=> 2,'pesan' => 'data tidak ditemukan'));
        }
        
    }
    public function apiKpsn()
    {
        $data = $this->ExtModel->getKpsn();
        if ($data) {
        echo json_encode(array('kode'=> 1,'result' => $data));    
        }else{
            echo json_encode(array('kode'=> 2,'pesan' => 'data tidak ditemukan'));
        }
        
    }
    public function apiResponden()
    {
        $data = $this->ExtModel->getResponden();
        if ($data) {
        echo json_encode(array('kode'=> 1,'result' => $data));    
        }else{
            echo json_encode(array('kode'=> 2,'pesan' => 'data tidak ditemukan'));
        }
        
    }
    public function apiJawaban()
    {
        $data = $this->JwbModel->lihat();
        if ($data) {
        echo json_encode(array('kode'=> 1,'result' => $data));    
        }else{
            echo json_encode(array('kode'=> 2,'pesan' => 'data tidak ditemukan'));
        }
        
    }
     public function apiInstansi()
    {
        $data = $this->ExtModel->getInstansi()->result_array();
        if ($data) {
        echo json_encode(array('kode'=> 1,'result' => $data));    
        }else{
            echo json_encode(array('kode'=> 2,'pesan' => 'data tidak ditemukan'));
        }
        
    }
    public function apiUser()
    {
        $data = $this->UsrModel->lihat();
        if ($data) {
        echo json_encode(array('kode'=> 1,'hasil' => $data));    
        }else{
            echo json_encode(array('kode'=> 2,'pesan' => 'data tidak ditemukan'));
        }
        
    }
    public function insertTerhubung()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $petugas = $_POST['kpsn_petugas'];
            $pertanyaan = $_POST['kpsn_ptn'];
            $layanan = $_POST['kpsn_lynn'];
            $jawaban = $_POST['kpsn_jwb'];
            $keluhan = $_POST['kpsn_klhn'];

            $dataTerhubung = array(
                'kpsn_petugas' => $petugas,
                'kpsn_ptn' => $pertanyaan,
                'kpsn_lynn' => $layanan,
                'kpsn_jwb' => $jawaban,
                'kpsn_klhn' => $keluhan
            );

            $save = $this->ExtModel->insert("hr_kpsn",$dataTerhubung);

            if ($save > 0) {
                echo json_encode(array('kode' => 1, 'pesan' => 'berhasil menambah data'));
            }
            else{
                echo json_encode(array('kode' => 2, 'pesan' => 'data gagal ditambahkan'));
            }
        }
        else{
            echo json_encode(array('kode' => 101, 'pesan' => 'request tidak valid'));
        }
    }
	
}
