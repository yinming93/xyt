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
    <title>中粮“超市大赢家”周末来袭！你嗨购，我买单！</title>
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
		left:39.5%;
		top:51.5%;
		width:38%;
		height: 4.5%;
		line-height: 24px;
		text-align: center;
		font-size:15px;
		border: 0px solid black;
		border-radius: 5px;
		background: transparent;
		}
	.tel{
		position:absolute;
		left:39.5%;
		top:58.5%;
		width:38%;
		height: 4.5%;
		line-height: 24px;
		text-align: center;
		font-size:15px;
		border: 0px solid black;
		border-radius: 5px;
		background: transparent;
		}
	.bn{
		position:absolute;
		left:27%;
		top:67%;
		width:54%;
		height: 40px;
		border-radius:1px;
		background-size: 100% 100%;
		background-repeat:no-repeat;
		opacity: 0;
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
		top:48%;
		left:35%;
	}
	.nv{
		position: absolute;
		top:48%;
		left:65%;
	}
	</style>
<body>
	<div class="box">
	<img id="tu" src="images/bg.jpg">
	<form action="add.php" method="POST">
		<input class="name" type="text" name="name">
		<!-- <label class="nan"><input type="radio" name="sex" value="男" checked="checked"/>男</label>
        <label class="nv"><input type="radio" name="sex" value="女" />女</label> -->
		<input class="tel" type="tel" name="tel">	
		<input class="bn" name="sub" type="button">
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
				Alert("报名人数已满！");
				$("input[name='name']").val('');
				$("input[name='tel']").val('');
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
	 	 title: '中粮“超市大赢家”周末来袭！你嗨购，我买单！',
	      desc: '点击即可报名',
	      link: 'http://szxytang.com/yin/bm/zl0608',
	      imgUrl: 'http://szxytang.com/yin/bm/zl0608/share.jpg'}
	      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
	  });
</script>