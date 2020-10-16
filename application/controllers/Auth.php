<?php 

class Auth extends CI_Controller{

	function __construct(){
		parent::__construct();	
		$this->load->model('user_model');	
	}

	public function index(){
		if($this->session->userdata('login')){
			redirect('dashboard');
		
		}else{
			$this->load->view('login');
		}
	}

	public function login(){
		$p = $this->input->post();

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == TRUE){

			$check = $this->user_model->get_detail($p);

			if($check->num_rows() > 0){

				$data_user = $check->row_array();
				$this->session->set_userdata('login', true);
				$this->session->set_userdata('user_data', $data_user);
				redirect('dashboard');

			}else{
				$this->session->set_flashdata('alert_message', show_alert('<b><i class="fa fa-danger"></i> Username / Password Salah</b><br> Silahkan masukkan username / password dengan benar','danger'));
				redirect('panel/auth');
			}

		}else{
			$this->session->set_flashdata('alert_message', show_alert(validation_errors(),'danger'));
			redirect('panel/auth');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('panel/auth');
	}
}