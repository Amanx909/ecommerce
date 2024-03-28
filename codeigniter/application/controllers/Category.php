<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('categoryModel');
        $this->load->helper('url'); // Load URL Helper
        $this->load->helper('form'); // Load Form Helper
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index(){
        $this->form_validation->set_rules('cate_name', 'category name', 'required|trim');
        $this->form_validation->set_rules('status', 'status', 'required|trim');

        if($this->form_validation->run()){
            $post = $this->input->post();
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';

            $this->load->library('upload',$config);
           
            $this->upload->do_upload('image');
            $data=$this->upload->data();
            $post['image']=$data['raw_name'].$data['file_ext'];
            $check = $this->categoryModel->addcategory($post); // Capture the return value

            if($check){
                $this->session->set_flashdata('succMsg','Data inserted successfully');
                
            }else{
            }
            redirect('category'); // Now redirect() should work properly
           
        }
        
        $data['categories'] = $this->categoryModel->allcategory();
        $this->load->view('category', $data);
    }
    public function getsubcate(){
        $categoryId = $this->input->post('cate_id');
       print_r( $this->categoryModel->getsubcate($categoryId));
    }
    
}