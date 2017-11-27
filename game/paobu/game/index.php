


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
<meta name="HandheldFriendly" content="True">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<title>敢一战？动动手指争夺港城“跑王”</title>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="format-detection" content="telephone=no"/>
<link href="../dist/css/uiqr.min.css" rel="stylesheet">
<script type="text/ecmascript" src="../dist/js/jquery.js"></script>
<script type="text/javascript" src="../dist/js/share_v2.js"></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
$(function(){
  var h= $(window).height(); //浏览器当前窗口可视区域高度
  $(".index-bg").height(h+"px");
})
</script>
<!--    <script>
        $(function () {
            if (!is_wx()) { window.location.href = "test.html"; }
            
            var w = $(window).width();
            var h = w * 1.608;
            $(".result").height(h);



        })
        function is_wx() {
            var ua = navigator.userAgent.toLowerCase();
            if (ua.match(/MicroMessenger/i) == "micromessenger") {
                return true;
            } else {
                return false;
            }
        }
    </script>-->
<style type="text/css">
.ru{
  background-image:url('../dist/images/tablet/btn-rules.png');
  background-size: 100% 100%;
  width: 31.53%;
  height: 8.7%;
  position: absolute;
  top: 90%;
  left: 35%;
  z-index: 111;
}
.rule{position:absolute;left:0;top:0;width:100%;height:100%;z-index:999;-webkit-animation:fadeInDown .5s ease both; display:block}
.rule2{position:absolute;left:0;top:0;width:100%;height:100%;z-index:999;-webkit-animation:fadeInUp2 1s ease both; display:block}

@-webkit-keyframes fadeInDown{
0%{opacity:0;
-webkit-transform:translateY(-40px)}
100%{opacity:1;
-webkit-transform:translateY(0)}
}

@-webkit-keyframes fadeInUp2{
0%{opacity:1;
-webkit-transform:translateY(0)}
100%{opacity:0;
-webkit-transform:translateY(40px)}
}

</style>
</head>

<body>
<div class="index-body">
  <div class="index-bg"> 
      <!-- <a href="rank.php" class="btn-begin2 btnB">排行榜</a>   -->
      <a href="game.php" class="btn-begin btnA" style="position: absolute;top:83%;">开始</a>
      <!-- 规则 -->
      <a href="javascript:showrule();"><p class="ru"></p></a>
      <div id="rules" style="display:none;" ><img style="width:375px;margin-left:-28px;" src="../dist/images/tablet/index-rules.jpg" id="rule" onClick="hiderule()" /></div>

      <div class="shakeboy"></div>
      <!-- <div class="sheep01"></div> -->
      <div class="sheep02"></div>
      <div class="sheep03"></div>
      <div class="sheep04" style="display:none"></div>
  </div>
</div>
<!-- 微信弹出框 -->
<div class="modal-backdrop fade" style="display:none"></div>
<div class="modal-share-wx" style="display:none"></div>
<!-- share Modal -->
<div class="modal fade" id="share-modal">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-body">
      <p class="text-center text-danger">复制链接分享到朋友圈或发送给微信好友</p>
      <p><input type="text" id="wxshare" value="http://wx.guguan.net/weixin/game/mengwa/app/" class="form-control form-input"></p>
      <p class="text-center text-danger">点击下边的图标与朋友分享</p>
      <div class="text-center">
          <!-- Baidu Button BEGIN -->
          <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare" style="display:inline-block;float:none;">
          <a class="bds_tsina share_cbtn"></a>
          <a class="bds_tqq share_cbtn"></a>
          <a class="bds_qzone share_cbtn"></a>
          </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-default btn-big" data-dismiss="modal">取消</a>
    </div>
    </div>
</div>
</div>
			   <a href="http://wx.guguan.net/web/guguan/" style=" position:fixed; z-index:9999; bottom:0; left:0; color:white; text-decoration:none; width:100%; text-align:center; font-size:10px">技术支持：信玉堂</a>
<!--<script src="http://static.qr.cntv.cn/qr/js/libs/seajs/sea.js"></script>-->
<script src="../dist/js/init.js"></script>
<script src="../dist/js/wx.js"></script>
<script src="../dist/js/jquery.md5.js"></script>
<script src="../dist/js/jquery.cookie.js"></script>
<script id="bdshare_js" data="type=tools&amp;uid=5447347" ></script>
<script id="bdshell_js"></script>
<script>
// Set configuration

seajs.use(["jquery","bootstrap"], function($) {
  $(".modal-backdrop").click(function(){
        $(".modal-backdrop,.modal-share-wx").css({"display":"none"});
        $(".modal-backdrop").removeClass("in modal-backdrop-opacity");
    })
  

    $("#wxshare").click(function(){
        this.select();
    });

});
$(function(){
    $(".sheep03").addClass("animated zoomOut");
        window.setTimeout(function(){
        $(".sheep04").addClass("animated zoomIn").show();    
      },500); 
         window.setTimeout(function(){
        $(".sheep04").addClass("animated swing");    
      },1200); 
})


function showrule(){
  rules=document.getElementById("rules");
  rule=document.getElementById("rule");
  rules.style.display="block";
  rule.className="rule";
  }
  
function hiderule(){
  rules=document.getElementById("rules");
  rule=document.getElementById("rule");
  rule.className="rule2";
  setTimeout("rules.style.display='none';",2000);
  } 
</script>


<script>


		wx.config({
			debug: false,
			appId: '<?php echo $signPackage["appId"];?>',
			timestamp: <?php echo $signPackage["timestamp"];?>,
			nonceStr: '<?php echo $signPackage["nonceStr"];?>',
			signature: '<?php echo $signPackage["signature"];?>',
			jsApiList: [
			 //所有要调用的 API 都要加到这个列表中
						'hideOptionMenu',
						'hideAllNonBaseMenuItem',
						'onMenuShareAppMessage',
						'onMenuShareTimeline'
						]
		});
	  
	    wx.ready(function(){
	    //在这里调用 API
			//隐藏所有非基础按钮接口
			//wx.hideAllNonBaseMenuItem();
			//隐藏右上角菜单接口
			//wx.hideOptionMenu();			
		
		
			wx.onMenuShareTimeline({
				title: '敢一战？动动手指争夺港城“跑王”', // 分享标题
				link: 'http://szxytang.com/yin/youxi/paobu/game/', // 分享链接
			    imgUrl: 'http://szxytang.com/yin/youxi/paobu/share.png', // 分享图标
				success: function () { 
					// 用户确认分享后执行的回调函数
					//window.location.href = 'http://www.baidu.com';
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
			  title:  '敢一战？动动手指争夺港城“跑王”',
			  desc:   '碧桂园·翡翠湾杯爱心欢乐跑“线上”开跑啦！缤纷大礼争夺战今日打响！',
			  link: 'http://szxytang.com/yin/youxi/paobu/game/', // 分享链接
			  imgUrl: 'http://szxytang.com/yin/youxi/paobu/share.png', // 分享图标
			  trigger: function (res) {
				//alert('用户点击发送给朋友');
			  },
			  success: function (res) {
				//alert('已分享');
				//window.location.href = 'http://www.baidu.com';
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

</body>
</html>