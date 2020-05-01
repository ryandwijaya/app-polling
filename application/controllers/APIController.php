<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class APIController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $model = ['ExtModel','LynModel','PtnModel','SettingModel','JwbModel','UsrModel','Monitor3Model','Monitor4Model'];
        $this->load->model($model);  //load model yang dibutuh kan
    }

    public function apiLayanan() //menyediakan data layanan aplikasi app-polling
    {
        $data = $this->LynModel->lihat();
        if ($data) {
        echo json_encode(array('kode'=> 1,'result' => $data));    
        }else{
            echo json_encode(array('kode'=> 2,'pesan' => 'data tidak ditemukan'));
        }
        
    }
    public function apiPertanyaan() // menyediakan data pertanyaan aplkasi app-polling
    {
        $data = $this->PtnModel->lihat();
        if ($data) {
        echo json_encode(array('kode'=> 1,'result' => $data));    
        }else{
            echo json_encode(array('kode'=> 2,'pesan' => 'data tidak ditemukan'));
        }
        
    }
    public function apiKpsn() // menyediakan data votes atau jumpah polling aplikasi app-polling
    {
        $data = $this->ExtModel->getKpsn();
        if ($data) {
        echo json_encode(array('kode'=> 1,'result' => $data));    
        }else{
            echo json_encode(array('kode'=> 2,'pesan' => 'data tidak ditemukan'));
        }
        
    }
    public function apiResponden() //menyediakan data responden aplikasi app-polling
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

    public function apiSetAndroid() // menyediakan data pengaturan android
    {
        $data = $this->ExtModel->getGlobal('hr_set_android');
        // $data_api = [
        //     'jam' => json_decode($data[0]['andro_jam']),
        //     'ptn' => json_decode($data[0]['andro_ptn']),
        //     'judul' => json_decode($data[0]['andro_judul']),
        //     'alamat' => json_decode($data[0]['andro_alamat']),
        //     'text' => json_decode($data[0]['andro_text'])
        // ];
        if ($data) {
        echo json_encode(array('kode'=> 1,'setting' => $data));    
        }else{
            echo json_encode(array('kode'=> 2,'pesan' => 'data tidak ditemukan'));
        }
        
    }
    public function apiUser() //menyediakan data user app-polling
    {
        $data = $this->UsrModel->lihat();
        if ($data) {
        echo json_encode(array('kode'=> 1,'hasil' => $data));    
        }else{
            echo json_encode(array('kode'=> 2,'pesan' => 'data tidak ditemukan'));
        }
        
    }
    public function insertTerhubung() // memasukkan data dari android ke app-polling
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
	public function ajaxGetMonitor3(){
		$array_persen = array();
		$date_now = date('Y-m-d');
		for ($i = 0 ; $i <15 ; $i++ ){
			$totalA = $this->Monitor3Model->getAllJwbKetNow('mnt3_jwb'.$i, 'A',$date_now);
			$totalB = $this->Monitor3Model->getAllJwbKetNow('mnt3_jwb'.$i, 'B',$date_now);
			$totalC = $this->Monitor3Model->getAllJwbKetNow('mnt3_jwb'.$i, 'C',$date_now);
			$totalD = $this->Monitor3Model->getAllJwbKetNow('mnt3_jwb'.$i, 'D',$date_now);

			$persenA = $totalA*0;
			$persenB = $totalB*33.3;
			$persenC = $totalC*66.6;
			$persenD = $totalD*100;

			$persentase = round((($persenB+$persenC+$persenD)/(100*($totalA+$totalC+$totalB+$totalD)))*100 , 1 );
			array_push($array_persen, $persentase);
		}

		$data['array_persen'] = $array_persen;
//		$data['all'] = $this->Monitor3Model->getVotesNow();
		echo json_encode($data);
	}
	public function ajaxGetMonitor4(){
		$data['ptn']= $this->Monitor4Model->getPtn();
		$data['votes'] = $this->Monitor4Model->getVotesNow();
		echo json_encode($data);
	}
	public function ajaxPostKpsn($id,$loket){
		$data_post = array(
			'kpsn_petugas' => $this->session->userdata('sess_hr_id'),
			'kpsn_ptn' => 5,
			'kpsn_lynn' => $loket,
			'kpsn_jwb' => $id

		);
		$simpan = $this->ExtModel->insert('hr_kpsn',$data_post);
		if ($simpan>0){
			echo 'Berhasil';
		}else{
			echo 'Gagal';
		}
	}
	
}
