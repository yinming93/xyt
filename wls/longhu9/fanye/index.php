<?php
	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>龙湖九墅—邀您共鉴锡城之巅！</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="static/css/mobi.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
    <script src="static/js/jquery-1.8.2.min.js"></script>
    <script src="static/js/wScratchPad.js"></script>
	<meta http-equiv="Cache-Control" content="max-age=0" />
	<meta name="apple-touch-fullscreen" content="yes" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
</head>

<style>
.run-input-share {
position: absolute;
display: block;
left: 10%;
top: 10%;
margin-top: 102px;
margin-left: 3px;
text-indent: -9999px;
width: 300px;
height: 200px;
}
#scratchpad{
position:absolute;
top:0;
z-index:99999;	
}
.ca{
	width:40%;
	height:10px;
	left:30%;
	position:absolute;
	top:60%;
	z-index:1000000;
	}
	
	
	
	
	.formdiv{
			display: blcok;
			width: 80%;
			position: absolute;
			top: 30%;
			left:11%;
			z-index: 2000;
		}	
		
		input.labelauty + label { font: 12px "Microsoft Yahei";}
		
		
		.inputa{ 
			border:2px solid #919191; 
			height:25px; 
			line-height:20px;  
			width:66%; 
			background:#fff;
			-moz-border-radius: 0.2em; 
			-webkit-border-radius:0.2em;  
			border-radius:0.8em;
			padding:1%;color:#000; 			
		}
			
			
		.btn{
			width:45%; 
			border:2px solid #919191; 
			height:30px; 
			line-height:25px;
			background:#fff; 
			-moz-border-radius: 0.2em; 
			-webkit-border-radius:0.2em;  
			border-radius:0.5em; 
			color:#666666; 
			font-size:16px; 
		}
		
		
		.name{ width:100%; margin:0 auto; padding:2% 0; text-align:left; font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#F8EFC9;}
		.tel{ width:100%; margin:0 auto; padding:2% 0; text-align:left; font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#F8EFC9;}
		.add{ width:100%; margin:0 auto; padding:2% 0; text-align:left; font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#F8EFC9;}
		.ck{ width:100%; margin:0 auto; padding:2% 0; text-align:left; font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#F8EFC9;}
		.btnboxb{width:100%;text-align:center;padding:13% 0;}


.zuochu{
-webkit-animation:fadeOutLeftBig 8s 1s ease both;
-moz-animation:fadeOutLeftBig 8s 1s ease both;}
@-webkit-keyframes fadeOutLeftBig{
0%{opacity:1;
-webkit-transform:translateX(0)}
100%{opacity:0;
-webkit-transform:translateX(-2000px)}
}
@-moz-keyframes fadeOutLeftBig{
0%{opacity:1;
-moz-transform:translateX(0)}
100%{opacity:0;
-moz-transform:translateX(-2000px)}
}
.youchu{
-webkit-animation:fadeOutRightBig 8s 1s ease both;
-moz-animation:fadeOutRightBig 8s 1s ease both;}
@-webkit-keyframes fadeOutRightBig{
0%{opacity:1;
-webkit-transform:translateX(0)}
100%{opacity:0;
-webkit-transform:translateX(2000px)}
}
@-moz-keyframes fadeOutRightBig{
0%{opacity:1;
-moz-transform:translateX(0)}
100%{opacity:0;
-moz-transform:translateX(2000px)}
}

.zuoru{
-webkit-animation:fadeInLeftBig 1.5s .1s ease both;
-moz-animation:fadeInLeftBig 1.5s .1s ease both;}
@-webkit-keyframes fadeInLeftBig{
0%{opacity:0;
-webkit-transform:translateX(-2000px)}
100%{opacity:1;
-webkit-transform:translateX(0)}
}
@-moz-keyframes fadeInLeftBig{
0%{opacity:0;
-moz-transform:translateX(-2000px)}
100%{opacity:1;
-moz-transform:translateX(0)}
}

.youru{
-webkit-animation:fadeInRightBig 1.5s .1s ease both;
-moz-animation:fadeInRightBig 1.5s .1s ease both;}
@-webkit-keyframes fadeInRightBig{
0%{opacity:0;
-webkit-transform:translateX(2000px)}
100%{opacity:1;
-webkit-transform:translateX(0)}
}
@-moz-keyframes fadeInRightBig{
0%{opacity:0;
-moz-transform:translateX(2000px)}
100%{opacity:1;
-moz-transform:translateX(0)}
}
.youru1{
-webkit-animation:fadeInRightBig 2s 1s ease both;
-moz-animation:fadeInRightBig 2s 1s ease both;}
@-webkit-keyframes fadeInRightBig{
0%{opacity:0;
-webkit-transform:translateX(2000px)}
100%{opacity:1;
-webkit-transform:translateX(0)}
}
@-moz-keyframes fadeInRightBig{
0%{opacity:0;
-moz-transform:translateX(2000px)}
100%{opacity:1;
-moz-transform:translateX(0)}
}

/*右边淡入*/
.ybdra{
-webkit-animation:fadeInRight 2s 1.5s ease both;
-moz-animation:fadeInRight 2s 1.5s ease both;}
@-webkit-keyframes fadeInRight{
0%{opacity:0;
-webkit-transform:translateX(20px)}
100%{opacity:1;
-webkit-transform:translateX(0)}
}
@-moz-keyframes fadeInRight{
0%{opacity:0;
-moz-transform:translateX(20px)}
100%{opacity:1;
-moz-transform:translateX(0)}
}
.main1{
			margin:0 auto;
			width:240px;
			height:200px;
			/* border:1px solid red; */
			text-align:center;
			/* color:white; */
			font-size:16px;
			
			z-index: 999;
			position:absolute;
			top:65%;
			left:10%;
			
		
			/* background-color: grey; */
		}
		
		.tj{
			
			width: 100px;
			height: 30px;
			border: 0; 
			/*
			border-radius: 5px;
			*/
			margin-left: 20%;
			background:url(img/tj.jpg) no-repeat 50%;
		}
		
		.dk{
			/* width: 80px;
			height: 40px; */
			/* border: 1px solid red; */
			border-radius: 5px;
			/* background: grey; */
			margin-top: 5px;
		}
		input{
			width: 30px;
			height: 20px; 
			border: 1px solid grey;
		}

p input{
			width: 150px;
			height: 30px; 
			border: 1px solid grey;
			margin-top: -10px;
		}

</style>



<script>
	
		$(function(){
			
				//音乐
			$('.audio').click(function(){
				var play= document.getElementById('audio');
				if(play.paused == true){
					play.play();
					$(".audio>img").attr("src","img/play.png").addClass('fz');
				}else{
					play.pause();
					$(".audio>img").attr("src","img/pause.png").removeClass('fz');
				}
					
			});
		

		
		//图片预加载
		function loadImages(sources, callback){
			var count = 0,
				images ={},
				imgNum = 0;
			for(src in sources){
				imgNum++;
			}
			
			for(src in sources){
				images[src] = new Image();
				images[src].onload = function(){
					if(++count >= imgNum){
						callback(images);
					}
				}
				images[src].src = sources[src];
			}
		}



		loadImages(['http://yinming.gz.bcebos.com/0415/1.jpg','http://yinming.gz.bcebos.com/0415/2.jpg','http://yinming.gz.bcebos.com/0415/3.jpg','http://yinming.gz.bcebos.com/0415/4.jpg','http://yinming.gz.bcebos.com/0415/5.jpg','http://yinming.gz.bcebos.com/0415/6.jpg','http://yinming.gz.bcebos.com/0415/7.jpg','http://yinming.gz.bcebos.com/0415/8.jpg',
					'http://yinming.gz.bcebos.com/0415/1-1.png','http://yinming.gz.bcebos.com/0415/1-2.png','http://yinming.gz.bcebos.com/0415/1-3.png',
					'http://yinming.gz.bcebos.com/0415/2-1.png','http://yinming.gz.bcebos.com/0415/2-2.png','http://yinming.gz.bcebos.com/0415/2-3.png',
					'http://yinming.gz.bcebos.com/0415/3-1.png','http://yinming.gz.bcebos.com/0415/3-2.png','http://yinming.gz.bcebos.com/0415/3-3.png',
					'http://yinming.gz.bcebos.com/0415/4-1.png','http://yinming.gz.bcebos.com/0415/4-2.png','http://yinming.gz.bcebos.com/0415/4-3.png',
					'http://yinming.gz.bcebos.com/0415/5-1.png','http://yinming.gz.bcebos.com/0415/5-2.png',
					'http://yinming.gz.bcebos.com/0415/6-1.png','http://yinming.gz.bcebos.com/0415/6-2.png',
					'http://yinming.gz.bcebos.com/0415/7-1.png','http://yinming.gz.bcebos.com/0415/7-2.png',
					'http://yinming.gz.bcebos.com/0415/8-1.png','http://yinming.gz.bcebos.com/0415/8-2.png',
					],function(){
		      $('.spinner').remove();
		      $('.p-index').show();
		      //alert(11111);
		});
	 

	});
	
	
</script>




<body>
	<!-- 开始加载画面 -->
	<div class="spinner">
		  <div class="rect1"></div>
		  <div class="rect2"></div>
		  <div class="rect3"></div>
		  <div class="rect4"></div>
		  <div class="rect5"></div>
	</div>

	<section class="p-index" style="display:none;">
		
		
		
		<!-- 1 -->
		<section class="m-page m-page1">
		
			<div class="m-img m-img01" style="background:url(http://yinming.gz.bcebos.com/0415/1.jpg) center no-repeat;background-size:100% 100%">
				<a href="javascript:;" class="help-up" style="position:absolute;left:50%;bottom:2%;"></a>
			</div>
       		
       		
       		<img class="fzz"  src="http://yinming.gz.bcebos.com/0415/1-1.png" style="position: absolute; top:-2%;  left:0%; z-index:101; width:100%;"  />
       		<img class="ybtr"  src="http://yinming.gz.bcebos.com/0415/1-2.png" style="position: absolute; top:71%;  left:0%; z-index:101; width:100%;"  />
       		<img class="dr"  src="http://yinming.gz.bcebos.com/0415/1-3.png" style="position: absolute; top:81%;  left:0%; z-index:101; width:100%;"  />
       		<a href="http://xyt.xy-tang.com/2015n/hejunObj/xyt/?from=groupmessage&isappinstalled=0" style="position: absolute; top:96%; left:38%;  z-index:2000; color:white;">信玉堂技术支持</a>
		</section>
		
		<!-- 2 -->
		<section class="m-page m-page1 drr">
			<div class="m-img m-img01" style="background:url(http://yinming.gz.bcebos.com/0415/2.jpg) center no-repeat;background-size:100% 100%">
				<a href="javascript:;" class="help-up"></a>
			</div>
			
			<img class="zbtr"  src="http://yinming.gz.bcebos.com/0415/2-1.png" style="position: absolute; top:5%;  left:0%;  z-index:101; width:100%;"  />
			<img class="zbtr2"  src="http://yinming.gz.bcebos.com/0415/2-2.png" style="position: absolute; top:18%;  left:0%;  z-index:101; width:100%;"  />
			<img class="fangda3"  src="http://yinming.gz.bcebos.com/0415/2-3.png" style="position: absolute; top:28%;  left:0%;  z-index:101; width:100%;"  />
			
		</section>
		
		<!-- 3 -->
		<section class="m-page m-page1 drr">
			<div class="m-img m-img01" style="background:url(http://yinming.gz.bcebos.com/0415/3.jpg) center no-repeat;background-size:100% 100%">
				<a href="javascript:;" class="help-up"></a>
			</div>
			<!-- <img class="ymzbdr"  src="http://yinming.gz.bcebos.com/0415/32.png" style="position: absolute; top:0%; left:0%; z-index:101; width:100%;"  /><img class="ymybdr"  src="http://yinming.gz.bcebos.com/0415/31.png" style="position: absolute; top:0%; left:0%; z-index:101; width:100%;"  /> -->

			<img class="sfz"  src="http://yinming.gz.bcebos.com/0415/3-1.png" style="position: absolute; top:60%; left:0%; z-index:101; width:100%;"  />
			<img class="ymybdr"  src="http://yinming.gz.bcebos.com/0415/3-2.png" style="position: absolute; top:72%; left:0%; z-index:101; width:100%;"  />
			<img class="xz"  src="http://yinming.gz.bcebos.com/0415/3-3.png" style="position: absolute; top:81%; left:0%; z-index:101; width:100%;"  />
			
		</section>
		
		<!-- 4 -->
		<section class="m-page m-page1 drr"> 
			<div class="m-img m-img01" style="background:url(http://yinming.gz.bcebos.com/0415/4.jpg) center no-repeat;background-size:100% 100%">
				<a href="javascript:;" class="help-up"></a>
			</div>
			
			<img class="zbdr"  src="http://yinming.gz.bcebos.com/0415/4-1.png" style="position: absolute; top:2%; left:0%; z-index:101; width:100%;"  />
			<img class="xfdr"  src="http://yinming.gz.bcebos.com/0415/4-2.png" style="position: absolute; top:18%; left:0%; z-index:101; width:100%;"  />
			<img class="ybdr"  src="http://yinming.gz.bcebos.com/0415/4-3.png" style="position: absolute; top:26%; left:0%; z-index:101; width:100%;"  />
			
		</section>
		
		<!-- 5 -->
		<section class="m-page m-page1 drr"> 
			<div class="m-img m-img01" style="background:url(http://yinming.gz.bcebos.com/0415/5.jpg) center no-repeat;background-size:100% 100%">
				<a href="javascript:;" class="help-up"></a>
			</div>
			<img class="sfdr"  src="http://yinming.gz.bcebos.com/0415/5-1.png" style="position: absolute; top:38%; left:0%; z-index:101; width:100%;"  />
			<img class="xfdr"  src="http://yinming.gz.bcebos.com/0415/5-2.png" style="position: absolute; top:61%; left:0%; z-index:101; width:100%;"  />
			
		</section>


		<!-- 6 -->
		<section class="m-page m-page1 drr"> 
			<div class="m-img m-img01" style="background:url(http://yinming.gz.bcebos.com/0415/6.jpg) center no-repeat;background-size:100% 100%">
				<a href="javascript:;" class="help-up"></a>
			</div>
			<img class="zbdr"  src="http://yinming.gz.bcebos.com/0415/6-1.png" style="position: absolute; top:0%; left:0%; z-index:101; width:100%;"  />
			<img class="ybdr3"  src="http://yinming.gz.bcebos.com/0415/6-2.png" style="position: absolute; top:85%; left:0%; z-index:101; width:100%;"  />
			
		</section>

		<!-- 7 -->
		<section class="m-page m-page1 drr"> 
			<div class="m-img m-img01" style="background:url(http://yinming.gz.bcebos.com/0415/7.jpg) center no-repeat;background-size:100% 100%">
				<a href="javascript:;" class="help-up"></a>
			</div>
			<img class="aa" src="aaa.jpg" alt="" style="position: absolute; top:0%; left:0%; z-index:102; width:100%;">
			<img class="" src="aa.jpg" alt="" style="position: absolute; top:0%; left:0%; z-index:101; width:100%;">
			<!-- <img class="ybdr2"  src="http://yinming.gz.bcebos.com/0415/7-1.png" style="position: absolute; top:3%; left:0%; z-index:101; width:100%;"  />
			<img class="zbdr2"  src="http://yinming.gz.bcebos.com/0415/7-2.png" style="position: absolute; top:21%; left:0%; z-index:101; width:100%;"  /> -->
			
		</section>

		<!-- 8 -->
		<section class="m-page m-page1 drr"> 
			<div class="m-img m-img01" style="background:url(http://yinming.gz.bcebos.com/0415/8.jpg) center no-repeat;background-size:100% 100%">
				
			</div>
			<!-- <img class="aa" src="aa.jpg" alt="" style="position: absolute; top:0%; left:0%; z-index:102; width:100%;">
			<img class="" src="aaa.jpg" alt="" style="position: absolute; top:0%; left:0%; z-index:101; width:100%;"> -->
			<img class="zbdr"  src="http://yinming.gz.bcebos.com/0415/8-1.png" style="position: absolute; top:0%; left:0%; z-index:101; width:100%;"  />
			<img class="ybdr"  src="http://yinming.gz.bcebos.com/0415/8-2.png" style="position: absolute; top:67%; left:0%; z-index:101; width:100%;"  />
			
		</section>

		<div class="audio">
			<img  class='fz' src="./img/play.png" width='100%' alt="">
			<audio id='audio' src="http://res.maka.im/1658411/audio/1454412631930.mp3" loop autoplay="autoplay"></audio>
		</div>
	
	</section>
	
	
	<style>
		.audio{
			width: 30px;
			height: 30px;
			background: url(img/adbg.png);
			background-size: 100% 100%;

			position: absolute;
			top: 20px;
			right: 20px;
			z-index: 1000;
		}
		.fz{
		-webkit-animation:pulse 1s .2s infinite alternate;
		-moz-animation:pulse 1s .2s infinite alternate;}
		@-webkit-keyframes pulse{
		0%{-webkit-transform:scale(0.5)}
		100%{-webkit-transform:scale(1)}
		}
		@-moz-keyframes pulse{
		0%{-moz-transform:scale(0.5)}
		100%{-moz-transform:scale(1)}
		}
		.help-up{
		-webkit-animation:fadeOutUp 1.5s .2s infinite;
		-moz-animation:fadeOutUp 1.5s .2s infinite;}
		@-webkit-keyframes fadeOutUp{
		0%{opacity:1;
		-webkit-transform:translateY(0)}
		100%{opacity:0;
		-webkit-transform:translateY(-20px)}
		}
		@-moz-keyframes fadeOutUp{
		0%{opacity:1;
		-moz-transform:translateY(0)}
		100%{opacity:0;
		-moz-transform:translateY(-20px)}
		}
	</style>
	<!-- 引入脚本 -->
	<script src="static/js/jquery.easing.1.3.js"></script>
	<script src="static/js/99_main.js"></script>
	
	
</body>
</html>

<!--开始-->
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script>
		wx.config({
			debug: false,
			appId: '<?php echo $signPackage["appId"];?>',
			timestamp: <?php echo $signPackage["timestamp"];?>,
			nonceStr: '<?php echo $signPackage["nonceStr"];?>',
			signature: '<?php echo $signPackage["signature"];?>',
			jsApiList: [
			 //所有要调用的 API 都要加到这个列表中
						'onMenuShareAppMessage',
						'onMenuShareTimeline'
						]
		});
	  
	    wx.ready(function(){
	    //在这里调用 API

		
		
			wx.onMenuShareTimeline({
				title: '龙湖九墅—邀您共鉴锡城之巅！', // 分享标题
				link: 'http://xyt.xy-tang.com/yin/fanye/longhu9', // 分享链接
				imgUrl: 'http://xyt.xy-tang.com/yin/fanye/longhu9/share.jpg', // 分享图标
				success: function () { 
					// 用户确认分享后执行的回调函数
					//window.location.href = 'http://www.baidu.com';
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
			  title:  '龙湖九墅—邀您共鉴锡城之巅！',
			  desc:   '与您共同鉴证 锡城之巅',
			  link:   'http://xyt.xy-tang.com/yin/fanye/longhu9',
			  imgUrl: 'http://xyt.xy-tang.com/yin/fanye/longhu9/share.jpg',
			  trigger: function (res) {
				//alert('用户点击发送给朋友');
			  },
			  success: function (res) {
				//alert('已分享');
			  },
			  cancel: function (res) {
				//alert('已取消');
			  },
			  fail: function (res) {
				//alert(JSON.stringify(res));
			  }
			});
		
	    });
		
		//debug
		wx.error(function(res){
		  alert(res.errMsg);
		});
	
	</script>
<!--结束-->
