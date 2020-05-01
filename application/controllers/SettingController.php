<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $model = ['ExtModel','LynModel','PtnModel','SettingModel','Monitor4Model'];
        $this->load->model($model);

    }
	public function key(){

		if (isset($_POST['simpan'])){
			$loket1 = array(
				'key_1' => $this->input->post('1_key_1'),
				'key_2' => $this->input->post('1_key_2'),
				'key_3' => $this->input->post('1_key_3')
			);
			$loket2 = array(
				'key_1' => $this->input->post('2_key_1'),
				'key_2' => $this->input->post('2_key_2'),
				'key_3' => $this->input->post('2_key_3')
			);
			$loket3 = array(
				'key_1' => $this->input->post('3_key_1'),
				'key_2' => $this->input->post('3_key_2'),
				'key_3' => $this->input->post('3_key_3')
			);
			$loket4 = array(
				'key_1' => $this->input->post('4_key_1'),
				'key_2' => $this->input->post('4_key_2'),
				'key_3' => $this->input->post('4_key_3')
			);
			$loket5 = array(
				'key_1' => $this->input->post('5_key_1'),
				'key_2' => $this->input->post('5_key_2'),
				'key_3' => $this->input->post('5_key_3')
			);

			$data = array(
				'loket_1' => json_encode($loket1),
				'loket_2' => json_encode($loket2),
				'loket_3' => json_encode($loket3),
				'loket_4' => json_encode($loket4),
				'loket_5' => json_encode($loket5)
			);

//			var_dump($data);exit();
			$simpan = $this->ExtModel->update('key_id',1,'hr_set_key',$data);
			if ($simpan>0){
				$this->session->set_flashdata('alert', 'success_post');
				redirect('set/key');
			}else{
				$this->session->set_flashdata('alert', 'fail_post');
				redirect('set/key');
			}
		}else{
			$getKey = $this->ExtModel->getGlobal('hr_set_key');
			$data['loket1'] = json_decode($getKey[0]['loket_1'] , true);
			$data['loket2'] = json_decode($getKey[0]['loket_2'] , true);
			$data['loket3'] = json_decode($getKey[0]['loket_3'] , true);
			$data['loket4'] = json_decode($getKey[0]['loket_4'] , true);
			$data['loket5'] = json_decode($getKey[0]['loket_5'] , true);

			$this->load->view('backend/templates/header',$data);
			$this->load->view('backend/key/index',$data);
			$this->load->view('backend/templates/footer',$data);
		}

	}
	public function monitor2()
	{
        if (isset($_POST['set'])) {
            $id = $this->input->post('id_lynn');
            $check = $this->LynModel->check_lyn($id);

			$config['upload_path'] = './assets/upload/bg/';
			$config['allowed_types'] = 'jpg|png|jpeg|JPEG|JPG|PNG';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('background_body')) {
				$data = array(
					'set_lyn' => $id ,
					'set_ptn' => $this->input->post('ptn') ,
					'set_background' => $this->input->post('background') ,
					'set_background_kop' => $this->input->post('background_kop'),
					'set_background_button' => $this->input->post('background_button'),
					'set_shape_button' => $this->input->post('shape_button'),
					'set_timer' => $this->input->post('timer'),
					'set_font_color' => $this->input->post('font_color')
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
				$bg = $this->upload->data('file_name');
				$data = array(
					'set_lyn' => $id ,
					'set_ptn' => $this->input->post('ptn') ,
					'set_background' => $this->input->post('background') ,
					'set_background_kop' => $this->input->post('background_kop'),
					'set_background_body' => $bg,
					'set_background_button' => $this->input->post('background_button'),
					'set_shape_button' => $this->input->post('shape_button'),
					'set_timer' => $this->input->post('timer'),
					'set_font_color' => $this->input->post('font_color')
				);
				$simpan = $this->SettingModel->update($id,$data);
				if ($simpan > 0){
					$this->session->set_flashdata('alert', 'success_post');
					redirect('set/monitor2');
				} else {
					$this->session->set_flashdata('alert', 'fail_edit');
					redirect('set/monitor2');
				}
			}


//            if ($check>0) {

//            }else{
//                $data = array(
//                    'set_lyn' => $id ,
//                    'set_ptn' => $this->input->post('ptn') ,
//                    'set_background' => $this->input->post('background'),
//                    'set_background_kop' => $this->input->post('background_kop'),
//                    'set_background_button' => $this->input->post('background_button'),
//					'set_shape_button' => $this->input->post('shape_button'),
//                    'set_font_color' => $this->input->post('font_color')
//                );
//                $simpan = $this->SettingModel->tambah($data);
//                if ($simpan > 0){
//                    $this->session->set_flashdata('alert', 'success_post');
//                    redirect('set/monitor2');
//                } else {
//                    $this->session->set_flashdata('alert', 'fail_edit');
//                    redirect('set/monitor2');
//                }

//            }

        }else{

            $data['title'] = 'Setting Monitor';
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
			$data_edit = [
				'ptn_txt' => str_replace(array(':', ','), '', $this->input->post('isi_ptn'))
			];
            // var_dump($data_simpan);exit();
            $simpan = $this->ExtModel->update('andro_id',1,'hr_set_android',$data_simpan);
			if ($simpan >0) {
				$edit = $this->ExtModel->update('ptn_id',5,'hr_ptn',$data_edit);
				redirect('set/android');
			}else{
                redirect('set/android');
            }
        }else{

        $data['title'] = 'Setting Android';
        $setting = $this->ExtModel->getGlobal('hr_set_android');

        $data['jam'] = json_decode($setting[0]['andro_jam'], true);
        $data['ptn'] = json_decode($setting[0]['andro_ptn'], true);
//        var_dump($data['ptn']);exit();
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
