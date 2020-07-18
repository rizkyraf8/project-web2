<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('City_model');
        
    }
    
    public function index()
    {
        echo json_encode($this->City_model->get_list($this->input->post('provinceId')));
    }

}

/* End of file City.php */
