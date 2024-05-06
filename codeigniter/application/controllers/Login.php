<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (!empty($this->session->userdata('login_id'))) {
            redirect('checkout');
        }
        $this->load->model('LoginModel'); // Load the LoginModel
        $this->load->helper('url'); // Load URL Helper
        $this->load->helper('form'); // Load Form Helper
        $this->load->library('form_validation');
    }

    public function index() {
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]');
        
        if ($this->form_validation->run()) {
            $post = $this->input->post();
            $check = $this->LoginModel->auth($post);
            if ($check) {
                // Authentication successful, redirect based on user type
                redirect('checkout');
            } else {
                // Authentication failed, set flash message and redirect to login page
                $this->session->set_flashdata('errMsg', 'Wrong Credentials');
                redirect('login');
            }
        } else {
            // Form validation failed, load the login view
            $this->load->view('front/login');
        }
    }
}
