<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load extends CI_Controller {

	public function index()
	{
		$data['video'] = $this->Crud->read_limit(2, 'tbl_video');
		$this->load->view('load', $data);
	}

	public function load_more()
	{
		if ($this->input->post('last_video_id')) {
			$last_video_id = $this->input->post('last_video_id');
			$video = $this->Crud->read_where_condition("`id` > '$last_video_id'", 'tbl_video');
			$output = '';
			if ($video) {
				foreach ($video as $row) {
					$video_id = $row->id;  
					$output = '  
					<tbody>  
						<tr>  
							<td>'.$row->video_title.'</td>  
						</tr>
					</tbody>';
				}
				$output .= '
				<tbody>
					<tr id="remove_row">  
						<td><button type="button" name="btn_more" data-vid="'. $video_id .'" id="btn_more" class="btn btn-success form-control">more</button></td>  
					</tr>
				</tbody>  
				';
			}
			echo $output;
		}
	}
}
