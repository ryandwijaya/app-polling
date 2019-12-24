<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsrController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $model = ['UsrModel','LynModel'];
        $this->load->model($model);

        if (!$this->session->has_userdata('sess_hr_id')) {
            redirect(base_url('login'));
        }
        if ($this->session->userdata('sess_hr_id') === '') {
            redirect(base_url('login'), 'refresh');
        }
    }
	
	public function index()
	{
		
        $data['title'] = 'Data User';
        $data['user'] = $this->UsrModel->lihat();
        $data['layanan'] = $this->LynModel->lihat();
       
		$this->load->view('backend/templates/header',$data);
		$this->load->view('backend/usr/index',$data);
		$this->load->view('backend/templates/footer',$data);
	}
	public function ajaxGetOne($id){
		$data = $this->UsrModel->lihat_satu($id);
		echo json_encode($data);
	}
	public function tambah(){
    	if (isset($_POST['simpan'])){
			$nm = $this->input->post('nm');
			$pw = $this->input->post('pw');
			$usrnm = $this->input->post('usrnm');
			$lvl = 'admin';
			$data = array(
				'usr_nm' => $nm,
				'usr_usrnm' => $usrnm,
				'usr_pw' => password_hash($pw, PASSWORD_DEFAULT),
				'usr_lvl' => $lvl
			);

			// var_dump(password_hash($pw, PASSWORD_DEFAULT));
			// exit();
			$simpan = $this->UsrModel->tambah($data);
			if ($simpan > 0){
				$this->session->set_flashdata('alert', 'success_post');
				redirect('user');
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('user');
			}
		}
	}

	

	public function hapus($id){
		$hapus = $this->UsrModel->hapus($id);
		if ($hapus > 0){
			$this->session->set_flashdata('alert', 'success_delete');
			redirect('user');
		}else{
			redirect('user');
		}
	}
}
