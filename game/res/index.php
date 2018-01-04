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
		
		define("ACCESS_TOKEN", $arr_access_token['access_token']);

		$url = "https://api.weixin.qq.com/sns/userinfo?access_token=".ACCESS_TOKEN."&openid=".$arr_access_token['openid']."&lang=zh_CN";
		$json = https_request($url);
		$userinfo_arr = json_decode($json, true); 
		
		$openid = $userinfo_arr['openid'];
		$nickname=$userinfo_arr['nickname'];
		$headimgurl=$userinfo_arr['headimgurl'];
		
		
		
		
		if($openid=="" || $openid==null){
			header("Location: http://xytang88.com/yin/youxi/res/getcodeurl.php");
			exit;
		}
		
		$sql="select * from $tbname where Openid='".$openid."'";
		$query = mysql_query($sql);
		$row   = mysql_fetch_assoc($query);
		if($row){
			$state="have";
		}else{
			$state="nohave";
		}
	
	}else{
		echo "参数错误，请稍后再试...";
		exit;
	}	
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="author" content="Tencent-TGideas">
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=320,minimum-scale=1,maximum-scale=5,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="Description" content="" />
<meta name="Keywords" content="" />
<title>游鸿明宝应开唱！玩拼图，领门票</title>
<link rel="stylesheet" href="css/style.css">
<!-- 页面设计：cp | 页面制作：cp | 创建：2016-05-23 -->
<script type="text/javascript">
    var _hip = [
    [ '_setPageId' , 9090307]
    ]
	
	
	
	
</script>
<script>
		
		function loadaa(){
			// 解决ios音乐不自动播放的问题
			autoPlayAudio();
	
		}
	</script>
<style type="text/css">
    .bg7_con.has-coupon {
            background-image: url(../res/has-coupon.png)!important;
    }
    .tan_bg .EasyLogin_row input {
        width: width: 150px!important;
    }
	
	
	.mc{
	-webkit-animation:pulse 1s .2s infinite ease both;
	-moz-animation:pulse 1s .2s infinite ease both;}
	@-webkit-keyframes pulse{
	0%{-webkit-transform:scale(1)}
	50%{-webkit-transform:scale(1.1)}
	100%{-webkit-transform:scale(1)}
	}
	@-moz-keyframes pulse{
	0%{-moz-transform:scale(1)}
	50%{-moz-transform:scale(1.1)}
	100%{-moz-transform:scale(1)}
	}
	
	.tt{
	-webkit-animation:bounceIn 1.2s .5s ease both;
	-moz-animation:bounceIn 1.2s .5s ease both;}
	
	.tt2{
	-webkit-animation:bounceIn 1.5s 0s ease both;
	-moz-animation:bounceIn 1.5s 0s ease both;}
	
	.tt1{
	-webkit-animation:bounceIn 1.5s 1.3s ease both;
	-moz-animation:bounceIn 1.5s 1.3s ease both;}
	
	.tt4{
	-webkit-animation:bounceIn 1.5s 2.5s ease both;
	-moz-animation:bounceIn 1.5s 2.5s ease both;}
	
	@-webkit-keyframes bounceIn{
	0%{opacity:0;
	-webkit-transform:scale(.3)}
	50%{opacity:1;
	-webkit-transform:scale(1.05)}
	70%{-webkit-transform:scale(.9)}
	100%{-webkit-transform:scale(1)}
	}
	@-moz-keyframes bounceIn{
	0%{opacity:0;
	-moz-transform:scale(.3)}
	50%{opacity:1;
	-moz-transform:scale(1.05)}
	70%{-moz-transform:scale(.9)}
	100%{-moz-transform:scale(1)}
	}
	
	
	.dr1{
	-webkit-animation:fadeIn 2s 2s ease both;
	-moz-animation:fadeIn 2s 2s ease both;}
	
	.dr2{
	-webkit-animation:fadeIn 2s 2.8s ease both;
	-moz-animation:fadeIn 2s 2.8s ease both;}
	
	.dr3{
	-webkit-animation:fadeIn 1s 0s ease both;
	-moz-animation:fadeIn 1s 0s ease both;}
	@-webkit-keyframes fadeIn{
	0%{opacity:0}
	100%{opacity:1}
	}
	@-moz-keyframes fadeIn{
	0%{opacity:0}
	100%{opacity:1}
	}
	
