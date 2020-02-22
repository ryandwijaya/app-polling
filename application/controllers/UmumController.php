<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UmumController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = ['ExtModel', 'LynModel', 'PtnModel', 'JwbModel', 'SettingModel', 'RespondenModel'];
		$this->load->model($model);
		date_default_timezone_set("Asia/Bangkok");

	}

	public function changeBackground(){

		$config['upload_path'] = './assets/upload/bg/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('background')) {
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);
		}else{
			$background = $this->upload->data('file_name');
			$data = array(
				'umum_background' => $background
			);
			$this->ExtModel->update('umum_id', 1, 'hr_umum', $data);
		}
	}

	public function index()
	{
		if (isset($_POST['edit'])) {
			if($this->session->userdata('apkrole')=='hr'){
				// kalau admin
				$text_top = $this->input->post('text_top');
				$text_bot = $this->input->post('text_bot');
				$bg_video = $this->input->post('bg_video');
				$bg_chart = $this->input->post('bg_chart');
				$bg_marquee = $this->input->post('bg_marquee');
				$bg_header = $this->input->post('bg_header');
				$font = $this->input->post('font');
				$font_color = $this->input->post('font_color');


				$config['upload_path'] = './assets/upload/video/';
				$config['allowed_types'] = 'mkv|mp4|3gp|MKV|MP4|3GP';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('video')) {
					// $error = array('error' => $this->upload->display_errors());
					// var_dump($error);
					$text_top = $this->input->post('text_top');
					$text_bot = $this->input->post('text_bot');
					$background = $this->input->post('background');
					$font = $this->input->post('font');

					$data = array(
						'umum_text_top' => $text_top,
						'umum_text_bot' => $text_bot,
						'umum_bg_video' => $bg_video,
						'umum_bg_header' => $bg_header,
						'umum_bg_chart' => $bg_chart,
						'umum_bg_marquee' => $bg_marquee,
						'umum_font' => $font,
						'umum_font_color' => $font_color
					);

					$simpan = $this->ExtModel->update('umum_id', 1, 'hr_umum', $data);
					if ($simpan > 0) {
						$this->changeBackground();
						$this->session->set_flashdata('alert', 'success_post');
						redirect('umum');
					} else {
						$this->session->set_flashdata('alert', 'fail_edit');
						redirect('umum');
					}

				} else {
					$video = $this->upload->data('file_name');

					$data = array(
						'umum_text_top' => $text_top,
						'umum_text_bot' => $text_bot,
						'umum_bg_video' => $bg_video,
						'umum_bg_header' => $bg_header,
						'umum_bg_chart' => $bg_chart,
						'umum_video' => $video,
						'umum_bg_marquee' => $bg_marquee,
						'umum_font' => $font,
						'umum_font_color' => $font_color
					);
					$playlist_Video = [
						'video_judul' => $video,
						'video_monitor' => 1
					];

					$simpan = $this->ExtModel->update('umum_id', 1, 'hr_umum', $data);
					$simpan_playlist = $this->ExtModel->insert('hr_video', $playlist_Video);
					if ($simpan > 0 && $simpan_playlist > 1) {
						$this->session->set_flashdata('alert', 'success_post');
						redirect('umum');
					} else {
						$this->session->set_flashdata('alert', 'fail_edit');
						redirect('umum');
					}
				}
			}else{
				// Kalau bukan admin
				$data = array(
					'umum_text_bot' => $this->input->post('text_bot'),
					'umum_font' =>$this->input->post('font'),
					'umum_font_color' => $this->input->post('font_color')
				);

				$simpan = $this->ExtModel->update('umum_id', 1, 'hr_umum', $data);
				if ($simpan > 0) {
					$this->changeBackground();
					$this->session->set_flashdata('alert', 'success_post');
					redirect('umum');
				} else {
					$this->session->set_flashdata('alert', 'fail_edit');
					redirect('umum');
				}


			}



		} else {
			$data['title'] = 'Instansi';
			$data['umum'] = $this->ExtModel->getUmum()->result_array();
			$data['playlist'] = $this->ExtModel->getGlobal('hr_video');

			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/umum/index', $data);
			$this->load->view('backend/templates/footer', $data);
		}

	}

	public function deleteVideo($id)
	{
		$config['upload_path'] = './assets/upload/video/';
		$config['allowed_types'] = 'mkv|mp4|3gp|MKV|MP4|3GP';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$video = $this->ExtModel->getOneGlobal('video_id', $id, 'hr_video');
		$path = 'assets/upload/video/' . $video['video_judul'];

		unlink($path);
		$hapus = $this->ExtModel->hapus('video_id', $id, 'hr_video');
		if ($hapus > 0) {
			$this->session->set_flashdata('alert', 'success_delete');
			redirect('umum');
		} else {
			redirect('umum');
		}

	}

	public function ajaxGetLayanan($id)
	{
		$data = $this->ExtModel->getVoteReport($ptn, $lyn, $start, $end)->result_array();
		echo json_encode($data);
	}

	public function monitor()
	{
		$data['title'] = 'Layar Monitor';

		$this->load->view('frontend/monitor/index', $data);
	}

	public function wizard()
	{
		$data['ptn'] = $this->PtnModel->lihat();
		$data['jwb'] = $this->ExtModel->getJawabanByKat($this->session->userdata('sess_hr_versi'))->result_array();
		$data['title'] = 'Layar Monitor';
		$this->load->view('frontend/welcome/wizard', $data);
	}

	public function step1()
	{
		$data['title'] = 'Layar Monitor';
		$data['setting'] = $this->SettingModel->lihat_satu($this->session->userdata('sess_hr_lyn'));
		$data['instansi'] = $this->ExtModel->getInstansi()->row_array();


		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/welcome/step1', $data);
		$this->load->view('frontend/templates/footer', $data);
	}

	public function step2()
	{
		$data['title'] = 'Layar Monitor';
		$data['setting'] = $this->SettingModel->lihat_satu($this->session->userdata('sess_hr_lyn'));
		$data['instansi'] = $this->ExtModel->getInstansi()->row_array();
		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/welcome/step2', $data);
		$this->load->view('frontend/templates/footer', $data);
	}

	public function step3()
	{
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
			$simpan = $this->ExtModel->insert('hr_responden', $responden);
			if ($simpan > 0) {
				$this->session->set_flashdata('alert', 'success_post');
				redirect('step-4?nama=' . $nama . '&umur=' . $umur . '&jk=' . $jk . '&pnd=' . $pendidikan);
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('step-3');
			}
		} else {
			$data['title'] = 'Layar Monitor';
			$data['setting'] = $this->SettingModel->lihat_satu($this->session->userdata('sess_hr_lyn'));
			$data['instansi'] = $this->ExtModel->getInstansi()->row_array();
			$this->load->view('frontend/templates/header', $data);
			$this->load->view('frontend/welcome/step3', $data);
			$this->load->view('frontend/templates/footer', $data);
		}
	}

	public function step4()
	{

		if (isset($_POST['jwb_1'])) {
			$jwb = 1;
		} else if (isset($_POST['jwb_2'])) {
			$jwb = 2;
		} else if (isset($_POST['jwb_3'])) {
			$jwb = 3;
		} else if (isset($_POST['jwb_5'])) {
			$jwb = 5;
		} else if (isset($_POST['jwb_6'])) {
			$jwb = 6;
		} else if (isset($_POST['jwb_7'])) {
			$jwb = 7;
		} else if (isset($_POST['jwb_8'])) {
			$jwb = 8;
		} else if (isset($_POST['jwb_9'])) {
			$jwb = 9;
		} else if (isset($_POST['jwb_10'])) {
			$jwb = 10;
		} else if (isset($_POST['jwb_11'])) {
			$jwb = 11;
		} else if (isset($_POST['jwb_12'])) {
			$jwb = 12;
		} else if (isset($_POST['jwb_13'])) {
			$jwb = 13;
		}
		if ($jwb != '' || $jwb != null) {

			$lynn = $this->session->userdata('sess_hr_lyn');
			$ptn = $this->input->post('ptn');

			$nama = $this->input->post('nama');
			$umur = $this->input->post('umur');
			$jk = $this->input->post('jk');
			$pnd = $this->input->post('pnd');
			$responden = $this->RespondenModel->getRespondenByData($nama, $umur, $jk, $pnd);
			$no_responden = $responden['responden_id'];

			// var_dump($data1);exit();
			$instansi = $this->ExtModel->getInstansi()->row_array();
			if ($instansi['instansi_app_responden'] == 'yes'):
			$data = [
				'kpsn_responden' => $no_responden,
				'kpsn_ptn' => $ptn,
				'kpsn_lynn' => $lynn,
				'kpsn_jwb' => $jwb,
				'kpsn_petugas' => $this->session->userdata('sess_hr_id')
			];
			else:
				$data = [
					'kpsn_ptn' => $ptn,
					'kpsn_lynn' => $lynn,
					'kpsn_jwb' => $jwb,
					'kpsn_petugas' => $this->session->userdata('sess_hr_id')
				];
			endif;
			$simpan = $this->ExtModel->insert('hr_kpsn', $data);
			if ($simpan > 0) {
				$this->session->set_flashdata('alert', 'success_post');
				redirect('step-5?rspndn=' . $this->db->insert_id());
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('step-4?nama=' . $nama . '&umur=' . $umur . '&jk=' . $jk . '&pnd=' . $pnd);
			}

		} else {

			$data['title'] = 'Layar Monitor';
			$data['instansi'] = $this->ExtModel->getInstansi()->row_array();
			$data['pertanyaan'] = $this->ExtModel->getPertanyaanByLyn($this->session->userdata('sess_hr_lyn'));
			// var_dump($data['pertanyaan']);exit();
			$data['jawaban'] = $this->ExtModel->getJawabanByKat($this->session->userdata('sess_hr_versi'))->result_array();
			$this->load->view('frontend/templates/header', $data);
			$this->load->view('frontend/welcome/step4', $data);
			$this->load->view('frontend/templates/footer', $data);
		}
	}

	public function step5()
	{
		if (isset($_POST['kirim'])) {
			$id_kpsn = $this->input->post('id_kpsn');
			$saran = $this->input->post('saran');

			$data4 = [
				'kpsn_klhn' => $saran
			];

			$simpan = $this->ExtModel->update('kpsn_id', $id_kpsn, 'hr_kpsn', $data4);
			if ($simpan > 0) {
				$this->session->set_flashdata('alert', 'success_post');
				redirect('step-6');
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('step-6');
			}
		} else {
			$data['title'] = 'Layar Monitor';
			$data['setting'] = $this->SettingModel->lihat_satu($this->session->userdata('sess_hr_lyn'));
			$data['instansi'] = $this->ExtModel->getInstansi()->row_array();
			$this->load->view('frontend/templates/header', $data);
			$this->load->view('frontend/welcome/step5', $data);
			$this->load->view('frontend/templates/footer', $data);
		}

	}

	public function step6()
	{
		if (isset($_POST['kirim'])) {

		} else {
			$data['title'] = 'Layar Monitor';
			$data['setting'] = $this->SettingModel->lihat_satu($this->session->userdata('sess_hr_lyn'));
			$data['instansi'] = $this->ExtModel->getInstansi()->row_array();
			$this->load->view('frontend/templates/header', $data);
			$this->load->view('frontend/welcome/step6', $data);
			$this->load->view('frontend/templates/footer', $data);
		}

	}


}
