<?php
	//引入js类文件
	 require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();

    session_start();   
    $token = md5(uniqid(rand(), true));     
    $_SESSION['token']= $token;
    
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
        // var_dump($openid);
        // exit;
        // $wxname=$userinfo_arr['nickname'];
        // $wximg=$userinfo_arr['headimgurl'];
        // $wxsex=$userinfo_arr['sex'];
        // echo $wxsex;
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
 	echo "window.location.href='http://szxytang.com/yin/za/jfyy/getcodeurl.php';";
 	echo "</script>";
 	exit;
 }
 if ($row){
	echo "<script>";
	echo "window.location.href='sel.php';";
	echo "alert('你已参加过，即将跳转到排行');";
	echo "</script>";
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
<script src="jquery-1.8.2.min.js"></script>
<meta http-equiv="Cache-Control" content="max-age=0" />
<meta name="apple-touch-fullscreen" content="yes" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">	
<link rel="stylesheet" href="dh.css">
	<title>建发·泱誉丨填词赢舞剧《孔子》门票</title>
</head>
<style>
body{
	padding:0;
	margin:0;
}
.tt{
	width: 100%;
	height: 100%;
	background: white;
	position: absolute;
	/*display: none;*/
}
.tt img{
	width: 100%;
	height: 100%;
	position: absolute;
	top:0;
	left:0;
}
label{
	width: 13%;
	height: 8%;
	background: red;
	opacity: 0;
	position: absolute;
}
label>input{
	margin-top: 76%;
}
.demo{
	width: 8%;
	height: 5%;
	position: absolute;
	top: 29.5%;
	right: 8%;
	line-height: 28px;
	text-align: center;
	font-size: 14px;
	color: red;
}
#dema{
		opacity: 0;
		background: yellow;
		position: absolute;
		top: 0;
		left: 0;
		width: 100px;
		height: 30px;
	}
.jg{
	width: 100%;
	height: 100%;
	z-index: 200;
	position: absolute;
	top:0%;
	left:0%;
	display: none;
}
.jg img{
	width: 100%;
	height: 100%;
	position: absolute;
	top: 0%;
	left: 0%;
}
</style>
<script>	
		//图片预加载
		function loadImages(sources, callback){
			var count = 0,
				images ={},
				imgNum = 0;
			for(src in sources){
				imgNum++;
			}
			for(src in sources){
				images[src] = new Image();
				images[src].onload = function(){
					if(++count >= imgNum){
						callback(images);
					}
				}
				images[src].src = sources[src];
			}
		}
		loadImages(['img/1.jpg','img/2.jpg','img/3.jpg','img/0.jpg',
			
					],function(){
		      // $('.spinner').remove();
		      // $('#gui').hide();
		      // alert('预加载完成');
		      // document.getElementById('gui').style.display='none';
		})
</script>
<script>
		function sy(){
			var play= document.getElementById('audio');		
			play.play();
			loadImages();
		}
</script>


<body onload="sy()">
<a href="http://9e08a994a1bb.vxplo.cn/idea/yBR41EL"><p style="width:80%;position: absolute; top:97%;left:10%;z-index:2000; color:;text-align:center;">技术支持：信玉堂|草帽互动</p></a>

