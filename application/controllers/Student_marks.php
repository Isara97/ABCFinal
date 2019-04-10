<?php
class Student_marks extends CI_Controller{
	function marksIndex(){
		$this->load->model('S_marks');
		$data['mark']=$this->S_marks->getMarks();
	}
	function fetch_user(){
		$this->load->model("Stuadmin_model");
		$fetch_data = $this->Stuadmin_model->make_datatables();
		$data = array();
		foreach($fetch_data as $row)
		{
			$sub_array = array();
			$sub_array[] = $row->username;
			$sub_array[] = $row->first_name;
			$data[] = $sub_array;
		}
		$output = array(
			"draw"                    =>     intval($_POST["draw"]),
			"recordsTotal"          =>      $this->Stuadmin_model->get_all_data(),
			"recordsFiltered"     =>     $this->Stuadmin_model->get_filtered_data(),
			"data"                    =>     $data
		);
		echo json_encode($output);
	}
}
