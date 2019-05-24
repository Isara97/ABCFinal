<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class services_model extends CI_Model{


    public function getBlog(){
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get('tbl_blogs');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function submit(){
        $field = array(
            'name'=>$this->input->post('my_name'),
            'phone'=>$this->input->post('my_phone'),
            'email'=>$this->input->post('my_email'),
            'description'=>$this->input->post('txt_description'),
            'created_at'=>date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_blogs', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }


    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('tbl_blogs');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

}