<div class="tt" id="shou" style="z-index:199;display:block;">
	<img src="img/0.jpg" alt="">
	<img class="sfdr2" src="img/0-1.png" alt="">
	<img class="sfdr3" src="img/0-2.png" alt="">
	<img class="fangda" src="img/0-3.png" alt="">
	<label style="top:50%;left:0%;width:100%;height:50%;opacity:0;" onclick="xs()"><input type="radio" name="o0" q='0'></label>
	<div style="position:absolute;top:0;left:0;width:100%;height:30%;" onclick="guize();"></div>
	<div id="guize" style="position:absolute;top:0;left:0;width:100%;height:100%;display:none;background:black;opacity:0.8;" onclick="gxs();">
		<p style="color:white;padding:30px;font-size:13px;">
		活动时间：2017年7月20日17:00—2017年7月21日12:00<br><br>

		礼品：<br><br>
		第1名    面值500元超市购物卡+舞剧《孔子》门票2张   共1份<br>
		第2名    闽南非遗白瓷摆件+舞剧《孔子》门票2张      共1份<br>
		第3名    精致中式茶具+舞剧《孔子》门票2张          共1份<br>
		第4-5名  中式钢笔礼盒+舞剧《孔子》门票2张          共2份<br>
		第6-10名 电影票2张+舞剧《孔子》门票2张             共5份<br><br>

		兑奖时间：2017年7月21日—2017年7月23日<br>
		         （过期视为自动放弃）<br><br>

		兑奖地址：建发·泱誉售楼处<br>
		          苏州高铁新城苏大实验学校正对面（青龙港路与正辉路交汇处）<br><br>

		联系电话：0512-6888 8799<br><br>

		主办方：苏州兆坤房地产开发有限公司<br><br>

		*活动最终解释权归属苏州兆坤房地产开发有限公司所有</p>
	</div>
</div>

<div class="tt" style="z-index:189;" id="y1">
	<img src="img/1.jpg" alt="">
	<label style="top:48%;left:27%;" onclick="a1();"><input type="radio" name="o1" q='0'></label>
	<label style="top:48%;left:43.5%;" onclick="a2();"><input type="radio" name="o1" q='1'></label>
	<label style="top:48%;left:60%;" onclick="a1();"><input type="radio" name="o1" q='0'></label>
</div>

<div class="tt" style="z-index:179;" id="y2">
	<img src="img/2.jpg" alt="">
	<label style="top:52%;left:27%;" onclick="b2();"><input type="radio" name="o2" q='1'></label>
	<label style="top:52%;left:43.5%;" onclick="b1();"><input type="radio" name="o2" q='0'></label>
	<label style="top:52%;left:60%;" onclick="b1();"><input type="radio" name="o2" q='0'></label>
</div>
<div class="tt" style="z-index:169;" id="y3">
	<img src="img/3.jpg" alt="">
	<label style="top:48%;left:27%;" onclick="c1();"><input type="radio" name="o3" q='0'></label>
	<label style="top:48%;left:43.5%;" onclick="c2();"><input type="radio" name="o3" q='1'></label>
	<label style="top:48%;left:60%;" onclick="c1();"><input type="radio" name="o3" q='0'></label>
</div>
<div class="tt" style="z-index:159;" id="y4">
	<img src="img/4.jpg" alt="">
	<label style="top:48%;left:27%;" onclick="d2();"><input type="radio" name="o4" q='1'></label>
	<label style="top:48%;left:43.5%;" onclick="d1();"><input type="radio" name="o4" q='0'></label>
	<label style="top:48%;left:60%;" onclick="d1();"><input type="radio" name="o4" q='0'></label>
</div>
<div class="tt" style="z-index:149;" id="y5">
	<img src="img/5.jpg" alt="">
	<label style="top:48%;left:27%;" onclick="e1();"><input type="radio" name="o5" q='0'></label>
	<label style="top:48%;left:43.5%;" onclick="e1();"><input type="radio" name="o5" q='0'></label>
	<label style="top:48%;left:60%;" onclick="e2();"><input type="radio" name="o5" q='1'></label>
</div>
<div class="tt" style="z-index:139;" id="y6">
	<img src="img/6.jpg" alt="">
	<label style="top:48%;left:27%;" onclick="f2();"><input type="radio" name="o6" q='1'></label>
	<label style="top:48%;left:43.5%;" onclick="f1();"><input type="radio" name="o6" q='0'></label>
	<label style="top:48%;left:60%;" onclick="f1();"><input type="radio" name="o6" q='0'></label>
</div>
<div class="tt" style="z-index:129;" id="y7">
	<img src="img/7.jpg" alt="">
	<label style="top:48%;left:27%;" onclick="g1();"><input type="radio" name="o7" q='0'></label>
	<label style="top:48%;left:43.5%;" onclick="g1();"><input type="radio" name="o7" q='0'></label>
	<label style="top:48%;left:60%;" onclick="g2();"><input type="radio" name="o7" q='1'></label>
