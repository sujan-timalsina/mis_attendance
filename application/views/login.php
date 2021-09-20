<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login | MIS</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<style type="text/css">
		/* Style the video: 100% width and height to cover the entire window */
		#myVideo {
			position: fixed;
			right: 0;
			bottom: 0;
			min-width: 100%;
			min-height: 100%;
		}

		.login_container {
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
			padding: 10px;
			background-color: rgba(0, 0, 0, 0.7);
			width: 350px;
			width: 500px;
			box-shadow: 0px 0px 10px 10px #414a4c;
			border-radius: 10px;
		}
	</style>
</head>

<body>
	<!-- The video -->
	<video autoplay muted loop id="myVideo">
		<source src="<?php echo base_url(); ?>upload/bubble.mp4" type="video/mp4">
	</video>

	<!-- Optional: some overlay text to describe the video -->

	<div class="card login_container text-white col-12">
		<div class="card-header">
			<h3 class="text-center">Login</h3>
		</div>
		<div class="card-body">
			<form action="<?php echo base_url(); ?>login" method="POST">
				<div class="form-group my-4">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control" value="<?php echo set_value('username'); ?>">
					<small class="text-danger"><?php echo form_error('username'); ?></small>
				</div>
				<div class="form-group my-4">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control">
					<small class="text-danger"><?php echo form_error('password'); ?></small>
				</div>
				<div class="form-group my-4">
					<input type="submit" name="submit" value="Login" class="btn btn-success px-4">
				</div>
			</form>
		</div>
		<div class="card-footer text-danger text-center">
			<?php
			echo $this->session->flashdata("login_error");
			?>
		</div>
	</div>


	<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>