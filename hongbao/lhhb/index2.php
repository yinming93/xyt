<?php 
	header("Content-Type:text/html;charset=utf-8");
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>读口令，抢红包-缇香郦城 环球城上墅级洋房，即将首开！</title>
	<style>
body{
	margin:0;
	padding:0;
	/*overflow: hidden;*/
}
.box{
	position: absolute;
	left: 0;
	top: 0;
	width: 100%;
}
	</style>
<link rel="stylesheet" href="http://2015image.bj.bcebos.com/js/bootstrap.min.css">
<script src="http://2015image.bj.bcebos.com/js/jquery-1.11.1.min.js"></script>		
<script src="http://2015image.bj.bcebos.com/js/bootstrap.min.js"></script>
</head>
<body>
<div class="box">
	<img src="images/6.jpg" width="100%">
</div>
</body>
</html>
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
	 	// wx.hideOptionMenu();
		var shareinfo={
		 	 title: '读口令，抢红包-缇香郦城 环球城上墅级洋房，即将首开！',
		      desc: '读口令，抢红包-缇香郦城 环球城上墅级洋房，即将首开！',
		      link: '',
		      imgUrl: 'http://xyt.xy-tang.com/liu/lhhb//share.jpg'
		  }
      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>
<!--结束-->
