<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_model extends CI_Model {
    
    private $table_vendor = "vendor";

    function get_list(){
        $this->db->order_by("vendorName", "desc");
        return $this->db->get($this->table_vendor)->result_array();
    }

    function get_data($id = ""){
        $this->db->where("vendorId", $id);
        return $this->db->get($this->table_vendor)->row_array();
    }

    function insert_data($data){
        return $this->db->insert($this->table_vendor, $data);
    }

    function update_data($data, $id){
        $this->db->where("vendorId", $id);
        return $this->db->update($this->table_vendor, $data);
    }

    function delete_data($id){
        $this->db->where("vendorId", $id);
        return $this->db->delete($this->table_vendor);
    }
}

/* End of file Vendor_model.php */

?>