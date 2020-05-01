<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = ['ExtModel', 'LynModel', 'JwbModel', 'Monitor3Model', 'Monitor4Model'];
		$this->load->model($model);
		date_default_timezone_set("Asia/Bangkok");

	}

	public function index()
	{
		if (!$this->session->has_userdata('sess_hr_id')) {
			redirect(base_url('login'));
		}
		if ($this->session->userdata('sess_hr_id') === '') {
			redirect(base_url('login'), 'refresh');
		}
		$now = date('Y-m-d');
		$data['title'] = 'Beranda';
		$data['color_graph'] = $this->ExtModel->getOneGlobal('color_id',1,'hr_color_graph');
		if ($this->session->userdata('sess_hr_versi') == 'tiga') {
			//Votes num
			$data['total_vote'] = $this->ExtModel->getAllVoteByVersi($this->session->userdata('sess_hr_versi'))->num_rows();
			$allvotes = $data['total_vote'];
			$baikvotes = $this->ExtModel->getVoteByJwb(1)->num_rows();
			$cukupvotes = $this->ExtModel->getVoteByJwb(2)->num_rows();
			$burukvotes = $this->ExtModel->getVoteByJwb(3)->num_rows();
			//votes %
			$data['baikpersen'] = round($baikvotes / $allvotes * 100, 2);
			$data['cukuppersen'] = round($cukupvotes / $allvotes * 100, 2);
			$data['burukpersen'] = round($burukvotes / $allvotes * 100, 2);

			// send to view
			$data['baikvotes'] = $baikvotes;
			$data['cukupvotes'] = $cukupvotes;
			$data['burukvotes'] = $burukvotes;

		} elseif ($this->session->userdata('sess_hr_versi') == 'empat') {

			//Votes num
			$data['total_vote'] = $this->ExtModel->getAllVoteByVersi($this->session->userdata('sess_hr_versi'))->num_rows();
			$allvotes = $data['total_vote'];
			$sangat = $this->ExtModel->getVoteByJwb(5)->num_rows();
			$puas = $this->ExtModel->getVoteByJwb(6)->num_rows();
			$cukup = $this->ExtModel->getVoteByJwb(7)->num_rows();
			$tidak = $this->ExtModel->getVoteByJwb(8)->num_rows();
			//votes %
			$data['sangatpersen'] = round($sangat / $allvotes * 100, 2);
			$data['puaspersen'] = round($puas / $allvotes * 100, 2);
			$data['cukuppersen'] = round($cukup / $allvotes * 100, 2);
			$data['tidakpersen'] = round($tidak / $allvotes * 100, 2);

			// send to view
			$data['sangat'] = $sangat;
			$data['puas'] = $puas;
			$data['cukup'] = $cukup;
			$data['tidak'] = $tidak;


		} elseif ($this->session->userdata('sess_hr_versi') == 'lima') {

			//Votes num
			$data['total_vote'] = $this->ExtModel->getAllVoteByVersi($this->session->userdata('sess_hr_versi'))->num_rows();
			$allvotes = $data['total_vote'];
			$sangat = $this->ExtModel->getVoteByJwb(9)->num_rows();
			$puas = $this->ExtModel->getVoteByJwb(10)->num_rows();
			$cukup = $this->ExtModel->getVoteByJwb(11)->num_rows();
			$tidak = $this->ExtModel->getVoteByJwb(12)->num_rows();
			$stidak = $this->ExtModel->getVoteByJwb(13)->num_rows();
			//votes %
			$data['sangatpersen'] = round($sangat / $allvotes * 100, 2);
			$data['puaspersen'] = round($puas / $allvotes * 100, 2);
			$data['cukuppersen'] = round($cukup / $allvotes * 100, 2);
			$data['tidakpersen'] = round($tidak / $allvotes * 100, 2);
			$data['stidakpersen'] = round($stidak / $allvotes * 100, 2);

			// send to view
			$data['sangat'] = $sangat;
			$data['puas'] = $puas;
			$data['cukup'] = $cukup;
			$data['tidak'] = $tidak;
			$data['stidak'] = $stidak;


		} elseif ($this->session->userdata('sess_hr_versi') == 'monitor4') {
			$data['kpsn'] = $this->Monitor4Model->getAllKpsn();
			$data['ptn'] = $this->Monitor4Model->getPtn();
		}

		//data

		$data['layanan'] = $this->LynModel->lihat();
		$data['jawaban'] = $this->JwbModel->lihat_by_versi($this->session->userdata('sess_hr_versi'));

		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/beranda/index', $data);
		$this->load->view('backend/templates/footer', $data);
	}

	public function ajaxGetLayanan($id)
	{
		$data = $this->ExtModel->getVoteReport($ptn, $lyn, $start, $end, $this->session->userdata('sess_hr_versi'))->result_array();
		echo json_encode($data);
	}

	public function monitor()
	{
		$data['title'] = 'Layar Monitor';
		$data['instansi'] = $this->ExtModel->getInstansi()->row_array();
		$data['getData'] = $this->ExtModel->getSetUmum()->row_array();
		$data['getVideo'] = $this->ExtModel->getVideo()->result_array();
		$data['getLynn'] = $this->LynModel->lihat();
		$getKey = $this->ExtModel->getGlobal('hr_set_key');
		$data['loket1'] = json_decode($getKey[0]['loket_1'] , true);
		$data['loket2'] = json_decode($getKey[0]['loket_2'] , true);
		$data['loket3'] = json_decode($getKey[0]['loket_3'] , true);
		$data['loket4'] = json_decode($getKey[0]['loket_4'] , true);
		$data['loket5'] = json_decode($getKey[0]['loket_5'] , true);


//		$this->load->view('frontend/monitor/monitor1', $data);
		$this->load->view('frontend/monitor/new', $data);
		$this->load->view('frontend/monitor/script', $data);
	}

	public function tes_chart()
	{
		$data['title'] = 'Layar Monitor';
		$data['instansi'] = $this->ExtModel->getInstansi()->row_array();
		$data['getData'] = $this->ExtModel->getSetUmum()->row_array();
		$data['getLynn'] = $this->LynModel->lihat();
		$this->load->view('frontend/monitor/tes_chart', $data);
	}

	public function monitor3()
	{
		$data['instansi'] = $this->ExtModel->getInstansi()->row_array();
		$data['title'] = 'Layar Monitor';
		$data['ptn'] =
			["Bagaimana pemahaman Saudara tentang prosedur pelayanandi unit ini?",
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

		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/monitor3/index', $data);
		$this->load->view('frontend/templates/footer', $data);
	}

	public function ajaxGetVotes()
	{
		$tgl_now = date('Y-m-d');
		$instansi = $this->ExtModel->getInstansi()->row_array();
		if ($instansi['instansi_versi'] == 'monitor') {
			$data = $this->ExtModel->getVoteNow($tgl_now, $instansi['instansi_versi_jwb'])->result_array();
		} else {
			$data = $this->ExtModel->getVoteAndroidNow($tgl_now, $instansi['instansi_versi_jwb'])->result_array();
		}
		echo json_encode($data);
	}
	public function colorGraph(){
		if(isset($_POST['submit'])){
			$data_post = array(
				'color_spuas' => $this->input->post('spuas'),
				'color_puas' => $this->input->post('puas'),
				'color_cpuas' => $this->input->post('cpuas'),
				'color_tpuas' => $this->input->post('tpuas'),
				'color_stpuas' => $this->input->post('stpuas')
			);
			$simpan = $this->ExtModel->update('color_id',1,'hr_color_graph',$data_post);
			if ($simpan>0){
				$this->session->set_flashdata('alert', 'success_post');
				redirect('beranda');
			}else{
				echo 'Gagal menyimpan';
			}
		}else{
			echo 'Not Submited';
		}
	}
}
