<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Acara extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('acara_model', 'acara_model');
			$this->load->model('stasiun_model', 'stasiun_model');
			$this->load->model('Acara_Stasiun_model', 'Acara_Stasiun_model');
		}

		public function index(){
			$data['all_acaras'] =  $this->acara_model->get_all_acara();
			$data['view'] = 'acara/acara_list';
			$this->load->view('layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
				$this->form_validation->set_rules('gratis', 'Gratis', 'trim|required');
				$this->form_validation->set_rules('tglMulai', 'Tanggal Mulai', 'trim|required');
				$this->form_validation->set_rules('tglSelesai', 'Tanggal Selesai', 'trim|required');
				$this->form_validation->set_rules('stasiun[]', 'Stasiun', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'acara/acara_add';
					$data['stasiuns'] = $this->stasiun_model->get_list_stasiun();
					$this->load->view('layout', $data);
				}
				else{
					$start = date('Y-m-d',strtotime($this->input->post('tglMulai')));
					$end = date('Y-m-d',strtotime($this->input->post('tglSelesai')));
					if($end < $start){
						$this->session->set_flashdata('error', 'Tanggal selesai harus lebih besar dari tanggal mulai!');
						$data['view'] = 'acara/acara_add';
						$data['stasiuns'] = $this->stasiun_model->get_list_stasiun();
						$this->load->view('layout', $data);
					}
					else{
						$data = array(
							'judul' => $this->input->post('judul'),
							'deskripsi' => $this->input->post('deskripsi'),
							'is_free' => $this->input->post('gratis'),
							'tgl_mulai' => date('Y-m-d',strtotime($this->input->post('tglMulai'))),
							'tgl_akhir' => date('Y-m-d',strtotime($this->input->post('tglSelesai'))),
						);
						$data = $this->security->xss_clean($data);
						$result = $this->acara_model->add_acara($data);
	
						foreach($this->input->post('stasiun') as $sid){
							$data2 = array(
								'id_acara' => $result,
								'id_stasiun' => $sid,
							);
							$data2 = $this->security->xss_clean($data2);
							$result2 = $this->Acara_Stasiun_model->add_acara_stasiun($data2);
						}
	
						if($result && $result2){
							$this->session->set_flashdata('msg', 'Data Acara Berhasil Ditambahkan!');
							redirect(base_url('acara'));
						}
					}
				}
			}
			else{
				$data['view'] = 'acara/acara_add';
				$data['stasiuns'] = $this->stasiun_model->get_list_stasiun();
				$this->load->view('layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
				$this->form_validation->set_rules('gratis', 'Gratis', 'trim|required');
				$this->form_validation->set_rules('tglMulai', 'Tanggal Mulai', 'trim|required');
				$this->form_validation->set_rules('tglSelesai', 'Tanggal Selesai', 'trim|required');
				$this->form_validation->set_rules('stasiun[]', 'Stasiun', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['acara'] = $this->acara_model->get_acara_by_id($id);
					$data['stasiuns'] = $this->stasiun_model->get_list_stasiun();
					$data['acarastasiun'] = $this->Acara_Stasiun_model->get_acara_stasiun($id);
					$data['view'] = 'acara/acara_edit';
					$this->load->view('layout', $data);
				}
				else{
					$start = date('Y-m-d',strtotime($this->input->post('tglMulai')));
					$end = date('Y-m-d',strtotime($this->input->post('tglSelesai')));
					if($end < $start){
						$this->session->set_flashdata('error', 'Tanggal selesai harus lebih besar dari tanggal mulai!');
						$data['acara'] = $this->acara_model->get_acara_by_id($id);
						$data['stasiuns'] = $this->stasiun_model->get_list_stasiun();
						$data['acarastasiun'] = $this->Acara_Stasiun_model->get_acara_stasiun($id);
						$data['view'] = 'acara/acara_edit';
						$this->load->view('layout', $data);
					}
					else{
						$data = array(
							'judul' => $this->input->post('judul'),
							'deskripsi' => $this->input->post('deskripsi'),
							'is_free' => $this->input->post('gratis'),
							'tgl_mulai' => date('Y-m-d',strtotime($this->input->post('tglMulai'))),
							'tgl_akhir' => date('Y-m-d',strtotime($this->input->post('tglSelesai'))),
						);
						$data = $this->security->xss_clean($data);
						$result = $this->acara_model->edit_acara($data, $id);					
	
						foreach($this->input->post('stasiun') as $sid){
							$data2 = array(
								'id_acara' => $id,
								'id_stasiun' => $sid,
							);
							$data2 = $this->security->xss_clean($data2);
							$result2 = $this->Acara_Stasiun_model->edit_acara_stasiun($data2);
						}
	
						if($result && $result2){
							$this->session->set_flashdata('msg', 'Acara Berhasil Diupdate!');
							redirect(base_url('acara'));
						}
					}
				}
			}
			else{
				$data['acara'] = $this->acara_model->get_acara_by_id($id);
				$data['stasiuns'] = $this->stasiun_model->get_list_stasiun();
				$data['acarastasiun'] = $this->Acara_Stasiun_model->get_acara_stasiun($id);
				$data['view'] = 'acara/acara_edit';
				$this->load->view('layout', $data);
			}
		}

		public function del($id = 0){
			$id = $_POST['id'];
			$sql1 = 'DELETE FROM acara_stasiun WHERE id_acara = ?';
			$this->db->query($sql1, array($id));

			$sql2 = 'DELETE FROM acara WHERE id_acara = ?';
			$this->db->query($sql2, array($id));
			$this->session->set_flashdata('msg', 'Acara Berhasil Dihapus!');
			redirect(base_url('acara'));
		}

	}


?>