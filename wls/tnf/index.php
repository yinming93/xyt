<?php
	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
	
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>苏州唐宁府</title>
  <link rel="stylesheet" type="text/css" href="./idangerous.swiper.css"/>
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<meta name="apple-touch-fullscreen" content="yes" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no">
<script type="text/javascript" src="js/swipe.js"></script>
<script type="text/javascript" src="js/zepto.js"></script>
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/mobi.css" media="all" />
  <style>
  *{
  	margin: 0;
  	padding: 0;
  }
/* Demo Styles */
body {
	width: 100%;
	height: 100%;
  background-color: #1C2127;
}
html{
	height: 100%;
	overflow: hidden;
}
.maichong{
-webkit-animation:pulse 4s .2s ease both;
-moz-animation:pulse 4s .2s ease both;}
@-webkit-keyframes pulse{
0%{-webkit-transform:scale(1)}
50%{-webkit-transform:scale(1.1)}
100%{-webkit-transform:scale(1)}
}
@-moz-keyframes pulse{
0%{-moz-transform:scale(1)}
50%{-moz-transform:scale(1.1)}
100%{-moz-transform:scale(1)}
}
  </style>
</head>
<script>
    function sy(){
      var play= document.getElementById('audio');   
      play.play();

    };
    </script>
<body onload="sy()">
<audio preload="preload"  id="car_audio" src="sr1.mp3" loop></audio>
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

<img class="" style="width:100%;height:100%" src="1.jpg" alt="">
<img class="" style="width:100%;position:absolute;top:-31%;" src="1-1.png" alt="">
<a href="http://szxytang.com/yin/wls/tnf/1/"><div style="width:60px;height:60px;background:;position:absolute;top:57%;left:4%;"></div></a>
<a href="http://szxytang.com/yin/wls/tnf/2/"><div style="width:60px;height:60px;background:;position:absolute;top:57%;left:23%;"></div></a>
<a href="http://szxytang.com/yin/wls/tnf/3/"><div style="width:60px;height:60px;background:;position:absolute;top:57%;left:42%;"></div></a>
<a href="http://szxytang.com/yin/wls/tnf/4/"><div style="width:60px;height:60px;background:;position:absolute;top:57%;left:61%;"></div></a>
<a href="http://szxytang.com/yin/wls/tnf/5/"><div style="width:60px;height:60px;background:;position:absolute;top:57%;left:80%;"></div></a>

<aside class="base-nav" style="z-index:999">
<div class="plug-phone">
<!-- <div class="plug-menu"><span class="close"></span></div> -->
<!-- <div class="plug-btn plug-btn1 close"><a href="http://szxytang.com/yin/wls/tnf"><span>首页</span></a></div>
<div class="plug-btn plug-btn2 close"><a href="http://szxytang.com/yin/wls/tnf/3"><span>全球奢装</span></a></div> -->
<div class="plug-btn plug-btn3 close"><a href="tel:65868888"><span>电话</span></a></div>
<!-- <div class="plug-btn plug-btn4 close"><a href="http://api.map.baidu.com/marker?location=31.567677,120.352039&title=无锡利华广场&name=无锡利华广场&content=金城东路与锡甘路交汇处西&output=html&zoom=10&src=sft|sft"><span>一键导航</span></a></div> -->
<!-- <div class="plug-btn plug-btn4 close"><a href="http://3gimg.qq.com/lightmap/v1/wxmarker/index.html?marker=coord:31.312783311971295,120.75706779956818;title:%E8%8B%8F%E5%B7%9E%E5%94%90%E5%AE%81%E5%BA%9C;addr:%E8%8B%8F%E5%B7%9E%E5%94%90%E5%AE%81%E5%BA%9C&referer=wexinmp_profile"><span>一键导航</span></a></div> -->
</div>
</aside>
<script src="js/1.0.js"></script>
<script src="js/gmu.js"></script>
<script src="js/mod.js"></script>
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
            'onMenuShareAppMessage',
            'onMenuShareTimeline'
            ]
    });
      wx.ready(function(){
      wx.onMenuShareTimeline({
        title: '苏州唐宁府', // 分享标题
        link: 'http://szxytang.com/yin/wls/tnf/', // 分享链接
        imgUrl: 'http://szxytang.com/yin/wls/tnf/share.jpg', // 分享图标
        success: function () { 
        },
        cancel: function () { 
        }
      });  
      wx.onMenuShareAppMessage({
        title:  '苏州唐宁府',
        desc:   '苏州唐宁府',
        link:   'http://szxytang.com/yin/wls/tnf/',
        imgUrl: 'http://szxytang.com/yin/wls/tnf/share.jpg',
        trigger: function (res) {
        },
        success: function (res) {
        },
        cancel: function (res) {
        },
        fail: function (res) {
        }
      });
    
      });
    wx.error(function(res){
    });
  </script>
<!--结束-->