<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if(!empty($this->session->userdata('login_id'))){

        }else{
            redirect('login');
            
        }
    }

    public function index(){
      echo"hello this is checkout"  ;
        
    }
}

