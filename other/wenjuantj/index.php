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
 	echo "window.location.href='http://szxytang.com/yin/za/wenjuantj/getcodeurl.php';";
 	echo "</script>";
 	exit;
 	}
 if ($row){
	echo "<script>";
	echo "window.location.href='http://szxytang.com/yin/za/wenjuantj/result/index.php';";
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
	<title>中粮U粮+社区提升计划，正式启幕！</title>
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
		top:94%;
		left: 15%;
		opacity: 0;
	}
	.oo{
		width: 40%;
		height: 11%;
		/*border: 1px solid red;*/
	}
	#o1{
		position: absolute;
		top:17.2%;
		left: 6.5%;
	}
	#o2{
		position: absolute;
		top:17.2%;
		left: 53%;
	}
	#o3{
		position: absolute;
		top:30.2%;
		left: 6.5%;
	}
	#o4{
		position: absolute;
		top:30.2%;
		left: 53%;
	}
	#o5{
		position: absolute;
		top:43%;
		left: 6.5%;
	}
	#o6{
		position: absolute;
		top:43%;
		left: 53%;
	}
	#o7{
		position: absolute;
		top:55.8%;
		left: 6.5%;
	}
	#o8{
		position: absolute;
		top:55.8%;
		left: 53%;
	}
	#o9{
		position: absolute;
		top:68.8%;
		left: 6.5%;
	}
	#o10{
		position: absolute;
		top:68.8%;
		left: 53%;
	}
	#o11{
		position: absolute;
		top:81.6%;
		left: 6.5%;
	}
	#o12{
		position: absolute;
		top:81.6%;
		left: 53%;
	}
	.name{
		width: 70%;
		height: 40px;
		border-radius: 5px;
		margin-top: 10%;
		margin-left: 15%;
		border: 1px solid #abcdef;
	}
	.tel{
		width: 70%;
		height: 40px;
		border-radius: 5px;
		margin-top: 5%;
		margin-left: 15%;
		border: 1px solid #abcdef;
	}
</style>
<body>
	<div style="width:100%;position:absolute;top:0;left:0;">
		<img src="bg.jpg" alt="" style="width:100%;display:block">
		<a href="http://9e08a994a1bb.vxplo.cn/idea/yBR41EL"><p style="width:80%;position: absolute; top:98%;left:10%;z-index:2000; color:white;text-align:center;font-size:12px;">技术支持：信玉堂|草帽互动</p></a>
		<div class="bn" onclick="bmbm();"></div>
		<form action="add.php" method="POST">
		<label id="o1" class="oo"><input name="fruit[]" type="checkbox" value="1" /></label> 
		<label id="o2" class="oo"><input name="fruit[]" type="checkbox" value="2" /></label> 
		<label id="o3" class="oo"><input name="fruit[]" type="checkbox" value="3" /></label> 
		<label id="o4" class="oo"><input name="fruit[]" type="checkbox" value="4" /></label>
		<label id="o5" class="oo"><input name="fruit[]" type="checkbox" value="5" /></label> 
		<label id="o6" class="oo"><input name="fruit[]" type="checkbox" value="6" /></label>
		<label id="o7" class="oo"><input name="fruit[]" type="checkbox" value="7" /></label>
		<label id="o8" class="oo"><input name="fruit[]" type="checkbox" value="8" /></label>
		<label id="o9" class="oo"><input name="fruit[]" type="checkbox" value="9" /></label>
		<label id="o10" class="oo"><input name="fruit[]" type="checkbox" value="10" /></label>
		<label id="o11" class="oo"><input name="fruit[]" type="checkbox" value="11" /></label>
		<label id="o12" class="oo"><input name="fruit[]" type="checkbox" value="12" /></label>
		<input type="hidden" name="openid" value="<?php echo $openid;?>">
		<div id="di1" style="width:100%;height:100%;background:black;position:fixed;top:00%;left:0%;opacity:0.9;">
		</div>
		<div id="di2" style="width:80%;height:300px;background:white;border-radius:5px;position:fixed;top:20%;left:10%;">
				<span style="width:100%;height:50px;text-align:center;display:block;line-height:50px;font-size:16px;font-weight:bold;border-bottom:1px solid grey;">请完善信息</span>
				<input type="text" name="name" class="name" placeholder="请输入姓名">
				<input type="tel" name="tel" class="tel" placeholder="请输入电话">
				<div style="width:30%;height:40px;text-align:center;line-height:40px;background:#33B1E5;border-radius:5px;margin-left:35%;margin-top:15%;color:white;" onclick="qra();">确&nbsp;&nbsp;&nbsp;定</div>
			</div>
		<input class="bnn" name="sub" type="button" value="提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交">
		</form>
		
	</div>
	<!-- <a href="http://9e08a994a1bb.vxplo.cn/idea/yBR41EL"><p style="width:80%;position: absolute; top:255%;left:10%;z-index:2000; color:white;text-align:center;font-size:12px;">技术支持：信玉堂|草帽互动</p></a> -->
</body>
</html>
<script>
function qra(){
	var nnn = $(".name").val();
	var ttl = $(".tel").val();
	if(!nnn||!ttl){
		alert("请完善信息！");
	}else if(ttl.length!=11){
		alert("手机号错误！");
	}else{
		$("#di1").css("display","none");
		$("#di2").css("display","none");
	}

}
$("input[name='fruit[]']").on("click",function(){
	var len = $("input[name='fruit[]']:checked").length;
	if(len>5){
	alert("只有选中5个哦！");
	return false;
	}
})

$("input[name='sub']").on("click",function(){
	var len = $("input[name='fruit[]']:checked").length;
	// alert(len);return false;
	if(len!=5){
	alert("只有选中5个才能提交");
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
		 	 title: '中粮U粮+社区提升计划，正式启幕！',
		      desc: '点击即可参与，一起携手创造更好的生活吧',
		      link: 'http://szxytang.com/yin/za/wenjuantj/getcodeurl.php',
		      imgUrl: 'http://szxytang.com/yin/za/wenjuantj/share.jpg'}
		      wx.onMenuShareTimeline(shareinfo);
		 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>