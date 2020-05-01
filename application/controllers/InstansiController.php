<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstansiController extends CI_Controller
{
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
			$version = $this->input->post('version');


			$config['upload_path'] = './assets/upload/logo/';
			$config['allowed_types'] = 'jpg|png|jpeg|JPEG|JPG|PNG';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('int_logo')) {
				$data = [
					'instansi_nama' => $nama,
					'instansi_alamat' => $alamat,
					'instansi_telepon' => $telepon,
					'instansi_email' => $email,
					'instansi_dinas' => $dinas,
					'instansi_versi_jwb' => $versi,
					'instansi_app_responden' => $this->input->post('app_responden'),
					'instansi_versi' => $version
				];

				$simpan = $this->ExtModel->edit_instansi($id, $data);
				if ($simpan > 0) {
					$this->session->set_flashdata('alert', 'success_versi');
					redirect('instansi');
				} else {
					$this->session->set_flashdata('alert', 'fail_edit');
					redirect('instansi');
				}
			} else {
				$logo = $this->upload->data('file_name');

				$data = [
					'instansi_nama' => $nama,
					'instansi_alamat' => $alamat,
					'instansi_telepon' => $telepon,
					'instansi_email' => $email,
					'instansi_dinas' => $dinas,
					'instansi_versi_jwb' => $versi,
					'instansi_app_responden' => $this->input->post('app_responden'),
					'instansi_versi' => $version,
					'instansi_logo' => $logo
				];

				$simpan = $this->ExtModel->edit_instansi($id, $data);
				if ($simpan > 0) {
					$this->session->set_flashdata('alert', 'success_versi');
					redirect('instansi');
				} else {
					$this->session->set_flashdata('alert', 'fail_edit');
					redirect('instansi');
				}
			}

		} else {
			$data['title'] = 'Instansi';
			$data['instansi'] = $this->ExtModel->getInstansi()->result_array();
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/instansi/index', $data);
			$this->load->view('backend/templates/footer', $data);
		}
	}

	public function copyright(){
		if (isset($_POST['edit'])){

			$config['upload_path'] = './assets/upload/kop/';
			$config['allowed_types'] = 'jpg|png|jpeg|JPEG|JPG|PNG';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('kop')) {

				$data = array(
					'cr_instansi' => $this->input->post('instansi'),
					'cr_alamat' => $this->input->post('alamat'),
					'cr_telepon' => $this->input->post('telepon'),
					'cr_email' => $this->input->post('email'),
					'cr_website' => $this->input->post('website'),
					'cr_no_surat' => $this->input->post('nosurat'),
					'cr_tgl_beli' => $this->input->post('tglbeli'),
					'cr_tgl_akhir_garansi' => $this->input->post('tglgaransi'),
					'cr_kelengkapan' => json_encode($this->input->post('kelengkapan')),
					'cr_ket_instansi' => json_encode($this->input->post('keterangan'))
				);

				$simpan = $this->ExtModel->update('cr_id',1,'hr_copyright',$data);
//				var_dump($data);exit();
				if ($simpan > 0) {
					$this->session->set_flashdata('alert', 'success_post');
					redirect('copyright');
				} else {
					$this->session->set_flashdata('alert', 'fail_edit');
					redirect('copyright');
				}
			}else{
				$kop = $this->upload->data('file_name');
				$data = array(
					'cr_kop' => $kop,
					'cr_instansi' => $this->input->post('instansi'),
					'cr_alamat' => $this->input->post('alamat'),
					'cr_telepon' => $this->input->post('telepon'),
					'cr_email' => $this->input->post('email'),
					'cr_website' => $this->input->post('website'),
					'cr_no_surat' => $this->input->post('nosurat'),
					'cr_tgl_beli' => $this->input->post('tglbeli'),
					'cr_tgl_akhir_garansi' => $this->input->post('tglgaransi'),
					'cr_kelengkapan' => json_encode($this->input->post('kelengkapan')),
					'cr_ket_instansi' => json_encode($this->input->post('keterangan'))
				);

				$simpan = $this->ExtModel->update('cr_id',1,'hr_copyright',$data);
				if ($simpan > 0) {
					$this->session->set_flashdata('alert', 'success_post');
					redirect('copyright');
				} else {
					$this->session->set_flashdata('alert', 'fail_edit');
					redirect('copyright');
				}
			}

//			var_dump(json_encode($this->input->post('keterangan')));
		}else{
			$data['title'] = 'Copyright';
			$data['cr'] = $this->ExtModel->getOneGlobal('cr_id',1,'hr_copyright');
			$data['kelengkapan'] = json_decode($data['cr']['cr_kelengkapan']);
			$data['keterangan'] = json_decode($data['cr']['cr_ket_instansi']);

			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/copyright/index', $data);
			$this->load->view('backend/templates/footer', $data);
		}
	}
}
