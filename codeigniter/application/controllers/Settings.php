<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('settingsModel');
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'form_validation', 'upload']);
    }

    public function banner() {
        $this->form_validation->set_rules('bann_name', 'Banner Name', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');

        if ($this->form_validation->run()) {
            $post = $this->input->post();
            $post['bann_image'] = $this->do_upload('bann_image'); // Handle image upload
           

            if ($this->settingsModel->addbanner($post)) {
                $this->session->set_flashdata('succMsg', 'Banner added successfully');
            } else {
                $this->session->set_flashdata('errorMsg', 'Failed to add banner');
            }
            redirect('settings/banner');
        } else {
            $this->load->view('banner');
        }
    }

    private function do_upload($field_name) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB limit

        $this->upload->initialize($config);

        if ($this->upload->do_upload($field_name)) {
            $file_data = $this->upload->data();
            return $file_data['file_name'];
        } else {
            $this->session->set_flashdata('upload_error', $this->upload->display_errors());
            return null;
        }
    }
}
?>
