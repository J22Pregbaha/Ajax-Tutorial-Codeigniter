<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['title'] = "Chat";
		$this->load->view('welcome_message', $data);
	}

	public function login()
	{
		if(!empty($this->session->userdata('chat'))) {
			redirect(base_url('user'), 'refresh');
		}

		$table = 'users';
		if($_POST) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if(!$username || !$password) {
				echo $this->Crud->msg('danger', 'All Fields Are Required' );
			} else {
				$user = $this->Crud->read2('username', $username, 'password', md5($password), $table);
				if(empty($user)) {
					echo $this->Crud->msg('danger',  'Inorrect login details' );
				} else {
					$user_id = $this->Crud->read_field('username', $username, $table, 'id');
					$up_data['last_log'] = date(fdate);
					$up_data['status'] = 1;
					$this->Crud->update('id', $user_id, $table, $up_data);

					// save user_id in session
					$this->session->set_userdata('chat', $user_id);

					echo $this->Crud->msg('success', 'Login Successful');

					// redirect
					echo '<script>window.location.replace("'.base_url('user').'");</script>';
				}
			}

			die;
		}
		$this->load->view("welcome_message");
	}

	public function logout()
	{
		if(!empty($this->session->userdata('chat'))) {
			$user_id = $this->session->userdata('chat');
			$up_data['status'] = 0;
			if($this->Crud->update('id', $user_id, 'users', $up_data) > 0) {
				$this->session->set_userdata('chat', '');
				$this->session->sess_destroy();
				$this->Crud->msg('success', 'Sign Out Successful');
				echo '<script>window.location.replace("'.base_url().'");</script>';
			}
		}
	}
}
