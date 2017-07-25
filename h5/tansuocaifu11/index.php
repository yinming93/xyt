<?php
    //载入jssdk类
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>17“趣”high吧——杭州龙湖2017年中拓展预通知</title>
<meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="full-screen" content="true">
<meta name="screen-orientation" content="portrait">
<meta name="x5-fullscreen" content="true">
<meta name="360-fullscreen" content="true">
<style>
        html, body {
            -ms-touch-action: none;
            background: #000000;
            padding: 0;
            border: 0;
            margin: 0;
            height: 100%;
        }

    </style>
<script>
    function sy(){
      var play= document.getElementById('audio');   
      play.play();
    };
    </script>
<script egret="lib" src="libs/modules/egret/egret.min.js"></script>
<script egret="lib" src="libs/modules/egret/egret.web.min.js"></script>
<script egret="lib" src="libs/modules/game/game.min.js"></script>
<script egret="lib" src="libs/modules/game/game.web.min.js"></script>
<script egret="lib" src="libs/modules/res/res.min.js"></script>
<script egret="lib" src="libs/modules/tween/tween.min.js"></script>
<script egret="lib" src="libs/modules/dragonBones/dragonBones.min.js"></script>
<script src="main.min.js?v=7"></script>
</head>
<body>
<div style="margin: auto;width: 100%;height: 100%;" class="egret-player" data-entry-class="Main" data-orientation="portrait" data-scale-mode="exactFit" data-frame-rate="30" data-content-width="640" data-content-height="1136" data-show-paint-rect="false" data-multi-fingered="2" data-show-fps="false" data-show-log="false" data-show-fps-style="x:0,y:0,size:12,textColor:0xffffff,bgAlpha:0.9">
</div>
<audio preload="preload"  id="audio" src="sr.mp3" loop></audio>
<script>
        egret.runEgret({renderMode:"webgl", audioType:0});
    </script>
<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="resource/js/share.js?ver=3"></script>
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
         title: '17“趣”high吧——杭州龙湖2017年中拓展预通知',
          desc: '7月24日，出去浪',
          link: 'http://szxytang.com/yin/za/tansuocaifu11',
          imgUrl: 'http://szxytang.com/yin/za/tansuocaifu11/share.jpg'}
          wx.onMenuShareTimeline(shareinfo);
     wx.onMenuShareAppMessage(shareinfo);
      });
</script>
<!--百度统计代码-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?d949d76d44a0717b8fa4a2dd7cbe2461";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
