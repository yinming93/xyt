<?php
   require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
?>
<html lang="en"><head>
    <title>回溯时光 重拾城长</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<META name="pragma" CONTENT="no-cache">
<META name="expires" CONTENT="0"> 
    <link rel="stylesheet" href="main.css?v=5">
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
 <script src="js/easeljs-0.7.1.min.js"></script>
<script src="js/tweenjs-0.5.1.min.js"></script>
<script src="js/movieclip-0.7.1.min.js"></script>
<script src="js/preloadjs-0.4.1.min.js"></script>
<script src="js/soundjs-0.5.2.min.js"></script>
<script src="2017-04-01-hnsgcscz.js"></script>
</head>
 <script>
wx.config({    
debug: false,    
appId: 'wx20279b322c91c6d1',    
timestamp: '1507789041',    
nonceStr: 'DqLoDLhfMDZ4kT4x',    
signature: 'b4ddc86c536e6971d135b196e61220615d850401',    
jsApiList: [    
 		'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo',
        'hideMenuItems',
        'showMenuItems',
        'hideAllNonBaseMenuItem',
        'showAllNonBaseMenuItem',
        'translateVoice',
        'startRecord',
        'stopRecord',
        'onRecordEnd',
        'playVoice',
        'pauseVoice',
        'stopVoice',
        'uploadVoice',
        'downloadVoice',
        'chooseImage',
        'previewImage',
        'uploadImage',
        'downloadImage',
        'getNetworkType',
        'openLocation',
        'getLocation',
        'hideOptionMenu',
        'showOptionMenu',
        'closeWindow',
        'scanQRCode',
        'chooseWXPay',
        'openProductSpecificView',
        'addCard',
        'chooseCard',
        'openCard'
]    
});    

