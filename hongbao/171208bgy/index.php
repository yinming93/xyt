<?php
	header("Content-type: text/html; charset=utf-8");
	define('APPID','wx461b5105da7629f1'); 
	define('APPSECRET','d80e5eb9158f81ed612f7b6810fb9093'); 

	//OAuth2.0 接口获取数据
    if( !isset($_GET['code']) ){
		echo '操作失败！';
		header('Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://xytang88.com/test/171208bgy/index.php&response_type=code&scope=snsapi_base&state=1#wechat_redirect');
		exit;
    }
	
	define('CODE', $_GET['code']);
	include 'func.php';//公共函数
	
//1获页面授权的ACCESS_TOKEN 、 refresh_token、openid、 scope的类型
	$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".CODE."&grant_type=authorization_code";
	$json_access_token = https_request($url);
	$arr_access_token  = json_decode($json_access_token, true); //获取access_token
	
	
//2	
/*
	$url  = "https://api.weixin.qq.com/sns/userinfo?access_token=". $arr_access_token['access_token'] ."&openid=".$arr_access_token['openid'] ."&lang=zh_CN";
    $json = https_request($url);
    $userinfo_arr = json_decode($json, true); 
*/
//判断openid是否获取到	
	$openid=$arr_access_token['openid'];
	if(!$openid){
		header('Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://xytang88.com/test/171208bgy/index.php&response_type=code&scope=snsapi_base&state=1#wechat_redirect');
		exit;
	}


?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>碧桂园·金山星作</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta http-equiv="Cache-Control" content="max-age=0" />
	<meta name="apple-touch-fullscreen" content="yes" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<style>
*{
	margin: 0px;
	padding: 0px;
	/*font-family: "微软雅黑";*/
	font-family:Helvetica;

}

#show{
	position:absolute;
	width: 100%;
	height:100%;
	top:0;
	left:0;
	z-index: 1;
	
	display: none;
}

#sorry{
	position:absolute;
	width: 100%;
	height:100%;
	top:0;
	left:0;
	z-index: 1;
	display: none;
}

#sum{
	position:absolute;
	width: 140px;
	height:40px;
	top:56%;
	left:50%;
	
	z-index: 2;
	color: #e3dada;
	/*border: 1px solid black;*/
	margin-left:-70px;
	text-align:center;
	line-height:40px;
	font-size:26px;
	font-weight: 900;
	display: none;
}

.f_left{
	position:absolute;
	width: 50%;
	top:0%;
	left:0%;
	z-index: 99;
}

.f_right{
	position:absolute;
	width: 50%;
	top:0%;
	right:0%;
	z-index: 99;
}



.kai{
	position:absolute;
	width: 100%;
	top:56%;
	left:0%;
	z-index: 999;
}

.animation{-webkit-animation:pulse 1s .2s infinite both;-moz-animation:pulse 1s .2s infinite both;}@-webkit-keyframes pulse{0%{-webkit-transform:scale(1)}50%{-webkit-transform:scale(1.1)}100%{-webkit-transform:scale(1)}}@-moz-keyframes pulse{0%{-moz-transform:scale(1)}50%{-moz-transform:scale(1.1)}100%{-moz-transform:scale(1)}}		

</style>

</head>
<body>	

<!--开-->
<img src="img/kai.png" class="kai animation" />

<img src="img/1_01.jpg" class="f_left" />
<img src="img/1_02.jpg" class="f_right" />

<!--显示红包-->
<img id="show" src="img/bgyok.jpg" />
<div id="sum">xx元</div>

<!--显示红包飞走-->
<img id="sorry" src="img/bgyno.jpg" />
		

	
</body>		
</html>

<?php
	require_once "jssdk.php";
    $jssdk = new Jssdk( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();	
?>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
	wx.config({
		debug: false,
		appId:    '<?php echo $signPackage["appId"]?>',
		timestamp:'<?php echo $signPackage["timestamp"]?>',
		nonceStr: '<?php echo $signPackage["nonceStr"]?>',
		signature:'<?php echo $signPackage["signature"]?>',
		jsApiList:[
			"onMenuShareTimeline",
			"onMenuShareAppMessage"
		]
	})
		
	wx.ready(function(){
		wx.hideOptionMenu()
		
		$(".kai").click(function(){
			
			$(".kai").css('display','none')
			
			//执行发红包程序
			var openid = "<?php echo $openid ?>"
			//alert(openid)
			var data = "&openid="+openid
			$.post("get.php",data,function(res){
				//alert(res)
				var obj = JSON.parse(res)
				
				if(obj.msg=="sorry"){
					//alert("红包已抢光")
					$("#sorry").css('display','block') 
					$(".f_left,.f_right").css('display','none')
					
					
				}else if(obj.msg=="error"){
					alert("系统繁忙，请稍后再试！")
				}else{
					//alert("恭喜您抢到 "+obj.sum+" 元红包！请到微信服务通知中查收！")
					$("#show").css('display','block') 
					$("#sum").css('display','block')
					$("#sum").text(obj.sum+"元")
					
					$(".f_left,.f_right").css('display','none')
				}
				
			})
			
			
		})
		
		
		
		/*
		function stopScrolling( touchEvent ){
			touchEvent.preventDefault()
		}
		document.addEventListener( 'touchstart' , stopScrolling , false )
		document.addEventListener( 'touchmove' , stopScrolling , false )
		*/
	})
</script>

	