<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {

    private $table_transaction = "transaction";
    private $table_transaction_line = "transaction_line";
    private $table_customer = "customer";
    private $table_product = "product";

    function get_list(){
        $this->db->order_by("transactionId", "desc");
        $this->db->join($this->table_customer." t2", "t1.customerId=t2.customerId","left");
        return $this->db->get($this->table_transaction." t1")->result_array();
    }

    function get_data($id = ""){
        $this->db->where("transactionId", $id);
        return $this->db->get($this->table_transaction)->row_array();
    }

    function get_data_list($id = ""){
        $this->db->select("t1.*,t2.*,t1.status");
        $this->db->where("transactionId", $id);
        $this->db->join($this->table_product. " t2", "t1.productId = t2.productId");
        return $this->db->get($this->table_transaction_line. " t1")->result_array();
    }

    function insert_data($data){
        $this->db->insert($this->table_transaction, $data);

        return $this->db->insert_id();
    }

    function update_data($data, $id){
        $this->db->where("transactionId", $id);
        return $this->db->update($this->table_transaction, $data);
    }

    function update_data_line($data, $id){
        $this->db->where("lineId", $id);
        return $this->db->update($this->table_transaction_line, $data);
    }

    function delete_data($id){
        $this->db->where("transactionId", $id);
        return $this->db->delete($this->table_transaction);
    }

    function delete_data_line($id){
        $this->db->where("transactionId", $id);
        return $this->db->delete($this->table_transaction_line);
    }

    function insert_batch($data){
        return $this->db->insert_batch($this->table_transaction_line, $data);
    }
}

/* End of file Transaction_model.php */
