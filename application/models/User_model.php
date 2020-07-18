<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    private $table_user = "user";

    function get_list(){
        $this->db->order_by("userName", "desc");
        return $this->db->get($this->table_user)->result_array();
    }

    function get_data($id = ""){
        $this->db->where("userId", $id);
        return $this->db->get($this->table_user)->row_array();
    }

    function insert_data($data){
        return $this->db->insert($this->table_user, $data);
    }

    function update_data($data, $id){
        $this->db->where("userId", $id);
        return $this->db->update($this->table_user, $data);
    }

    function delete_data($id){
        $this->db->where("userId", $id);
        return $this->db->delete($this->table_user);
    }
}

/* End of file User_model.php */

?>