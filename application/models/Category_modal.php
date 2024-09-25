<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Category_modal extends CI_Model {
    public function get_all_category() {
        $this->db->select('c.cat_id,c.cat_name'); 
        $this->db->from('category c');
        $this->db->where('c.cat_status', 1);
        $query = $this->db->get();
        $results=$query->result();
        return $results;
    }

}

