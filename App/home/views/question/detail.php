<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="device-width,initial-scale=1,max-scale=1">
	<title>Title</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
	<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="ques-section">
			<div class="title"><?php echo $question['title'];?></div>
			<div class="date"><?php echo date("Y-m-d",$question['addtime']);?></div>
			<div class="question">
				<?php echo $question['description'];?>
			</div>
		</div>
		<div class="answer-section">
			<div class="answer-tab">全部回答</div>

			<div class="answer-item">
				<div class="answer-user">
					<div class="user-header"><img src="<?php echo base_url();?>assets/imgs/erha.jpg" alt=""></div>
					<div class="user-name"><?php echo $answer['nickname'];?></div>
					<div class="answer-date"><?php echo date("Y-m-d",$answer['answertime']);?></div>
					<input type="hidden" value="<?php echo $answer['aid'];?>" class="answer_id">
				</div>
				<div class="answer-content">
					<?php echo $answer['content'];?>
				</div>
				<?php if($comments):?>
				<div class="answer-pl">
					<?php foreach ($comments as $c):?>
					<div class="pl-item" data="<?php echo $c['user_id'];?>">
						<?php if ($c['parent_id'] != 0):?>
							<span class="pl-name pl-user"><?php echo $c['cm_name']?></span> 回复 <span class="pl-name"><?php echo $c['parent_name']?></span>：
						<?php else:?>
							<span class="pl-name pl-user"><?php echo $c['cm_name']?></span>：
						<?php endif;?>
						<span class="pl-detail"><?php echo $c['comment'];?></span>
					</div>
					<?php endforeach;?>
				</div>
				<?php endif;?>
				<div class="answer-footer">
					<ul>
						<li class="pl-btn">评论</li>
						<li>赞同</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="answer-bar">
			<div class="set-btn"><a href="<?php echo site_url('question/set');?>">提问</a></div>
<!--			<div class="wa-btn">我要回答</div>-->
		</div>
	</div>
	<div class="pl-page">
		<div class="pl-area">
			<div class="pl-top">
				<ul>
					<li class="close-btn"></li>
					<li>评论</li>
					<li><button type="submit" class="sub-btn">提交</button></li>
				</ul>
			</div>
			<textarea placeholder="请输入你的评论内容" class="pl-content"></textarea>
		</div>
	</div>
</body>
</html>
<script>


	function comment(){
		this.answer_id = $(".answer_id").val();
		this.parent_id = 0;
		var _this = this;
		this.init = function (){
			this.changeParentId();
			this.commentAnswer();
			this.submition();
		}
		this.changeParentId = function (){
			$(".pl-item").on("click",function (){
				_this.parent_id = $(this).attr("data");
				// console.log(_this.parent_id);
				var pluser = $(this).find(".pl-user").text();
				showComment("回复"+pluser);
				_this.closeComment();
			})
		}
		this.commentAnswer = function (){
			$(".pl-btn").on("click",function (){
				_this.parent_id = 0;
				showComment()
				_this.closeComment();
			})
		}
		function showComment(str='请输入你的评论内容'){
			$("body").addClass('hidden');
			$(".pl-page").show();
			$(".pl-area").addClass('active');
			$(".pl-content").attr("placeholder",str);
		}
		function hideComment(){
			$("body").removeClass('hidden');
			$(".pl-page").hide();
			$(".pl-content").val("");
		}

		this.closeComment = function (){
			$(".close-btn").on("click",function (){
				hideComment();
			})
		}

		this.submition = function (){
			$(".sub-btn").on("click",function (){
				var comment = $(".pl-content").val();
				var parent_id = _this.parent_id;
				// console.log(parent_id);return;
				var answer_id = _this.answer_id;
				var params = {comment:comment,parent_id:parent_id,answer_id:answer_id};
				$.ajax({
					url:"<?php echo site_url('question/comment')?>",
					method:'post',
					data:params,
					dataType:'json',
					success:function (data){
						$(".answer-pl").append(data);
						hideComment();
					}
				})
			})
		}
	}

	var com = new comment();
	com.init();
</script>
