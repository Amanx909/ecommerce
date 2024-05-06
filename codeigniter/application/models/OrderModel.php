<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderModel extends CI_Model {

    /**
     * Creates a new order in the database.
     * @param array $orderData Data for the new order.
     * @return mixed The ID of the newly created order or false on failure.
     */
    public function create_order($orderData) {
        if ($this->db->insert('order', $orderData)) {
            return $this->db->insert_id();  // Return the ID of the new order
        } else {
            log_message('error', 'Order creation failed: ' . $this->db->error()['message']);
            return false;  // Insert failed
        }
    }

    /**
     * Updates an existing order's status.
     * @param int $orderId The ID of the order to update.
     * @param string $newStatus The new status to set.
     * @return bool true on success, false on failure.
     */
    public function update_order_status($orderId, $newStatus) {
        $this->db->set('order_status', $newStatus);
        $this->db->where('order_id', $orderId);
        return $this->db->update('order');  // Returns true on success
    }

    /**
     * Retrieves the details of a specific order.
     * @param int $orderId The ID of the order.
     * @return object An object containing order details.
     */
    public function get_order_details($orderId) {
        $query = $this->db->get_where('order', ['order_id' => $orderId]);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;  // No order found with the given ID
        }
    }

    /**
     * Retrieves all orders for a specific user.
     * @param int $userId The ID of the user whose orders are to be retrieved.
     * @return array An array of objects containing order details.
     */
    public function get_orders_by_user($userId) {
        $query = $this->db->get_where('order', ['user_id' => $userId]);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];  // No orders found for the user
        }
    }
    
}
?>
