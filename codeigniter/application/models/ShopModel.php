<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShopModel extends CI_Model {

    public function get_all_products() {
        // Fetch all products from the database
        $query = $this->db->get('ec_product');
        return $query->result();
    }
}
