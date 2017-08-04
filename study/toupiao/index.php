<?php
	header("Content-type: text/html; charset=utf-8"); 
	require_once('common/include.php'); 
	require_once('common/func.php'); 
	require_once('DBCon.php'); 

	if(isset($_GET['code'])){
		define("CODE", $_GET['code']);
		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".CODE."&grant_type=authorization_code";
		$json_access_token = https_request($url);
		$arr_access_token = json_decode($json_access_token, true);
		
		/* define("ACCESS_TOKEN", $arr_access_token['access_token']);

		$url = "https://api.weixin.qq.com/sns/userinfo?access_token=".ACCESS_TOKEN."&openid=".$arr_access_token['openid']."&lang=zh_CN";
		$json = https_request($url);
		$userinfo_arr = json_decode($json, true); 
 */
		$openid = $arr_access_token['openid'];
		
		
		
		
		if($openid=="" || $openid==null){
			echo "<script>";
			echo "window.location.href='getcodeurl.php';";
			echo "</script>";
		}
		
		//notp=未投票   noshare=未分享   nosectp=未第二次投票   nohave=没有个人记录  nochance=没有机会了
		$sql="select * from $tbname1 where Openid='".$openid."'";
		$query = mysql_query($sql);
		$row   = mysql_fetch_assoc($query);
		
		if($row){
			if($row['Profst']==0 && $row['Prosec']==0){
				$state='notp';
			}else{
				if($row['Prosec']==0){
					if($row['Share']=='no'){
						$state='noshare';
					}else{
						$state='nosectp';
					}
				}else{
					$state='nochance';
				}
			}
		}else{
			$state='nohave';	
		}
	
	
	}else{
		echo "参数错误，请稍后再试...";
		exit;
	}	
