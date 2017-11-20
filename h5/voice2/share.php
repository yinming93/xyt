<?php
	/**
	 * 分享页面 
	 *
	 *
	 * auther:WangKai
	 * date:2015/03/27
	 * email:wangkaisd@163.com
	 *
	 */
	 
//------------------------------------------------
	header("Content-type: text/html; charset=utf-8"); 
	
	//载入公共函数，类
	require_once "common/config.php";
	require_once "common/func.php";
	
	if( isset($_GET['code']) ){
		define('CODE', $_GET['code']);
		//1
		//获页面授权的ACCESS_TOKEN 、 refresh_token、openid、 scope的类型
		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".CODE."&grant_type=authorization_code";
		$json_access_token = https_request($url);
		$arr_access_token  = json_decode($json_access_token, true); //获取access_token
		
		//2
		$url  = "https://api.weixin.qq.com/sns/userinfo?access_token=". $arr_access_token['access_token'] ."&openid=".$arr_access_token['openid'];
		$json = https_request($url);
		$userinfo_arr = json_decode($json, true); 
		
		
		//p( $my_openid );
		//p( $mediaid );
		//p( $userinfo_arr );
		
//--------------------------------------------------------------------------------		
		//接收get传参  --- 本页301行
	if( isset($_GET['data']) ){
		$data_str  = trim($_GET['data']);
		$data_arr  = explode( ',', $data_str );
		
		//查询谁为ta点赞
		$my_openid = $data_arr[0];
		//下载ta的录音
		$mediaid   = $data_arr[1];

	}else{
		//查询谁为ta点赞
		$my_openid = $data_arr[0]  = 'o9kH4sxCat8GdJUfKaP-R1owjTI4' ;//信鸽科技 -- 我的openid
		  //$my_openid = $data_arr[0]  = 'ohzcCj1pwuV8jknoIQgN9yfbhQQI' ;//测试账号 -- 我的openid
		//下载ta的录音
		$mediaid   = $data_arr[1]  = 'UjN37-5_0g0TvH_W1Zwi3T9KH5EJSk7-OyUyHdSuhYX1D7Yv3sZNX62-D17f5yqy';

		
	}
	
//-----------------------------------------------------------------------------------		
		/* 3
		 * 数据库操作
		 *
		 *
		 */
		 
		include 'common/model.php';
		$model= new Model('user_info');
		
		//1 查询用户是否已存在
		$list = $model->where( array('openid'=>$userinfo_arr['openid']) )->select();
		//p( $list[0] );
		
		if( empty($list[0]) ){
			//用户不存在 -- 插入
			//获取的用户信息数组与数据库字段不一致
			$userinfo = array( 
								'openid'    =>$userinfo_arr['openid'],
								'nickname'  =>$userinfo_arr['nickname'],
								'sex'       =>$userinfo_arr['sex'],
								'language'  =>$userinfo_arr['language'],
								'city'      =>$userinfo_arr['city'],
								'province'  =>$userinfo_arr['province'],
								'country'   =>$userinfo_arr['country'],
								'headimgurl'=>$userinfo_arr['headimgurl'],
								'remark'    =>'用户信息',
							);
			$res = $model->insert( $userinfo );
			
			//p( $userinfo_arr );
			//p( $userinfo );
			//p( $res );
			
			
		}else{
			//用户已存在 --- 更新
			
		}
		
		
		
	}else{
		//echo "NO CODE";
		echo '操作失败！';
		//写入日记文件
	}
//-----------------------------------------------------

	
	
