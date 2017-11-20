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
 	echo "window.location.href='http://szxytang.com/yin/qiandao/lj10/getcodeurl.php';";
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>龙湖.武林九里 奖品等你来领</title>
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
		background-color: #000;
		top:0px;
		left:0px;
	}
	.shuzi{
    	width: 100%;
        margin: 0px;
        padding: 0px;
		position: absolute;
		background-color: #000;
		top:0px;
		left:0px;
	}
.name{
	position:absolute;
	left:26%;
	top:67%;
	width:46%;
	height: 26px;
	font-size:13px;
	border:0;
	z-index: 999;
	text-align: center;
}
.tel{
	position:absolute;
	left:26%;
	top:69%;
	width:46%;
	height: 26px;
	font-size:13px;
	border:0;
		z-index: 999;
		text-align: center;
}
.mon{
	position:absolute;
	left:26%;
	top:71%;
	width:46%;
	height: 26px;
	font-size:13px;
	border:0;
	z-index: 999;
	text-align: center;
}
.bn{
	position:absolute;
	left:5%;
	top:46%;
	width:90%;
	height: 70px;
	font-size:18px;
	border-radius: 3px;
	z-index: 999;
	opacity: 0;
}
#tu{
    width: 100%;
    margin-bottom: -4px;
    z-index: -2;
}
	</style>

<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
</head>
<body>
	<div id="box" class="box">
	<img id="tu" src="images/bg.jpg">
		<form id="one" action="add.php" method="POST"  style="<?php if ($row){echo 'display: none';} ?>;">
		<input type="hidden" name="openid" value="<?php echo $openid; ?>">
		
		<input class="bn" name="sub" type="button" value="点击领奖" onclick="disp_confirm()">
		<img src="222.png" alt="" style="position:absolute;left:18%;top:45%;width:60%;">
		<!-- <div style="color:#C22A27;font-size:16px;position:absolute;left:20%;top:70%;width:60%;text-align:center;">即可领取龙湖定制年货礼盒<br>业主专享，鸡年大吉</div> -->
	</form>
	<!-- <p id="two" style="<?php if (!$row){echo 'display: none';} ?>;width:66%;position:absolute;top:60%;left:17%;background-color:transparent;border:0;color:#C22A27;font-size:1.1em;text-align:center;">您已经领取过了<br>龙湖定制年货礼盒<br>恭祝你<br>财源滚滚，鸡年大吉</p> -->
	<img id="two" src="cg11.png" style="<?php if (!$row){echo 'display: none';} ?>;width:60%;position:absolute;top:45%;left:18%;">
	
	
	</div>
		
		

</body>
</html>
<script>
    		$("input[name='sub']").on("click",function(){

    			var r=confirm("请工作人员点击，自行点击将失去领奖资格!!!")
				  if (r==true)
				    {
				    
				    }
				  else
				    {
				    return false;
				    }

    			$.ajax({
    			url:'add.php',
    			data:$('form').serialize(),
    			type:'POST',
    			success:function(m){
    				if(m=='rep'){
    					alert("请勿重复提交！");
    					
    				}    				
    				if(m=='-5'){
    					alert("报名活动结束！");
    				}
    				if(m=='name'){
    					alert("请填写正确的姓名！");
    				}
    				if(m=='ok'){
    					alert("领取成功！");
    					// location.href="http://xyt.xy-tang.com/yin/bm/bm1014/getcodeurl.php"
    					// $("#one").html(m);
    					document.getElementById('one').style.display='none';
    					document.getElementById('two').style.display='block';
    				}    				
    				if(m=='tel'){
    					alert("手机号格式不正确！");
    				}    				

    				if(m==-1){
    					alert("请完善信息！");
    					
    				}
    				if(m==-2){
    					alert("插入数据库失败！");
    					
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
		 	 title: '龙湖.武林九里 奖品等你来领',
		      desc: 'MINI铺劲销百套 新品加推',
		      link: 'http://szxytang.com/yin/qiandao/lj10/getcodeurl.php',
		      imgUrl: 'http://szxytang.com/yin/qiandao/lj10/share.jpg'
		  }
		  // wx.hideOptionMenu();
      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>
<!--结束-->
