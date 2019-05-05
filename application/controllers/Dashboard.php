<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends MY_Controller {
		public function __construct(){
			parent::__construct();

		}

		public function index(){
			$data['view'] = 'dashboard/index';
			$this->load->view('layout', $data);
		}

		public function index2(){
			$data['view'] = 'dashboard/index2';
			$this->load->view('layout', $data);
		}
	}

?>	