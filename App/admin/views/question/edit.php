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
<nav class="navbar navbar-light navtop">
	<span class="navbar-brand">心理咨询管理系统</span>
</nav>
<div class="container-fluid row">
	<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
		<ul class="nav flex-column pt">
			<li class="nav-item"><a class="nav-link active" href="#">问题列表</a></li>
			<li class="nav-item"><a class="nav-link active" href="#">话题分类</a></li>
			<li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
		</ul>
	</nav>
	<div class="col-md-9 ml-sm-auto col-lg-10 px-md-4 pt">
		<form action="<?php echo site_url('question/editsave');?>" method="post">
			<div class="form-group row">
				<label class="col-sm-1 col-form-label">标题</label>
				<div class="col-sm-11">
					<input type="text" class="form-control" readonly value="<?php echo $question['title'];?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-sm-1">描述</label>
				<div class="col-sm-11">
					<textarea readonly class="form-control" style="resize: none;"><?php echo $question['description'];?></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-sm-1">回答</label>
				<div class="col-sm-11">
					<textarea name="answer" id="" cols="30" rows="10" class="form-control"><?php echo $answer['answer'];?></textarea>
				</div>
			</div>
			<input type="hidden" name="qid" value="<?php echo $question['qid'];?>">
			<button class="btn btn-primary" type="submit">修改</button>
		</form>
	</div>
</div>

</body>
</html>
<script>

</script>