?><!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>我的分享</title>
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
			<img src="img/bg2.jpg" width="100%" height="100%"  style="position:absolute;left:0;" />
			
			<!-- 播放 -->
			<div id="playVoice" style="display: block;">
				<img id="img1"  src="img/start.png" />
			</div>
			<!-- 停止 -->
			<div id="stopVoice" style="display: none;">
				<img id="img2"  src="img/end.png" />
			</div>
			
			
			<!-- 点赞 -->
			<!--<button id="actPraise" style="display: block;">-->
			<button id="actPraise" style="display: none;">
				为 Ta 点赞
			</button>
			
			<!-- 我也要唱-->
			<div id="myVoice" style="display: block;">
				我也要录音
			</div>
			<!-- 查看谁为ta点赞 -->
			<!--<div id="viewPraise">查看谁为 Ta 点赞</div> -->
			<div id="viewPraise" style="display: none;">查看谁为 Ta 点赞</div>
			
			<!-- 赞表 -->
			<div id="praiseList">
				<div id="praiseClose"> 点击关闭 </div>
				<div id="showList">
					<!-- <div>列表</div> -->
				</div>
			</div>
			
		</div>
		
	</body>
<?php
	//微信sdk，php生成token和签名
	include_once "common/jssdk.php";
?> 
    <script src="js/jquery-1.8.3.min.js"></script>
	<script>
	    wx.ready(function (){
			
	//-----------------------------------------------------------	
		//定义显示隐藏的工具函数
		function enbale(id){
			var yes = document.getElementById(''+id+'');
			yes.style.backgroundColor = "white";
			yes.disabled = false;
		}
		
		function disable(id){
			var no = document.getElementById(''+id+'');
			no.style.backgroundColor = "gray";
			no.disabled = true;
		}
		
		
	//-----------------------------------------------------------		
			
			//声明对象
			var voice = { 
						 localId: '', 
						 serverId: '' 
						};
		
		//暂停播放音频
		/* document.querySelector('#pauseVoice').onclick = function (){
			wx.pauseVoice({
			  localId: voice.localId
			});
		}; */
	//--------------------------------------------------------------------------
		
		//分享页面 -- 下载语音
		voice.serverId = '<?php echo $mediaid;?>';//尼玛，尽然是单引号
//document.write(voice.serverId);
		if(voice.serverId == ''){
			alert('请先使用 uploadVoice 上传声音');
			return;
		}
		
		//播放音频 -- 分享页面打开速度提升
		document.getElementById('playVoice').onclick = function(){
			
			//声音图标控制
			document.getElementById('playVoice').style.display = 'none';
			document.getElementById('stopVoice').style.display = 'block';
			
			//若已经下载完成 -- 至少是第2次播放	
			if( voice.localId !== '' ){
				//转动
				imgS.className = 'xuanzhuan';
				//播放
				wx.playVoice({
				  localId: voice.localId
				});
				
			}else{
				
				
				//下载语音
				wx.downloadVoice({
					serverId: voice.serverId,
					success: function(res){
					   // alert('下载语音成功，localId 为' + res.localId);
						voice.localId = res.localId;
					
						//播放音频
						if(voice.localId == ''){
						  alert('播放音频 -- 请先使用 startRecord 接口录制一段声音');
						  return;
						}
						
						//转动
						imgS.className = 'xuanzhuan';
						
						wx.playVoice({
						  localId: voice.localId
						});
					}
				});
				
				
			}	
		};

		//停止播放音频
		document.getElementById('stopVoice').onclick = function(){
			//声音图标控制
			document.getElementById('stopVoice').style.display = 'none';
			document.getElementById('playVoice').style.display = 'block';
		
			//动态添加被分享者的头像 
			imgS.className = ' ';
			//alert('停止播放音频');
			wx.stopVoice({
				localId: voice.localId
			});
			
			
		}; 
		
		//监听录音播放停止
		wx.onVoicePlayEnd({
			complete: function (res){
				//声音图标控制
			    document.getElementById('stopVoice').style.display = 'none';
			    document.getElementById('playVoice').style.display = 'block';
			//alert('监听录音播放停止 -- 录音（' + res.localId + '）播放结束');
				
				//动态添加被分享者的头像 
				imgS.className = ' ';
				//alert('监听录音播放停止');
			}
		});
		
		//我也要唱
		document.getElementById('myVoice').onclick = function(){
			//先-- 停止播放
			wx.stopVoice({
				localId: voice.localId
			});
			
			//setTimeout("alert('5 seconds!')",5000);
		
		
			//跳转
			window.location.href = "http://szxytang.com/yin/za/voice2/";
			// window.location.href = "index.php?openid=<?php echo $userinfo_arr['openid'];?>";
			//window.location.href = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://xyt.xy-tang.com/yin/za/voice/index.php&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
			
			
			
			//location.href("index.php?openid=<?php echo $userinfo_arr['openid']; ?>");
			
		};
	//----------------------------------------------------------------	
		
		var my_openid,openid,a,data,data1;
		my_openid = '<?php echo $my_openid;?>';//被点赞的人
		openid    = "<?php echo $userinfo_arr['openid'];?>";//点赞的人
		
		//data = 'my_openid=' +my_openid+ '&openid=' +openid;  //或字符串格式
		data  = {my_openid:my_openid, openid:openid,praise:'a'};  // A 判断我是否为ta点过赞
		data1 = {my_openid:my_openid, openid:openid,praise:'b'};  // B 我为ta点赞
		data2 = {my_openid:my_openid, openid:openid,praise:'c'};  // C 查看谁为ta点赞的列表
		//alert(data.my_openid);
		//alert(data.openid);
		
		// A 判断我是否为ta点过赞
		$.post("action.php",data,function(data,status){
			//alert(data);
			//alert(status);
			if( data=='yes' ){
				//document.getElementById('actPraise').style.backgroundColor = '#FFFFFF';
				disable('actPraise');
			}else{
				//
			}
		});
		
		// B 我为ta点赞
		document.getElementById('actPraise').onclick = function(){
//alert(alert(JSON.stringify(data1)));
			$.post("action.php",data1,function(data,status){
				//alert(data);
				//alert(status);
				if( data=='yes' ){//点赞成功
					//document.getElementById('actPraise').style.backgroundColor = '#FFFFFF';
					//需要隐藏，不可以再次点赞，去查询数据库
					disable('actPraise');
					//
					//alert('你为 Ta 点赞成功啦！');
					
				}else{
					//点赞失败
					//alert( '点赞失败' );
				}
			});
		
		};
		
//---------------------------------------------------------------------
		// C 查看谁为ta点赞的列表
		document.getElementById('viewPraise').onclick = function(){
			//拉取为该用户点赞的朋友
			/*  1. 点击触发显示一个层
			 *  2. get/post请求 --- 一部分数据
			 *  3. 点击加载更多--显示一部分
			 *  4. 点击某处关闭
			 */
			document.getElementById('praiseList').style.display  = 'block';//显示列表
			//document.getElementById('praiseClose').style.display = 'block';//隐藏列表
			
			//post请求数据  --- user_info表
			$.post("action.php",data2,function(data,status){
			

				//alert(data);
				//alert(status);
				
				if( data=='no' ){
					//alert( '还没有用户赞过 Ta 哦！' );
				}else{
					//data json格式字符串 --- 某用户的所有信息
					//字符串'{"name":"wangkai","age":"28"}-{"name":"wangkai","age":"28"}' 
					//字符串数组 array( '{"name":"wangkai","age":"28"}', '{"name":"wangkai","age":"28"}' )
					//split  字符串 转化 字符串数组  --- 循环获取who的信息
					var strObj = data.split('·');// '·'
					var arr = new Array();//点赞人信息组成的字符串数组
					
					for (var i=0;i<strObj.length;i++){
						arr.push(eval('(' + strObj[i] + ')'));//转义
						
					}
			//-----------------------------------------------------------------------------------
					//循环输出点赞人信息
					var div = document.getElementById("showList");
					
					//先清空原有的列表的内容   -- 清除div下的所有子节点
					while(div.hasChildNodes()){
						div.removeChild(div.firstChild);
						//alert(1);
					}
			//------------------------------------------------------------------------------------		
					var img,span;
					for (var i=0;i<arr.length;i++){
						//头像
						img = document.createElement("img");
						img.src = arr[i].headimgurl;
						div.appendChild( img );
						// 昵称
						span = document.createElement("span");
						span.innerHTML = arr[i].nickname;
						div.appendChild( span );
						
					}
					
					
					//var bb = arr[1];
					//alert( arr[1].nickname );
					//alert( arr[1].headimgurl );
					/* 
						var div=document.getElementById("divid");
						var span=document.createElement("span");
						span.id="spanid";
						span.style.color="blue";
						span.innerHTML=" i am append span !"
						div.appendChild(span);
					*/
					
					//var a = eval('(' + strObj[1] + ')');
					//alert( a.nickname );
					//alert( a.headimgurl );
					
				}
			});
			
			
		};	
		
		//关闭列表显示
		document.getElementById('praiseClose').onclick = function(){
			document.getElementById('praiseList').style.display = 'none';
		}
//=================================================================
		//分享页再次被分享//   ---在本页38行接收
		var a, b,id,data3,nickname,headimgurl;
		
		id = '<?php echo $my_openid; ?>';//对方的openid
		//serialize()可以实现吗？
		a = new Array( id, voice.serverId );//对方的录音id
		b = a.join(',');//转化为字符串逗号分割
		
//alert( b );
		
		//获取对方的 nickname headimgurl
		data3 = {my_openid:id,praise:'d'};
		
		//必须设置全局的变量才可以，添加样式
		var imgP,imgS;
		
		$.post("action.php",data3,function(data,status){ //注意：post是异步传输
			//data json格式字符串 --- 某用户的所有信息
			//'{"name":"wangkai","age":"28"}'  (string)
			//alert(data);
			
			//由JSON字符串转换为JSON对象
			var obj = eval('(' + data + ')');
			
			nickname    = obj.nickname;
			headimgurl  = obj.headimgurl;
			
			//alert(obj.nickname);
			//alert(obj.headimgurl);
			//alert(nickname);
			//alert(headimgurl);
			
		//----------------------------------------------
			
			
			
			imgP = document.createElement("img");
			//imgP.src = headimgurl;
			imgP.src = 'http://xyt.xy-tang.com/yin/za/voice2/img/s.png';
			document.getElementById('playVoice').appendChild( imgP );
		
			imgS = document.createElement("img");
			//imgS.src = headimgurl;
			imgS.src ='http://xyt.xy-tang.com/yin/za/voice2/img/s.png';
			document.getElementById('stopVoice').appendChild( imgS );
			
		//----------------------------------------------
			
			
			//alert(status);
			
	//-------------------------------------------------------------------------
			//必须写在post中才可以获取到变量nickname
			//计数器
			var sharenum = 1; 
			  //分享  -- js格式
			var shareData = {
				//title: nickname + " 【方言之夜】",
				title: "我们家乡话，朋友圈能听懂的目测不超过5个！",
				//desc: "我的歌曲被分享了第"+ (sharenum++) +"次",
				desc: "不信来试~",
			  //link: "http://xyt.xy-tang.com/2014/wk_svn/voice/share.php?openid=<?php echo $userinfo_arr['openid']; ?>&mediaid="+voice.serverId,
			  //信鸽科技
			  link: "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://xyt.xy-tang.com/yin/za/voice2/share.php?data="+ b +"&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect",
			  //测试账号
				//link: "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxdc6aff2b5ee77ba2&redirect_uri=http://xyt.xy-tang.com/2014/wk_svn/voice/share.php?data="+ b +"&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect",
				//imgUrl: headimgurl;
				imgUrl: "http://xyt.xy-tang.com/yin/za/voice2/share.jpg"
			};
			
			wx.onMenuShareAppMessage(shareData);
			wx.onMenuShareTimeline(shareData);
			wx.onMenuShareQQ(shareData);
			wx.onMenuShareWeibo(shareData);	
	//------------------------------------------------------------			
			
		});//post结束
		
	//alert('弹出此处说明post是异步传输');
	
	
//============================================================================================
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
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?dc65728722ac638c0ef4950fa6d589e4";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>