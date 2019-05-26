<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('auth_model', 'auth_model');
		}

		public function index(){
			if($this->session->userdata('role') == "Admin")
			{
				redirect('peminjaman');
			}
			else if($this->session->userdata('role') == "Anggota"){
				redirect('sepeda');
			}
			else if($this->session->userdata('role') == "Petugas"){
				redirect('penugasan');
			}
			else{
				redirect('auth/login');
			}
		}

		public function login(){

			if($this->input->post('submit')){
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('nomorKTP', 'Nomor KTP', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('auth/login');
				}
				else {
					$data = array(
					'email' => $this->input->post('email'),
					'nomorKTP' => $this->input->post('nomorKTP')
					);
					$result = $this->auth_model->login($data);
					if ($result == TRUE) {
						$admin_data = array(
							'ktp' => $result['ktp'],
							'role' => $result['role'],
						 	'name' => $result['nama']
						);
						$this->session->set_userdata($admin_data);
						if($this->session->userdata('role') == "Admin")
						{
							redirect('peminjaman');
						}
						else if($this->session->userdata('role') == "Anggota"){
							redirect('sepeda');
						}
						else if($this->session->userdata('role') == "Petugas"){
							redirect('penugasan');
						}
					}
					else{
						$data['msg'] = 'Kombinasi Nomor KTP dan Email salah!';
						$this->load->view('auth/login', $data);
					}
				}
			}
			else{
				$this->load->view('auth/login');
			}
		}	

		public function register(){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('role', 'Role', 'trim|required');
				$this->form_validation->set_rules('nomorKTP', 'Nomor KTP', 'trim|required');
				$this->form_validation->set_rules('namaLengkap', 'Nama Lengkap', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('tglLahir', 'Tanggal Lahir', 'trim|required');
				$this->form_validation->set_rules('nomorTelepon', 'Nomor Telepon', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('auth/register');
				}
				else {
					$data = array(
					'role' => $this->input->post('role'),
					'nomorKTP' => $this->input->post('nomorKTP'),
					'namaLengkap' => $this->input->post('namaLengkap'),
					'email' => $this->input->post('email'),
					'tglLahir' => date('Y-m-d',strtotime($this->input->post('tglLahir'))),
					'nomorTelepon' => $this->input->post('nomorTelepon'),
					'alamat' => $this->input->post('alamat')
					);

					$result = $this->auth_model->checkKTPEmail($data);
					if ($result == TRUE) {
						$data['msg'] = $result;
						$this->load->view('auth/register', $data);
					}
					else {
						//Script register di sini
						$data = $this->security->xss_clean($data);
						$result = $this->auth_model->register($data);
						if ($result == TRUE) {
							$admin_data = array(
								'role' => $result['role'],
								 'name' => $result['nama']
							);
							$this->session->set_userdata($admin_data);
							if($this->session->userdata('role') == "Anggota"){
								print "<script>alert('Pendaftaran Berhasil!') ; window.location.href = '../sepeda'</script>";
							}
							else if($this->session->userdata('role') == "Petugas"){
								print "<script>alert('Pendaftaran Berhasil!') ; window.location.href = '../penugasan'</script>";
							}
						}
					}
				}
			}
			else{
				$this->load->view('auth/register');
			}
		}

		public function logout(){
			$this->session->sess_destroy();
			redirect(base_url('index.php/auth/login'), 'refresh');
		}
			
	}


?>