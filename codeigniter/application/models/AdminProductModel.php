<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProductModel extends CI_Model {

    public function get_all_products() {
        $query = $this->db->get('ec_product');
        return $query->result();
    }
 
    // Add methods for removing and editing products as needed

}
?>
