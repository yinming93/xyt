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
    <script>
// 微信视频Hack方案
;void function (win, doc, undefined) {
    // 原理：调用链中的某个事件被标识为用户事件而非系统事件
    // 进而导致浏览器以为是用户触发播放而允许播放
    HTMLVideoElement.prototype._play = HTMLVideoElement.prototype.play;
    function wxPlayVideo(video) {
        /// <summary>
        /// 微信播放Hack
        /// </summary>
        /// <param name="video" type="HTMLVideoElement">视频标签对象</param>

        WeixinJSBridge.invoke('getNetworkType', {}, function (e) {
            video._play();
        });
    }

    function play() {
        var self = this;

        self._play();

        var evtFns = [];

        try {
            wxPlayVideo(self);
            return;
        } catch (ex) {
            evtFns.push("WeixinJSBridgeReady", function evt() {
                wxPlayVideo(self);
                for (var i = 0; i < evtFns.length; i += 2) document.removeEventListener(evtFns[i], evtFns[i + 1], false);
            });
            document.addEventListener("WeixinJSBridgeReady", evtFns[evtFns.length - 1], false);
        }
    }

    HTMLVideoElement.prototype.play = play;
}(window, document);
</script>
</head>
<body onload="testPlay()">
<a href="http://9e08a994a1bb.vxplo.cn/idea/yBR41EL"><p style="width:30%;position: absolute; top:94%;left:35%;z-index:2000; color:;text-align:center;color:white;font-size:12px;">技术支持 | 信玉堂</p></a>
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
	test_video=document.getElementById("test_video");
	test_video.play();
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
	test_video=document.getElementById("test_video");
	test_video.style.width = screen.width + "px";
	test_video.style.height = screen.height + "px";
</script>        
<script type = "text/javascript">
function testPlay(){
	test_video=document.getElementById("test_video");
	test_video.play();
}
window.onresize=function(){
	//alert("haha");
	test_video.style.width = screen.width;
	test_video.style.height = screen.height;
}
</script>