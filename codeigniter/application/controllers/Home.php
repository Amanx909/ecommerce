<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->library('session'); // Load session library here
        $this->load->model('HomeModel'); // Load the HomeModel
        $this->load->helper('url'); // Load URL Helper
        $this->load->helper('form'); // Load Form Helper
        $this->load->library('form_validation');
        
        if (!$this->session->userdata('user_id')) {
            $this->session->set_userdata('user_id', mt_rand(11111, 99999));
        }
    }
    
    public function index() {
        // Get data from the model
        $data['banner'] = $this->HomeModel->getbanner();
        $data['categ'] = $this->HomeModel->getcateg();
        $data['products'] = $this->HomeModel->getproducts();
        $data['getcategorynav'] = $this->HomeModel->getcategorynav();
       
       
        // Load views
        $this->load->view('front/index', $data);
        
        
       
    }

    public function productdetails($slug) {
        $data['arr'] = $this->HomeModel->productdetails($slug);
        $this->load->view('front/product-details', $data);
    }

}
?>
