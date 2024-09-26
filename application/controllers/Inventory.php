<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Inventory extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->clear_cache();
        $this->load->model("Inventory_modal");
        $this->load->model("Supplier_modal");
        $this->load->model("Category_modal");
        $this->load->model("Brand_modal");
        $this->load->model("Common_modal");
    }
    function clear_cache(){
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
    public function index() {
        $data['outofStock'] = 0;
        $this->load->view('inventory_main', $data);
    }
    public function invent(){
        $data['inv'] = $this->Inventory_modal->get_all_inventory();
        $this->load->view('inventory', $data);
    }
    public function getInventory(){
        try{
            $inv = $this->Inventory_modal->get_all_inventory();
            if($inv){
                $resp = array("status" => "success","data" => $inv);
            }else{
                $resp = array("status" => "error","data" => $inv);
            }
        }catch(Exception $e){
            $resp = array("status" => "error","message" => "Something went wrong");
        }

        echo json_encode($resp);
    }
    public function getSubInventory(){
        try {
            $id = $this->input->post('id');
            $results = $this->Inventory_modal->getSubInventory($id);
            $inv = $this->Common_modal->getAllWhere('inventory','inv_id',$id);
            if($inv){
                $resp = array("status" => "success","message" => $results,"data" => $inv);
            }else{
                $resp = array("status" => "error","message" => "No Sub Inventories");
            }
        } catch (Exception $e) {
            $resp = array("status" => "error","message" => "Something went wrong");
        }

        echo json_encode($resp);
    }
    public function createInventory(){
    	if($this->session->userdata('staff_logged_in')==null){
            $this->load->view('login');
        }else {
	        $data['inv'] = $this->Inventory_modal->get_all_inventory();
	        $data['sup'] = $this->Supplier_modal->get_all_suppiler();
	        $data['brd'] = $this->Brand_modal->get_all_brand();
	        $data['cat'] = $this->Category_modal->get_all_category();
	        $this->load->view('add_inventory', $data);
        
        }

    }
    public function getInvDetails(){
        $id = $this->input->post('id');
        $data['MainInv'] = $this->Inventory_modal->get_main_inventory($id);
        $data['SubInv'] = $this->Inventory_modal->get_sub_inventory($id);
        echo json_encode($data);
    }


    // inventory CRUD
    public function addInventory(){
        $main_inv = $this->input->post('InvMain');
        $inv_name = $this->input->post('invName');
        $sup = $this->input->post('supplier');
        $brand = $this->input->post('brand');
        $cost = $this->input->post('cost');
        $selling_price = $this->input->post('SP');
        $qty = $this->input->post('qty');
        $cat = $this->input->post('cat');
        $re_order = $this->input->post('reqty');
        $date = date('Y-m-d');

        $insert_data = array(
            'supplier_id' => $sup, 
            'brand_id' => $brand,
            'qty' => $qty,
            'cost' => $cost,
            'selling_price' => $selling_price,
            'barcode' => '',
        );
        
        $main_inv = ''; //this is to not create sub inventory
        if ($main_inv == null || $main_inv == '') {
            $insert_data['cat_id'] = $cat;
            $insert_data['sub_inv_flag'] = 0;
            $insert_data['inv_name'] = $inv_name;
            $insert_data['reorder_qty'] = $re_order;
            $insert_data['inv_status'] = 1;
            $insert_data['inv_date'] = $date;
            $insert_id = $this->Common_modal->insert('inventory',$insert_data);
            $this->Common_modal->update('inv_id',$insert_id,'inventory',array('inv_code' => 10000000+$insert_id));

        }else{
            $insert_data['inv_id'] = $main_inv;
            $insert_data['specification'] = $inv_name;
            $insert_data['sub_inv_status'] = 1;
            $insert_data['sub_inv_date'] = $date;
            $insert_id = $this->Common_modal->insert('sub_inventory',$insert_data);
            $this->Common_modal->update('inv_id',$main_inv,'inventory',array('sub_inv_flag' => 1));
            $this->Common_modal->increaseQty($main_inv,$qty);

        }

        if ($insert_id){
        	$resp = array("status" => "success","message" => "Successfully Added");

        }else{
	        $resp = array("status" => "error","message" => "Something went wrong :(");

        }
        echo json_encode($resp);
    }
    public function check_name_ajax(){
        try {
            $id = $this->input->post('id');
            $name = $this->input->post('name');

            $results = $this->Common_modal->checkValue($id,$name);
            if($results){
                $resp = array("status" => "error");
            }else{
                $resp = array("status" => "success");
            }
        } catch (Exception $e) {
            $resp = array("status" => "error");
        }

        echo json_encode($resp);        
    }
    public function update_inv_ajax(){
        try {
            $id = $this->input->post('operation_id');
            $data['inv_name'] = $this->input->post('pro_name');
            $data['cost'] = $this->input->post('cost');
            $data['qty'] = $this->input->post('qty');
            $data['reorder_qty'] = $this->input->post('re-qty');
            $data['selling_price'] = $this->input->post('selling_price');


            $results = $this->Common_modal->update('inv_id',$id,'inventory',$data);
            if($results){
                $resp = array("status" => "success");
            }else{
                $resp = array("status" => "error");
            }
        } catch (Exception $e) {
            $resp = array("status" => "error");
        }

        echo json_encode($resp);        
    }
}
