<?php
	 require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalabel=no" />
	<title>【和昌阅读季】测测你隐藏的书控指数？</title>
</head>
<style>
body{
	padding:0;
	margin:0;
	background: red;
}
div{
	width: 100%;
	height: 100%;
	background: red;
}
label{
	width: 40%;
	height: 8%;
	background: yellow;
	display: block;
	margin-left: 30%;
	opacity: 0;
}
.tt{
	width: 100%;
	overflow:hidden;
	position: absolute;
	top: 0;
	left: 0;
}
.zbdr{
-webkit-animation:fadeInLeft 2s .2s ease both;
-moz-animation:fadeInLeft 2s .2s ease both;}
@-webkit-keyframes fadeInLeft{
0%{opacity:0;
-webkit-transform:translateX(-20px)}
100%{opacity:1;
-webkit-transform:translateX(0)}
}
@-moz-keyframes fadeInLeft{
0%{opacity:0;
-moz-transform:translateX(-20px)}
100%{opacity:1;
-moz-transform:translateX(0)}
}
.ybdr{
-webkit-animation:fadeInLeft 2s 1s ease both;
-moz-animation:fadeInLeft 2s 1s ease both;}
@-webkit-keyframes fadeInLeft{
0%{opacity:0;
-webkit-transform:translateX(-20px)}
100%{opacity:1;
-webkit-transform:translateX(0)}
}
@-moz-keyframes fadeInLeft{
0%{opacity:0;
-moz-transform:translateX(-20px)}
100%{opacity:1;
-moz-transform:translateX(0)}
}
.tq{
-webkit-animation:flash 6s infinite ease both;
-moz-animation:flash 6s infinite ease both;}
@-webkit-keyframes flash{
0%,50%,100%{opacity: 1;}
25%,75%{opacity: 0;}
}
@-moz-keyframes flash{
0%,50%,100%{opacity: 1;}
25%,75%{opacity: 0;}
}
</style>
<script>
function sy(){
	var play= document.getElementById('audio');		
	play.play();
}
 </script>
<body>
<img id="one" src="img/1.jpg" alt="" style="position: absolute;top:0;left:0;width:100%;height:100%;z-index:110;" onclick="xs()">
<img id="o1" class="zbdr" src="img/1-1.png" alt="" style="position:absolute;top:0;left:0;width:100%;z-index:111;" onclick="xs()">
<img id="o2" class="ybdr" src="img/1-2.png" alt="" style="position:absolute;top:0;left:0;width:100%;z-index:111;" onclick="xs()">
<img id="o3" class="" src="img/1-3.png" alt="" style="position:absolute;top:0;left:0;width:100%;z-index:111;" onclick="xs()">

<img id="two" src="img/2.jpg" alt="" style="position: absolute;top:0;left:0;width:100%;height:100%;z-index:108;" onclick="xs2()">
<div class="tt" style="background:url('img/3.jpg') no-repeat;background-size:100%;z-index:100;">
	<label style="margin-top:47%;"><input type="radio" name="o1" q='0'></label>
	<label style="margin-top:2%;"><input type="radio" name="o1" q='0'></label>
	<label style="margin-top:2.8%;"><input type="radio" name="o1" q='1'></label>
	<label style="margin-top:3.5%;"><input type="radio" name="o1" q='0'></label>
</div>
<div class="tt" style="background:url('img/4.jpg') no-repeat;background-size:100%;z-index:98;">
	<label style="margin-top:47%;"><input type="radio" name="o2" q='0'></label>
	<label style="margin-top:2%;"><input type="radio" name="o2" q='0'></label>
	<label style="margin-top:2.8%;"><input type="radio" name="o2" q='1'></label>
	<label style="margin-top:3.5%;"><input type="radio" name="o2" q='0'></label>
</div>
<div class="tt" style="background:url('img/5.jpg') no-repeat;background-size:100%;z-index:96;">
	<label style="margin-top:47%;"><input type="radio" name="o3" q='1'></label>
	<label style="margin-top:2%;"><input type="radio" name="o3" q='0'></label>
	<label style="margin-top:2.8%;"><input type="radio" name="o3" q='0'></label>
	<label style="margin-top:3.5%;"><input type="radio" name="o3" q='0'></label>
</div>
<div class="tt" style="background:url('img/6.jpg') no-repeat;background-size:100%;z-index:94;">
	<label style="margin-top:47%;"><input type="radio" name="o4" q='0'></label>
	<label style="margin-top:2%;"><input type="radio" name="o4" q='0'></label>
	<label style="margin-top:2.8%;"><input type="radio" name="o4" q='1'></label>
	<label style="margin-top:3.5%;"><input type="radio" name="o4" q='0'></label>
