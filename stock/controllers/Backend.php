<?php
defined('BASEPATH') or exit('No direct script access allowed');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Backend extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function dashboard()
    {
        // echo "<br> dashboard";
        // print_r($this->session);
        // exit;
        // if($this->session->userdata('logged_in'))
        if (!$this->session->has_userdata('logged_in')['username']) {
            // echo "<pre>";
            // print_r($this->session->userdata('logged_in'));
            // echo "</pre>";

            // Read user table
            $data['users_data'] = $this->db->order_by("id", "desc")
                ->select('*')
                ->where('users.status', '0')
                ->from('users')
                ->get()
                ->result();

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;

            // ส่งค่าไปแสดงผลที่ View
            $data['main_content'] = 'backend/pages/dashboard';
            $data['title'] = 'รายชื่อผู้ใช้';
            $this->load->view('backend/templates/admin_template', $data);
        } else {
            redirect(base_url() . 'front/login', 'refresh');
            // echo "else";
        }
    }

    public function dashboardapi()
    {
       
        //ทดสอบข่้อมูลด้วย API 
        if (!$this->session->has_userdata('logged_in')['username']) {
            // get from api 
            // $api_url = "https://jsonplaceholder.typicode.com/posts/";
            $api_url = "http://localhost/ciproject/api/v1/users/users_get/";
            $api_url = "http://localhost/ciproject/api/v1/users/users_get/";

            // $data = [];
            $inputJSON = file_get_contents($api_url);
            // var_dump($inputJSON);
            // $rs = json_decode($inputJSON);
            $data['user_data'] = json_decode($inputJSON);
             
            // ส่งค่าไปแสดงผลที่ View
            $data['main_content'] = 'backend/pages/new';
            $data['title'] = 'รายชื่อผู้ใช้ API';
            $this->load->view('backend/templates/admin_template', $data);
        } else {
            redirect(base_url() . 'front/login', 'refresh');
        }
    }
    
    public function admin_lte()
    {
        // echo "<br> dashboard";
        // print_r($this->session);
        // exit;
        // if($this->session->userdata('logged_in'))
        if (!$this->session->has_userdata('logged_in')['username']) {
            // echo "<pre>";
            // print_r($this->session->userdata('logged_in'));
            // echo "</pre>";

            // // Read user table
            // $data['users_data'] = $this->db->order_by("id", "desc")
            // ->select('*')
            // ->where('users.status', '0')
            // ->from('users')
            // ->get()
            // ->result();

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;

            // ส่งค่าไปแสดงผลที่ View
            $data['main_content'] = 'backend/pages/admin_lte';
            $data['title'] = 'Admin LTE';
            $this->load->view('backend/templates/admin_template', $data);
        } else {
            redirect(base_url() . 'front/login', 'refresh');
            // echo "else";
        }
    }

    // public function admin_lte()
    // {
    //     // redirect(base_url() . 'backend/pages/index.html', 'refresh');
    //     // ส่งค่าไปแสดงผลที่ View
    //     $data['main_content'] = 'backend/pages/admin_lte';
    //     $data['title'] = 'admin_lte';
    //     $this->load->view('backend/templates/admin_template',$data);
    // }

    public function logout()
    {
        // คำสั่งในการ destroy session
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect(base_url() . 'front/login', 'refresh');
    }
}
