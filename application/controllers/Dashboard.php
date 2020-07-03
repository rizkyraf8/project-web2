<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function index()
    {   
        $data['page'] = "Dashboard";
        $data['subpage'] = "View";
        $data['content'] = "dashboard";
        $this->load->view('_template/wrapper', $data, FALSE);  
    }

}

/* End of file Dashboard.php */
