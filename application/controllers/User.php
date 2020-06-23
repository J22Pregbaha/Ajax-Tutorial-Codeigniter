<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		//Check login
		if (!$this->session->userdata('chat')) {
			redirect('welcome');
		}else {
			$log_user_id = $this->session->userdata('chat');
		}
		$user_id = $log_user_id;
		$table = "users";
		$data['other_users'] = $this->Crud->read("users");
		$data['user_id'] = $user_id;
		$data['title'] = "Chat";
		$data['username'] = $this->Crud->read_field('id', $user_id, $table, 'username');
		$this->load->view('home', $data);
	}

	public function send_message()
	{
		//Check login
		if (!$this->session->userdata('chat')) {
			redirect('welcome');
		}else {
			$log_user_id = $this->session->userdata('chat');
		}

		if ($this->input->is_ajax_request()) {
			$table = 'chat';
			$post = $this->input->post();
			$messageTxt='NULL';
			$attachment_name='';
			$file_ext='';
			$mime_type='';

			if(isset($post['type'])=='Attachment'){ 
			 	$AttachmentData = $this->ChatAttachmentUpload();
				//print_r($AttachmentData);
				$attachment_name = $AttachmentData['file_name'];
				$file_ext = $AttachmentData['file_ext'];
				$mime_type = $AttachmentData['file_type']; 
			}else{
				$messageTxt = reduce_multiples($post['messageTxt'],' ');
			}

			$ins_data=[
				'sender_id' => $log_user_id,
				'receiver_id' => $post['receiver_id'],
				'message' =>   $messageTxt,
				'attachment_name' => $attachment_name,
				'file_ext' => $file_ext,
				'mime_type' => $mime_type,
				'message_date_time' => date('Y-m-d H:i:s'), //23 Jan 2:05 pm
				'ip_address' => $this->input->ip_address(),
			];
			$ins_rec = $this->Crud->create($table, $ins_data);
			if($ins_rec > 0) {
				// $this->chat_component($post['receiver_id']);
				$data = ['status' => 1 ,'message' => '' ];
			} else {
				$data = ['status' => 0 ,'message' => 'sorry we re having some technical problems. please try again !'];
			}	
		} else {
			echo "No direct script access allowed";
		}

		echo json_encode($data);
	}

	public function ChatAttachmentUpload(){
		$file_data = '';

		if (isset($_FILES['attachmentfile']['name']) && !empty($_FILES['attachmentfile']['name'])) {
			$config['upload_path'] = "./assets/attachments";
			$config['allowed_types'] = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			// unset($config);
			if (!$this->upload->do_upload('attachmentfile')) {
				echo json_encode(['status' => 0,
					'message' => '<span style="color:#900;">'.$this->upload->display_errors(). '<span>',
					'path' => $config['upload_path'] ]); 
				die;
			} else {
				$file_data = $this->upload->data();
				//$filePath = $file_data['file_name'];
				return $file_data;
			}
			
		}
	}

	/*public function chat_component($receiver_id)
	{
		//Check login
		if (!$this->session->userdata('chat')) {
			redirect('welcome');
		}else {
			$log_user_id = $this->session->userdata('chat');
		}

		$last_chat_id = $this->Crud->read_last_message_id($log_user_id, $receiver_id, 'chat');
		$this->session->set_userdata('last_chat_message_id', $last_chat_id);
	}*/

	public function get_messages() {
		//Check login
		if (!$this->session->userdata('chat')) {
			redirect('welcome');
		}else {
			$log_user_id = $this->session->userdata('chat');
		}

		$receiver_id = $this->input->get('receiver_id');
		//$last_chat_id = $this->session->userdata('last_chat_message_id');

		$table = 'chat';

		if ($this->input->is_ajax_request()) {
			$history = $this->Crud->read_for_instant_message('sender_id', $log_user_id, 'receiver_id', $receiver_id, $table);

			if ($history > 0) 

			foreach ($history as $chat): 
				$message = $chat->id;
				$sender_id = $chat->sender_id;
				$username = $this->Crud->read_field('id', $receiver_id, $table, 'username');
				$message = $chat->message;
				$messagedatetime = date('d M H:i A',strtotime($chat->message_date_time));
			?>

			<?php 
				$messageBody='';

				if ($message == 'NULL') {//fetach media objects like images,pdf,documents etc
					$classBtn = 'right';
					if ($log_user_id == $sender_id) {
						$classBtn = 'left';
					}
					$attachment_name = $chat->attachment_name;
					$file_ext = $chat->file_ext;
					$mime_type = explode('/',$chat->mime_type);

					$document_url = base_url('assets/attachments/'.$attachment_name);

					if ($mime_type[0]=='image') {
						$messageBody.='<img src="'.$document_url.'" onClick="ViewAttachmentImage('."'".$document_url."'".','."'".$attachment_name."'".');" class="attachmentImgCls">';
					} else {
						$messageBody='';
							$messageBody.='<div class="attachment">';
								$messageBody.='<h4>Attachments:</h4>';
								$messageBody.='<p class="filename">';
									$messageBody.= $attachment_name;
								$messageBody.='</p>';

								$messageBody.='<div class="pull-'.$classBtn.'">';
									$messageBody.='<a download href="'.$document_url.'"><button type="button" id="'.$message_id.'" class="btn btn-primary btn-sm btn-flat btnFileOpen">Open</button></a>';
								$messageBody.='</div>';
							$messageBody.='</div>';
					}
					
				} else {
					$messageBody = $message;
				}
				
			?>

			<?php if($log_user_id!=$sender_id){ ?>
				<!-- Message. Default to the left -->
				<div class="direct-chat-msg">
					<div class="direct-chat-info clearfix">
						<span class="direct-chat-name pull-left"><?=$username;?></span>
						<span class="direct-chat-timestamp pull-right"><?=$messagedatetime;?></span>
					</div>
					<div class="direct-chat-text">
						<?=$messageBody;?>
					</div>
				</div>
			<?php }else{?>
				<!-- Message. Default to the right -->
				<div class="direct-chat-msg right">
					<div class="direct-chat-info clearfix">
						<span class="direct-chat-name pull-right"><?=$username;?></span>
						<span class="direct-chat-timestamp pull-left"><?=$messagedatetime;?></span>
					</div>
					<div class="direct-chat-text">
						<?=$messageBody;?>
					</div>
				</div>
			<?php }?>

			<?php
			endforeach;

			//Check if the last message has changed
			/*$last_message_id = $this->Crud->read_last_message_id($log_user_id, $receiver_id, 'chat');
			if ($last_message_id != $this->session->userdata('last_chat_message_id')) {
				$data = ['status' => 1 ,'message' => 'New message'];
				$this->session->set_userdata('last_chat_message_id', $last_message_id);
			} else {
				$data = ['status' => 0 ,'message' => 'No new message', 'id' => $this->session->userdata('last_chat_message_id')];
			}*/
		} else {
			echo "No direct script access allowed";
		}
	}
}