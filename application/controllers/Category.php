<?php 

class Category extends CI_Controller{

	function __construct(){
		parent::__construct();	
		$this->load->model('category_model', 'category');	
		if(!$this->session->userdata('login')){
			redirect('');
		}
		$this->role = $this->session->userdata('user_data')['posisi'];
		$this->user_id   = $this->session->userdata('user_data')['id'];
	}

	public function index(){
		if($this->role == 'Superadmin'){
			$this->session->set_userdata('menu', 'category');
			$data['list'] = $this->category->get_data()->result_array();
			$this->template->load('layout/admin', 'admin/master_data/category/index', $data);
		}else{
			show_404();
		}
	}

	public function insert(){
		$p = $this->input->post();

		$this->form_validation->set_data($p);
		$this->form_validation->set_rules('category_name', 'Nama Kategori', 'required|is_unique[category.category_name]');

		if($this->form_validation->run() == TRUE){

			if($this->category->insert($p)){
				$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-check"></i> Data berhasil dimasukkan','success'));
			}else{
				$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data gagal dimasukkan','danger'));
			}

		}else{
			$this->session->set_flashdata('alert_message', show_alert(validation_errors(),'warning'));
		}

		redirect('master_data/category/');
	}

	public function update(){
		$p  = $this->input->post();
		$id = $p['id_category'];
		$s  = false;

		unset($p['id_category']);

		$this->form_validation->set_data($p);
		$this->form_validation->set_rules('category_name', 'Nama Kategori', 'required');

		$cek = $this->category->get_detail('id', $id)->row_array();
		
		if($p['category_name'] == $cek['category_name']){
			$s = true;
		
		}else{
			$cek = $this->category->get_detail('category_name', $p['category_name'])->num_rows();
			if($cek == 0){
				$s = true;
			}
			$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-warning"></i> Nama Kategori sudah ada','warning'));
		}

		if($s){
			if($this->form_validation->run() == TRUE){

				if($this->category->update($p, $id)){
					$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-check"></i> Data berhasil diubah','success'));
				}else{
					$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data gagal diubah','danger'));
				}

			}else{
				$this->session->set_flashdata('alert_message', show_alert(validation_errors(),'warning'));
			}
		}

		redirect('master_data/category/');
	}

	public function delete($id){

		if($this->category->delete($id)){
			$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-check"></i> Data berhasil dihapus','success'));
		}else{
			$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data gagal dihapus','danger'));
		}

		redirect('master_data/category/');
	}

	public function set_approval($tipe, $id){
		if($this->role == 'Superadmin' && in_array($tipe, ['approve', 'deny'])){
			$cek = $this->category->get_detail('id', $id);
			if($cek->num_rows() > 0){
				
				if($tipe == 'approve'){
					$status = '1';
					$title  = 'Diaktifkan';
				}else{
					$status = '0';
					$title  = 'Dinonaktifkan';
				}

				$this->category->update(['is_active' => $status], $id);
				$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-check"></i> Data berhasil '.$title,'success'));

			}else{
				$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> ID Tidak diketahui','danger'));
			}

			redirect('master_data/category');
		}else{
			show_404();
		}
	}

}