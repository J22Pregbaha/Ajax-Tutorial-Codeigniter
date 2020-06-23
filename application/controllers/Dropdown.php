<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropdown extends CI_Controller {

	public function index()
	{
		$data['country'] = $this->Crud->read('country');
		$this->load->view('dropdown', $data);
	}

	public function fetch_state()
	{
		if ($this->input->post('country_id')) {
			$country_id = $this->input->post('country_id');
			$states = $this->Crud->read_where('country_id', $country_id, 'state');
			$output = '<option value="">Select state</option>';
			foreach ($states as $state) {
				$output .= '<option value="'.$state->id.'">'.$state->state_name.'</option>';
			}
			echo $output;
		}
	}

	public function fetch_city()
	{
		if ($this->input->post('state_id')) {
			$state_id = $this->input->post('state_id');
			$cities = $this->Crud->read_where('state_id', $state_id, 'city');
			$output = '<option value="">Select city</option>';
			foreach ($cities as $city) {
				$output .= '<option value="'.$city->id.'">'.$city->city_name.'</option>';
			}
			echo $output;
		}
	}
}
