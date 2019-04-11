<?php
/**
 * Created by PhpStorm.
 * User: ISARA-2XX
 * Date: 3/15/2019
 * Time: 6:20 PM
 */

class Anew_model extends CI_Model{

	function fetch_data(){
		//$query = $this->db->get("marks");
		//select * from marks
		//$query = $this->db->query("SELECT * FROM marks ORDER BY id DESC");
		$this->db->select("*");
		$this->db->from("marks");
		$query = $this->db->get();
		return $query;
	}

	function fetch_data_marks($query)
	{
		$this->db->select("*");
		$this->db->from("marks");
		if($query != '')
		{
			$this->db->like('username', $query);
		}
		$this->db->order_by('id', 'DESC');
		return $this->db->get();
	}



}
