<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $model = ['ExtModel','LynModel','PtnModel','SettingModel'];
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

            // var_dump($data['set2']);
            // exit();
            $this->load->view('backend/templates/header',$data);
            $this->load->view('backend/monitor2/index',$data);
            $this->load->view('backend/templates/footer',$data);
        
        }
    }

    
}
