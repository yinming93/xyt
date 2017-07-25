<?php
//引入js类文件
require_once "jssdk.php";
$jssdk = new JSSDK( APPID, APPSECRET );
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
<script src="jquery-1.8.2.min.js"></script>
<meta http-equiv="Cache-Control" content="max-age=0" />
<meta name="apple-touch-fullscreen" content="yes" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">	
<link rel="stylesheet" href="dh.css">
	<title>学霸向你下战书，敢应战吗？</title>
</head>
<style>
body{
	padding:0;
	margin:0;
}
.tt{
	width: 100%;
	height: 100%;
	background: white;
	position: absolute;
	display: none;
}
.tt img{
	width: 100%;
	height: 100%;
	position: absolute;
	top:0;
	left:0;
}
label{
	width: 20%;
	height: 6%;
	background: red;
	opacity: 0;
	position: absolute;
}
.demo{
	width: 8%;
	height: 5%;
	position: absolute;
	top: 29.5%;
	right: 8%;
	line-height: 28px;
	text-align: center;
	font-size: 14px;
	color: red;
}
</style>
<script>	
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
		loadImages(['http://17yin.gz.bcebos.com/lsl/1.jpg','http://17yin.gz.bcebos.com/lsl/2.jpg','http://17yin.gz.bcebos.com/lsl/3.jpg','http://17yin.gz.bcebos.com/lsl/4.jpg',
			'http://17yin.gz.bcebos.com/lsl/5.jpg','http://17yin.gz.bcebos.com/lsl/6.jpg','http://17yin.gz.bcebos.com/lsl/7.jpg','http://17yin.gz.bcebos.com/lsl/8.jpg','http://17yin.gz.bcebos.com/lsl/9.jpg','http://17yin.gz.bcebos.com/lsl/10.jpg','http://17yin.gz.bcebos.com/lsl/11.jpg','http://17yin.gz.bcebos.com/lsl/12.jpg','http://17yin.gz.bcebos.com/lsl/13.jpg','http://17yin.gz.bcebos.com/lsl/14.jpg','http://17yin.gz.bcebos.com/lsl/15.jpg',
			'http://17yin.gz.bcebos.com/lsl/1-1.png','http://17yin.gz.bcebos.com/lsl/1-2.png','http://17yin.gz.bcebos.com/lsl/1-3.png','http://17yin.gz.bcebos.com/lsl/1-4.png',
			'http://17yin.gz.bcebos.com/lsl/2-1.png','http://17yin.gz.bcebos.com/lsl/2-2.png','http://17yin.gz.bcebos.com/lsl/2-3.png',
			'http://17yin.gz.bcebos.com/lsl/3-1.png','http://17yin.gz.bcebos.com/lsl/3-2.png',
			'http://17yin.gz.bcebos.com/lsl/4-1.png','http://17yin.gz.bcebos.com/lsl/4-2.png',
			'http://17yin.gz.bcebos.com/lsl/5-1.png','http://17yin.gz.bcebos.com/lsl/5-2.png',
			'http://17yin.gz.bcebos.com/lsl/6-1.png','http://17yin.gz.bcebos.com/lsl/6-2.png',
			'http://17yin.gz.bcebos.com/lsl/7-1.png','http://17yin.gz.bcebos.com/lsl/7-2.png',
			'http://17yin.gz.bcebos.com/lsl/8-1.png','http://17yin.gz.bcebos.com/lsl/8-2.png',
			'http://17yin.gz.bcebos.com/lsl/9-1.png','http://17yin.gz.bcebos.com/lsl/9-2.png',
			'http://17yin.gz.bcebos.com/lsl/10-1.png','http://17yin.gz.bcebos.com/lsl/10-2.png',
			'http://17yin.gz.bcebos.com/lsl/11-1.png','http://17yin.gz.bcebos.com/lsl/11-2.png',
			'http://17yin.gz.bcebos.com/lsl/12-1.png',
			'http://17yin.gz.bcebos.com/lsl/13-1.png','http://17yin.gz.bcebos.com/lsl/13-2.png',
			'http://17yin.gz.bcebos.com/lsl/14-1.png','http://17yin.gz.bcebos.com/lsl/14-2.png',
			'http://17yin.gz.bcebos.com/lsl/10f.png','http://17yin.gz.bcebos.com/lsl/20f.png','http://17yin.gz.bcebos.com/lsl/30f.png','http://17yin.gz.bcebos.com/lsl/40f.png','http://17yin.gz.bcebos.com/lsl/50f.png','http://17yin.gz.bcebos.com/lsl/60f.png','http://17yin.gz.bcebos.com/lsl/70f.png','http://17yin.gz.bcebos.com/lsl/80f.png','http://17yin.gz.bcebos.com/lsl/90f.png','http://17yin.gz.bcebos.com/lsl/100f.png','http://17yin.gz.bcebos.com/lsl/110f.png','http://17yin.gz.bcebos.com/lsl/120f.png','http://17yin.gz.bcebos.com/lsl/130f.png',

					],function(){
		      // $('.spinner').remove();
		      // $('#gui').hide();
		      // alert('预加载完成');
		      // document.getElementById('gui').style.display='none';

		})
