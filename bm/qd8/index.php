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
        $id=$row['id'];
        
    } else{
        //echo "NO CODE";
        echo '操作失败！';
        exit;
        //写入日记文件
    }
  if(!$openid){
 	echo "<script>";
 	echo "window.location.href='http://szxytang.com/yin/qiandao/qd8/getcodeurl.php';";
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
	<title>活动签到</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<style>
	body{
		margin: 0px;
		padding: 0px;
		font-family: "微软雅黑";
		overflow: hidden;
	}
	body{
		margin: 0px;
		padding: 0px;
		font-family: "微软雅黑";
		background-color:black;
	}
	.box{
    	width: 100%;
        margin: 0px;
        padding: 0px;
		position: absolute;
		background-color: black;
		top:0px;
		left:0px;
	}
.name{
	position:absolute;
	left:25%;
	top:41%;
	width:48%;
	height: 28px;
	font-size:13px;
	border:0;
	z-index: 999;
}
.tel{
	position:absolute;
	left:25%;
	top:48%;
	width:48%;
	height: 28px;
	font-size:13px;
	border:0;
		z-index: 999;
}

.bn{
	position:absolute;
	left:33%;
	top:54%;
	width:33.5%;
	height: 5.8%;
	font-size:18px;
	border: 0;
	background:url('images/but1.png');
	background-size: 100%;
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
	<div class="box">
	<img id="tu" src="./images/bg.jpg">
<?php if ($row): ?>
	<?php 
		if($id<'10'){
		  $id='000'.$row['id'];
		}else if($id>'9'&&$id<'100'){
		  $id='00'.$row['id'];
		}else if($id>'99'&&$id<'1000'){
		  $id='0'.$row['id'];
		}else{
		  $id=$row['id'];
		}
		
	?>
    <div style="z-index:999;color:white;width:170px;height:40px;position:absolute;left:50%;margin-left:-85px;top:40%;font-size:40px;text-align:center;line-height:40px;border:0px solid #CC972C;">抽奖码<div>
 	<div style="z-index:999;color:black;width:180px;height:60px;position:absolute;left:50%;margin-left:-90px;top:130%;font-size:50px;text-align:center;line-height:60px;background:url('bgg.jpg') no-repeat 100% 100%;"><?php echo $id; ?><div>
   <!--  <div style="z-index:999;color:white;width:200px;height:70px;position: absolute;left:50%;margin-left:-100px;top:90%;font-size: 46px;text-align: center;line-height:50px;background:orange;"><?php echo $id; ?></div> -->
	
<?php else: ?>
		<form action="add.php" method="POST">
		<input type="hidden" name="openid" value="<?php echo $openid; ?>">
		<input class="name" type="text" name="name" placeholder="请输入姓名">
		<input class="tel" type="tel" name="tel" placeholder="请输入手机">
		<input id="bn" class="bn" name="sub" type="button" value="" style="display:block;">
	</form>
<?php endif; ?>
	</div>

</body>
</html>
<script>
    		$("input[name='sub']").on("click",function(){
    			document.getElementById('bn').style.display="none";
    			$.ajax({
    			url:'add.php',
    			data:$('form').serialize(),
    			type:'POST',
    			success:function(m){
    				if(m=='rep'){
    					alert("请勿重复提交！");
    					location.href="http://szxytang.com/yin/qiandao/qd8/getcodeurl.php"
    				}    				
    				if(m=='name'){
    					alert("请填写正确的姓名！");
    					location.href="http://szxytang.com/yin/qiandao/qd8/getcodeurl.php"
    				}
    				if(m=='ok'){
    					alert("签到成功！");
    					$("input[name='name']").val('');
    					$("input[name='tel']").val('');	
    					location.href="http://szxytang.com/yin/qiandao/qd8/getcodeurl.php";
    				}    				
    				if(m=='tel'){
    					alert("手机号格式不正确！");
    					location.href="http://szxytang.com/yin/qiandao/qd8/getcodeurl.php"
    				}    				

    				if(m==-1){
    					alert("请完善信息！");
    					location.href="http://szxytang.com/yin/qiandao/qd8/getcodeurl.php"
    				}
    				if(m==-2){
    					alert("插入数据库失败！");
    					location.href="http://szxytang.com/yin/qiandao/qd8/getcodeurl.php"
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
		 	 title: '活动签到',
		      desc: '快来领豪礼吧',
		      link: 'http://szxytang.com/yin/qiandao/qd8/getcodeurl.php',
		      imgUrl: 'http://szxytang.com/yin/qiandao/qd8/share.jpg'
		  }
		  wx.hideOptionMenu();
      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>
<!--结束-->
