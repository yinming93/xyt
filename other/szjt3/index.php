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
 		// $openid = $arr_access_token['openid'];
        //2
        $url  = "https://api.weixin.qq.com/sns/userinfo?access_token=". $arr_access_token['access_token'] ."&openid=".$arr_access_token['openid'];
        $json = https_request($url);
        $userinfo_arr = json_decode($json, true); 
       	$openid=$userinfo_arr['openid'];
        $wxname=$userinfo_arr['nickname'];
        $wximg=$userinfo_arr['headimgurl'];
        // $wxsex=$userinfo_arr['sex'];

		include 'db.php';
        $query=mysql_query("select *from $tbname where openid='$openid'");

        $row=mysql_fetch_array($query);
        $id=$row['id'];
        // var_dump($row);die;
        
    } else{
        //echo "NO CODE";
        echo '操作失败！';
        exit;
        //写入日记文件
    }
  if(!$openid){
 	echo "<script>";
 	echo "window.location.href='http://szxytang.com/yin/za/SZJTW/szjt3/getcodeurl.php';";
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
	<title>我的交通 我的心愿</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<style>
	body{
		margin: 0px;
		padding: 0px;
		font-family: "微软雅黑";
		overflow: hidden;
		background: #046EB8;
	}
	.box{
    	width: 100%;
        margin: 0px;
        padding: 0px;
		position: absolute;
		background: #046EB8;
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
#name{
	position:absolute;
	left:13%;
	top:65%;
	width:74%;
	height: 26px;
	font-size:13px;
	border:0;
	z-index: 999;
	text-align: center;
}
#tel{
	position:absolute;
	left:13%;
	top:76%;
	width:74%;
	height: 26px;
	font-size:13px;
	border:0;
		z-index: 99;
		text-align: center;
}
#xy{
	position:absolute;
	left:13%;
	top:46%;
	width:74%;
	height: 70px;
	font-size:13px;
	border:0;
	z-index: 99;
	padding: 5px;
}
.bn{
	position:absolute;
	left:37%;
	top:86%;
	width:26%;
	height: 40px;
	font-size:18px;
	border-radius: 3px;
	z-index: 999;
	opacity: 0;
}
#tu{
    width: 100%;
    z-index: -2;
}
#cg{
    width: 100%;
    z-index: 1000;
    display: none;
    position: absolute;
    top: 0;
    left: 0;
}
#cha{
width:60%;
height:50px;
position:absolute;
top:88%;
left:20%;
z-index:1001;
display: none;
background:;
	}
	</style>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
</head>
<body>
	<div id="box" class="box">
	<img src="images/lhbg.jpg" alt="" id="tu">
	<img src="images/cg.jpg" alt="" id="cg" style="<?php if ($row){echo 'display: block';} ?>" onclick="ts()">
	<a href="http://szxytang.com/yin/za/SZJTW/szjtzhan2"><div id="cha" style="<?php if ($row){echo 'display: block';} ?>"></div></a>
		<form action="add.php" method="POST">
		<input type="hidden" name="openid" value="<?php echo $openid; ?>">
		<input type="hidden" name="tou" value="<?php echo $wximg; ?>">
		<input type="hidden" name="nichen" value="<?php echo $wxname; ?>">
		<textarea name="xy" id="xy" cols="30" rows="10"></textarea>
		<input type="text" name="name" id="name">
		<input type="tel" name="tel" id="tel">
		<input class="bn" name="sub" type="button" value="点击领奖">
		</form>
	</div>
</body>
</html>
<script>
	function ts () {
		alert('赶紧点击右上角分享给朋友们为您点赞吧！')
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
    				if(m=='xy'){
    					alert("请输入中文！");
    				}
    				if(m=='name'){
    					alert("请填写正确的姓名！");
    				}
    				if(m=='ok'){
    					// alert("留言成功！");
    					location.href="http://szxytang.com/yin/za/SZJTW/szjt3/getcodeurl.php"
    					// $("#one").html(m);
    					// document.getElementById('one').style.display='none';
    					// document.getElementById('cg').style.display='block';
    					// document.getElementById('cha').style.display='block';
    					// $("#tu").attr("src","images/lhbg2.jpg");
    				}    				
    				if(m=='tel'){
    					alert("手机号格式不正确！");
    				}    				

    				if(m==-1){
    					alert("请完善信息！");
    					location.href="http://szxytang.com/yin/za/SZJTW/szjt3/getcodeurl.php"
    				}
    				if(m==-2){
    					alert("插入数据库失败！");
    					location.href="http://szxytang.com/yin/za/SZJTW/szjt3/getcodeurl.php"
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
		var idd="<?php echo $id; ?>"
		var shareinfo={
			<?php 
			if (!$id){
 ?>
title: '我的交通 我的心愿',
		    desc: '来许愿吧',
		    link: 'http://szxytang.com/yin/za/SZJTW/szjt3/getcodeurl.php',
		    imgUrl: 'http://szxytang.com/yin/za/SZJTW/share.jpg'
 <?php
			}else{
 ?>				
		 	title: '我的交通 我的心愿',
		    desc: '来许愿吧',
		    link: 'http://szxytang.com/yin/za/SZJTW/szjtzhan2/other/getcodeurl.php?id='+idd,
		    imgUrl: 'http://szxytang.com/yin/za/SZJTW/share.jpg'
		   
		   <?php   }?>


		  }
		  // wx.hideOptionMenu();
      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>
<!--结束-->