<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        // Load necessary libraries, model, and helpers
        $this->load->library('session');
        $this->load->model('HomeModel');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        // Generate a random user_id if it doesn't exist in session
        if (!$this->session->userdata('user_id')) {
            $this->session->set_userdata('user_id', mt_rand(11111, 99999));
        }
    }
    
    // Index method to display home page
    public function index() {
        // Get data from the model
        $data['banner'] = $this->HomeModel->getbanner();
        $data['categ'] = $this->HomeModel->getcateg();
        $data['products'] = $this->HomeModel->getproducts();
        $data['getcategorynav'] = $this->HomeModel->getcategorynav();
       
        // Load the home page view with data
        $this->load->view('front/index', $data);
    }

    // Method to display product details
    public function productdetails($slug) {
        $data['arr'] = $this->HomeModel->productdetails($slug);
        // Load the product details view with data
        $this->load->view('front/product-details', $data);
    }

}
?>
