<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Supplier extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->clear_cache();
        $this->load->model("Supplier_modal");
        $this->load->model("Common_modal");

    }
    function clear_cache(){
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
    public function index() {
        $data['outofStock'] = 0;
        $this->load->view('supplier_main', $data);
    }
    public function sup(){
        $data['sup'] = $this->Common_modal->getAll('supplier');
        $this->load->view('supplier', $data);
    }
    public function save_supplier_ajax(){
        if($this->session->userdata('staff_logged_in')==null){
        	redirect(base_url('back-office'));
         
        }else{
            try {
                $id = $this->input->post('supplier_id');
                $supplier = $this->input->post('supplier');
                $company = $this->input->post('company');
                $phone = $this->input->post('phone');
                $email = $this->input->post('email');

                $data_arr = array();
                
                $data_arr['supplier_name'] = $supplier;
                $data_arr['lc_id'] = 0;
                $data_arr['supplier_phone'] = $phone;
                $data_arr['supplier_email'] = $email;
                $data_arr['company'] = $company;
                $data_arr['region'] = 1;
                $data_arr['city'] = 20;
                $data_arr['date'] = date('Y-m-d');
                $data_arr['status'] = 1;
                
                if($id){
                    $update_status = $this->Common_modal->update('supplier_id',$id,'supplier',$data_arr);    
                    if ($update_status){
                        $res = array('status'=>'success','msg'=>'Supplier Successfully Updated');
                    }else{
                        throw new Exception("Something went wrong :(");
                    }
                }else{
                    $supplier_valid = $this->Common_modal->getAllWhereStr('supplier','supplier_name',$supplier);

                    if ($supplier_valid){
                        throw new Exception("Supplier already exist");
                    }
                    $insert_status = $this->Common_modal->insert('supplier',$data_arr);
                    if ($insert_status){
                        $res = array('status'=>'success','msg'=>'Supplier Successfully Created');
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

    public function payments(){
        $data['payments'] = $this->Supplier_modal->getSupplierPayments();
        $this->load->view('payment', $data);        
    }
}

