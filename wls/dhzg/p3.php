<?php
	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
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
<link rel="stylesheet" type="text/css" href="css/onlinebooking.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/mobi.css" media="all" />
</head>
<body onselectstart="return true;" ondragstart="return false;" class="black">





<div class="qiandaobanner"><img src="images/p3.jpg"></div>

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