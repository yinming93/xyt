<?php
	//引入js类文件
	 require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>世界，重归蘇洲府</title>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes">
<style>
body{
	margin: 0;
	padding:0;
	background-color:#000;
}
</style>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>	
</head>
<body onload="cnm()">
<div class="box">
	<!-- <img id="cnm" src="1.jpg" style="width:100%;height:100%;z-index:9999;"onclick="cnm()";> -->
	<video class="vidio" id="vidio" src="http://17yin.gz.bcebos.com/2.mp4" style="width:100%;" webkit-playsinline playsinline x-webkit-airplay="true" x5-video-player-type="h5" x5-video-player-fullscreen="true">
	您的浏览器不支持 video 标签。
	</video>
</div>	
</body>	
</html>
<script>
function cnm(){
video2=document.getElementById("vidio");
video2.play();	
// document.getElementById('cnm').style.display:none;
}	
</script>
<!--开始-->
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
		      // 所有要调用的 API 都要加到这个列表中
		    ]
		  });
		 wx.ready(function () {
		var shareinfo={
		 	 title: '世界，重归蘇洲府',
		      desc: '一个繁华的循环',
		      link: 'http://szxytang.com/yin/video/1/index2.php',
		      imgUrl: 'http://szxytang.com/yin/video/1/share.jpg'
		  }
      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>
<!--结束-->