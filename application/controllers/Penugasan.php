<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Penugasan extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('penugasan_model', 'penugasan_model');
			$this->load->model('stasiun_model', 'stasiun_model');
			$this->load->model('petugas_model', 'petugas_model');
		}

		public function index(){
			$data['all_penugasan'] =  $this->penugasan_model->get_all_penugasan();
			$data['view'] = 'penugasan/penugasan_list';
			$this->load->view('layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('petugas[]', 'Petugas', 'trim|required');
				$this->form_validation->set_rules('tglMulai', 'Waktu Mulai', 'trim|required');
				$this->form_validation->set_rules('tglSelesai', 'Waktu Selesai', 'trim|required');
				$this->form_validation->set_rules('stasiun[]', 'Stasiun', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'penugasan/penugasan_add';
					$data['stasiuns'] = $this->stasiun_model->get_list_stasiun();
					$data['petugass'] = $this->petugas_model->get_list_petugas();
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'petugas' => $this->input->post('petugas'),
						'tglMulai' => date('Y-m-d : H:i:s',strtotime($this->input->post('tglMulai'))),
						'tglSelesai' =>date('Y-m-d : H:i:s',strtotime($this->input->post('tglSelesai'))),
						'stasiun' => $this->input->post('stasiun'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->penugasan_model->add_penugasan($data);
					if($result){
						$this->session->set_flashdata('msg', 'Data Penugasan Berhasil Ditambahkan!');
						redirect(base_url('index.php/penugasan'));
					}
				}
			}
			else{
				$data['view'] = 'penugasan/penugasan_add';
				$data['stasiuns'] = $this->stasiun_model->get_list_stasiun();
				$data['petugass'] = $this->petugas_model->get_list_petugas();
				$this->load->view('layout', $data);
			}
			
		}

		public function edit($id = 0, $id2 = 0, $id3 = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('petugas[]', 'Petugas', 'trim|required');
				$this->form_validation->set_rules('tglMulai', 'Waktu Mulai', 'trim|required');
				$this->form_validation->set_rules('tglSelesai', 'Waktu Selesai', 'trim|required');
				$this->form_validation->set_rules('stasiun[]', 'Stasiun', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['penugasan'] = $this->penugasan_model->get_penugasan_by_id($id, $id2, $id3);
					$data['stasiuns'] = $this->stasiun_model->get_list_stasiun();
					$data['petugass'] = $this->petugas_model->get_list_petugas();
					$data['selectedstasiun'] = $this->penugasan_model->get_selected_stasiun($id, $id2, $id3);
					$data['selectedpetugas'] = $this->penugasan_model->get_selected_petugas($id, $id2, $id3);
					$data['view'] = 'penugasan/penugasan_edit';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'petugas' => $this->input->post('petugas'),
						'tglMulai' => date('Y-m-d : H:i:s',strtotime($this->input->post('tglMulai'))),
						'tglSelesai' =>date('Y-m-d : H:i:s',strtotime($this->input->post('tglSelesai'))),
						'stasiun' => $this->input->post('stasiun'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->penugasan_model->edit_penugasan($data, $id, $id2, $id3);
					if($result){
						$this->session->set_flashdata('msg', 'Penugasan Berhasil Diupdate!');
						redirect(base_url('index.php/penugasan'));
					}
				}
			}
			else{
				$data['penugasan'] = $this->penugasan_model->get_penugasan_by_id($id, $id2, $id3);
				$data['stasiuns'] = $this->stasiun_model->get_list_stasiun();
				$data['petugass'] = $this->petugas_model->get_list_petugas();
				$data['selectedstasiun'] = $this->penugasan_model->get_selected_stasiun($id, $id2, $id3);
				$data['selectedpetugas'] = $this->penugasan_model->get_selected_petugas($id, $id2, $id3);
				$data['view'] = 'penugasan/penugasan_edit';
				$this->load->view('layout', $data);
			}
		}

		public function del(){
			$id = $_POST['id'];
			$arr = explode("#", $id);

			$vktp = $arr[0];
			$vstart = $arr[1];
			$vstas = $arr[2];

			$sql = 'DELETE FROM penugasan WHERE ktp = ? and start_datetime = ? and id_stasiun = ?';
			$this->db->query($sql, array($vktp, $vstart, $vstas));
			$this->session->set_flashdata('msg', 'Penugasan Berhasil Dihapus!');
			redirect(base_url('index.php/penugasan'));
		}

	}


?>