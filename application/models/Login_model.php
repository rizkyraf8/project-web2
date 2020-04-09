<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    private $table_login = "login";
    
    function check_login($username, $password){
        
        $this->db->where(array(
            "username" => $username,
            "password" => $password,
        ));

        return $this->db->get($this->table_login)->row_array();
    }
}

/* End of file Login_model.php */
