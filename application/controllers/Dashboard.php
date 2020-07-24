<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        
    }
    

    public function index()
    {   
        $data['jumlah']['order'] = $this->Dashboard_model->order(); 
        $data['jumlah']['vendor'] = $this->Dashboard_model->vendor(); 
        $data['jumlah']['customer'] = $this->Dashboard_model->customer(); 
        $data['jumlah']['product'] = $this->Dashboard_model->product(); 

        $data['page'] = "Dashboard";
        $data['subpage'] = "View";
        $data['content'] = "dashboard";
        $this->load->view('_template/wrapper', $data, FALSE);  
    }

}

/* End of file Dashboard.php */
