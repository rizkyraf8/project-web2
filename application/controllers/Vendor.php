<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vendor_model');
    }

    public function index()
    {
        $data['page'] = "Vendor";
        $data['subpage'] = "List";
        $data['content'] = "vendor/vendor_list";
        $this->load->view('_template/wrapper', $data, FALSE);
    }

    public function json()
    {
        header('Content-Type: application/json');
        $arrData = array();

        $query = $this->Vendor_model->get_list();

        foreach ($query as $key => $value) {
            $value['action'] = "
            <a class=\"btn btn-success\" href=\"" . base_url(getController() . "/form/" . encode($value['vendorId'])) . "\">
            <i class=\"fa fa-edit\"></i>
            </a>";

            $value['action'] .= "
            <a href =\"#\" class=\"btn btn-danger\" onclick=\"delete_data('" . encode($value['vendorId']) . "')\">
            <i class=\"fa fa-trash\"></i>
            </a>";

            array_push($arrData, $value);
        }

        echo json_encode(array("data" => $arrData));
    }

    public function form($id = '')
    {
        $data['page'] = "Vendor";
        $data['subpage'] = "Add";
        $data['content'] = "vendor/vendor_form";
        $data['data'] = $this->Vendor_model->get_data(decode($id));

        $this->load->view('_template/wrapper', $data, FALSE);
    }

    public function save()
    {
        $post = $this->input->post();

        if (@$post['vendorId']) {

            $arrSave = array(
                "vendorName" => @$post['vendorName'],
                "vendorProvince" => @$post['vendorProvince'],
                "vendorCity" => @$post['vendorCity'],
                "vendorAddress" => @$post['vendorAddress'],
                "vendorPhone" => @$post['vendorPhone'],
                "updatedBy" => $this->session->userdata("userId")."",
                "updatedAt" => date('Y-m-d H:i:s'),
            );

            $this->Vendor_model->update_data($arrSave, decode(@$post['vendorId']));
            redirect(getController());
        } else {
            $arrSave = array(
                "vendorName" => @$post['vendorName'],
                "vendorProvince" => @$post['vendorProvince'],
                "vendorCity" => @$post['vendorCity'],
                "vendorAddress" => @$post['vendorAddress'],
                "vendorPhone" => @$post['vendorPhone'],
                "createdBy" => $this->session->userdata("userId")."",
                "createdAt" => date('Y-m-d H:i:s'),
            );

            $this->Vendor_model->insert_data($arrSave);
            redirect(getController());
        }
    }

    public function delete($id = "")
    {   
        $this->Vendor_model->delete_data(decode($id));
    }
}

/* End of file vendor.php */
