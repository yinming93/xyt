<?php
	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
<head>
	<title>植物H5案例分享</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
    <script src="static/js/jquery-1.8.2.min.js"></script>
	<meta http-equiv="Cache-Control" content="max-age=0" />
	<meta name="apple-touch-fullscreen" content="yes" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
</head>
<style>
	body{
		background: white;
		margin: 0;
		padding: 0;
	}
	.main{
		width: 100%;
		height: auto;
	}
	.tt{
		width: 100%;
		height: 40px;
		text-align: center;line-height: 40px;
		position: fixed;
		top: 0;
		left: 0;
		background: white;
		z-index: 999;
	}
	.xm{
		width: 100%;
		height: 240px;
		position: relative;
		top: 0;
		left: 0;
	}
	.x1{
		background:url('static/img/1.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x2{
		background:url('static/img/2.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x3{
		background:url('static/img/3.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x4{
		background:url('static/img/4.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x5{
		background:url('static/img/5.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x6{
		background:url('static/img/6.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x7{
		background:url('static/img/7.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x8{
		background:url('static/img/8.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x9{
		background:url('static/img/9.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x10{
		background:url('static/img/10.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x11{
		background:url('static/img/11.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x12{
		background:url('static/img/12.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x13{
		background:url('static/img/13.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x14{
		background:url('static/img/14.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x15{
		background:url('static/img/15.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x16{
		background:url('static/img/16.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x17{
		background:url('static/img/17.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x18{
		background:url('static/img/18.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x19{
		background:url('static/img/19.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x20{
		background:url('static/img/20.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x21{
		background:url('static/img/21.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x22{
		background:url('static/img/22.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x23{
		background:url('static/img/23.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x24{
		background:url('static/img/24.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x25{
		background:url('static/img/25.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x26{
		background:url('static/img/26.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x27{
		background:url('static/img/27.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x28{
		background:url('static/img/28.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x29{
		background:url('static/img/29.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x30{
		background:url('static/img/30.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x31{
		background:url('static/img/31.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x32{
		background:url('static/img/32.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x33{
		background:url('static/img/33.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x34{
		background:url('static/img/34.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.x35{
		background:url('static/img/35.jpg')no-repeat;
		background-size: 100% 100%;
	}
	.xm h3{
		width: 100%;
		height: 35px;
		line-height: 35px;
		background: black;
		color: white;
		opacity: 0.8;
		position: absolute;
		bottom: 0;
		margin: 0;
		overflow: hidden;
	}
</style>
<body>
<div class="main">
	<div class="tt">热门案例展示</div>
	<div style="height:40px;width:100%;"></div>
	<div class="tt" style="background:black;color:white;opacity:0.8;line-height:40px;top:40px;">
		<marquee border="0" align="middle" scrolldelay="100">公告：为了更好的观看H5 可在进入H5后点击右上角复制程序链接 粘贴到微信中完整观看</marquee>
	</div>
	

	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/X8MFCVBF">
		<div class="xm x33">
			<h3>深圳龙湖25周年庆</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/LjMV3Ut9">
		<div class="xm x32">
			<h3>不嗨森治愈所</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/EoSPQfE5">
		<div class="xm x31">
			<h3>湖州协信语音预约</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/12CmRZJD">
		<div class="xm x30">
			<h3>杭州龙湖老虎机</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/AZySNvzh">
		<div class="xm x29">
			<h3>仿抖音时光倒流</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/eyJxFLm3">
		<div class="xm x28">
			<h3>国瑞藏宝图</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/1w2f7iEu">
		<div class="xm x27">
			<h3>万科拼出2020</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/prZNmJKn">
		<div class="xm x26">
			<h3>魔范换装大比拼</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/BNqfEKtw">
		<div class="xm x25">
			<h3>微楼书</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/7XATm4UF">
		<div class="xm x24">
			<h3>邀请函</h3>
		</div>
	</a>

	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/PnYbqcQ9">
		<div class="xm x23">
			<h3>520写情书</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/LaqV6S1U">
		<div class="xm x22">
			<h3>画中画</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/X5JN1wTj">
		<div class="xm x21">
			<h3>全景展示海报</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/E2cTF5tS">
		<div class="xm x20">
			<h3>答题得奖</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/ub8S5fji">
		<div class="xm x19">
			<h3>语音户型</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/QjGWTr3S">
		<div class="xm x18">
			<h3>千年运河古韵今风</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/FYMFsyGX">
		<div class="xm x17">
			<h3>不将就社会人进阶手册</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/31tu3n6r">
		<div class="xm x16">
			<h3>横板序列微楼书</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/bYHvDy8q">
		<div class="xm x15">
			<h3>姓名测试</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/ppoCuCsF">
		<div class="xm x14">
			<h3>案名竞猜</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/4ZKbPauQ">
		<div class="xm x13">
			<h3>天生我材，星show未来</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/ZqE63pat">
		<div class="xm x12">
			<h3>点花灯 闹元宵</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.iiih5.cn/idea/NesPzjAF">
		<div class="xm x11">
			<h3>大世界小团圆，回家是爱</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/8oHJbQ8F">
		<div class="xm x10">
			<h3>签来运转|快来抽取你的2018幸运签</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/ggV9PzVB">
		<div class="xm x9">
			<h3>帮境哥哥找回圣诞礼物</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/9iUtfiac">
		<div class="xm x8">
			<h3>圣诞老人暖冬送好礼</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/9iUtfiac">
		<div class="xm x7">
			<h3>告白电台|有些话想对你说</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/jJMcGe1S">
		<div class="xm x6">
			<h3>悦一封家书 悦一生相随</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.iiih5.cn/idea/XozyguaL">
		<div class="xm x5">
			<h3>悦一封家书 悦一生相随</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/9vJopiR8">
		<div class="xm x4">
			<h3>少儿智能科博会</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.aiwall.com/v3/idea/xybqtTc9">
		<div class="xm x3">
			<h3>我想带你看世界</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.iiih5.cn/idea/YyGMQCHf">
		<div class="xm x2">
			<h3>生活的幸福感在哪里</h3>
		</div>
	</a>
	<a href="https://filef4ff590d54ac.iiih5.cn/idea/uLfkwqnB">
		<div class="xm x1">
			<h3>穿越苏州八大门 定格2500年</h3>
		</div>
	</a>

</div>
</body>
</html>
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
   title: '植物H5案例分享',
      desc: '热门案例',
      link: 'http://xytang88.com/yin/za/ymfx/index.php',
      imgUrl: 'http://xytang88.com/yin/za/ymfx/share.jpg'}
      wx.onMenuShareTimeline(shareinfo);
 wx.onMenuShareAppMessage(shareinfo);
  });
</script>