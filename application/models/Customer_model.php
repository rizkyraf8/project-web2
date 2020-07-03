<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {
    
    private $table_customer = "customer";

    function get_list(){
        $this->db->order_by("customerName", "desc");
        return $this->db->get($this->table_customer)->result_array();
    }

    function get_data($id = ""){
        $this->db->where("customerId", $id);
        return $this->db->get($this->table_customer)->row_array();
    }

    function insert_data($data){
        return $this->db->insert($this->table_customer, $data);
    }

    function update_data($data, $id){
        $this->db->where("customerId", $id);
        return $this->db->update($this->table_customer, $data);
    }

    function delete_data($id){
        $this->db->where("customerId", $id);
        return $this->db->delete($this->table_customer);
    }
}

/* End of file Customer_model.php */

?>