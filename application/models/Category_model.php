<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
    
    private $table_product_category = "product_category";

    function get_list(){
        $this->db->order_by("categoryName", "desc");
        return $this->db->get($this->table_product_category)->result_array();
    }

    function get_data($id = ""){
        $this->db->where("categoryId", $id);
        return $this->db->get($this->table_product_category)->row_array();
    }

    function insert_data($data){
        return $this->db->insert($this->table_product_category, $data);
    }

    function update_data($data, $id){
        $this->db->where("categoryId", $id);
        return $this->db->update($this->table_product_category, $data);
    }

    function delete_data($id){
        $this->db->where("categoryId", $id);
        return $this->db->delete($this->table_product_category);
    }
}

/* End of file Category_model.php */

?>