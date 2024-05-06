<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {

    public function getbanner(){
        // Retrieve active banners from the database, ordered by ID in descending order
        $q = $this->db->where('status','1')->order_by('id','desc')->get('ec_banner');
        if($q->num_rows()){
            return $q->result(); // Return banners if found
        } else {
            return false; // Return false if no banners found
        }
    }
    
    public function getcateg(){
        // Retrieve active categories from the database, ordered by ID in ascending order, limited to 5
        $q = $this->db->where('status','1')->order_by('id','asc')->limit(5)->get('ec_category');
        if($q->num_rows()){
            return $q->result(); // Return categories if found
        }
    }
    
    public function getproducts() {
        // Retrieve active products from the database, ordered by ID in descending order
        $q = $this->db->where('status','1')->order_by('id','desc')->get('ec_product');
        if($q->num_rows()){
            return $q->result(); // Return products if found
        }
    }
    
    public function categoryname($cateid){
        // Retrieve category name by category ID
        $q = $this->db->where(['cate_id'=>$cateid,'status'=>1])->get('ec_category');
        if($q->num_rows()){
            return $q->row()->cate_name; // Return category name if found
        }
    }
    
    public function productdetails($slug){
        // Retrieve product details by slug
        $q = $this->db->where(['slug'=>$slug,'status'=>1])->get('ec_product');
        if($q->num_rows()){
            return $q->row(); // Return product details if found
        }
    }
    
    public function getcategorynav(){
        // Retrieve top-level categories for navigation
        $q = $this->db->where(['status'=>1,'parent_id'=> ''])->get('ec_category');
        if($q->num_rows()){
            return $q->result(); // Return top-level categories if found
        } else {
            return false; // Return false if no categories found
        }
    }
    
    public function getsubcatcheck($cateid){
        // Check if subcategories exist for a given category ID
        $q = $this->db->where(['status' => 1, 'parent_id' => $cateid])->get('ec_category');
        if($q->num_rows() > 0){
            return true; // Return true if subcategories exist
        } else {
            return false; // Return false if no subcategories exist
        }
    }
    
    public function getsubcategory($cateid){
        // Retrieve subcategories for a given category ID
        $q = $this->db->where(['status' => 1, 'parent_id' => $cateid])->get('ec_category');
        if($q->num_rows() > 0){
            return $q->result(); // Return subcategories if found
        } else {
            return false; // Return false if no subcategories found
        }
    }

}
?>
