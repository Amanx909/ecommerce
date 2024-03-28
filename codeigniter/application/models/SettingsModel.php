<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingsModel extends CI_Model {

    public function addpincode($post){
        $q = $this->db->insert('ec_pincode', $post);
        return $q; // Return the result of the insert operation
    }
    
    public function addbanner($post){
        $post ['added_on'] = date('y-m-d');
        $post['bann_id'] = mt_rand(11111,99999);
        $q = $this->db->insert('ec_banner', $post);
        if($q){
            return true;
        }else{
            return false;
        }
    }
    

    public function allcategory(){
        $q = $this->db->where('status', '1')->get('ec_category');
        if($q->num_rows()){
            return $q->result();
        }
    }
}
?>
