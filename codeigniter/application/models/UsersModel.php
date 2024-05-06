<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UsersModel extends CI_Model {

    public function getUserDetails($userId) {
        $this->db->select('*');
        $this->db->from('ec_users');
        $this->db->where('user_id', $userId);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function updateUserDetails($userId, $data) {
        $this->db->where('user_id', $userId);
        $data['updated_on'] = date('Y-m-d H:i:s');
        $result = $this->db->update('ec_users', $data);
        var_dump($this->db->affected_rows());  // Check how many rows were affected
        return $result;
    }
    
    

   
    public function emailExists($email, $userId) {
        $this->db->select('id');
        $this->db->from('ec_users');
        $this->db->where('email', $email);
        $this->db->where('user_id !=', $userId);
        $query = $this->db->get();
        return $query->num_rows() > 0;
    }
    
}
?>
