<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProduct extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary models, helper, and library
        $this->load->model('AdminProductModel');
        $this->load->model('ProductModel');
        $this->load->helper('url');
        $this->load->library('session');
    }

    // Index method to display all products
    public function index() {
        $data['products'] = $this->AdminProductModel->get_all_products();
        // Load the view to display product editing options
        $this->load->view('edit', $data);
    }

    // Method to remove a product
    public function removeproduct($proid) {
        // Call the model method to remove the product
        $check = $this->ProductModel->removeproduct($proid);
        if ($check) {
            // If the product is successfully removed, set flash data message and redirect
            $this->session->set_flashdata('succMsg', 'Product removed successfully.');
            redirect('AdminProduct');
        } else {
            // If there is an error in removing the product, set flash data message and redirect
            $this->session->set_flashdata('errMsg', 'Product removal failed.');
            redirect('AdminProduct');
        }
    }
}
?>
