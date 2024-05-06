<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WishlistModel extends CI_Model {

    public function getUserID() {
        // Retrieve user ID from session
        return $this->session->userdata('user_id');
    }

    public function getWishlistItems() {
        // Retrieve wishlist data from the database for the logged-in user
        $this->db->select('w.id, w.pro_id, p.pro_name, p.pro_main_image, p.slug');
        $this->db->from('wishlist w');
        $this->db->join('ec_product p', 'p.pro_id = w.pro_id', 'left');
        $this->db->where('w.user_id', $this->getUserID());
        $query = $this->db->get();
        return $query->result();
    }

    public function addToWishlist($post) {
        // Check if the product already exists in the user's wishlist
        $exists = $this->db->where(['pro_id' => $post['pro_id'], 'user_id' => $this->getUserID()])->get('wishlist');
        if ($exists->num_rows()) {
            return false; // Return false if product already exists in the wishlist
        } else {
            // Insert new product into wishlist
            $data = array(
                'user_id' => $this->getUserID(),
                'pro_id' => $post['pro_id'],
                'added_on' => date('Y-m-d H:i:s') // Timestamp for when item was added
            );
            $this->db->insert('wishlist', $data);
            return true;
        }
    }

    public function removeFromWishlist($pro_id) {
        // Remove product from the wishlist based on product ID
        $result = $this->db->delete('wishlist', ['pro_id' => $pro_id, 'user_id' => $this->getUserID()]);
        return $result;
    }
}
?>
