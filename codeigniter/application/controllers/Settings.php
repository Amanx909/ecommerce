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
        if(empty($_FILES['bann_image']['name'])){
            $this->form_validation->set_rules('bann_image', 'banner image', 'required|trim');
        }
       
        $this->form_validation->set_rules('status', 'status', 'required|trim');
        if ($this->form_validation->run()) {

            $post = $this->input->post();
            $config = array(
                'upload_path' => './uploads' ,
                'allowed_types' =>"gif|jpg|png|jpeg",
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('bann_image');
            $image = $this->upload->data();
            $post['bann_image'] = $image['file_name'];
            

                $check = $this->settingsModel->addbanner($post); // Capture the return value
                if ($check) {
                $this->session->set_flashdata('succMsg', 'Data inserted successfully');
                redirect('settings/banner');
            } 


        }else{
        $this->load->view('banner');
        } 
    }
}
