<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index()
    {
        $this->load->view('login', null, FALSE);   
    }

    function ceklogin(){
        $post = $this->input->post();
        $username = $post['username'];
        $password = $post['password'];

        $query = $this->Login_model->check_login($username, hash_password($password));

        if($query){
            $arrSession = array(
                "name" => $query['name'],
                "email" => $query['email'],
                "username" => $query['username'],
            );

            $this->session->set_userdata($arrSession);
            
            redirect('menu_utama');
        }else{
            echo "<script>alert('Username dan password salah');window.location = '".base_url('login')."'</script>";
        }
    }

}

/* End of file Login.php */

?>