</div>
<div class="tt" style="z-index:119;" id="y8">
<div class="demo" style="z-index: 119;top:7%;"></div>
	<img src="img/8.jpg" alt="">
	<label style="top:48%;left:27%;" onclick="h1();"><input type="radio" name="o8" q='0'></label>
	<label style="top:48%;left:43.5%;" onclick="h2();"><input type="radio" name="o8" q='1'></label>
	<label style="top:48%;left:60%;" onclick="h1();"><input type="radio" name="o8" q='0'></label>
</div>
<div class="tt" style="z-index:119;" id="y9">
<div class="demo" style="z-index: 109;top:7%;"></div>
	<img src="img/9.jpg" alt="">
	<label style="top:48%;left:27%;" onclick="j1();"><input type="radio" name="o9" q='0'></label>
	<label style="top:48%;left:43.5%;" onclick="j1();"><input type="radio" name="o9" q='0'></label>
	<label style="top:48%;left:60%;" onclick="j2();"><input type="radio" name="o9" q='1'></label>
</div>
<div class="tt" style="z-index:99;" id="y10">
<div class="demo" style="z-index: 99;top:7%;"></div>
	<img src="img/10.jpg" alt="">
	<label style="top:48%;left:27%;" onclick="k2();"><input type="radio" name="o10" q='1'></label>
	<label style="top:48%;left:43.5%;" onclick="k1();"><input type="radio" name="o10" q='0'></label>
	<label style="top:48%;left:60%;" onclick="k1();"><input type="radio" name="o10" q='0'></label>
</div>
<div class="tt" style="z-index:49;" id="cnm">
	<img id="fenshu" src="img/0f.jpg">
	<input type="button" style="width:50%;height:40px;background:#E7324B;position:absolute;top:66%;left:25%;line-height:40px;border:0;border-radius:5px;color:white;opacity:0;" value="再测一次" onclick="bma();">
</div>

<div id="bm" style="width:80%;height:200px;position:absolute;top:30%;left:10%;z-index:300;background:black;border-radius:5px;opacity:0.8;display:none;">
<br><br>
<form action="add.php" method="POST">
<input type="text" name="ttt" id="dema">
<input type="hidden" name="openid" value="<?php echo $openid; ?>">
	<input type="text" name="name" placeholder="请输入姓名" style="width:90%;height:30px;margin-left:5%;border-radius:5px;"><br><br>
	<input type="tel" name="tel" placeholder="请输入电话" style="width:90%;height:30px;margin-left:5%;border-radius:5px;"><br><br>
	<input class="bn" name="sub" type="button" value="提交" style="width:90%;height:30px;margin-left:5%;border-radius:5px;">
</form>
</div>
<script>
$("input[name='sub']").on("click",function(){
	$.ajax({
	url:'add.php',
	data:$('form').serialize(),
	type:'POST',
	success:function(m){
		if(m=='rep'){
			alert("请勿重复提交！");
		}
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
		if(m=='wan'){
			alert("请完善信息！");
		}
		if(m==-2){
			alert("插入数据库失败！");
		}
	}
	});
});
</script>
<!-- 验证是否正确 -->
<div class="jg" id="an1" onclick="xxs1()">
	<img src="img/1-1.jpg">
	<img class="sfdr" src="img/1-1.png">
</div>
<div class="jg" id="an2" onclick="xxs1()">
	<img src="img/1-1.jpg">
	<img src="img/1-2.png">
	<img class="dr" src="img/1-3.png">
</div>

<div class="jg" id="bn1" onclick="xxs1()">
	<img src="img/2-1.jpg">
	<img class="sfdr" src="img/1-1.png">
</div>
<div class="jg" id="bn2" onclick="xxs1()">
	<img src="img/2-1.jpg">
	<img src="img/1-2.png">
	<img class="dr" src="img/2-3.png">
</div>

<div class="jg" id="cn1" onclick="xxs1()">
	<img src="img/3-1.jpg">
	<img class="sfdr" src="img/1-1.png">
