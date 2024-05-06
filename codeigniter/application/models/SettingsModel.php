<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingsModel extends CI_Model {

    public function addpincode($post) {
        $this->db->insert('ec_pincode', $post);
        return $this->db->affected_rows() > 0;
    }
    
    public function addbanner($post) {
        $post['added_on'] = date('Y-m-d');
        $post['updated_on'] = date('Y-m-d'); // Set updated_on date
        $post['bann_id'] = $this->generateUniqueBannerId(); // Generate unique banner ID

        $this->db->insert('ec_banner', $post);
        return $this->db->affected_rows() > 0;
    }
    
    private function generateUniqueBannerId() {
        do {
            $id = mt_rand(10000, 99999); // Generate a random number
            $this->db->where('bann_id', $id);
            $exists = $this->db->count_all_results('ec_banner') > 0;
        } while ($exists); // Ensure the ID is unique

        return $id;
    }
    
    public function allcategory() {
        $this->db->where('status', '1');
        $query = $this->db->get('ec_category');
        return $query->num_rows() ? $query->result() : [];
    }
}
?>
