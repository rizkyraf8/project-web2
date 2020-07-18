<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_transaction extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_transaction_model');
    }

    public function index()
    {
        $data['page'] = "Report Transaction";
        $data['subpage'] = "List";
        $data['content'] = "report/transaction/transaction_list";
        $this->load->view('_template/wrapper', $data, FALSE);
    }

    public function json()
    {
        header('Content-Type: application/json');
        $arrData = array();

        $query = $this->Report_transaction_model->get_list();

        foreach ($query as $key => $value) {
            $value['action'] = "
            <a class=\"btn btn-danger\" href=\"" . base_url(getController() . "/pdf/" . encode($value['transactionId'])) . "\">
            <i class=\"fa fa-file-pdf\"></i>
            </a>
           ";
            //    <a class=\"btn btn-success\" href=\"" . base_url(getController() . "/xsl/" . encode($value['transactionId'])) . "\">
            //    <i class=\"fa fa-file-excel\"></i>
            //    </a>
            $value['status'] = getStatusTransaksi($value['status']);

            array_push($arrData, $value);
        }

        echo json_encode(array("data" => $arrData));
    }

    public function pdf($id = "")
    {
        $this->load->library('Pdf');

        $data['data'] = $this->Report_transaction_model->get_data(decode($id));
        $data['product'] = $this->Report_transaction_model->get_data_list(decode($id));
        $data['data']['status'] = getStatusTransaksi($data['data']['status']);
        $this->load->view('report/transaction/cetak_transaction_pdf', $data);
    }

    public function xls()
    {
        $query = $this->Report_transaction_model->get_list_report();
        
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=\"Report Transaction.xls\"");
        header("Content-Transfer-Encoding: binary ");
        
        
        $this->load->view('report/transaction/transaction_xls', array("data" => $query), FALSE);
    }
}

/* End of file Report_transaction.php */
