<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AdminMain extends Admin_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("Admin_modal");
        $this->load->model('Inventory_modal');
        $this->load->model('Common_modal');
        $this->clear_cache();
    }
    function clear_cache(){
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
    public function index(){
        try{
            $data['out_of_stock'] = $this->Inventory_modal->out_of_stock();
            // $data['monthly_sales'] = $this->Inventory_modal->out_of_stock();
            $data['total_sales'] = $this->Common_modal->getSum('sales');
            $data['invoice'] = $this->Common_modal->getrandomOne('sales', 'sale_id');
            $this->load->view('dashboard', $data);
        }catch(Exception $e){
            redirect(base_url());
        }
    }
}

