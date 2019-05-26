<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Peminjaman extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('peminjaman_model', 'peminjaman_model');
			$this->load->model('sepeda_model', 'sepeda_model');
		}

		public function index(){
			$data['all_peminjamans'] =  $this->peminjaman_model->get_all_peminjaman();
			$data['view'] = 'peminjaman/peminjaman_list';
			$this->load->view('layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('sepeda[]', 'Sepeda', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'peminjaman/peminjaman_add';
					$data['sepedas'] = $this->sepeda_model->get_list_sepeda();
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'sepeda' => $this->input->post('sepeda'),
						'datetime_pinjam' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->peminjaman_model->add_peminjaman($data);
					if($result){
						$this->session->set_flashdata('msg', 'Berhasil meminjam sepeda!');
						redirect(base_url('index.php/peminjaman'));
					}
				}
			}
			else{
				$data['view'] = 'peminjaman/peminjaman_add';
				$data['sepedas'] = $this->sepeda_model->get_list_sepeda();
				$this->load->view('layout', $data);
			}
			
		}

		public function kembalikan($id1 = 0, $id2 = 0, $id3 = 0, $id4 = 0){
			$data = array(
				'no_kartu_anggota' => $id1,
				'datetime_pinjam' => $id2,
				'nomor_sepeda' => $id3,
				'id_stasiun' => $id4,
				'datetime_kembali' => date('Y-m-d H:i'),
			);
			$data = $this->security->xss_clean($data);
			$result = $this->peminjaman_model->pengembalian($data);
			if($result){
				$this->session->set_flashdata('msg', 'Berhasil mengembalikan sepeda!');
				redirect(base_url('index.php/peminjaman'));
			}
		}

	}


?>