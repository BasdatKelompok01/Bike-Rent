<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Topup extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('transaksi_model', 'transaksi_model');
		}

		public function index(){
			$data['view'] = 'topup/topup';
			$this->load->view('layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'topup/topup';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'nominal' => $this->input->post('nominal'),
						'datetime_now' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->transaksi_model->add_transaksi_topup($data);
					if($result){
						$this->session->set_flashdata('msg', 'Berhasil melakukan Topup ShareBike Pay!');
						redirect(base_url('index.php/transaksi'));
					}
				}
			}
			else{
				$data['view'] = 'topup/topup';
				$this->load->view('layout', $data);
			}
			
		}
	}
?>