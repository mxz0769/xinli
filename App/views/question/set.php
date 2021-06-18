<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="device-width,initial-scale=1,max-scale=1">
	<title>Title</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
</head>
<body>
	<div class="container">
<!--		<form action="--><?php //echo site_url('question/save')?><!--" method="post">-->
		<?php echo validation_errors(); ?>
		<?php echo form_open('question/save'); ?>
			<div class="section ques_cate">
				<p class="title">话题分类</p>
				<div class="scroll-tab">
					<div><label for="cate_1"><input type="radio" name="cate" id="cate_1"><span>成长</span></label></div>
					<div><label for="cate_2"><input type="radio" name="cate" id="cate_2"><span>职场</span></label></div>
					<div><label for="cate_3"><input type="radio" name="cate" id="cate_3"><span>人际关系</span></label></div>
					<div><label for="cate_4"><input type="radio" name="cate" id="cate_4"><span>心理知识</span></label></div>
					<div><label for="cate_5"><input type="radio" name="cate" id="cate_5"><span>情绪</label></span></div>
					<div><label for="cate_6"><input type="radio" name="cate" id="cate_6"><span>亲子家庭</label></span></div>
				</div>
			</div>
			<div class="section ques_title">
				<p class="title">问题标题</p>
				<div class="ques">
					<input type="text" placeholder="一句话提出你的问题(10-50字)" name="title">
				</div>
				<div class="ques-tip">
					<p>提问标题示例：</p>
					<ul>
						<li>和别人说话时总是很紧张，如何缓解？</li>
						<li>我无法走出上一段恋情，该怎么办？</li>
						<li>和丈夫天天吵架，夫妻关系还可以改善吗？</li>
					</ul>
				</div>
			</div>
			<div class="section ques_desc">
				<p class="title">问题描述</p>
				<textarea name="description" id="" placeholder="尽可能详细地描述你的问题，关于你的情绪或感受，与之相关的人和事(500字以内)"></textarea>
			</div>
			<div class="ques_sub">
				<div class="selection">
					<label for="state">
						<input type="checkbox" id="state" name="display" value="1">
						匿名<span class="select"></span>

					</label>
				</div>

				<button type="submit">提交</button>

			</div>
		</form>
	</div>
</body>
</html>
