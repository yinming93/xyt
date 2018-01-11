<?php
	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="yes" name="apple-touch-fullscreen" />
    <meta content="telephone=no" name="format-detection" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">
    <title>拼梵高名画九宫格，赢阿尔勒精美礼品！</title>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link href="css/animate.css" rel="stylesheet" />
    <style type="text/css">
        body {
            margin: 0 auto;
            max-width: 640px;
            height: 100%;
        }

        img {
            max-width: 100%!important;
            vertical-align: middle;
        }
        
    </style>
    <script type="text/javascript">
        function init() {
            $('#car_audio')[0].load("yinyue.mp3");
            $('#car_audio')[0].play("yinyue.mp3");
            document.getElementById("car_audio").loop = true;
        };
    </script>
</head>
<body onload="init()">
<!--<body>-->
    <div id="index" style="position: absolute; top: 0; left: 0; z-index: 999">
        <img src="images/bg.jpg" />
        <div class="animated toggle" style="position: absolute; z-index: 2; top: 0px; left: 0; width: 100%">
            <img src="images/bg.png" />
        </div>
        <div class="animated fadeInDown" style="position: absolute; z-index: 2; top: 0px; left: 0; width: 100%">
            <img src="images/0101.png" />
        </div>
        <div id="seeRule" class="animated fadeInLeft" style="position: absolute; z-index: 2; top: 63%; left: 0; width: 100%; height: auto">
            <img src="images/0102.png" />
        </div>
        <div id="start" class="animated fadeInRight" style="position: absolute; z-index: 2; top: 73%; left: 0; width: 100%; height: auto">
			<img src="images/0103.png" />
        </div>
        <div id="rule" class="animated fadeInRight" style="position: absolute; z-index: 2; top: 0%; left: 0; width: 100%; height: auto; display: none">
            <img src="images/0104.png" />
        </div>
    </div>
    
    <!--音乐-->
    <audio id="car_audio" src="sound/yinyue.mp3" style="display: none;"></audio>
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	
	
    <!--分享开始-->
    <script src="js/CommonShare.js"></script>
    <script src="js/share.js?id=1"></script>
    <!--分享结束-->
	
	<!--开始-->

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
				title: '拼梵高名画九宫格，赢阿尔勒精美礼品！', // 分享标题
				link: 'http://xyt.xy-tang.com/2016hj/pintu/', // 分享链接
			    imgUrl: 'http://xyt.xy-tang.com/2016hj/pintu/share.jpg', // 分享图标
				success: function () { 
					// 用户确认分享后执行的回调函数
					//window.location.href = 'http://www.baidu.com';
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
			  title:  '拼梵高名画九宫格，赢阿尔勒精美礼品！',
			  desc:   '梵高名画你认识几幅，赶快来挑战！',
			  link: 'http://xyt.xy-tang.com/2016hj/pintu/', // 分享链接
			  imgUrl: 'http://xyt.xy-tang.com/2016hj/pintu/share.jpg', // 分享图标
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
	
	
	
    <script>
        var link = window.location.href;
        if (link.indexOf("#rd") >= 0)
        {
            console.log(link.indexOf("#rd"));
            window.location.href = ll.replace("#rd", "");
        }
        
    </script>
</body>
</html>
