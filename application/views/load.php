<html>  
<head>  
	<title>Load data with Ajax</title>  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>  
<body>  
	<div class="container">  
		<br />  
		<br />  
		<br />  
		<div class="table-responsive">  
			<a href="<?php echo base_url(); ?>">Back to directory</a>
			<h2 align="center">Load More Data using Ajax Jquery</h2><br />  
			<table class="table table-bordered" id="load_data_table">  
				<?php foreach ($video as $row): ?>
					<tr>  
						<td><?php echo $row->video_title; ?></td>  
					</tr> 
				<?php $video_id = $row->id; 
				endforeach ?>
				<tr id="remove_row">  
					<td><button type="button" name="btn_more" data-vid="<?php echo $video_id; ?>" id="btn_more" class="btn btn-success form-control">more</button></td>  
				</tr>  
			</table>  
		</div>  
	</div>  
</body>  
</html>  
<script>  
	$(document).ready(function(){  
		$(document).on('click', '#btn_more', function(){  
			var last_video_id = $(this).data("vid");  
			// $('#btn_more').html("Loading...");  
			$.ajax({  
				url:"<?php echo base_url(); ?>load/load_more",  
				method:"POST",  
				data:{last_video_id:last_video_id},  
				dataType:"text",
				beforeSend:function()
				{
					$('#btn_more').html("Loading...");
				},  
				success:function(data)  
				{  
					if(data != '')  
					{  
						$('#remove_row').remove();  
						$('#load_data_table').append(data);  
					}  
					else  
					{  
						$('#btn_more').html("No more Data");  
					}  
				}  
			});  
		});  
	});  
</script>