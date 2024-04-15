<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->model('ShopModel');
        $this->load->helper('url'); // Load URL Helper
        $this->load->helper('form'); // Load Form Helper
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('CategoryModel');
        $this->load->model('ProductModel'); 
        // Load the HomeModel in the constructor or any method before using it
        $this->load->model('HomeModel');
      
    }

    public function index(){
        // Load all products
        $data['products'] = $this->ShopModel->get_all_products();
        $data['getcategorynav'] = $this->HomeModel->getcategorynav();
        $this->load->view('front/shop', $data);
    }
}
