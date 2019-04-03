<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller{

    function __construct(){
        parent:: __construct();
        $this->load->model('services_model', 'm');
    }

    function index(){
        $data['service'] = $this->m->getBlog();
        $this->load->view('services_view',$data);
    }

    public function submit(){
        $result = $this->m->submit();
        if($result){
            $this->session->set_flashdata('success_msg', 'Record added successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Faill to add record');
        }
        redirect(base_url('Home/homeIndex'));
    }


    public function delete($id){
        $result = $this->m->delete($id);
        if($result){
            $this->session->set_flashdata('success_msg', 'Record deleted successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Faill to delete record');
        }
        redirect(base_url('Services/index'));
    }

}