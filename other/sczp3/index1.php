<?php
	//载入jssdk类
	include 'db.php';
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
	
	$id=$_GET['id'];
	$sqlsel="select * from $tbname where id='".$id."'";
	$querysel=mysql_query($sqlsel);
	$row=mysql_fetch_assoc($querysel);
	if($row){
		$src = $row['filename'];
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui" />
	<title>我的精彩时刻</title>
</head>
<style>
	body{
			background:url(bg1.jpg) no-repeat;
			background-size:100% auto;
		}
	img{
		width: 60%;
		position: absolute;
		top: 30%;
		left: 20%;
	}
	#but{
		width: 99%;
		height: 40px;
		background-color: #0494D2;
		border: none;
		font-size: 20px;
		color: white;
		text-align: center;
		margin-top: 130%;
	}
</style>
<body>
<img src="<?php echo $src; ?>" alt="">
<a href="http://szxytang.com/yin/za/sczp3/getcodeurl.php"><input type="buttom" id="but" value="我也要生成精彩时刻"></a>
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
		    ]
		  });
		 wx.ready(function () {
		var shareinfo={
		 	 title: '我的精彩时刻等你来喝彩',
		      desc: '一起晒出你的精彩时刻吧',
		      link: '',
		      imgUrl: 'http://szxytang.com/yin/za/sczp3/share.jpg'}
		      wx.onMenuShareTimeline(shareinfo);
		 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>