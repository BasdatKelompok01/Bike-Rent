<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Stasiun extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('stasiun_model', 'stasiun_model');
		}

		public function index(){
			$data['all_stasiuns'] =  $this->stasiun_model->get_all_stasiun();
			$data['view'] = 'stasiun/stasiun_list';
			$this->load->view('layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
				$this->form_validation->set_rules('longitude', 'longitude', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'stasiun/stasiun_add';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'nama' => $this->input->post('nama'),
						'alamat' => $this->input->post('alamat'),
						'lat' => $this->input->post('latitude'),
						'long' => $this->input->post('longitude'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->stasiun_model->add_stasiun($data);
					if($result){
						$this->session->set_flashdata('msg', 'Data Stasiun Berhasil Ditambahkan!');
						redirect(base_url('index.php/stasiun'));
					}
				}
			}
			else{
				$data['view'] = 'stasiun/stasiun_add';
				$this->load->view('layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
				$this->form_validation->set_rules('longitude', 'longitude', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['stasiun'] = $this->stasiun_model->get_stasiun_by_id($id);
					$data['view'] = 'stasiun/stasiun_edit';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'nama' => $this->input->post('nama'),
						'alamat' => $this->input->post('alamat'),
						'lat' => $this->input->post('latitude'),
						'long' => $this->input->post('longitude'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->stasiun_model->edit_stasiun($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Stasiun Berhasil Diupdate!');
						redirect(base_url('index.php/stasiun'));
					}
				}
			}
			else{
				$data['stasiun'] = $this->stasiun_model->get_stasiun_by_id($id);
				$data['view'] = 'stasiun/stasiun_edit';
				$this->load->view('layout', $data);
			}
		}

		public function del(){
			$id = $_POST['id'];
			$sql = 'DELETE FROM stasiun WHERE id_stasiun = ?';
			$this->db->query($sql, array($id));
			$this->session->set_flashdata('msg', 'Stasiun Berhasil Dihapus!');
			redirect(base_url('index.php/stasiun'));
		}

	}


?>