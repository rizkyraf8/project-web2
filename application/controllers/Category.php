<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
    }

    public function index()
    {
        $data['page'] = "category";
        $data['subpage'] = "List";
        $data['content'] = "category/category_list";
        $this->load->view('_template/wrapper', $data, FALSE);
    }

    public function json()
    {
        header('Content-Type: application/json');
        $arrData = array();

        $query = $this->Category_model->get_list();

        foreach ($query as $key => $value) {
            $value['action'] = "
            <a class=\"btn btn-success\" href=\"" . base_url(getController() . "/form/" . encode($value['categoryId'])) . "\">
            <i class=\"fa fa-edit\"></i>
            </a>";

            $value['action'] .= "
            <a href =\"#\" class=\"btn btn-danger\" onclick=\"delete_data('" . encode($value['categoryId']) . "')\">
            <i class=\"fa fa-trash\"></i>
            </a>";

            array_push($arrData, $value);
        }

        echo json_encode(array("data" => $arrData));
    }

    public function form($id = '')
    {
        $data['page'] = "category";
        $data['subpage'] = "Add";
        $data['content'] = "category/category_form";
        $data['data'] = $this->Category_model->get_data(decode($id));

        $this->load->view('_template/wrapper', $data, FALSE);
    }

    public function save()
    {
        $post = $this->input->post();

        if (@$post['categoryId']) {

            $arrSave = array(
                "categoryName" => @$post['categoryName'],
                "categoryCode" => @$post['categoryCode'],
            );

            $this->Category_model->update_data($arrSave, decode(@$post['categoryId']));
            redirect(getController());
        } else {
            $arrSave = array(
                "categoryName" => @$post['categoryName'],
                "categoryCode" => @$post['categoryCode'],
            );

            $this->Category_model->insert_data($arrSave);
            redirect(getController());
        }
    }

    public function delete($id = "")
    {   
        $this->Category_model->delete_data(decode($id));
    }
}

/* End of file Category.php */
