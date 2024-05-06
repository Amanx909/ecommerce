<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        if (!$this->session->userdata('login_id')) {
            redirect('login');
        }
        $userId = $this->session->userdata('login_id');
        $data['user'] = $this->UsersModel->getUserDetails($userId);
        $this->load->view('front/userprofile', $data);
    }

    public function updateProfile() {
        $userId = $this->session->userdata('login_id');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        $newEmail = $this->input->post('email');
    
        if ($this->form_validation->run() === FALSE) {
            $this->index(); // Reload the view with validation errors
        } elseif ($this->UsersModel->emailExists($newEmail, $userId)) {
            $this->session->set_flashdata('error', 'Email already exists.');
            redirect('profile');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'email' => $newEmail,
                // Add other fields as necessary
            ];
            if ($this->UsersModel->updateUserDetails($userId, $data)) {
                $this->session->set_flashdata('success', 'Profile updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update profile.');
            }
            redirect('profile'); // Redirect back to the profile page
        }
    }
    
    
    
    
    

   
}
