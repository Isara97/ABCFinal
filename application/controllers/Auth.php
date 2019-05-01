<?php
/**
 * Created by PhpStorm.
 * User: ISARA-2XX
 * Date: 3/15/2019
 * Time: 6:20 PM
 */

class Auth extends CI_Controller {


    public function login(){

        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required|min_length[5]');

        if($this->form_validation->run() == TRUE){

            $username = $_POST['username'];
            $password = $_POST['password'];


            // check user in database
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where(array('username'=>$username,'password'=>$password));
            $query = $this->db->get();

            $user = $query->row();

            //if user exists
            if ($user->email){
                //temporary message
				if($user->role == 'student') {


					$this->session->set_flashdata('success', "You are Logged in");
					//set session variables
					$_SESSION['user_logged'] = TRUE;
					$_SESSION['username'] = $user->username;
					$_SESSION['role'] = $user->role;
					$_SESSION['email'] = $user->email;
					$_SESSION['address'] = $user->address;
					$_SESSION['first_name'] = $user->first_name;
					$_SESSION['last_name'] = $user->last_name;
					$_SESSION['phone'] = $user->phone;
					$_SESSION['gender'] = $user->gender;
					$_SESSION['image'] = $user->image;


					//redirect to profile page
					redirect("Home/homeIndex", "refresh");
				}
				else{
					redirect("auth/login","refresh");
				}
            }else{
                $this->session->set_flashdata("error","No such account exists in database...!!");
                redirect("auth/login","refresh");
            }
        }

        $this->load->view('login');
    }






}
