<?php
	 require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <!-- <link rel="stylesheet" href="./css/index.css"> -->
    <title>端午淘金，致谢家人</title>
    <!-- Bootstrap -->
    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
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
		left:14%;
		top:38.5%;
		width:34%;
		height: 3.8%;
		line-height: 3.8%;
		text-align: center;
		font-size:13px;
		border: 1px solid red;
		border-radius: 5px;
		background: transparent;
		}
	.tel{
		position:absolute;
		left:59%;
		top:38.5%;
		width:34%;
		height: 3.8%;
		line-height: 3.8%;
		text-align: center;
		font-size:13px;
		border: 1px solid red;
		border-radius: 5px;
		background: transparent;
		}
	.bn{
		position:absolute;
		left:33%;
		top:55%;
		width:34%;
		height: 25px;
		border-radius:5px;
		opacity: 1;
		font-size:18px;
		z-index: 100;
		color: white;
	}
	#tu{
	    width: 100%;
	}
	.modal-dialog{
		margin-top:40%;
	}
	.nan{
		position: absolute;
		top:49.3%;
		left:14.2%;
	}
	.nv{
		position: absolute;
		top:49.3%;
		left:38.5%;
	}
	.nvn{
		position: absolute;
		top:49.3%;
		left:63%;
	}
	.fd{
		float: left;
	}
	.fd2{
		float: left;
	}
	.fd3{
		float: left;
	}
	</style>
<body>
	<div class="box">
	<img id="tu" src="images/bg.jpg">
	<form action="add.php" method="POST">
		<input class="name" type="text" name="name">
		<label class="nan"><input class="fd" type="radio" name="sex" value="28" checked="checked"/><div class="fd" style="width:50px;height:20px;"></div></label>
        <label class="nv"><input class="fd2" type="radio" name="sex" value="29" /><div class="fd2" style="width:50px;height:20px;"></div></label>
        <label class="nvn"><input class="fd3" type="radio" name="sex" value="30" /><div class="fd3" style="width:50px;height:20px;"></div></label>
		<input class="tel" type="tel" name="tel">	
		<input class="bn" name="sub" type="button" value="提交">
	</form>
	</div>
</body>
<script src="./lib/jquery/jquery.min.js"></script>
<script src="./lib/bootstrap/js/bootstrap.js"></script>
<script src="js/dialog.js"></script>
</html>
<script>
	$("input[name='sub']").on("click",function(){
		$.ajax({
		url:'add.php',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){
			if(m=='chong'){
				Alert("请勿重复提交！");
			}
			if(m=='ok'){
				Alert("报名成功！");
				$("input[name='name']").val('');
				$("input[name='tel']").val('');
			}  
			if(m=='m'){
				Alert("此日期已预约满，请重新选择！");

			}    				
			if(m=='tel'){
				Alert("手机号格式不正确！");
			}    				
			if(m=='wan'){
				Alert("请完善信息！");
			}
			if(m=='sb'){
				Alert("插入数据库失败！");
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
	 	 title: '端午淘金，致谢家人',
	      desc: '龙湖·水晶郦城端午大奖疯狂送',
	      link: 'http://szxytang.com/yin/bm/lh0526',
	      imgUrl: 'http://szxytang.com/yin/bm/lh0526/share.jpg'}
	      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
	  });
</script>