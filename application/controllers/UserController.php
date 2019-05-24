<?php

class UserController extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function login(){

        if (!isset($_SESSION['user_logged'])&&!isset($_SESSION['userType'])){
            if (isset($_POST['login'])){

                $regNo = $_POST['regNo'];
                $password = $_POST['password'];

                $this->UserModel->login($regNo,$password);

            }

            $this->load->view('login');
        }else{
            redirect("LmsController/profile");
        }

    }

    public function myProfile(){
		$this->load->view('student/studentProfile');
	}

    public function register(){

        if (!isset($_SESSION['user_logged'])&&!isset($_SESSION['userType'])) {
            if (isset($_POST['register'])) {

                $regNo = $_POST['regNo'];
                $nic = $_POST['nic'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];

                if ($password == $cpassword) {

                    $this->UserModel->register($regNo, $nic, $password);

                }

            }

            $this->load->view('register');
        }else{
            redirect("LmsController/profile");
        }

    }

    public function image()
    {

        if(isset($_POST["image"]))
        {
            $data = $_POST["image"];

            $image_array_1 = explode(";", $data);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = time() . '.png';

            $this->session->set_flashdata("image_path",$imageName);

            file_put_contents("image/".$imageName, $data);

            $name = "image/".$imageName;

            $this->UserModel->uploadImage($name,$_SESSION['regNum']);

        }

    }

}
