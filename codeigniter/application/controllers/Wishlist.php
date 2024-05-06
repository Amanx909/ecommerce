<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the WishlistModel
        $this->load->model('WishlistModel');
        // Load the session library
        $this->load->library('session');
    }
    
    // Method to display the wishlist
    public function index(){
        // Get wishlist data from WishlistModel
        $data['wishlist'] = $this->WishlistModel->getWishlistItems();
        
        // Load the view with wishlist data
        $this->load->view('front/wishlist', $data);
    }
    
    // Method to add a product to the wishlist
    public function addtowishlist(){
        $post = $this->input->post();
        // Call WishlistModel method to add product to wishlist
        $check = $this->WishlistModel->addToWishlist($post);
        if($check){
            // If product is added successfully, set flash message and redirect to wishlist
            $this->session->set_flashdata('succMsg', 'Product added to wishlist');
            redirect('wishlist');
        } else {
            // If product is already in wishlist, set flash message and redirect to wishlist
            $this->session->set_flashdata('errMsg', 'Product already added to wishlist');
            redirect('wishlist');
        }
    }

    // Method to remove a product from wishlist
    public function removefromwishlist($proid){
        // Call WishlistModel method to remove product from wishlist
        $check = $this->WishlistModel->removeFromWishlist($proid);
        if($check){
            // If product is removed successfully, set flash message and redirect to wishlist
            $this->session->set_flashdata('succMsg', 'Product removed from wishlist successfully');
            redirect('wishlist');
        }
    }
}
?>
