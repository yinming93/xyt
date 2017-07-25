<?php
	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
	
?><!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>龙湖九墅—邀您共鉴锡城之巅！</title>

  <link rel="stylesheet" href="css/normalize.css">

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>
<div style="text-align:center;clear:both;position:absolute;top:0;left:260px">
<!-- <script src="/gg_bd_ad_720x90.js" type="text/javascript"></script>
<script src="/follow.js" type="text/javascript"></script> -->

</div>
<canvas class="canvas"></canvas>

<div class="help" hidden="true">?</div> 

<div class="ui">
  <input class="ui-input" hidden="true"  />
  <span class="ui-return"></span>
</div>

<div class="overlay">
  <div class="tabs">
    <div class="tabs-labels"><span class="tabs-label">Commands</span><span class="tabs-label">Info</span><span class="tabs-label">Share</span></div>

    <div class="tabs-panels">
      <ul class="tabs-panel commands">
        <li class="commands-item"><span class="commands-item-title">Text</span><span class="commands-item-info" data-demo="Hello :)">Type anything</span><span class="commands-item-action">Demo</span></li>
        <li class="commands-item"><span class="commands-item-title">Countdown</span><span class="commands-item-info" data-demo="#countdown 10">#countdown<span class="commands-item-mode">number</span></span><span class="commands-item-action">Demo</span></li>
        <li class="commands-item"><span class="commands-item-title">Time</span><span class="commands-item-info" data-demo="#time">#time</span><span class="commands-item-action">Demo</span></li>
        <li class="commands-item"><span class="commands-item-title">Rectangle</span><span class="commands-item-info" data-demo="#rectangle 30x15">#rectangle<span class="commands-item-mode">width x height</span></span><span class="commands-item-action">Demo</span></li>
        <li class="commands-item"><span class="commands-item-title">Circle</span><span class="commands-item-info" data-demo="#circle 25">#circle<span class="commands-item-mode">diameter</span></span><span class="commands-item-action">Demo</span></li>

        <li class="commands-item commands-item--gap"><span class="commands-item-title">Animate</span><span class="commands-item-info" data-demo="The time is|#time|#countdown 3|#icon thumbs-up"><span class="commands-item-mode">command1</span>&nbsp;|<span class="commands-item-mode">command2</span></span><span class="commands-item-action">Demo</span></li>
      </ul>

      <div class="tabs-panel ui-details">
        <div class="ui-details-content">
          <h1>Shape Shifter</h1>
          <p>
            An experiment by <a href="//www.kennethcachia.com" target="_blank">Kenneth Cachia<a/>.<br/>
            <a href="//fortawesome.github.io/Font-Awesome/#icons-new" target="_blank">Font Awesome</a> is being used to render all #icons.
          </p>

          <br/><p>Visit <a href="http://www.kennethcachia.com/shape-shifter/?a=#icon thumbs-up" target="_blank">Shape Shifter</a> to use icons.</p>
        </div>
      </div>

      <div class="tabs-panel ui-share">
        <div class="ui-share-content">
          <h1>Sharing</h1>
          <p>Simply add <em>?a=</em> to the current URL to share any static or animated text. Examples:</p>
          <p>
            <a href="http://www.kennethcachia.com/shape-shifter?a=Hello" target="_blank">www.kennethcachia.com/shape-shifter?a=Hello</a><br/>
            <a href="http://www.kennethcachia.com/shape-shifter?a=Hello|#countdown 3" target="_blank">www.kennethcachia.com/shape-shifter?a=Hello|#countdown 3</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

  <script src="js/index.js"></script>

</body>

</html>
<!--开始-->
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script>
		wx.config({
			debug: false,
			appId: '<?php echo $signPackage["appId"];?>',
			timestamp: <?php echo $signPackage["timestamp"];?>,
			nonceStr: '<?php echo $signPackage["nonceStr"];?>',
			signature: '<?php echo $signPackage["signature"];?>',
			jsApiList: [
			 //所有要调用的 API 都要加到这个列表中
						'onMenuShareAppMessage',
						'onMenuShareTimeline'
						]
		});
	  
	    wx.ready(function(){
	    //在这里调用 API

		
		
			wx.onMenuShareTimeline({
				title: '龙湖九墅—邀您共鉴锡城之巅！', // 分享标题
				link: 'http://xyt.xy-tang.com/yin/fanye/longhu9', // 分享链接
				imgUrl: 'http://xyt.xy-tang.com/yin/fanye/longhu9/share.jpg', // 分享图标
				success: function () { 
					// 用户确认分享后执行的回调函数
					//window.location.href = 'http://www.baidu.com';
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
			  title:  '龙湖九墅—邀您共鉴锡城之巅！',
			  desc:   '与您共同鉴证 锡城之巅',
			  link:   'http://xyt.xy-tang.com/yin/fanye/longhu9',
			  imgUrl: 'http://xyt.xy-tang.com/yin/fanye/longhu9/share.jpg',
			  trigger: function (res) {
				//alert('用户点击发送给朋友');
			  },
			  success: function (res) {
				//alert('已分享');
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
<!--结束-->