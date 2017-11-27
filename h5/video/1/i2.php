<?php
	//引入js类文件
	 require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();

?>
<!DOCTYPE html><html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="author" content="monicaqin">
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <title>世界，重归蘇洲府</title>
    <style>
    body{
    	margin:0;
		padding:0;
		background-color:#000;
    }
		
    </style>
<script type="text/javascript" src="js/v.js"></script>	
</head>
<body>
<div>
<video id="test_video" src="http://liu0001.gz.bcebos.com/2.mp4" height='100%' webkit-playsinline playsinline  x5-video-player-type="h5" x5-video-player-fullscreen="true" autoplay></video>
</div>

</body>
</html>
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
		 	var test_video=document.getElementById("test_video");
				if (typeof WeixinJSBridge == "undefined") {
        var i = 0;
        if (document.addEventListener) {
            document.addEventListener("WeixinJSBridgeReady", function func() {
                if (typeof isAddPlayerOk !== 'undefined' && isAddPlayerOk === true) {
                    i = null;
                    test_video.play();
                } else {
                    if (i++ < 10) {
                        setTimeout(func, 100);
                    }
                }
            }, false);
        }
    }
		var shareinfo={
		 	 title: '世界，重归蘇洲府',
		      desc: '一个繁华的循环',
		      link: 'http://szxytang.com/yin/video/1/index.php',
		      imgUrl: 'http://szxytang.com/yin/video/1/share.jpg'
		  }
      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>
<!--结束-->

<script type = "text/javascript">
	var test_video=document.getElementById("test_video");
	test_video.style.width = screen.width + "px";
	test_video.style.height = screen.height + "px";
	// test_video.play();



window.onresize=function(){
	test_video.style.width = screen.width;
	test_video.style.height = screen.height;
}
</script>