<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function index(){
        $this->load->library('session');
        $this->session->sess_destroy('username');
        $this->session->sess_destroy('login_id');
        redirect(base_url());
    }
   

}

