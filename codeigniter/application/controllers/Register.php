<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('RegisterModel');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index(){
        $this->form_validation->set_rules('name', 'full name', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[ec_users.email]', ['is_unique' => 'This email already exists']);
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]');

        if ($this->form_validation->run()) {
            $post = $this->input->post();
            $this->RegisterModel->register($post);
            $this->session->set_flashdata('success', 'Registration successful! Please login to continue.');
            redirect('login');  // Assuming 'login' is the route for your login page
        } else {
            $this->load->view('front/register');
        }
    }
}
?>
