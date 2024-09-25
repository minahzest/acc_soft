<?php

class System_login extends CI_Model {
	function getAllWhere($table,$idName,$val){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($idName, $val);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row();
        }else{
          return false;
        }
    }
    function get_login_user($username) {
        $this -> db -> select('user.*'); 
        $this -> db -> from('user');
        $this->db->where('user_name', $username);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row();
        }else{
          return false;
        }
    }
    function getSecStatus(){
        $this->db->select('system_security.*'); 
        $this->db->from('system_security');
        $this->db->where('status', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row();
        }else{
          return false;
        }
    }
}