</div>
<div class="jg" id="cn2" onclick="xxs1()">
	<img src="img/3-1.jpg">
	<img src="img/1-2.png">
	<img class="dr" src="img/3-3.png">
</div>

<div class="jg" id="dn1" onclick="xxs1()">
	<img src="img/4-1.jpg">
	<img class="sfdr" src="img/1-1.png">
</div>
<div class="jg" id="dn2" onclick="xxs1()">
	<img src="img/4-1.jpg">
	<img src="img/1-2.png">
	<img class="dr" src="img/4-3.png">
</div>

<div class="jg" id="en1" onclick="xxs1()">
	<img src="img/5-1.jpg">
	<img class="sfdr" src="img/1-1.png">
</div>
<div class="jg" id="en2" onclick="xxs1()">
	<img src="img/5-1.jpg">
	<img src="img/1-2.png">
	<img class="dr" src="img/5-3.png">
</div>

<div class="jg" id="fn1" onclick="xxs1()">
	<img src="img/6-1.jpg">
	<img class="sfdr" src="img/1-1.png">
</div>
<div class="jg" id="fn2" onclick="xxs1()">
	<img src="img/6-1.jpg">
	<img src="img/1-2.png">
	<img class="dr" src="img/6-3.png">
</div>

<div class="jg" id="gn1" onclick="xxs1()">
	<img src="img/7-1.jpg">
	<img class="sfdr" src="img/1-1.png">
</div>
<div class="jg" id="gn2" onclick="xxs1()">
	<img src="img/7-1.jpg">
	<img src="img/1-2.png">
	<img class="dr" src="img/7-3.png">
</div>

<div class="jg" id="hn1" onclick="xxs1()">
	<img src="img/8-1.jpg">
	<img class="sfdr" src="img/1-1.png">
</div>
<div class="jg" id="hn2" onclick="xxs1()">
	<img src="img/8-1.jpg">
	<img src="img/1-2.png">
	<img class="dr" src="img/8-3.png">
</div>

<div class="jg" id="jn1" onclick="xxs1()">
	<img src="img/9-1.jpg">
	<img class="sfdr" src="img/1-1.png">
</div>
<div class="jg" id="jn2" onclick="xxs1()">
	<img src="img/9-1.jpg">
	<img src="img/1-2.png">
	<img class="dr" src="img/9-3.png">
</div>

<div class="jg" id="kn1" onclick="xxs1()">
	<img src="img/10-1.jpg">
	<img class="sfdr" src="img/1-1.png">
</div>
<div class="jg" id="kn2" onclick="xxs1()">
	<img src="img/10-1.jpg">
	<img src="img/1-2.png">
	<img class="dr" src="img/10-3.png">
</div>


<audio id='audio' src="http://pre.ih5.cn/files/1779710/17294/32a77d.mp3" loop autoplay="autoplay"></audio>
</body>
</html>
<script>
	 setTimeout(function(){
	     $(window).scrollTop(1);
	 },0);
	  document.getElementById('audio').play();
	  document.addEventListener("WeixinJSBridgeReady", function () {
			WeixinJSBridge.invoke('getNetworkType', {}, function (e) {
	            document.getElementById('audio').play();
			});
	  }, false);
	</script>
