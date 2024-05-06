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

    public function fetchcat($slug){
        // Fetch the category ID based on the provided slug
        $q =  $this->db->select('cate_id')->where('slug',$slug)->get('ec_category');
        if($q->num_rows()){
            return $q->row()->cate_id;
        }
    }

    public function fetchproduct($cateid) {
        // Fetch products based on category or sub-category
        $this->db->where(['status' => 1]);
        $this->db->where("(category = $cateid OR sub_category = $cateid)");
        $q = $this->db->get('ec_product');
        
        if ($q->num_rows() > 0) {
            return $q->result();
        } else {
            return false;
        }
    }
    
    public function removeproduct($proid) {
        // Remove product from the database based on product ID
        $this->db->where('pro_id', $proid);
        $this->db->delete('ec_product');
    }
}
?>
