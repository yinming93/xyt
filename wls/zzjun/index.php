<?php
	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>中骏23城</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" href="css/index.css">
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
</head>
<style>
	.tt{
		width: 100%;
		position: absolute;
		top: 0%;
		left: 0%;
	}
.shan{
-webkit-animation:flash 3s infinite ease both;
-moz-animation:flash 3s infinite ease both;}
@-webkit-keyframes flash{
0%,50%,100%{opacity: 1;}
25%,75%{opacity: 0;}
}
@-moz-keyframes flash{
0%,50%,100%{opacity: 1;}
25%,75%{opacity: 0;}
}
.shan2{
-webkit-animation:flash 4s infinite ease both;
-moz-animation:flash 4s infinite ease both;}
@-webkit-keyframes flash{
0%,50%,100%{opacity: 1;}
25%,75%{opacity: 0;}
}
@-moz-keyframes flash{
0%,50%,100%{opacity: 1;}
25%,75%{opacity: 0;}
}
.shan3{
-webkit-animation:flash 4.5s infinite ease both;
-moz-animation:flash 4.5s infinite ease both;}
@-webkit-keyframes flash{
0%,50%,100%{opacity: 1;}
25%,75%{opacity: 0;}
}
@-moz-keyframes flash{
0%,50%,100%{opacity: 1;}
25%,75%{opacity: 0;}
}
.shan4{
-webkit-animation:flash 5s infinite ease both;
-moz-animation:flash 5s infinite ease both;}
@-webkit-keyframes flash{
0%,50%,100%{opacity: 1;}
25%,75%{opacity: 0;}
}
@-moz-keyframes flash{
0%,50%,100%{opacity: 1;}
25%,75%{opacity: 0;}
}
</style>
<script>
function tn() {
	$('.1').parent().siblings().children().css('display','none');
	$('.1').css('display','block');
}
</script>
<body onload="tn()">
	<div id="box" class="box">
	<img src="img/main.jpg" alt="" id="tu">
	<img src="img/ff.gif" class="tt">
	<!-- <img src="d1.png" alt="" class="tt shan">
	<img src="d2.png" alt="" class="tt shan2">
	<img src="d3.png" alt="" class="tt shan3">
	<img src="d4.png" alt="" class="tt shan4"> -->
	<div class="menu">
		<div>
		<span q="1" style="background:red;color:white;">北京</span>
		<span q="2">上海</span>
		<span q="3">深圳</span>
		<span q="4">天津</span>
		<span q="5">济南</span>
		<span q="6">青岛</span>
		<span q="7">唐山</span>
		<span q="8">临汾</span>
		<span q="9">鞍山</span>
		<span q="10">商丘</span>
		<span q="11">南昌</span>
		<span q="12">厦门</span>
		<span q="13">漳州</span>
		<span q="14">泉州</span>
		<span q="15">龙岩</span>
		<span q="16">南京</span>
		<span q="17">杭州</span>
		<span q="18">苏州</span>
		<span q="19">镇江</span>
		<span q="20">惠州</span>
		<span q="21">徐州</span>
		<span q="23">重庆</span>
		<span q="22">香港</span>
		</div>
	</div>
	<div class="desc">
		<div id="n1">
			<a href="desc.php?title=中骏天宸&img=1"><img class="1" src="img/b1.png"></a>
			<a href="desc.php?title=中骏西山天璟&img=2"><img class="1" src="img/b2.png"></a>
			<a href="desc.php?title=中骏四季花都&img=3"><img class="1" src="img/b3.png"></a>
			<a href="javascript:volid(0);"><img class="1" src="img/b4.png"></a>
			<a href="javascript:volid(0);"><img class="1" src="img/b5.png"></a>

			
			<a href="desc.php?title=中骏天悦&img=17"><img class="2" src="img/sh2.png"></a>
			<a href="desc.php?title=中骏广场&img=18"><img class="2" src="img/sh3.png"></a>
			<a href="desc.php?title=中骏柏景湾&img=19"><img class="2" src="img/sh4.png"></a>
			<a href="desc.php?title=中骏雍景湾&img=20"><img class="2" src="img/sh5.png"></a>
			<!-- <a href="javascript:volid(0);"><img class="2" src="img/sh6.png"></a>
			<a href="javascript:volid(0);"><img class="2" src="img/sh7.png"></a>
			<a href="javascript:volid(0);"><img class="2" src="img/sh8.png"></a> -->
			<a href="javascript:volid(0);"><img class="2" src="img/sh9.png"></a>
			<a href="javascript:volid(0);"><img class="2" src="img/sh10.png"></a>
			<!-- <a href="javascript:volid(0);"><img class="2" src="img/sh11.png"></a> -->
			<a href="desc.php?title=中骏天誉&img=16"><img class="2" src="img/sh1.png"></a>
			
			<a href="desc.php?title=中骏四季阳光&img=6"><img class="3" src="img/shen1.png"></a>
			<a href="desc.php?title=中骏柏景湾&img=10"><img class="4" src="img/tj1.png"></a>
			<a href="desc.php?title=中骏雍景府&img=11"><img class="4" src="img/tj2.png"></a>
			<a href="desc.php?title=中骏云景台&img=12"><img class="4" src="img/tj3.png"></a>
			<a href="javascript:volid(0);"><img class="5" src="img/jn1.png"></a>
			<a href="javascript:volid(0);"><img class="6" src="img/qd1.png"></a>
			<a href="javascript:volid(0);"><img class="7" src="img/ts1.png"></a>
			<a href="desc.php?title=中骏国际社区&img=9"><img class="8" src="img/lin1.png"></a>
			<!-- <a href="javascript:volid(0);"><img class="8" src="img/lin2.png"></a> -->
			<a href="desc.php?title=中骏汤泉香墅&img=8"><img class="9" src="img/an1.png"></a>
			<a href="desc.php?title=中骏雍景台&img=7"><img class="10" src="img/shang1.png"></a>
			<a href="desc.php?title=中骏蓝湾香郡&img=4"><img class="11" src="img/nc1.png"></a>
			<a href="desc.php?title=中骏尚城&img=5"><img class="11" src="img/nc2.png"></a>

			<a href="javascript:volid(0);"><img class="12" src="img/xm1.png"></a>
			<a href="javascript:volid(0);"><img class="12" src="img/xm2.png"></a>
			<a href="javascript:volid(0);"><img class="12" src="img/xm3.png"></a>
			<a href="javascript:volid(0);"><img class="12" src="img/xm4.png"></a>
			<a href="javascript:volid(0);"><img class="12" src="img/xm5.png"></a>
			<a href="javascript:volid(0);"><img class="12" src="img/xm6.png"></a>
			<a href="javascript:volid(0);"><img class="12" src="img/xm7.png"></a>
			<a href="javascript:volid(0);"><img class="12" src="img/xm8.png"></a>

			<a href="desc.php?title=中骏蓝湾香郡&img=13"><img class="13" src="img/zz1.png"></a>
			<a href="desc.php?title=中骏四季阳光&img=14"><img class="13" src="img/zz2.png"></a>
			<a href="desc.php?title=中骏四季花都&img=35"><img class="13" src="img/zz3.png"></a>
			
			<a href="desc.php?title=中骏天峰&img=22"><img class="14" src="img/qz1.png"></a>
			<a href="desc.php?title=中骏天璟&img=23"><img class="14" src="img/qz2.png"></a>
			<a href="desc.php?title=中骏四季阳光&img=24"><img class="14" src="img/qz3.png"></a>
			<a href="desc.php?title=泉州中骏商城&img=25"><img class="14" src="img/qz4.png"></a>
			<a href="desc.php?title=中骏广场&img=26"><img class="14" src="img/qz5.png"></a>
			<a href="desc.php?title=中骏四季花城&img=27"><img class="14" src="img/qz6.png"></a>
			<a href="desc.php?title=中骏蓝湾悦庭&img=28"><img class="14" src="img/qz7.png"></a>
			<a href="desc.php?title=中骏黄金海岸&img=29"><img class="14" src="img/qz8.png"></a>
			<a href="desc.php?title=石狮中骏商城&img=30"><img class="14" src="img/qz9.png"></a>
			<a href="desc.php?title=中骏天誉&img=31"><img class="14" src="img/qz10.png"></a>
			<a href="desc.php?title=中骏四季康城&img=32"><img class="14" src="img/qz11.png"></a>
			<a href="desc.php?title=中骏雍景湾&img=33"><img class="14" src="img/qz12.png"></a>
			<a href="desc.php?title=中骏愉景湾&img=34"><img class="14" src="img/qz13.png"></a>
			<a href="javascript:volid(0);"><img class="14" src="img/qz14.png"></a>
			<!-- <a href="javascript:volid(0);"><img class="14" src="img/qz15.png"></a> -->
			<a href="javascript:volid(0);"><img class="14" src="img/qz16.png"></a>
			<a href="javascript:volid(0);"><img class="14" src="img/qz17.png"></a>
			<a href="javascript:volid(0);"><img class="14" src="img/qz18.png"></a>
			<a href="javascript:volid(0);"><img class="14" src="img/qz19.png"></a>
			<a href="javascript:volid(0);"><img class="14" src="img/qz20.png"></a>
			<a href="javascript:volid(0);"><img class="14" src="img/qz21.png"></a>
			<a href="javascript:volid(0);"><img class="14" src="img/qz22.png"></a>
			<a href="javascript:volid(0);"><img class="14" src="img/qz23.png"></a>
			<!-- <a href="javascript:volid(0);"><img class="14" src="img/qz24.png"></a> -->
			<a href="javascript:volid(0);"><img class="14" src="img/qz25.png"></a>
			<a href="javascript:volid(0);"><img class="14" src="img/qz26.png"></a>
			<a href="javascript:volid(0);"><img class="14" src="img/qz27.png"></a>
			<a href="javascript:volid(0);"><img class="14" src="img/qz28.png"></a>
			<a href="javascript:volid(0);"><img class="14" src="img/qz29.png"></a>
			<a href="javascript:volid(0);"><img class="14" src="img/qz30.png"></a>
			<a href="javascript:volid(0);"><img class="14" src="img/qz31.png"></a>

			<a href="desc.php?title=中骏蓝湾香郡&img=15"><img class="15" src="img/ly1.png"></a>

			
			<a href="javascript:volid(0);"><img class="16" src="img/nj1.png"></a>
			<a href="javascript:volid(0);"><img class="16" src="img/nj2.png"></a>
			<a href="desc.php?title=中骏钱塘御景&img=21"><img class="17" src="img/hang1.png"></a>
			<a href="javascript:volid(0);"><img class="17" src="img/hang2.png"></a>
			<a href="javascript:volid(0);"><img class="18" src="img/sz1.png"></a>

			<a href="javascript:volid(0);"><img class="19" src="img/zj1.png"></a>

			<a href="javascript:volid(0);"><img class="20" src="img/hz1.png"></a>
			<a href="javascript:volid(0);"><img class="20" src="img/hz2.png"></a>
			<a href="javascript:volid(0);"><img class="21" src="img/xz1.png"></a>

			<a href="javascript:volid(0);"><img class="23" src="img/cq1.png"></a>

			<a href="javascript:volid(0);"><img class="22" src="img/xg1.png"></a>
		</div>
	</div>
	</div>
</body>
</html>
<script src="js/index.js"></script>
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
	 	 title: '中骏23城',
	      desc: '专筑您的感动',
	      link: 'http://szxytang.com/yin/wls/zzjun',
	      imgUrl: 'http://szxytang.com/yin/wls/zzjun/share.jpg'}
	      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
	  });
</script>