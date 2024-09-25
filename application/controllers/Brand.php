<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Brand extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->clear_cache();
        $this->load->model("Inventory_modal");
        $this->load->model("Common_modal");

    }
    function clear_cache(){
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
    public function index() {
        $data['outofStock'] = 0;
        $this->load->view('brand_main', $data);
    }
    public function brd(){
        if($this->session->userdata('staff_logged_in')==null){
        	redirect(base_url('back-office'));
        }else{
        	$data['brands'] = $this->Common_modal->getAll('brands');
        	$this->load->view('brand', $data);
        }
    }
    public function available_category(){
    	if($this->session->userdata('staff_logged_in')==null){
        	redirect(base_url('back-office'));
         
        }else{
	    	$data['inv'] = $this->Inventory_modal->get_all_inventory();
	        $this->load->view('inventory', $data);
	        
        }
    }
    public function save_brand_ajax(){
        if($this->session->userdata('staff_logged_in')==null){
        	redirect(base_url('back-office'));
         
        }else{
            try {
                $id = $this->input->post('brand_id');
                $brand = $this->input->post('brand');
                $data_arr = array();
                $brand_valid = $this->Common_modal->getAllWhereStr('brands','brand',$brand);

                if ($brand_valid){
                    throw new Exception("Brand already exist");
                }
                
                $data_arr['brand'] = $brand;
                $data_arr['date'] = date('Y-m-d');
                
                if($id){
                    $update_status = $this->Common_modal->update('brand_id',$id,'brands',$data_arr);    
                    if ($update_status){
                        $res = array('status'=>'success','msg'=>'Brand Successfully Updated');
                    }else{
                        throw new Exception("Something went wrong :(");
                    }
                }else{
                    $data_arr['status'] = 1;
                    $insert_status = $this->Common_modal->insert('brands',$data_arr);
                    if ($insert_status){
                        $res = array('status'=>'success','msg'=>'Brand Successfully Created');
                    }else{
                        throw new Exception("Something went wrong :(");
                    }
                }

            } catch (Exception $e) {
                $res = array('status'=>'error','msg'=>$e->getMessage());

            }
	        echo json_encode($res);
        }
    }
}

