<?php
	//引入js类文件
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();

?><!doctype  html>
<html>
<head>
<title>2016，什么样的社区能够脱颖而出！</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="css/style.css" rel="stylesheet" />
	<link href="css/animate.css" rel="stylesheet" />
	<!-- 启用360浏览器的极速模式(webkit) -->
    <meta name="renderer" content="webkit">
    <!-- QQ应用模式 -->
    <meta name="x5-page-mode" content="app">
    <!-- QQ强制竖屏 -->
    <meta name="x5-orientation" content="portrait">
    <!-- windows phone 点击无高光 -->
    <meta name="msapplication-tap-highlight" content="no">
    <!--移动端版本兼容 -->
    <script type="text/javascript">
        var phoneWidth = parseInt(window.screen.width);
        var phoneScale = phoneWidth /640;
        var ua = navigator.userAgent;
        if(window.screen.height == 480) {
          //  document.write('<link href="css/style2.css" rel="stylesheet" />');
        }
        if(/Android (\d+\.\d+)/.test(ua)) {
            var version = parseFloat(RegExp.$1);
            if(version > 2.3) {
                document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi">');
            } else {
                document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
            }
        } else {
            document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
        }
    </script>
    <!--移动端版本兼容 end -->
    <title></title>
    <script src="js/jquery.min.js"></script>
	<script src="lib/CSSPlugin.js"></script>
	 <script src="lib/tweenjs-0.6.2.min.js"></script>
	<script src="lib/easeljs-0.8.1.min.js"></script>
	<script src="lib/preloadjs-0.6.1.min.js"></script>
	<script src="js/home.js"></script>
<!--	
<script src="js/jweixin-1.0.0.js"></script>
    <script src="js/wechat.js"></script>
-->
<script>

var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "hm.js?67deb93b8bcc9da4f32375720d174598";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</head>
<body>
 <div class='page'>
	<canvas id="myCanvas" width="640" height="1008" ></canvas>
	<div class='home' style='display:none'>
		<a href='javascript:;'></a>
	</div>
	<div class='question' style='display:none'>
		<img src='images/question/kd.gif' class='kd'  width='100%' style='opacity:0.5'  />
		<div class='button' data-id='1'>
			<a href='javascript:;'></a>
			<a href='javascript:;'></a>
			<a href='javascript:;'></a>
			<a href='javascript:;'></a>
		</div>
	</div>
 </div>
<audio controls="controls" id='bomemusic1' style='display:none;opacity:0'>
  <source src="music/out.mp3" type="audio/mpeg" />
</audio>
<audio controls="controls" id='bomemusic2'  style='display:none;opacity:0'>
  <source src="music/btn.mp3" type="audio/mpeg" />
</audio>
<audio controls="controls" id='bgmusic' preload='load'  style='display:none;opacity:0'>
  <source src="music/bg.mp3" type="audio/mpeg" />
</audio>
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
		var shareinfo={
		      title: '2016，什么样的社区能够脱颖而出！',
		      desc: '阳光100凤凰社，有梦想，不一般！',
		      link: 'http://szxytang.com/yin/fanye/gangben2/',
		      imgUrl: 'http://szxytang.com/yin/fanye/gangben2/share.jpg'
		  }
        wx.onMenuShareTimeline(shareinfo);
	    wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>
<!--结束-->



















































