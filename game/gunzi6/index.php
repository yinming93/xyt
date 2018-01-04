<?php
    //引入js类文件
     require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
    if(isset($_GET['code'])){
        include 'func.php';
        define('CODE', $_GET['code']);
        define('APPID', 'wx461b5105da7629f1'); 
        define('APPSECRET', 'd80e5eb9158f81ed612f7b6810fb9093'); 
        //1
        //获页面授权的ACCESS_TOKEN 、 refresh_token、openid、 scope的类型
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".CODE."&grant_type=authorization_code";
        $json_access_token = https_request($url);
        $arr_access_token  = json_decode($json_access_token, true); //获取access_token
        //2.
        $openid = $arr_access_token['openid'];
    } else{
        //echo "NO CODE";
        echo '操作失败！';
        exit;
        //写入日记文件
    }
    if(!$openid){
    echo "<script>";
    echo "window.location.href='http://xytang88.com/yin/youxi/gunzi6/getcodeurl.php';";
    echo "</script>";
    exit;
 }
 // 当前时间戳
    // $xz=time();
    // 活动结束时间
    // $js=strtotime('2018-05-24 14:00:00');
    // if ($xz>$js){
    echo "<script>";
    echo "alert('本次活动已圆满结束，感谢您的参与！');";
    echo "window.location='sel.php'";
    echo "</script>";
    // }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>今年圣诞求不坑 </title>
    <link rel="icon" type="image/GIF" href="res/favicon.ico"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="full-screen" content="yes"/>
    <meta name="screen-orientation" content="portrait"/>
    <meta name="x5-fullscreen" content="true"/>
    <meta name="360-fullscreen" content="true"/>
    <style>
        body, canvas, div {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
    .input{
    width: 90%;
    bottom: 0;
    position: fixed;
    z-index: 1000000000;
    background: #fff;
    padding: 5%;
    color:#444;
    display: none;
}
    .input input{
    width:80%;
    height: 30px;
    margin-top: 10px;
}
#sub{
    width: 80%;
    height: 2em;
    text-align: center;
    line-height: 2em;
    margin-top: 10%;
    margin-bottom: 20px;
    background:red;
    color: #fff;
}
.close{
    width: 1.5em;
    height: 1.5em;
    position: absolute;
    top: 0px;
    right: 0px;
    text-align: center;
    line-height: 1.5em;
    background: red;
    font-size: 1.2em;
    font-weight: bold;
    color: #fff;
}
    </style>
</head>
<script>
		function sy(){
			var play= document.getElementById('audio');		
			play.play();

		};
    </script>
<body style="padding:0; margin: 0; background: #000;" onload="sy()">
 <div class="input">
    <div class="close">X</div>
            <center>
                <p>填写信息</p>
            <input type="text" name="uname" id="uname" placeholder="姓名" value="" />
            <input type="text" name="tel" id="tel" placeholder="电话" value="" />
            <div id="sub">
                我要参加吴中相亲大会
            </div>
            </center>
             <span>提示：填写的用户才能参与吴中相亲大会！</span>
</div> 
<audio id='audio' src="./sr.mp3" loop autoplay="autoplay"></audio>
<canvas id="gameCanvas" width="800" height="450"></canvas>
<script src="frameworks/cocos2d-html5/CCBoot.js"></script>
<script src="main.js"></script>
<script src='src/jquery-1.8.3.min.js' type="text/javascript"></script>
</body>
</html>
<script>
	 setTimeout(function(){
	     $(window).scrollTop(1);
	 },0);
	  document.getElementById('audio').play();
	  document.addEventListener("WeixinJSBridgeReady", function () {
			WeixinJSBridge.invoke('getNetworkType', {}, function (e) {
	            document.getElementById('audio').play();
			});
	  }, false);
	</script>

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
             title: '今年圣诞求不坑 ',
              desc: '圣诞那些坑，你能过几个？',
              link: 'http://xytang88.com/yin/youxi/gunzi6/getcodeurl.php',
              imgUrl: 'http://xytang88.com/yin/youxi/gunzi6/share.jpg'}
              wx.onMenuShareTimeline(shareinfo);
         wx.onMenuShareAppMessage(shareinfo);
          });
    </script>