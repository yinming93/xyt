<?php
    //载入jssdk类
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>嫦娥别跑，我们来叙叙旧</title>
    <script src="launcher/Change.js"></script>

    <!--<script src="js/jquery-1.8.2.min.js"></script>-->

    <meta name="viewport"  content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>

    <meta name="full-screen" content="true"/>
    <meta name="screen-orientation" content="portrait"/>
    <meta name="x5-fullscreen" content="true"/>
    <meta name="360-fullscreen" content="true"/>
    <style>
        body {
            text-align: center;
            background: black;
            padding: 0;
            border: 0;
            margin: 0;
            height: 100%;
        }
        html {
            -ms-touch-action: none; /* Direct all pointer events to JavaScript code. */
            overflow: hidden;
        }
        div, canvas {
            display:block;
            position:absolute;
            margin: 0 auto;
            padding: 0;
            border: 0;
        }
		#toolbar{
			position:absolute;
			left:0px;
			width:100%;
			bottom:5px;
			z-index:99;
			display:none;
		}
		#toolbar img{
			width:40%;
			max-width:240px;
		}
		#guize{
			display: none;
			width: 100%;
			height: 100%;
			position: absolute;
			left: 0%;
			top: 0%;
		}
		#fx{
			display: none;
			width: 100%;
			height: 100%;
			position: absolute;
			left: 0%;
			top: 1%;
		}
    </style>
<link rel="stylesheet" type="text/css" href="css/game9g.css">
<script src="js/game9g.js"></script>
</head>
<body>
<div id="toolbar">
	<img src="share.png" ontouchstart="dp_share()"/>
</div>
<div style="position:relative;" id="gameDiv"></div>


<div id="guize">
    <div class="guize_con">
        <img src="images/guize.png" width="100%" onclick="msk();">
    </div>
</div>
<div id="fx">
    <div class="guize_con">
        <img src="images/guide.png" style="width:100%;height:100%;" width="100%" onclick="msk1();">
    </div>
</div>

<script>var document_class = "Game";</script>
<script src="launcher/egret_require.js"></script>
<script src="launcher/egret_loader.js"></script>
<script src="launcher/game-min.js"></script>
<script>
	function OnGameStage1(){
		App.gamename = "Pou Jump Adventure";
		App.nameid = "Pou-Jump-Adventure";
	}
    var support = [].map && document.createElement("canvas").getContext;
    if (support) {
        egret_h5.startGame();
    }
    else {
        alert("Please change your browser to play the game.")
    }
</script>

<script language=javascript>
      // var game9g = new Game9G("ttdd");
      //   game9g.shareData.title = "弹跳豆豆";
      //   game9g.shareData.content = "弹跳豆豆";

var quan;

		function goHome(){
			window.location=game9g.homeurl;
		}
		function clickMore(){

			// alert(quan);
			// var score =parseInt(score);
			if (quan>'1500') {
				//alert(quan);
				document.cookie="code="+quan;
				window.location="ff.php";
			}else if (quan<'1500'){
                alert("只有分数达到1500以上才能提交分数哦！");
            }else{
				// alert("请先参加游戏！");
				document.getElementById('guize').style.display = 'block';
			};


			 
			 //alert("傻逼刘建明");
			 //document.getElementById('guize').style.display = 'block';
                
		}
		function msk(){
			 document.getElementById('guize').style.display = 'none';
		}

		function dp_share(){
			document.getElementById('fx').style.display = 'block';
		}
		function msk1(){
			 document.getElementById('fx').style.display = 'none';
		}


		function dp_Ranking(){
			window.location=game9g.homeurl;
		}

		function showAd(){
		}
		function hideAd(){
		}
		function dp_submitScore(score){	
			quan = score;

			if(score>0){
				// game9g.score =parseInt(score);
				// game9g.scoreName = "跳了"+score+"米";
				// game9g.shareData.title ="我在弹跳豆豆中跳了"+score+"米，你也来试试吧！"
				// game9g.utils.shareConfirm("你在弹跳豆豆中跳了"+score+"米!通知一下小伙伴吧!",dp_share);

			}
		}
	</script>
	<div style="display: none;">
		<script type="text/javascript">
			game9g.utils.tongji();
		</script>						
	</div>
</body>
</html>
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
                        'onMenuShareAppMessage','onMenuShareTimeline'
                        ]
        });
      
        wx.ready(function(){
        //在这里调用 API

            wx.onMenuShareAppMessage({
              title:  '嫦娥别跑，我们来叙叙旧',
              desc:   '嫦娥这么美，不追怎么行？',
              link:   'http://xyt.xy-tang.com/yin/youxi/zce/',
              imgUrl: 'http://xyt.xy-tang.com/yin/youxi/zce/share.jpg',
              trigger: function (res) {
                //alert('用户点击发送给朋友');
              },
              success: function (res) {
                //alert('已分享');
                // getElementById('ssss').style.display='none';
                // getElementById('ffff').style.display='block';
                // document.getElementById('add_tel').style.display='block';
              },
              cancel: function (res) {
                //alert('已取消');
                // alert("只有先分享到朋友或朋友圈才可以查看分数！");
              },
              fail: function (res) {
                //alert(JSON.stringify(res));
              }
            });



            wx.onMenuShareTimeline({
            title: '嫦娥别跑，我们来叙叙旧', // 分享标题
            link: 'http://xyt.xy-tang.com/yin/youxi/zce/', // 分享链接
            imgUrl: 'http://xyt.xy-tang.com/yin/youxi/zce/share.jpg', // 分享图标
            success: function () { 
                // 用户确认分享后执行的回调函数
                //  getElementById('ssss').style.display='none';
                // getElementById('ffff').style.display='block';
                // document.getElementById('add_tel').style.display='block';
            },
            cancel: function () { 
                // 用户取消分享后执行的回调函数
                // alert("只有先分享到朋友或朋友圈才可以查看分数！");
            }
        });
        
        });
        
        //debug
        wx.error(function(res){
          alert(res.errMsg);
        });
    
    </script>