<html>
<head>
	<title>Star Rating in Codeigniter using Ajax jQuery</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container box">
		<a href="<?php echo base_url(); ?>">Back to directory</a>
		<h3 align="center">Star Rating in Codeigniter using Ajax jQuery</h3>
		<br />
		<span id="business_list"></span>
	</div>
</body>
</html>

<script>
	$(document).ready(function(){

		load_data();

		function load_data()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>rating/fetch",
				method:"POST",
				success:function(data)
				{
					$('#business_list').html(data);
				}
			})
		}

		$(document).on('mouseenter', '.rating', function(){
			var index = $(this).data('index');
			var business_id = $(this).data('business_id');
			remove_background(business_id);
			for(var count = 1; count <= index; count++)
			{
				$('#'+business_id+'-'+count).css('color', '#ffcc00');
			}
		});

		function remove_background(business_id)
		{
			for(var count = 1; count <= 5; count++)
			{
				$('#'+business_id+'-'+count).css('color', '#ccc');
			}
		}

		$(document).on('click', '.rating', function(){
			var index = $(this).data('index');
			var business_id = $(this).data('business_id');
			$.ajax({
				url:"<?php echo base_url(); ?>rating/insert",
				method:"POST",
				data:{index:index, business_id:business_id},
				success:function(data)
				{
					load_data();
					alert("You have rate "+index +" out of 5");
				}
			})
		});

		$(document).on('mouseleave', '.rating', function(){
			var index = $(this).data('index');
			var business_id = $(this).data('business_id');
			var rating = $(this).data('rating');
			remove_background(business_id);
			for(var count = 1; count <= rating; count++)
			{
				$('#'+business_id+'-'+count).css('color', '#ffcc00');
			}
		});

	});
</script>