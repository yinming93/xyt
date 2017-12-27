<?php
//载入jssdk类
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
$title = $_GET['title'];
$img = $_GET['img'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="./index.css">
    <!-- Demo styles -->

</head>
<body>
    <header><img src="img/top.jpg" alt=""></header>
    
    <!-- 长图板块 -->
    <div class="desc">
        <img src="img/<?php echo $img; ?>.jpg" alt="<?php echo $ff;?>">
    </div>
    

    <!-- 客服热线 -->
    <footer>
        <div class="line">
            <p>客服热线</p>
            <h3>400-88888888</h3>
            <a href="">联系在线客服</a>
        </div>
        
        <div class="copyright">
            <p>Copyright@2017 苏州信玉堂营销策划有限公司</p>
        </div>
    </footer>
</body>
</html>
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
         title: 'WEHUB',
          desc: 'WEHUB',
          link: 'http://xytang88.com/yin/wls/jinfu',
          imgUrl: 'http://xytang88.com/yin/wls/jinfu/share.jpg'}
          wx.onMenuShareTimeline(shareinfo);
     wx.onMenuShareAppMessage(shareinfo);
      });
</script>