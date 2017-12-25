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
        // var_dump($openid);
        // exit;
        // $wxname=$userinfo_arr['nickname'];
        // $wximg=$userinfo_arr['headimgurl'];
        // $wxsex=$userinfo_arr['sex'];
        // echo $wxsex;
		include 'db.php';
        $query=mysql_query("select *from $tbname where openid='$openid'");

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
 	echo "window.location.href='http://xytang88.com/yin/bm/rc1213/getcodeurl.php';";
 	echo "</script>";
 	exit;
 }
 // if ($row){
	// echo "<script>";
	// echo "$('#box').css('display','none');";
	// echo "$('#shuzi').css('display','block');";
	// // echo "alert('已参与过')";
	// echo "</script>";
 // }
  // 当前时间戳
  $xz=time();
  // 活动结束时间
  // $js=strtotime('2017-05-28 17:59:00');
  // if ($xz>$js){
  // echo "<script>";
  // echo "window.location.href='indexj.php'";
  // echo "</script>";
  // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>美好新生季丨《奇门遁甲》奇幻来袭，免费影票，抢抢抢！</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<style>
	body{
		margin: 0px;
		padding: 0px;
		font-family: "微软雅黑";
		background-color: black;
		}
	.box{
    	width: 100%;
        margin: 0px;
        padding: 0px;
		position: absolute;
		background-color: #000;
		top:0px;
		left:0px;
		overflow: hidden;
		}
	.name{
		position:absolute;
		left:33%;
		top:65%;
		width:16%;
		height: 1.8%;
		line-height: 20px;
		text-align: center;
		font-size:14px;
		border: 1px solid white;
		border-radius: 5px;
		background: transparent;
		}
	.tel{
		position:absolute;
		left:41%;
		top:71.5%;
		width:34%;
		height: 1.8%;
		line-height: 20px;
		text-align: center;
		font-size:14px;
		border: 1px solid white;
		border-radius: 5px;
		background: transparent;
		}
		.sfz{
		position:absolute;
		left:41%;
		top:75%;
		width:34%;
		height: 1.8%;
		line-height: 20px;
		text-align: center;
		font-size:14px;
		border: 1px solid white;
		border-radius: 5px;
		background: transparent;
		}
		.city{
		position:absolute;
		left:41%;
		top:84.5%;
		width:34%;
		height: 1.8%;
		line-height: 20px;
		text-align: center;
		font-size:14px;
		border: 1px solid white;
		border-radius: 5px;
		background: transparent;
		}
	.bn{
		position:absolute;
		left:35%;
		top:89%;
		width:30%;
		height: 35px;
		border-radius:1px;
		background-size: 100% 100%;
		background-repeat:no-repeat;
		opacity: 1;
		font-size:18px;
		z-index: 100;
		color: white;
		border: 1;
	}
	#tu{
	    width: 100%;
	}
	#tu2{
	    width: 100%;
	    display: none;
	    position: absolute;
	    top: 0;
	    left: 0;
	    z-index: 9999;
	}
	.modal-dialog{
		margin-top:40%;
	}
	.sex{
		width: 12%;
		height: 1.8%;
		position:absolute;
		left:66%;
		top:65.5%;
		border:1px solid white;
	}
	
	.age{
		width:13%;
		height: 3%;
		position: absolute;
		left: 66%;
		top:65%;
		line-height: 20px;
		text-align: center;
		font-size:14px;
		border: 1px solid white;
		border-radius: 5px;
	}
	#pro{
		width: 34%;
		height: 3%;
		position: absolute;
		left: 41%;
		top: 77.5%;
		border:1px solid white;
	}
	.zj{
		position: absolute;
		top:65%;
		left: 32%; 
	}
	.db{
		position: absolute;
		top:65%;
		left: 51%; 
	}
	.dc{
-webkit-animation:fadeOut 2s 2s ease both;
-moz-animation:fadeOut 2s 2s ease both;}
@-webkit-keyframes fadeOut{
0%{opacity:1}
100%{opacity:0}
}
@-webkit-keyframes fadeOut{
0%{opacity:1}
100%{opacity:0}
}
	</style>

<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
</head>
<script>
		function sy(){
			var play= document.getElementById('audio');		
			play.play();
		};
    </script>
