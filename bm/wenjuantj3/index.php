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
		include 'db.php';
		$t = date('Y-m-d');
        $query=mysql_query("select *from $tbname where openid='$openid' and time='".$t."'");
        $row=mysql_fetch_array($query);
        // var_dump($row);die;  
    } else{
        //echo "NO CODE";
        echo '操作失败！';
        exit;
        //写入日记文件
    }
  if(!$openid){
 	echo "<script>";
 	echo "window.location.href='http://xytang88.com/yin/za/wenjuantj3/getcodeurl.php';";
 	echo "</script>";
 	exit;
 	}
 if ($row){
	echo "<script>";
	echo "window.location.href='http://xytang88.com/yin/za/wenjuantj3/result/index.php';";
	echo "alert('你今天已参加过投票');";
	echo "</script>";
 }
 // 当前时间戳
  $xz=time();
  // 活动结束时间
  $js=strtotime('2018-10-13 16:59:00');
  if ($xz>$js){
  echo "<script>";
  echo "alert('活动已结束，谢谢参与');";
  echo "window.location.href='http://xytang88.com/yin/za/wenjuantj3/result/index.php'";
  echo "</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<script src="jquery-1.8.2.min.js"></script>
<meta http-equiv="Cache-Control" content="max-age=0" />
<meta name="apple-touch-fullscreen" content="yes" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">	
	<title>“2017年度十大新闻”评选活动</title>
</head>
<style>
	body{
		padding:0;
		margin:0;
		font-family: "微软雅黑";
		background: #172E72;
	}
	.bnn{
		background: red;
		color: white;
		width: 70%;
		height: 20%;
		border: 0; 
		border-radius: 5px;
		position: absolute;
		top:54%;
		left: 15%;
		opacity: 0;
	}
	label img{
		width: 100%;
		display: block;
	}
	label input{
		position: absolute;
		margin-top: 3px;
		margin-left: 5px;
	}
	.bb{
		position: relative;
	}
	.bb img{
		width: 100%;
		display: block;
	}
	.name{
		position: absolute;
		top: 4%;
		left: 31%;
		width: 40%;
		height: 12%;
		background: transparent;
		border: 0;
	}
	.tel{
		position: absolute;
		top: 27%;
		left: 31%;
		width: 40%;
		height: 12%;
		background: transparent;
		border: 0;
	}
	.audio{
			width: 30px;
			height: 30px;
			background: url(img/adbg.png);
			background-size: 100% 100%;

			position: fixed;
			top: 20px;
			right: 20px;
			z-index: 1000;
		}
		.fz{
		-webkit-animation:pulse 1s .2s infinite alternate;
		-moz-animation:pulse 1s .2s infinite alternate;}
		@-webkit-keyframes pulse{
		0%{-webkit-transform:scale(0.5)}
		100%{-webkit-transform:scale(1)}
		}
		@-moz-keyframes pulse{
		0%{-moz-transform:scale(0.5)}
		100%{-moz-transform:scale(1)}
		}
		.help-up{
		-webkit-animation:fadeOutUp 1.5s .2s infinite;
		-moz-animation:fadeOutUp 1.5s .2s infinite;}
		@-webkit-keyframes fadeOutUp{
		0%{opacity:1;
		-webkit-transform:translateY(0)}
		100%{opacity:0;
		-webkit-transform:translateY(-20px)}
		}
		@-moz-keyframes fadeOutUp{
		0%{opacity:1;
		-moz-transform:translateY(0)}
		100%{opacity:0;
		-moz-transform:translateY(-20px)}
		}
</style>
<script>
$(function(){
		//音乐
			$('.audio').click(function(){
				var play= document.getElementById('audio');
				if(play.paused == true){
					play.play();
					$(".audio>img").attr("src","img/play.png").addClass('fz');
				}else{
					play.pause();
					$(".audio>img").attr("src","img/pause.png").removeClass('fz');
				}
					
			});


			

		});

function sy(){
			var play= document.getElementById('audio');		
			play.play();

		}
</script>
<body onload="sy()">
	<div style="width:100%;position:absolute;top:0;left:0;">
		<img src="images/1_01.jpg" alt="" style="width:100%;display:block">

		<form action="add.php" method="POST">

		<label>
			<input name="fruit[]" type="checkbox" value="1" checked="checked" />
			<img src="images/1_02.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="2" />
			<img src="images/1_03.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="3" />
			<img src="images/1_04.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="4" />
			<img src="images/1_05.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="5" />
			<img src="images/1_06.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="6" />
			<img src="images/1_07.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="7" />
			<img src="images/1_08.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="8" />
			<img src="images/1_09.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="9" />
			<img src="images/1_10.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="10" />
			<img src="images/1_11.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="11" />
			<img src="images/1_12.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="12" />
			<img src="images/1_13.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="13" />
			<img src="images/1_14.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="14" />
			<img src="images/1_15.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="15" />
			<img src="images/1_16.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="16" />
			<img src="images/1_17.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="17" />
			<img src="images/1_18.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="18" />
			<img src="images/1_19.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="19" />
			<img src="images/1_20.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="20" />
			<img src="images/1_21.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="21" />
			<img src="images/1_22.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="22" />
			<img src="images/1_23.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="23" />
			<img src="images/1_24.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="24" />
			<img src="images/1_25.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="25" />
			<img src="images/1_26.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="26" />
			<img src="images/1_27.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="27" />
			<img src="images/1_28.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="28" />
			<img src="images/1_29.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="29" />
			<img src="images/1_30.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="30" />
			<img src="images/1_31.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="31" />
			<img src="images/1_32.jpg" alt="">
		</label> 
		<label>
			<input name="fruit[]" type="checkbox" value="32" />
			<img src="images/1_33.jpg" alt="">
		</label> 

		
		<div class="bb">
			<img src="images/1_34.jpg" alt="">
			<input type="hidden" name="openid" value="<?php echo $openid;?>">
			<input type="text" name="name" class="name" placeholder="请输入姓名">
			<input type="tel" name="tel" class="tel" placeholder="请输入电话">
			<input class="bnn" name="sub" type="button" value="提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交">
		</div>
		

		</form>
		
	</div>

	<div class="audio">
		<img  class='fz' src="./img/play.png" width='100%' alt="">
		<audio id='audio' src="./img/sr.mp3" loop autoplay="autoplay"></audio>
	</div>
	<script src="99_main.js"></script>
</body>
</html>
<script>
	 setTimeout(function(){
	     $(window).scrollTop(1);
	 },0);
	  document.getElementById('audio').play();
	  document.addEventListener("WeixinJSBridgeReady", function () {
			WeixinJSBridge.invoke('getNetworkType', {}, function (e) {
	            document.getElementById('audio').play();
			});
	  }, false);
	</script>
<script>
$("input[name='fruit[]']").on("click",function(){
	var len = $("input[name='fruit[]']:checked").length;
	if(len>10){
	alert("最多选择10个哦！");
	return false;
	}
})


$("input[name='sub']").on("click",function(){
	var len = $("input[name='fruit[]']:checked").length;
	// alert(len);return false;
	if(len>10){
	alert("最多选择10个！");
	return false;
	}


	$.ajax({
	url:'add.php',
	data:$('form').serialize(),
	type:'POST',
	success:function(m){
		// alert(m);return false;
		if(m=='ok'){
			alert("提交成功！");
			window.location.href="./result/index.php";
		}    								
		if(m==-1){
			alert("请完善信息！");
		}
		if(m==22){
			alert("今天已参加过！");
			window.location.href="./result/index.php";
		}
		if(m==3){
			alert("至少选择一个新闻！");
		}
		if(m=='tel'){
			alert("请输入正确的手机号！");
		}
		if(m==-2){
			alert("插入数据库失败！");
		}
	}
	});
});
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
        ]
      });
     wx.ready(function () {
    var shareinfo={
       title: '“2017年度十大新闻”评选活动',
          desc: '感谢您参加！',
          link: 'http://xytang88.com/yin/za/wenjuantj3/getcodeurl.php',
          imgUrl: 'http://xytang88.com/yin/za/wenjuantj3/share.jpg'}
          wx.onMenuShareTimeline(shareinfo);
     wx.onMenuShareAppMessage(shareinfo);
      });
    </script>