<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    private $table_vendor = "vendor";
    private $table_customer = "customer";
    private $table_product = "product";
    private $table_transaction  = "transaction ";

    function order(){
        return $this->db->get($this->table_transaction)->num_rows();
    }

    function customer(){
        return $this->db->get($this->table_customer)->num_rows();
    }
    function vendor(){
        return $this->db->get($this->table_vendor)->num_rows();
    }
    function product(){
        return $this->db->get($this->table_product)->num_rows();
    }

}

/* End of file Dashboard_model.php */
