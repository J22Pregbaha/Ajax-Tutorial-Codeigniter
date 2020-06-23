<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?=base_url('public')?>/components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url('public')?>/components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?=base_url('public')?>/components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url('public')?>/dist/css/AdminLTE.min.css">

	<style>
		.fileDiv {
			position: relative;
			overflow: hidden;
		}
		.upload_attachmentfile {
			position: absolute;
			opacity: 0;
			right: 0;
			top: 0;
		}
		.btnFileOpen {margin-top: -50px; }

		.direct-chat-warning .right>.direct-chat-text {
			background: #d2d6de;
			border-color: #d2d6de;
			color: #444;
			text-align: right;
		}
		.direct-chat-primary .right>.direct-chat-text {
			background: #3c8dbc;
			border-color: #3c8dbc;
			color: #fff;
			text-align: right;
		}
		.spiner{}
		.spiner .fa-spin { font-size:24px;}
		.attachmentImgCls{ width:450px; margin-left: -25px; cursor:pointer; }
	</style>
<body>
	<a href="<?php echo base_url() ?>welcome/logout">logout</a>
	<?php echo $username; ?>
	<ul>
		<?php foreach ($other_users as $user): ?>
			<?php if (!($user->id == $user_id)): ?>
				<li class="selectUser" id="<?php echo $user->id; ?>" title="<?php echo $user->username; ?>"><?php echo $user->username; ?> <a href="#">chat</a></li>
			<?php endif ?>
		<?php endforeach ?>
	</ul>

	<div id="chatSection">
		<div class="box box-warning direct-chat direct-chat-primary">
			<div class="box-header with-border">
				<h3 class="box-title" id="ReciverName_txt">Title</h3>
				<div class="box-tools pull-right">
					<span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>
				</div>
			</div>


			<div class="box-body">
				<div class="direct-chat-messages" id="content">
					<div id="dumppy"></div>
				</div>
			</div>

			<div class="box-footer">
				<input type="hidden" id="Sender_Name" value="<?php echo $this->Crud->read_field('id', $user_id, 'users', 'username'); ?>">

				<div class="input-group">
					<input type="hidden" id="ReciverId_txt">
					<input type="text" name="message" placeholder="Type Message ..." class="form-control message">
					<span class="input-group-btn">
						<button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">Send</button>
						<div class="fileDiv btn btn-info btn-flat"> <i class="fa fa-upload"></i> 
						<input type="file" name="file" class="upload_attachmentfile"/></div>
					</span>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModalImg">
	    <div class="modal-dialog modal-lg">
	      <div class="modal-content">
	      
	        <!-- Modal Header -->
	        <div class="modal-header">
	          <h4 class="modal-title" id="modelTitle">Modal Heading</h4>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
	        
	        <!-- Modal body -->
	        <div class="modal-body">
	          <img id="modalImgs" src="" class="img-thumbnail" alt="Cinque Terre">
	        </div>
	        
	        <!-- Modal footer -->
	         
	        
	      </div>
	    </div>
	</div>
	<!-- Modal -->

	<!-- jQuery 3 -->
	<script src="<?=base_url('public')?>/components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?=base_url('public')?>/components/bootstrap/dist/js/bootstrap.min.js"></script>
	 <?php if($this->uri->segment(1) != 'user'){?>
	<script src="<?=base_url('public')?>/components/PACE/pace.min.js"></script>
	 <?php }?>
	<!-- SlimScroll -->
	<script src="<?=base_url('public')?>/components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

	<script type="text/javascript">
		$('.message').keypress(function(event){
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
			   sendTxtMessage($(this).val());
			}
		});

		$('.btnSend').click(function(){
			sendTxtMessage($('.message').val());
		});

		$('.selectUser').click(function() {
			ChatSection(1);
			var receiver_id = $(this).attr('id');
			//alert(receiver_id);
			$('#ReciverId_txt').val(receiver_id);
			$('#ReciverName_txt').html($(this).attr('title'));
			
			GetChatHistory(receiver_id);
			ScrollDown();
		});

		$('.upload_attachmentfile').change(function() {
			DisplayMessage('<div class="spiner"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
			ScrollDown();

			var file_data = $('.upload_attachmentfile').prop('files')[0];
			var receiver_id = $('#ReciverId_txt').val();
			var form_data =  new FormData();
			form_data.append('attachmentfile', file_data);
			form_data.append('type', 'Attachment');
			form_data.append('receiver_id', receiver_id);

			$.ajax({
				url: '<?php echo base_url('user/send_message'); ?>',
				datatype: 'json',
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function(response) {
					$('.upload_attachmentfile').val('');
					GetChatHistory(receiver_id);
				},

				error: function (jqXHR, status, err) {
					// alert('Local error callback');
				}
			});
		});

		//end of jquery

		function ViewAttachmentImage(image_url, imageTitle) {
			$('#modelTitle').html(imageTitle);
			$('#modalImgs').attr('src', image_url);
			$('#myModalImg').modal('show');
		}

		function ChatSection(status){
			//chatSection
			if(status==0){
				$('#chatSection :input').attr('disabled', true);
			} else {
				$('#chatSection :input').removeAttr('disabled');
			}   
		}
		ChatSection(0);

		function ScrollDown() {
			var element = document.getElementById('content');
			var h = element.scrollHeight;
			$('#content').animate({scrollTop: h}, 1000);
		}
		window.onload = ScrollDown();

		function DisplayMessage(message) {
			var Sender_Name = $('#Sender_Name').val();

			var str = '<div class="direct-chat-msg right">';
				str+='<div class="direct-chat-info clearfix">';
				str+='<span class="direct-chat-name pull-right">'+Sender_Name ;
				str+='</span><span class="direct-chat-timestamp pull-left"></span>'; //23 Jan 2:05 pm
				str+='</div>';
				str+='<div class="direct-chat-text">'+message;
				str+='</div></div>';
			$('#dumppy').append(str);
		}

		function sendTxtMessage(message) {
			var messageTxt = message.trim();
			if (messageTxt!='') {
				DisplayMessage(messageTxt);

				var receiver_id = $('#ReciverId_txt').val();
				$.ajax({
					url: '<?php echo base_url('user/send_message'); ?>',
					datatype: 'json',
					type: 'post',
					data: {
						messageTxt : messageTxt,
						receiver_id : receiver_id,
					},
					success: function(data) {
						GetChatHistory(receiver_id);
					},
					error: function(jqXHR, status, err) {
						// alert('Local error callback');
					}
				});

				ScrollDown();
				$('.message').val('');
				$('.message').focus();
			} else {
				$('.message').focus();
			}
		}

		function GetChatHistory(receiver_id) {
			$.ajax({
				url: '<?php echo base_url('user/get_messages?receiver_id='); ?>'+receiver_id,
				success: function(data) {
					$("#dumppy").html(data);
					$('#content').scrollTop($('#content')[0].scrollHeight);
					//$("#content").attr({ scrollTop: $("#content").attr("scrollHeight") });
				},
				error: function(jqXHR, status, err) {
					// alert('Local error callback');
				}
			});
		}


		setInterval(function(){ 
			var receiver_id = $('#ReciverId_txt').val();
			if(receiver_id!=''){GetChatHistory(receiver_id);}
		}, 2500);
	</script>
</body>
</html>
