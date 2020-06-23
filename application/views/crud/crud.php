<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">
				<a href="<?php echo base_url(); ?>">Back to directory</a>
				<h1 class="text-center">Codeigniter Ajax crud tutorial</h1>
				<hr style="background-color: black; color: black; height: 1px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 mt-2">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
				  Add records
				</button>

				<!-- Insert Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" id="closeInsertModal" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">×</span>
						</button>
					  </div>
					  <div class="modal-body">
					  	<!-- <div id="bb_ajax_msg"></div> -->
					  	<form method="post" action="" id="form">
					  		<div class="form-group">
					  			<label>Name</label>
					  			<input type="text" id="name" name="name" class="form-control">
					  		</div>
					  		<div class="form-group">
					  			<label>Email</label>
					  			<input type="email" id="email" name="email" class="form-control">
					  		</div>
					  	</form>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="add">Add</button>
					  </div>
					</div>
				  </div>
				</div>


				<!-- Edit Modal -->
				<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Modal</h5>
						<button type="button" id="closeEditModal" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">×</span>
						</button>
					  </div>
					  <div class="modal-body">
					  	<!-- <div id="bb_ajax_msg"></div> -->
					  	<form method="post" action="" id="edit_form">
					  		<input type="hidden" id="edit_modal_id" value="">
					  		<div class="form-group">
					  			<label>Name</label>
					  			<input type="text" id="edit_name" name="edit_name" class="form-control">
					  		</div>
					  		<div class="form-group">
					  			<label>Email</label>
					  			<input type="email" id="edit_email" name="edit_email" class="form-control">
					  		</div>
					  	</form>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="update">Update</button>
					  </div>
					</div>
				  </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 mt-3">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="tbody"></tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script type="text/javascript">
		$(document).on("click", "#add", function(e) {
			e.preventDefault();

			// alert("test");
			var name = $("#name").val();
			var email = $("#email").val();
			if (name == "" || email == "") {
				alert("Both fields are required");
			} else {
				$.ajax({
					url: '<?php echo base_url('ajax_tut/insert'); ?>',
					type: 'post',
					dataType: 'json',
					data: {
						name: name,
						email: email
					},
					success: function(data) {
						fetch();
						// $('#closeInsertModal').click();

						if (data.response == "success"){
							toastr["success"](data.message);

							toastr.options = {
							  "closeButton": true,
							  "debug": false,
							  "newestOnTop": false,
							  "progressBar": true,
							  "positionClass": "toast-top-right",
							  "preventDuplicates": false,
							  "onclick": null,
							  "showDuration": "300",
							  "hideDuration": "1000",
							  "timeOut": "5000",
							  "extendedTimeOut": "1000",
							  "showEasing": "swing",
							  "hideEasing": "linear",
							  "showMethod": "fadeIn",
							  "hideMethod": "fadeOut"
							}
						} else{
							toastr["error"](data.message);

							toastr.options = {
							  "closeButton": true,
							  "debug": false,
							  "newestOnTop": false,
							  "progressBar": true,
							  "positionClass": "toast-top-right",
							  "preventDuplicates": false,
							  "onclick": null,
							  "showDuration": "300",
							  "hideDuration": "1000",
							  "timeOut": "5000",
							  "extendedTimeOut": "1000",
							  "showEasing": "swing",
							  "hideEasing": "linear",
							  "showMethod": "fadeIn",
							  "hideMethod": "fadeOut"
							}
						}
						
					}
				});
			}

			$('#form')[0].reset();
		});

		function fetch() {
			$.ajax({
				url: '<?php echo base_url('ajax_tut/fetch'); ?>',
				type: 'post',
				dataType: 'json',
				success: function(data) {
					//console.log(data);

					var tbody = "";
					for (var key in data) {
						tbody += "<tr>";
						tbody += "<td>" + data[key]['id'] + "</td>";
						tbody += "<td>" + data[key]['name'] + "</td>";
						tbody += "<td>" + data[key]['email'] + "</td>";
						tbody += `<td>
										<a href="#" id="del" class="btn btn-sm btn-outline-danger" value="${data[key]['id']}"><i class="fa fa-trash"></i></a>
										<a href="#" id="edit" class="btn btn-sm btn-outline-success" value="${data[key]['id']}"><i class="fa fa-edit"></i></a>	
									</td>`;
						tbody += "</tr>";
					}
					$("#tbody").html(tbody);
				}
			});
		}
		fetch();

		$(document).on("click", "#del", function(e) {
			e.preventDefault();

			var del_id = $(this).attr("value");

			if (del_id == "") {
				alert("Delete id required");
			} else {
				const swalWithBootstrapButtons = Swal.mixin({
				  customClass: {
				    confirmButton: 'btn btn-success',
				    cancelButton: 'btn btn-danger mr-2'
				  },
				  buttonsStyling: false
				})

				swalWithBootstrapButtons.fire({
				  title: 'Are you sure?',
				  text: "You won't be able to revert this!",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonText: 'Yes, delete it!',
				  cancelButtonText: 'No, cancel!',
				  reverseButtons: true
				}).then((result) => {
				  if (result.value) {
				  	$.ajax({
				  		url: '<?php echo base_url('ajax_tut/delete'); ?>',
				  		type:"post",
				  		dataType: "json",
				  		data: {
				  			del_id: del_id,
				  		},
				  		success: function(data) {
				  			fetch();
				  		}
				  	});


				    swalWithBootstrapButtons.fire(
				      'Deleted!',
				      'Your file has been deleted.',
				      'success'
				    )
				  } else if (
				    /* Read more about handling dismissals below */
				    result.dismiss === Swal.DismissReason.cancel
				  ) {
				    swalWithBootstrapButtons.fire(
				      'Cancelled',
				      'Your imaginary file is safe :)',
				      'error'
				    )
				  }
				})
			}
		});

		$(document).on("click", "#edit", function(e) {
			e.preventDefault();

			var edit_id = $(this).attr("value");

			if (edit_id == "") {
				alert("Edit id requried");
			} else {
				$.ajax({
					url: '<?php echo base_url('ajax_tut/edit'); ?>',
					type:"post",
					dataType: "json",
					data: {
						edit_id: edit_id,
					},
					success: function(data) {
						if (data.response == "success") {
							$("#openEditModal").click();
							$("#edit_modal_id").val(data.post_id);
							$("#edit_name").val(data.post_name);
							$("#edit_email").val(data.post_email);
						} else {}
					}
				});
			}
		});

		$(document).on("click", "#update", function(e) {
			e.preventDefault();

			var edit_id = $("#edit_modal_id").val();
			var edit_name = $("#edit_name").val();
			var edit_email = $("#edit_email").val();

			if (edit_id == "" || edit_name == "" || edit_email == "") {
				alert("Both fields are required");
			} else {
				$.ajax({
					url: '<?php echo base_url('ajax_tut/update'); ?>',
					type:"post",
					dataType: "json",
					data: {
						edit_id: edit_id,
						edit_name: edit_name,
						edit_email: edit_email
					},
					success: function(data) {
						fetch();
						$('#closeEditModal').click();
						if (data.response == "success") {
							
							toastr["success"](data.message);

							toastr.options = {
							  "closeButton": true,
							  "debug": false,
							  "newestOnTop": false,
							  "progressBar": true,
							  "positionClass": "toast-top-right",
							  "preventDuplicates": false,
							  "onclick": null,
							  "showDuration": "300",
							  "hideDuration": "1000",
							  "timeOut": "5000",
							  "extendedTimeOut": "1000",
							  "showEasing": "swing",
							  "hideEasing": "linear",
							  "showMethod": "fadeIn",
							  "hideMethod": "fadeOut"
							}
						} else {}
					}
				});
			}
		});
	</script>
</body>
</html>