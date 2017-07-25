<?php
    //载入jssdk类
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
    
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta charset="UTF-8">

<meta name="viewport"

	content="initial-scale=1, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0, width=device-width">

<meta name="screen-orientation" content="portrait">

<meta name="description" content="" />

<meta name="sharelogo" content="" />

<meta charset="utf-8">

<title>【有奖游戏】浪漫七夕 快来帮牛郎追织女吧！</title>

<link rel="stylesheet" href="../addons/lonaking_niulangfly/template/mobile/css/game.css" />

<script>

	var gConfig = {

		wxDesc : "\u7ec7\u5973\u7684\u7b49\u5f85\uff0c\u738b\u6bcd\u7684\u963b\u6320\uff0c\u4e03\u5915\u7684\u6765\u4e34\uff0c\u5954\u8dd1\u5427\u725b\u90ce\u3002",

		wxData : {

			imgUrl : "../addons/lonaking_niulangfly/template/mobile/images/logo.png",

			desc : "\u7ec7\u5973\u7684\u7b49\u5f85\uff0c\u738b\u6bcd\u7684\u963b\u6320\uff0c\u4e03\u5915\u7684\u6765\u4e34\uff0c\u5954\u8dd1\u5427\u725b\u90ce\u3002",

			title : "\u725b\u90ce\u8ffd\u7ec7\u5973\u0020\u7ea6\u60e0\u73ab\u7470\u5c9b"

		},

		share_img : "attachment/images/5/2016/08/tpiOr70NBHqS9SruPeRyIo7IZ191ze.jpg",

		share_title : "【牛郎追织女】玩七夕游戏，赢清爽福利",

		share_content :"\u7ec7\u5973\u7684\u7b49\u5f85\uff0c\u738b\u6bcd\u7684\u963b\u6320\uff0c\u4e03\u5915\u7684\u6765\u4e34\uff0c\u5954\u8dd1\u5427\u725b\u90ce\u3002",

	}

</script>

</head>

<body>

	<form name="form1" method="post" action="?from=singlemessage"

		id="form1">

		<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE"

			value="wEPDwULLTE5ODg2NDM5NjFkZDGpmvtxftOquKsnmpod+AL06Xb6842ChsiRumgNNhI6" />



		<div style='display: none;'>

			<img src="../addons/lonaking_niulangfly/template/mobile/images/logo.png" />

		</div>

		<div id="main">

			<div id="guidePanel"></div>

			<div id="gamePanel">

				<div class="score-wrap">

					<div class="heart"></div>

					<span id="score">000000</span>

				</div>

				<canvas id="stage">

                    <span>Browser does not support the canvas.</span>

                </canvas>

			</div>

			<div id="gameoverPanel"></div>

			<div id="resultPanel">

				<div class="weixin-share"></div>

				<a href="javascript:void(0)" class="replay">再玩一次</a>

				<div id="scoreBoard" class="panel">

					<div class="rank">

						<img src="../addons/lonaking_niulangfly/template/mobile/images/info.png" />



					</div>

					<div class="score-result score-1">

						<p class="tips">你木有追到一个织女哦~</p>

						<a href="javascript:void(0)" class="share"

							data-desc="牛郎一路狂奔，被织女们华丽丽的无视，心塞！">向基友们求人品！</a>
						<a href="bm.php"><img src="tjfs.png" style="width:38%;background-color:;position:absolute;left:31%;top:64%;"></a>
					</div>

					<div class="score-result score-2">

						<p class="tips">

							矮油，成功追到<span id="fenshu">7</span>个织女

						</p>

						<a href="javascript:void(0)" class="share"

							data-desc="我追到了{x}个织女，据说全球只有5个人能追到200个！">向小伙伴炫耀！</a>
						<a href="bm.php"><img src="tjfs.png" style="width:38%;background-color:;position:absolute;left:31%;top:64%;"></a>
					</div>

					<div class="score-result score-3">

						<p class="tips">

							哇噢，成功追到<span>20</span>个织女！<br> 获得了一个爱心礼盒

						</p>

						<a href="javascript:void(0)" class="lottery">打开礼盒</a>
						<a href="bm.php"><img src="tjfs.png" style="width:38%;background-color:;position:absolute;left:31%;top:64%;"></a>
					</div>

				</div>

				<div id="prize" class="panel">

					<div class="prize-default">

						<img src="../addons/lonaking_niulangfly/template/mobile/images/biaoche.png" class="random-prize" /> <a

							href="javascript:void(0)" class="share"

							data-desc="牛郎成功追到{x}个织女回家~|牛郎成功追到{x}个织女回家~桃花运从天而降，再接再厉">向小伙伴炫耀！</a>
						<a href="bm.php"><img src="tjfs.png" style="width:38%;background-color:;position:absolute;left:31%;top:64%;"></a>
					</div>

					<div id="prizeResult" class="panel">

						<div class="scroll-rst"></div>

					</div>

				</div>

			</div>

		</div>

		<script src="../addons/lonaking_niulangfly/template/mobile/js/1102.js"></script>

		<script src="../addons/lonaking_niulangfly/template/mobile/js/jquery-md5-1.2.1.js"></script>

		<script src="../addons/lonaking_niulangfly/template/mobile/js/Game.js"></script>

		<script src="../addons/lonaking_niulangfly/template/mobile/js/cookie.js"></script>

		<script src="../addons/lonaking_niulangfly/template/mobile/js/weixin-api.js"></script>

		<script src="../addons/lonaking_niulangfly/template/mobile/js/iscroll.js"></script>

		<script src="../addons/lonaking_niulangfly/template/mobile/js/resource.js"></script>

		<script src="../addons/lonaking_niulangfly/template/mobile/js/main.js"></script>

	</form>
