<?php
	/**  【歌唱大赛】
	 * 
	 *
	 *
	 *
	 * auther:WangKai
	 * date:2015/03/25
	 * email:wangkaisd@163.com
	 */
	 
	 
	 
?><!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>我的家乡话，你听得懂吗？</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
		<meta http-equiv="Cache-Control" content="max-age=0" />
		<meta name="apple-touch-fullscreen" content="yes" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="main" style="position:absolute;width:100%;height:100%;color:#FFFFFF;text-align:center;overflow: hidden;">
			<img src="img/bg.jpg" width="100%" height="100%"  style="position:absolute;left:0;" />
			<!-- 录制 -->
			<div id="startRecord">
				<div id="txt" class="txt" style="font-size:14px;">点击开始录音<br />再次点击结束</div>
				<!--<div id="txt1" class="txt">再次点击结束</div>-->
				<br />
				<img src="img/chang1.png"  />
				<img src="img/chang2.png" id="chang2" />
			</div>
			
			<!-- 停止 -->
			<div id="stopRecord" style="display: none;">
				<img src="img/gif.png" width="100%"/>
			</div>
			<!-- <button id="geci" onclick="cxa();">查看歌词</button> -->
			<!-- 播放，分享 -->
			<button id="playVoice1" disabled="disabled">播放录音</button>
			<button id="stopVoice1" disabled="disabled">停止播放</button>
			<!--
			<div id="bt4"><a href="">分享</a></div>
			-->
		</div>	
		<script>
			function cxa(){
				document.getElementById('ge').style.display="block";
			}
			function xsa(){
				document.getElementById('ge').style.display="none";
			}
		</script>
		<div id="ge" style="position:absolute;top:2%;width:80%;height:350px;left:10%;background-color:black;color:white;z-index:999;text-align:center;opacity:0.8;display:none;" onclick="xsa();">
		<br>
		   《东环之歌》歌词：<br><br>

			我把车子开上东环<br>
			我把车子开上东环<br>
			快点把车子开上东环<br>
			什么都不管<br>
			我就是要上东环<br>

			啊  东环  你的南边是南环（east ring）<br>
			啊  东环  你的北边是北环 <br>
			(I'm driving on the east ring)<br>
			马上有一天  吴江连上东环<br>
			连上东环怎么办<br>
			到达市区十分半<br>
			......
		</div>
		
	</body>
	
	
	
<script>

	//--------------------------------------------------------------------------
		//录音时间 -- 计时器
		var c=1;
		var t;
		function timedCount(){
		   document.getElementById('txt').innerHTML = '<div id="cc">已经录音'+'<span style="color: red;">'+c+'</span>秒</div><br />';
		  
		   c = c+1;
		   t = setTimeout("timedCount()",1000);
		   if(c>60){
			   c = 0;
			   clearTimeout(t);
			   document.getElementById('txt').innerHTML = '点击开始录音';
		   }
		   
		   
		}
		
		//timedCount();
	//---------------------------------------------------------------------------	

</script>
	
	
	
<?php
	//载入公共函数，类
	require_once "common/config.php";
	require_once "common/func.php";
	
	//get 传参
	if(isset($_GET['openid'])){
		$openid  = trim($_GET['openid']);
	}else{
	  $openid = 'o9kH4sxCat8GdJUfKaP-R1owjTI4' ;//信鸽科技 -- 我的openid
		//$openid = 'ohzcCj1pwuV8jknoIQgN9yfbhQQI' ;//测试账号 -- 我的openid
	}
	
	/* 
	 * 数据库操作
	 *
	 *
	 */
	header("Content-type: text/html; charset=utf-8"); 
	include 'common/model.php';
	$model= new Model('user_info');
	//1 查询该用户
	$userinfo_arr = $model->where( array('openid'=>$openid) )->select();
	//p( $userinfo_arr[0] );	
		

	
//----------------------------------------------	
	//微信sdk，php生成token和签名
	require_once "common/jssdk.php";
	
?>  <script src="js/jquery-1.8.3.min.js"></script>
	<script>
	  wx.ready(function(){
	//-----------------------------------------------------------	
		//定义显示隐藏的工具函数
		function enable(id){
			var yes = document.getElementById(''+id+'');
			yes.style.backgroundColor = "#04be02";
			yes.disabled = false;
		}
		function disable(id){
			var no = document.getElementById(''+id+'');
			no.style.backgroundColor = "gray";
			no.disabled = true;
		}
		
		
	//-----------------------------------------------------------		
		
		var voice = { 
					 localId: '', 
					 serverId: '' 
					};
	
		 //开始录音
		document.getElementById('startRecord').onclick = function(){
			//录音时间 -- 计时器
			c=1;
			timedCount();
		
			//gif图 顶置
			document.getElementById("stopRecord").style.display = "block";
			
			//第二次以后，隐藏播放按钮
			disable( 'playVoice1' );
			disable( 'stopVoice1' );
			
			
			wx.startRecord({
			    success: function(){
				  // alert('正在录音中...');
				   //document.getElementById('stopRecord').innerHTML = '正在录音中...';
				
			    },
			    cancel: function(){
					alert('用户拒绝授权录音'); 
			    }
			});
		};

		//停止录音
		document.getElementById('stopRecord').onclick = function(){
			//停止循环
			clearTimeout(t);
			
			//已经录音xx秒
			var xx = document.getElementById('cc').innerHTML; 
			//document.getElementById('txt').innerHTML = '已经录音 <span style="color: red;">'+xx+' </span>秒';
			document.getElementById('txt').innerHTML = '<div style="color: red;">'+xx+' </div><br />';
			
			//gif图 下置
			document.getElementById("stopRecord").style.display = "none";
			
			
			wx.stopRecord({
			  success: function(res){
				voice.localId = res.localId;
				
				//上传语音
				wx.uploadVoice({
				  localId: voice.localId,
				  success: function (res){
					//alert('停止录音 - 上传语音成功，serverId 为' + res.serverId);
					voice.serverId = res.serverId;
				//--------------------------------------------------	
					var a, b,id;
					id = '<?php echo $openid ; ?>';//我的openid
					a = new Array( id, voice.serverId );//我的录音id
					b = a.join(',');//转化为字符串逗号分割
					//alert( b );
					
					var nickname;
					nickname = "<?php echo $userinfo_arr[0][nickname]; ?>";//我的昵称
					//alert( nickname );
					
				//--------------------------------------------------	
					//分享
					//计数器
					var sharenum = 1; 
					  //分享  -- js格式
					var shareData = {
						title: "我的家乡话，你听得懂吗？",
						//desc: nickname+"的歌曲被分享了第"+ (sharenum++) +"次",
						desc: "机智的你能猜出来吗？",
						//link: "http://xyt.xy-tang.com/2014/wk_svn/voice/share.php?openid=<?php echo $userinfo_arr['openid']; ?>&mediaid="+voice.serverId,
						link: "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://xyt.xy-tang.com/yin/za/voice2/share.php?data="+ b +"&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect",
						imgUrl: "http://xyt.xy-tang.com/yin/za/voice2/share.jpg"
					};
					
					wx.onMenuShareAppMessage(shareData);
					wx.onMenuShareTimeline(shareData);
					wx.onMenuShareQQ(shareData);
					wx.onMenuShareWeibo(shareData);
				  }
				});
				
			  },
			  fail: function (res) {
				//alert(JSON.stringify(res));
			  }
			});
			 
			//显示 -- 播放按钮
			enable('playVoice1');
			 
			 
			//alert('测试，serverId 为' + res.serverId);
		
		};//手动停止录音  -- 结束

		  //录音超过60秒，监听录音自动停止
		  wx.onVoiceRecordEnd({
			complete: function (res){
			  voice.localId = res.localId;
			  alert('监听录音自动停止 - 录音时间已超过一分钟');
			  
			  //上传语音
				wx.uploadVoice({
				  localId: voice.localId,
				  success: function (res){
					//alert('监听录音自动停止 - 上传语音成功，serverId 为' + res.serverId);
					voice.serverId = res.serverId;
					
				//--------------------------------------------------	
					var a, b,id;
					id = '<?php echo $openid; ?>';
					a = new Array( id, voice.serverId );
					b = a.join(',');//转化为字符串逗号分割
					//alert( b );
					
					var nickname;
					nickname = "<?php echo $userinfo_arr[0][nickname]; ?>";
					//alert( nickname );
					
				//--------------------------------------------------	
					//分享
					//计数器
					var sharenum = 1; 
					  //分享  -- js格式
					var shareData = {
						title: "我的家乡话，你听得懂吗？",
						//desc: nickname+"的歌曲被分享了第"+ (sharenum++) +"次",
						desc: "机智的你能猜出来吗？",
						//link: "http://xyt.xy-tang.com/2014/wk_svn/voice/share.php?openid=<?php echo $userinfo_arr['openid']; ?>&mediaid="+voice.serverId,
						link: "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://xyt.xy-tang.com/yin/za/voice2/share.php?data="+ b +"&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect",
						imgUrl: "http://xyt.xy-tang.com/2016/5/voice/img/s.jpg"
					};
					wx.onMenuShareAppMessage(shareData);
					wx.onMenuShareTimeline(shareData);
					wx.onMenuShareQQ(shareData);
					wx.onMenuShareWeibo(shareData);
				//-----------------------------------------------------------------	
				  }
				});
		//----------------------------------------------------------	
				//alert(411111);
				
				//停止循环
				clearTimeout(t);
				
				//已经录音xx秒
				//var xx = document.getElementById('cc').innerHTML; 
				document.getElementById('txt').innerHTML = '已经录音 <span style="color: red;">'+60+' </span>秒';
				
				//gif图 下置
				document.getElementById("stopRecord").style.display = "none";
				
				//显示 -- 播放按钮
				enable('playVoice1');
				
		//------------------------------------------------------------------------------
			}
		  });
	//--------------------------------------------------------------------------
		 //播放音频
		document.getElementById('playVoice1').onclick = function(){
			
			if (voice.localId == ''){
			  alert('播放音频 -- 请先使用 startRecord 接口录制一段声音');
			  return;
			}
			
			//显示--- 停止播放按钮
			enable('stopVoice1');
			
			//隐藏 -- 开始播放按钮
			disable( 'playVoice1' );
			
			
			wx.playVoice({
			  localId: voice.localId
			});
		};

		//暂停播放音频
		/* document.querySelector('#pauseVoice').onclick = function (){
			wx.pauseVoice({
			  localId: voice.localId
			});
		}; */

		//停止播放音频
		document.getElementById('stopVoice1').onclick = function(){
			
			
			
			//隐藏 -- 停止播放按钮
			disable( 'stopVoice1' );
			
			//显示--- 开始播放按钮
			enable('playVoice1');
			
			wx.stopVoice({
			  localId: voice.localId
			});
			//alert('11111');
		}; 

		//监听录音播放停止
		wx.onVoicePlayEnd({
			complete: function (res){
			 // alert('监听录音播放停止 -- 录音（' + res.localId + '）播放结束');
			  
			//隐藏 -- 停止播放按钮
			disable( 'stopVoice1' );
			
			//显示--- 开始播放按钮
			enable('playVoice1');
			  
			}
		});

		//批量隐藏功能按钮接口
		//要隐藏的菜单项，只能隐藏“传播类”和“保护类”按钮，所有menu项见附录3
		wx.hideMenuItems({
		  menuList: [
			'menuItem:openWithQQBrowser', // 
			'menuItem:openWithSafari' // 
			//'menuItem:copyUrl' // 复制链接
		  ],
		  success: function (res) {
			//alert('“复制链接”等按钮');
		  },
		  fail: function (res) {
			alert(JSON.stringify(res));
		  }
		});
		
		
	});//wx.ready()结束
	 
	
	//debug
	wx.error(function(res){
	  //alert(res.errMsg);
	});

	  
	</script>
</html>