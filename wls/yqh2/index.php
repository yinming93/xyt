<?php
	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();	
?>
<!DOCTYPE html>
<html>
<head>
	<title>太湖心生活，为你写诗！</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
    <script src="jquery-1.8.3.min.js"></script>
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
#gzz{
	display: none;
	position: absolute;
	top: 0;
	left: 0;
	z-index: 999999;
}
</style>
<body>
<div class="box">
	<img src="bg.jpg" style="width:100%;">
	<img id="gzz" src="gz.jpg" style="width:100%;" onclick="xs()">
	<textarea id="msg" cols="30" rows="10"></textarea>
	<input type="button" id="anniu" value="" onclick="tz();">
	<div style="width:30%;height:10%;position:absolute;bottom:0;left:35%;" onclick="ccn()"></div>
</div>
</body>
</html>
<script>
	 function ccn(){
	 	document.getElementById('gzz').style.display='block';
	 	// alert('234');
	 }
	 function xs(){
	 	document.getElementById('gzz').style.display='none';
	 }
	  function tz(){
	 	alert('提交成功，赶紧分享到朋友圈吧！');
	 	var m =$("#msg").val();
	 	window.location="ghost.php?m="+m;
	 }
	</script>
<script src="jquery-1.8.3.min.js"></script>
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
		 	 title: '太湖心生活，为你写诗！',
		      desc: '写诗领周杰伦门票！',
		      link: 'http://szxytang.com/yin/yqh/yqh2',
		      imgUrl: 'http://szxytang.com/yin/yqh/yqh2/share.jpg'
		  }
		  // wx.hideOptionMenu();
      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
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