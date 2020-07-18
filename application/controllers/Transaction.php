<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model');
    }

    public function index()
    {
        $data['page'] = "Transaction";
        $data['subpage'] = "List";
        $data['content'] = "transaction/transaction_list";
        $this->load->view('_template/wrapper', $data, FALSE);
    }

    public function json()
    {
        header('Content-Type: application/json');
        $arrData = array();

        $query = $this->Transaction_model->get_list();

        foreach ($query as $key => $value) {
            $value['action'] = "";
            if ($value['status'] != "t") {
                $value['action'] = "
                <a class=\"btn btn-success\" href=\"" . base_url(getController() . "/form/" . encode($value['transactionId'])) . "\">
                <i class=\"fa fa-edit\"></i>
                </a>";

                if ($value['status'] == "f") {
                    $value['action'] .= "
                    <a href=\"#\" class=\"btn btn-danger\" onclick=\"delete_data('" . encode($value['transactionId']) . "')\">
                    <i class=\"fa fa-trash\"></i>
                    </a>";
                }

                $value['action'] .= "
                <a href=\"" . base_url(getController() . "/proses/" . encode($value['transactionId'])) . "\" class=\"btn btn-info\">
                <i class=\"fa fa-random\"></i>
                </a>";
            }

            $value['status'] = getStatusTransaksi($value['status']);

            array_push($arrData, $value);
        }

        echo json_encode(array("data" => $arrData));
    }

    public function product_json($id = '')
    {
        header('Content-Type: application/json');
        $query = $this->Transaction_model->get_data_list(decode($id));

        echo json_encode(array("data" => $query));
    }

    public function form($id = '')
    {
        $data['page'] = "Transaction";
        $data['subpage'] = "Add";
        $data['content'] = "transaction/transaction_form";
        $data['data'] = $this->Transaction_model->get_data(decode($id));

        $this->load->view('_template/wrapper', $data, FALSE);
    }

    public function proses($id = '')
    {
        $data['page'] = "Transaction";
        $data['subpage'] = "Add";
        $data['content'] = "transaction/transaction_proses";
        $data['data'] = $this->Transaction_model->get_data(decode($id));
        $data['dataList'] = $this->Transaction_model->get_data_list(decode($id));

        if ($data['data']['transactionDateActual'] == "0000-00-00") {
            $data['data']['transactionDateActual'] = date('Y-m-d');
        }

        if ($data['data']['transactionDateSend'] == "0000-00-00") {
            $data['data']['transactionDateSend'] = date('Y-m-d');
        }

        $this->load->view('_template/wrapper', $data, FALSE);
    }

    public function save()
    {
        $post = $this->input->post();

        if (@$post['transactionId']) {

            $arrSave = array(
                "customerId" => @$post['customerId'],
                "transactionDateTarget" => @$post['transactionDateTarget'],
                "status" => "f",
                "updatedBy" => $this->session->userdata("userId") . "",
                "updatedAt" => date('Y-m-d H:i:s'),
            );

            $this->Transaction_model->update_data($arrSave, decode(@$post['transactionId']));

            $this->Transaction_model->delete_data_line(decode(@$post['transactionId']));

            $arrItem = array();
            foreach ($post['id'] as $key => $value) {
                $price = strtolower($post['salesPrice'][$value]);
                $price = str_replace("rp", "", $price);
                $price = str_replace(" ", "", $price);
                $price = str_replace(".", "", $price);
                $price = str_replace(",", "", $price);

                $item = array(
                    "transactionId" => decode($post['transactionId']),
                    "productId" => $value,
                    "qtyRequest" => $post['qty'][$value],
                    "price" => $price,
                    "status" => "f",
                    "createdBy" => $this->session->userdata("userId") . "",
                    "createdAt" => date('Y-m-d H:i:s'),
                );

                array_push($arrItem, $item);
            }

            $id = $this->Transaction_model->insert_batch($arrItem);
            redirect(getController());
        } else {
            $arrSave = array(
                "customerId" => @$post['customerId'],
                "transactionDateTarget" => @$post['transactionDateTarget'],
                "status" => "f",
                "createdBy" => $this->session->userdata("userId") . "",
                "createdAt" => date('Y-m-d H:i:s'),
            );

            $id = $this->Transaction_model->insert_data($arrSave);

            $arrItem = array();
            foreach ($post['id'] as $key => $value) {
                $price = strtolower($post['salesPrice'][$value]);
                $price = str_replace("rp", "", $price);
                $price = str_replace(" ", "", $price);
                $price = str_replace(".", "", $price);
                $price = str_replace(",", "", $price);

                $item = array(
                    "transactionId" => @$id,
                    "productId" => $value,
                    "qtyRequest" => $post['qty'][$value],
                    "price" => $price,
                    "status" => "f",
                    "createdBy" => $this->session->userdata("userId") . "",
                    "createdAt" => date('Y-m-d H:i:s'),
                );

                array_push($arrItem, $item);
            }

            $id = $this->Transaction_model->insert_batch($arrItem);
            redirect(getController());
        }
    }

    public function save_proses()
    {
        $post = $this->input->post();

        $arrSave = array(
            "transactionDateActual" => @$post['transactionDateActual'],
            "transactionDateSend" => @$post['transactionDateSend'],
            "status" => $post['status'],
            "updatedBy" => $this->session->userdata("userId") . "",
            "updatedAt" => date('Y-m-d H:i:s'),
        );

        $this->Transaction_model->update_data($arrSave, decode(@$post['transactionId']));

        foreach ($post['lineId'] as $key => $value) {
            $item = array(
                "qtyReady" => $post['qty'][$value],
                "status" => $post['statusBarang'][$value],
                "updatedBy" => $this->session->userdata("userId") . "",
                "updatedAt" => date('Y-m-d H:i:s'),
            );

            $this->Transaction_model->update_data_line($item, $value);
        }

        redirect("transaction");
    }

    public function delete($id = "")
    {
        $this->Transaction_model->delete_data(decode($id));
        $this->Transaction_model->delete_data_line(decode($id));
    }
}

/* End of file Transaction.php */
