<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Laporan extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('laporan_model', 'laporan_model');
		}

		public function index(){
			$data['all_laporan'] =  $this->laporan_model->get_all_laporan();
			$data['view'] = 'laporan/laporan';
			$this->load->view('layout', $data);
		}
	}
?>