<?php
 
Class Category_model extends CI_Model{

   protected $table = 'category';
    
   public function get_data(){
       $this->db->order_by('id', 'DESC');
      return $this->db->get($this->table);
   }

   public function get_detail($key, $val = '', $limit = ''){
      $this->db->order_by('id', 'DESC');

      if(is_array($key)){
         $this->db->where($key);
      
      }else{
         $this->db->where($key, $val);
      }

      if($limit != ''){
         $this->db->limit($limit);
      }

      return $this->db->get($this->table);
   }

   public function insert($data){
      $this->db->insert('category', $data);
      if($this->db->affected_rows() > 0){
         return true;
      }
      return false;
   }

   public function delete($id){
      $this->db->where('id', $id)
               ->delete('category');
      if($this->db->affected_rows() > 0){
         return true;
      }
      return false;
   }

   public function update($data, $id){
      $this->db->where('id', $id)
               ->update('category', $data);
      return true;
   }
}  
