<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Supplier_modal extends CI_Model {
    public function get_all_suppiler() {
        $this->db->select('s.supplier_id,s.supplier_name'); 
        $this->db->from('supplier s');
        $this->db->where('s.status', 1);
        $query = $this->db->get();
        $results=$query->result();
        return $results;
    }

    public function getSupplierPayments(){
        $this->db->select('p.*,s.*,u.Fname,u.Lname,p.date as paid_on'); 
        $this->db->from('payments p');
        $this->db->join('supplier s', 's.supplier_id=p.supplier_id');
        $this->db->join('user u', 'u.user_id=p.admin_id');
        $this->db->where('s.status', 1);
        $query = $this->db->get();
        $results=$query->result();
        return $results;
    }

}

