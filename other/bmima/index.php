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
		// include 'db.php';
  //       $query=mysql_query("select *from $tbname where openid='$openid'");

  //       $row=mysql_fetch_array($query);
        // var_dump($row);die;  
    } else{
        //echo "NO CODE";
        echo '操作失败！';
        exit;
        //写入日记文件
    }
  if(!$openid){
 	echo "<script>";
 	echo "window.location.href='http://szxytang.com/yin/za/bmima/getcodeurl.php';";
 	echo "</script>";
 	exit;
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>梦启锡城，盛居西溪</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<style>
	body{
		margin: 0px;
		padding: 0px;
		font-family: "微软雅黑";
		overflow: hidden;
	}
	.box{
    	width: 100%;
        margin: 0px;
        padding: 0px;
		position: absolute;
		background-color: #4695EA;
		top:0px;
		left:0px;
	}
.tel{
	position:absolute;
	left:25%;
	top:59%;
	width:48%;
	height: 28px;
	font-size:13px;
	border:0;
	z-index: 999;
}
#tu{
    width: 100%;
    display: block;
    z-index: -2;
}
	</style>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
</head>
<body>

	<!-- 第一次梦启锡城，盛居西溪 -->
	<img id="bg1" src="./images/bg1.jpg" alt="" style="width:100%;z-index:200;position:absolute;top:0;">
	<div id="mk1" style="width:70%;height:130px;background:;position:absolute;top:65%;left:15%;z-index:201;">
		<input type="text" id="m1" placeholder="请输入密码" style="width:60%;height:24px;margin-left:20%;"><br><br><br>
		<div style="width:50%;height:30px;margin-left:26%;background:#4695EA;color:white;line-height:30px;text-align:center;" onclick="qr()">确认</div>
	</div>

	<!-- 第二次梦启锡城，盛居西溪 -->
	<img id="bg2" src="./images/bg2.jpg" alt="" style="width:100%;z-index:190;position:absolute;top:0;">
	<div id="mk2" style="width:70%;height:130px;background:;position:absolute;top:65%;left:15%;z-index:191;">
		<input type="text" id="m2" placeholder="请输入密码" style="width:60%;height:24px;margin-left:20%;"><br><br><br>
		<div style="width:50%;height:30px;margin-left:26%;background:#4695EA;color:white;line-height:30px;text-align:center;" onclick="qr2()">确认</div>
	</div>

	<!-- 第三次梦启锡城，盛居西溪 -->
	<img id="bg3" src="./images/bg3.jpg" alt="" style="width:100%;z-index:180;position:absolute;top:0;">
	<div id="mk3" style="width:70%;height:130px;background:;position:absolute;top:65%;left:15%;z-index:181;">
		<input type="text" id="m3" placeholder="请输入密码" style="width:60%;height:24px;margin-left:20%;"><br><br><br>
		<div style="width:50%;height:30px;margin-left:26%;background:#4695EA;color:white;line-height:30px;text-align:center;" onclick="qr3()">确认</div>
	</div>

	<!-- 第四次梦启锡城，盛居西溪 -->
	<img id="bg4" src="./images/bg4.jpg" alt="" style="width:100%;z-index:170;position:absolute;top:0;">
	<div id="mk4" style="width:70%;height:130px;background:;position:absolute;top:65%;left:15%;z-index:171;">
		<input type="text" id="m4" placeholder="请输入密码" style="width:60%;height:24px;margin-left:20%;"><br><br><br>
		<div style="width:50%;height:30px;margin-left:26%;background:#4695EA;color:white;line-height:30px;text-align:center;" onclick="qr4()">确认</div>
	</div>
	
	<!-- 第五次密码 -->
	<img id="bg5" src="./images/bg5.jpg" style="width:100%;position:absolute;top:0;left:0;z-index:160;">
	<div id="mk3" style="width:70%;height:130px;background:;position:absolute;top:65%;left:15%;z-index:161;">
		<form action="add.php" method="POST">
		<input type="hidden" name="openid" value="<?php echo $openid;?>">
		<input class="name" type="text" name="m5" placeholder="请输入密码"style="z-index:161;width:60%;height:24px;margin-left:20%;"><br><br><br>
		<div style="width:50%;height:30px;margin-left:26%;background:#4695EA;color:white;line-height:30px;text-align:center;">确认</div>
		<input id="bn" class="bn" name="sub" type="button" value="最后" style="display:block;z-index:161;width:60%;height:40px;margin-left:20%;margin-top:-15%;background:red;opacity:0;">
	</form>
	</div>
	
	<img id="bg6" src="images/bg6.jpg" alt="" style="width:100%;position:absolute;top:0;left:0;z-index:300;display:none;">
	<?php 
		include 'db.php';
        $query=mysql_query("select *from $tbname where openid='$openid'");
        $row=mysql_fetch_array($query);
		 if ($row){
			echo "<script>";
			echo "document.getElementById('bg6').style.display='block'";
			echo "</script>";
 				}
	 ?>
</body>
</html>
<script>
	function qr(){
		var yy = document.getElementById('m1').value;
		if (yy!='西溪碧桂园'){
			alert('密码错误');
		}else{
			document.getElementById('mk1').style.display="none";
			document.getElementById('bg1').style.display="none";
		};
	}
	function qr2(){
		var yy2 = document.getElementById('m2').value;
		if (yy2!='千亿房企'){
			alert('密码错误');
		}else{
			document.getElementById('mk2').style.display="none";
			document.getElementById('bg2').style.display="none";
		};
	}
	function qr3(){
		var yy3 = document.getElementById('m3').value;
		if (yy3!='世界500强'){
			alert('密码错误');
		}else{
			document.getElementById('mk3').style.display="none";
			document.getElementById('bg3').style.display="none";
		};
	}
	function qr4(){
		var yy4 = document.getElementById('m4').value;
		if (yy4!='主城西山水湿地住区'){
			alert('密码错误');
		}else{
			document.getElementById('mk4').style.display="none";
			document.getElementById('bg4').style.display="none";
		};
	}
</script>
<script>
$("input[name='sub']").on("click",function(){
	$.ajax({
	url:'add.php',
	data:$('form').serialize(),
	type:'POST',
	success:function(m){
		if(m=='rep'){
			alert("请勿重复提交！");
		}    				
		if(m=='ok'){
			document.getElementById('bg6').style.display="block";
		}    				
		if(m==-1){
			alert("请输入密码！");	
		}
		if(m=='cuo'){
			alert("密码错误！");	
		}
		if(m==-2){
			alert("插入数据库失败！");
			location.href="http://szxytang.com/yin/za/bmima/getcodeurl.php"
		}
	}
	});
});
</script>
<!--开始-->
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
		 	 title: '梦启锡城，盛居西溪',
		      desc: '千人徒步暨销售中心盛装开启',
		      link: 'http://szxytang.com/yin/za/bmima/getcodeurl.php',
		      imgUrl: 'http://szxytang.com/yin/za/bmima/share.jpg'
		  }
		  // wx.hideOptionMenu();
      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>
<!--结束-->