</style>
</head>
<body onload="loadaa()">
<audio preload="autoplay"  id="car_audio" src="sr.mp3" loop></audio>
<div id="wrap">
    <div class="loading" id="loading">
        <div class="inner">
            <div class="loading_div"></div>
            <p class="loading_t"><span id="loading_t"></span></p>
            <p class="loading_rate" id="loading_rate"></p>
            <!-- <p class="loading_s1">上映日期：2016年6月8日</p> -->
        </div>
    </div>
    <div class="bg1" id="bg1" style="display: none;">
        <div class="box">
            <div class="mars">
                <div class="bg1_top">
                    <a href="javascript:;" class="sp start_btn" id="start_btn" title=""></a>
					
                </div>
                <!-- <div class="light"></div> -->
            </div>
        </div>
        <div class="light1"></div>
    </div>
    <div class="increase" id="increase" style="display: none;">
        <div class="box">
            
            <ul class="increase_ul">
				<div class="tt2" id="guize" style="display:none; position:absolute; width:77%; height:37%; top:29%; left:11%; z-index:9999">
					<div style="position:absolute; z-index:9999; width:33%; height:14%; border:0px solid green; top:71%; left:33%" onclick="javascript:document.getElementById('guize').style.display='none';"></div>
					<img src="gz2.png" style="position:absolute; z-index:9996;  width:100%;  top:0%; left:0%;" />
				</div>
				
				<img class="tt" src="gzbtn.png" style="position:absolute; z-index:9998; width:27%;  top:61%; left:35%;" onclick="javascript:document.getElementById('guize').style.display='block';"/>
                <li class="li1 tt1" style="z-index:9998;"><img src="../res/stabtn.png"  alt=""></li>
				<img class="mc" src="logo1.png" style="position:absolute; z-index:9990; width:100%; height:100%; top:0%; left:0%;" />
            
            </ul>
           
        </div>
    </div>
    <div class="bg2" id="bg2" style="display: none;">
        <div class="box">
			<img src="sl.png" style="position:absolute; width:18%; top:3%; left:10%;" />
            <div class="puzzle1_img" id="puzzle1_img">
                <img src="../res/puzzle1_img.jpg" alt="">
            </div>
            <div class="complete">
                <div class="complete_con1"></div>
            </div>
            <div class="puzzle">
                <p class="s1"> <span id="timer0">0</span></p>
                <div class="cont" id="Cont">
                    <ul>
                        <li position="0 0"></li>
                        <li position="97 0"></li>
                        <li position="194 0"></li>
                        <li position="0 117"></li>
                        <li position="97 117"></li>
                        <li position="194 117"></li>
                        <li position="0 234"></li>
                        <li position="97 234"></li>
                        <li position="194 234"></li>
                    </ul>
                    <div class="drag-float" id="Drag" style="display: none; width: 96px; height: 116px; position: absolute; z-index: 99"></div>
                </div>
            </div>
            <a href="javascript:;" class="btn_wen" style="display:none;"></a>
        </div>
    </div>
    <div class="bg3" id="bg3" style="display: none;">
        <div class="box">
            <div class="puzzle1_img">
                <img src="../res/puzzle2_img.jpg" alt="">
            </div>
            <div class="complete">
                <div class="huo"></div>
            </div>
            <div class="puzzle">
                <p class="s1"><i>20秒内移动碎片，拼出魔兽海报</i>已用时： <span id="timer1">0</span>S</p>
                <div class="cont" id="Cont1">
                    <ul>
                        <li position="0 0"></li>
                        <li position="97 0"></li>
                        <li position="194 0"></li>
                        <li position="0 117"></li>
                        <li position="97 117"></li>
                        <li position="194 117"></li>
                        <li position="0 234"></li>
                        <li position="97 234"></li>
                        <li position="194 234"></li>
                    </ul>
                    <div class="drag-float" id="Drag1" style="display: none; width: 96px; height: 116px; position: absolute; z-index: 99"></div>
                </div>
            </div>
            <a href="javascript:;" class="btn_wen"></a>
        </div>
    </div>
    <div class="bg4" id="bg4" style="display: none;">
        <div class="box">
            <div class="puzzle1_img">
                <img src="../res/puzzle3_img.jpg" alt="">
            </div>
            <div class="complete">
                <div class="huo"></div>
            </div>
            <div class="puzzle">
                <p class="s1"><i>20秒内移动碎片，拼出魔兽海报</i>已用时： <span id="timer2">0</span>S</p>
                <div class="cont" id="Cont2">
                    <ul>
                        <li position="0 0"></li>
                        <li position="97 0"></li>
                        <li position="194 0"></li>
                        <li position="0 117"></li>
                        <li position="97 117"></li>
                        <li position="194 117"></li>
                        <li position="0 234"></li>
                        <li position="97 234"></li>
                        <li position="194 234"></li>
                    </ul>
                    <div class="drag-float" id="Drag2" style="display: none; width: 96px; height: 116px; position: absolute; z-index: 99"></div>
                </div>
            </div>
            <a href="javascript:;" class="btn_wen"></a>
        </div>
    </div>
    <div class="bg5" id="bg5" style="display: none;">
        <div class="box">
            <div class="puzzle1_img">
                <img src="../res/puzzle4_img.jpg" alt="">
            </div>
            <div class="complete">
                <div class="huo"></div>
            </div>
            <div class="puzzle">
                <p class="s1"><i>20秒内移动碎片，拼出魔兽海报</i>已用时： <span id="timer3">0</span>S</p>
                <div class="cont" id="Cont3">
                    <ul>
                        <li position="0 0"></li>
                        <li position="97 0"></li>
                        <li position="194 0"></li>
                        <li position="0 117"></li>
                        <li position="97 117"></li>
                        <li position="194 117"></li>
                        <li position="0 234"></li>
                        <li position="97 234"></li>
                        <li position="194 234"></li>
                    </ul>
                    <div class="drag-float" id="Drag3" style="display: none; width: 96px; height: 116px; position: absolute; z-index: 99"></div>
                </div>
            </div>
            <a href="javascript:;" class="btn_wen"></a>
        </div>
    </div>
    <div class="bg6" id="bg6" style="display: none;">
        <!--<div class="box">
            <div class="bg6_top"></div>
            <p class="sp bg6_p"></p>
            <div class="bg6_con">
                <a href="javascript:;" class="sp bg6_btn" id="bg6_btn"></a>
                <a href="javascript:;" class="sp bg6_btn1" id="bg6_btn1"></a>
            </div>
        </div>-->
		<div id="divbm" class="dr3" style="display:none; position:absolute; width:100%; height:100%; z-index:9999">
			<img src="bm.jpg" style="position:absolute; top:0%; left:0%; width:100%;" />
			<input id="name" type="text" style="position:absolute; width:50%; height:6%; top:29.5%; left:35%; font-size:15px; text-align:center;" />
			<input id="tel" type="tel" style="position:absolute; width:50%; height:6%; top:38%; left:35%; font-size:15px; text-align:center;" />
			<div style="position:absolute; width:35%; height:6%; top:50%; left:33%; " onclick="check()"></div>
		</div>
		
		
		<img class="tt" src="e1.png" style="position:absolute; width:100%; top:0%; left:0%;" />
		<img class="tt1" src="e2.png" style="position:absolute; width:100%; top:0%; left:0%;" />
		<img class="dr1" src="e3.png" style="position:absolute; width:100%; top:0%; left:0%;" />
		<img class="dr1" src="e4.png" style="position:absolute; width:100%; top:0%; left:0%;" />
		<img class="dr2" src="e5.png" style="position:absolute; width:100%; top:0%; left:0%;" />
		<img class="tt4" src="again.png" style="position:absolute; width:28%; top:26%; left:19%;" onclick="window.location.href='getcodeurl.php'" />
		<img class="tt4" src="phb.png" style="position:absolute; width:28%; top:26%; left:56%;" onclick="tijiao()"/>
		
    </div>
    <div class="bg7" id="bg7" style="display: none;">
        <div class="box">
            <div class="bg7_top">
                <div class="bg7_con">
                    <p><em>￥</em><span>20</span>观影抵用券</p>
                </div>
                <div class="bg7_div">
                    <a href="javascript:;" class="sp btn_1"></a>
                    <a href="javascript:;" class="sp btn_2" onclick="showTan('share')"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 音乐S -->
