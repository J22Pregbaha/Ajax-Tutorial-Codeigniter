<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skeleton extends CI_Controller {

	public function index()
	{
		$this->load->view('skeleton');
	}

	public function fetch()
	{
		if ($this->input->is_ajax_request()) {
			$table = 'tbl_post';
			$output = '';

			$results = $this->Crud->read($table);
			foreach ($results as $row) {
				$output .= '<div class="row">';
				$output .= '<div class="col-md-4">';
				$output .= '<img src="images/'.$row->post_image.'" class="img-thumbnail" />';
				$output .= '</div>';
				$output .= '<div class="col-md-8">';
				$output .= '<h2><a href="'.$row->post_url.'">'.$row->post_title.'</a></h2>';
				$output .= '<br />';
				$output .= '<p>'.$row->post_description.'</p>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '<hr />';
			}

			echo $output;
		}
	}
}