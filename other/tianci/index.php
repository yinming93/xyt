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
 	echo "window.location.href='http://szxytang.com/yin/za/tianci/getcodeurl.php';";
 	echo "</script>";
 	exit;
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
	<title>趣味填字 智商爆表</title>
</head>
<script>
var c=0;
var t;	
function timedCount(){
document.getElementById('demo').value=c;
c=c+1;
t=setTimeout("timedCount()",10);
}
</script>
<style>
	body{
		padding:0;
		margin:0;
		font-family: "微软雅黑";
		background: #C30D23;
	}
	.bn{
		width: 40%;
		height: 3%;
		border: 0; 
		position: absolute;
		top: 48%;
		left: 30%;
		background: url('an.png') no-repeat;
		background-size: 100% 100%;
	}
	.txt{
		width: 6.5%;
		height: 1.6%;
		font-size: 11px;
		color:red;
		border: 0;
		background: transparent;
	}
	#tx1{
		position:absolute;
		top: 17.1%;
		left: 8.8%;
	}
	#tx2{
		position:absolute;
		top: 18.7%;
		left: 41.5%;
	}
	#tx3{
		position:absolute;
		top: 18.7%;
		left: 61.4%;
	}
	#tx4{
		position:absolute;
		top: 18.7%;
		left: 81%;
	}
	#tx5{
		position:absolute;
		top: 20.4%;
		left: 8.8%;
	}
	#tx6{
		position:absolute;
		top: 23.6%;
		left: 28.4%;
	}
	#tx7{
		position:absolute;
		top: 26.8%;
		left: 41.5%;
	}
	#tx8{
		position:absolute;
		top: 26.8%;
		left: 54.5%;
	}
	#tx9{
		position:absolute;
		top: 26.8%;
		left: 61.4%;
	}
	#tx10{
		position:absolute;
		top: 30.1%;
		left: 8.8%;
	}
	#tx11{
		position:absolute;
		top: 30.1%;
		left: 21.8%;
	}
	#tx12{
		position:absolute;
		top: 31.7%;
		left: 35.1%;
	}
	#tx13{
		position:absolute;
		top: 31.7%;
		left: 74.5%;
	}
	#tx14{
		position:absolute;
		top: 35%;
		left: 67.6%;
	}
	#tx15{
		position:absolute;
		top: 36.6%;
		left: 48.3%;
	}
	#tx16{
		position:absolute;
		top: 38.3%;
		left: 81%;
	}
	#tx17{
		position:absolute;
		top: 35%;
		left: 8.8%;
	}
	#tx18{
		position:absolute;
		top: 38.2%;
		left: 15.2%;
	}
	#tx19{
		position:absolute;
		top: 38.2%;
		left: 28.2%;
	}
	#tx20{
		position:absolute;
		top: 39.9%;
		left: 48.2%;
	}
	#demo{
		opacity: 0;
		background: yellow;
		position: absolute;
		top: 0;
		left: 0;
	}
	#bma{
		width: 90%;
		height: 25%;
		background: black;
		opacity: 0.9;
		position: absolute;
		border-radius: 5px;
		top: 27%;
		left: 5%;
		display: none;
	}
	#name{
		width: 70%;
		height: 30px;
		margin-left: 15%;
		margin-top: 20%;
		border-radius: 5px;
	}
	#tel{
		width: 70%;
		height: 30px;
		margin-left: 15%;
		margin-top: 5%;
		border-radius: 5px;
	}
	.bnn{
		background: red;
		color: white;
		width: 70%;
		height: 30px;
		border: 0; 
		margin-left: 15%;
		margin-top: 8%;
		border-radius: 5px;
	}
