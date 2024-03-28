<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model {

    public function addproduct($post){
        $post['added_on'] = date('Y-m-d H:i:s'); // Correcting the date format
        $post['slug'] = $this->slug($post['pro_name']); 
        $q = $this->db->insert('ec_product', $post); // Corrected syntax
        if($q){
            $this->session->unset_userdata('pro_id');
            return true;
        } else {
            return false;
        }
    }

    // Corrected slug method
    function slug($string){
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
        return $slug;
    }
}
?>
