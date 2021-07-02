<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="formsign">

		<form action="<?php echo site_url('login/check');?>" method="post">
			<h3>Please sign in</h3>
			<div class="form-group row">
				<label for="" class="col-sm-3">Username</label>
				<div class="col-sm-9">
				<input type="username" class="form-control" name="username">
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-sm-3">Password</label>
				<div class="col-sm-9">
				<input type="password" class="form-control" name="password">
				</div>
			</div>
			<div class="form-group ">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Remember</label>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Sign in</button>
		</form>
	</div>
</body>
</html>
