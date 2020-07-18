<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    
    private $table_product = "product";
    private $table_product_category = "product_category";

    function get_list(){
        $this->db->order_by("productName", "desc");
        $this->db->join($this->table_product_category." t2", "t1.categoryCode=t2.categoryCode","left");
        return $this->db->get($this->table_product." t1")->result_array();
    }

    function get_data($id = ""){
        $this->db->where("productId", $id);
        return $this->db->get($this->table_product)->row_array();
    }

    function insert_data($data){
        return $this->db->insert($this->table_product, $data);
    }

    function update_data($data, $id){
        $this->db->where("productId", $id);
        return $this->db->update($this->table_product, $data);
    }

    function delete_data($id){
        $this->db->where("productId", $id);
        return $this->db->delete($this->table_product);
    }
}

/* End of file Product_model.php */

?>