<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterModel extends CI_Model {

    public function register($post){
        // Generate a random user ID
        $data['user_id'] = mt_rand(11111,99999);
        // Get user input data
        $data['username'] = $post['name'];
        $data['email'] = $post['email'];
        // Hash the password using Bcrypt
        $data['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
        $data['status'] = 1;
        // Get the user's IP address
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        // Get the current date
        $data['added_on'] = date('Y-m-d');
        // Set the default user type to 'user'
        $data['user_type'] = 'user';

        // Insert user data into the database
        $this->db->insert('ec_users', $data);
    }
}
?>
