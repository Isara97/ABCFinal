<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AddLectures extends CI_Controller{
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Model_lec', 'lec');
	}

	public function index()
	{
		$data['lec'] = $this->lec->getLec();
		$this->load->view('Homelal', $data);
	}

	public function add(){
		$this->load->view('addlal');
	}

	public function submit(){
		$result = $this->lec->submit();
		if($result){
			$this->session->set_flashdata('success_msg', 'Record added successfully');
		}else{
			$this->session->set_flashdata('error_msg', 'Fail to add record');
		}

		redirect(base_url('index.php/AddLectures'));
	}

	public function edit($id){
		$data['lecs'] = $this->lec->getLecById($id);
		$this->load->view('editlal',$data);
	}

	public function update()
	{
		$result = $this->lec->update();
		if ($result) {
			$this->session->set_flashdata('success_msg', 'Record updated successfully');
		} else {
			$this->session->set_flashdata('error_msg', 'Fail to update record');
		}
		redirect(base_url('index.php/AddLectures'));
	}

	public function delete($ID){
		$result = $this->lec->delete($ID);
		if ($result) {
			$this->session->set_flashdata('success_msg', 'Record deleted successfully');
		} else {
			$this->session->set_flashdata('error_msg', 'Fail to delete record');
		}
		redirect(base_url('index.php/AddLectures'));
	}

	public function Login(){
		$this->load->view('Loginlal');
	}

	public function Register()
	{
		$this->load->view('Registerlal');
	}

	public  function logout(){
		$this->load->view('Login_lal');
	}

	/*public function lecturrerProfile(){

	}*/
}
