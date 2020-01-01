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
    public function monitor4(){
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
        $data['title'] = 'Setting Android';
        $data['setting'] = $this->ExtModel->getGlobal('hr_set_android');
        // echo '<pre>';
        // var_dump($data['jwb']);exit();

        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/android/index',$data);
        $this->load->view('backend/templates/footer',$data);
    }

    public function add_monitor4(){

        if (isset($_POST['add'])) {
            $ptn = $this->input->post('ptn');
            $jwb = $this->input->post('jwb');
            $option = $this->input->post('option');
            
            $data_ptn  = [
                'ptn4_txt' => $ptn 
            ];
            $simpan_ptn = $this->ExtModel->insert('hr_ptn4',$data_ptn);
            if ($simpan_ptn>0) {
                $get_id = $this->Monitor4Model->getIdPtn($ptn);
                for ($i = 0; $i < count($jwb) ; $i++) {
                    $data[$i]=[
                        'jwb4_ket'=> $jwb[$i],
                        'jwb4_option'=> $option[$i],
                        'jwb4_ptn'=> $get_id['ptn4_id']
                    ];
                    $this->ExtModel->insert('hr_jwb4',$data[$i]);
                }
                // var_dump($data[1]);exit();
                $this->session->set_flashdata('alert', 'success_post');
                redirect('set/monitor4');
            }else{
                $this->session->set_flashdata('alert', 'fail_post');
                redirect('set/monitor4');
            }
        }else{

            $data['title'] = 'Add Monitor 4';
            // echo '<pre>';
            // var_dump($data['jwb']);exit();

            $this->load->view('backend/templates/header',$data);
            $this->load->view('backend/monitor4/add',$data);
            $this->load->view('backend/templates/footer',$data);  
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
