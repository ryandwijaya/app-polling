<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $model = ['ExtModel','LynModel','PtnModel','SettingModel','Monitor4Model'];
        $this->load->model($model);

    }
	
	public function monitor2()
	{
        if (isset($_POST['set'])) {
            $id = $this->input->post('id_lynn');
            $check = $this->LynModel->check_lyn($id);

            if ($check>0) {
                $data = array(
                    'set_lyn' => $id ,
                    'set_ptn' => $this->input->post('ptn') ,
                    'set_background' => $this->input->post('background') 
                );
                $simpan = $this->SettingModel->update($id,$data);
                if ($simpan > 0){
                    $this->session->set_flashdata('alert', 'success_post');
                    redirect('set/monitor2');
                } else {
                    $this->session->set_flashdata('alert', 'fail_edit');
                    redirect('set/monitor2');
                }
            }else{
                $data = array(
                    'set_lyn' => $id ,
                    'set_ptn' => $this->input->post('ptn') ,
                    'set_background' => $this->input->post('background') 
                );
                $simpan = $this->SettingModel->tambah($data);
                if ($simpan > 0){
                    $this->session->set_flashdata('alert', 'success_post');
                    redirect('set/monitor2');
                } else {
                    $this->session->set_flashdata('alert', 'fail_edit');
                    redirect('set/monitor2');
                }

            }

        }else{

            $data['title'] = 'Setting Monitor 2';
            $data['ptn'] = $this->PtnModel->lihat();
            $data['lyn'] = $this->LynModel->lihat();

            $data['set2'] = $this->SettingModel->lihat()->result_array();
            $data['set_monitor'] = $this->SettingModel->getByMonitor(5)->row_array();

            // var_dump($data['set2']);
            // exit();
            $this->load->view('backend/templates/header',$data);
            $this->load->view('backend/monitor2/index',$data);
            $this->load->view('backend/templates/footer',$data);
        
        }
    }

    public function monitor4(){ //funsi untuk menampilkan halaman pengaturan monitor 4
        $data['instansi'] = $this->ExtModel->getInstansi()->row_array(); 
        $data['title'] = 'Setting Monitor 4';
        $data['ptn'] = $this->Monitor4Model->getPtn();
        // echo '<pre>';
        // var_dump($data['jwb']);exit();

        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/monitor4/index',$data);
        $this->load->view('backend/templates/footer',$data);
    }

    public function android(){
        if (isset($_POST['set'])) {
            
            $jam = [
                'font_jam' => $this->input->post('font_jam'), 
                'color_jam' => $this->input->post('color_jam'), 
                'size_jam' => $this->input->post('size_jam') 
            ];

            $judul = [
                'isi_judul' => str_replace(array(':', ','), '', $this->input->post('isi_judul')), 
                'font_judul' => $this->input->post('font_judul'), 
                'color_judul' => $this->input->post('color_judul'), 
                'size_judul' => $this->input->post('size_judul'), 
            ];

            $ptn = [
                'isi_ptn' => str_replace(array(':', ','), '', $this->input->post('isi_ptn')), 
                'font_ptn' => $this->input->post('font_ptn'), 
                'color_ptn' => $this->input->post('color_ptn'), 
                'size_ptn' => $this->input->post('size_ptn'), 
            ];
            $alamat = [
                'isi_alamat' => str_replace(array(':', ','), '', $this->input->post('isi_alamat')), 
                'font_alamat' => $this->input->post('font_alamat'), 
                'color_alamat' => $this->input->post('color_alamat'), 
                'size_alamat' => $this->input->post('size_alamat'), 
            ];

            $text = [
                'isi_text' => str_replace(array(':', ','), '', $this->input->post('isi_text')), 
                'font_text' => $this->input->post('font_text'), 
                'color_text' => $this->input->post('color_text'), 
                'size_text' => $this->input->post('size_text'), 
                'status_text' => $this->input->post('status'), 
            ];

            // var_dump($text);exit();

            $data_simpan = [
                'andro_jam' => json_encode($jam), 
                'andro_judul' => json_encode($judul), 
                'andro_ptn' => json_encode($ptn), 
                'andro_alamat' => json_encode($alamat), 
                'andro_text' => json_encode($text), 
            ];

            // var_dump($data_simpan);exit();
            $simpan = $this->ExtModel->update('andro_id',1,'hr_set_android',$data_simpan);
            if ($simpan >0) {
                redirect('set/android');
            }else{
                redirect('set/android');
            }
        }else{

        $data['title'] = 'Setting Android';
        $setting = $this->ExtModel->getGlobal('hr_set_android');

        $data['jam'] = json_decode($setting[0]['andro_jam'], true);
        $data['ptn'] = json_decode($setting[0]['andro_ptn'], true);
        $data['judul'] = json_decode($setting[0]['andro_judul'], true);
        $data['alamat'] = json_decode($setting[0]['andro_alamat'], true);
        $data['text'] = json_decode($setting[0]['andro_text'], true);
        // echo '<pre>';
        // var_dump($data['ptn']);exit();

        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/android/index',$data);
        $this->load->view('backend/templates/footer',$data);
        }
    }

    public function add_monitor4(){  //fungsi untuk menambahkan pertanyaan pada monitor 4

        if (isset($_POST['add'])) {  //code yang dijalankan jika tombol tambah di tekan
            $ptn = $this->input->post('ptn');
            $jwb = $this->input->post('jwb');
            $option = $this->input->post('option');
            
            $data_ptn  = [  //data pertanyaan
                'ptn4_txt' => $ptn 
            ];
            $simpan_ptn = $this->ExtModel->insert('hr_ptn4',$data_ptn); //simpan pertanyaan
            if ($simpan_ptn>0) { //jika simpan berhasil
                $get_id = $this->Monitor4Model->getIdPtn($ptn); //ambil id pertanyaan
                for ($i = 0; $i < count($jwb) ; $i++) { //simpan data jawaban
                    $data[$i]=[
                        'jwb4_ket'=> $jwb[$i],
                        'jwb4_option'=> $option[$i],
                        'jwb4_ptn'=> $get_id['ptn4_id']
                    ];
                    $this->ExtModel->insert('hr_jwb4',$data[$i]);
                }
                // var_dump($data[1]);exit();
                $this->session->set_flashdata('alert', 'success_post'); //tampilkan alert berhasil simpan
                redirect('set/monitor4'); //alihkan ke halaman pengturan monitor 4
            }else{  //jika simpan gagal
                $this->session->set_flashdata('alert', 'fail_post'); //tapilkan alert gagal smpan
                redirect('set/monitor4'); // kembalikan ke halaman pengaturan monitor 4
            }
        }else{ //kondisi jika tombol add tidak ditekan

            $data['title'] = 'Add Monitor 4'; //judul halaman
            // echo '<pre>';
            // var_dump($data['jwb']);exit();

            $this->load->view('backend/templates/header',$data); //menampilkan template 
            $this->load->view('backend/monitor4/add',$data); //menampilkan halaman tambah pertnyaan
            $this->load->view('backend/templates/footer',$data);   //menampilkan template  
        }

        
    }

    public function hapus_monitor4($id){
        $hapus = $this->Monitor4Model->hapus($id);
        if ($hapus > 0){
            $this->session->set_flashdata('alert', 'success_delete');
            redirect('set/monitor4');
        }else{
            redirect('set/monitor4');
        }
    }

    
}
