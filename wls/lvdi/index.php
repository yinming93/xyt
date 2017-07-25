<?php
	//引入js类文件
	 require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();

?>
<html class="ui-mobile">
<head>
<title>绿地都会雅苑</title>
<meta name="Keywords" content="绿地都会雅苑" />
<meta name="Description" content="绿地都会雅苑" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="application/xhtml+xml;charset=utf-8" />
<meta http-equiv="Cache-Control" content="no-cache,must-revalidate" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta name="format-detection" content="telephone=no, address=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<link rel="stylesheet" href="css/indexcommen.css" type="text/css" />
<link rel="stylesheet" href="css/idangerous.s6-1.4.css" type="text/css">
</head>
<style>
.ttqq{
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
</style>
<body>
<img id="dd" src="images/first.png" alt="" style="width:100%;height:100%;position:absolute;top:0;left:0;z-index:200;"onclick="xs()">
<img class="ttqq" id="tt" src="images/tt.png" alt="" style="width:100%;position:absolute;top:0%;left:0;z-index:200;"onclick="xs()">
<div id="page">
<header>
<div style="width:40%; margin:0 auto; padding:5px 0 15px 0;"><img src="images/logo.png" width="100%" /></div>
</header>
<section>
<div id="banner" style="width:100% !important; height:31%;">
<div class="s6-container" style="width:100% !important;margin-top:20px;">
<div class="s6-wrapper" style="width:100% !important;">
<div class="s6-slide" style="width:100% !important;"><img src="images/1.jpg" width="88%" style="margin-left:6%;" /></div>
<div class="s6-slide" style="width:100% !important;"><img src="images/2.jpg" width="88%" style="margin-left:6%;" /></div>
<div class="s6-slide" style="width:100% !important;"><img src="images/3.jpg" width="88%" style="margin-left:6%;" /></div>
<div class="s6-slide" style="width:100% !important;"><img src="images/2.jpg" width="88%" style="margin-left:6%;" /></div>
</div>
</div>
</div>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/fullscript.js"></script>
<script type="text/javascript" src="js/effect.js"></script>
<div class="buttonzu" style="width:98%;">
<div class="buttonzu1">
<ul>
<li><a href="http://szxytang.com/2016hj/lvdi/fanye1/?winzoom=1.125"><span><img src="images/btn_1.png" width="90%" /></span></a></li>
<li><a href="gaikuang.html"><span><img src="images/btn_4.png" width="90%" /></span></a></li>
<li><a href="huxing.html"><span><img src="images/btn_2.png" width="90%" /></span></a></li>
<li><a href="peitao.html"><span><img src="images/btn_6.png" width="90%" /></span></a></li>
<div class="clear"></div>
</ul>
</div>
<div class="buttonzu2">
<ul>
<li><a href="wuye.html"><span><img src="images/btn_5.png" width="90%" /></span></a></li>
<li><a onclick="javascript:alert('模块建设中……');"><span><img src="images/btn_3.png" width="90%" /></span></a></li>
<li><a href="http://szxytang.com/2016hj/lvdi/dh"><span><img src="images/btn_8.png" width="90%" /></span></a></li>
<li><a href="tel:051265909999"><span><img src="images/btn_7.png" width="90%" /></span></a></li>
<div class="clear"></div>
</ul>
</div>
</div>
<!-- <div style="text-align:center; vertical-align:bottom; width:95%; margin:0 auto; overflow:hidden; padding-top:30px; padding-bottom:10px;"> -->
	
<!-- <div style="float:left; width:48%; margin:0 auto; text-align:center;"><a href="shipin.html"><img src="images/ft_1.jpg" width="100%" /></a></div>
<div style="float:right; width:48%; margin:0 auto; text-align:center;"><a href="shijing.html"><img src="images/ft_2.jpg" width="100%" /></a></div> -->
<!-- </div> -->
<h1 style="position:absolute; bottom:1%; left:38%; color:#FBED87; font-size:11px;" >技术支持|信玉堂<h1>
</section>
</div>
<script type="text/javascript" src="js/round.js"></script>
<script>
	function xs(){
		$("#dd").fadeOut(1000);
		$("#tt").fadeOut(1000);
	}
</script>
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
              // 所有要调用的 API 都要加到这个列表中
            ]
          });
         wx.ready(function () {
        var shareinfo={
             title: '绿地都会雅苑',
              desc: '微楼书',
              link: 'http://szxytang.com/yin/wls/lvdi',
              imgUrl: 'http://szxytang.com/yin/wls/lvdi/share.jpg'
          }
      wx.onMenuShareTimeline(shareinfo);
     wx.onMenuShareAppMessage(shareinfo);
          });
    </script>