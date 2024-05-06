<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the categoryModel, URL Helper, Form Helper, Session Library, and Form Validation Library
        $this->load->model('categoryModel');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    // Index method to handle category data and form validation
    public function index(){
        // Set form validation rules
        $this->form_validation->set_rules('cate_name', 'category name', 'required|trim');
        $this->form_validation->set_rules('status', 'status', 'required|trim');

        if($this->form_validation->run()){
            // If form validation passes
            $post = $this->input->post();
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';

            // Load upload library with specified configuration
            $this->load->library('upload',$config);
           
            // Perform upload
            $this->upload->do_upload('image');
            $data=$this->upload->data();
            $post['image']=$data['raw_name'].$data['file_ext'];
            
            // Call categoryModel method to add category
            $check = $this->categoryModel->addcategory($post); // Capture the return value

            if($check){
                // If category is added successfully, set flash message
                $this->session->set_flashdata('succMsg','Data inserted successfully');
                
            }
            redirect('category'); // Redirect to category index
           
        }
        
        // Get all categories and load the view
        $data['categories'] = $this->categoryModel->allcategory();
        $this->load->view('category', $data);
    }

    // Method to get subcategories via AJAX
    public function getsubcate(){
        $cate_id = $this->input->post('cate_id');
        echo ( $this->categoryModel->getsubcate($cate_id));
    }
    
}       
?>
