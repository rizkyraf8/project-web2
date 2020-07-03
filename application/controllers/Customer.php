<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
    }

    public function index()
    {
        $data['page'] = "Customer";
        $data['subpage'] = "List";
        $data['content'] = "customer/customer_list";
        $this->load->view('_template/wrapper', $data, FALSE);
    }

    public function json()
    {
        header('Content-Type: application/json');
        $arrData = array();

        $query = $this->Customer_model->get_list();

        foreach ($query as $key => $value) {
            $value['action'] = "
            <a class=\"btn btn-success\" href=\"" . base_url(getController() . "/form/" . encode($value['customerId'])) . "\">
            <i class=\"fa fa-edit\"></i>
            </a>";

            $value['action'] .= "
            <a href =\"#\" class=\"btn btn-danger\" onclick=\"delete_data('" . encode($value['customerId']) . "')\">
            <i class=\"fa fa-trash\"></i>
            </a>";

            array_push($arrData, $value);
        }

        echo json_encode(array("data" => $arrData));
    }

    public function form($id = '')
    {
        $data['page'] = "Customer";
        $data['subpage'] = "Add";
        $data['content'] = "customer/customer_form";
        $data['data'] = $this->Customer_model->get_data(decode($id));

        $this->load->view('_template/wrapper', $data, FALSE);
    }

    public function save()
    {
        $post = $this->input->post();

        if (@$post['customerId']) {

            $arrSave = array(
                "customerName" => @$post['customerName'],
                "customerProvince" => @$post['customerProvince'],
                "customerCity" => @$post['customerCity'],
                "customerAddress" => @$post['customerAddress'],
                "customerPhone" => @$post['customerPhone'],
                "updatedBy" => $this->session->userdata("userId")."",
                "updatedAt" => date('Y-m-d H:i:s'),
            );

            $this->Customer_model->update_data($arrSave, decode(@$post['customerId']));
            redirect(getController());
        } else {
            $arrSave = array(
                "customerName" => @$post['customerName'],
                "customerProvince" => @$post['customerProvince'],
                "customerCity" => @$post['customerCity'],
                "customerAddress" => @$post['customerAddress'],
                "customerPhone" => @$post['customerPhone'],
                "createdBy" => $this->session->userdata("userId")."",
                "createdAt" => date('Y-m-d H:i:s'),
            );

            $this->Customer_model->insert_data($arrSave);
            redirect(getController());
        }
    }

    public function delete($id = "")
    {   
        $this->Customer_model->delete_data(decode($id));
    }
}

/* End of file Customer.php */
