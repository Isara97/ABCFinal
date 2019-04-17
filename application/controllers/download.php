<?php
defined('BASEPATH') or exit('No direct script access allowed');

class download extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('mfiles');
        $this->load->helper('download');
    }

    function index(){
        $id = $this->uri->segment(3);
        if (empty($id)){
            redirect(base_url());
        }
        $data = $this->mfiles->getRows($id);
        $filename =$data['file_name'];
        $fileContents = file_get_contents(base_url('upload/'. $data['file_name']));
        force_download($filename, $fileContents);
    }
}
