<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_Model {

    public function addcategory($post){
        $post['added_on'] = date('d M, Y');
        $post['cate_id'] = mt_rand(11111,99999);
        $post['slug']= $this->slug($post['cate_name']);
           
    
        $q = $this->db->insert('ec_category', $post);
        return $q; // Return the result of the insert operation
    }
    

    public function allcategory(){
        $q = $this->db->where(['status'=>1, 'parent_id'=>''])->get('ec_category');
        if($q->num_rows()){
            return $q->result();
        }
    }

    public function getsubcate($categoryId){
        $q = $this->db->where(['status' => 1, 'parent_id' => $categoryId])->get('ec_category');
        if($q->num_rows() > 0){
            $output='';
            foreach ($q->result() as $val){
                $output.='<option value="'.$val->cate_id.'">'.$val->cate_name.'</option>';
            }
            echo $output;
        }
        return []; // Return an empty array if no subcategories are found
    }    
    
    public function slug($catename){
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/','-', $catename)));
        return $slug;

    }
            
                
}
