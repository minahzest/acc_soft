<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Brand_modal extends CI_Model {
    public function get_all_brand() {
        $this->db->select('b.brand_id,b.brand'); 
        $this->db->from('Brands b');
        $this->db->where('b.status', 1);
        $query = $this->db->get();
        $results=$query->result();
        return $results;
    }

}

