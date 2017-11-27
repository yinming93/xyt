<?php
	//引入js类文件
	 require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
    if(isset($_GET['code'])){
        include 'func.php';
        define('CODE', $_GET['code']);
        define('APPID', 'wx461b5105da7629f1'); 
        define('APPSECRET', 'd80e5eb9158f81ed612f7b6810fb9093'); 
        //1
        //获页面授权的ACCESS_TOKEN 、 refresh_token、openid、 scope的类型
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".CODE."&grant_type=authorization_code";
        $json_access_token = https_request($url);
        $arr_access_token  = json_decode($json_access_token, true); //获取access_token
        //2.
        $openid = $arr_access_token['openid'];
    } else{
        //echo "NO CODE";
        echo '操作失败！';
        exit;
        //写入日记文件
    }
 // 当前时间戳
	$xz=time();
	// 活动结束时间
	$js=strtotime('2018-05-24 14:00:00');
	if ($xz>$js){
	echo "<script>";
	echo "alert('本次活动已圆满结束，感谢您的参与！');";
	echo "window.location='sel.php'";
	echo "</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no height=device-height" />
	<title>一指禅戳戳戳！玩小游戏，免费吃龙虾！</title>
	<link type="text/css" href="style/index.css" rel="stylesheet" />
	<link type="text/css" href="style/common.css" rel="stylesheet" />
	<script type="text/javascript" src="script/zepto.min.js"></script>
	<script src="script/common.js"></script>
	<link rel="stylesheet" type="text/css" href="style/game9g.css">
	<script src="script/game9g.js"></script>
	<script src="jquery-1.8.2.min.js"></script>
	
	
</head>
<body class="body">
	<div id="gamediv"></div>

   <input id="bt-game-id" type="hidden" value="fishinglegend">

	<script type="text/javascript" src="script/plugin/lufylegend-1.9.1.min.js"></script> 
    <script src="script/Main.js" type="text/javascript"></script>
	<script type="text/javascript">
		window.onerror = function(e) {
			// alert(e);
		}
		btGame.onlyVScreen(); 
	</script>
	<script language="javascript">
       
       

		function goHome(){
			document.cookie="code="+quan;
			window.location="getcodeurl2.php";
		}
		function clickMore(){
			 if((window.location+"").indexOf("f=zf",1)>0){
			 	// document.cookie="code="+quan;
			 	// window.location = "bm.php";
			  }
			  else{
			 	goHome();
			  }
		}
		function dp_share(){
			window.location="getcodeurl2.php";
			
		}
		function dp_Ranking(){
			// document.cookie="code="+quan;
			// window.location = "bm.php";
		}

		function showAd(){
		}
		function hideAd(){
		}
		function dp_submitScore(score){
			quan = score;
		}
	</script>
	<div style="display: none;">
		<script type="text/javascript">
			game9g.utils.tongji();
		</script>						
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

		
		
			wx.onMenuShareTimeline({
				title: '一指禅戳戳戳！玩小游戏，免费吃龙虾！', // 分享标题
				link: 'http://szxytang.com/yin/youxi/longxia/getcodeurl.php', // 分享链接
				imgUrl: 'http://szxytang.com/yin/youxi/longxia/share.jpg', // 分享图标
				success: function () { 

				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
			  title:  '一指禅戳戳戳！玩小游戏，免费吃龙虾！',
			  desc:   '浓糊味龙虾火辣上市',
			  link: 'http://szxytang.com/yin/youxi/longxia/getcodeurl.php', // 分享链接
			  imgUrl: 'http://szxytang.com/yin/youxi/longxia/share.jpg', // 分享图标
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