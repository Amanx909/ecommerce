<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartModel extends CI_Model {

    public function getuserid(){
        return $this->session->userdata('user_idn'); 
    }

    public function getcart(){
        $q = $this->db->where(['user_id'=>$this->getuserid()])->get('ec_cart');
        if ($q->num_rows()){
            return $q->result(); // Return cart data as result array
        } else {
            return false; // Return empty if no data found
        }
    }

    public function addtocart($post){
        $exist = $this->db->where(['pro_id'=>$post['pro_id'],'user_id'=>$this->getuserid()])->get('ec_cart');
        if ($exist->num_rows()){
            return false;
        } else {
            $q = $this->db->select('pro_name, selling_price, slug, pro_main_image')->where('pro_id', $post['pro_id'])->get('ec_product');
        
            if ($q->num_rows() > 0){
                // Product found in the products table
                $prod = $q->row();
                
                // Prepare cart data
                $data = array(
                    'cart_id' => mt_rand(11111, 99999),
                    'user_id' => $this->getuserid(),
                    'pro_id' => $post['pro_id'],
                    'pro_qty' => $post['pro_qty'],
                    'pro_name' => $prod->pro_name,
                    'pro_price' => $prod->selling_price,
                    'slug' => $prod->slug,
                    'pro_image' => $prod->pro_main_image,
                    'added_on' => date('Y-m-d')
                );

                // Insert data into the cart table
                $this->db->insert('ec_cart', $data);
                return true;
            } else {
                // Product not found in the products table
                return false;
            }
        }
    }

    public function cartupdate($post){
        $count = count($post['up_pro_id']);
        for ($i = 0; $i < $count; $i++) {
            $this->db->where(['pro_id' => $post['up_pro_id'][$i], 'User_id' => $this->getuserid()])
                     ->update('ec_cart', ['pro_qty' => $post['up_qty'][$i]]);
        }

        // Recalculate totals
        $total = $this->gettotal();

        return true;
    }

    public function removeproduct($proid){
        $q= $this->db->where(['pro_id' =>$proid,'User_id'=>$this->getuserid()])
                     ->delete('ec_cart');
        if ($q){
            return true;
        }
    }

    public function gettotal(){
        $q = $this->db->select('sum(pro_price * pro_qty) as total_price')->where(['user_id'=>$this->getuserid()])->get('ec_cart');
        if ($q->num_rows()){
             $total = $q->row()->total_price; 
             if($total > 499){
                return array('subtotal'=> $total,'grandtotal'=> $total, 'delivery'=> 0);
             }else{
                return array('subtotal'=> $total,'grandtotal'=> $total + 50, 'delivery'=> 40);
             }
        }else{
            return false;
        }
    }
}