wx.ready(function () {
  WeixinJSBridge.call('showOptionMenu');
    var shareData = {
    title: '回溯时光 重拾城长',
    desc: '回溯时光 重拾城长',
    link: '24/pmd/index.php',
    imgUrl: '24/pmd/images/fx1.jpg',
  };
 
  //分享朋友
  wx.onMenuShareAppMessage({
       title: shareData.title,
      desc: shareData.desc,
      link: shareData.link,
      imgUrl:shareData.imgUrl,
      trigger: function (res) {
      },
      success: function (res) {
       
      },
      cancel: function (res) {
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
    });
 //朋友圈
  wx.onMenuShareTimeline({
      title: shareData.title,
      link: shareData.link,
      imgUrl:shareData.imgUrl,
      trigger: function (res) {
      },
      success: function (res) {
        
      },
      cancel: function (res) {
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
    });   
    
  });
</script> 

<script>
var canvas, stage, exportRoot;

function init1() {
	createjs.MotionGuidePlugin.install();

	canvas = document.getElementById("canvas");
	images = images||{};
	stage = new createjs.Stage(canvas);
		
    //bg  = new createjs.Bitmap("imgs/p1.jpg");
	// bg.nominalBounds = new createjs.Rectangle(0,0,640,1010);
	  //stage.addChild(bg);
	 message = new createjs.Text("", "24px Arial", "#ffffff");
	//message1 = new createjs.Text("技术支持:尼克整合传播 ", "18px Arial", "6c6c6c");
    stage.addChild(message);
	//stage.addChild(message1);
	//stage.addChild(bg,message);
	message.x = 200;
	  //message1.x = 220;
    message.y = 480;
	
	//message1.y = 900;
	stage.update();

	var loader = new createjs.LoadQueue(true);
	loader.installPlugin(createjs.Sound);
	 loader.addEventListener("progress",handleProgress);
	loader.addEventListener("fileload", handleFileLoad);
	loader.addEventListener("complete", handleComplete);
	loader.loadManifest(lib.properties.manifest);
}

function handleFileLoad(evt) {
	if (evt.item.type == "image") { images[evt.item.id] = evt.result; }
}
function handleProgress(event){
     message.text = "Now Loading... " + Math.floor(event.progress * 100)+ "%";
    stage.update();
}
function handleComplete() {
	exportRoot =  new lib._20170401hnsgcscz();
	dd();
	stage = new createjs.Stage(canvas);
	stage.addChild(exportRoot);
	stage.update();

	createjs.Ticker.setFPS(lib.properties.fps);
	createjs.Ticker.addEventListener("tick", stage);
}

function playSound(id, loop) {
	createjs.Sound.play(id, createjs.Sound.INTERRUPT_EARLY, 0, 0, loop);
}

function dd()
{
	var scr = document.createElement('script');
	scr.src='analytics.js';
	scr.type='text/javascript';
	document.body.appendChild(scr);
	var scr = document.createElement('script');
	scr.src='impublic/built/main.js?v=6961';
	scr.type='text/javascript';
	document.body.appendChild(scr);
}
</script>
<script type="text/javascript"> 

 //var firstTouch = true; $('body').bind("touchstart",function(e){ if ( firstTouch ) { firstTouch = false; document.getElementById('audio').play(); }else{ return; } }); 

document.addEventListener('DOMContentLoaded', function () {
    function audioAutoPlay() {
        var audio = document.getElementById('audio');
            audio.play();
        document.addEventListener("WeixinJSBridgeReady", function () {
            audio.play();
        }, false);
    }
    audioAutoPlay();
});
 
function a()
{
	var jinzhi=0;document.getElementById('canvas').addEventListener("touchmove",function(e){if(jinzhi==0){e.preventDefault();e.stopPropagation();}},false);
	
		
}
function d1()
{
	
	 var audio = document.getElementById('audio');
            audio.play();
}
function d2()
{
	
	 var audio = document.getElementById('audio');
            audio.pause();
}
</script>
<style>
iframe{ width:0% !important; height:0% !important; display:none !important;}
#close_f7a28ecb68c57c73c2e4_0d6bf445123{ display:none !important;}
#_yn_g_g{ display:none !important;}
#_yn_gg_0{ display:none !important;}
</style>
<body onload="init1();a();">


<div id="three" style="display:none">
 </div>
<div id="main" style="transform-origin: 0px 0px 0px; width: 640px; height: 1070px; transform: scale3d(0.586, 0.586, 1); display:none">
   
     
    <div id="nav">
        <div class="btnMuteOn" onClick="d1();"></div>
        <div class="btnMuteOff" onClick="d2();"></div>
    </div>
    <div id="menu"></div>
    <div id="share"></div>
    <div id="preload" style="opacity: 0; display: none;">
        <div class="group" style="transform: rotateZ(90deg) scale3d(8, 8, 1);">
            <div class="p1"></div>
            <div class="box1" style="margin-top: -80px;"></div>
            <div class="cat" style="margin-top: -30px;"></div>
            <div class="box2"></div>
            <div class="n1">1</div>
            <div class="n2">0</div>
            <div class="n3">0</div>
        </div>
        <div class="txt1"></div>
    </div>
    <div id="tip2" style="display: none;"></div>
</div>

<audio id="bgm" preload="auto" src="bgm.mp3" loop></audio>

<canvas id="canvas" width="640" height="1010" style=" height: 100%;width: 100%;margin: 0;padding: 0;display: block;z-index:100;background-color:black;"></canvas>
 <audio   preload="true" class=" plugin-music" id="audio" src="bgm.mp3"  loop="true"></audio>
 
<input type="hidden" id="go" value="0">
<script src="impublic/js/libs/three/three.min.js"></script>
 <div style="display:none">
<script src="js/z_stat.js" language="JavaScript"></script></div>
<div style="display:none">
<script src="js/z_stat.js" language="JavaScript"></script></div>



</body></html>
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
     title: '回溯时光',
        desc: '回溯',
        link: 'http://xytang88.com/yin/xz/pmd',
        imgUrl: 'http://xytang88.com/yin/xz/pmd/share.jpg'}
        wx.onMenuShareTimeline(shareinfo);
   wx.onMenuShareAppMessage(shareinfo);
    });
</script>