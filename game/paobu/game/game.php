
<?php

	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
	
?>

<script type="text/ecmascript" src="wxshare.js"></script>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="HandheldFriendly" content="True">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui" name="viewport">
<title>陪湾湾快跑赢大奖</title>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="format-detection" content="telephone=no"/>
<meta name="apple-mobile-web-app-status-bar-style" content="white">
<link href="../dist/css/uiqr.min.css" rel="stylesheet">
<script src="../src/modules/game/JafarSprite.js"></script>
<script src="../src/modules/game/diangeMain.js?1111"></script>
<script type="text/ecmascript" src="../dist/js/jquery.js"></script>
<script src="../dist/js/jquery.cookie.js"></script>
<script src="../dist/js/jquery.md5.js"></script>
<script src="../dist/js/share_v2.js"></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
$(function(){
  var h= $(window).height(); //浏览器当前窗口可视区域高度
  $(".game-bg").height(h+"px");
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
</head>
<body onLoad="diangeMain();">
<div class="game-body">
  <div class="game-bg">   
      <canvas id="game_canvas"></canvas>    
  </div>
</div>

<!-- 第一次游戏说明 -->
<div class="first-body" style="display:none">
  <div class="first-bg">
    <img src="../dist/images/tablet/shake.png">
    <h4>游戏玩法</h4>
    <p>玩家左右摇摆手机，控制淘气猴左右移动来吃金蛋。吃到金蛋可获得金币，不同的金蛋获得的金币不同。遇到路障躲避不成功时会减金币。到达终点【碧桂园翡翠湾展销中心】，游戏结束。</p>

    <a href="javascript:void(0)" class="btn-game" data-dismiss="modal">开始</a>
  </div>
</div>
<!-- 微信弹出框 -->
<div class="modal-backdrop fade" style="display:none"></div>
<div class="modal-share-wx" style="display:none"></div>

<!-- 分享信息 -->
<div class="modal fade" id="share-modal">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-body">
      <p class="text-center text-danger">复制链接分享到朋友圈或发送给微信好友</p>
      <p><input type="text" id="wxshare" value="http://hd.qr.cntv.cn/spring_online/mengwa/app/" class="form-control form-input"></p>
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
			   <a  style=" position:fixed; z-index:9999; bottom:0; left:0; color:#333; text-decoration:none; width:100%; text-align:center; font-size:10px">技术支持：信玉堂</a>  
<!--登录成功提示-->
<form action="result.php" tppabs="result.php" method="post" id="form1" name="form1">
<input type="hidden" id="txtAction" name="txtAction" value="" />
<input type="hidden" id="txtAction2" name="txtAction2" value="" />
<input type="hidden" id="txtAction3" name="txtAction3" value="" />
</form>


<script src="http://static.qr.cntv.cn/qr/js/libs/seajs/sea.js"></script>
<script src="../dist/js/init.js"></script>
<script src="../dist/js/wx.js"></script>
<script id="bdshare_js" data="type=tools&amp;uid=5447347" ></script>
<script id="bdshell_js"></script>
<script type="text/javascript">
function get(name)
{ 
    var reg = new RegExp("(\\?|&)"+ name +"=([^&]*)(&|$)");
    var r = window.location.search.toString().match(reg);
	
    if (r!=null){
return unescape(r[2]);
    }
    else{
return null; 
    }
}
function closeLoginTip(){
  $('#login-tip').hide();
  $('#login-tip').attr('class', 'modal fade');
}
//alert(get('login'));
$(function(){
  if(get('login') == 'ok'){
    //alert('abc');
    $('#login-tip').show();
    $('#login-tip').attr('class', 'modal fade in');
    setTimeout(closeLoginTip,3000);
  }
});
</script>
<script>
var bodyw = document.body.clientWidth;
//var bodyh = document.body.clientHeight;
//var bodyh= $(window).height();
var bodyh = document.body.scrollHeight;
var canvasID = document.getElementById('game_canvas');
var caw;
var cah;

var yaw = 768;
//var yah = 1024;
//var yah = 1366;
var yah = 1366;
var whb = yaw/yah;

/*
if(bodyw < 360){
    caw = 320;
}else if(bodyw >= 360 && bodyw < 767){
    caw = 360;
}else {
    caw = 768;
}
*/
caw = bodyw;


cah = yah*caw/yaw;
canvasID.width = caw;
//canvasID.height = cah;
canvasID.height = bodyh;
/*
var yBi = yaw/yah;
var cBi = caw/cah;

if(yBi>=cBi){
    gCScale = caw/yaw;
}else{
    gCScale = cah/yah;
}
*/
gCScale = caw/yaw

gImagePath = "../dist/images/diange/";

initRootSprite("game_canvas",24);
//gGameOver(100,10);

function onFlashInitComplete(){
	
   var play=$.cookie('play');
   
    if(play!=1)
    {
      $('.first-body').show();
      $.cookie('play',1,{
        expires:365,
        path:"/",
        domain:"hd.qr.cntv.cn",
        secure:false,
        raw:true
      });
	  
	  
    }else
    {	
      startGame();
    }
}
seajs.use(["jquery","bootstrap"], function($) {
    
    $(".modal-backdrop").click(function() {
      $(".modal-backdrop,.modal-share-wx").css({"display":"none"});
      $(".modal-backdrop").removeClass("in modal-backdrop-opacity");
    });
    $(".btn-game").click(function() {
      startGame();
      $(".first-body").css({"display":"none"});
    });   
    
    $("#wxshare").click(function(){
        this.select();
    });
});

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
				title: '陪湾湾快跑赢大奖', // 分享标题
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
			  title:  '陪湾湾快跑赢大奖',
			  desc:   '湾湾没想到，奖品如此丰富！',
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