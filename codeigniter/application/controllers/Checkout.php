<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('CartModel');

        if(!empty($this->session->userdata('login_id'))){

        }else{
            redirect('login');
            
        }
    }

    public function index(){
        $data['cart'] = $this->CartModel->getcart();
        $data['total'] = $this->CartModel->gettotal();
        $this->load->view('front/checkout',$data);
        
    }
}

