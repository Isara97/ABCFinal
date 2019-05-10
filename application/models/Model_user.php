<?php


class Model_user extends CI_Model
{

    function insertUserdata() {

        $data = array(
            'fname' => $this->input->post('fname',TRUE),
            'lname' => $this->input->post('lname',TRUE),
            'email' => $this->input->post('email',TRUE),
            'ContactNo' => $this->input->post('ContactNo',TRUE),
            'Subjects' => $this->input->post('Subjects',TRUE),
            'password' => sha1($this->input->post('password',TRUE))
        );

        $this->db->insert('userlalesha',$data);

    }

    function LoginUser(){

        $email =  $this->input->post('email');
        $password=sha1($this->input->post('password'));

        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $respond = $this->db->get('userlalesha');
        if($respond->num_rows()==1){
            return $respond->row(0);

        }else{
            return false;
        }
    }

}
