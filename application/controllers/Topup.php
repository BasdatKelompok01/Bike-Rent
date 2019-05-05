<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Topup extends MY_Controller {

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$data['view'] = 'topup/topup';
			$this->load->view('layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('topup', 'topup', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'topup/topup';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'username' => $this->input->post('firstname').' '.$this->input->post('lastname'),
						'firstname' => $this->input->post('firstname'),
						'lastname' => $this->input->post('lastname'),
						'email' => $this->input->post('email'),
						'mobile_no' => $this->input->post('mobile_no'),
						'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
						'is_admin' => $this->input->post('user_role'),
						'created_at' => date('Y-m-d : h:m:s'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->user_model->add_user($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('topup'));
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