<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('CartModel'); // Load the CartModel
        
        
        $this->load->library('session');
       
    }
    
    public function index(){
        $data['cart'] = $this->CartModel->getcart();
        $data['total'] = $this->CartModel->gettotal();
        
        $this->load->view('front/cart',$data); // Load the view with cart data
    }
    
    public function addtocart(){
        $post = $this->input->post();
        $check = $this->CartModel->addtocart($post);
        if($check){
            $this->session->set_flashdata('succMsg','Product added to cart');
            redirect('cart');
        }else{
            $this->session->set_flashdata('errMsg','Product already added to cart');
            redirect('cart');
        }
    }

    public function cartupdate(){
        $post = $this->input->post();
        $check = $this->CartModel->cartupdate($post);
      
        if($check){
            $this->session->set_flashdata('succMsg','Cart updated Successfully');
            redirect('cart');
        }else{
            $this->session->set_flashdata('errMsg','Something went wrong');
            redirect('cart');
        }
    }

    public function removeproduct($proid){
       $check =  $this->CartModel->removeproduct($proid);
       if($check){
        $this->session->set_flashdata('succMsg',' Product removed Successfully');
        redirect('cart');
       }
    }
}       
