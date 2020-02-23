<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor3Controller extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $model = ['ExtModel','LynModel','PtnModel','JwbModel','SettingModel','RespondenModel'];
        $this->load->model($model);
    }
	
	public function index($id)
	{
		
        $data['instansi'] = $this->ExtModel->getInstansi()->row_array();
		$data['setting'] = $this->SettingModel->lihat_satu($this->session->userdata('sess_hr_lyn'));
        $data['title'] = 'Layar Monitor';
        $data['ptn'] = 
        [   "Bagaimana pemahaman Saudara tentang prosedur pelayanandi unit ini?",
            "Bagaimana pendapat saudara tentang kesamaan persyaratan pelayanan dengan jenis pelayanan?",
            "Bagaimana pendapat Saudara tentang kejelasan dan kepastian petugas yang melayanai?",
            "Bagaimana pendapat Saudara tentang kedisiplinan petugas dalam memberikan pelayanan?",
            "Bagaimana pendapat Saudara tentang tanggung jawab petugas dalam memberikan pelayanan?",
            "Bagaimana pendapat Saudara tentang kemampuan petugas dalam memberikan pelayanan?",
            "Bagaimana pendapat Saudara tentang kecepatan pelayanan di unit ini?",
            "Bagaimana pendapat Saudara tentang keadilan untuk mendapatkan pelayanan disini?",
            "Bagaimana pendapat Saudara tentang kesopanan dan keramahan petugas dalam memberikan pelayanan?",
            "Bagaimana pendapat Saudara tentang kewajaran biaya untuk mendapatkan pelayanan?",
            "Bagaimana pendapat Saudara tentang kesesuaian antara biaya yang dibayarkan dengan yang telah di tetapkan?",
            "Bagaimana pendapat Saudara tentang ketetapan pelaksanaan terhadap jadwal waktu pelayanan?",
            "Bagaimana pendapat Saudara tentang kenyamanan di lingkungan unit pelayanan?",
            "Bagaimana pendapat Saudara tentang keamanan pelayanan di unit ini?",
            "Puaskan anda dengan pelayanan di sini?"
        ];
        $jwb1  = ['Tidak Mudah','Kurang Mudah','Mudah','Sangat Mudah'];
        $jwb2  = ['Tidak Sesuai','Kurang Sesuai','Sesuai','Sangat Sesuai'];
        $jwb3  = ['Tidak Jelas','Kurang Jelas','Jelas','Sangat Jelas'];
        $jwb4  = ['Tidak Disiplin','Kurang Disiplin','Disiplin','Sangat Disiplin'];
        $jwb5  = ['Tidak Tanggung Jawab','Kurang Tanggung Jawab','Tanggung Jawab','Sangat Tanggung Jawab'];
        $jwb6  = ['Tidak Mampu','Kurang Mampu','Mampu','Sangat Mampu'];
        $jwb7  = ['Tidak Cepat','Kurang Cepat','Cepat','Sangat Cepat'];
        $jwb8  = ['Tidak Adil','Kurang Adil','Adil','Sangat Adil'];
        $jwb9  = ['Tidak Sopan dan Ramah','Kurang Sopan dan Ramah','Sopan dan Ramah','Sangat Sopan dan Ramah'];
        $jwb10  = ['Tidak Wajar','Kurang Wajar','Wajar','Sangat Wajar'];
        $jwb11  = ['Selalu Tidak Sesuai','Kadang Kadang Sesuai','Banyak Sesuainya','Selalu Sesuai'];
        $jwb12  = ['Selalu Tidak Tepat','Kadang Kadang Tepat','Banyak Tepatnya','Selalu Tepat'];
        $jwb13  = ['Tidak Nyaman','Kurang Nyaman','Nyaman','Sangat Nyaman'];
        $jwb14  = ['Tidak Aman','Kurang Aman','Aman','Sangat Aman'];
        $jwb15  = ['Tidak Puas','Kurang Puas','Puas','Sangat Puas'];

        $data['jwb'] = [
            1 =>  $jwb1,
            2 =>  $jwb2,
            3 =>  $jwb3,
            4 =>  $jwb4,
            5 =>  $jwb5,
            6 =>  $jwb6,
            7 =>  $jwb7,
            8 =>  $jwb8,
            9 =>  $jwb9,
            10 =>  $jwb10,
            11 =>  $jwb11,
            12 =>  $jwb12,
            13 =>  $jwb13,
            14 =>  $jwb14,
            15 =>  $jwb15
        ];
       	// echo '<pre>';
        // var_dump($data['jwb']);exit();

        $this->load->view('frontend/templates/header',$data);
        $this->load->view('frontend/monitor3/styles',$data);
        $this->load->view('frontend/monitor3/index',$data);
        $this->load->view('frontend/templates/footer',$data);
	}
	public function step1(){
        if (isset($_POST['lanjut'])) {
    		$no_responden = $this->input->post('no_responden');
    		$nama = $this->input->post('nama');
    		$umur = $this->input->post('umur');
    		$jk = $this->input->post('jk');
    		$pendidikan = $this->input->post('pendidikan');
    		$pekerjaan = $this->input->post('pekerjaan');

    		$responden = [
    		    'responden_no' => $no_responden, 
    		    'responden_nama' => $nama, 
    		    'responden_umur' => $umur, 
    		    'responden_jk' => $jk, 
    		    'responden_pendidikan' => $pendidikan, 
    		    'responden_pekerjaan' => $pekerjaan
    		];
            // var_dump($responden);exit();

    		$simpan = $this->ExtModel->insert('hr_responden',$responden);
    		if ($simpan > 0){
//    			$responden = $this->RespondenModel->getRespondenByData($nama,$umur,$jk,$pendidikan);
				$id_responden = $this->db->insert_id();

				$vote_monitor = [
					'mnt3_responden' => $id_responden
				];
				$simpan_vote = $this->ExtModel->insert('hr_monitor3',$vote_monitor);
//				var_dump($this->db->insert_id());exit();
				$id_vote = $this->db->insert_id();

				redirect('monitor3/'.$id_vote);
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('mntr3/step1');
			}
    	}else{
        	$data['title'] = 'Layar Monitor';
            $data['setting'] = $this->SettingModel->lihat_satu($this->session->userdata('sess_hr_lyn'));
            $data['instansi'] = $this->ExtModel->getInstansi()->row_array();
        	$this->load->view('frontend/templates/header',$data);
        	$this->load->view('frontend/monitor3/step1',$data);
        	 $this->load->view('frontend/templates/footer',$data);
    	}
	}

	
	public function ajaxUpdate($id,$field,$jwb){
    	
			$data = array(
				'mnt3_'.$field => $jwb
			);
			$simpan = $this->ExtModel->update('mnt3_id',$id,'hr_monitor3',$data);
			if ($simpan > 0){
				echo 'success edit';
			} else {
				echo 'fail edit';
			}
			echo json_encode($data);
		
	}

	public function ajaxReset($id){
		$get_responden = $this->RespondenModel->getOneVote($id);
		$id_responden = $get_responden['mnt3_responden'];

		$hapus = $this->ExtModel->hapus('mnt3_id',$id,'hr_monitor3');

		if ($hapus > 0){
			$hapus_respoden = $this->ExtModel->hapus('responden_id',$id_responden,'hr_responden');
			redirect('mntr3/step1');
		}else{
			return 'Error !!';
		}
	}

	

	
}
