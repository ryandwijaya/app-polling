<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor4Controller extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $model = ['ExtModel','LynModel','PtnModel','JwbModel','SettingModel','RespondenModel','Monitor4Model'];
        $this->load->model($model);
    }
	
	public function index($id)
	{
		$data['setting'] = $this->SettingModel->lihat_satu($this->session->userdata('sess_hr_lyn'));
		$data['instansi'] = $this->ExtModel->getInstansi()->row_array();
        $data['title'] = 'Layar Monitor';
        $data['ptn'] = $this->Monitor4Model->getPtn();
       	// echo '<pre>';
        // var_dump($data['jwb']);exit();

        $this->load->view('frontend/templates/header',$data);
        $this->load->view('frontend/monitor4/index',$data);
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

            $simpan = $this->ExtModel->insert('hr_responden',$responden);
            if ($simpan > 0){
                $responden = $this->RespondenModel->getRespondenByData($nama,$umur,$jk,$pendidikan);
                $id =  $responden['responden_id'];
                
                $set_monitor = [
                    'mnt3_responden' => $id
                ];
                $this->ExtModel->insert('hr_monitor3',$set_monitor);

                redirect('monitor4/'.$id);
            } else {
                $this->session->set_flashdata('alert', 'fail_edit');
                redirect('mntr4/step1');
            }
        }else{
            $data['title'] = 'Layar Monitor';
            $data['setting'] = $this->SettingModel->lihat_satu($this->session->userdata('sess_hr_lyn'));
            $data['instansi'] = $this->ExtModel->getInstansi()->row_array();
            $this->load->view('frontend/templates/header',$data);
            $this->load->view('frontend/monitor4/step1',$data);
            $this->load->view('frontend/templates/footer',$data);
        }
    }


	
	public function ajaxInsert($ptn,$jwb,$responden){
    	if ($jwb == 'A') {
            $data = array(
                'kpsn4_responden' => $responden,
                'kpsn4_ptn' => $ptn,
                'kpsn4_A' => '1'
            );
        }
        else if($jwb == 'B'){
            $data = array(
                'kpsn4_responden' => $responden,
                'kpsn4_ptn' => $ptn,
                'kpsn4_B' => '1'
            );
        }
        else if($jwb == 'C'){
            $data = array(
                'kpsn4_responden' => $responden,
                'kpsn4_ptn' => $ptn,
                'kpsn4_C' => '1'
            );
        }
        else if($jwb == 'D'){
            $data = array(
                'kpsn4_responden' => $responden,
                'kpsn4_ptn' => $ptn,
                'kpsn4_D' => '1'
            );
        }
			// $data = array(
			// 	'kpsn4_responden' => $responden,
   //              'kpsn4_ptn' => $ptn,
   //              'kpsn4_jwb' => $jwb
			// );
			$simpan = $this->ExtModel->insert('hr_kpsn4',$data);
			if ($simpan > 0){
				echo 'success post';
			} else {
				echo 'fail post';
			}
			echo json_encode($data);
		
	}

	

	
}
