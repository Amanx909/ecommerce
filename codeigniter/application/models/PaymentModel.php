<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentModel extends CI_Model {

    public function save_transaction($data) {
        return $this->db->insert('order', $data);
    }
}
?>
