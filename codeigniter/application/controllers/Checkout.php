<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('CartModel'); // Load the CartModel
        $this->load->helper('url'); // Load URL Helper
        $this->load->helper('form'); // Load Form Helper
        $this->load->library('session');
        $this->load->library('form_validation');
        if(!empty($this->session->userdata('login_id'))){

        }else{
            redirect('login');
            
        }
    }

    public function index(){
        echo "hello this is chgecout page";
        
    }






}

