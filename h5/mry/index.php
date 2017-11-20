<?php
	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
?>
<!doctype html>
<html>
<head>
	<title>专属钞票</title>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="IE=edge,chrome=1">
	<meta id="jdouview" name="viewport" content="width=750, user-scalable=no, target-densitydpi=device-dpi">
<!-- 	<title>一起来当美人鱼</title> -->
	<link rel="stylesheet" type="text/css" href="style/css.css">
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
</head>
<script>
    function sy(){
      var play= document.getElementById('audio');   
      play.play();

    };
    </script>
<body onload="sy()">
<audio preload="preload"  id="car_audio" src="sr.mp3" loop></audio>
<script>
   setTimeout(function(){
       $(window).scrollTop(1);
   },0);
    document.getElementById('car_audio').play();
    document.addEventListener("WeixinJSBridgeReady", function () {
      WeixinJSBridge.invoke('getNetworkType', {}, function (e) {
              document.getElementById('car_audio').play();
      });
    }, false);
</script>
<div class="laoding" id="loading">
	<p class="fadeInOut delay1">加载慢</p>
	<p class="fadeInOut delay2">但你不许</p>
	<p class="fadeInOut delay3">有意见</p>
</div>

<div class="content" id="content1">
	<div class="inner" style="height:80%">
		<div id="gesture-area" class="wrapper"></div><!--手势区域 gesture-area-->
		<canvas id="demoCanvas" width="418" height="586" style="width:100%; height:100%"></canvas><!--图片合成区 demoCanvas-->
	</div>
	<div class="inner" style="height:20%">
		<div class="button upimg">上传照片</div><!--换背景按钮 changebg-->
		<input type="file" name="photo" id="inputimg" class="button"><!--上传图片到画布按钮 inputimg-->
		<div id="changebg" class="button" style="opacity:1;">再测一次</div><!--换背景按钮 changebg-->
		<div id="upload" class="button">生成图片</div><!--上传已生成的图片至后台按钮 upload-->
		<div style="clear:both"></div>
		<a href="http://xyt.xy-tang.com/2015n/hejunObj/xyt/?from=groupmessage&isappinstalled=0">
			<div style="width:100%; text-align:center; font-family:'微软雅黑'; font-size:20px; margin-top:20px; color:#000;">信玉堂</div>
			<div style="width:100%; text-align:center; font-family:'微软雅黑'; font-size:20px; color:#000;">技术支持</div>
		</a>
	</div>
</div>

<div class="content" id="content2">
	<div class="close" id="close"><p>继续</p><p>生成</p></div>
	<div class="inner" style=" background:rgba(0,0,0,0.8)">
		<div class="bgbg"></div>
		<div class="imgwrapper"><img id="show" src="" width="100%"></div>
		<div style="width:100%; text-align:center; font-family:'微软雅黑'; font-size:30px; margin-top:20px; color:#fff; font-size:30px;">赶快分享啦</div>
		<div style="width:100%; text-align:center; font-family:'微软雅黑'; font-size:30px; margin-top:20px; color:#fff;  font-size:30px;">小伙伴们一起玩</div>
	</div>
</div>

<script src="js/interact.min.js"></script>
<script src="js/zepto.min.js"></script>
<script src="js/easeljs-0.8.2.min.js"></script>
<script src="js/jscan.min.js"></script>
<script>
	window.onload=function(){
		document.getElementById('loading').style.display='none';
		document.getElementById('content1').style.display='block';
		<!-- sharethis(); -->
   }
</script>
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
			title: '专属钞票', // 分享标题
			link: 'http://szxytang.com/yin/shangchuan/mry/index.php', // 分享链接
			imgUrl: 'http://szxytang.com/yin/shangchuan/mry/share.jpg', // 分享图标
			success: function () { 
				// 用户确认分享后执行的回调函数
				//window.location.href = 'http://www.baidu.com';
			},
			cancel: function () { 
				// 用户取消分享后执行的回调函数
			}
		});						
		wx.onMenuShareAppMessage({
			title:  '专属钞票',
			desc:   '专属钞票',
			link: 'http://szxytang.com/yin/shangchuan/mry/index.php', // 分享链接
			imgUrl: 'http://szxytang.com/yin/shangchuan/mry/share.jpg', // 分享图标
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
</body>
</html>