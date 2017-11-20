<?php
	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>景瑞东环之歌微楼书</title>
<meta name="keywords" content="景瑞东环之歌微楼书" />
<meta name="description" content="景瑞东环之歌微楼书" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
<meta name="apple-touch-fullscreen" content="yes" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no">
<script type="text/javascript" src="js/swipe.js"></script>
<script type="text/javascript" src="js/zepto.js"></script>
<link type="text/css" rel="stylesheet" href="css/mobi.css" media="all" />
</head>
<body>




<section id="M">
    <div class="toplogo"><img src="images/logo.png" width="100%" alt="景瑞东环之歌" /></div>
    <div style="-webkit-transform:translate3d(0,0,0);">
        <div id="banner_box" class="box_swipe">
            <ul>
                <li><img src="images/a1.jpg" alt="景瑞东环之歌" style="width:100%;" /></li>
                <li><img src="images/a2.jpg" alt="景瑞东环之歌" style="width:100%;" /></li>
				<!-- <li><img src="images/a3.jpg" alt="景瑞东环之歌" style="width:100%;" /></li>
                <li><img src="images/a4.jpg" alt="景瑞东环之歌" style="width:100%;" /></li>
				<li><img src="images/a5.jpg" alt="景瑞东环之歌" style="width:100%;" /></li> -->
            </ul>
            <ol>
                <li class="on"></li>
                <li ></li>
				 <!-- <li ></li>
				  <li ></li>
				   <li ></li> -->
            </ol>
        </div>
    </div>
	<script>
    $(function(){
		new Swipe(document.getElementById('banner_box'), {
			speed:500,
			auto:3000,
			callback: function(){
				var lis = $(this.element).next("ol").children();
				lis.removeClass("on").eq(this.index).addClass("on");
			}
		});
    });
    </script>
    <div class="index-menu">
        <ul>
		<br>
        	<li><a href="p2.php"><img src="images/btn_1.png" width="100%" alt="匠心景瑞"/></a></li>
            <li><a href="p1.php"><img src="images/btn_2.png" width="100%" alt="东环之歌"/></a></li>
            <li><a href="p3.php"><img src="images/btn_3.png" width="100%" alt="欢乐特区"/></a></li>
            <li><a href="http://xyt.xy-tang.com/2016hj/jingrui/main/"><img src="images/btnn.png" width="100%" alt="极致户型"/></a></li>
            <li><a href="http://mp.weixin.qq.com/mp/getmasssendmsg?__biz=MzIwNzQxOTc1NQ==#wechat_webview_type=1&wechat_redirect"><img src="images/btn_4.png" width="100%" alt="成长记事"/></a></li>
             </ul><br>
			<!-- <ul>
        	<li><a href="4.html"><img src="images/btn_5.png" width="100%" alt="龙湖物业"/></a></li>
            <li><a href="6.html"><img src="images/btn_6.png" width="100%" alt="明星顾问"/></a></li>
            <li><a href="dh.html"><img src="images/btn_7.png" width="100%" alt="GPS导航"/></a></li>
            <li><a href="15.html"><img src="images/btn_8.png" width="100%" alt="联系我们"/></a></li>
             </ul>
			 -->
    </div>
	
	<br/>
<div class="dashibg"><br><br><img src="images/bottom.png" width="100%" /></div>

   
</section>
<!--<div class="mline"><img src="images/line.png" width="100%" /></div>-->

<aside class="base-nav">
    <div class="plug-phone">
        <div class="plug-menu"><span class="close"></span></div>
        <div class="plug-btn plug-btn1 close"><a href="index.php"><span>首页</span></a></div>
        <div class="plug-btn plug-btn2 close"><a href="http://3gimg.qq.com/lightmap/v1/wxmarker/index.html?marker=coord:31.180990,120.672480;title:%E6%99%AF%E7%91%9E.%E4%B8%9C%E7%8E%AF%E4%B9%8B%E6%AD%8C;addr:%E6%B1%9F%E8%8B%8F%E7%9C%81%E8%8B%8F%E5%B7%9E%E5%B8%82%E5%90%B4%E6%B1%9F%E5%8C%BA%E5%BA%9E%E5%8C%97%E8%B7%AF369%E5%8F%B7&referer=wexinmp_profile"><span>到达</span></a></div>
        <div class="plug-btn plug-btn3 close"><a href="tel:88986666"><span>电话</span></a></div>
        <div class="plug-btn plug-btn4 close"><a href="p2.php"><span>活动</span></a></div>
    </div>
</aside>

<footer class="foot">&copy; 2016 景瑞东环之歌</footer>
<script src="js/1.0.js"></script>
<script src="js/gmu.js"></script>
<script src="js/mod.js"></script>
<div style="display:none;"><!-- 统计链接 --></div>
<script type="text/javascript">
var dataForWeixin={
	appId:	"wx83898e248caccf71​",
	img:	"http://114.215.183.41/wls/lhsdtj2/images/a1.jpg",
	url:	"http://114.215.183.41/wls/lhsdtj2/index.html",
	title:	"景瑞东环之歌微楼书",
	desc:	"景瑞东环之歌，一个时代，一个天街",
	fakeid:	"",
};
(function(){
	var onBridgeReady=function(){
		// 发送给好友; 
		WeixinJSBridge.on('menu:share:appmessage', function(argv){
			WeixinJSBridge.invoke('sendAppMessage',{
				"appid":		dataForWeixin.appId,
				"img_url":		dataForWeixin.img,
				"img_width":	"120",
				"img_height":	"120",
				"link":				dataForWeixin.url,
				"desc":				dataForWeixin.desc,
				"title":			dataForWeixin.title
			}, function(res){});
		});
		// 分享到朋友圈;
		WeixinJSBridge.on('menu:share:timeline', function(argv){
			WeixinJSBridge.invoke('shareTimeline',{
			"img_url":dataForWeixin.img,
			"img_width":"120",
			"img_height":"120",
			"link":dataForWeixin.url,
			"desc":dataForWeixin.desc,
			"title":dataForWeixin.title
			}, function(res){});
		});
	};
	if(document.addEventListener){
		document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
	}else if(document.attachEvent){
		document.attachEvent('WeixinJSBridgeReady'   , onBridgeReady);
		document.attachEvent('onWeixinJSBridgeReady' , onBridgeReady);
	}
})();
</script>
</body>
</html>
<!--开始-->
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js">
</script>
<script type="text/javascript">

wx.config({
        debug: false,
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: '<?php echo $signPackage["timestamp"];?>',
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: [
    "onMenuShareTimeline","onMenuShareAppMessage"
          // 所有要调用的 API 都要加到这个列表中
        ]
      });
     wx.ready(function () {
    var shareinfo={
       title: '景瑞东环之歌微楼书',
          desc: '景瑞东环之歌微楼书',
          link: 'http://xyt.xy-tang.com/yin/wls/dhzg',
          imgUrl: 'http://xyt.xy-tang.com/yin/wls/dhzg/share.jpg'
      }
      wx.onMenuShareTimeline(shareinfo);
   wx.onMenuShareAppMessage(shareinfo);
      });
    </script>
<!--结束-->