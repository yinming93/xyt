<?php
    //载入jssdk类
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>七夕你上头条了么？</title>
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
		<link rel="stylesheet" href="css/index.css" />
		<script>
			var _hmt = _hmt || [];
			(function() {
				var hm = document.createElement("script");
				hm.src = "//hm.baidu.com/hm.js?de044ac7e9aafaab02af47e3bce39a4a";
				var s = document.getElementsByTagName("script")[0];
				s.parentNode.insertBefore(hm, s);
			})();
		</script>

	</head>

	<body>
		<audio id="Jaudio" class="yinyue" src="mp3/bgm.mp3" preload loop="loop" autoplay="autoplay"></audio>
		<div id="loading">
			<img src="img/1.jpg" class="p" />
			<img src="img/1.png" class="loadImg" />
			<p class="loadText">0%</p>
		</div>
		<div id="index">
			<div id="pageone">
				<img src="img/1.jpg" class="p" />
				<!--<img src="jpg/bj2.jpg" class="p" />-->
				<img src="img/2.png" class="pageOne-1" />
				<img src="img/2-1.png" class="pageOne-2" />
				<img src="img/2-2.png" class="pageOne-3" />
				<img src="img/2-3.png" class="pageOne-4" />
				<img src="img/2-4.png" class="pageOne-5" />
			</div>
			<div id="pagetwo" style="display: none;">
				<img src="img/1.jpg" class="p" />
				<img src="img/3.png" class="pageTwo-1" />
				<img src="img/3-2.png" class="pageTwo-2" />
				<img src="img/3-3.png" class="pageTwo-3" />
				<img src="img/3-5.png" class="pageTwo-22" style="display:none;" />
				<img src="img/3-6.png" class="pageTwo-33" style="display:none;" />
				<img src="img/3-4.png" class="pageTwo-44"/>
				<input type="text" name="nameone" class="nameone" id="nameone" />
				<img src="img/submit.png" class="submit" />
			</div>
			<div id="pagethree" style="display: none;">
				<img src="img/1.jpg" class="p" />
				<img src="img/3.png" class="pageThree-1" />
				<img src="img/4-1.png" class="pageThree-2" />
				<img src="img/4-2.png" class="pageThree-3" />
				<img src="img/4-5.png" class="pageThree-22" style="display:none;" />
				<img src="img/4-6.png" class="pageThree-33" style="display:none;" />
				<img src="img/3-4.png" class="pageThree-44"/>
				<input type="text" name="nametwo" class="nametwo" id="nametwo" />
				<img src="img/submit.png" class="submit" />
			</div>
			<div class="result">
				<img src="" class="result-1" />
				<p class="result-2">长按图片保存</p>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/jweixin-1.0.0.js"></script>
		<script type="text/javascript" src="js/share.js"></script>
		<script type="text/javascript" src="js/loading.js"></script>
		<script type="text/javascript" src="js/index.js"></script>

	</body>

</html>
<!--开始-->
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
       title: '七夕你上头条了么？',
          desc: '大好七夕，你是什么狗？',
          link: 'http://szxytang.com/yin/youxi/zbqixi2',
          imgUrl: 'http://szxytang.com/yin/youxi/zbqixi2/share.jpg'
      }
      wx.onMenuShareTimeline(shareinfo);
   wx.onMenuShareAppMessage(shareinfo);
      });
    </script>
<!--结束-->