<div class="music" style="display:none;">
    <i class="sp" id="audio"></i>
</div>
<!-- 音乐E -->
<!-- ready -->
<div class="tan_bg" id="ready" style="display:none">
    <div class="ready">
        <p class="ready_p1">READY!</p>
        <p class="ready_p2">GO!!!</p>
    </div>
</div>
<!-- ready -->
<!-- 分享1S -->
<div class="tan_bg1" id="share"  onclick="hideTan('share')" style="display:none">
    <div class="share_div1"></div>
</div>
<!-- 分享1E -->
<!-- 分享2S -->
<div class="tan_bg1" id="share1"  onclick="hideTan('share1')" style="display:none">
    <div class="share_div"></div>
</div>
<!-- 分享2E -->
<!-- 挑战失败S -->
<div class="tan_bg" id="tanBg" style="display:none">
    <div class="tan">
        <div class="tan_failure">
            <p class="sp"></p>
            <a href="javascript:;" class="sp" id="again"></a>
        </div>
        <!-- <a href="javascript:;" class="sp btn_gb" onclick="hideTan('tanBg')"></a> -->
    </div>
</div>
<!-- 挑战失败E -->
<!-- 挑战成功S -->
<div class="tan_bg" id="tanBg1" style="display:none">
    <div class="tan">
        <div class="tan_success">
            <p class="sp"></p>
            <a href="javascript:;" class="sp"></a>
        </div>
        <a href="javascript:;" class="sp btn_gb"></a>
    </div>
