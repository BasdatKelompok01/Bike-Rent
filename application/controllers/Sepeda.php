<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Sepeda extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('sepeda_model', 'sepeda_model');
			$this->load->model('stasiun_model', 'stasiun_model');
			$this->load->model('anggota_model', 'anggota_model');
			$this->load->model('peminjaman_model', 'peminjaman_model');
		}

		public function index(){
			$data['all_sepedas'] =  $this->sepeda_model->get_all_sepeda();
			$data['view'] = 'sepeda/sepeda_list';
			$this->load->view('layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('merk', 'Merk', 'trim|required');
				$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				$this->form_validation->set_rules('stasiun[]', 'Stasiun', 'trim|required');
				$this->form_validation->set_rules('penyumbang[]', 'Penyumbang', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'sepeda/sepeda_add';
					$data['stasiuns'] = $this->stasiun_model->get_list_stasiun();
					$data['penyumbangs'] = $this->anggota_model->get_list_anggota();
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'merk' => $this->input->post('merk'),
						'jenis' => $this->input->post('jenis'),
						'status' => $this->input->post('status'),
						'stasiun' => $this->input->post('stasiun'),
						'penyumbang' => $this->input->post('penyumbang'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->sepeda_model->add_sepeda($data);
					if($result){
						$this->session->set_flashdata('msg', 'Data Sepeda Berhasil Ditambahkan!');
						redirect(base_url('index.php/sepeda'));
					}
				}
			}
			else{
				$data['view'] = 'sepeda/sepeda_add';
				$data['stasiuns'] = $this->stasiun_model->get_list_stasiun();
				$data['penyumbangs'] = $this->anggota_model->get_list_anggota();
				$this->load->view('layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('merk', 'Merk', 'trim|required');
				$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				$this->form_validation->set_rules('stasiun[]', 'Stasiun', 'trim|required');
				$this->form_validation->set_rules('penyumbang[]', 'Penyumbang', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['sepeda'] = $this->sepeda_model->get_sepeda_by_id($id);
					$data['stasiuns'] = $this->stasiun_model->get_list_stasiun();
					$data['penyumbangs'] = $this->anggota_model->get_list_anggota();
					$data['selectedstasiun'] = $this->sepeda_model->get_selected_stasiun($id);
					$data['selectedanggota'] = $this->sepeda_model->get_selected_anggota($id);
					$data['view'] = 'sepeda/sepeda_edit';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'merk' => $this->input->post('merk'),
						'jenis' => $this->input->post('jenis'),
						'status' => $this->input->post('status'),
						'stasiun' => $this->input->post('stasiun'),
						'penyumbang' => $this->input->post('penyumbang'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->sepeda_model->edit_sepeda($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Sepeda Berhasil Diupdate!');
						redirect(base_url('index.php/sepeda'));
					}
				}
			}
			else{
				$data['sepeda'] = $this->sepeda_model->get_sepeda_by_id($id);
				$data['stasiuns'] = $this->stasiun_model->get_list_stasiun();
				$data['penyumbangs'] = $this->anggota_model->get_list_anggota();
				$data['selectedstasiun'] = $this->sepeda_model->get_selected_stasiun($id);
				$data['selectedanggota'] = $this->sepeda_model->get_selected_anggota($id);
				$data['view'] = 'sepeda/sepeda_edit';
				$this->load->view('layout', $data);
			}
		}

		public function del($id = 0){
			$id = $_POST['id'];
			$sql = 'DELETE FROM sepeda WHERE nomor = ?';
			$this->db->query($sql, array($id));
			$this->session->set_flashdata('msg', 'Sepeda Berhasil Dihapus!');
			redirect(base_url('index.php/sepeda'));
		}

		public function pinjam($id = 0){
			$data = array(
				'sepeda' => $id,
				'datetime_pinjam' => date('Y-m-d H:i'),
			);
			$data = $this->security->xss_clean($data);
			$result = $this->peminjaman_model->add_peminjaman($data);
			if($result){
				$this->session->set_flashdata('msg', 'Berhasil melakukan peminjaman!');
				redirect(base_url('index.php/peminjaman'));
			}
		}
	}
?>