<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();

        // load Model เข้ามาใช้งาน
        $this->load->model('UsersModel','',true);
    }

	public function index()
	{
        $data['main_content'] = 'frontend/pages/index';
        $data['title'] = 'Home';
		$this->load->view('frontend/templates/default_template',$data);
        // echo "Index page";
        // print_r({$data});
	}

	public function about()
	{
		// $this->load->view('welcome_message');
        // echo "About page";
        $data['main_content'] = 'frontend/pages/about';
        $data['title'] = 'About';
		$this->load->view('frontend/templates/default_template',$data);
	}
	
    public function login()
	{
        $data['main_content'] = 'frontend/pages/login';
        $data['title'] = 'เข้าสู่ระบบ';
		$this->load->view('frontend/templates/default_template',$data);

	}
    public function login_process() 
    {
        // echo "OK"; //เอาไว้ทดสอบว่าวิ่งมาหรือเปล่า จะแสดงที่หน้าจอว่า "ok"
        // รับค่าจากฟอร์ม
        // echo $this->input->post('email');
        // echo "<br>";
        // echo $this->input->post('password');
        
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $result = $this->UsersModel->login($email, $password);
        if($result){
            // สร้างตัวแปร array ไว้เก็บ session ของ user ที่ล็อกอินเข้ามา
            $sess_array = array();

            foreach($result as $row){
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'email' => $row->email,
                    'fullname' => $row->fullname,
                    'mobile' => $row->mobile,
                    'status' => $row->status
                );
            }

            $this->session->set_userdata('logged_in', $sess_array);
            echo "Login Success";
            //ส่งไปที่หน้า dashboard
            // redirect('backend/dashboard','refresh');
            redirect('backend/dashboard','refresh');
            
            // echo "<pre>";
            // print_r($result);
            // echo "</pre>";
        }else{
            // echo "Login Fail";
            // exit();
            //ต้องทำ popup + redirect
            redirect('front/login', 'refresh');
        }
        
        

    }
}