<style type="text/css">
.footFix{width:100%;text-align:center;position:fixed;left:0;bottom:0;z-index:999999;text-shadow: none;}
#footReturn{z-index: 999998;display: inline-block;text-align: center;text-decoration: none;vertical-align: middle;cursor: pointer;width: 100%;outline: 0 none;overflow: visible;padding: 0;height: 22px;opacity: .95;border-top: 1px solid #181818;background-color: #515151;}
#footReturn a{display: block;line-height: 22px;color: #fff;font-size: 12px;text-decoration:none;font-weight : normal;}
</style>
<div class="footFix" id="footReturn">
	<a href="javascript:void(0)" onClick="location.href='http://www.victormd.com/';"><span>技术支持：信玉堂</span></a>
</div>
<audio id='audio' src="sr.mp3" loop autoplay="autoplay"></audio>
</body>
<script>
// var score=document.getElementById("fenshu").getAttribute("value");
// document.cookie="code1="+score;
</script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script>
	/*

	 * 注意：

	 * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。

	 * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。

	 * 3. 完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html

	 *

	 * 如有问题请通过以下渠道反馈：

	 * 邮箱地址：weixin-open@qq.com

	 * 邮件主题：【微信JS-SDK反馈】具体问题

	 * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。

	 */

	wx.config({

		debug : false,

		appId: '',  //微信的appid需要在公众平台生成

        timestamp: '', //这是由php部分生成的

        nonceStr: '', //这是由php部分生成的

        signature: '', //这是由php部分生成的

		jsApiList : [

			'onMenuShareTimeline',

	        'onMenuShareAppMessage',

	        'onMenuShareQQ',

	        'onMenuShareWeibo'

        ]

	});

</script>

<script

	src="../addons/lonaking_niulangfly/template/mobile/js/wxshare.js"></script>

</html>
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
                        'onMenuShareAppMessage','onMenuShareTimeline'
                        ]
        });
      
        wx.ready(function(){
        //在这里调用 API

            wx.onMenuShareAppMessage({
              title:  '【有奖游戏】浪漫七夕 快来帮牛郎追织女吧！',
              desc:   '轻点牛郎，躲避王母，我们开始追织女！',
              link:   'http://xyt.xy-tang.com/yin/youxi/test0808/addons/',
              imgUrl: 'http://xyt.xy-tang.com/yin/youxi/test0808/addons/share.jpg',
              trigger: function (res) {
                //alert('用户点击发送给朋友');
              },
              success: function (res) {
                //alert('已分享');
                // getElementById('ssss').style.display='none';
                // getElementById('ffff').style.display='block';
                // document.getElementById('add_tel').style.display='block';
              },
              cancel: function (res) {
                //alert('已取消');
                // alert("只有先分享到朋友或朋友圈才可以查看分数！");
              },
              fail: function (res) {
                //alert(JSON.stringify(res));
              }
            });



            wx.onMenuShareTimeline({
            title: '【有奖游戏】浪漫七夕 快来帮牛郎追织女吧！', // 分享标题
            link: 'http://xyt.xy-tang.com/yin/youxi/test0808/addons/', // 分享链接
            imgUrl: 'http://xyt.xy-tang.com/yin/youxi/test0808/addons/share.jpg', // 分享图标
            success: function () { 
                // 用户确认分享后执行的回调函数
                //  getElementById('ssss').style.display='none';
                // getElementById('ffff').style.display='block';
                // document.getElementById('add_tel').style.display='block';
            },
            cancel: function () { 
                // 用户取消分享后执行的回调函数
                // alert("只有先分享到朋友或朋友圈才可以查看分数！");
            }
        });
        
        });
        
        //debug
        wx.error(function(res){
          // alert(res.errMsg);
        });
    
    </script>

