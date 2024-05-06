<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // Load the CartModel
        $this->load->model('CartModel');
        // Load the session library
        $this->load->library('session');
    }
    
    // Method to display the cart
    public function index(){
        // Get cart data and total from CartModel
        $data['cart'] = $this->CartModel->getcart();
        $data['total'] = $this->CartModel->gettotal();
        
        // Load the view with cart data
        $this->load->view('front/cart',$data);
    }
    
    // Method to add a product to the cart
    public function addtocart(){
        $post = $this->input->post();
        // Call CartModel method to add product to cart
        $check = $this->CartModel->addtocart($post);
        if($check){
            // If product is added successfully, set flash message and redirect to cart
            $this->session->set_flashdata('succMsg','Product added to cart');
            redirect('cart');
        }else{
            // If product is already in cart, set flash message and redirect to cart
            $this->session->set_flashdata('errMsg','Product already added to cart');
            redirect('cart');
        }
    }

    // Method to update cart
    public function cartupdate(){
        $post = $this->input->post();
        // Call CartModel method to update cart
        $check = $this->CartModel->cartupdate($post);
      
        if($check){
            // If cart is updated successfully, set flash message and redirect to cart
            $this->session->set_flashdata('succMsg','Cart updated Successfully');
            redirect('cart');
        }else{
            // If there is an error, set flash message and redirect to cart
            $this->session->set_flashdata('errMsg','Something went wrong');
            redirect('cart');
        }
    }

    // Method to remove a product from cart
    public function removeproduct($proid){
        // Call CartModel method to remove product from cart
        $check =  $this->CartModel->removeproduct($proid);
        if($check){
            // If product is removed successfully, set flash message and redirect to cart
            $this->session->set_flashdata('succMsg','Product removed Successfully');
            redirect('cart');
        }
    }
}       
?>