</script>
<script>
		function sy(){
			var play= document.getElementById('audio');		
			play.play();
			loadImages();
		}
</script>
<body onload="sy()">
<!-- <div id="gui" style="width:100%;height:100%;background:black;z-index:999;position:absolute;top:0;left:0;">
<br><br><br><br><br><br><br><br><br><br>
	<center><p style="color:white;">加载中...</p></center>
</div> -->
<div class="tt" id="shou" style="z-index:199;display:block;">
	<img src="http://17yin.gz.bcebos.com/lsl/1.jpg" alt="">
	<img class="swing" src="http://17yin.gz.bcebos.com/lsl/1-1.png">
	<img class="tq" src="http://17yin.gz.bcebos.com/lsl/1-2.png">
	<img class="qiuqian" src="http://17yin.gz.bcebos.com/lsl/1-3.png">
	<img class="maichong" src="http://17yin.gz.bcebos.com/lsl/1-4.png">
	<label style="top:60%;left:0%;width:100%;height:200px;opacity:0;background:red;"><input type="radio" name="o0" q='0'></label>
</div>
<div class="tt" style="z-index:189;">
<div class="demo" style="z-index: 189;"></div>
	<img src="http://17yin.gz.bcebos.com/lsl/2.jpg" alt="">
	<img class="yaobai" src="http://17yin.gz.bcebos.com/lsl/2-1.png">
	<img class="yaobai2" src="http://17yin.gz.bcebos.com/lsl/2-2.png">
	<img class="shan" src="http://17yin.gz.bcebos.com/lsl/2-3.png">
	<label style="top:56%;left:29%;" onclick="dui();"><input type="radio" name="o1" q='1'></label>
	<label style="top:56%;left:64%;" onclick="cuo();"><input type="radio" name="o1" q='0'></label>
</div>
<div class="tt" style="z-index:179;">
<div class="demo" style="z-index: 179;top:7%;"></div>
	<img src="http://17yin.gz.bcebos.com/lsl/3.jpg" alt="">
	<img class="tq" src="http://17yin.gz.bcebos.com/lsl/3-1.png">
	<img class="tq2" src="http://17yin.gz.bcebos.com/lsl/3-2.png">
	<label style="top:45%;left:25%;" onclick="cuo();"><input type="radio" name="o2" q='0'></label>
	<label style="top:45%;left:61%;" onclick="dui();"><input type="radio" name="o2" q='1'></label>
</div>
<div class="tt" style="z-index:169;">
<div class="demo" style="z-index: 169;top:7%;"></div>
	<img src="http://17yin.gz.bcebos.com/lsl/4.jpg" alt="">
	<img class="shan" src="http://17yin.gz.bcebos.com/lsl/4-1.png">
	<img class="tq3" src="http://17yin.gz.bcebos.com/lsl/4-2.png">
	<label style="top:49%;left:23%;" onclick="cuo();"><input type="radio" name="o3" q='0'></label>
	<label style="top:49%;left:60%;" onclick="dui();"><input type="radio" name="o3" q='1'></label>
</div>
<div class="tt" style="z-index:159;">
<div class="demo" style="z-index: 159;top:7%;"></div>
	<img src="http://17yin.gz.bcebos.com/lsl/5.jpg" alt="">
	<img class="maichong" src="http://17yin.gz.bcebos.com/lsl/5-1.png">
	<img class="shan" src="http://17yin.gz.bcebos.com/lsl/5-2.png">
	<label style="top:49%;left:23%;" onclick="dui();"><input type="radio" name="o4" q='1'></label>
	<label style="top:49%;left:60%;" onclick="cuo();"><input type="radio" name="o4" q='0'></label>
</div>
<div class="tt" style="z-index:149;">
<div class="demo" style="z-index: 149;top:7%;"></div>
	<img src="http://17yin.gz.bcebos.com/lsl/6.jpg" alt="">
	<img class="yaobai" src="http://17yin.gz.bcebos.com/lsl/6-1.png">
	<img class="tq" src="http://17yin.gz.bcebos.com/lsl/6-2.png">
	<label style="top:49%;left:23%;" onclick="cuo();"><input type="radio" name="o5" q='0'></label>
	<label style="top:49%;left:60%;" onclick="dui();"><input type="radio" name="o5" q='1'></label>
