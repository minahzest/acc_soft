<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Category extends MY_Controller {
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
        $this->load->view('category_main', $data);
    }
    public function cat(){
        if($this->session->userdata('staff_logged_in')==null){
        	redirect(base_url('back-office'));
        }else{
        	$data['cat'] = $this->Common_modal->getAll('category');
        	$this->load->view('category', $data);
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
    public function save_cat_ajax(){
        if($this->session->userdata('staff_logged_in')==null){
        	redirect(base_url('back-office'));
         
        }else{
            try {
                $id = $this->input->post('cat_id');
                $cat = $this->input->post('category');
                $data_arr = array();
                $category_valid = $this->Common_modal->getAllWhereStr('category','cat_name',$cat);

                if ($category_valid){
                    throw new Exception("Category already exist");
                }
                
                $data_arr['cat_name'] = $cat;
                $data_arr['cat_date'] = date('Y-m-d');
                
                if($id){
                    $update_status = $this->Common_modal->update('cat_id',$id,'category',$data_arr);    
                    if ($update_status){
                        $res = array('status'=>'success','msg'=>'Category Successfully Updated');
                    }else{
                        throw new Exception("Something went wrong :(");
                    }
                }else{
                    $data_arr['cat_status'] = 1;
                    $insert_status = $this->Common_modal->insert('category',$data_arr);
                    if ($insert_status){
                        $res = array('status'=>'success','msg'=>'Category Successfully Created');
                    }else{
                        throw new Exception("Something went wrong :(");
                    }
                }

                $res = array('status'=>'success','msg'=>'Category Successfully Created');
            } catch (Exception $e) {
                $res = array('status'=>'error','msg'=>$e->getMessage());

            }
	        echo json_encode($res);
        }
    }
}

