<?php
//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
$ff = $_GET['m'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>太湖心生活，为你写诗！</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="static/css/mobi.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
    <script src="static/js/jquery-1.8.2.min.js"></script>
    <script src="static/js/wScratchPad.js"></script>
	<meta http-equiv="Cache-Control" content="max-age=0" />
	<meta name="apple-touch-fullscreen" content="yes" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">	
</head>
<style>
body{
	padding: 0;
	margin:0;
}
.box{
    	width: 100%;
    	/*height: 100%;*/
        background: white;
        margin: 0px;
        padding: 0px;
		position: absolute;
		top:0px;
		left:0px;
		overflow: hidden;
	}
#msg{
	width:58%;
	height: 42%;
	color: #784B22;
	font-weight: bold;
	font-size: 14px;
	position: absolute;
	top: 17%;
	left: 7%;
	z-index: 9999;
	background-color:transparent;
	border: 0px solid red;
	line-height: 195%;
}
#anniu{
	position: absolute;
	top: 66%;
	left: 26%;
	width: 20%;
	height: 7%;
	z-index: 9999;
	opacity: 0;
}
</style>
<body>
<div class="box">
<a href="http://9e08a994a1bb.vxplo.cn/idea/yBR41EL"><p style="width:80%;position: absolute; top:95%;left:10%;z-index:2000; color:black;text-align:center;font-size:12px;">技术支持：信玉堂丨草帽互动</p></a>
	<img src="bg1.jpg" style="width:100%;">	
	<textarea id="msg" cols="30" rows="10" readonly="readonly"><?php echo $ff;?></textarea>
	<a href="index.php"><div id="anniu"></div></a>
</div>
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
			 //所有要调用的 API 都要加到这个列表中
						'onMenuShareAppMessage',
						'onMenuShareTimeline'
						]
		});
	  
	    wx.ready(function(){
	    //在这里调用 API

		// var mm =$("#msg").val();
		
			wx.onMenuShareTimeline({
				title: '太湖心生活，为你写诗！', // 分享标题
				link: '', // 分享链接
				imgUrl: 'http://szxytang.com/yin/yqh/yqh2/share.jpg', // 分享图标
				success: function () { 
					// 用户确认分享后执行的回调函数
					//window.location.href = 'http://www.baidu.com';
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
			  title:  '太湖心生活，为你写诗！',
			  desc:   '写诗领周杰伦门票！',
			  link:   '',
			  imgUrl: 'http://szxytang.com/yin/yqh/yqh2/share.jpg',
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