</div>
<div class="tt" style="z-index:139;">
<div class="demo" style="z-index: 139;top:7%;"></div>
	<img src="http://17yin.gz.bcebos.com/lsl/7.jpg" alt="">
	<img class="swing" src="http://17yin.gz.bcebos.com/lsl/7-1.png">
	<img class="tq" src="http://17yin.gz.bcebos.com/lsl/7-2.png">
	<label style="top:49%;left:14%;" onclick="dui();"><input type="radio" name="o6" q='1'></label>
	<label style="top:49%;left:40%;" onclick="cuo();"><input type="radio" name="o6" q='0'></label>
	<label style="top:49%;left:67%;" onclick="cuo();"><input type="radio" name="o6" q='0'></label>
</div>
<div class="tt" style="z-index:129;">
<div class="demo" style="z-index: 129;top:7%;"></div>
	<img src="http://17yin.gz.bcebos.com/lsl/8.jpg" alt="">
	<img class="maichong" src="http://17yin.gz.bcebos.com/lsl/8-1.png">
	<img class="tq" src="http://17yin.gz.bcebos.com/lsl/8-2.png">
	<label style="top:45%;left:14%;" onclick="cuo();"><input type="radio" name="o7" q='0'></label>
	<label style="top:45%;left:40%;" onclick="dui();"><input type="radio" name="o7" q='1'></label>
	<label style="top:45%;left:67%;" onclick="cuo();"><input type="radio" name="o7" q='0'></label>
</div>
<div class="tt" style="z-index:119;">
<div class="demo" style="z-index: 119;top:7%;"></div>
	<img src="http://17yin.gz.bcebos.com/lsl/9.jpg" alt="">
	<img class="tq2" src="http://17yin.gz.bcebos.com/lsl/9-1.png">
	<img class="tq3" src="http://17yin.gz.bcebos.com/lsl/9-2.png">
	<label style="top:45%;left:14%;" onclick="cuo();"><input type="radio" name="o8" q='0'></label>
	<label style="top:45%;left:40%;" onclick="cuo();"><input type="radio" name="o8" q='0'></label>
	<label style="top:45%;left:67%;" onclick="dui();"><input type="radio" name="o8" q='1'></label>
</div>
<!-- <div class="tt" style="z-index:109;">
	<img src="http://17yin.gz.bcebos.com/lsl/9.jpg" alt="">
	<label style="top:45%;left:14%;"><input type="radio" name="o9" q='1'></label>
	<label style="top:45%;left:40%;"><input type="radio" name="o9" q='0'></label>
	<label style="top:45%;left:67%;"><input type="radio" name="o9" q='0'></label>
</div> -->
<div class="tt" style="z-index:99;">
<div class="demo" style="z-index: 99;top:7%;"></div>
	<img src="http://17yin.gz.bcebos.com/lsl/10.jpg" alt="">
	<img class="yaobai2" src="http://17yin.gz.bcebos.com/lsl/10-1.png">
	<img class="shan" src="http://17yin.gz.bcebos.com/lsl/10-2.png">
	<label style="top:45%;left:14%;" onclick="dui();"><input type="radio" name="o10" q='1'></label>
	<label style="top:45%;left:40%;" onclick="cuo();"><input type="radio" name="o10" q='0'></label>
	<label style="top:45%;left:67%;" onclick="cuo();"><input type="radio" name="o10" q='0'></label>
</div>
<div class="tt" style="z-index:89;">
<div class="demo" style="z-index: 89;top:7%;"></div>
	<img src="http://17yin.gz.bcebos.com/lsl/11.jpg" alt="">
	<img class="yaobai" src="http://17yin.gz.bcebos.com/lsl/11-1.png">
	<img class="tq2" src="http://17yin.gz.bcebos.com/lsl/11-2.png">
	<label style="top:41.5%;left:14%;" onclick="cuo();"><input type="radio" name="o11" q='0'></label>
	<label style="top:41.5%;left:40%;" onclick="cuo();"><input type="radio" name="o11" q='0'></label>
	<label style="top:41.5%;left:67%;" onclick="dui();"><input type="radio" name="o11" q='1'></label>
