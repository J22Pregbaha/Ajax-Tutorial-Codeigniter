<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_tut extends CI_Controller {

	public function index()
	{
		$data['title'] = "Chat";
		$this->load->view('crud/crud', $data);
	}

	public function insert()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => 'danger', 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				$ins_id = $this->Crud->create('crud', $ajax_data);
				if ($ins_id > 0) {
					$data = array('response' => 'success', 'message' => "Inserted");
				} else {
					# code...
				}
				
				$data = array('response' => 'success', 'message' => $ajax_data);
			}
			
		} else {
			echo "No direct script access allowed";
		}

		echo json_encode($data);
	}

	public function fetch()
	{
		if ($this->input->is_ajax_request()) {
			$posts = $this->Crud->read("crud");
			echo json_encode($posts);
		}
	}

	public function delete()
	{
		if ($this->input->is_ajax_request()) {
			$del_id = $this->input->post("del_id");
			if($this->Crud->delete('id', $del_id, 'crud') > 0) {
				$data = array('response' => 'success');
			} else {
				$data = array('response' => 'danger');
			}
			echo json_encode($data);
		}
	}

	public function edit()
	{
		if ($this->input->is_ajax_request()) {
			$edit_id = $this->input->post("edit_id");
			if($post = $this->Crud->read_single('id', $edit_id, 'crud')) {
				$data = array('response' => 'success', 'post_id' => $this->Crud->read_field('id', $edit_id, 'crud', 'id'), 'post_name' => $this->Crud->read_field('id', $edit_id, 'crud', 'name'), 'post_email' => $this->Crud->read_field('id', $edit_id, 'crud', 'email'));
			} else {
				$data = array('response' => 'danger');
			}
			echo json_encode($data);
		}
	}

	public function update()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('edit_name', 'Name', 'required');
			$this->form_validation->set_rules('edit_email', 'Email', 'required|valid_email');
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => 'danger', 'message' => validation_errors());
			} else {
				$edit_id = $this->input->post("edit_id");
				$upd_data['id'] = $edit_id;
				$upd_data['name'] = $this->input->post("edit_name");
				$upd_data['email'] = $this->input->post("edit_email");
				$upd_rec = $this->Crud->update('id', $edit_id, 'crud', $upd_data);
				if ($upd_rec > 0) {
					$data = array('response' => 'success', 'message' => "Updated");
				} else {
					# code...
				}
			}
			
		} else {
			echo "No direct script access allowed";
		}

		echo json_encode($data);
	}
}
