<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_modal extends CI_Model {
    public function get_all_users() {
        $this->db->select('u.user_id,u.Fname,u.Lname,u.nic,s.dob,s.NIC,s.User_name,u.status as userStatus,u.'); 
        $this->db->from('useru u');
        $query = $this->db->get();
        $results=$query->result();
        return $results;
    }

    public function outofStock(){
        $this->db->select('i.*'); 
        $this->db->from('inventory i');
        $this->db->where('i.qty < i.reorder_qty or i.qty = i.reorder_qty');
        $query = $this->db->get();
        $results=$query->result();
        return $results;
    }


}

