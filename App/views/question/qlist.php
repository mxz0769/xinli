<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="device-width,initial-scale=1,max-scale=1">
	<title>Title</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
	<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/js/swiper/swiper-bundle.min.css">
	<script src="<?php echo base_url();?>assets/js/swiper/swiper-bundle.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="search-bar">
			<div class="search">
				<input type="text" placeholder="搜索标题/内容等关键字">
			</div>
			<div class="header">
				<img src="<?php echo base_url();?>assets/imgs/erha.jpg" alt="">
			</div>
		</div>
		<div class="banner swiper-container">
			<div class="banner-swiper swiper-wrapper">
				<div class="swiper-slide"><img src="<?php echo base_url()?>assets/imgs/banner1.png" alt=""></div>
				<div class="swiper-slide"><img src="<?php echo base_url()?>assets/imgs/banner2.png" alt=""></div>
			</div>
<!--			<div class="swiper-pagination"></div>-->
		</div>
		<div class="article-tag">
			<ul class="select-tag">
				<li>最新</li>
				<li>等你答</li>
			</ul>
			<div class="scroll-tab">
				<div><label for="cate_1"><input type="radio" name="cate" id="cate_1" value="1"><span>成长</span></label></div>
				<div><label for="cate_2"><input type="radio" name="cate" id="cate_2" value="2"><span>职场</span></label></div>
				<div><label for="cate_3"><input type="radio" name="cate" id="cate_3" value="3"><span>人际关系</span></label></div>
				<div><label for="cate_4"><input type="radio" name="cate" id="cate_4" value="4"><span>心理知识</span></label></div>
				<div><label for="cate_5"><input type="radio" name="cate" id="cate_5" value="5"><span>情绪</label></span></div>
				<div><label for="cate_6"><input type="radio" name="cate" id="cate_6" value="6"><span>亲子家庭</label></span></div>
			</div>
		</div>
		<div class="list">
			<?php foreach ($qlist as $list):?>
			<div class="list-item">
				<a href="<?php echo site_url('question/detail/'.$list['qid'])?>">
				<div class="item-title"><?php echo $list['title'];?></div>
				<div class="item-answer">
					<div class="answer-user">
						<div class="user-header"><img src="<?php echo base_url();?>assets/imgs/erha.jpg" alt=""></div>
						<div class="user-name"><?php echo $list['ausername'];?></div>
					</div>
					<div class="answer-content"><?php echo $list['content'];?></div>
				</div>
				</a>
			</div>
			<?php endforeach;?>
<!--			<div class="list-item">-->
<!--				<div class="item-title">test222222222222222哈哈哈哈哈哈哈哈333333333</div>-->
<!--				<div class="item-answer">-->
<!--					<div class="answer-user">-->
<!--						<div class="user-header"><img src="--><?php //echo base_url();?><!--assets/imgs/erha.jpg" alt=""></div>-->
<!--						<div class="user-name">水电费水电费是否</div>-->
<!--					</div>-->
<!--					<div class="answer-content">测试测试222222222水电费水电费221111111111111111111</div>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="list-item">-->
<!--				<div class="item-title">test333333333沙发斯蒂芬</div>-->
<!--				<div class="item-answer">-->
<!--					<div class="answer-user">-->
<!--						<div class="user-header"><img src="--><?php //echo base_url();?><!--assets/imgs/erha.jpg" alt=""></div>-->
<!--						<div class="user-name">哈哈哈哈哈水电费地方1111</div>-->
<!--					</div>-->
<!--					<div class="answer-content">测试测试2222水电费水电费是否222222111111111水电费水电费水电费1111</div>-->
<!--				</div>-->
<!--			</div>-->
		</div>
		<div class="set-ques">
			<a href="<?php echo site_url('question/set')?>">
				<p>+</p>
				<p>提问</p>
			</a>
		</div>
	</div>
</body>
</html>
<script>
	var swiper = new Swiper('.swiper-container',{
		spaceBetween: 20,
		speed:2000,	//滚动过程的时间
		autoplay: {
			delay: 3000,	//过长时间滚动一次
			disableOnInteraction: false, //用户触碰之后是否停止滚动
		},
		// pagination:{
		// 	el:'.swiper-pagination',
		// 	clickable:true
		// }
	});

	function change_cate(){
		this.cate;
		var cateBtn = $("input[name=cate]");
		var _this = this;
		this.init = function(){
			cateBtn.each(function(){
				if($(this).is(":checked")){
					_this.cate = $(this).val();
				}
			})
			_this.cateSelect();
		}

		this.cateSelect = function (){
			cateBtn.on('click',function(){
				var cate = $(this).val();
				if(cate != _this.cate){
					_this.changeList(cate);
					_this.cate = cate;
				}
			})
		}

		this.changeList = function (cate){
			$.ajax({
				type:'get',
				url:"<?php echo site_url('question/changeList')?>",
				data:{cate:cate},
				dataType:'json',
				success:function (data){
					console.log(data);
					// $(".list").empty()
					$(".list").empty().append(data);
				}
			})
		}
	}
	var cc = new change_cate();
	cc.init();

</script>
