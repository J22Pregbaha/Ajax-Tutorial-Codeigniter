<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo.png">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>home/css/styles-merged.css">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>home/css/style.min.css">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>home/css/custom.css">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div id="bb_ajax_msg"></div>
				<div class="login-panel panel panel-default" style="margin-top: 10%;">
					<div class="panel-heading">
						<h1 align="center">Login</h1>
					</div>
					<div class="panel-body">
						<form action="<?php echo base_url() ?>welcome/login" method="post" class="form-horizontal" id="bb_ajax_form">
							<div class="form-group">
								<div class="col-md-12">
									<input class="form-control" type="text" name="username" placeholder="Enter Username" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="input-group">
										<input class="form-control" type="password" id="password" name="password" value="<?php echo set_value('password') ?>" placeholder="Enter Password" required>
										<div class="input-group-addon" style="background-color: white;">
										  <a class="text-primary" onclick="showHide()" id="eye"><i class="fa fa-eye"></i></a>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-block">Login</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url(); ?>assets/js/jsform.js"></script>
	<div style="text-align:center;">
  		<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Chat</p>
	</div>
<script src="<?php echo base_url(); ?>assets/plugin/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugin/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url(); ?>assets/js/init.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jsform.js"></script>
</body>
</html>

<script type="text/javascript">
  function show() {
    var p = document.getElementById('password');
    p.setAttribute('type', 'text');
  }

  function hide() {
    var p = document.getElementById('password');
    p.setAttribute('type', 'password');
  }

  var pwShown = 0;

  document.getElementById("eye").addEventListener("click", function () {
    if (pwShown == 0) {
      pwShown = 1;
      show();
    } else {
      pwShown = 0;
      hide();
    }
  }, false);
</script>