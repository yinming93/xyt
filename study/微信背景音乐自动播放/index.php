<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>微信ios自动播放</title>
    <meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no,target-densitydpi=device-dpi"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="full-screen" content="true"/>
    <meta name="screen-orientation" content="portrait"/>
    <meta name="x5-fullscreen" content="true"/>
    <meta name="360-fullscreen" content="true"/>
    <script>
		function sy(){
			var play= document.getElementById('audio');		
			play.play();
		};
    </script>
</head>
<body onload="sy()">

	<audio preload="preload"  id="audio" src="http://szxytang.com/yin/youxi/jinbi5/resource/assets/bgSound1.mp3" loop></audio>
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
