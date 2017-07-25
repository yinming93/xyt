<?php 
		//加载配置文件
		//require ('weixin_sdk.php'); 
		require_once "jssdk.php";
		$jssdk = new JSSDK( APPID, APPSECRET );
		$signPackage = $jssdk->GetSignPackage();
		
?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta charset="utf-8">
	<title>一起来拍尔康吧</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="full-screen" content="yes">
	<meta name="screen-orientation" content="portrait">
	<meta name="x5-fullscreen" content="true">
	<meta name="360-fullscreen" content="true">
	<link rel="stylesheet" href="res/css/index.css">
	<script type="text/javascript" charset="utf-8" src="res/js/game.js" async defer></script>
	<script src="static/js/jquery-1.8.2.min.js"></script>
    <script src="static/js/wScratchPad.js"></script>
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
		});
	</script>
</head>
<style>
	*{
		margin: 0;
		padding: 0;
	}
</style>
<body style="background:#2A2C2D;">
	<div style="width:460px;height:665px;" id="container" class="splash">
		<canvas style="width:460px;height:665px;" height="925.2" width="640" id="canvas"></canvas>
		<div id="info"></div>
		<div id="dabai"><img src="res/img/dabaiLb.png"></div>
		<a href="http://xyt.xy-tang.com/yin/youxi/dabaigame2/gz.php" id="guanzhu" style="width:120px;height:200px;background:;position:absolute;top:60%;right:0;"></a>
		<!-- <a href="./bm/index.php"><div id="anniu" style="width:26.5%;height:30px;background-image:url('res/img/tj.png');background-size:cover;position:absolute;top:84%;left:36.8%;display:none;"></div></a> -->
	</div>
	<div class="audio">
			<img  class='fz' src="./img/play.png" width='100%' alt="">
			<audio id='audio' src="img/sr.mp3" loop autoplay="autoplay"></audio>
	</div>
	<style>
		.audio{
			width: 30px;
			height: 30px;
			background: url(img/adbg.png);
			background-size: 100% 100%;
			position: absolute;
			top: 20px;
			left: 91%;
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
	</style>
	<script src="res/js/init.js"></script>
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript">
		var shareurl = 'http://xyt.xy-tang.com/yin/youxi/dabaigame2/index.php';
		var imgUrl = 'http://xyt.xy-tang.com/yin/youxi/dabaigame2/res/img/icon.jpg';
		var stitle = "一起来拍尔康吧";
		var scontent = "努力刷分吧";
		
		wx.config({
		debug: false,
		appId: '<?php echo $signPackage["appId"];?>',
		timestamp: <?php echo $signPackage["timestamp"];?>,
		nonceStr: '<?php echo $signPackage["nonceStr"];?>',
		signature: '<?php echo $signPackage["signature"];?>',
		jsApiList: [
		 //所有要调用的 API 都要加到这个列表中
					'onMenuShareTimeline',
					'onMenuShareAppMessage',
					'onMenuShareQQ',
					'onMenuShareWeibo',
					]
		});
		
		wx.ready(function () {
			setShare();
			
			
			//debug
			wx.error(function(res){
			  // alert(res.errMsg);
			});

		});
		
		function setShare(){
			wx.onMenuShareTimeline({
				title: stitle, // 分享标题
				link: shareurl, // 分享链接
				imgUrl: imgUrl, // 分享图标
				success: function () { 
					  // 用户确认分享后执行的回调函数
				},
				cancel: function () { 
					  // 用户取消分享后执行的回调函数
				}
			});
			wx.onMenuShareAppMessage({
				title: stitle, // 分享标题
				desc: scontent, // 分享描述
				link:shareurl, // 分享链接
				imgUrl: imgUrl, // 分享图标
				type: 'link', // 分享类型,music、video或link，不填默认为link
				dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
				success: function () { 
					// 用户确认分享后执行的回调函数
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
      }
</script>
</body>
</html>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?dc65728722ac638c0ef4950fa6d589e4";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
