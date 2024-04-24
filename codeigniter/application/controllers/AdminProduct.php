<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProduct extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AdminProductModel');
        $this->load->model('ProductModel');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $data['products'] = $this->AdminProductModel->get_all_products();
        $this->load->view('edit', $data);
    }
    public function removeproduct($proid) {
        $check = $this->ProductModel->removeproduct($proid);
        if ($check) {
            // Debugging: Check if control reaches this point
            echo "Product removed successfully."; // Remove this in production
            $this->session->set_flashdata('succMsg', 'Product removed successfully.');
            redirect('edit');
        } else {
            // Debugging: Check if control reaches this point
            echo "Failed to remove product."; // Remove this in production
            $this->session->set_flashdata('errMsg', 'Failed to remove product.');
            redirect('edit');
        }
    }
    
    // Add more methods for removing and editing products as needed

}
?>
