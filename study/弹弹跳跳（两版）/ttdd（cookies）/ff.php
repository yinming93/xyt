
<!doctype html>
<html>
	<head>
		<title>活动报名</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
	
	<style>
		*{
			margin:0;
			padding:0;
		}
		
		body{
			/*background:url(bg.jpg) repeat;
			background-size:100%;*/
			color: black;
		}
		
		.main1{
			margin:0 auto;
			width:240px;
			height:200px;
			/* border:1px solid red; */
			text-align:center;
			/* color:white; */
			font-size:16px;
			
			
			position:absolute;
			top:26%;
			left:10%;
			
		
			/* background-color: grey; */
		}
		
		.tj{
			
			width: 100px;
			height: 30px;
			border: 0; 
			/*
			border-radius: 5px;
			*/
			background:url(img/tj.jpg) no-repeat 50%;
		}
		
		.dk{
			/* width: 80px;
			height: 40px; */
			/* border: 1px solid red; */
			border-radius: 5px;
			/* background: grey; */
			margin-top: 5px;
		}
		
		p input{
			width: 150px;
			height: 30px; 
			border: 1px solid grey;
		}
		
		input{
			width: 30px;
			height: 20px; 
			border: 1px solid grey;
		}
		
		.bodybg{
			position:absolute;
			width:100%;
			height:100%;
		}
		
		.dj1{
			width: 100px;
			height: 35px; 
			/* border: 1px solid red; */
			position:absolute;
			bottom:47%;
			
			left:50%;
			margin-left:-50px;
		}
		
		.dj2{
			width: 100px;
			height: 35px; 
			/* border: 1px solid red; */
			position:absolute;
			bottom:24%;
			
			left:50%;
			margin-left:-50px;
		}
		
		.fh{
			width: 50px;
			height: 20px;
			margin: 30px auto 0px auto; 
			border: 2px solid #FCD080;
			border-radius: 10px;
			text-align: center;
			
			font-size: 14px;
			font-weight: 900;
			line-height: 20px;
		}
		
		.xx{
			width: 200px;
			height: 30px;
			margin: 0 auto; 
			/* border: 2px solid #FFFFFF; */
			border-radius: 10px;
			text-align: center;
			
			font-size: 18px;
			font-weight: 900;
			line-height: 30px;
			
		}
		#zi{
			font-size: 14px;
			font-family: 黑体;
			position: absolute;
			top: 95%;
			left: 37%; 
		}
		
	</style>
	</head>
<body style="background-color:red;">
	<div class="bodybg" id="bodybg">
		<img id="bg" src="img/bg.jpg" width="100%" height="100%" />
	</div>
	
	<div class="main1" id="main1" style="">
		<!-- <div class="xx">最美开始报名啦！</div> -->
		<form action="add.php" method="post" onsubmit ="return check();" >
			<p>选手姓名：<input type="text" name="username" class="dk" id="username"/></p>		
			<!-- <p>出生年月：<input type="text" name="date"     class="dk" id="date" /></p>
			<p>家长姓名：<input type="text" name="username2"      class="dk" id="username2" /></p> -->
			<p>联系方式：<input type="text" name="tel"      class="dk" id="tel" /></p>
			<!-- <p>就读学校：<input type="text" name="school"   class="dk" id="school" /></p>
			<p>参赛曲目：<input type="text" name="qm"       class="dk" id="qm" /></p> -->
			<!-- <input type="hidden" value="<?php echo $ff;?>" name="code" id="code"> -->
			<p>&nbsp;</p>
			<p>&nbsp;&nbsp;<input type="submit" value="" class="tj" /></p>
		</form>
		
	</div>
	<p id="zi">信玉堂技术支持</p>

</body>


</html>

