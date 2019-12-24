<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PtnController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('PtnModel');
        if (!$this->session->has_userdata('sess_hr_id')) {
            redirect(base_url('login'));
        }
        if ($this->session->userdata('sess_hr_id') === '') {
            redirect(base_url('login'), 'refresh');
        }
    }
	
	public function index()
	{
		
        $data['title'] = 'Data Pertanyaan';
        $data['pertanyaan'] = $this->PtnModel->lihat();
       
		$this->load->view('backend/templates/header',$data);
		$this->load->view('backend/ptn/index',$data);
		$this->load->view('backend/templates/footer',$data);
	}
	public function ajaxGetOne($id){
		$data = $this->PtnModel->lihat_satu($id);
		echo json_encode($data);
	}
	public function tambah(){
    	if (isset($_POST['simpan'])){
			$ptn = $this->input->post('ptn');
			$data = array(
				'ptn_txt' => $ptn,
				'ptn_crtd_by' => 1
			);
			$simpan = $this->PtnModel->tambah($data);
			if ($simpan > 0){
				$this->session->set_flashdata('alert', 'success_post');
				redirect('ptn');
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('ptn');
			}
		}
	}

	public function edit(){
    	if (isset($_POST['simpan'])){
			$ptn = $this->input->post('ptn');
			$id = $this->input->post('ptn_id');
			$data = array(
				'ptn_txt' => $ptn,
				'ptn_crtd_by' => 1
			);
			$simpan = $this->PtnModel->update($id,$data);
			if ($simpan > 0){
				$this->session->set_flashdata('alert', 'success_post');
				redirect('ptn');
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('ptn');
			}
		}
	}

	public function hapus($id){
		$hapus = $this->PtnModel->hapus($id);
		if ($hapus > 0){
			$this->session->set_flashdata('alert', 'success_delete');
			redirect('ptn');
		}else{
			redirect('ptn');
		}
	}
}
