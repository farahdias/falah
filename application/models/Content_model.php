<?php
 
Class Content_model extends CI_Model{

   protected $table = 'content';
    
   public function get_data(){
       $this->db->select('*, content.id AS content_id')
                ->order_by('content.post_time', 'DESC')
                ->join('user', 'user.id = content.user_id')
                ->join('category', 'category.id = content.category_id');
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

      $this->db->order_by('post_time', 'DESC');
      return $this->db->get('content');
   }

   public function insert($data){
      $this->db->insert('content', $data);
      if($this->db->affected_rows() > 0){
         return true;
      }
      return false;
   }

   public function delete($id){
      $this->db->where('id', $id)
               ->delete('content');
      if($this->db->affected_rows() > 0){
         return true;
      }
      return false;
   }

   public function update($data, $id){
      $this->db->where('id', $id)
               ->update('content', $data);
      return true;
   }
}  
