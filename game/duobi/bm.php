<?php
    //载入jssdk类
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="telephone=no" name="format-detection"/>
    <meta content="email=no" name="format-detection"/>
    <title>提交信息</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <style type="text/css">
        .wrong_text {
            z-index: 99999;
            width: 70%;
            margin: 0 15%;
            background: white;
            padding: 15px 10px;
            text-align: center;
            font-size: 15px;
            line-height: 20px;
            color: #fff;
            border-radius: 5px;
            position: fixed;
            top: 43%;
            left: 0;
        }
    </style>
    <script src="./js/jquery-1.8.3.min.js"></script>
</head>
<body style="background:white;">

<div class="wrong_text" id="inform" style="display: none">
	<h3 id="inform_text"></h3>
</div>
<div class="loginbg" style="display: block">
    <div class="login_top">
        <img src="./images/pic_game.png" class="wid90">
    </div>
    <form action="add.php">
    <div class="login_inp">
        <div class="login_tel">
            <input type="text" placeholder="请输入姓名" name="name">
            <input type="tel" placeholder="请输入手机号" id="telephone" name="tel">
        </div>
        <a class="login_game" onclick="submit_after_bind()">提交成绩</a>
        <!-- <input class="login_game" onclick="submit_after_bind()" type="button" value="提交成绩"> -->
    </div>
    </form>
    <div class="login_text">
        <img src="./images/icon.jpg">
        <p>请输入真实信息哦, 因为您可能会获得实物奖品，发放实物奖品可能需要联系您进行核对哦。</p>
    </div>
</div>
</body>
</html>
<script>
    function submit_after_bind(){
                $.ajax({
                url:'add.php',
                data:$('form').serialize(),
                type:'POST',
                success:function(m){
                    if(m==99){
                        alert("活动已结束");
                    }
                    if(m=='name'){
                        alert("请填写正确的姓名！");
                    }
                    if(m=='ok'){
                        alert("提交成功！");
                        $("input[name='name']").val('');
                        $("input[name='tel']").val('');
                        window.location.href='index.php';
                    }                   
                    if(m=='tel'){
                        alert("手机号格式不正确！");
                    }
                    if(m=='shua'){
                        alert("恭喜你刷新成绩！");
                        window.location.href='index.php';
                    }                   
                    if(m=='nuli'){
                        alert("请继续努力刷新成绩！");
                        window.location.href='index.php';
                    }
                    if(m==-1){
                        alert("请完善信息！");
                    }
                    if(m==-2){
                        alert("插入数据库失败！");
                    }
                }
                });
            };
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
              // 所有要调用的 API 都要加到这个列表中
            ]
          });
         wx.ready(function () {
        var shareinfo={
             title: '疯狂上班族',
              desc: '我在早高峰里坚持了'+max_score+'秒，快来挑战我吧',
              link: 'http://szxytang.com/yin/youxi/duobi/',
              imgUrl: 'http://szxytang.com/yin/youxi/duobi/share.jpg'
          }
          // wx.hideOptionMenu();
      wx.onMenuShareTimeline(shareinfo);
     wx.onMenuShareAppMessage(shareinfo);
          });
    </script>
<!--结束-->