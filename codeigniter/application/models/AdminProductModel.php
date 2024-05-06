<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProductModel extends CI_Model {

    public function get_all_products() {
        // Retrieve all products from the database
        $query = $this->db->get('ec_product');
        return $query->result();
    }
 
    // You can add additional methods for removing and editing products as needed

}
?>
