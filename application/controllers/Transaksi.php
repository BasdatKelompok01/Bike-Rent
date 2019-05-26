<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Transaksi extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('transaksi_model', 'transaksi_model');
		}

		public function index(){
			$data['all_transaksi'] =  $this->transaksi_model->get_all_transasi_by_ktp();
			$data['view'] = 'transaksi/riwayat';
			$this->load->view('layout', $data);
		}
	}
?>