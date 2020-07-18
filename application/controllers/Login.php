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
        if($this->session->userData("userId")){
            redirect("dashboard");
            exit;
        }

        $this->load->view('login', null, FALSE);   
    }

    function auth(){
        header('Content-Type: application/json');
        
        $post = $this->input->post();
        $username = @$post['userEmail'];
        $password = @$post['userPassword'];

        $query = $this->Login_model->check_login($username, hash_password($password));

        if($query){
            $arrSession = array(
                "userId" => $query['userId'],
                "userEmail" => $query['userEmail'],
                "userName" => $query['userName'],
                "userType" => $query['userType'],
            );

            $this->session->set_userdata($arrSession);
            
            echo json_encode(array("success" => true));
        }else{
            echo json_encode(array("success" => false));
        }
    }

    public function logout(){
        $array_items = array('userId', 'userName','userEmail','userType');
		$this->session->unset_userdata($array_items);
		redirect('login');
    }

}

/* End of file Login.php */

?>