<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class City_model extends CI_Model {
    
    private $table_mst_city = "mst_city";

    function get_list($provinceId = ""){
        if($provinceId != ""){
            $this->db->where("provinceId", $provinceId);
        }

        $this->db->order_by("cityName", "asc");
        return $this->db->get($this->table_mst_city)->result_array();
    }
    

}

/* End of file City_model.php */
