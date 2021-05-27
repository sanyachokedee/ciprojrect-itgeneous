<!-- REST API Users -->
<?php
// echo "Users.php";

//ใช้ตัวแปร  BASEPATH
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /*-------------------------------
    *get all users
    *ดึงรายชื่อทั้งหมด
    *call http://localhost/ciproject/api/v1/users/users_get
    */
    public function users_get()
    {
        $result = $this->db
            ->select('id,username,email,fullname,mobile,status')
            ->from('users')
            ->get()
            ->result();

        // echo "<br>raw data<br>";
        // print_r($result);

        // echo "<br><br>json_encode<br>";
        // echo $result;
        echo json_encode($result);
        // return $result;
        // print_r($result_json_encode);

        // echo "<br><br>json_decode<br>";
        // $result_json_decode = json_decode($result_json_encode);
        // print_r($result_json_decode);
    }


    public function users_post()
    {
        /*-------------------------------
        *
        *เพิ่มข้อมูล
        *call http://localhost/ciproject/api/v1/users/users_post
        */ // รับค่าจาก Client

        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, TRUE); //ถ้าตั้งเป้น TRUE จะทำเป็น associative array ให้
        //     print_r($inputJSON); // ทดสอบให้แสดงในหน้าจอ
        //     echo "<br><br>";
        print_r($input);
        // exit();
        $user_data = array(
            'username' => $input['username'],
            'password' => $input['password'],
            'fullname' => $input['fullname'],
            'mobile' => $input['mobile'],
            'email' => $input['email'],
            'status' => $input['status']
        );
        $this->db->insert('users', $user_data); // insert into table "users"
        if ($this->db->affected_rows() > 0)  // ถ้า affected_rows > 0 แสดงว่ามีการเพิ่มเข้าไป
        {
            echo '{"Success":{"text":"Add new user success"}}.$this->db->affected_rows()';
        } else {
            echo '{"Error":{"text":"can not add"}}.$this->db->affected_rows()';
        }
    }

   
    public function users_put($id)
    { 
        /*-------------------------------
        * Edit user
        *แก้ไขข้อมูล
        *call http://localhost/ciproject/api/v1/users/users_put/id
        */
        // รับค่าจาก Client
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, TRUE); //ถ้าตั้งเป้น TRUE จะทำเป็น associative array ให้

        // print_r($input);
        // exit();
        $where_user_data = array(
            'id' => $id,
        );

        $user_data = array(
            'username' => $input['username'],
            'password' => $input['password'],
            'fullname' => $input['fullname'],
            'mobile' => $input['mobile'],
            'email' => $input['email'],
            'status' => $input['status']
        );

        $this->db->where($where_user_data);
        $this->db->update('users', $user_data);
        if ($this->db->affected_rows() > 0)  // ถ้า affected_rows > 0 แสดงว่ามีการเพิ่มเข้าไป
        {
            echo '{"Success":{"text":"Update user success"}}.$this->db->affected_rows()';
        } else {
            echo '{"Error":{"text":"Uupdate user failed "}}.$this->db->affected_rows()';
        }
    }

    /*-------------------------------
    * Delete user
    *ลบข้อมูล
    *call http://localhost/ciproject/api/v1/users/users_delete/id
    */
    public function users_delete($id)
    {
        // รับค่าจาก Client
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, TRUE); //ถ้าตั้งเป้น TRUE จะทำเป็น associative array ให้

        // print_r($input);
        // exit();
        $where_user_data = array(
            'id' => $id,
        );
        echo "<br> \$where_user_data: " . $id;
        // var_dump($this);

        $this->db->where($where_user_data);
        $this->db->delete('users');

        // exit();
        if ($this->db->affected_rows() > 0)  // ถ้า affected_rows > 0 แสดงว่ามีการเพิ่มเข้าไป
        {
            echo '{"Success":{"text":"Delete user success"}}';
        } else {
            echo '{"Error":{"text":"Delete user failed"}}';
        }
    }
}
