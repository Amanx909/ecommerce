<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('OrderModel');
        $this->load->library('session');
        $this->load->helper('url');
    }



      
    
    public function index() {
        $data['orders'] = $this->OrderModel->get_orders_by_user($this->session->userdata('user_id'));
        $this->load->view('front/order', $data);
    }
}