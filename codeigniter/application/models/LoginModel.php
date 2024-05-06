<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

    public function auth($post) {
        $email = $post['email'];
        $pass = $post['password'];

        $q = $this->db->where(['email'=>$email, 'status'=>1])->get('ec_users');
        
        if ($q->num_rows()) {
            $user = $q->row();
            
            $dbpass = $user->password;
            $userid = $user->user_id;
            $username = $user->username;
            $user_type = $user->user_type;

            if (password_verify($pass, $dbpass)) {
                // Set session data for login
                $this->session->set_userdata('login_id', $userid);
                $this->session->set_userdata('username', $username);

                // Redirect based on user type
                if ($user_type == 'user') {
                    redirect('home');
                } elseif ($user_type == 'admin') {
                    redirect('dashboard');
                }
                
                // Update cart if necessary
                $this->db->where('user_id', $this->session->userdata('user_id'))->update('ec_cart', ['user_id' => $userid]);
                
                return true; // Authentication successful
            } else {
                return false; // Incorrect password
            }
        } else {
            return false; // User not found or inactive
        }
    }
}
?>
