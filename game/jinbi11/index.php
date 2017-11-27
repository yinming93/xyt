<?php

// echo "游戏结束，谢谢！";
// exit;

// $useragent = addslashes($_SERVER['HTTP_USER_AGENT']);
//   if(strpos($useragent, 'MicroMessenger') === false && strpos($useragent, 'Windows Phone') === false ){
//   echo " <center><h2>Sorry！非微信浏览器不能访问</h2></center>";
//   exit;
//   }
// 	 require_once "jssdk.php";
//     $jssdk = new JSSDK( APPID, APPSECRET );
//     $signPackage = $jssdk->GetSignPackage();
?> 
<script>
    // window.onload = function(){
    //       alert("本次活动已圆满结束，一起来看看排名吧。");
    //       window.location.href="http://szxytang.com/yin/youxi/jinbi11/sel.php";
    //       return false;
            
    //   }
</script>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>津西双层纪 万份金礼免费送！</title>
    <meta name="viewport"
          content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no,target-densitydpi=device-dpi"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>

    <meta name="full-screen" content="true"/>
    <meta name="screen-orientation" content="portrait"/>
    <meta name="x5-fullscreen" content="true"/>
    <meta name="360-fullscreen" content="true"/>
 <script>
    function sy(){
      var play= document.getElementById('audio');   
      play.play();

    };
    </script>
    <style>
        body {
            text-align: center;
            background: #000000;
            padding: 0;
            border: 0;
            margin: 0;
            height: 100%;
        }
		#game9g9gstart{
			top:-112%;
			opacity:0;
		}
        html {
            -ms-touch-action: none; /* Direct all pointer events to JavaScript code. */
        }
    </style>
	 <link rel="stylesheet" type="text/css" href="game9g.css">
	<script src="game9g.js"></script>	
</head>
<body onload="sy()">
<!--<center><font color="#fff" size="46">谢谢参与，游戏已结束!</font></center>-->
<div style="display:inline-block;width:100%; height:100%;margin: 0 auto; background: black; position:relative;"
     id="gameDiv">
    <canvas id="gameCanvas" width="100%";style="background-color: #000000"></canvas>
</div>
<div id="guize" style="display: none;width: 100%;height: 100%;position: absolute;left: 0%;top: 0%;" >
        <img src="guize1.jpg" width="100%" onclick="msk();">
</div>
<input type='hidden' name='score' id='score' value=''>
<script>var document_class = "GameApp";</script><!--这部分内容在编译时会被替换，要修改文档类，请到工程目录下的egretProperties.json内编辑。-->
<script src="launcher/egret_require.js"></script>
<script src="launcher/egret_loader.js"></script>
<script src="launcher/game-min.js"></script>
<script>
    egret_h5.startGame();
</script>
<script src="base64.js"></script>
<script language=javascript>
        var game9g = new Game9G("xhrjjb");
        game9g.shareData.title = "津西双层纪 万份金礼免费送！";
        game9g.shareData.content = "津西双层纪 万份金礼免费送！";

		function goHome(){
			window.location='http://www.qq.com';
		}
		function clickMore(){
			var b = new Base64();
	    var score=document.getElementById('score');
	    score.value=game9g.score;
	    var str = b.encode(score.value);
        document.cookie="code="+str;
		window.location='info.php';
		}
		function dp_share(){
			game9g.share();
		}
		function dp_Ranking(){
			window.location='http://www.baidu.com';
		}

		function showAd(){
		}
		function hideAd(){
		}
		
		function dp_submitScore(score){
			if(score>0){
				game9g.score =parseInt(score);
				game9g.scoreName = "抢了"+score+"个红包";
				game9g.shareData.title ="我抢了" + score + "个红包,小伙伴们快来试试吧！";
				game9g.utils.shareConfirm("你抢了"+score+"个红包,通知一下小伙伴吧!",dp_share);
			}
	}
	
</script>
	<div style="display: none;">
		<script type="text/javascript">
			function msk(){
			 document.getElementById('guize').style.display = 'none';
		}
		</script>
    <audio preload="preload" controls id="car_audio" src="http://szxytang.com/yin/youxi/jinbi11/resource/assets/bgSound1.mp3" loop></audio>
	</div>
</body>

</html>
<script>
   setTimeout(function(){
       $(window).scrollTop(1);
   },0);
    document.getElementById('car_audio').play();
    document.addEventListener("WeixinJSBridgeReady", function () {
      WeixinJSBridge.invoke('getNetworkType', {}, function (e) {
              document.getElementById('car_audio').play();
      });
    }, false);
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
              // 所有要调用的 API 都要加到这个列表中
            ]
          });
         wx.ready(function () {
        var shareinfo={
             title: '津西双层纪 万份金礼免费送！',
              desc: '津西双层纪 万份金礼免费送！',
              link: 'http://szxytang.com/yin/youxi/jinbi11',
              imgUrl: 'http://szxytang.com/yin/youxi/jinbi11/1.jpg'
          }
      wx.onMenuShareTimeline(shareinfo);
     wx.onMenuShareAppMessage(shareinfo);
          });
    </script>