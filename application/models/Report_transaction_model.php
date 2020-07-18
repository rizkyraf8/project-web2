<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_transaction_model extends CI_Model {

    private $table_transaction = "transaction";
    private $table_transaction_line = "transaction_line";
    private $table_customer = "customer";
    private $table_product = "product";

    function get_list(){
        $this->db->order_by("transactionId", "desc");
        $this->db->join($this->table_customer." t2", "t1.customerId=t2.customerId","left");
        return $this->db->get($this->table_transaction." t1")->result_array();
    }

    function get_list_report(){
        $this->db->select('*, (SELECT count(*) FROM transaction_line where transactionId = t1.transactionId) totalItem,
        (SELECT sum(qtyReady * price) FROM transaction_line where transactionId = t1.transactionId) totalPrice');
        $this->db->order_by("transactionId", "desc");
        $this->db->join($this->table_customer." t2", "t1.customerId=t2.customerId","left");
        return $this->db->get($this->table_transaction." t1")->result_array();
    }

    function get_data($id = ""){
        $this->db->where("transactionId", $id);
        $this->db->join($this->table_customer." t2", "t1.customerId=t2.customerId","left");
        return $this->db->get($this->table_transaction." t1")->row_array();
    }

    function get_data_list($id = ""){
        $this->db->select("t1.*,t2.*,t1.status");
        $this->db->where("transactionId", $id);
        $this->db->join($this->table_product. " t2", "t1.productId = t2.productId");
        return $this->db->get($this->table_transaction_line. " t1")->result_array();
    }

}

/* End of file Report_transaction_model.php */
