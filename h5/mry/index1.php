<?php
	//载入jssdk类
	include 'DBCon.php';
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
	
	$ID=$_GET['ID'];
	$sqlsel="select * from $tbname where ID='".$ID."'";
	$querysel=mysql_query($sqlsel);
	$row=mysql_fetch_assoc($querysel);
	if($row){
		$url = $row['url'];
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>专属钞票</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="max-age=0" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">	

	<style>
		*{
			margin:0;
			padding:0;
		}	 
		
		.button{
			position:absolute;
			width:50%; 
			height:10%; 
			top:85%;
			left:26%;
			border:1px solid #333; 
			border-radius:10px; 
			line-height:52px; 
			font-family:'微软雅黑'; 
			font-size:23px; 
			text-align:center; 
			color:#333;
		}
		
		.button1{
			position:absolute;
			width:40%; 
			height:10%; 
			top:86%;
			left:29%;
			border:1px solid #fff; 
			border-radius:10px; 
			line-height:43px; 
			font-family:'微软雅黑'; 
			font-size:23px; 
			text-align:center; 
			color:#fff;
		}
	</style>
</head>
<script>
    function sy(){
      var play= document.getElementById('audio');   
      play.play();

    };
    </script>
<body onload="sy()">
<audio preload="preload"  id="car_audio" src="sr.mp3" loop></audio>
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

<div style="position:absolute; background-color:#fff; background-size:100% 100%; width:100%; height:100%;" >
	<div id="guize" style="display:none; z-index:9999; position:absolute; width:82%; height:88%; top:5%; left:9%; border:2px solid #FF7F24; border-radius:8px; opacity: 0.7; background-color:#000;">
		</br>&nbsp;&nbsp;&nbsp;<span style="font-size:15px; color:#fff; font-weight:bold;">活动细则：</span></br></br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:13px; color:#fff;">即日起至2月20日，参与“我是XX</span></br>
		&nbsp;&nbsp;&nbsp;<span style="font-size:13px; color:#fff;">X”游戏，并分享到朋友圈，凭朋友圈截</span></br>
		&nbsp;&nbsp;&nbsp;<span style="font-size:13px; color:#fff;">图至售楼处领取XXXX毛毯一份。</span></br>
		
		</br>&nbsp;&nbsp;&nbsp;<span style="font-size:15px; color:#fff; font-weight:bold;">领奖方式：</span></br></br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:13px; color:#fff;">凭朋友圈截图于X月XX日下午1点至售</span></br>
		&nbsp;&nbsp;&nbsp;<span style="font-size:13px; color:#fff;">楼处，按照签到时间先后顺序，前100名</span></br>
		&nbsp;&nbsp;&nbsp;<span style="font-size:13px; color:#fff;">将获得专属的尾巴毛毯一份。数量有限，</span></br>
		&nbsp;&nbsp;&nbsp;<span style="font-size:13px; color:#fff;">先到先得。</span></br>
		
		</br>&nbsp;&nbsp;&nbsp;<span style="font-size:15px; color:#fff; font-weight:bold;">领奖地址：</span></br></br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:13px; color:#fff;">苏站路与江乾路交叉口当代万国府</span></br>
		&nbsp;&nbsp;&nbsp;<span style="font-size:13px; color:#fff;">ΜΟΜΛ 售楼处，详询68116666。</span></br>
		 <div id="changebg" class="button1" onclick="javascript:window.location.href='index.php';">继续</div>
	</div>
</div>
<img src='<?php echo $url ?>' style="position:absolute; width:100%; height:81%;" />
<div id="changebg" class="button" onclick="javascript:document.getElementById('guize').style.display='block';">我也要参加</div>
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
						'onMenuShareAppMessage',
						'onMenuShareTimeline'
						]
		});
	  
	    wx.ready(function(){
					//在这里调用 API
						wx.onMenuShareTimeline({
							title: '专属钞票', // 分享标题
							link: 'http://szxytang.com/yin/shangchuan/mry/index1.php?ID='+<?php echo $ID ?>, // 分享链接
							imgUrl: 'http://szxytang.com/yin/shangchuan/mry/share.jpg', // 分享图标
							success: function () { 
								// 用户确认分享后执行的回调函数
								//window.location.href = 'http://www.baidu.com';
							},
							cancel: function () { 
								// 用户取消分享后执行的回调函数
							}
						});
						
						wx.onMenuShareAppMessage({
						  title:  '专属钞票',
						  desc:   '当代专属钞票',
						  link: 'http://szxytang.com/yin/shangchuan/mry/index1.php?ID='+<?php echo $ID ?>, // 分享链接
						  imgUrl: 'http://szxytang.com/yin/shangchuan/mry/share.jpg', // 分享图标
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


