<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_transaction extends CI_Controller {
    
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

    public function json(){
        header('Content-Type: application/json');
        $arrData = array();

        $query = $this->Report_transaction_model->get_list();

        foreach ($query as $key => $value) {
            $value['status'] = getStatusTransaksi($value['status']);

            array_push($arrData, $value);
        }

        echo json_encode(array("data" => $arrData));
    }

}

/* End of file Report_transaction.php */
