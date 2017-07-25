<?php
	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>太湖上景花园·微楼书</title>
<link rel="stylesheet" type="text/css" href="style/page.css"/>
<script type="text/javascript" src="script/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="script/js.js"></script>
<script type="text/javascript" src="script/main.js"></script>
</head>
<style>
#d9{
-webkit-animation:bounceIn 15s 3s ease both;
-moz-animation:bounceIn 15s 3s ease both;}
@-webkit-keyframes bounceIn{
0%{opacity:0;
-webkit-transform:scale(1)}
50%{opacity:1;
-webkit-transform:scale(1)}
70%{-webkit-transform:scale(1.2)}
100%{-webkit-transform:scale(1.2)}
}
@-moz-keyframes bounceIn{
0%{opacity:0;
-moz-transform:scale(1)}
50%{opacity:1;
-moz-transform:scale(1)}
70%{-moz-transform:scale(1.2)}
100%{-moz-transform:scale(1.2)}
}
</style>
<body bgcolor="#000000">
<div class="warp">
<img src="images/d1.jpg" alt="">
<img id="d1" style="position:absolute;top:42%;left:0;width:100%;display:none;" src="images/d2.jpg" alt="">
<img id="d2" style="position:absolute;top:30%;left:20%;width:60%;display:none;" src="images/d3.jpg" alt="">
<img id="d4" style="position:absolute;top:64%;left:40%;width:60%;display:none;" src="images/d2.jpg" alt="">
<img id="d3" style="position:absolute;top:0%;left:0;width:100%;display:none;" src="images/d4.jpg" alt="" onclick="tiao()">
<img id="d9" style="position:absolute;top:0%;left:0;width:100%;display:none;" src="images/d4.jpg" alt="" onclick="tiao()">

<img id="d5" style="position:absolute;top:0%;left:0;width:100%;display:none;" src="images/d43.png" alt="" onclick="xs3()">
<img id="d6" style="position:absolute;top:0%;left:0;width:100%;display:none;" src="images/d42.png" alt="" onclick="xs2()">
<img id="d7" style="position:absolute;top:0%;left:0;width:100%;display:none;" src="images/d41.png" alt="" onclick="xs()">
<img id="d8" style="position:absolute;top:20%;left:0;width:100%;display:none;" src="images/dd5.png" alt="" onclick="tiao()">

</div>


</body>
</html>
<script type="text/javascript"> 
function xs(){
	$("#d7").fadeOut(2000);
	
}
function xs2(){
	$("#d6").fadeOut(2000);
}
function xs3(){
	$("#d5").fadeOut(2000);
	$("#d8").fadeIn(3000);
}
function tiao(){ 
    window.location.href="index1.php";
}

function dh(){ 
    // $("#ddd").css("opacity",1);
    $("#d1").fadeOut(3000);
}
function dh1(){ 
    // $("#ddd").css("opacity",1);
    $("#d1").fadeIn(3000);
}
function dh2(){ 
    // $("#ddd").css("opacity",1);
    $("#d2").fadeIn(3000);
}
function dh4(){ 
    // $("#ddd").css("opacity",1);
    $("#d4").fadeIn(3000);
}
function dh3(){ 
    // $("#ddd").css("opacity",1);
    $("#d3").fadeIn(3000);
}
function dh9(){ 
    // $("#ddd").css("opacity",1);
    $("#d9").fadeIn(3000);
}
function dh5(){ 
    // $("#ddd").css("opacity",1);
    $("#d5").fadeIn(3000);
}
function dh6(){ 
    // $("#ddd").css("opacity",1);
    $("#d6").fadeIn(3000);
}
function dh7(){ 
    // $("#ddd").css("opacity",1);
    $("#d7").fadeIn(3000);
}

function tz(){ 
    window.location.href="index1.php";
}
setTimeout(dh1,1000); 
setTimeout(dh,4000); 
setTimeout(dh2,7000); 
setTimeout(dh4,7000); 
setTimeout(dh3,11000);
setTimeout(dh9,11000);
setTimeout(dh5,11000);
setTimeout(dh6,11000);
setTimeout(dh7,11000);

setTimeout(xs,14000);
setTimeout(xs2,16000);
setTimeout(xs3,18000);
setTimeout(tz,26000); 

</script>

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
			 //所有要调用的 API 都要加到这个列表中
						'onMenuShareAppMessage',
						'onMenuShareTimeline'
						]
		});
	  
	    wx.ready(function(){
	    //在这里调用 API

		
		
			wx.onMenuShareTimeline({
				title: '太湖上景花园·微楼书', // 分享标题
				link: 'http://szxytang.com/yin/wls/hljz', // 分享链接
				imgUrl: 'http://szxytang.com/yin/wls/hljz/share.jpg', // 分享图标
				success: function () { 
					// 用户确认分享后执行的回调函数
					//window.location.href = 'http://www.baidu.com';
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
			  title:  '太湖上景花园·微楼书',
			  desc:   '',
			  link:   'http://szxytang.com/yin/wls/hljz',
			  imgUrl: 'http://szxytang.com/yin/wls/hljz/share.jpg',
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
		  // alert(res.errMsg);
		});
	
	</script>
<!--结束-->