<body onload="sy()">
	<div class="box">
	<img id="zhao" class="dc" src="images/zhao.jpg" alt="" style="width:100%;z-index:200;position:absolute;top:0;left:0;">
	<img id="f1" src="images/fm.jpg" style="width:100%;z-index:199;position:absolute;top:0;left:0;">
	<img id="gz" src="images/gz.jpg" style="width:100%;z-index:210;position:absolute;top:0;left:0;display:none;" onclick="xsa()">

	<div id="f2" style="width:30%;height:6%;position:absolute;top:44%;left:35%;z-index:200;" onclick="bm()"></div>
	<div id="f3" style="width:30%;height:6%;position:absolute;top:52%;left:35%;z-index:200;" onclick="gz()"></div>


	<img id="tu" src="<?php if(!$row){ echo 'images/bg.jpg';}else{echo 'images/cg.jpg';} ?>">
	<img id="tu2" src="images/cg.jpg">
	<!-- <img id="tu" src="images/bg.jpg"> -->
	<form action="add.php" method="POST" style="<?php if ($row){echo 'display: none';} ?>;">
	<!-- <form action="add.php" method="POST"> -->
	<input type="hidden" name="openid" value="<?php echo $openid; ?>">
		<input class="name" type="text" name="name">
		<!-- <input class="age" type="tel" name="age"> -->
		<select name="age" id="age" class="age">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
		</select>
		<!-- <input type="radio" name="che" value="zj" class="zj" checked="checked">
		<input type="radio" name="che" value="db" class="db"> -->
		<!-- <select name="age" id="age">
			<?php
			for ($i=60;$i<110;$i++){
			  echo "<option value='$i'>".$i."</option>";
			}
			?>
		</select> -->
		
		
		<!-- <select name="sex" class="sex">
			<option value="nan">男</option>
			<option value="nv">女</option>
		</select> -->

		<input class="tel" type="tel" name="tel">
		<!-- <input class="sfz" type="tel" name="sfz"> -->
		<select name="pro" id="pro">
			<option value="0">请选择</option>
			<option value="1">东方御园</option>
			<option value="2">玉兰公馆</option>
			<option value="3">玉兰璟园</option>
			<option value="4">森邻森邻</option>
			<option value="5">运河壹号府</option>
			<option value="6">瑷颐湾</option>
		</select>
		
		<!-- <input class="city" type="text" name="city"> -->

		<input class="bn" name="sub" type="button" value="提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交">
	</form>
	<!-- <p id="two" style="<?php if (!$row){echo 'display: none';} ?>;width:66%;position:absolute;top:82%;left:17%;background-color:transparent;border:0;color:black;font-size:1.5em;text-align:center;">恭喜您<br>已成功报名</p> -->
	</div>
	<audio id='audio' src="./sr.mp3" loop="loop" autoplay="autoplay"></audio>
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
	function bm () {
		$("#f1").css("display","none");
		$("#f2").css("display","none");
		$("#f3").css("display","none");
		$("#zhao").css("display","none");
	}
	function gz () {
		$("#gz").css("display","block");
	}
	function xsa () {
		$("#gz").css("display","none");
	}
</script>
<script>
	$("input[name='sub']").on("click",function(){
		$.ajax({
		url:'add.php',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){
			// alert(m);return false;
			if(m=='chong'){
				alert("请勿重复提交！");
			}
			if(m=='ok'){
				// window.location.href='getcodeurl.php';
				$("#tu2").css("display","block");
			}  
			if(m=='m'){
				alert("所选项目人数已满！");
				window.location.href='getcodeurl.php';
			}    				
			if(m=='tel'){
				alert("手机号格式不正确！");
			}    				
			if(m=='wan'){
				alert("请完善信息！");
			}
			if(m=='sb'){
				alert("插入数据库失败！");
			}
		}
		})
	})
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
		 	 title: '美好新生季丨《奇门遁甲》奇幻来袭，免费影票，抢抢抢！',
		      desc: '阖家观影季，与您相约~',
		      link: 'http://xytang88.com/yin/bm/rc1213/getcodeurl.php',
		      imgUrl: 'http://xytang88.com/yin/bm/rc1213/share.jpg'}
		      wx.onMenuShareTimeline(shareinfo);
		 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>