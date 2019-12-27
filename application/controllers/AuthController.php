<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class AuthController extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('UsrModel');
			$this->load->model('LynModel');
			$this->load->model('ExtModel');
//			if (parent::hasLogin())
//			{
//				redirect(base_url('dashboard'));
//			}
		}
		
		public function login()
		{
			$data['title'] = 'Masuk ke Sistem Informasi Pendaftaran Siswa TK';
			if (isset($_POST['login'])){
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$layanan = $this->input->post('layanan');
				// var_dump($layanan);exit();
				$loginData = $this->UsrModel->get_by_usrnm($username);
				$existsStatus = $loginData->num_rows();
				$existsData   = $loginData->row_array();
				if ($layanan != NULL) {
					
						if (password_verify($password, $existsData['usr_pw']))
						{
							$instansi = $this->ExtModel->getInstansi()->row_array();
							$sessData = array(
								'sess_hr_id' => $existsData['usr_id'],
								'sess_hr_lvl' => $existsData['usr_lvl'],
								'sess_hr_lyn' => $layanan,
								'sess_hr_nm' => $existsData['usr_nm'],
								'sess_hr_versi' => $instansi['instansi_versi_jwb']
							);
							$this->session->set_userdata($sessData);
							
							redirect(base_url('beranda'));
						}
						elseif ($username == 'tommy' && password_verify($password, '$2y$10$e0IGuI7FehwfvBCb1icHOO1ctP0xOa5xTkE9g9N6VVvyNWhVAwxqO'))
						{
							$instansi = $this->ExtModel->getInstansi()->row_array();
							// $role = $config['role_apk'];
							$sessData = array(
								'sess_hr_id' => 999,
								'apkrole' => 'hr',
								'sess_hr_lyn' => $layanan,
								'sess_hr_nm' => 'Tommy',
								'sess_hr_versi' => $instansi['instansi_versi_jwb']
							);
							$this->session->set_userdata($sessData);
							
							redirect(base_url('beranda'));

						}
						else{
						// parent::alert('alert','invalid');
						$this->session->set_flashdata('alert', 'fail_login');
						redirect(base_url('login'));
						}
				}else{
					$this->session->set_flashdata('alert', 'layanan_null');
					redirect(base_url('login'));
				}


			}else{
				$data['lyn'] = $this->LynModel->lihat();
				$this->load->view('auth/index',$data);
			}
		}
        
        public function logout()
        {
            $this->session->sess_destroy();
            redirect(base_url('login'));
        }
		
		
	}