<?php 

class Content extends CI_Controller{

	function __construct(){
		parent::__construct();	
		$this->load->model('content_model', 'content');	
		$this->load->model('category_model', 'category');
		if(!$this->session->userdata('login')){
			redirect('');
		}
		$this->role = $this->session->userdata('user_data')['posisi'];
		$this->user_id   = $this->session->userdata('user_data')['id'];
	}

	public function page($tipe){
		if(in_array($tipe, ['slider', 'service', 'project', 'client', 'blog'])){
			$s = true;
			if($tipe != 'blog'){
				if($this->role != 'Superadmin'){
					$s = false;
				}
			}

			if($s){
				$find['tipe'] = $tipe;
				if($this->role != 'Superadmin'){
					$find['user_id'] = $this->user_id;
				}

				$this->session->set_userdata('menu', $tipe);
				$data['list'] = $this->content->get_detail($find)->result_array();
				$data['tipe'] = $tipe;

				if($tipe == 'client'){
					$data['category'] = $this->category->get_detail('is_active', '1')->result_array();
				}
				$this->template->load('layout/admin', 'admin/content/'.$tipe.'/index', $data);

			}else{
				show_404();
			}
			
		}else{
			show_404();
		}
	}

	public function add($tipe){
		if(in_array($tipe, ['slider', 'service', 'project', 'client', 'blog'])){
			$s = true;
			if($tipe != 'blog'){
				if($this->role != 'Superadmin'){
					$s = false;
				}
			}

			if($s){
				$data['category'] = $this->category->get_data()->result_array();
				$data['tipe'] 	  = $tipe;
				$this->template->load('layout/admin', 'admin/content/'.$tipe.'/add', $data);

			}else{
				show_404();
			}
			
		}else{
			show_404();
		}
	}

	public function edit($tipe, $id){
		if(in_array($tipe, ['slider', 'service', 'project', 'client', 'blog'])){
			$s = true;
			if($tipe != 'blog'){
				if($this->role != 'Superadmin'){
					$s = false;
				}
			}

			if($s){
				$find = [
					'tipe'		 => $tipe,
					'content.id' => $id
				];

				if($this->role != 'Superadmin'){
					$find['user_id'] = $this->user_id;
				}

				$cek = $this->content->get_detail($find);

				if($cek->num_rows() > 0){
					$data['category'] = $this->category->get_data()->result_array();
					$data['tipe'] 	  = $tipe;
					$data['content']  = $cek->row_array();

					$this->template->load('layout/admin', 'admin/content/'.$tipe.'/edit', $data);

				}else{
					show_404();
				}

			}else{
				show_404();
			}
			
		}else{
			show_404();
		}
	}

	public function insert(){
		$this->form_validation->set_rules('tipe', 'Tipe Content', 'in_list[slider,service,project,client,blog]');

		$p = $this->input->post();

		$this->form_validation->set_rules('content_header', 'Judul', 'required');
		$this->form_validation->set_rules('category_id', 'Kategori', 'required');

		if($p['tipe'] != 'client'){
			$this->form_validation->set_rules('content_description', 'Deskripsi', 'required');
			$this->form_validation->set_rules('content_value', 'Isi Konten', 'required');
			$this->form_validation->set_rules('content_slug', 'Slug', 'required');
		}

		if($this->form_validation->run() == TRUE){
			$p['user_id']   = $this->user_id;
			$p['post_time'] = date('Y-m-d H:i:s');
			$s = true;

			if($p['tipe'] != 'blog'){
				if($this->role != 'Superadmin'){
					$s = false;
				}
			}

			if($s){
				$config['upload_path']          = './assets/images/content/';
		        $config['allowed_types']        = 'png|jpg|jpeg';
		        $config['file_name']			= strtolower($p['tipe'])."_".$this->user_id."_".time();
		        $config['max_size']             = 6000;
		        $config['max_width']            = 8000;
		        $config['max_height']           = 8000;

		        $this->load->library('upload', $config);

		        if($this->upload->do_upload('featured_img')){
		        	$upl = $this->upload->data();
		        	$p['featured_img'] = $upl['file_name'];

		        	if($this->content->insert($p)){
						$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-check"></i> Data berhasil dimasukkan','success'));
					}else{
						$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data gagal dimasukkan','danger'));
					}
				}else{
					$this->session->set_flashdata('alert_message', show_alert('<b><i class="fa fa-minus-circle"></i></b> '.$this->upload->display_errors(),'warning'));
				}
			}else{
				show_404();
			}

		}else{
			$this->session->set_flashdata('alert_message', show_alert(validation_errors(),'warning'));
		}

		if($p['tipe'] == 'client'){
			redirect('content/page/client/list');
		}else{
			redirect('content/page/'.$p['tipe'].'/tambah');
		}
		
	}


