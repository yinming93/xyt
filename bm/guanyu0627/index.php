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
 	echo "window.location.href='http://szxytang.com/yin/bm/guanyu0627/getcodeurl.php';";
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
	<title>龙湖冠寓钟园路店预约报名</title>
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
		left:38%;
		top:52%;
		width:30%;
		height: 2.2%;
		line-height: 20px;
		text-align: center;
		font-size:15px;
		border: 0;
		border-radius: 5px;
		background: transparent;
		}
	.tel{
		position:absolute;
		left:38%;
		top:59%;
		width:30%;
		height: 2.2%;
		line-height: 20px;
		text-align: center;
		font-size:15px;
		border: 0;
		border-radius: 5px;
		background: transparent;
		}
	.bn{
		position:absolute;
		left:15%;
		top:68%;
		width:70%;
		height: 40px;
		border-radius:1px;
		background-size: 100% 100%;
		background-repeat:no-repeat;
		opacity: 0;
		font-size:18px;
		z-index: 100;
		color: white;
		border: 1;
	}
	#tu{
	    width: 100%;
	}
	.modal-dialog{
		margin-top:40%;
	}
	.sex{
		width: 16%;
		height: 1.2%;
		position:absolute;
		left:31%;
		top:83.4%;
		/*background: transparent;*/
		border:0;
	}
	.age{
		width: 16%;
		height: 1%;
		position: absolute;
		left: 66%;
		top: 83.3%;
		background: transparent;
		border:0;
	}
	</style>

<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
</head>
<body>
	<div class="box">
	<img id="tu" src="<?php if(!$row){ echo 'images/bg.jpg';}else{echo 'images/cg1.jpg';} ?>">
	<form action="add.php" method="POST" style="<?php if ($row){echo 'display: none';} ?>;">
	<input type="hidden" name="openid" value="<?php echo $openid; ?>">
		<input class="name" type="text" name="name">
		<input class="tel" type="tel" name="tel">	
		<input class="bn" name="sub" type="button">
	</form>
	<!-- <p id="two" style="<?php if (!$row){echo 'display: none';} ?>;width:66%;position:absolute;top:82%;left:17%;background-color:transparent;border:0;color:black;font-size:1.5em;text-align:center;">恭喜您<br>已成功报名</p> -->
	<div style="width:100%;height:100%;background:;<?php if (!$row){echo 'display: none';} ?>;position:absolute;top:0;left:0;" onclick="ts()">
		
	</div>

	</div>
</body>
</html>
<script>
	function ts () {
		alert('点击右上角分享到朋友圈，告诉你的朋友吧！')
	}
</script>
<script>
	$("input[name='sub']").on("click",function(){
		$.ajax({
		url:'add.php',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){
			if(m=='chong'){
				alert("请勿重复提交！");
			}
			if(m=='ok'){
				// alert("报名成功！");
				window.location.href='getcodeurl.php';

			}  
			if(m=='m'){
				alert("报名人数已满！");
				// $("input[name='name']").val('');
				// $("input[name='tel']").val('');
				// $("input[name='age']").val('');
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
		 	 title: '龙湖冠寓钟园路店预约报名',
		      desc: '报名链接',
		      link: 'http://szxytang.com/yin/bm/guanyu0627/getcodeurl.php',
		      imgUrl: 'http://szxytang.com/yin/bm/guanyu0627/share.jpg'}
		      wx.onMenuShareTimeline(shareinfo);
		 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>