<script language = "javascript"> 
  
	//表单1
	function check(){ 

	  //验证姓名 
		var username1 = document.getElementById("username"); 
		if(username1.value.length==0){ 
		   alert("选手姓名不能为空！"); 
		   username1.focus(); //当判断为空时，会自动将焦点聚焦在这里
		   return false; 
		} 
		  if(username1.value.length<2||username1.value.length>18){ 
			alert("选手姓名长度不能低于2位和大于18位！"); 
			username1.focus(); 
			return false; 
		} 

		
//验证出生日期
		// var date1 = document.getElementById("date"); 
		// if(date1.value.length==0){ 
		//    alert("出生日期不能为空！"); 
		//    date1.focus(); //当判断为空时，会自动将焦点聚焦在这里
		//    return false; 
		// } 
		//   if(date1.value.length<2||date1.value.length>18){ 
		// 	alert("出生日期长度不对！"); 
		// 	date1.focus(); 
		// 	return false; 
		// } 		
		
	 //验证家长姓名 
		// var username2 = document.getElementById("username2"); 
		// if(username2.value.length==0){ 
		//    alert("家长姓名不能为空！"); 
		//    username2.focus(); //当判断为空时，会自动将焦点聚焦在这里
		//    return false; 
		// } 
		//   if(username2.value.length<2||username2.value.length>18){ 
		// 	alert("家长姓名长度不能低于2位和大于18位！"); 
		// 	username2.focus(); 
		// 	return false; 
		// } 	
	//==========================================================================	
	  //验证手机号码的 
	  var tel1 = document.getElementById("tel"); 
	  var pattern= /^1[34758]\d{9}$/ 

	  if(tel1.value.length==0){ 
		 alert("请输入你的手机号码！"); 
		 tel1.focus(); 
		 return false; 
	  } 
	  if(!pattern.test(tel1.value)) {  
		 alert("你输入的手机号码无效，请重新输入！"); 
		 tel1.value=""; 
		 tel1.focus(); 
		 return false;  
	  } }

	

//验证 学校
		// var school2 = document.getElementById("school"); 
		// if(school2.value.length==0){ 
		//    alert("学校名不能为空！"); 
		//    school2.focus(); //当判断为空时，会自动将焦点聚焦在这里
		//    return false; 
		// } 
		//   if(school2.value.length<2||school2.value.length>18){ 
		// 	alert("学校名长度不能低于2位和大于18位！"); 
		// 	school2.focus(); 
		// 	return false; 
		// } 	

//验证曲目
	// 	var qm1 = document.getElementById("qm"); 
	// 	if(qm1.value.length==0){ 
	// 	   alert("曲目名不能为空！"); 
	// 	   qm1.focus(); //当判断为空时，会自动将焦点聚焦在这里
	// 	   return false; 
	// 	} 
	// 	  if(qm1.value.length<1||qm1.value.length>18){ 
	// 		alert("曲目名长度不能低于1位和大于18位！"); 
	// 		qm1.focus(); 
	// 		return false; 
	// 	} 			
	// } 	
</script>

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
						'hideOptionMenu',
						'hideAllNonBaseMenuItem',
						'onMenuShareAppMessage',
						'onMenuShareTimeline'
						]
		});
	  
	    wx.ready(function(){
	    //在这里调用 API
			//隐藏所有非基础按钮接口
			//wx.hideAllNonBaseMenuItem();
			//隐藏右上角菜单接口
			//wx.hideOptionMenu();			
		
		
			wx.onMenuShareTimeline({
				title: '苏州最美童声报名开始啦！', // 分享标题
				link: 'http://xyt.xy-tang.com/2015n/yhw627/', // 分享链接
				imgUrl: 'http://xyt.xy-tang.com/2015n/yhw627/share.png', // 分享图标
				success: function () { 
					// 用户确认分享后执行的回调函数
					//window.location.href = 'http://www.baidu.com';
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
			  title:  '苏州最美童声报名开始啦！',
			  desc:   '唱响童年，少年好声音，苏州市儿童歌唱大赛，等你来挑战！',
			  link: 'http://xyt.xy-tang.com/2015n/yhw627/', // 分享链接
			  imgUrl: 'http://xyt.xy-tang.com/2015n/yhw627/share.png', // 分享图标
			  trigger: function (res) {
				//alert('用户点击发送给朋友');
			  },
			  success: function (res) {
				//alert('已分享');
				//window.location.href = 'http://www.baidu.com';
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