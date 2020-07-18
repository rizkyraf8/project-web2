<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

        if($this->session->userData("userType") != "admin"){
            redirect("dashboard");
        }
    }

    public function index()
    {
        $data['page'] = "User";
        $data['subpage'] = "List";
        $data['content'] = "user/user_list";
        $this->load->view('_template/wrapper', $data, FALSE);
    }

    public function json()
    {
        header('Content-Type: application/json');
        $arrData = array();

        $query = $this->User_model->get_list();

        foreach ($query as $key => $value) {

            $value['userType'] = getUserType($value['userType']);
            
            $value['action'] = "
            <a class=\"btn btn-success\" href=\"" . base_url(getController() . "/form/" . encode($value['userId'])) . "\">
            <i class=\"fa fa-edit\"></i>
            </a>";

            $value['action'] .= "
            <a href =\"#\" class=\"btn btn-danger\" onclick=\"delete_data('" . encode($value['userId']) . "')\">
            <i class=\"fa fa-trash\"></i>
            </a>";

            array_push($arrData, $value);
        }

        echo json_encode(array("data" => $arrData));
    }

    public function form($id = '')
    {
        $data['page'] = "user";
        $data['subpage'] = "Add";
        $data['content'] = "user/user_form";
        $data['data'] = $this->User_model->get_data(decode($id));

        $this->load->view('_template/wrapper', $data, FALSE);
    }

    public function save()
    {
        $post = $this->input->post();

        if (@$post['userId']) {

            $arrSave = array(
                "userName" => @$post['userName'],
                "userEmail" => @$post['userEmail'],
                "userType" => @$post['userType'],
                "updatedBy" => $this->session->userdata("userId")."",
                "updatedAt" => date('Y-m-d H:i:s'),
            );

            if(@$post['userPassword'] != ""){
                $arrSave["userPassword"] = hash_password(@$post['userPassword']);
            }

            $this->User_model->update_data($arrSave, decode(@$post['userId']));
            redirect(getController());
        } else {
            $arrSave = array(
                "userName" => @$post['userName'],
                "userEmail" => @$post['userEmail'],
                "userPassword" => hash_password(@$post['userPassword']),
                "userType" => @$post['userType'],
                "createdBy" => $this->session->userdata("userId")."",
                "createdAt" => date('Y-m-d H:i:s'),
            );

            $this->User_model->insert_data($arrSave);
            redirect(getController());
        }
    }

    public function delete($id = "")
    {   
        $this->User_model->delete_data(decode($id));
    }
}

/* End of file user.php */
