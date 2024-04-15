<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {

public function getbanner(){
    $q = $this->db->where('status','1')->order_by('id','desc')->get('ec_banner');
    if($q->num_rows()){
        return $q->result();
    }else{
        return false;
    }
    
 }
 public function getcateg(){
    $q = $this->db->where('status','1')->order_by('id','asc')->limit(5)->get('ec_category');
    if($q->num_rows()){
        return $q->result();
  
        
}

 }
 public function getproducts() {
   
    $q = $this->db->where('status','1')->order_by('id','desc')->get('ec_product');
    if($q->num_rows()){
        return $q->result();
    
        
}
 }
 public function categoryname($cateid){
    $q = $this->db->where(['cate_id'=>$cateid,'status'=>1])->get('ec_category');
    if($q->num_rows()){
        return $q->row()->cate_name; 
 }
}
public function productdetails($slug){
    $q = $this->db->where(['slug'=>$slug,'status'=>1])->get('ec_product');
    if($q->num_rows()){
        return $q->row();
 
    }
}

public function getcategorynav(){
    $q = $this->db->where(['status'=>1,'parent_id'=> ''])->get('ec_category');
    if($q->num_rows()){
        return $q->result();
 }else{
    return false;
 }
}
public function getsubcatcheck($cateid){
    $q = $this->db->where(['status' => 1, 'parent_id' => $cateid])->get('ec_category');
    if($q->num_rows() > 0){
        return true;
    } else {
        return false;
    }
}
public function getsubcategory($cateid){
    $q = $this->db->where(['status' => 1, 'parent_id' => $cateid])->get('ec_category');
    if($q->num_rows() > 0){
        return $q->result();
    } else {
        return false;
    }
}

}


