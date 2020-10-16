<?php 

class Frontend extends CI_Controller{

	function __construct(){
		parent::__construct();	
		$this->load->model('frontend_model', 'fm');
	}

	public function index(){
		$data['slider'] 	= $this->fm->get_detail('tipe', 'slider', 4)
								   	   ->is_active()->result();
		$data['service'] 	= $this->fm->get_detail('tipe', 'service')
									   ->is_active()->result();
		$data['project'] 	= $this->fm->get_detail('tipe', 'project')
									   ->is_active()->result();
		$data['client'] 	= $this->fm->get_detail('tipe', 'client')
									   ->is_active()->result();
		$data['blog'] 	= $this->fm->get_detail('tipe', 'blog', 6)
									   ->is_active()->result();
									   
		$data['category'] = $this->db->order_by('category_name','ASC')->where('is_active','1')->get('category')->result_array();

		$data['option'] 	= $this->fm->get_option();
		$this->session->set_userdata('category', $data['category']);
		$this->session->set_userdata('service', $data['service']);
		$this->template->load('layout/frontend','frontend/index', $data);
	}

	public function blog(){
		$data['category'] = $this->fm->get_category();
		$data['blog']	  = $this->fm->get_detail('tipe', 'blog')
									   ->is_active()->result();
		$data['header']   = 'Daftar Blog';
		$this->template->load('layout/frontend','frontend/article/index', $data);
	}
	
	public function category($cat_id){
		$cek = $this->db->where([
		                    'id' => $cat_id,
		                    'is_active' => '1'
		                ])->get('category');
		
		if($cek->num_rows() > 0){
		    $data['category'] = $cek->row_array();
		    $data['blog']     = $this->fm->get_detail([
		                                    'tipe' => 'blog',
		                                    'category_id' => $cat_id
		                                ])
									   ->is_active()->result();
			
			$data['all_category'] = $this->fm->get_category();					   
    		$data['header']   = 'Kategori '.$data['category']['category_name'];
    		$this->template->load('layout/frontend','frontend/article/category', $data);
		}else{
		    show_404();
		}
		
	}

	public function contact(){
		$this->template->load('layout/frontend','frontend/contact');
	}
    
    public function about_us(){
        $data['option'] 	= $this->fm->get_option();
		$this->template->load('layout/frontend','frontend/about', $data);
	}
	
	public function detail_page($page, $content_id, $slug){
		if(in_array($page, ['article','service'])){
			$find['content.id'] = $content_id;
			if($page == 'service'){
				$find['content.tipe'] = 'service';
			}

			$cek = $this->fm->get_detail($find)->is_active()->result('row');

			if($cek != ''){
				if($slug == $cek['content_slug']){
					if($page == 'service'){
						$data['service'] = $this->fm->get_detail('tipe', 'service')
									   				->is_active()->result();
					}else{
						$data['related'] = $this->fm->get_related_post($content_id);
					}

					$data['page'] = $cek;
					$data['page_type'] = $page;
					$this->template->load('layout/frontend','frontend/article/detail', $data);
				}else{
					redirect($page."/".$content_id."/".$cek['content_slug']);
				}

			}else{
				show_404();
			}
		}else{
			show_404();
		}
	}
}