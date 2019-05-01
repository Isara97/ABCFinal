<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stuadmin_controller extends CI_Controller {
    //functions

    function index(){
        $data["title"] = "ABC Admin - Students Details";
        $this->load->view('Stuadmin_view', $data);
    }
    function fetch_user(){
        $this->load->model("Stuadmin_model");
        $fetch_data = $this->Stuadmin_model->make_datatables();
        $data = array();
        foreach($fetch_data as $row)
        {
            $sub_array = array();
            $sub_array[] = '<img src="'.base_url().'./upload'.$row->image.'" class="img-thumbnail" width="120" height="90" />';
            $sub_array[] = $row->username;
            $sub_array[] = $row->first_name;
            $sub_array[] = $row->last_name;
            $sub_array[] = $row->password;
            $sub_array[] = $row->email;
            $sub_array[] = $row->address;
            $sub_array[] = $row->gender;
            $sub_array[] = $row->phone;
            $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update" style=" width: 100%;height: 100%">Update</button>';
            $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete" style=" width: 100%;height: 100%">Delete</button>';
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

	/**
	 *
	 */
	function user_action(){
        if(!$_POST["action"] == "Add")
        {
            $insert_data = array(
                'username'          =>     $this->input->post('username'),
                'first_name'          =>     $this->input->post('first_name'),
                'last_name'               =>     $this->input->post("last_name"),
                'password'          =>     $this->input->post('password'),
                'email'          =>     $this->input->post('email'),
                'address'          =>     $this->input->post('address'),
                'gender'          =>     $this->input->post('gender'),
                'phone'          =>     $this->input->post('phone'),
                'role'			=>  'student',
                'image'                    =>     $this->upload_image()
            );
            $this->load->model('Stuadmin_model');
            $this->Stuadmin_model->insert_crud($insert_data);
            echo 'Data Inserted';
        }
        if(!$_POST["action"] == "Edit")
		{
			/*$user_image = '';
			if($_FILES["user_image"]["name"] != '')
			{
				$user_image = $this->upload_image();
			}
			else
			{
				$user_image = $this->input->post("hidden_user_image");
			}*/

			$updated_data = array(
				'username'          =>     $this->input->post('username'),
				'first_name'          =>     $this->input->post('first_name'),
				'last_name'               =>     $this->input->post("last_name"),
				'password'          =>     $this->input->post('password'),
				'email'          =>     $this->input->post('email'),
				'address'          =>     $this->input->post('address'),
				'gender'          =>     $this->input->post('gender'),
				'phone'          =>     $this->input->post('phone'),
				'role'			=>  'student',
				'image'			=> 		$this->input->post("hidden_user_image")

			);




			$this->load->model('Stuadmin_model');
			$this->Stuadmin_model->update_crud($this->input->post('user_id'), $updated_data);
			$this->Stuadmin_model->delete_single_user($_POST["user_id"]);
			echo 'Data Updated';
		}
	}
    function upload_image()
    {
        if(isset($_FILES["user_image"]))
        {
            $extension = explode('.', $_FILES['user_image']['name']);
            $new_name = rand() . '.' . $extension[1];
			$destination = './upload' . $new_name;
			move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
            return $new_name;
        }
    }

    function fetch_single_user()
    {
        $output = array();
        $this->load->model("Stuadmin_model");
        $data = $this->Stuadmin_model->fetch_single_user($_POST["user_id"]);
        foreach($data as $row)
        {
            $output['username'] = $row->username;
            $output['first_name'] = $row->first_name;
            $output['last_name'] = $row->last_name;
            $output['password'] = $row->password;
            $output['email'] = $row->email;
            $output['address'] = $row->address;
            $output['gender'] = $row->gender;
            $output['phone'] = $row->phone;

            if($row->image != '')
            {
                $output['user_image'] = '<img src="'.base_url().'./upload'.$row->
                    image.'" class="img-thumbnail" width="120" height="300" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';
            }
            else
            {
                $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
            }
        }
        echo json_encode($output);
    }


	function delete_single_user()
	{
		$this->load->model("Stuadmin_model");
		$this->Stuadmin_model->delete_single_user($_POST["user_id"]);
		echo 'Data Deleted';
	}


//this is use in profile for img size
	function fetch_singleuser()
	{
		$output = array();
		$this->load->model("Stuadmin_model");
		$data = $this->Stuadmin_model->fetch_single_user($_POST["user_id"]);
		foreach($data as $row)
		{
			$output['username'] = $row->username;
			$output['first_name'] = $row->first_name;
			$output['last_name'] = $row->last_name;
			$output['password'] = $row->password;
			$output['email'] = $row->email;
			$output['address'] = $row->address;
			$output['gender'] = $row->gender;
			$output['phone'] = $row->phone;
			$output['user_image'] = '<img src="'.base_url().'./upload'.$row->image.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';

		}

		echo json_encode($output);
	}



}
