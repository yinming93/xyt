<?php
    //载入jssdk类
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>游戏规则</title>
</head>
<style>
	body{
		margin:0;
		padding: 0;
	}

</style>
<body>
<img src="images/guize.jpg" style="width:100%;" onclick="tz();">
</body>
</html>
<script>
	function tz(){
		window.location.href="index.php";
	}
</script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
        wx.config({
            debug: false,
            appId: '<?php echo $signPackage["appId"];?>',
            timestamp: <?php echo $signPackage["timestamp"];?>,
            nonceStr: '<?php echo $signPackage["nonceStr"];?>',
            signature: '<?php echo $signPackage["signature"];?>',
            jsApiList: [
                        'onMenuShareAppMessage','onMenuShareTimeline'
                        ]
        });
      
        wx.ready(function(){
            wx.onMenuShareAppMessage({
              title:  '不好！“猴塞雷”混入吉祥猴大军！！！',
              desc:   '放下手雷，也许我们还能做朋友',
              link:   'http://szxytang.com/yin/youxi/hhhh/',
              imgUrl: 'http://szxytang.com/yin/youxi/hhhh/share.jpg',
              trigger: function (res) {
              },
              success: function (res) {
              },
              cancel: function (res) {
              },
              fail: function (res) {
              }
            });
            wx.onMenuShareTimeline({
            title: '不好！“猴塞雷”混入吉祥猴大军！！！', // 分享标题
            link: 'http://szxytang.com/yin/youxi/hhhh/', // 分享链接
            imgUrl: 'http://szxytang.com/yin/youxi/hhhh/share.jpg', // 分享图标
            success: function () { 
            },
            cancel: function () {                 
            }
        });   
        });
        wx.error(function(res){
          alert(res.errMsg);
        });
    
    </script>