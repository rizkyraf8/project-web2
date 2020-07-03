<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
    }

    public function index()
    {
        $data['page'] = "product";
        $data['subpage'] = "List";
        $data['content'] = "product/product_list";
        $this->load->view('_template/wrapper', $data, FALSE);
    }

    public function json()
    {
        header('Content-Type: application/json');
        $arrData = array();

        $query = $this->Product_model->get_list();

        foreach ($query as $key => $value) {
            $value['productSalesPrice'] = "Rp " . konversi_uang($value['productSalesPrice']);
            $value['productPrice'] = "Rp " . konversi_uang($value['productPrice']);

            $value['action'] = "
            <a class=\"btn btn-success\" href=\"" . base_url(getController() . "/form/" . encode($value['productId'])) . "\">
            <i class=\"fa fa-edit\"></i>
            </a>";

            $value['action'] .= "
            <a href =\"#\" class=\"btn btn-danger\" onclick=\"delete_data('" . encode($value['productId']) . "')\">
            <i class=\"fa fa-trash\"></i>
            </a>";

            array_push($arrData, $value);
        }

        echo json_encode(array("data" => $arrData));
    }

    public function form($id = '')
    {
        $data['page'] = "product";
        $data['subpage'] = "Add";
        $data['content'] = "product/product_form";
        $data['data'] = $this->Product_model->get_data(decode($id));

        $this->load->view('_template/wrapper', $data, FALSE);
    }

    public function save()
    {
        $post = $this->input->post();

        if (@$post['productId']) {

            $arrSave = array(
                "productName" => @$post['productName'],
                "productPrice" => @$post['productPrice'],
                "productSalesPrice" => @$post['productSalesPrice'],
                "productDescription" => @$post['productDescription'],
                "categoryCode" => @$post['categoryCode'],
                "vendorId" => @$post['vendorId'],
                "updatedBy" => $this->session->userdata("userId")."",
                "updatedAt" => date('Y-m-d H:i:s'),
            );

            $this->Product_model->update_data($arrSave, decode(@$post['productId']));
            redirect(getController());
        } else {
            $arrSave = array(
                "productName" => @$post['productName'],
                "productPrice" => @$post['productPrice'],
                "productSalesPrice" => @$post['productSalesPrice'],
                "productDescription" => @$post['productDescription'],
                "categoryCode" => @$post['categoryCode'],
                "vendorId" => @$post['vendorId'],
                "createdBy" => $this->session->userdata("userId")."",
                "createdAt" => date('Y-m-d H:i:s'),
            );

            $this->Product_model->insert_data($arrSave);
            redirect(getController());
        }
    }

    public function delete($id = "")
    {   
        $this->Product_model->delete_data(decode($id));
    }
}

/* End of file product.php */
