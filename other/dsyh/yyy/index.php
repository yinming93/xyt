<?php
  //载入jssdk类
  require_once "jssdk.php";
  $jssdk = new JSSDK( APPID, APPSECRET );
  $signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>幸运开年，属于你的幸运签</title>
<style>
    body{
    margin: 0px;
    padding: 0px;
    font-family: "微软雅黑";
    overflow: hidden;
    background-color: black;
    }
    .box{
        width: 100%;
        height: 100%;
        margin: 0px;
        padding: 0px;
        position: absolute;
        background-color: #FFFFED;
        top:0px;
        left:0px;
    }
    #tu{
    width: 100%;
    height:100%;
    display: block;
    z-index: -2;
}
</style>
</head>
<body onload="init()">
    <div class="box">
    <img id="tu" src="images/shake.jpg">
    <img src="y.gif" alt="" style="width:40%;position:absolute;left:30%;top:55%;">
       <img class="qian" src="" alt="" style="position:absolute;left:0%;top:0%;width:100%;height:100%;z-index:109"/>
       <img onclick="xs()" id="fx" src="fx.png" alt="" style="position:absolute;left:0%;top:0%;width:100%;height:100%;z-index:111;display:none;"/>
       <div id="hei" style="width:100%;height:100%;background:black;opacity:0.6;position:absolute;left:0%;top:0%;z-index:110;display:none;"></div>
       <div id="one" style="width:42%;height:50px;background:yellow;position:absolute;left:0%;top:87%;z-index:120;display:none;opacity:0;" onclick="fx();">分享</div> 
       <a href="./index.php"><div id="two" style="width:42%;height:50px;background:yellow;position:absolute;right:0%;top:87%;z-index:120;display:none;opacity:0;">再摇一次</div></a>
    </div>
</body>
<audio id='audio' src="http://szxytang.com/liu/yinyue/www.mp3"></audio>
</html>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="http://2015image.bj.bcebos.com/js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script>
    function fx(){
          document.getElementById('fx').style.display='block';
          document.getElementById('hei').style.display='block';
    }
    function xs(){
        document.getElementById('fx').style.display='none';
        document.getElementById('hei').style.display='none';
    }
</script>
<!-- 摇一摇js -->
<script type="text/javascript">
        var SHAKE_THRESHOLD = 3000;
        var last_update = 0;
        var x = y = z = last_x = last_y = last_z = 0;
        function init() {
            if (window.DeviceMotionEvent) {
                window.addEventListener('devicemotion', deviceMotionHandler, false);
            } else {
                alert('not support mobile event');
            }
        }
        function deviceMotionHandler(eventData) {
            var acceleration = eventData.accelerationIncludingGravity;
            var curTime = new Date().getTime();
            if ((curTime - last_update) > 100) {
                var diffTime = curTime - last_update;
                last_update = curTime;
                x = acceleration.x;
                y = acceleration.y;
                z = acceleration.z;
                var speed = Math.abs(x + y + z - last_x - last_y - last_z) / diffTime * 10000;

                if (speed > SHAKE_THRESHOLD) {              
        document.getElementById('audio').play();
        // 随机选择一张图
        var images=['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg'];
        var ci=['美貌如花','鸡年大吉','光吃不胖','极速转运','当上CEO','桃花朵朵'];
        rd=Math.round(Math.random()*5);
        // alert(images[rd]);
          $(".qian").attr("src","http://szxytang.com/yin/yyy/dsyh/yyy/images/"+images[rd]);
          document.getElementById('one').style.display='block';
          document.getElementById('two').style.display='block';
          SHAKE_THRESHOLD = 30000;
        wx.config({
            // 配置信息, 即使不正确也能使用 wx.ready
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
        wx.ready(function() {
            document.getElementById('audio').play();
            var shareinfo={
             title: '我抽到「'+ci[rd]+'」，幸运开年，来抽属于你的幸运签',
              desc: '金鸡贺岁，中梁·独墅御湖祝您新春快乐，阖家幸福！',
              link: 'http://szxytang.com/yin/yyy/dsyh',
              imgUrl: 'http://szxytang.com/yin/yyy/dsyh/share.jpg'
          }
     wx.onMenuShareTimeline(shareinfo);
     wx.onMenuShareAppMessage(shareinfo);
        });
            }
                last_x = x;
                last_y = y;
                last_z = z;
            }
        }
    </script>
<!--开始-->
<script type="text/javascript">
// wx.config({
//             debug: false,
//             appId: '<?php echo $signPackage["appId"];?>',
//             timestamp: '<?php echo $signPackage["timestamp"];?>',
//             nonceStr: '<?php echo $signPackage["nonceStr"];?>',
//             signature: '<?php echo $signPackage["signature"];?>',
//             jsApiList: [
//         "onMenuShareTimeline","onMenuShareAppMessage"
//               // 所有要调用的 API 都要加到这个列表中
//             ]
//           });
//          wx.ready(function () {
//         var shareinfo={
//              title: '幸运开年，来抽属于你的幸运签',
//               desc: '金鸡贺岁，中梁·独墅御湖祝您新春快乐，阖家幸福！',
//              link: 'http://szxytang.com/yin/yyy/dsyh',
//               imgUrl: 'http://szxytang.com/yin/yyy/dsyh/share.jpg'
//           }
//       wx.onMenuShareTimeline(shareinfo);
//      wx.onMenuShareAppMessage(shareinfo);
//           });
    </script>
<!--结束-->