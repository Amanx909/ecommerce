<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartModel extends CI_Model {

    public function getuserid(){
        // Get user ID from session
        if(!empty($this->session->userdata('login_id'))){
            return $this->session->userdata('login_id');
        }else{
            return $this->session->userdata('user_id');
        }
    }

    public function getcart(){
        // Retrieve cart data from the database for the logged-in user
        $q = $this->db->where(['user_id'=>$this->getuserid()])->get('ec_cart');
        if ($q->num_rows()){
            return $q->result(); // Return cart data as result array
        } else {
            return false; // Return empty if no data found
        }
    }

    public function addtocart($post){
        // Check if the product already exists in the user's cart
        $exist = $this->db->where(['pro_id'=>$post['pro_id'],'user_id'=>$this->getuserid()])->get('ec_cart');
        if ($exist->num_rows()){
            return false; // Return false if product already exists in the cart
        } else {
            // Retrieve product details from the products table
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
                return true; // Return true on successful insertion
            } else {
                // Product not found in the products table
                return false; // Return false if product not found
            }
        }
    }

    public function cartupdate($post){
        // Update cart with the provided product IDs and quantities
        $count = count($post['up_pro_id']);
        for ($i = 0; $i < $count; $i++) {
            $this->db->where(['pro_id' => $post['up_pro_id'][$i], 'User_id' => $this->getuserid()])
                     ->update('ec_cart', ['pro_qty' => $post['up_qty'][$i]]);
        }

        // Recalculate totals
        $total = $this->gettotal();

        return true; // Return true on successful update
    }

    public function removeproduct($proid){
        // Remove product from the cart based on product ID
        $q= $this->db->where(['pro_id' =>$proid,'User_id'=>$this->getuserid()])
                     ->delete('ec_cart');
        if ($q){
            return true; // Return true on successful deletion
        }
    }

    public function gettotal(){
        $q = $this->db->select('SUM(pro_price * pro_qty) as total_price')
                      ->where(['user_id' => $this->getuserid()])
                      ->get('ec_cart');
        if ($q->num_rows()) {
            $total = $q->row()->total_price;
            return [
                'subtotal' => $total,
                'grandtotal' => ($total > 499 ? $total : $total + 50),
                'delivery' => ($total > 499 ? 0 : 50)
            ];
        }
        return ['subtotal' => 0, 'grandtotal' => 0, 'delivery' => 0];
    }
}
?>
