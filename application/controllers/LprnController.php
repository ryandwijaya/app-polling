<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once FCPATH . "vendor/autoload.php";

class LprnController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PtnModel');
		$this->load->model('LynModel');
		$this->load->model('ExtModel');
		$this->load->model('Monitor3Model');
		$this->load->model('Monitor4Model');
		$this->load->model('RespondenModel');

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
			$data['title'] = 'Data Laporan';
			$data['ptn'] = $this->PtnModel->lihat();
			$data['lyn'] = $this->LynModel->lihat();
			$data['instansi'] = $this->ExtModel->getInstansi()->row_array();

			$ptn = $this->input->post('ptn');
			$lyn = $this->input->post('lyn');
			$tgl_start = $this->input->post('tgl_start');
			$tgl_end = $this->input->post('tgl_end');

			if ($this->session->userdata('sess_hr_versi') == 'tiga') {

				$allvotes = $this->ExtModel->getVoteReport($ptn, $lyn, $tgl_start, $tgl_end, $this->session->userdata('sess_hr_versi'))->num_rows();
				// $sangatbaikvotes = $this->ExtModel->getOneVoteReport(1)->num_rows();
				$baikvotes = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 1)->num_rows();
				$cukupvotes = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 2)->num_rows();
				$burukvotes = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 3)->num_rows();

				// $data['sangatbaik'] = round($sangatbaikvotes/$allvotes * 100 , 2);
				$data['baikpersen'] = round($baikvotes / $allvotes * 100, 2);
				$data['cukuppersen'] = round($cukupvotes / $allvotes * 100, 2);
				$data['burukpersen'] = round($burukvotes / $allvotes * 100, 2);

				// $data['sangatbaikvotes'] = $this->ExtModel->getOneVoteReport(1)->num_rows();
				$data['baikvotes'] = $baikvotes;
				$data['cukupvotes'] = $cukupvotes;
				$data['burukvotes'] = $burukvotes;
				$data['votes'] = $this->ExtModel->getVoteReport($ptn, $lyn, $tgl_start, $tgl_end, $this->session->userdata('sess_hr_versi'))->row_array();
				$data['allvotes'] = $this->ExtModel->getVoteReport($ptn, $lyn, $tgl_start, $tgl_end, $this->session->userdata('sess_hr_versi'))->result_array();

			} else if ($this->session->userdata('sess_hr_versi') == 'empat') {

				$allvotes = $this->ExtModel->getVoteReport($ptn, $lyn, $tgl_start, $tgl_end, $this->session->userdata('sess_hr_versi'))->num_rows();
				// $sangatbaikvotes = $this->ExtModel->getOneVoteReport(1)->num_rows();
				$sangat = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 5)->num_rows();
				$puas = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 6)->num_rows();
				$cukup = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 7)->num_rows();
				$tidak = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 8)->num_rows();

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
				$data['votes'] = $this->ExtModel->getVoteReport($ptn, $lyn, $tgl_start, $tgl_end, $this->session->userdata('sess_hr_versi'))->row_array();
				$data['allvotes'] = $this->ExtModel->getVoteReport($ptn, $lyn, $tgl_start, $tgl_end, $this->session->userdata('sess_hr_versi'))->result_array();

			} else if ($this->session->userdata('sess_hr_versi') == 'lima') {

				$allvotes = $this->ExtModel->getVoteReport($ptn, $lyn, $tgl_start, $tgl_end, $this->session->userdata('sess_hr_versi'))->num_rows();
				// $sangatbaikvotes = $this->ExtModel->getOneVoteReport(1)->num_rows();
				$sangat = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 9)->num_rows();
				$puas = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 10)->num_rows();
				$cukup = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 11)->num_rows();
				$tidak = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 12)->num_rows();
				$stidak = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 13)->num_rows();

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
				$data['votes'] = $this->ExtModel->getVoteReport($ptn, $lyn, $tgl_start, $tgl_end, $this->session->userdata('sess_hr_versi'))->row_array();
				$data['allvotes'] = $this->ExtModel->getVoteReport($ptn, $lyn, $tgl_start, $tgl_end, $this->session->userdata('sess_hr_versi'))->result_array();

			}

			$data['pertanyaan'] = $this->ExtModel->getPertanyaanById($ptn);

			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/laporan/index', $data);
			$this->load->view('backend/templates/footer', $data);
		} else {
			$data['title'] = 'Data Laporan';
			$data['ptn'] = $this->PtnModel->lihat();
			$data['lyn'] = $this->LynModel->lihat();

			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/laporan/index', $data);
			$this->load->view('backend/templates/footer', $data);
		}

	}

	public function semua()
	{
		if (isset($_POST['lihat'])) {
			$data['title'] = 'Laporan';
			$ptn = $this->input->post('ptn');
			$tgl_start = $this->input->post('tgl_start');
			$tgl_end = $this->input->post('tgl_end');


			$data['ptn'] = $this->PtnModel->lihat();
			$data['lyn'] = $this->LynModel->lihat();
			$data['kpsn'] = $this->ExtModel->getVotesBetween($tgl_start, $tgl_end, $ptn, $this->session->userdata('sess_hr_versi'))->result_array();
			$data['instansi'] = $this->ExtModel->getInstansi()->row_array();
			$data['pertanyaan'] = $this->ExtModel->getPertanyaanById($ptn);

			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/laporan/semua', $data);
			$this->load->view('backend/templates/footer', $data);

		} else {
			$data['title'] = 'Laporan';
			$data['ptn'] = $this->PtnModel->lihat();
			$data['instansi'] = $this->ExtModel->getInstansi()->row_array();


			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/laporan/semua', $data);
			$this->load->view('backend/templates/footer', $data);
		}

	}

	public function monitor3()
	{

		$data['title'] = 'Laporan';
//		$date_now = date('Y-m-d');
		if ($this->input->post('start') == '') {
			$data['responden'] = $this->Monitor3Model->getJmlResponden(date('Y-m-d'), date('Y-m-d'));
//			for ($i = 0; $i < 15; $i++) {
//				$data['totalA'] = $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'A', $date_now, $date_now);
//				$data['totalB'] = $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'B', $date_now, $date_now);
//				$data['totalC'] = $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'C', $date_now, $date_now);
//				$data['totalD'] = $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'D', $date_now, $date_now);
//
//				$data['persenB'] = ($this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'B', $date_now, $date_now) * 33.3);
//				$data['persenC'] = ($this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'C', $date_now, $date_now) * 66.6);
//				$data['persenD'] = ($this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'D', $date_now, $date_now) * 100);
//			}
		} else {
			$data['responden'] = $this->Monitor3Model->getJmlResponden($this->input->post('start'), $this->input->post('end'));
//			for ($i = 0; $i < 15; $i++) {
//				$data['totalA'] = $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'A', $this->input->post('start'), $this->input->post('end'));
//				$data['totalB'] = $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'B', $this->input->post('start'), $this->input->post('end'));
//				$data['totalC']= $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'C', $this->input->post('start'), $this->input->post('end'));
//				$data['totalD'] = $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'D', $this->input->post('start'), $this->input->post('end'));
//
//				$data['persenB'] = ($this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'B', $this->input->post('start'), $this->input->post('end')) * 33.3);
//				$data['persenC'] = ($this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'C', $this->input->post('start'), $this->input->post('end')) * 66.6);
//				$data['persenD'] = ($this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'D', $this->input->post('start'), $this->input->post('end')) * 100);
//
//			}
		}
		$data['ptn'] =
			[
				"Bagaimana pemahaman Saudara tentang prosedur pelayanandi unit ini?",
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

		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/laporan/monitor3', $data);
		$this->load->view('backend/templates/footer', $data);

	}

	public function monitor4()
	{

		$data['title'] = 'Laporan Monitor 4';
		$date_now = date('Y-m-d');
		if ($this->input->post('start') == '') {
			$data['kpsn'] = $this->Monitor4Model->getKpsn(date('Y-m-d'), date('Y-m-d'));
		} else {
			$data['kpsn'] = $this->Monitor4Model->getKPsn($this->input->post('start'), $this->input->post('end'));
		}
		$data['ptn'] = $this->Monitor4Model->getPtn();
		$data['responden'] = $this->Monitor4Model->getJmlResponden($date_now);
		// var_dump($data['kpsn']);exit();
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/laporan/monitor4', $data);
		$this->load->view('backend/templates/footer', $data);

	}

	public function ajaxGetLaporan($ptn, $lyn, $start, $end)
	{
		$data = $this->ExtModel->getVoteReport($ptn, $lyn, $start, $end, $this->session->userdata('sess_hr_versi'))->result_array();
		echo json_encode($data);
	}

	public function exportSemua()
	{

		$inputFileName = 'assets/docs/laporan-semua.xlsx';
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);  /*----Spreadsheet object-----*/
		$excelWriter = new Xlsx($spreadsheet);  /*----- Excel (Xlss) Object*/
		$spreadsheet->setActiveSheetIndex(0);

		$styleArray = array(
			'borders' => array(
				'outline' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('rgb' => '000000'),
				),
			),
		);
		$tgl_now = date('Y-m-d');
		$instansi = $this->ExtModel->getInstansi()->row_array();
		$ptn = $this->input->post('lptn');
		$tgl_start = $this->input->post('ltgl_start');
		$tgl_end = $this->input->post('ltgl_end');
		$result = $this->ExtModel->getVotesBetween($tgl_start, $tgl_end, $ptn, $this->session->userdata('sess_hr_versi'))->result_array();
		// echo '<pre>';
		// var_dump($result);exit();
		$activeSheet = $spreadsheet->getActiveSheet();
		$row = 9;
		$no = 1;
		for ($i = 0; $i < count($result); $i++) {
			$activeSheet->setCellValue('A' . $row, '' . $no)
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('B' . $row, '' . $result[$i]['kpsn_dcreated'])
				->getStyle('B' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('C' . $row, '' . $result[$i]['lynn_nm'])
				->getStyle('C' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('D' . $row, '' . $result[$i]['usr_nm'])
				->getStyle('D' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('E' . $row, '' . $result[$i]['jwb_ket'])
				->getStyle('E' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('F' . $row, '' . $result[$i]['kpsn_klhn'])
				->getStyle('F' . $row)->applyFromArray($styleArray);
			$row++;
			$no++;
		}
		$activeSheet->setCellValue('A' . 1, '' . $instansi['instansi_dinas'])
			->getStyle('A' . $row)->applyFromArray($styleArray);
		$activeSheet->setCellValue('A' . 2, '' . $instansi['instansi_nama'])
			->getStyle('A' . $row)->applyFromArray($styleArray);
		$activeSheet->setCellValue('A' . 3, '' . $instansi['instansi_alamat'])
			->getStyle('A' . $row)->applyFromArray($styleArray);
		$activeSheet->setCellValue('C' . 4, '' . date_indo($tgl_now))
			->getStyle('C' . $row)->applyFromArray($styleArray);
		$activeSheet->setCellValue('C' . 5, '' . date_indo($tgl_start) . '-' . date_indo($tgl_end))
			->getStyle('C' . $row)->applyFromArray($styleArray);
		$activeSheet->setCellValue('C' . 6, '' . $no-1)
			->getStyle('C' . $row)->applyFromArray($styleArray);

		$filename = 'Laporan Semua Layanan';
		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="' . $filename . '.xlsx"');
		$excelWriter->save("php://output");
	}

	public function exportResponden()
	{

		$inputFileName = 'assets/docs/laporan-responden.xlsx';
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);  /*----Spreadsheet object-----*/
		$excelWriter = new Xlsx($spreadsheet);  /*----- Excel (Xlss) Object*/
		$spreadsheet->setActiveSheetIndex(0);

		$styleArray = array(
			'borders' => array(
				'outline' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('rgb' => '000000'),
				),
			),
		);
		$tgl_now = date('Y-m-d');
		$tgl_start = $this->input->post('ltgl_start');
		$tgl_end = $this->input->post('ltgl_end');
		$lyn = $this->input->post('llyn');
		$versi = $this->session->userdata('sess_hr_versi');
		$result = $this->RespondenModel->lihatByDate($tgl_start, $tgl_end, $lyn, $versi);
		$instansi = $this->ExtModel->getInstansi()->row_array();
		// echo '<pre>';
		// var_dump($result);exit();
		$activeSheet = $spreadsheet->getActiveSheet();
		$row = 9;
		$no = 1;
		for ($i = 0; $i < count($result); $i++) {
			$activeSheet->setCellValue('A' . $row, '' . $no)
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('B' . $row, '' . $result[$i]['responden_date_created'])
				->getStyle('B' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('C' . $row, '' . $result[$i]['responden_umur'])
				->getStyle('C' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('D' . $row, '' . $result[$i]['responden_pekerjaan'])
				->getStyle('D' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('E' . $row, '' . $result[$i]['responden_pendidikan'])
				->getStyle('E' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('F' . $row, '' . $result[$i]['responden_jk'])
				->getStyle('F' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('G' . $row, '' . $result[$i]['jwb_ket'])
				->getStyle('G' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('H' . $row, '' . $result[$i]['lynn_nm'])
				->getStyle('H' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('I' . $row, '' . $result[$i]['kpsn_klhn'])
				->getStyle('I' . $row)->applyFromArray($styleArray);
			$row++;
			$no++;
		}
		$activeSheet->setCellValue('A' . 1, '' . $instansi['instansi_dinas'])
			->getStyle('A' . $row)->applyFromArray($styleArray);
		$activeSheet->setCellValue('A' . 2, '' . $instansi['instansi_nama'])
			->getStyle('A' . $row)->applyFromArray($styleArray);
		$activeSheet->setCellValue('A' . 3, '' . $instansi['instansi_alamat'])
			->getStyle('A' . $row)->applyFromArray($styleArray);
		$activeSheet->setCellValue('C' . 4, '' . date_indo($tgl_now))
			->getStyle('C' . $row)->applyFromArray($styleArray);
		$activeSheet->setCellValue('C' . 5, '' . date_indo($tgl_start) . '-' . date_indo($tgl_end))
			->getStyle('C' . $row)->applyFromArray($styleArray);
		$activeSheet->setCellValue('C' . 6, '' . $no-1)
			->getStyle('C' . $row)->applyFromArray($styleArray);

		$filename = 'Laporan Data Responden';
		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="' . $filename . '.xlsx"');
		$excelWriter->save("php://output");
	}

	public function exportLayanan()
	{

		$inputFileName = 'assets/docs/laporan-layanan.xlsx';
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);  /*----Spreadsheet object-----*/
		$excelWriter = new Xlsx($spreadsheet);  /*----- Excel (Xlss) Object*/
		$spreadsheet->setActiveSheetIndex(0);

		$styleArray = array(
			'borders' => array(
				'outline' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('rgb' => '000000'),
				),
			),
		);
		$tgl_now = date('Y-m-d');
		$ptn = $this->input->post('lptn');
		$lyn = $this->input->post('llyn');
		$tgl_start = $this->input->post('ltgl_start');
		$tgl_end = $this->input->post('ltgl_end');


		$result = $this->ExtModel->getVoteReport($ptn, $lyn, $tgl_start, $tgl_end, $this->session->userdata('sess_hr_versi'))->result_array();
		$instansi = $this->ExtModel->getInstansi()->row_array();
		// echo '<pre>';
		// var_dump($result);exit();
		$activeSheet = $spreadsheet->getActiveSheet();
		$row = 9;
		$no = 1;
		for ($i = 0; $i < count($result); $i++) {
			$activeSheet->setCellValue('A' . $row, '' . $no)
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('B' . $row, '' . $result[$i]['lynn_nm'])
				->getStyle('B' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('C' . $row, '' . $result[$i]['jwb_ket'])
				->getStyle('C' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('D' . $row, '' . $result[$i]['kpsn_klhn'])
				->getStyle('D' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('E' . $row, '' . $result[$i]['kpsn_dcreated'])
				->getStyle('E' . $row)->applyFromArray($styleArray);
			$row++;
			$no++;
		}
		$activeSheet->setCellValue('A' . 1, '' . $instansi['instansi_dinas'])
			->getStyle('A' . $row)->applyFromArray($styleArray);
		$activeSheet->setCellValue('A' . 2, '' . $instansi['instansi_nama'])
			->getStyle('A' . $row)->applyFromArray($styleArray);
		$activeSheet->setCellValue('A' . 3, '' . $instansi['instansi_alamat'])
			->getStyle('A' . $row)->applyFromArray($styleArray);
		$activeSheet->setCellValue('C' . 4, '' . date_indo($tgl_now))
			->getStyle('C' . $row)->applyFromArray($styleArray);
		$activeSheet->setCellValue('C' . 5, '' . date_indo($tgl_start) . '-' . date_indo($tgl_end))
			->getStyle('C' . $row)->applyFromArray($styleArray);
		$activeSheet->setCellValue('C' . 6, '' . $no)
			->getStyle('C' . $row)->applyFromArray($styleArray);

		if ($this->session->userdata('sess_hr_versi') == 'tiga') {
			$allvotes = $this->ExtModel->getVoteReport($ptn, $lyn, $tgl_start, $tgl_end, $this->session->userdata('sess_hr_versi'))->num_rows();
			$baikvotes = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 1)->num_rows();
			$cukupvotes = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 2)->num_rows();
			$burukvotes = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 3)->num_rows();

			// $data['sangatbaik'] = round($sangatbaikvotes/$allvotes * 100 , 2);
			$baikpersen = round($baikvotes / $allvotes * 100, 2);
			$cukuppersen = round($cukupvotes / $allvotes * 100, 2);
			$burukpersen = round($burukvotes / $allvotes * 100, 2);
			$activeSheet->setCellValue('G' . 8, '' . 'Indikator')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('H' . 8, '' . 'Persentase')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('G' . 9, '' . 'Puas')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('H' . 9, '' . $baikpersen)
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('G' . 10, '' . 'Cukup Puas')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('H' . 10, '' . $cukuppersen)
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('G' . 11, '' . 'Tidak Puas')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('H' . 11, '' . $burukpersen)
				->getStyle('A' . $row)->applyFromArray($styleArray);
		}
		if ($this->session->userdata('sess_hr_versi') == 'empat') {
			$allvotes = $this->ExtModel->getVoteReport($ptn, $lyn, $tgl_start, $tgl_end, $this->session->userdata('sess_hr_versi'))->num_rows();
			$sangat = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 5)->num_rows();
			$puas = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 6)->num_rows();
			$cukup = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 7)->num_rows();
			$tidak = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 8)->num_rows();

			//votes %
			$sangatpersen = round($sangat / $allvotes * 100, 2);
			$puaspersen = round($puas / $allvotes * 100, 2);
			$cukuppersen = round($cukup / $allvotes * 100, 2);
			$tidakpersen = round($tidak / $allvotes * 100, 2);

			$activeSheet->setCellValue('G' . 8, '' . 'Indikator')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('H' . 8, '' . 'Persentase')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('G' . 9, '' . 'Sangat Puas')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('H' . 9, '' . $sangatpersen)
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('G' . 10, '' . 'Puas')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('H' . 10, '' . $puaspersen)
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('G' . 11, '' . 'Cukup Puas')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('H' . 11, '' . $cukuppersen)
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('G' . 12, '' . 'Tidak Puas')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('H' . 12, '' . $tidakpersen)
				->getStyle('A' . $row)->applyFromArray($styleArray);
		}
		if ($this->session->userdata('sess_hr_versi') == 'lima') {
			$allvotes = $this->ExtModel->getVoteReport($ptn, $lyn, $tgl_start, $tgl_end, $this->session->userdata('sess_hr_versi'))->num_rows();
			$sangat = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 9)->num_rows();
			$puas = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 10)->num_rows();
			$cukup = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 11)->num_rows();
			$tidak = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 12)->num_rows();
			$stidak = $this->ExtModel->getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, 13)->num_rows();

			//votes %
			$sangatpersen = round($sangat / $allvotes * 100, 2);
			$puaspersen = round($puas / $allvotes * 100, 2);
			$cukuppersen = round($cukup / $allvotes * 100, 2);
			$tidakpersen = round($tidak / $allvotes * 100, 2);
			$stidakpersen = round($stidak / $allvotes * 100, 2);

			$activeSheet->setCellValue('G' . 8, '' . 'Indikator')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('H' . 8, '' . 'Persentase')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('G' . 9, '' . 'Sangat Puas')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('H' . 9, '' . $sangatpersen)
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('G' . 10, '' . 'Puas')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('H' . 10, '' . $puaspersen)
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('G' . 11, '' . 'Cukup Puas')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('H' . 11, '' . $cukuppersen)
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('G' . 12, '' . 'Tidak Puas')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('H' . 12, '' . $tidakpersen)
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('G' . 13, '' . 'Sangat Tidak Puas')
				->getStyle('A' . $row)->applyFromArray($styleArray);
			$activeSheet->setCellValue('H' . 13, '' . $stidakpersen)
				->getStyle('A' . $row)->applyFromArray($styleArray);
		}


		$filename = 'Laporan Data Per Layanan';
		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="' . $filename . '.xlsx"');
		$excelWriter->save("php://output");
	}

}