</div>
<div class="tt" style="background:url('img/7.jpg') no-repeat;background-size:100%;z-index:92;">
	<label style="margin-top:47%;"><input type="radio" name="o5" q='0'></label>
	<label style="margin-top:2%;"><input type="radio" name="o5" q='0'></label>
	<label style="margin-top:2.8%;"><input type="radio" name="o5" q='1'></label>
	<label style="margin-top:3.5%;"><input type="radio" name="o5" q='0'></label>
</div>
<div class="tt" style="background:url('img/8.jpg') no-repeat;background-size:100%;z-index:90;">
	<label style="margin-top:47%;"><input type="radio" name="o6" q='0'></label>
	<label style="margin-top:2%;"><input type="radio" name="o6" q='0'></label>
	<label style="margin-top:2.8%;"><input type="radio" name="o6" q='1'></label>
	<label style="margin-top:3.5%;"><input type="radio" name="o6" q='0'></label>
</div>
<div class="tt" style="background:url('img/9.jpg') no-repeat;background-size:100%;z-index:88;">
	<label style="margin-top:47%;"><input type="radio" name="o7" q='0'></label>
	<label style="margin-top:2%;"><input type="radio" name="o7" q='1'></label>
	<label style="margin-top:2.8%;"><input type="radio" name="o7" q='0'></label>
	<label style="margin-top:3.5%;"><input type="radio" name="o7" q='0'></label>
</div>
<div class="tt" style="background:url('img/10.jpg') no-repeat;background-size:100%;z-index:86;">
	<label style="margin-top:47%;"><input type="radio" name="o8" q='0'></label>
	<label style="margin-top:2%;"><input type="radio" name="o8" q='1'></label>
	<label style="margin-top:2.8%;"><input type="radio" name="o8" q='0'></label>
	<label style="margin-top:3.5%;"><input type="radio" name="o8" q='0'></label>
</div>
<div class="tt" style="background:url('img/11.jpg') no-repeat;background-size:100%;z-index:84;">
	<label style="margin-top:47%;"><input type="radio" name="o9" q='0'></label>
	<label style="margin-top:2%;"><input type="radio" name="o9" q='0'></label>
	<label style="margin-top:2.8%;"><input type="radio" name="o9" q='1'></label>
	<label style="margin-top:3.5%;"><input type="radio" name="o9" q='0'></label>
</div>

<img id="a" src="img/a.jpg" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:200;display:none;" onclick="tz()">
<img id="b" src="img/b.jpg" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:200;display:none;" onclick="tz()">
<img id="c" src="img/c.jpg" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:200;display:none;" onclick="tz()">
<audio preload="preload"  id="audio" src="sr.mp3" loop></audio>
</body>
</html>
<script src="http://2015image.bj.bcebos.com/js/jquery-1.11.1.min.js"></script> 
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
<script>
function xs () {
	document.getElementById('one').style.display='none';
	document.getElementById('o1').style.display='none';
	document.getElementById('o2').style.display='none';
	document.getElementById('o3').style.display='none';
}
function xs2 () {
	document.getElementById('two').style.display='none';
}
function tz () {
	window.location.href='index.php';
}
	var c = 0;
	var i = 0;
	$("input:radio").on('click',function(){
		 if ($(this).attr("q")==1){
	        c++;
	      }
	      i++;
		$(this).parent().parent().fadeOut(1000).next('.tt').fadeIn(200);
		if(i==9){
			if (c<=5){
				document.getElementById('a').style.display='block';
			}else if(c>5&&c<=7){
				document.getElementById('b').style.display='block';
			}else{
				document.getElementById('c').style.display='block';
			}
			wx.ready(function () {
			 var shareinfo={
				  title: '【和昌阅读季】我答对了'+c+'题，你能答对多少题？',
			      desc: '答不出这些题，对得起你啃过的书本吗？',
			      link: 'http://szxytang.com/yin/dati/1',
			      imgUrl: 'http://szxytang.com/yin/dati/1/share.jpg'
			  }
			      wx.onMenuShareTimeline(shareinfo);
			 wx.onMenuShareAppMessage(shareinfo);
			  });
					
				}
	})
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
		  title: '【和昌阅读季】测测你隐藏的书控指数？',
	      desc: '答不出这些题，对得起你啃过的书本吗？',
	      link: 'http://szxytang.com/yin/dati/1',
	      imgUrl: 'http://szxytang.com/yin/dati/1/share.jpg'
	  }
	      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
	  });
</script>