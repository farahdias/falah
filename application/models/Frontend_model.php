<?php
 
Class Frontend_model extends CI_Model{

   protected $table = 'content';
    
   public function get_data(){
      return $this->db->get($this->table);
   }

   public function get_detail($key, $val = '', $limit = ''){
      $this->db->select('*, content.id AS content_id')
               ->order_by('content.post_time', 'DESC')
               ->join('user', 'user.id = content.user_id')
               ->join('category', 'category.id = content.category_id');

      if(is_array($key)){
         $this->db->where($key);
      
      }else{
         $this->db->where($key, $val);
      }

      if($limit != ''){
         $this->db->limit($limit);
      }

      return $this;
   }

   public function is_active(){
      $this->db->where('content.is_post', '1')
               ->where('category.is_active', '1');
      return $this;
   }

   public function result($tipe = ''){
      $q = $this->db->get($this->table);
      if($tipe == 'row'){
         return $q->row_array();

      }else if($tipe == 'num'){
         return $q->num_rows();

      }else{
         return $q->result_array();
      }
   }

   public function get_option(){
      return $this->db->get('option')->row_array();
   }

   public function get_category(){
      $this->db->select('*, category.id AS category_id, COUNT(content.id) AS num_content')
                            ->join('content', 'content.category_id = category.id', 'LEFT')
                            ->where('is_post', '1')
                            ->where('is_active', '1')
                            ->where('tipe', 'blog')
                            ->group_by('category.id');
      return $this->db->get('category')->result_array();
   }

   public function get_related_post($content_id){
      $data = [
         'prev' => $this->_content('prev', $content_id),
         'next' => $this->_content('next', $content_id)
      ];
      return $data;
   }

         private function _content($tipe, $id){
            if($tipe == 'next'){
               $this->db->where('id > "'.$id.'"');
            }else{
               $this->db->where('id < "'.$id.'"');
            }

            return $this->db->where('tipe', 'blog')->limit(1)->get('content')->row_array();
         }
}  
