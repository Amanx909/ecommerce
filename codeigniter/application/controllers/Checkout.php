<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('OrderModel');
        $this->load->model('CartModel');
        $this->load->helper('url');
    }

    public function index() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    
        $cartData = $this->CartModel->getcart();
        if (!$cartData) {
            $this->session->set_flashdata('error', 'Your cart is empty.');
            redirect('some_page'); // You need to replace 'some_page' with an actual route
        }
    
        $totals = $this->CartModel->gettotal();
    
        $data = [
            'cart' => $cartData,
            'total' => $totals,  // Ensure this is named correctly as expected by the view
            'user_data' => $this->session->userdata()
        ];
      
        
        $this->load->view('front/checkout', $data);
    }
    

    public function initiate_payment() {
      
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = [
                'first_name' => $this->input->post('first_name', TRUE),
                'last_name' => $this->input->post('last_name', TRUE),
                'country' => $this->input->post('country', TRUE),
                'street_address' => $this->input->post('street_address', TRUE),
                'city' => $this->input->post('city', TRUE),
                'state' => $this->input->post('state', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'email' => $this->input->post('email', TRUE),
                'order_notes' => $this->input->post('order_notes', TRUE)
            ];
            
            if (!$this->validate_checkout_data($data)) {
                $this->session->set_flashdata('error', 'Please fill in all required fields.');
                redirect('checkout');
            }

            $orderData = $this->prepare_order_data($data);
            $orderId = $this->session->userdata('user_id'). '_'.uniqid('order_');
            // $orderId = $this->OrderModel->create_order($orderData);
            // if (!$orderId) {
            //     $this->session->set_flashdata('error', 'Failed to create order.');
            //     redirect('checkout');
            // }

            $paymentData = $this->prepare_payment_data($orderId, $data);
     

            $paymentResponse = $this->initiate_khalti_payment($paymentData);
            if ($paymentResponse['success']) {
                redirect($paymentResponse['payment_url']);
            } else {
                $this->session->set_flashdata('error', 'Error initiating payment: ' . $paymentResponse['message']);
                redirect('checkout');
            }
        } else {
            redirect('checkout');
        }
    }

    private function prepare_order_data($data) {
        $cartTotal = $this->CartModel->gettotal();
        return [
            'user_id' => $this->session->userdata('user_id'),
            'total' => $cartTotal['grandtotal'],
            'cust_name' => $data['first_name'] . ' ' . $data['last_name'],
            'cust_mobile' => $data['phone'],
            'cust_email' => $data['email'],
            'address' => $data['street_address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'added_on' => date('Y-m-d H:i:s'),
            'order_date' => date('Y-m-d H:i:s'),
            'order_status' => 'Pending',
            'status' => 1,
            'ip' => $this->input->ip_address()
        ];
    }

    private function prepare_payment_data($orderId, $data) {
        return [
            'return_url' => site_url('checkout/payment_response'),
            'website_url' => base_url(),
            'amount' => $this->CartModel->gettotal()['grandtotal'] * 100,
            'purchase_order_id' => $orderId,
            'purchase_order_name' => 'Order #' . $orderId,
            'customer_info' => [
                'name' => $data['first_name'] . ' ' . $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone']
            ]
        ];
    }

    private function initiate_khalti_payment($paymentData) {
        $authKey = "Key f2ccc44987284712aa62544e8089e683";  // Replace <LIVE_SECRET_KEY> with your actual key
        $endpoint = "https://a.khalti.com/api/v2/epayment/initiate/";
        log_message('error', ''.($paymentData['amount']+1));
  
        $data = array(
            "return_url" => site_url("checkout/payment_response"),
            "website_url" => base_url(),
            "amount" =>$paymentData['amount'] ,  // Replace with actual amount in paisa
            "purchase_order_id" => $paymentData['purchase_order_id'],  // Generate unique order ID
            "purchase_order_name" => $paymentData['purchase_order_name'],
            "customer_info" => $paymentData['customer_info']
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
                  $orderId = $this->OrderModel->create_order($orderData);
            if (!$orderId) {
                $this->session->set_flashdata('error', 'Failed to create order.');
                redirect('checkout');
            }
            } else {
                log_message('error', ''.($response));
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

    
    private function validate_checkout_data($data) {
        foreach ($data as $key => $value) {
            if (empty($value) && $key != 'order_notes') {
                return false;
            }
        }
        return true;
    }
}

?>
