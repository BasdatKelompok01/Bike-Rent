<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AdminLTE extends CI_Controller {
		public function index(){
			redirect(base_url('auth'));
		}
		public function top_nav(){
			$this->load->view('adminlte/layout/top-nav');
		}
		public function boxed(){
			$this->load->view('adminlte/layout/boxed');
		}
		public function fixed(){
			$this->load->view('adminlte/layout/fixed');
		}
		public function collapsed_sidebar(){
			$this->load->view('adminlte/layout/collapsed-sidebar');
		}
		public function widgets(){
			$data['view'] = 'adminlte/widgets';
			$this->load->view('layout', $data);
		}

		public function chartjs(){
			$data['view'] = 'adminlte/charts/chartjs';
			$this->load->view('layout', $data);
		}
		public function morris(){
			$data['view'] = 'adminlte/charts/morris';
			$this->load->view('layout', $data);
		}
		public function flot(){
			$data['view'] = 'adminlte/charts/flot';
			$this->load->view('layout', $data);
		}
		public function inline(){
			$data['view'] = 'adminlte/charts/inline';
			$this->load->view('layout', $data);
		}
		public function buttons(){
			$data['view'] = 'adminlte/ui/buttons';
			$this->load->view('layout', $data);
		}
		public function general(){
			$data['view'] = 'adminlte/ui/general';
			$this->load->view('layout', $data);
		}
		public function icons(){
			$data['view'] = 'adminlte/ui/icons';
			$this->load->view('layout', $data);
		}
		public function modals(){
			$data['view'] = 'adminlte/ui/modals';
			$this->load->view('layout', $data);
		}
		public function sliders(){
			$data['view'] = 'adminlte/ui/sliders';
			$this->load->view('layout', $data);
		}
		public function timeline(){
			$data['view'] = 'adminlte/ui/timeline';
			$this->load->view('layout', $data);
		}
		public function general_form(){
			$data['view'] = 'adminlte/forms/general';
			$this->load->view('layout', $data);
		}
		public function advanced_form(){
			$data['view'] = 'adminlte/forms/advanced';
			$this->load->view('layout', $data);
		}
		public function editors_form(){
			$data['view'] = 'adminlte/forms/editors';
			$this->load->view('layout', $data);
		}
		public function simple_table(){
			$data['view'] = 'adminlte/tables/simple';
			$this->load->view('layout', $data);
		}
		public function data_table(){
			$data['view'] = 'adminlte/tables/data';
			$this->load->view('layout', $data);
		}
		public function calendar(){
			$data['view'] = 'adminlte/calendar';
			$this->load->view('layout', $data);
		}
		public function inbox(){
			$data['view'] = 'adminlte/mailbox/mailbox';
			$this->load->view('layout', $data);
		}
		public function compose(){
			$data['view'] = 'adminlte/mailbox/compose';
			$this->load->view('layout', $data);
		}
		public function read_mail(){
			$data['view'] = 'adminlte/mailbox/read-mail';
			$this->load->view('layout', $data);
		}
		public function invoice(){
			$data['view'] = 'adminlte/examples/invoice';
			$this->load->view('layout', $data);
		}
		public function profile(){
			$data['view'] = 'adminlte/examples/profile';
			$this->load->view('layout', $data);
		}
		public function login(){
			$this->load->view('adminlte/examples/login');
		}
		public function register(){
			$this->load->view('adminlte/examples/register');
		}
		public function lockscreen(){
			$this->load->view('adminlte/examples/lockscreen');
		}
		public function error404(){
			$data['view'] = 'adminlte/examples/404';
			$this->load->view('layout', $data);
		}
		public function errro500(){
			$data['view'] = 'adminlte/examples/500';
			$this->load->view('layout', $data);
		}
		public function blank(){
			$data['view'] = 'adminlte/examples/blank';
			$this->load->view('layout', $data);
		}
		public function pace(){
			$data['view'] = 'adminlte/examples/pace';
			$this->load->view('layout', $data);
		}




	}