</div>
<script>
	//表单
	  function check(){ 
		
		  //验证姓名 
			var username = document.getElementById("name"); 
			if(username.value.length==0){ 
			   alert("请输入您的姓名！"); 
			   username.focus(); //当判断为空时，会自动将焦点聚焦在这里
			   return false; 
			} 
			  if(username.value.length<2||username.value.length>18){ 
				alert("姓名长度不能低于2位和大于18位！"); 
				username.focus(); 
				return false; 
			} 

		  //验证手机号码的 
		  var tel = document.getElementById("tel"); 
		  var pattern= /^1[34758]\d{9}$/ 

		  if(tel.value.length==0){ 
			 alert("请输入您的手机号码！"); 
			 tel.focus(); 
			 return false; 
		  } 
		  if(!pattern.test(tel.value)) {  
			 alert("您输入的手机号码无效，请重新输入！"); 
			 tel.value=""; 
			 tel.focus(); 
			 return false;  
		  } 
		  
		  
		  
		  
		  
		  
		  var rcode= document.getElementById('timer0').innerHTML;
		
				
				var data = "openid=<?php echo $openid ?>&nick=<?php echo $nickname ?>&imgurl=<?php echo $headimgurl ?>&rcode="+rcode+"&name="+username.value+"&tel="+tel.value;
			
				$.post("add.php",data,function(res){
					
							if(res=='ok'){
								window.location.href='sel.php';
								return false;
							}else{
								window.location.href='sel.php';
								return false;
							}
						});	
		  
		  
		  
		  
	  
	  }
</script>
<script>
	 function autoPlayAudio() {
       /*  wx.config({
            // 配置信息, 即使不正确也能使用 wx.ready
            debug: false,
            appId: '',
            timestamp: 1,
            nonceStr: '',
            signature: '',
            jsApiList: []
        }); */
        wx.ready(function() {
            var globalAudio=document.getElementById("car_audio");
            globalAudio.play();
        });
	};
	
	</script>


<script>
    function tijiao(){
		if('<?php echo $state ?>'=='nohave'){
			document.getElementById('divbm').style.display='block';
			return false;
		}else{
			var rcode= document.getElementById('timer0').innerHTML;
		
				
				var data = "openid=<?php echo $openid ?>&nick=<?php echo $nickname ?>&imgurl=<?php echo $headimgurl ?>&rcode="+rcode;
			
				$.post("add.php",data,function(res){
					
							if(res=='ok'){
								window.location.href='sel.php';
								return false;
							}else{
								window.location.href='sel.php';
								return false;
							}
						});	
		}
		
		
	}
				
</script>
 <script>

        wx.ready(function(){
        //在这里调用 API

            wx.onMenuShareAppMessage({
              title:  '游鸿明宝应开唱！玩拼图，领门票',
              desc:   '以歌为礼，问好宝应',
              link:   'http://xytang88.com/yin/youxi/res/getcodeurl.php',
              imgUrl: 'http://xytang88.com/yin/youxi/res/share.jpg',
              trigger: function (res) {
                //alert('用户点击发送给朋友');
              },
              success: function (res) {
                //alert('已分享');
                // getElementById('ssss').style.display='none';
                // getElementById('ffff').style.display='block';
                // document.getElementById('add_tel').style.display='block';
              },
              cancel: function (res) {
                //alert('已取消');
                // alert("只有先分享到朋友或朋友圈才可以查看分数！");
              },
              fail: function (res) {
                //alert(JSON.stringify(res));
              }
            });



            wx.onMenuShareTimeline({
            title: '游鸿明宝应开唱！玩拼图，领门票', // 分享标题
            desc:   '以歌为礼，问好宝应',
            link: 'http://xytang88.com/yin/youxi/res/getcodeurl.php', // 分享链接
            imgUrl: 'http://xytang88.com/yin/youxi/res/share.jpg', // 分享图标
            success: function () { 
                // 用户确认分享后执行的回调函数
                //  getElementById('ssss').style.display='none';
                // getElementById('ffff').style.display='block';
                // document.getElementById('add_tel').style.display='block';
            },
            cancel: function () { 
                // 用户取消分享后执行的回调函数
                // alert("只有先分享到朋友或朋友圈才可以查看分数！");
            }
        });
        
        });
        
        //debug
        wx.error(function(res){
          alert(res.errMsg);
        });
    
    </script>



<script src="js/bundle.js"></script>
<!--<script src="js/standalone.js"></script>-->
<script src="js/env-constant.js?ref../resh"></script>


<script src="js/bundle.js"></script>
<script src="js/activity-login.js?ref../resh"></script>
<script src="js/hippo.js"></script>
<script src="js/index.js"></script>

</body>
</html>
