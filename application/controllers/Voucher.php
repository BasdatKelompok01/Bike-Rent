<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Voucher extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('voucher_model', 'voucher_model');
		}

		public function index(){
			$data['all_vouchers'] =  $this->voucher_model->get_all_voucher();
			$data['view'] = 'voucher/voucher_list';
			$this->load->view('layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
				$this->form_validation->set_rules('poin', 'Poin', 'trim|required');
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
				$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'voucher/voucher_add';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'nama' => $this->input->post('nama'),
						'kategori' => $this->input->post('kategori'),
						'nilai_poin' => $this->input->post('poin'),
						'deskripsi' => $this->input->post('deskripsi'),
						'jumlah' => $this->input->post('jumlah'),
					);
					$data = $this->security->xss_clean($data);

					for ($i=0; $i<$data['jumlah']; $i++){
						$result = $this->voucher_model->add_voucher($data);
					}

					if($result){
						$this->session->set_flashdata('msg', 'Data Voucher Berhasil Ditambahkan!');
						redirect(base_url('index.php/voucher'));
					}
				}
			}
			else{
				$data['view'] = 'voucher/voucher_add';
				$this->load->view('layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
				$this->form_validation->set_rules('poin', 'Poin', 'trim|required');
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['voucher'] = $this->voucher_model->get_voucher_by_id($id);
					$data['view'] = 'voucher/voucher_edit';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'nama' => $this->input->post('nama'),
						'kategori' => $this->input->post('kategori'),
						'nilai_poin' => $this->input->post('poin'),
						'deskripsi' => $this->input->post('deskripsi'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->voucher_model->edit_voucher($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Voucher Berhasil Diupdate!');
						redirect(base_url('index.php/voucher'));
					}
				}
			}
			else{
				$data['voucher'] = $this->voucher_model->get_voucher_by_id($id);
				$data['view'] = 'voucher/voucher_edit';
				$this->load->view('layout', $data);
			}
		}

		public function del($id = 0){
			$id = $_POST['id'];
			$sql = 'DELETE FROM voucher WHERE id_voucher = ?';
			$this->db->query($sql, array($id));
			$this->session->set_flashdata('msg', 'Voucher Berhasil Dihapus!');
			redirect(base_url('index.php/voucher'));
		}

		public function klaim($id = 0, $ktp = ''){
			$ktp = $this->session->userdata('ktp');
			$sql1 = 'SELECT no_kartu FROM anggota a, person b WHERE a.ktp = b.ktp AND a.ktp = ?';
			$query1 = $this->db->query($sql1, array($ktp));
			$result1 = $query1->row_array();
			$nokartu = $result1['no_kartu'];
			
			$sql = 'UPDATE voucher set no_kartu_anggota = ? WHERE id_voucher = ?';
			$this->db->query($sql, array($nokartu, $id));
			$this->session->set_flashdata('msg', 'Voucher Berhasil Diklaim!');
			redirect(base_url('index.php/voucher'));
		}
	}
?>