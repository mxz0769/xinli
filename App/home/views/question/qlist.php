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
				<span class="search-btn"></span>
				<input type="text" placeholder="搜索标题/内容等关键字" class="search-key" value="<?php echo $search;?>">
			</div>
			<div class="header">
				<img src="<?php echo base_url();?>assets/imgs/erha.jpg" >
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
				<?php foreach ($cate as $c):?>
				<div><label for="cate_<?php echo $c['cid'];?>"><input type="radio" name="cate" id="cate_<?php echo $c['cid'];?>" value="<?php echo $c['cid'];?>"><span><?php echo $c['catename'];?></span></label></div>
				<?php endforeach;?>

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

	$(".search-btn").on("click",function(){
		var key = $(".search-key").val();
		window.location.href = "<?php echo site_url('question/qlist/')?>"+key;
	})

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
