<?php
	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
	
	include 'DBCon.php';
	$sql="select count(*) as count from $tbname where Name<>'' and Phone<>'' and Code<>''";
	$query=mysql_query($sql);
	$row=mysql_fetch_assoc($query);
	$count=$row['count'];
	
	$sqlall="select * from $tbname where Name<>'' and Phone<>'' and Code<>'' order by Code ,Time";
	$queryall=mysql_query($sqlall);

	$Num=0;
	
	
?>
<!DOCTYPE html>
<html>
<head>
    <title>拼梵高名画九宫格，赢阿尔勒精美礼品！</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="max-age=0" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">	
	<script src="js/jquery.js"></script>
	<style>
	
		*{
			margin:0;
			padding:0;
		}
	
		 .formdiv{
			display: blcok;
			width: 80%;
			position: absolute;
			top: 36%;
			left:12%;
			z-index: 1000;
		}	
		
		input.labelauty + label { font: 12px "Microsoft Yahei";}
		
		
		.inputa{ 
			border:1px solid #fff; 
			height:20px; 
			line-height:20px;  
			width:63%; 
			background:#fff;
			-moz-border-radius: 0.2em; 
			-webkit-border-radius:0.2em;  
			border-radius:0.2em;
			padding:1%;color:#000; 			
		}
			
			
		.btn{
			width:35%; 
			border:1px solid #fff; 
			height:27px; 
			line-height:25px;
			background:none; 
			-moz-border-radius: 0.2em; 
			-webkit-border-radius:0.2em;  
			border-radius:0.2em; 
			color:#fff; 
			font-size:13px; 
		}
		
		.title{ width:57%; margin:0 auto; padding:2% 0; padding-left:5%; text-align:left; font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#fff;}
		.name{ width:80%; margin:0 auto; padding:2% 0; padding-top:5%; text-align:left; font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#fff;}
		.tel{ width:80%; margin:0 auto; padding-top:5%; text-align:left;  font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#fff;}
		.add{ width:80%; margin:0 auto; padding:2% 0; padding-top:5%; text-align:left; font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#fff;}
		.ck{ width:80%; margin:0 auto; padding:2% 0; padding-top:5%; text-align:left; font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#fff;}
		.btnboxb{width:100%;text-align:center;padding:5% 0; padding-top:8%;}
	</style>
	
	
	
	
	
	
	
</head>
<body>

<div style="position:absolute; background-image:url(images/bg.jpg); background-size:100% 100%; width:100%; height:100%;" >
	
	
	<div id="div2"  style="display:block; position:absolute; overflow:auto; width:90%; height:78%; left:7%; top:10%; z-index:9999; background-color:none; border:0px #8B5A00 solid;  border-radius:8px; opacity:0.8; " >
		<table style="padding-left:3%; padding-top:3%; padding-bottom:3%; ">
			<tr>
				<td style="width:15%; height:30px; align:center; color:#000;">排名</td>
				<td style="width:25%; height:30px; align:center; color:#000;">姓名</td>
				<td style="width:25%; height:30px; align:center; color:#000;">成绩</td>
				<td style="width:60%; height:30px; align:center; color:#000;">完成时间</td>
			<tr>
			<?php while($rowall=mysql_fetch_assoc($queryall)){ $Num++ ?>
			<tr>
				<td style="width:50px; height:25px; align:center; color:#000;"><?php echo $Num ?></td>
				<td style="width:90px; height:25px; align:center; color:#000;"><?php echo $rowall['Name'] ?></td>
				<td style="width:90px; height:25px; align:center; color:#000;"><?php echo $rowall['Code'] ?></td>
				<td style="width:190px; height:25px; align:center; color:#000;"><?php echo $rowall['Time'] ?></td>
			</tr>
			<?php } ?>
		</table>

	</div> 
</body>
</html>

<script>
		//表单
	  function check(){ 
		
	  //验证姓名 
		var username1 = document.getElementById("nam"); 
		if(username1.value.length==0){ 
		   alert("姓名不能为空！"); 
		   username1.focus(); //当判断为空时，会自动将焦点聚焦在这里
		   return false; 
		} 
		  if(username1.value.length<2||username1.value.length>18){ 
			alert("姓名长度不能低于2位和大于18位！"); 
			username1.focus(); 
			return false; 
		} 

	  //验证手机号码的 
	  var tel1 = document.getElementById("tel"); 
	  var pattern= /^1[34758]\d{9}$/ 

	  if(tel1.value.length==0){ 
		 alert("请输入你的手机号码！"); 
		 tel.focus(); 
		 return false; 
	  } 
	  if(!pattern.test(tel.value)) {  
		 alert("你输入的手机号码无效，请重新输入！"); 
		 tel1.value=""; 
		 tel1.focus(); 
		 return false;  
	  } 
	  
	  //验证地址
		var address = document.getElementById("add"); 
		if(address.value.length==0){ 
		   alert("地址不能为空！"); 
		   address.focus(); //当判断为空时，会自动将焦点聚焦在这里
		   return false; 
		} 	  
	  
}


	  //验证身份证 
		/*var iden1 = document.getElementById("iden"); 
		if(iden1.value.length==0){ 
		   alert("身份证号不能为空！"); 
		   iden1.focus(); //当判断为空时，会自动将焦点聚焦在这里
		   return false; 
		} 
		  if(iden1.value.length<2||iden1.value.length>19){ 
			alert("身份证号长度不能低于2位和大于19位！"); 
			iden1.focus(); 
			return false; 
		}*/
</script>
<!--开始-->
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script>
		wx.config({
			debug: false,
			appId: '<?php echo $signPackage["appId"];?>',
			timestamp: <?php echo $signPackage["timestamp"];?>,
			nonceStr: '<?php echo $signPackage["nonceStr"];?>',
			signature: '<?php echo $signPackage["signature"];?>',
			jsApiList: [
			 //所有要调用的 API 都要加到这个列表中
						'onMenuShareAppMessage',
						'onMenuShareTimeline'
						]
		});
	  
	    wx.ready(function(){
	    //在这里调用 API

		
		
			wx.onMenuShareTimeline({
				title: '拼梵高名画九宫格，赢阿尔勒精美礼品！', // 分享标题
				link: 'http://xyt.xy-tang.com/2016hj/pintu/', // 分享链接
				imgUrl: 'http://xyt.xy-tang.com/2016hj/pintu/share.jpg', // 分享图标
				success: function () { 
					// 用户确认分享后执行的回调函数
					//window.location.href = 'http://www.baidu.com';
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
			  title:  '拼梵高名画九宫格，赢阿尔勒精美礼品！',
			  desc:   '梵高名画你认识几幅，赶快来挑战！',
			  link: 'http://xyt.xy-tang.com/2016hj/pintu/', // 分享链接
			  imgUrl: 'http://xyt.xy-tang.com/2016hj/pintu/share.jpg', // 分享图标
			  trigger: function (res) {
				//alert('用户点击发送给朋友');
			  },
			  success: function (res) {
				//alert('已分享');
			  },
			  cancel: function (res) {
				//alert('已取消');
			  },
			  fail: function (res) {
				//alert(JSON.stringify(res));
			  }
			});
		
	    });
		
		//debug
		wx.error(function(res){
		  alert(res.errMsg);
		});
	
	</script>
<!--结束-->
