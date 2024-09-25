<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Inventory_modal extends CI_Model {
    public function get_all_inventory() {
        $this->db->select('i.*,c.cat_name'); 
        $this->db->from('inventory i');
        $this->db->join('category c', 'c.cat_id=i.cat_id', 'left');
        $this->db->order_by("i.inv_id", "asc");
        $query = $this->db->get();
        $results=$query->result();
        return $results;
    }

    public function getSubInventory($id){
        $this->db->select('si.*,s.company'); 
        $this->db->from('sub_inventory si');
        $this->db->join('supplier s', 's.supplier_id=si.supplier_id', 'left');
        $this->db->order_by("si.sub_inv_id", "asc");
        $this->db->where('si.inv_id', $id);
        $this->db->where('si.sub_inv_status', 1);
        $query = $this->db->get();
        $results=$query->result();
        return $results;
    }

    public function get_main_inventory($id){
        $this->db->select('i.*,c.cat_name,b.brand, count(si.inv_id) as subs'); 
        $this->db->from('inventory i');
        $this->db->where('i.inv_id', $id);
        $this->db->join('category c','c.cat_id=i.cat_id');
        $this->db->join('sub_inventory si','si.inv_id=i.inv_id', 'left');
        $this->db->join('brands b','b.brand_id=i.brand_id AND i.brand_id != 0', 'left');
        $query = $this->db->get();
        $results=$query->result();
        return $results;
    }

    public function get_sub_inventory($id){
        $this->db->select('si.*,b.brand,s.supplier_name'); 
        $this->db->from('sub_inventory si');
        $this->db->where('si.inv_id', $id);
        $this->db->join('brands b','b.brand_id=si.brand_id AND si.brand_id != 0', 'left');
        $this->db->join('supplier s','s.supplier_id=si.supplier_id AND si.supplier_id != 0', 'left');
        $query = $this->db->get();
        $results=$query->result();
        return $results;
    }

    public function out_of_stock(){
        $this->db->select('i.inv_name, i.qty, ROUND(i.qty * 100.0 / i.reorder_qty, 1) AS Percent');
        $this->db->from('inventory i');
        $this->db->where('i.qty <= i.reorder_qty');
        $query = $this->db->get();
        $results = $query->result();
        return $results;
    }
}

