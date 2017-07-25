<?php
	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
	
?>

<!DOCTYPE html>
<html>
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no height=device-height" />
	<title>钓龙虾赢门票！</title>
	<link type="text/css" href="style/index.css" rel="stylesheet" />
	<link type="text/css" href="style/common.css" rel="stylesheet" />
	<script type="text/javascript" src="script/zepto.min.js"></script>
	<script src="script/common.js"></script>
	<link rel="stylesheet" type="text/css" href="style/game9g.css">
	<script src="script/game9g.js"></script>
	<script src="jquery-1.8.2.min.js"></script>
	
	
</head>
<script>
window.onload = function(){
	alert("本次活动已圆满结束，感谢您的参与！");
	window.location.href="http://xyt.xy-tang.com/zyx/youxi/longxia/sel.php";
	return false;
}
</script>
<body class="body">

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

		
		
			wx.onMenuShareTimeline({
				title: '钓龙虾赢门票！', // 分享标题
				link: 'http://xyt.xy-tang.com/zyx/youxi/longxia/', // 分享链接
				imgUrl: 'http://xyt.xy-tang.com/zyx/youxi/longxia/share.jpg', // 分享图标
				success: function () { 

				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
			  title:  '钓龙虾赢门票！',
			  desc:   '哟哟，切克闹，免费龙虾要不要',
			  link: 'http://xyt.xy-tang.com/zyx/youxi/longxia/', // 分享链接
			  imgUrl: 'http://xyt.xy-tang.com/zyx/youxi/longxia/share.jpg', // 分享图标
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
		  alert(res.errMsg);
		});
	
	</script>
<!--结束-->


  





