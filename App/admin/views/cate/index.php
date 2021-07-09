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
	<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
		<table class="table table-striped table-sm">
			<thead>
				<tr>
					<th>Num</th>
					<th>类名</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($cates as $k => $cate):?>
				<tr>
					<td><?php echo ($k+1);?></td>
					<td><?php echo $cate['catename'];?></td>
					<td><a style="color: red;cursor: pointer" _cate="<?php echo $cate['cid'];?>" class="del-cate">删除</a></td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
		<a class="btn btn-primary btn-sm" href="<?php echo site_url('cate/add');?>">添加分类</a>
	</div>
</body>
</html>
<script>
	$(".del-cate").on("click",function (){
		var cate = $(this).attr("_cate");
		var _this = $(this);
		if(confirm('你确定删除吗？')){
			$.get("<?php echo site_url('cate/delcate')?>",{cate:cate},function(data){
				var data = JSON.parse(data);
				if(data.status==1){
					_this.parents('tr').remove();
				}
			})
		}

	})
</script>
