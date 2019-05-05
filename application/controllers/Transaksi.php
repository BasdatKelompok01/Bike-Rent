<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Transaksi extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('user_model', 'user_model');
		}

		public function index(){
			$data['all_users'] =  $this->user_model->get_all_users();
			$data['view'] = 'transaksi/riwayat';
			$this->load->view('layout', $data);
		}
	}
?>