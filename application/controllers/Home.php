<?php
/**
 * Created by PhpStorm.
 * User: ISARA-2XX
 * Date: 3/21/2019
 * Time: 8:30 PM
 */
class Home extends CI_Controller{
    public function Index(){
        $this->load->view('Home');
    }

    public function homeIndex(){
        $this->load->view('Student_UI');
    }

}