<script>
	function guize(){
		$("#guize").css("display","block");
	}
	function gxs(){
		$("#guize").css("display","none");
	}
	function xs(){
		$("#shou").css("display","none");
		timedCount();
	}
	function bma(){
		// alert('222');
		$("#bm").css("display","block");
	}
	function a1(){
		$("#y1").css("display","none");
		$("#an2").css("display","block");
	}
	function a2(){
		$("#y1").css("display","none");
		$("#an1").css("display","block");
	}
	function b1(){
		$("#y2").css("display","none");
		$("#bn2").css("display","block");
	}
	function b2(){
		$("#y2").css("display","none");
		$("#bn1").css("display","block");
	}
	function c1(){
		$("#y3").css("display","none");
		$("#cn2").css("display","block");
	}
	function c2(){
		$("#y3").css("display","none");
		$("#cn1").css("display","block");
	}
	function d1(){
		$("#y4").css("display","none");
		$("#dn2").css("display","block");
	}
	function d2(){
		$("#y4").css("display","none");
		$("#dn1").css("display","block");
	}
	function e1(){
		$("#y5").css("display","none");
		$("#en2").css("display","block");
	}
	function e2(){
		$("#y5").css("display","none");
		$("#en1").css("display","block");
	}
	function f1(){
		$("#y6").css("display","none");
		$("#fn2").css("display","block");
	}
	function f2(){
		$("#y6").css("display","none");
		$("#fn1").css("display","block");
	}
	function g1(){
		$("#y7").css("display","none");
		$("#gn2").css("display","block");
	}
	function g2(){
		$("#y7").css("display","none");
		$("#gn1").css("display","block");
	}
	function h1(){
		$("#y8").css("display","none");
		$("#hn2").css("display","block");
	}
	function h2(){
		$("#y8").css("display","none");
		$("#hn1").css("display","block");
	}
	function j1(){
		$("#y9").css("display","none");
		$("#jn2").css("display","block");
	}
	function j2(){
		$("#y9").css("display","none");
		$("#jn1").css("display","block");
	}
	function k1(){
		$("#y10").css("display","none");
		$("#kn2").css("display","block");
	}
	function k2(){
		$("#y10").css("display","none");
		$("#kn1").css("display","block");
	}


	function xxs1(){
		$(".jg").css("display","none");
	}
</script>
<script>
	var c = 0;
	var i = 0;
	$("input:radio").on('click',function(){
		 if ($(this).attr("q")==1){
	        c++;
	      }
	      i++;
	      // alert('你一共答对了'+c+'题');
		// $(this).parent().parent().fadeOut().next('.tt').fadeIn();
		if (i==11){
			document.cookie="fenshu="+c;
			// alert('你一共答对了'+c+'题');
			if(c==1){
				$("#fenshu").attr("src","img/10f.jpg");
			}else if(c==2){
				$("#fenshu").attr("src","img/20f.jpg");
			}else if(c==3){
				$("#fenshu").attr("src","img/30f.jpg");
			}else if(c==4){
				$("#fenshu").attr("src","img/40f.jpg");
			}else if(c==5){
				$("#fenshu").attr("src","img/50f.jpg");
			}else if(c==6){
				$("#fenshu").attr("src","img/60f.jpg");
			}else if(c==7){
				$("#fenshu").attr("src","img/70f.jpg");
			}else if(c==8){
				$("#fenshu").attr("src","img/80f.jpg");
			}else if(c==9){
				$("#fenshu").attr("src","img/90f.jpg");
			}else if(c==10){
				$("#fenshu").attr("src","img/100f.jpg");
		}}
			
			// var percent = c/5;
			// var per = parseInt(percent*10);

		 // wx.ready(function () {
			// var shareinfo={
			//  	 title: '我当老板的潜质超过了'+per+'0%的人，快来看看你的吧',
			//       desc: '建发·泱誉丨填词赢舞剧《孔子》门票',
			//       link: 'http://szxytang.com/yin/za/lhwulin',
			//       imgUrl: 'http://szxytang.com/yin/za/lhwulin/share.jpg'}
			//       wx.onMenuShareTimeline(shareinfo);
			//  wx.onMenuShareAppMessage(shareinfo);
			//   });
	})
</script>
<script>
var cc=0;
var t;	
function timedCount(){
document.getElementById('dema').value=cc;
cc=cc+1;
t=setTimeout("timedCount()",10);
}
</script>
<!-- 引入脚本 -->
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
	 	 title: '建发·泱誉丨填词赢舞剧《孔子》门票',
	      desc: '建发·泱誉携手舞剧《孔子》 7月26日，苏州文化艺术中心大剧院，不见不散',
	      link: 'http://szxytang.com/yin/za/jfyy/getcodeurl.php',
	      imgUrl: 'http://szxytang.com/yin/za/jfyy/share.jpg'}
	      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
	  });
</script>
<!--百度统计代码-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?d949d76d44a0717b8fa4a2dd7cbe2461";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>