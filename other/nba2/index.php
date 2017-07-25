<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="/www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>画舫类型测试答题</title>
<link type="text/css" rel="Stylesheet" href="css/imageflow.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/imageflow.js"></script>
<link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
	.name{
		width: 90%;
		height: 30px;
		margin-left: 5%;
		margin-top: 10%;
		border-radius: 5px;
		border: 0;
		color:black;
	}
	.bn{
		width: 60%;
		height: 38px;
		margin-left: 20%;
		margin-top: 20%;
		border: 1;
		border-radius: 5px;
		background: white;
		color:black;
	}
</style>
<body>
<img src="bg.jpg" style="width:100%;height:100%;position:absolute;top:0;left:0;" alt="" />
<h3>XXX答题</h3>
  <!--效果html开始-->
  <div id="LoopDiv" style="width:100%;">
    <input id="S_Num" type="hidden" value="8" />
    <div id="starsIF" class="imageflow" style="margin-left:10.5%;"> 
		<img src="images/1.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/2.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/3.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/4.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/5.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/6.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/7.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/8.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/9.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/10.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/11.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/12.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/13.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/14.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/15.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/16.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/17.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/18.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/19.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/20.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/21.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/22.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/23.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/24.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
		<img src="images/25.jpg" longdesc="#" width="280" height="280" alt="Picture" /> 
    </div>
  </div>
  <!--效果html结束-->
  <!-- 填写姓名部分开始 -->
  <div id="mz" style="width:20%;height:300px;background:transparent;position:absolute;left:40%;top:56%;z-index:999;color:white;border-radius:5px;">
  <br />
  <br />
  <br />
  <center><h4 style="color:black;"></h4></center><br />
  	<form action="add.php" method="POST">
		<input class="name" type="text" name="name" placeholder="请输入你的姓名">
		<input class="bn" name="sub" type="button" value="确定">
	</form>
  </div>
  <!-- 填写姓名部分结束 -->
  <!-- 开始按钮 -->
  <a href="index2.php"><div id="kai" style="width:10%;height:40px;background:#E8E8E8;position:absolute;bottom:50px;left:45%;text-align:center;line-height:40px;color:black;font-size:15px;display:none;border-radius:5px;">开&nbsp;&nbsp;&nbsp;始</div></a>
  <!-- 开始按钮结束 -->
  <div class="clear"></div>
</body>
</html>
<script src="./lib/jquery/jquery.min.js"></script>
<script src="./lib/bootstrap/js/bootstrap.js"></script>
<script src="js/dialog.js"></script>
<script>
$("input[name='sub']").on("click",function(){
	$.ajax({
	url:'add.php?a=first',
	data:$('form').serialize(),
	type:'POST',
	success:function(m){
		if(m=='rep'){
			Alert("请勿重复提交！");
		}
		if(m=='ok'){
			$("#mz").css("display","none");
			$("#kai").css("display","block");
		}
		if(m==-1){
			Alert("请输入您的姓名！");
		}if(m=='name'){
			Alert("请输入正确姓名！");
		}
		if(m==-2){
			Alert("插入数据库失败！");
		}
	}
	});
});
</script>