<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JwbController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('JwbModel');
        if (!$this->session->has_userdata('sess_hr_id')) {
            redirect(base_url('login'));
        }
        if ($this->session->userdata('sess_hr_id') === '') {
            redirect(base_url('login'), 'refresh');
        }
    }
	
	public function index()
	{
		
        $data['title'] = 'Data Jawaban';
        $data['jawaban'] = $this->JwbModel->lihat();
       
		$this->load->view('backend/templates/header',$data);
		$this->load->view('backend/jwb/index',$data);
		$this->load->view('backend/templates/footer',$data);
	}
	public function ajaxGetOne($id){
		$data = $this->JwbModel->lihat_satu($id);
		echo json_encode($data);
	}
	public function tambah(){
    	if (isset($_POST['simpan'])){
			$jwb = $this->input->post('jwb');
			$data = array(
				'jwb_ket' => $jwb
			);
			$simpan = $this->JwbModel->tambah($data);
			if ($simpan > 0){
				$this->session->set_flashdata('alert', 'success_post');
				redirect('jwb');
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('jwb');
			}
		}
	}

	public function edit(){
    	if (isset($_POST['simpan'])){
			$jwb = $this->input->post('jwb');
			$id = $this->input->post('jwb_id');
			$data = array(
				'jwb_ket' => $jwb
			);
			$simpan = $this->JwbModel->update($id,$data);
			if ($simpan > 0){
				$this->session->set_flashdata('alert', 'success_post');
				redirect('jwb');
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('jwb');
			}
		}
	}

	public function hapus($id){
		$hapus = $this->JwbModel->hapus($id);
		if ($hapus > 0){
			$this->session->set_flashdata('alert', 'success_delete');
			redirect('jwb');
		}else{
			redirect('jwb');
		}
	}
}