</style>
<body onload="timedCount();">
	<div style="width:100%;position:absolute;top:0;left:0;">
		<img src="bg.jpg" alt="" style="width:100%;display:block">
		<div class="bn" onclick="bmbm();"></div>
			<form action="add.php" method="POST">
				<input type="text" id="tx1" class="txt" maxlength="1" q="龙">
				<input type="text" id="tx2" class="txt" maxlength="1" q="湖">
				<input type="text" id="tx3" class="txt" maxlength="1" q="九">
				<input type="text" id="tx4" class="txt" maxlength="1" q="墅">
				<input type="text" id="tx5" class="txt" maxlength="1" q="天">
				<input type="text" id="tx6" class="txt" maxlength="1" q="玺">
				<input type="text" id="tx7" class="txt" maxlength="1" q="地">
				<input type="text" id="tx8" class="txt" maxlength="1" q="铁">
				<input type="text" id="tx9" class="txt" maxlength="1" q="口">
				<input type="text" id="tx10" class="txt" maxlength="1" q="区">
				<input type="text" id="tx11" class="txt" maxlength="1" q="府">
				<input type="text" id="tx12" class="txt" maxlength="1" q="旁">
				<input type="text" id="tx13" class="txt" maxlength="1" q="最">
				<input type="text" id="tx14" class="txt" maxlength="1" q="后">
				<input type="text" id="tx15" class="txt" maxlength="1" q="两">
				<input type="text" id="tx16" class="txt" maxlength="1" q="栋">
				<input type="text" id="tx17" class="txt" maxlength="1" q="御">
				<input type="text" id="tx18" class="txt" maxlength="1" q="景">
				<input type="text" id="tx19" class="txt" maxlength="1" q="王">
				<input type="text" id="tx20" class="txt" maxlength="1" q="座">
				<div id="bma">
				<input type="text" name="ttt" id="demo">
				<input type="text" name="name" id="name" placeholder="请输入姓名">
				<input type="tel" name="tel" id="tel" placeholder="请输入电话">
				<input class="bnn" name="sub" type="button" value="提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交">
				</div>
			</form>
		
	</div>
	<a href="http://9e08a994a1bb.vxplo.cn/idea/yBR41EL"><p style="width:80%;position: absolute; top:246%;left:10%;z-index:2000; color:white;text-align:center;font-size:12px;">技术支持：信玉堂|草帽互动</p></a>
</body>
</html>
<script>
	$(".txt").blur(function(){
		var xie=$(this).val();
		var ans=$(this).attr("q");
		if (xie!=ans){
			alert('这个字不对哦！');
			$(this).val("");
		}
	})
	function bmbm(){
		var t1 = $("#tx1").val();var t8 = $("#tx8").val();var t15 = $("#tx15").val();
		var t2 = $("#tx2").val();var t9 = $("#tx9").val();var t16 = $("#tx16").val();
		var t3 = $("#tx3").val();var t10 = $("#tx10").val();var t17 = $("#tx17").val();
		var t4 = $("#tx4").val();var t11 = $("#tx11").val();var t18 = $("#tx18").val();
		var t5 = $("#tx5").val();var t12 = $("#tx12").val();var t19 = $("#tx19").val();
		var t6 = $("#tx6").val();var t13 = $("#tx13").val();var t20 = $("#tx20").val();
		var t7 = $("#tx7").val();var t14 = $("#tx14").val();
		if(!t1||!t2||!t3||!t4||!t5||!t6||!t7||!t8||!t9||!t10||!t11||!t12||!t13||!t14||!t15||!t16||!t17||!t18||!t19||!t20){
			alert('你还未完成填词！');
			return false;
		}
		$("#bma").css("display","block");
	}
</script>
<script>
$("input[name='sub']").on("click",function(){
	$.ajax({
	url:'add.php',
	data:$('form').serialize(),
	type:'POST',
	success:function(m){
		if(m=='name'){
			alert("请填写正确的姓名！");
		}
		if(m=='ok'){
			alert("提交成功！");
			window.location.href="sel.php";
		}    				
		if(m=='tel'){
			alert("手机号格式不正确！");
		} 
		if(m=='shua'){
			alert("恭喜你刷新成绩！");
			window.location.href="sel.php";
		} 
		if(m=='nu'){
			alert("请继续加油！");
			window.location.href="sel.php";
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
		 	 title: '趣味填字 智商爆表',
		      desc: '填字赢好礼',
		      link: 'http://szxytang.com/yin/za/tianci/getcodeurl.php',
		      imgUrl: 'http://szxytang.com/yin/za/tianci/share.jpg'}
		      wx.onMenuShareTimeline(shareinfo);
		 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>