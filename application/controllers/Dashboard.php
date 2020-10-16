<?php 

class Dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();	
		$this->load->model('user_model');	
		if(!$this->session->userdata('login')){
			redirect('');
		}
	}

	public function index(){
		$this->session->set_userdata('menu', 'dashboard');
		$this->template->load('layout/admin', 'admin/index');
	}
}