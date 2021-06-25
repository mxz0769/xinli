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
		<div class="ques-section">
			<div class="title"><?php echo $question['title'];?></div>
			<div class="date"><?php echo date("Y-m-d",$question['addtime']);?></div>
			<div class="question">
				<?php echo $question['description'];?>
			</div>
		</div>
		<div class="answer-section">
			<div class="answer-tab">全部回答</div>
			<?php foreach ($answer as $a):?>
			<div class="answer-item">
				<div class="answer-user">
					<div class="user-header"><img src="<?php echo base_url();?>assets/imgs/erha.jpg" alt=""></div>
					<div class="user-name"><?php echo $a['nickname'];?></div>
					<div class="answer-date"><?php echo date("Y-m-d",$a['answertime']);?></div>
				</div>
				<div class="answer-content">
					<?php echo $a['content'];?>
				</div>
			</div>
			<?php endforeach;?>

		</div>
		<div class="answer-bar">
			<div class="set-btn"><a href="<?php echo site_url('question/set');?>">提问</a></div>
<!--			<div class="wa-btn">我要回答</div>-->
		</div>
	</div>
</body>
</html>
