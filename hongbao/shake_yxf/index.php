<?php
	header("Content-type: text/html; charset=utf-8");
	define('APPID','wx461b5105da7629f1'); 
	define('APPSECRET','d80e5eb9158f81ed612f7b6810fb9093'); 

	//OAuth2.0 接口获取数据
    if( !isset($_GET['code']) ){
		echo '操作失败！';
		header('Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://xytang88.com/test/shake_yxf/index.php&response_type=code&scope=snsapi_base&state=1#wechat_redirect');
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
	
	//p($arr_access_token);
	//exit;
	
	if(!$openid){
		header('Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://xytang88.com/test/shake_yxf/index.php&response_type=code&scope=snsapi_base&state=1#wechat_redirect');
		exit;
	}
	
	
	
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
	<meta content="no-cache" http-equiv="Pragma"></meta>
	<meta content="no-cache" http-equiv="Cache-Control"></meta>
	<meta content="0" http-equiv="Expires"></meta>
	<title>摇一摇 红包</title>
	<link rel="stylesheet" href="css/shake.css">
	<link rel="stylesheet" href="css/myDialog.css">
	<!--<script src="js/jquery.min.js"></script>-->
	<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="js/howler.min.js"></script> 
	<script src="js/fastclick.js"></script> 
	<script src="js/myDialog.js"></script>
	<!--<script src="js/shake.js"></script>-->
	<script>
	//摇一摇部分
        var SHAKE_THRESHOLD = 1000
        var last_update = 0
        var last_time = 0
        var x
        var y
        var z
        var last_x
        var last_y
        var last_z
        var sound = new Howl({ urls: ['sound/shake_sound.mp3'] }).load()
        var findsound = new Howl({ urls: ['sound/shake_match.mp3'] }).load()
        var curTime;
        var isShakeble = true; 

        function init() {
            if (window.DeviceMotionEvent) {
                window.addEventListener('devicemotion', deviceMotionHandler, false)
            } else {
                $("#cantshake").show()
            }
        }

        function deviceMotionHandler(eventData) {
            curTime = new Date().getTime();
            var diffTime = curTime - last_update;
            if (diffTime > 100) {
                var acceleration = eventData.accelerationIncludingGravity;
                last_update = curTime
                x = acceleration.x
                y = acceleration.y
                z = acceleration.z
                var speed = Math.abs(x + y + z - last_x - last_y - last_z) / diffTime * 10000

                if (speed > SHAKE_THRESHOLD && curTime - last_time > 1100 && $("#loading").attr('class') == "loading" && isShakeble) {
                    shake()
                }
                last_x = x
                last_y = y
                last_z = z
            }
        }

        function shake() {
            last_time = curTime
            $("#loading").attr('class','loading loading-show')

			sound.play()
			
            $("#shakeup").animate({ top: "50%" }, 700, function () {
                $("#shakeup").animate({ top: "74%" }, 700, function () {
                    $("#loading").attr('class','loading')
                    
                   findsound.play()
				  // alert(123)
//---------------------------------------------------------------------------------- 
	/*
	setTimeout(function(){
		alert(123)
		//第一轮
	//window.location.href="http://menu.suzhouxyt.com/active/xinyutang?ename=hongbao_dhzg1606301";
		
	},1000)
	*/
/*
获取openid
是否领取过
是否还有
领取奖品




*/
	//执行发红包程序
	var openid = "<?php echo $openid ?>"
	//alert(openid)
	var data = "&openid="+openid
	$.post("ajax.php",data,function(res){
		//alert(res)
		var obj = JSON.parse(res)
		
		if(obj.msg=="sorry"){
			alert("红包已抢光")
		}else if(obj.msg=="error"){
			//alert("系统繁忙，请稍后再试！")
			alert("红包已抢光")
		}else{
			alert("恭喜您抢到 "+obj.sum+" 元红包！请查收！")
		}
		
	})

//----------------------------------------------------------------------------------
			   
				   
                })
            })
			
			$("#shakedown").animate({ top: "60%" }, 700, function (){
				$("#shakedown").animate({ top: "74%" }, 700, function (){
				})
					//sound.play();
			})
		}
		//各种初始化
        $(document).ready(function (){
            Howler.iOSAutoEnable = false
            FastClick.attach(document.body)
            init()
        })
		
	</script>

</head>
<body>
<img src="images/shake.jpg" style="width: 100%;position: absolute;left: 0; z-index:-1;"/>
<table id="container">
<tbody>
	<tr>
		<td class="container" colspan="2">
			<div id="shake">
				<img src="images/inner.png" class="inner">
				<img src="images/shake.png" class="shake_up" id="shakeup">
				<img src="images/shake.png" class="shake_down" id="shakedown">
			</div>
			<div id="loading" class="loading"></div>
		</td>
	</tr>
	<tr id="controlbar">
		<td class="controlbar" onclick="javascript:shake();">
			
			<img src="images/sdy.png" style="position:absolute;top: 98%;width: 30%;left: 35%;">
			
		</td>
		
	</tr>
	<tr id="cantshake" style="display:none">
		<td class="controlbar" colspan="2">对不起，您的手机无法支持摇一摇！</td>
	</tr>
</tbody>
</table>

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
	});
		
	wx.ready(function(){
		wx.hideOptionMenu()
/*		
		//防止下拉页面，查看域名
		$(document).ready(function(){
			function stopScrolling( touchEvent ){
				touchEvent.preventDefault();
			}
			document.addEventListener( 'touchstart' , stopScrolling , false );
			document.addEventListener( 'touchmove' , stopScrolling , false );

		}) 
*/	

/*remove url of alert/confirm*/   
 
	var wAlert = window.alert;    
	window.alert = function (message) {    
		try {    
			var iframe = document.createElement("IFRAME");    
			iframe.style.display = "none";    
			iframe.setAttribute("src", 'data:text/plain,');    
			document.documentElement.appendChild(iframe);    
			var alertFrame = window.frames[0];    
			var iwindow = alertFrame.window;    
			if (iwindow == undefined) {    
				iwindow = alertFrame.contentWindow;    
			}    
			iwindow.alert(message);    
			iframe.parentNode.removeChild(iframe);    
		}    
		catch (exc) {    
			return wAlert(message);    
		}    
	} 




	})
</script>
