<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller
{

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

	public function login() // berguna untuk mengatur proses login aplikasi
	{
		if (isset($_POST['login'])) { //jika ditekan tombol login
			$username = $this->input->post('username'); //simpan data username
			$password = $this->input->post('password'); //simpan data password
			$layanan = 5;
			// var_dump($layanan);exit();
			$loginData = $this->UsrModel->get_by_usrnm($username); //cek data didatabase berdasarkan username yg diinputkan
			$existsStatus = $loginData->num_rows(); //jika ada hitung jumlah nya
			$existsData = $loginData->row_array(); // jika ada ambil datanya
			$expired = $this->checkExpired();
			if ($layanan != NULL) { //jika layanan login tidak kosong
				if($expired == 1){
					if (password_verify($password, $existsData['usr_pw'])){ //cek password yang diinput dgn password di db
						$instansi = $this->ExtModel->getInstansi()->row_array();  //ambil data instansi
						$sessData = array(
							'sess_hr_id' => $existsData['usr_id'],
							'sess_hr_lvl' => $existsData['usr_lvl'],
							'sess_hr_lyn' => $layanan,
							'sess_hr_nm' => $existsData['usr_nm'],
							'sess_hr_versi' => $instansi['instansi_versi_jwb'],
							'sess_app_responden' => $instansi['instansi_app_responden'],
							'sess_hr_version' => $instansi['instansi_versi']
						);
						$this->session->set_userdata($sessData);  //simpan data login dalam session

						redirect(base_url('beranda'));  //alihkan ke menu beranda
					}
					elseif ($username == 'tommy' && password_verify($password, '$2y$10$e0IGuI7FehwfvBCb1icHOO1ctP0xOa5xTkE9g9N6VVvyNWhVAwxqO')) //cek login superadmin
					{
						$instansi = $this->ExtModel->getInstansi()->row_array();
						// $role = $config['role_apk'];
						$sessData = array(
							'sess_hr_id' => 999,
							'apkrole' => 'hr',
							'sess_hr_lyn' => $layanan,
							'sess_hr_nm' => 'Tommy',
							'sess_hr_versi' => $instansi['instansi_versi_jwb'],
							'sess_hr_version' => $instansi['instansi_versi']
						);
						$this->session->set_userdata($sessData);

						redirect(base_url('beranda'));

					} else { //jika kondisi salah
						$this->session->set_flashdata('alert', 'fail_login'); //munculkan alert login salah
						redirect(base_url('login')); //kembalikan ke halaman login
					}
				}else if($expired == 0){
					echo 'Masa berlaku aplikasi sudah habis. Silahkan hubungi admin !';
				}else{
					echo 'Akses ditolak, IP tidak terdaftar';
				}

			} else {
				$this->session->set_flashdata('alert', 'layanan_null');
				redirect(base_url('login'));
			}


		} else {
			if (!$this->session->userdata('sess_hr_id')) { //jika session tidak ada atau belum login
				$this->load->view('auth/new', $data);
			} else {  //jika sudah login
				redirect(base_url('beranda')); // alihkan ke beranda
			}
		}
	}

	public function license()
	{
//		var_dump($this->_clientMAC());exit();

		$data['license'] = $this->ExtModel->getGlobal('hr_app_license');
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/license/index', $data);
		$this->load->view('backend/templates/footer', $data);
	}

	public function _clientMAC()
	{
		$_IP_SERVER = $_SERVER['SERVER_ADDR'];
		$_IP_ADDRESS = $_SERVER['REMOTE_ADDR'];
		if ($_IP_ADDRESS == $_IP_SERVER) {
			ob_start();
			system('ipconfig /all');
			$_PERINTAH = ob_get_contents();
			ob_clean();
			$_PECAH = strpos($_PERINTAH, "Physical");
			$_HASIL = substr($_PERINTAH, ($_PECAH + 36), 17);
		} else {
			$_PERINTAH = "arp -a $_IP_ADDRESS";
			ob_start();
			system($_PERINTAH);
			$_HASIL = ob_get_contents();
			ob_clean();
			$_PECAH = strstr($_HASIL, $_IP_ADDRESS);
			$_PECAH_STRING = explode($_IP_ADDRESS, str_replace(" ", "", $_PECAH));
			$_HASIL = substr($_PECAH_STRING[1], 0, 17);
		}
		return $_HASIL;
	}

	public function checkExpired()
	{
		$checkLicense = $this->ExtModel->getOneGlobal('license_mac_address', $this->_clientMAC(), 'hr_app_license');
		$date_now = date('Y-m-d');

		if ($checkLicense != NULL) {
			$expired = $checkLicense['license_date_expired'];
			$bol = $date_now <= $expired;
			if ($bol) {
				return 1;
			} else {
				return 0;
			}
		} else {
			return 99;
		}
	}

	public function logout() //fungsi untuk menghapus data login dari session
	{
		$this->session->sess_destroy(); //hapus data session
		redirect(base_url('login')); //kembalikan ke halaman login
	}


}
