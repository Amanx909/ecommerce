<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CategoryModel');
        $this->load->model('ProductModel'); // Correcting model class name
        $this->load->helper('url'); // Load URL Helper
        $this->load->helper('form'); // Load Form Helper
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index(){
        $this->form_validation->set_rules('pro_id','product id','required|trim');
        $this->form_validation->set_rules('category','category','required|trim');
        $this->form_validation->set_rules('pro_name','product name','required|trim');
        $this->form_validation->set_rules('brand','brand','required|trim');
        $this->form_validation->set_rules('featured','featured','required|trim');
        $this->form_validation->set_rules('highlights','highlights','required|trim');
        $this->form_validation->set_rules('description','description','required|trim');
        $this->form_validation->set_rules('stock','stock','required|trim');
        $this->form_validation->set_rules('mrp','mrp','required|trim');
        $this->form_validation->set_rules('selling_price','selling price','required|trim');
        $this->form_validation->set_rules('status','status ','required|trim');

        if(empty($_FILES['pro_main_image']['name'])){
            $this->form_validation->set_rules('pro_main_image','product image','required|trim');
        }
      
        // Run form validation
        if($this->form_validation->run()){
            $post = $this->input->post();
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';

            $this->load->library('upload',$config);
           
            $this->upload->do_upload('pro_main_image');
            $data=$this->upload->data();
            $post['pro_main_image']=$data['raw_name'].$data['file_ext'];
            $check=$this->ProductModel->addproduct($post); // Corrected model name
            if($check){
                $this->session->set_flashdata('succMsg','Product added successfully');
                redirect('product');
            } else {
                $this->session->set_flashdata('errMsg','Product failed to insert');
                redirect('product');
            }
        } else {
          
            
            $data['categories'] = $this->CategoryModel->allcategory();
            
            $this->load->view('product', $data);
        }
    }
}
?>
