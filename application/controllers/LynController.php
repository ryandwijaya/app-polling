<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LynController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('LynModel');
        if (!$this->session->has_userdata('sess_hr_id')) {
            redirect(base_url('login'));
        }
        if ($this->session->userdata('sess_hr_id') === '') {
            redirect(base_url('login'), 'refresh');
        }
    }
	
	public function index()
	{
		
        $data['title'] = 'Data Layanan';
        $data['layanan'] = $this->LynModel->lihat();
       
		$this->load->view('backend/templates/header',$data);
		$this->load->view('backend/lynn/index',$data);
		$this->load->view('backend/templates/footer',$data);
	}

	public function ajaxGetOne($id){
		$data = $this->LynModel->lihat_satu($id);
		echo json_encode($data);
	}
	
	public function tambah(){
    	if (isset($_POST['simpan'])){
			$lyn = $this->input->post('lyn');
			$data = array(
				'lynn_nm' => $lyn
			);
			$simpan = $this->LynModel->tambah($data);
			if ($simpan > 0){
				$this->session->set_flashdata('alert', 'success_post');
				redirect('layanan');
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('layanan');
			}
		}
	}

	public function edit(){
    	if (isset($_POST['simpan'])){
			$lyn = $this->input->post('lynn');
			$id = $this->input->post('lynn_id');
			$data = array(
				'lynn_nm' => $lyn
			);
			$simpan = $this->LynModel->update($id,$data);
			if ($simpan > 0){
				$this->session->set_flashdata('alert', 'success_edit');
				redirect('layanan');
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('layanan');
			}
		}
	}

	public function hapus($id){
		if($id != 5){
			$hapus = $this->LynModel->hapus($id);
			if ($hapus > 0){
				$this->session->set_flashdata('alert', 'success_delete');
				redirect('layanan');
			}else{
				redirect('layanan');
			}
		}else{
			$this->session->set_flashdata('alert', 'cannot_delete');
			redirect('layanan');
		}
	}
}
