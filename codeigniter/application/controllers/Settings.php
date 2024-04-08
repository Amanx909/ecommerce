<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('settingsModel');
        $this->load->helper('url'); // Load URL Helper
        $this->load->helper('form'); // Load Form Helper
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function pincode()
    {
        $this->form_validation->set_rules('pincode', 'pincode', 'required|trim');
        $this->form_validation->set_rules('deliver_charge', 'delivery charge', 'required|trim');
        $this->form_validation->set_rules('status', 'status', 'required|trim');

        if ($this->form_validation->run()) {
            $post = $this->input->post();
            $check = $this->settingsModel->addpincode($post); // Capture the return value

            if ($check) {
                $this->session->set_flashdata('succMsg', 'Data inserted successfully');
                redirect('settings/pincode');
            } 


        }else{
        $this->load->view('pincode');
        } 
    }
    public function banner()
    {
        // Set form validation rules for status
        $this->form_validation->set_rules('status', 'status', 'required|trim');
        
        // Check if form validation for status runs successfully
        if ($this->form_validation->run()) {
            $post = $this->input->post();
    
            // Check if bann_image file is uploaded
            if (!empty($_FILES['bann_image']['name'])) {
                // Configuration for main banner image upload
                $config = array(
                    'upload_path' => './uploads',
                    'allowed_types' => "gif|jpg|png|jpeg",
                );
                
                // Load upload library and initialize with configuration
                $this->load->library('upload', $config);
                
                // Upload main banner image
                if ($this->upload->do_upload('bann_image')) {
                    $image_data = $this->upload->data();
                    $post['bann_image'] = $image_data['file_name'];
                } else {
                    // Handle upload errors if any
                    $error = $this->upload->display_errors();
                    // Handle the error, maybe log it or show it to the user
                }
            }
    
            // Check if bann_subimage file is uploaded
            if (!empty($_FILES['bann_subimage']['name'])) {
                // Configuration for sub banner image upload
                $config_subimage = array(
                    'upload_path' => './uploads',
                    'allowed_types' => "gif|jpg|png|jpeg",
                );
                
                // Load upload library and initialize with configuration for sub image
                $this->load->library('upload', $config_subimage);
                
                // Upload sub banner image
                if ($this->upload->do_upload('bann_subimage')) {
                    $subimage_data = $this->upload->data();
                    $post['bann_subimage'] = $subimage_data['file_name'];
                } else {
                    // Handle upload errors if any
                    $error = $this->upload->display_errors();
                    // Handle the error, maybe log it or show it to the user
                }
            }
    
            // Add banner details to the database
            $check = $this->settingsModel->addbanner($post); // Capture the return value
            if ($check) {
                $this->session->set_flashdata('succMsg', 'Data inserted successfully');
                redirect('settings/banner');
            } 
        } else {
            // Form validation failed, load the view
            $this->load->view('banner');
        } 
    }
    
}
