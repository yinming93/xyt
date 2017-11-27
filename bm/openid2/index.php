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
        //2
        $url  = "https://api.weixin.qq.com/sns/userinfo?access_token=". $arr_access_token['access_token'] ."&openid=".$arr_access_token['openid'];
        $json = https_request($url);
        $userinfo_arr = json_decode($json, true); 
        $openid=$userinfo_arr['openid'];
        // $wxname=$userinfo_arr['nickname'];
        // $wximg=$userinfo_arr['headimgurl'];
        // $wxsex=$userinfo_arr['sex'];
        // echo $wxsex;
		include 'db.php';
        $query=mysql_query("select *from bmbm where openid='$openid'");

        $row=mysql_fetch_array($query);
        // var_dump($row);die;
        $mon=$row['mon'];
    } else{
        //echo "NO CODE";
        echo '操作失败！';
        exit;
        //写入日记文件
    }
  if(!$openid){
 	echo "<script>";
 	echo "window.location.href='http://xyt.xy-tang.com/yin/bm/openid/getcodeurl.php';";
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
$sq = "select * from bmbm";
$qu = mysql_query($sq);
$qq = mysql_num_rows($qu);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>【有奖竞猜】5月23日土拍在即，全民来出价！</title>
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
	left:37%;
	top:74%;
	width:26%;
	height: 40px;
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
		<form action="add.php" method="POST"  style="<?php if ($row){echo 'display: none';} ?>;">
		<input type="hidden" name="openid" value="<?php echo $openid; ?>">
		<input class="name" type="text" name="name" placeholder="请输入姓名">
		<input class="tel" type="text" name="tel" placeholder="请输入手机">
		<input class="mon" type="text" name="mon" placeholder="请输竞猜价格">
		<input class="bn" name="sub" type="button" value="提交">
		<img src="2.png" alt="" style="position:absolute;left:35%;top:74%;;width:30%;">

	</form>
	<p style="<?php if (!$row){echo 'display: none';} ?>;width:66%;position:absolute;top:70%;left:17%;background-color:transparent;border:0;color:white;font-size:1.5em;text-align:center;">您已经竞猜过了<br>您竞猜的价格是<br><?php echo $mon;?>元/平(楼面价)</p>
	<!-- <input type="text" value="您已经竞猜过了<br>您竞猜的价格是<br><?php echo $mon;?>元/平（楼面价）" style="<?php if (!$row){echo 'display: none';} ?>;position:absolute;top:70%;left:40%;background-color:transparent;border:0;width:300px;height:30px;color:white;font-size:26px;"> -->
	<p style="position:absolute;top:78%;left:17%;background-color:transparent;border:0;width:66%;color:white;font-size:1.2em;text-align:center;">已参加人数：<?php echo $qq;?>人</p>
	<!-- <input type="text" value="<?php echo $qq;?>" style="position:absolute;top:40%;left:30%;background-color:transparent;border:0;width:100px;height:30px;color:white;font-size:26px;"> -->
	</div>
		
		

</body>
</html>
<script>
    		$("input[name='sub']").on("click",function(){

    			$.ajax({
    			url:'add.php',
    			data:$('form').serialize(),
    			type:'POST',
    			success:function(m){
    				if(m=='rep'){
    					alert("请勿重复提交！");
    					location.href="http://xyt.xy-tang.com/yin/bm/openid/getcodeurl.php"
    				}    				
    				if(m=='-5'){
    					alert("报名活动结束！");
    				}
    				if(m=='name'){
    					alert("请填写正确的姓名！");
    				}
    				if(m=='ok'){
    					alert("提交成功！");
    					$("input[name='name']").val('');
    					$("input[name='tel']").val('');	
    					location.href="http://xyt.xy-tang.com/yin/bm/openid/getcodeurl.php"
    				}    				
    				if(m=='tel'){
    					alert("手机号格式不正确！");
    				}    				

    				if(m==-1){
    					alert("请完善信息！");
    					location.href="http://xyt.xy-tang.com/yin/bm/openid/getcodeurl.php"
    				}
    				if(m==-2){
    					alert("插入数据库失败！");
    					location.href="http://xyt.xy-tang.com/yin/bm/openid/getcodeurl.php"
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
		 	 title: '【有奖竞猜】5月23日土拍在即，全民来出价！',
		      desc: '谁是最准出价者，万元奖金等你拿',
		      link: 'http://xyt.xy-tang.com/yin/bm/openid/getcodeurl.php',
		      imgUrl: 'http://xyt.xy-tang.com/yin/bm/openid/share.jpg'
		  }
      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>
<!--结束-->
