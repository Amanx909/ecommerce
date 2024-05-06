<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function index(){
        // Load session library
        $this->load->library('session');
        // Destroy session data for 'username' and 'login_id'
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('login_id');
        // Redirect to base URL
        redirect(base_url());
    }
}

?>
