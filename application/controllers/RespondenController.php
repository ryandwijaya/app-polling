<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RespondenController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('RespondenModel');
        $this->load->model('LynModel');
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
		if (isset($_POST['lihat'])) {
			$tgl_start = $this->input->post('tgl_start');
			$tgl_end = $this->input->post('tgl_end');
			$lyn = $this->input->post('lyn');
			$versi = $this->session->userdata('sess_hr_versi');
	        $data['title'] = 'Data Responden';
			$instansi = $data['instansi'];
			$data['instansi'] = $this->ExtModel->getInstansi()->row_array();

			$data['lynn'] = $this->LynModel->lihat();
			$data['layananCurrent'] = $this->LynModel->lihat_satu($lyn);
			if ($instansi['instansi_versi_jwb'] == 'monitor3'){
				$data['kpsn'] = $this->RespondenModel->Monitor3ByDate($tgl_start,$tgl_end);
				$this->load->view('backend/templates/header',$data);
				$this->load->view('backend/responden/index',$data);
				$this->load->view('backend/templates/footer',$data);

			}else if ($instansi['instansi_versi_jwb'] =='monitor4'){
				$data['kpsn']= $this->RespondenModel->Monitor4ByDate($tgl_start,$tgl_end);
				$this->load->view('backend/templates/header',$data);
				$this->load->view('backend/responden/index',$data);
				$this->load->view('backend/templates/footer',$data);
			}else {
				$data['kpsn'] = $this->RespondenModel->lihatByDate($tgl_start,$tgl_end,$lyn,$versi);
				$this->load->view('backend/templates/header',$data);
				$this->load->view('backend/responden/index',$data);
				$this->load->view('backend/templates/footer',$data);
			}

			
		}else{
			$tgl_start = date('Y-m-d');
			$versi = $this->session->userdata('sess_hr_versi');
			$lyn = $this->session->userdata('sess_hr_lyn');
	        $data['title'] = 'Data Responden';
			if ($this->session->userdata('sess_hr_versi')=='monitor3'){
				$data['kpsn'] = $this->RespondenModel->Monitor3ByDate($tgl_start,$tgl_start);
			}else if ($this->session->userdata('sess_hr_versi')=='monitor4'){
				$data['kpsn'] = $this->RespondenModel->Monitor4ByDate($tgl_start,$tgl_start);
			}else{
				$data['kpsn'] = $this->RespondenModel->lihatByDate($tgl_start,$tgl_start,$lyn,$versi);
			}

	        $data['lynn'] = $this->LynModel->lihat();
	        $data['layananCurrent'] = $this->LynModel->lihat_satu($lyn);
	        $data['instansi'] = $this->ExtModel->getInstansi()->row_array();
			$this->load->view('backend/templates/header',$data);
			$this->load->view('backend/responden/index',$data);
			$this->load->view('backend/templates/footer',$data);
		}
	}
	
}
