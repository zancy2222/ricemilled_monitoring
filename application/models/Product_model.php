<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Ensure the database is loaded
    }

    public function get_all_products() {
        $query = $this->db->get('products'); // Make sure your table name is correct
        return $query->result_array();
    }

    public function insert_product($data) {
        if ($this->db->insert('products', $data)) {
            return true;
        } else {
            return false; // Consider logging the error here
        }
    }

    public function update_product($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    public function delete_product($id) {
        $this->db->where('id', $id);
        return $this->db->delete('products');
    }
}
