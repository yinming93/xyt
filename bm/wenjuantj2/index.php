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
 	echo "window.location.href='http://szxytang.com/yin/za/wenjuantj2/getcodeurl.php';";
 	echo "</script>";
 	exit;
 	}
 if ($row){
	echo "<script>";
	echo "window.location.href='http://szxytang.com/yin/za/wenjuantj2/result/index.php';";
	echo "alert('你已参加过投票');";
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
<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
	<title>仁恒杯.羽球联赛 冠军猜猜猜</title>
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
		height: 50px;
		border: 0; 
		border-radius: 5px;
		position: absolute;
		top:92%;
		left: 15%;
		opacity: 0;
	}
	#o1{
		position: absolute;
		top:64.8%;
		left:19%;
		width: 50%;
		height: 1.5%;
		border: 0px solid red;
	}
	#o2{
		position: absolute;
		top:67.5%;
		left:19%;
		width: 50%;
		height: 1.5%;
		border: 0px solid red;
	}
	#o3{
		position: absolute;
		top:70.1%;
		left:19%;
		width: 50%;
		height: 1.5%;
		border: 0px solid red;
	}
	#o4{
		position: absolute;
		top:72.8%;
		left:19%;
		width: 50%;
		height: 1.5%;
		border: 0px solid red;
	}
	#o5{
		position: absolute;
		top:75.4%;
		left:19%;
		width: 50%;
		height: 1.5%;
		border: 0px solid red;
	}
	#o6{
		position: absolute;
		top:78.1%;
		left:19%;
		width: 50%;
		height: 1.5%;
		border: 0px solid red;
	}
	#o7{
		position: absolute;
		top:80.7%;
		left:19%;
		width: 50%;
		height: 1.5%;
		border: 0px solid red;
	}
	#o8{
		position: absolute;
		top:83.3%;
		left:19%;
		width: 50%;
		height: 1.5%;
		border: 0px solid red;
	}
	
	.name{
		position: absolute;
		top:86.6%;
		left: 32%;
		width: 49%;
		height: 1.5%;
		background: transparent;
		border: 0px;
	}
	.tel{
		position: absolute;
		top:88.4%;
		left: 32%;
		width: 49%;
		height: 1.5%;
		background: transparent;
		border: 0px;
	}
</style>
<body>
	<div style="width:100%;position:absolute;top:0;left:0;">
		<img src="bg.jpg" alt="" style="width:100%;display:block">
		<a href="http://9e08a994a1bb.vxplo.cn/idea/yBR41EL"><p style="width:80%;position: absolute; top:98%;left:10%;z-index:2000; color:white;text-align:center;font-size:12px;">技术支持：信玉堂|草帽互动</p></a>

		<form action="add.php" method="POST">

		<label id="o1"><input name="fruit" type="radio" value="1" checked="checked" /></label> 
		<label id="o2"><input name="fruit" type="radio" value="2" /></label> 
		<label id="o3"><input name="fruit" type="radio" value="3" /></label> 
		<label id="o4"><input name="fruit" type="radio" value="4" /></label> 
		<label id="o5"><input name="fruit" type="radio" value="5" /></label> 
		<label id="o6"><input name="fruit" type="radio" value="6" /></label> 
		<label id="o7"><input name="fruit" type="radio" value="7" /></label> 
		<label id="o8"><input name="fruit" type="radio" value="8" /></label> 

		<input type="hidden" name="openid" value="<?php echo $openid;?>">
		<input type="text" name="name" class="name" placeholder="请输入姓名">
		<input type="tel" name="tel" class="tel" placeholder="请输入电话">
		<input class="bnn" name="sub" type="button" value="提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交">

		</form>
		
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
		// alert(m);return false;
		if(m=='ok'){
			alert("提交成功！");
			window.location.href="./result/index.php";
		}    								
		if(m==-1){
			alert("请完善信息！");
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
       title: '仁恒杯.羽球联赛 冠军猜猜猜',
          desc: '冠军猜得准 奖品拿的稳',
          link: 'http://szxytang.com/yin/za/wenjuantj2/getcodeurl.php',
          imgUrl: 'http://szxytang.com/yin/za/wenjuantj2/share.jpg'}
          wx.onMenuShareTimeline(shareinfo);
     wx.onMenuShareAppMessage(shareinfo);
      });
    </script>