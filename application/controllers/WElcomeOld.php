<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $model = ['ExtModel','LynModel','JwbModel'];
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
        

        if ($this->session->userdata('sess_hr_versi') == 'tiga') {
        //Votes num
        $data['total_vote'] = $this->ExtModel->getAllVoteByVersi($now,$this->session->userdata('sess_hr_lyn'),$this->session->userdata('sess_hr_versi'))->num_rows();
        $allvotes = $data['total_vote'];
        $baikvotes = $this->ExtModel->getVoteStatNow(1,$now,$this->session->userdata('sess_hr_lyn'))->num_rows();
        $cukupvotes = $this->ExtModel->getVoteStatNow(2,$now,$this->session->userdata('sess_hr_lyn'))->num_rows();
        $burukvotes = $this->ExtModel->getVoteStatNow(3,$now,$this->session->userdata('sess_hr_lyn'))->num_rows();
        //votes %
        $data['baikpersen'] = round($baikvotes/$allvotes * 100,2);
        $data['cukuppersen'] = round($cukupvotes/$allvotes * 100, 2);
        $data['burukpersen'] = round($burukvotes/$allvotes * 100, 2);

        // send to view
        $data['baikvotes'] = $baikvotes;
        $data['cukupvotes'] = $cukupvotes;
        $data['burukvotes'] = $burukvotes;
        
        }elseif($this->session->userdata('sess_hr_versi') == 'empat'){

        //Votes num
        $data['total_vote'] = $this->ExtModel->getVotesNow($now,$this->session->userdata('sess_hr_lyn'),$this->session->userdata('sess_hr_versi'))->num_rows();
        $allvotes = $data['total_vote'];
        $sangat = $this->ExtModel->getVoteStatNow(5,$now,$this->session->userdata('sess_hr_lyn'))->num_rows();
        $puas = $this->ExtModel->getVoteStatNow(6,$now,$this->session->userdata('sess_hr_lyn'))->num_rows();
        $cukup = $this->ExtModel->getVoteStatNow(7,$now,$this->session->userdata('sess_hr_lyn'))->num_rows();
        $tidak = $this->ExtModel->getVoteStatNow(8,$now,$this->session->userdata('sess_hr_lyn'))->num_rows();
        //votes %
        $data['sangatpersen'] = round($sangat/$allvotes * 100,2);
        $data['puaspersen'] = round($puas/$allvotes * 100, 2);
        $data['cukuppersen'] = round($cukup/$allvotes * 100, 2);
        $data['tidakpersen'] = round($tidak/$allvotes * 100, 2);

        // send to view
        $data['sangat'] = $sangat;
        $data['puas'] = $puas;
        $data['cukup'] = $cukup;
        $data['tidak'] = $tidak;


        }elseif($this->session->userdata('sess_hr_versi') == 'lima'){

        //Votes num
        $data['total_vote'] = $this->ExtModel->getVotesNow($now,$this->session->userdata('sess_hr_lyn'),$this->session->userdata('sess_hr_versi'))->num_rows();
        $allvotes = $data['total_vote'];
        $sangat = $this->ExtModel->getVoteStatNow(9,$now,$this->session->userdata('sess_hr_lyn'))->num_rows();
        $puas = $this->ExtModel->getVoteStatNow(10,$now,$this->session->userdata('sess_hr_lyn'))->num_rows();
        $cukup = $this->ExtModel->getVoteStatNow(11,$now,$this->session->userdata('sess_hr_lyn'))->num_rows();
        $tidak = $this->ExtModel->getVoteStatNow(12,$now,$this->session->userdata('sess_hr_lyn'))->num_rows();
        $stidak = $this->ExtModel->getVoteStatNow(13,$now,$this->session->userdata('sess_hr_lyn'))->num_rows();
        //votes %
        $data['sangatpersen'] = round($sangat/$allvotes * 100,2);
        $data['puaspersen'] = round($puas/$allvotes * 100, 2);
        $data['cukuppersen'] = round($cukup/$allvotes * 100, 2);
        $data['tidakpersen'] = round($tidak/$allvotes * 100, 2);
        $data['stidakpersen'] = round($stidak/$allvotes * 100, 2);

        // send to view
        $data['sangat'] = $sangat;
        $data['puas'] = $puas;
        $data['cukup'] = $cukup;
        $data['tidak'] = $tidak;
        $data['stidak'] = $stidak;


        }
        
        //data
        $data['layanan'] = $this->LynModel->lihat();
        $data['jawaban'] = $this->JwbModel->lihat_by_versi($this->session->userdata('sess_hr_versi'));

		$this->load->view('backend/templates/header',$data);
		$this->load->view('backend/beranda/index',$data);
		$this->load->view('backend/templates/footer',$data);
	} 

    public function ajaxGetLayanan($id){
        $data = $this->ExtModel->getVoteReport($ptn,$lyn,$start,$end,$this->session->userdata('sess_hr_versi'))->result_array();
        echo json_encode($data);
    }

    public function monitor()
    {
        $data['title'] = 'Layar Monitor';
        $data['instansi'] = $this->ExtModel->getInstansi()->row_array();
        $data['getData'] = $this->ExtModel->getSetUmum()->row_array();
        $data['getLynn'] = $this->LynModel->lihat();
        $this->load->view('frontend/monitor/monitor1',$data);
    }

    public function tes_chart()
    {
        $data['title'] = 'Layar Monitor';
        $data['instansi'] = $this->ExtModel->getInstansi()->row_array();
        $data['getData'] = $this->ExtModel->getSetUmum()->row_array();
        $data['getLynn'] = $this->LynModel->lihat();
        $this->load->view('frontend/monitor/tes_chart',$data);
    }

    public function monitor3()
    {
        $data['instansi'] = $this->ExtModel->getInstansi()->row_array();
        $data['title'] = 'Layar Monitor';
        $data['ptn'] = 
        [   "Bagaimana pemahaman Saudara tentang prosedur pelayanandi unit ini?",
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
        
        $this->load->view('frontend/templates/header',$data);
        $this->load->view('frontend/monitor3/index',$data);
        $this->load->view('frontend/templates/footer',$data);
    }

    public function ajaxGetVotes(){
        $tgl_now = date('Y-m-d');
        $data = $this->ExtModel->getVoteNow($tgl_now,$this->session->userdata('sess_hr_versi'))->result_array();
        echo json_encode($data);
    }
    

    
}