</div>
<div class="tt" style="z-index:79;" d='22'>
<div class="demo" style="z-index: 79;top:7%;"></div>
	<img src="http://17yin.gz.bcebos.com/lsl/12.jpg" alt="">
	<img class="swing" src="http://17yin.gz.bcebos.com/lsl/12-1.png">
	<label style="top:49%;left:14%;" onclick="cuo();"><input type="radio" name="o12" q='0'></label>
	<label style="top:49%;left:40%;" onclick="dui();"><input type="radio" name="o12" q='1'></label>
	<label style="top:49%;left:67%;" onclick="cuo();"><input type="radio" name="o12" q='0'></label>
</div>
<div class="tt" style="z-index:69;">
<div class="demo" style="z-index: 69;top:7%;"></div>
	<img src="http://17yin.gz.bcebos.com/lsl/13.jpg" alt="">
	<img class="shan" src="http://17yin.gz.bcebos.com/lsl/13-1.png">
	<img class="tq" src="http://17yin.gz.bcebos.com/lsl/13-2.png">
	<label style="top:49%;left:14%;" onclick="cuo();"><input type="radio" name="o13" q='0'></label>
	<label style="top:49%;left:40%;" onclick="cuo();"><input type="radio" name="o13" q='0'></label>
	<label style="top:49%;left:67%;" onclick="dui();"><input type="radio" name="o13" q='1'></label>
</div>
<div class="tt" style="z-index:59;">
<div class="demo" style="z-index: 59;top:7%;"></div>
	<img src="http://17yin.gz.bcebos.com/lsl/14.jpg" alt="">
	<img class="maichong" src="http://17yin.gz.bcebos.com/lsl/14-1.png">
	<img class="tq" src="http://17yin.gz.bcebos.com/lsl/14-2.png">
	<label style="top:49%;left:14%;" onclick="cuo();"><input type="radio" name="o14" q='0'></label>
	<label style="top:49%;left:40%;" onclick="cuo();"><input type="radio" name="o14" q='0'></label>
	<label style="top:49%;left:67%;" onclick="dui();"><input type="radio" name="o14" q='1'></label>
</div>
<div class="tt" style="z-index:49;" id="cnm">
	<img src="http://17yin.gz.bcebos.com/lsl/15.jpg" alt="">
	<img id="fenshu" src="http://17yin.gz.bcebos.com/lsl/0f.png" style="width:60%;height:34%;position:absolute;top:31%;left:20%;">
	<input id="pdt" type="text" value="0" readonly="readonly" style="position:absolute;top:23.5%;left:32%;width:18%;height:4%;line-height:4%;text-align:center;color:red;background:transparent;font-weight:bold;border:0;">
	<input id="xzt" type="text" value="0" readonly="readonly" style="position:absolute;top:23.5%;left:50%;width:18%;height:4%;line-height:4%;text-align:center;color:red;background:transparent;font-weight:bold;border:0;">
	<input id="jft" type="text" value="0" readonly="readonly" style="position:absolute;top:23.5%;left:68%;width:18%;height:4%;line-height:4%;text-align:center;color:red;background:transparent;font-weight:bold;border:0;">
	<a href="index.php"><div style="width:27%;height:6%;background:;position:absolute;top:62%;left:20%;"></div></a>
	<div style="width:27%;height:6%;background:;position:absolute;top:62%;left:53%;" onclick="cx()"></div>
	<img id="fx" src="http://17yin.gz.bcebos.com/lsl/fx.png" style="width:100%;height:16%;position:absoulte;top:0;left:0;display:none;">
</div>
<audio id="true" src="true.mp3"></audio>
<audio id="wrong" src="wrong.mp3"></audio>
<audio id='audio' src="sr.mp3" loop autoplay="autoplay"></audio>
</body>
</html>
	<script>
	 setTimeout(function(){
	     $(window).scrollTop(1);
	 },0);
	  document.getElementById('audio').play();
	  document.addEventListener("WeixinJSBridgeReady", function () {
			WeixinJSBridge.invoke('getNetworkType', {}, function (e) {
	            document.getElementById('audio').play();
			});
	  }, false);
	</script>
<!-- <script src="http://2015image.bj.bcebos.com/js/jquery-1.11.1.min.js"></script>   -->
<script>
	function cx () {
		document.getElementById('fx').style.display='block';
	}
	function dui () {
		document.getElementById('true').play();
	}
	function cuo () {
		document.getElementById('wrong').play();
	}
