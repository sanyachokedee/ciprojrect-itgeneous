<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller {
        public function __construct() {
        parent:: __construct();
    }

    public function index() 
    {
       
        // $this->load->view(base_URL().'notfound_view',)

        $data['main_content'] = 'notfound_view';
        $data['title'] = 'ไม่พบข้อมูล';
		$this->load->view('frontend/templates/default_template',$data);
        // $this->load->view('notfound_view',); //ส่งให้เช้าตรง page
    }
}
    
