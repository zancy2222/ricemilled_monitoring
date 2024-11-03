<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model'); // Load the Product_model
        $this->load->helper('url');          // Load the URL helper
    }

    public function index() {
        $data['products'] = $this->Product_model->get_all_products();
        $this->load->view('index', $data);
    }

    public function add_product() {
        // Using $this->input->post() to access POST data
        $data = array(
            'name' => $this->input->post('productName'),
            'qty' => $this->input->post('productQty'),
            'description' => $this->input->post('productDescription'),
            'price' => $this->input->post('productPrice')
        );
    
        // Log the data for debugging
        log_message('debug', 'Product Data: ' . print_r($data, true));
    
        // Call the model to insert the product
        if ($this->Product_model->insert_product($data)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'error' => $this->db->last_query()]); // Log last query
        }
    }
    
}
