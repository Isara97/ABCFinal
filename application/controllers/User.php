<?php
/**
 * Created by PhpStorm.
 * User: ISARA-2XX
 * Date: 3/15/2019
 * Time: 9:10 PM
 */

class User extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user_logged'])){

            $this->session->set_flashdata("error", "Please login first to view this page...!!");
            redirect("auth/login");
        }
        ob_start(); # add this
    }


    public function profile(){
        $this->load->view('profile');
    }

    public  function logout(){
        $this->clearCache();
        $this->load->library('session');
        $this->load->helper('url');
        $this->session->sess_destroy();
        redirect("Home/Index",'refresh');
    }
    protected function clearCache(){
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

    /*
    function fetch_me()
    {
        $output = array();
        $this->load->model("profile_modle");
        $data = $this->profile_modle->fetch_Me_Data($_POST["user_id"]);
        foreach($data as $row)
        {
            $output['name'] = $row->name;
            $output['marks'] = $row->marks;

        }
        echo json_encode($output);
    }*/


}