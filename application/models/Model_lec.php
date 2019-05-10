<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_lec extends CI_Model
{

    public function getLec(){
        $query = $this->db->get('userlalesha');
        if($query->num_rows() > 0){
            return $query->result();

        }else{
            return false;
        }
    }

    public function submit(){
        $field = array(
            'fname'=>$this->input->post('txt_fname'),
            'lname'=>$this->input->post('txt_lname'),
            'email'=>$this->input->post('email'),
            'ContactNo'=>$this->input->post('num_con'),
            'subjects'=>$this->input->post('txt_subject'),
            'password' =>sha1($this->input->post('password',TRUE))
        );
        $this->db->insert('userlalesha', $field);
        if($this->db->affected_rows() > 0){
            return true;

        }else{
            return false;
        }
    }

    public function getLecById($id) {
        $this->db->where('id',$id);
        $query = $this->db->get('userlalesha');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function update(){
        $id = $this->input->post('txt_hidden');
        $field = array(
            'fname'=>$this->input->post('txt_fname'),
            'lname'=>$this->input->post('txt_lname'),
            'email'=>$this->input->post('email'),
            'ContactNo'=>$this->input->post('num_con'),
            'subjects'=>$this->input->post('txt_subject')
        );
        $this->db->where('id', $id);
        $this->db->update('userlalesha', $field);
        if($this->db->affected_rows() > 0) {
            return true;
        }else {
            return false;
        }

    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('userlalesha');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    }
