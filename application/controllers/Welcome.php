<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function index() {
    	if($this->session->userdata('staff_logged_in')==null){
            $this->load->view('login');
        }else {
        	redirect(base_url('back-office'));
        }
        
    }
}