	public function update($id){
		$find['content.id'] = $id;
		if($this->role != 'Superadmin'){
			$find['user_id'] = $this->user_id;
		}

		$cek = $this->content->get_detail($find);

		if($cek->num_rows() > 0){
			$this->form_validation->set_rules('tipe', 'Tipe Content', 'in_list[slider,service,project,client,blog]');

			$p = $this->input->post();

			$this->form_validation->set_rules('content_header', 'Judul', 'required');
			$this->form_validation->set_rules('category_id', 'Kategori', 'required');

			if($p['tipe'] != 'client'){
				$this->form_validation->set_rules('content_description', 'Deskripsi', 'required');
				$this->form_validation->set_rules('content_value', 'Isi Konten', 'required');
				$this->form_validation->set_rules('content_slug', 'Slug', 'required');
			}

			if($this->form_validation->run() == TRUE){
				$s= true;
				if (!empty($_FILES['featured_img']['name'])){
					$path = './assets/images/content/'.$cek->row_array()['featured_img'];
					if(file_exists($path)){
						unlink($path);
					}

					$config['upload_path']          = './assets/images/content/';
			        $config['allowed_types']        = 'png|jpg|jpeg';
			        $config['file_name']			= strtolower($p['tipe'])."_".$this->user_id."_".time();
			        $config['max_size']             = 6000;
			        $config['max_width']            = 8000;
			        $config['max_height']           = 8000;

			        $this->load->library('upload', $config);

			        if($this->upload->do_upload('featured_img')){
			        	$upl = $this->upload->data();
		        		$p['featured_img'] = $upl['file_name'];
			        }else{
			        	$s = false;
			        }
				}

		        if($s){
		        	if($this->content->update($p, $id)){
						$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-check"></i> Data berhasil diubah','success'));
					}else{
						$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data gagal diubah','danger'));
					}
				}else{
					$this->session->set_flashdata('alert_message', show_alert('<b><i class="fa fa-minus-circle"></i></b> '.$this->upload->display_errors(),'warning'));
				}

			}else{
				$this->session->set_flashdata('alert_message', show_alert(validation_errors(),'warning'));
			}

			if($p['tipe'] == 'client'){
				redirect('content/page/client/list');
			}else{
				redirect('content/page/'.$p['tipe'].'/edit/'.$id);
			}
			

		}else{
			show_404();
		}
	}

	public function delete($tipe, $id){
		if(in_array($tipe, ['slider', 'service', 'project', 'client', 'blog'])){
			$s = true;
			if($tipe != 'blog'){
				if($this->role != 'Superadmin'){
					$s = false;
				}
			}

			if($s){
				$find = [
					'tipe'		 => $tipe,
					'content.id' => $id
				];

				if($this->role != 'Superadmin'){
					$find['user_id'] = $this->user_id;
				}

				$cek = $this->content->get_detail($find)->num_rows();

				if($cek > 0){
					if($this->content->delete($id)){
						$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-check"></i> Data berhasil dihapus','success'));
					}else{
						$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-times"></i> Data gagal dihapus','danger'));
					}

					redirect('content/page/'.$tipe.'/list');

				}else{
					show_404();
				}

			}else{
				show_404();
			}
			
		}else{
			show_404();
		}
	}


	public function set_approval($tipe, $status, $id){
		if(in_array($status, ['approve', 'deny']) &&
		   in_array($tipe, ['slider', 'service', 'project', 'client', 'blog'])
		){
			$find['content.id'] = $id;

			if($this->role != 'Superadmin'){
				$find['user_id'] = $this->user_id;
			}

			$cek = $this->content->get_detail($find);
			if($cek->num_rows() > 0){
				if($status == 'approve'){
					$status = '1';
					$title  = 'Diaktifkan';
				}else{
					$status = '0';
					$title  = 'Dinonaktifkan';
				}

				$this->content->update(['is_post' => $status], $id);
				$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-check"></i> Data berhasil '.$title,'success'));

			}else{
				$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> ID Tidak diketahui','danger'));
			}

			redirect('content/page/'.$tipe.'/list');

		}else{
			show_404();
		}
	}


	public function about_us(){
		if($this->role == 'Superadmin'){
			$data['option'] = $this->db->where('id','1')->get('option')->row_array();
			$this->template->load('layout/admin', 'admin/master_data/about_us', $data);

		}else{
			show_404();
		}
	}

	public function update_about_us(){
		if($this->role == 'Superadmin'){
			$this->form_validation->set_rules('about_us', 'Isi Konten', 'required');
			$p = $this->input->post();
			
			if($this->form_validation->run() == TRUE){
			    $cek = $this->db->get('option');
				$s= true;
				if (!empty($_FILES['about_us_img']['name'])){
					$path = './assets/images/'.$cek->row_array()['about_us_img'];
					if(file_exists($path)){
						unlink($path);
					}

					$config['upload_path']          = './assets/images/';
			        $config['allowed_types']        = 'png|jpg|jpeg';
			        $config['file_name']			= "about_".$this->user_id."_".time();
			        $config['max_size']             = 6000;
			        $config['max_width']            = 8000;
			        $config['max_height']           = 8000;

			        $this->load->library('upload', $config);

			        if($this->upload->do_upload('about_us_img')){
			        	$upl = $this->upload->data();
		        		$p['about_us_img'] = $upl['file_name'];
			        }else{
			        	$s = false;
			        }
				}

		        if($s){
		        	if($this->db->where('id', '1')->update('option', $p)){
						$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-check"></i> Data berhasil diubah','success'));
					}else{
						$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data gagal diubah','danger'));
					}
				}else{
					$this->session->set_flashdata('alert_message', show_alert('<b><i class="fa fa-minus-circle"></i></b> '.$this->upload->display_errors(),'warning'));
				}

			}else{
				$this->session->set_flashdata('alert_message', show_alert(validation_errors(),'warning'));
			}

			redirect('master_data/about_us');

		}else{
			show_404();
		}
	}
}