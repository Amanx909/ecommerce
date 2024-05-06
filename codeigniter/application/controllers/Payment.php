<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary libraries and helpers
        $this->load->helper('url');
    }

    public function initiate_payment() {
        
        
        $authKey = "Key f2ccc44987284712aa62544e8089e683";  // Replace <LIVE_SECRET_KEY> with your actual key
        $endpoint = "https://a.khalti.com/api/v2/epayment/initiate/";

        $data = array(
            "return_url" => site_url("payment/payment_response"),
            "website_url" => base_url(),
            "amount" => 1300,  // Replace with actual amount in paisa
            "purchase_order_id" => uniqid('order_'),  // Generate unique order ID
            "purchase_order_name" => "Test Product",
            "customer_info" => array(
                "name" => "Customer Name",
                "email" => "customer@example.com",
                "phone" => "9800000000"
            )
        );

        $json_data = json_encode($data);

        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . $authKey, 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        } else {
            $decoded_response = json_decode($response, true);
            if (isset($decoded_response['payment_url'])) {
                redirect($decoded_response['payment_url']);
            } else {
                echo "Error initiating payment: " . $response;
            }
        }
        curl_close($ch);
    }

    public function payment_response() {
        // Process the payment response after user is redirected back to the website
        $pidx = $this->input->get('pidx');
        $status = $this->input->get('status');
        // You should implement further verification and handling according to your requirements
        echo "Payment Status: " . $status . " for Payment ID: " . $pidx;
    }
}
?>