?>
<!DOCTYPE html>
<html>
<head>
    <title>无锡未来“十大巨星”投票</title>
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
			display: none;
			width: 83%;
			position: absolute;
			top: 69%;
			left:8.5%;
			z-index: 9999;
			background-color:#fff;
			border-radius:8px;
			border:2px #000 solid;
			opacity:1;
		}	
		
		input.labelauty + label { font: 12px "Microsoft Yahei";}
		
		
		.inputa{ 
			border:1.4px solid #000; 
			height:30px; 
			line-height:20px;  
			width:66%; 
			background:#fff;
			-moz-border-radius: 0.2em; 
			-webkit-border-radius:0.2em;  
			border-radius:0.8em;
			padding:1%;color:#000; 			
		}
			
			
		.btn{
			width:45%; 
			border:1.4px solid #000; 
			height:30px; 
			line-height:25px;
			background:#fff; 
			-moz-border-radius: 0.2em; 
			-webkit-border-radius:0.2em;  
			border-radius:0.5em; 
			color:#000; 
			font-size:16px; 
		}
		
		
		.name{ width:90%; margin:0 auto; padding:2% 4%; padding-top:12%; text-align:left; font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#000;}
		.tel{ width:90%; margin:0 auto; padding:2% 4%; padding-top:5%; text-align:left; font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#000;}
		.add{ width:100%; margin:0 auto; padding:2% 0; text-align:left; font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#F8EFC9;}
		.ck{ width:100%; margin:0 auto; padding:2% 0; text-align:left; font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#F8EFC9;}
		.btnboxb{width:100%;text-align:center;padding:13% 0;}
		
		
		.dbdr{
		-webkit-animation:fadeInDownBig 1.5s 0s ease both;
		-moz-animation:fadeInDownBig 1.5s 0s ease both;}
		@-webkit-keyframes fadeInDownBig{
		0%{opacity:0;
		-webkit-transform:translateY(-1000px)}
		100%{opacity:1;
		-webkit-transform:translateY(0)}
		}
		@-moz-keyframes fadeInDownBig{
		0%{opacity:0;
		-moz-transform:translateY(-1000px)}
		100%{opacity:1;
		-moz-transform:translateY(0)}
		}
		
	</style>
	
	
	
	<script>
		function load(){
			if('<?php echo $state ?>' == 'nohave'){
				document.getElementById('form1').style.display='block';
				return false;
			}
		}
		
		
		function toupiao(n){
			
			var id=n;
			if('<?php echo $state ?>' == 'noshare'){
				
				alert('分享到朋友圈，可额外获得一次投票机会！');
				window.location.href="result/index.php?state=noshare&openid=<?php echo $openid ?>";
				
			}else if('<?php echo $state ?>' == 'nochance'){
				
				alert('您已经没有投票机会了，谢谢参与！');
				window.location.href="result/index.php";
				
			}else if('<?php echo $state ?>' == 'nosectp'){
				
				var openid  = '<?php echo $openid ?>';
				
				var data = "state=sec&id="+id+"&openid="+openid;
				
				$.post("add.php",data,function(res){
					if(res=='ok'){
						alert("投票成功！");
						window.location.href="result/index.php";
					}else{
						alert("投票失败，请稍后再试！");
						return false;
					}   
				});
				
			}else{
				
				var openid  = '<?php echo $openid ?>';
				
				var data = "state=fst&id="+id+"&openid="+openid;
				
				$.post("add.php",data,function(res){
					if(res=='ok'){
						alert("投票成功，分享至朋友圈可额外获得一次投票机会！");
						window.location.href="result/index.php?state=noshare&openid=<?php echo $openid ?>";
					}else{
						alert("投票失败，请稍后再试！");
						return false;
					}   
				});
			}
			
		}
		
	</script>
	
	
	
</head>
<body onload="load()">

<div style="position:absolute; background-image:url(backimage.jpg); background-size:100% 100%; width:100%; height:183%;" >
	<div id="btn" style="position:absolute; width:30%; height:7%; top:71%; left:35%; " onclick="btn_click()" ></div>
	
	<iframe class="video_iframe" style="z-index:9999; position:absolute; top:21.6%; left:10%; width:80.1%; height:13%;" src="http://v.qq.com/iframe/player.html?vid=f0318hgx9pi&amp;auto=0" allowfullscreen="" frameborder="0" ></iframe>
	
	<div style="position:absolute; width:11%; height:2%; top:69%; left:82%; background-color:none; " onclick="toupiao(1)" ></div>
	<div style="position:absolute; width:11%; height:2%; top:71.5%; left:82%; background-color:none;" onclick="toupiao(2)"  ></div>
	<div style="position:absolute; width:11%; height:2%; top:74%; left:82%; background-color:none;" onclick="toupiao(3)"  ></div>
	<div style="position:absolute; width:11%; height:2%; top:76.7%; left:82%; background-color:none; " onclick="toupiao(4)"  ></div>
	<div style="position:absolute; width:11%; height:2%; top:79.3%; left:82%; background-color:none;" onclick="toupiao(5)"  ></div>
	<div style="position:absolute; width:11%; height:2%; top:81.7%; left:82%; background-color:none;" onclick="toupiao(6)"  ></div>
	<div style="position:absolute; width:11%; height:2%; top:84.2%; left:82%; background-color:none;" onclick="toupiao(7)"  ></div>
	<div style="position:absolute; width:11%; height:2%; top:87.5%; left:82%; background-color:none; " onclick="toupiao(8)"  ></div>
	<div style="position:absolute; width:11%; height:2%; top:91.5%; left:82%; background-color:none; " onclick="toupiao(9)"  ></div>
	<div style="position:absolute; width:11%; height:2%; top:94.7%; left:82%; background-color:none;" onclick="toupiao(10)"  ></div>
	
	
	
	
	<form id="form1" class="formdiv" >	
		<div class="name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;请先完善个人信息</div>
		<div class="name">姓&nbsp;&nbsp;&nbsp;名：<input name="name" id="nam" class="inputa" type="text" maxlength="20" placeholder="请输入姓名"></div>
		<div class="tel">手&nbsp;&nbsp;&nbsp;机：<input name="phone" id="tel" class="inputa" type="tel" maxlength="11" placeholder="请输入手机号"></div>
		<div class="btnboxb">
			<input name="save-btn" id="save-btn" value="提 交" class="btn" type="button" onclick="add()" >
			
		</div>
	</form>	
</div>  
</body>
</html>

<script>
	
	function add(){
        var name = document.getElementById('nam').value;
        var tel  = document.getElementById('tel').value;
		
		
		if(name=='' || tel==''){
			alert('请完善您的信息！');
			return false;
		}
		
		
		
        var openid  = '<?php echo $openid ?>';

        var data = "name="+name+"&tel="+tel+"&openid="+openid;
     
            $.post("user.php",data,function(res){
				if(res=='ok'){
					alert("保存个人信息成功！");
					
					document.getElementById('form1').style.display='none';
					return false;
					
				}else{
					alert("保存信息失败，请稍后再试！");
					
					return false;
				}   
            });



    }
	
	
</script>

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?dc65728722ac638c0ef4950fa6d589e4";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<!--开始-->

	<script>
		
	  
	    wx.ready(function(){
	    //在这里调用 API

		
		
			wx.onMenuShareTimeline({
				title: '无锡未来“十大巨星”投票', // 分享标题
				link: 'http://xyt.xy-tang.com/2016hj/wxwanda/toupiao/getcodeurl.php', // 分享链接
				imgUrl: 'http://xyt.xy-tang.com/2016hj/wxwanda/toupiao/share.jpg', // 分享图标
				success: function () { 
					// 用户确认分享后执行的回调函数
					//window.location.href = 'http://www.baidu.com';
					
					if('<?php echo $state ?>' == 'noshare'){
						var openid  = '<?php echo $openid ?>';
				
						var data = "openid="+openid;
						
						$.post("share.php",data,function(res){
							if(res=='ok'){
								alert("分享成功，获得一次投票机会！");
								window.location.href='getcodeurl.php';
							}else{
								alert("分享失败，请稍后再试！");
								return false;
							}   
						});
					
					}
					
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
				  title:  '无锡未来“十大巨星”投票',
				  desc:   '无锡未来发展的10大重点项目，等你来投票！',
				  link: 'http://xyt.xy-tang.com/2016hj/wxwanda/toupiao/getcodeurl.php', // 分享链接
				  imgUrl: 'http://xyt.xy-tang.com/2016hj/wxwanda/toupiao/share.jpg', // 分享图标
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

