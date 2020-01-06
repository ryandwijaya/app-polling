<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstansiController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('ExtModel');
        if (!$this->session->has_userdata('sess_hr_id')) {
            redirect(base_url('login'));
        }
        if ($this->session->userdata('sess_hr_id') === '') {
            redirect(base_url('login'), 'refresh');
        }
    }
	
	public function index()
	{
			
		if (isset($_POST['edit'])) {
			$id = $this->input->post('int_id');
			$nama = $this->input->post('int_nm'); 	
			$alamat = $this->input->post('int_almt'); 	
			$telepon = $this->input->post('int_tlp'); 	
			$email = $this->input->post('int_email');
			$dinas = $this->input->post('int_dns');
			$versi = $this->input->post('int_versi');


			$config['upload_path'] = './assets/upload/logo/';
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|JPG|PNG';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('int_logo')) {
               $data  = [
			    'instansi_nama' => $nama, 
			    'instansi_alamat' => $alamat, 
			    'instansi_telepon' => $telepon, 
			    'instansi_email' => $email,
			    'instansi_dinas' => $dinas,
			    'instansi_versi_jwb' => $versi
				];

                $simpan = $this->ExtModel->edit_instansi($id,$data);
				if ($simpan > 0){
					$this->session->set_flashdata('alert', 'success_edit');
					redirect('instansi');
				} else {
					$this->session->set_flashdata('alert', 'fail_edit');
					redirect('instansi');
				}
            } else {
                $logo = $this->upload->data('file_name');

                $data  = [
			    'instansi_nama' => $nama, 
			    'instansi_alamat' => $alamat, 
			    'instansi_telepon' => $telepon, 
			    'instansi_email' => $email,
			    'instansi_dinas' => $dinas,
			    'instansi_versi_jwb' => $versi,
			    'instansi_logo' => $logo
				];

                $simpan = $this->ExtModel->edit_instansi($id,$data);
				if ($simpan > 0){
					$this->session->set_flashdata('alert', 'success_post');
					redirect('instansi');
				} else {
					$this->session->set_flashdata('alert', 'fail_edit');
					redirect('instansi');
				}
            }

		}else{
        $data['title'] = 'Instansi';
        $data['instansi'] = $this->ExtModel->getInstansi()->result_array();
		$this->load->view('backend/templates/header',$data);
		$this->load->view('backend/instansi/index',$data);
		$this->load->view('backend/templates/footer',$data);
		}
	}
}
