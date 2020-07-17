<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating extends CI_Controller {

	public function index()
	{
		$this->load->view('star_rating');
	}

	public function fetch()
	{
		$data = $this->Crud->read('business');
		$output = '';

		foreach ($data as $row) {
			$color = '';
			$rating = $this->Crud->read_select('business_id', $row->id, 'rating', 'AVG(rating) as rating', 'rating');
			
			$output .= '<h3 class="text-primary">'.$row->business_name.'</h3>
						<ul class="list-inline" data-rating="'.$rating.'" title="Average Rating - '.$rating.'">';
			for ($count=1; $count <= 5; $count++) { 
				if ($count <= $rating) {
					$color = 'color:#ffcc00;';
				} else {
					$color = 'color:#ccc;';
				}

				$output .= '<li title="'.$count.'" id="'.$row->id.'-'.$count.'" data-index="'.$count.'" data-business_id="'.$row->id.'" data-rating="'.$rating.'" class="rating" style="cursor:pointer; '.$color.' font-size:24px;">&#9733;</li>';
			}

			$output .= '</ul>
			<p>'.$row->address.'</p>
			<label style="text-danger">'.$row->product.'</label>
			<hr />
			';
		}

		echo $output;
	}

	public function insert()
	{
		if ($this->input->is_ajax_request()) {
			$table = 'rating';

			$business_id = $this->input->post('business_id');
			$rating =  $this->input->post('index');

			$ins_data = array('business_id' => $business_id, 
							'rating' => $rating);

			$ins_id = $this->Crud->create($table, $ins_data);
		}
	}
}