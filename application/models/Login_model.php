<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    private $table_user = "user";
    
    function check_login($username, $password){
        
        $this->db->where(array(
            "userEmail" => $username,
            "userPassword" => $password,
        ));

        return $this->db->get($this->table_user)->row_array();
    }
}

/* End of file Login_model.php */
