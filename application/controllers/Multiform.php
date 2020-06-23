<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multiform extends CI_Controller {

	public function index()
	{
		$data['message'] = '';
		if ($_POST) {
			$ajax_data = $this->input->post();
			$ins_id = $this->Crud->create('tbl_login', $ajax_data);

			if ($ins_id > 0) {
				$data = array('response' => 'success', 
							'message' => '<div class="alert alert-success">
											Registration Completed Successfully
										</div>');
			} else {
				$data = array('response' => 'danger', 
                            'message' => '<div class="alert alert-success">
																	  There is an error in Registration
																	</div>');
			}
		}

		$data['title'] = "Multiform";
		$this->load->view('multiform', $data);
	}
}