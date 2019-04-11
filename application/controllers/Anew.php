<?php
/**
 * Created by PhpStorm.
 * User: ISARA-2XX
 * Date: 3/15/2019
 * Time: 6:20 PM
 */

class Anew extends CI_Controller
{


	public function marksIndex()
	{
		$this->load->model("Anew_model");
		$data['fetch_data'] = $this->Anew_model->fetch_data();
		$this->load->view("AdMarks", $data);
	}


	function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('Anew_model');
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->Anew_model->fetch_data_marks($query);
		$output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th>Student Name</th>
       <th>Courses</th>
       <th>CA Marks</th>
       <th>module points</th>
       <th>Grade</th>
      </tr>
  ';
		if($data->num_rows() > 0)
		{
			foreach($data->result() as $row)
			{
				$output .= '
      <tr>
       <td>'.$row->username.'</td>
       <td>'.$row->cname.'</td>
       <td>'.$row->cmarks.'</td>
       <td>'.$row->mpoints.'</td>
       <td>'.$row->grade.'</td>
      </tr>
    ';
			}
		}
		else
		{
			$output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
		}
		$output .= '</table>';
		echo $output;
	}



}