</script>  
<script>
	var c = 0;
	var i = 0;
	$("input:radio").on('click',function(){
		    _this = $(this);
		    // setInterval($(this).parent().parent().fadeOut(),3000)
			stopTimer();
	        startTimer(_this);
		 if ($(this).attr("q")==1){
	        c++;
	      }
	      i++;
	    if (i==6){
	    	pd = c;
	    	// alert('判断'+pd+'题');
	    }
	    if (i==11){
	    	xz = c-pd;
	    	// alert('选择'+xz+'题');
	    }
	    if (i==14){
	    	jf = c-pd-xz;
	    	// alert('加分'+jf+'题');
	    }
		$(this).parent().parent().fadeOut().next('.tt').fadeIn();
		if (i==14){
			// alert('你一共答对了'+c+'题');
			$("#pdt").val(pd+"0");
			$("#xzt").val(xz+"0");
			$("#jft").val(jf+"0");
			if(c==1){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/10f.png");
			}else if(c==2){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/20f.png");
			}else if(c==3){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/30f.png");
			}else if(c==4){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/40f.png");
			}else if(c==5){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/50f.png");
			}else if(c==6){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/60f.png");
			}else if(c==7){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/70f.png");
			}else if(c==8){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/80f.png");
			}else if(c==9){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/90f.png");
			}else if(c==10){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/100f.png");
			}else if(c==11){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/110f.png");
			}else if(c==12){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/120f.png");
			}else if(c==13){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/130f.png");
			}

			var percent = c/13;
			var per = parseInt(percent*10);
			
		}

		 wx.ready(function () {
			var shareinfo={
			 	 title: '我学霸指数高达'+c+'0分，击败了'+per+'0%的考生！',
			      desc: '2017年苏州学霸招考考题泄露，你的学霸指数为...',
			      link: 'http://szxytang.com/yin/za/lsl',
			      imgUrl: 'http://szxytang.com/yin/za/lsl/share.jpg'}
			      wx.onMenuShareTimeline(shareinfo);
			 wx.onMenuShareAppMessage(shareinfo);
			  });

	})
</script>

<!-- 倒计时js -->
<script>
	var myVar;var t=10;
		function startTimer(){/*setInterval() 间隔指定的毫秒数不停地执行指定的代码*/
			myVar=setInterval(function(){myTimer()},1000);
		}
		function myTimer(obj){/* 定义一个得到本地时间的函数*/
			// alert(i);
			t-=1;
			if(t==0&&i!=14){

				_this.parent().parent().next().fadeOut().next().fadeIn();
				_this=_this.parent().parent().next().children().children();
				stopTimer();
	        	startTimer(_this);
	        // alert(c);
	        if(c==0){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/0f.png");
			}else if(c==1){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/10f.png");
			}else if(c==2){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/20f.png");
			}else if(c==3){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/30f.png");
			}else if(c==4){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/40f.png");
			}else if(c==5){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/50f.png");
			}else if(c==6){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/60f.png");
			}else if(c==7){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/70f.png");
			}else if(c==8){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/80f.png");
			}else if(c==9){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/90f.png");
			}else if(c==10){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/100f.png");
			}else if(c==11){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/110f.png");
			}else if(c==12){
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/120f.png");
			}else{
				$("#fenshu").attr("src","http://17yin.gz.bcebos.com/lsl/130f.png");
			}

			i++;
			if (i<=6){
	    	pd = c;
		    }
		    if (i>=7&&i<=10){
		    	xz = c-pd;
		    }
		    if (i>=11){
		    	jf = c-pd-xz;
		    }
		   
	        $("#pdt").val(pd+"0");
			$("#xzt").val(xz+"0");
			$("#jft").val(jf+"0");
			
				// _this.parent().parent().fadeOut(200);
			}
			// document.getElementById("demo").innerHTML=t;
			$(".demo").html(t);
		}
		function stopTimer(){/* clearInterval() 方法用于停止 setInterval() 方法执行的函数代码*/
			clearInterval(myVar);
			t=10;
		}
</script>
<!-- 引入脚本 -->
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>	
<script type="text/javascript">
wx.config({
	    debug: false,
	    appId: '<?php echo $signPackage["appId"];?>',
	    timestamp: '<?php echo $signPackage["timestamp"];?>',
	    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
	    signature: '<?php echo $signPackage["signature"];?>',
	    jsApiList: [
	"onMenuShareTimeline","onMenuShareAppMessage"
	    ]
	  });
	 wx.ready(function () {
	var shareinfo={
	 	 title: '学霸向你下战书，敢应战吗？',
	      desc: '2017年苏州学霸招考考题泄露，你的学霸指数为...',
	      link: 'http://szxytang.com/yin/za/lsl',
	      imgUrl: 'http://szxytang.com/yin/za/lsl/share.jpg'}
	      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
	  });
</script>