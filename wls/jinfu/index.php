<?php
    //载入jssdk类
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>WEHUB一体机微官网</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="./swiper.min.css">
    <link rel="stylesheet" href="./index.css">
    <!-- Demo styles -->

</head>
<body>
    <header><a href="index.php"><img src="img/top.jpg" alt=""></a></header>
    
    <!-- 商品板块 -->
    <div class="main">
        <a href="#"><img src="img/index/1.jpg" alt=""></a>
 
        <a href="pdesc.php?title=WEHUB场景应用&img=5"><img src="img/index/2.jpg" alt=""></a>

        <a href="projects.php"><img src="img/index/3.jpg" alt=""></a>

        <a href="#"><img src="img/index/4.jpg" alt=""></a>
    </div>
    

    <!-- 客服热线 -->
    <footer>
        <div class="line">
            <p>客服热线</p>
            <h3>0512-62820000</h3>
            <a href="tel:051262820000">联系在线客服</a>
        </div>
        
        <div class="copyright">
            <p>Copyright@2017 锦富技术</p>
        </div>
    </footer>
    <!-- Swiper JS -->
    <script src="./swiper.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        autoHeight: true, //enable auto height
        autoplay:3000,
        autoplayDisableOnInteraction : false
    });
    </script>
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
         title: 'WEHUB一体机微官网',
          desc: '改变传统会议模式 一切都是为了更高效的会议',
          link: 'http://xytang88.com/yin/wls/jinfu',
          imgUrl: 'http://xytang88.com/yin/wls/jinfu/share1.jpg'}
          wx.onMenuShareTimeline(shareinfo);
     wx.onMenuShareAppMessage(shareinfo);
      });
</script>