<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('HomeModel'); // Load the HomeModel
        $this->load->helper('url'); // Load URL Helper
        $this->load->helper('form'); // Load Form Helper
        $this->load->library('session');
        $this->load->library('form_validation');
    }
    
    public function index(){
        // Get banner data from the model
        $data['banner'] = $this->HomeModel->getbanner(); 
        $data['categ'] = $this->HomeModel->getcateg();
        $data['products'] = $this->HomeModel->getproducts();
       
       
        $this->load->view('front/index', $data);
    }

    public function productdetails($slug){
        $data['arr'] = $this->HomeModel->productdetails($slug);
       
        $this->load->view('front/product-details', $data);
    }
}
