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
    <title>WEHUB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="./swiper.min.css">
    <link rel="stylesheet" href="./index.css">
    <!-- Demo styles -->

</head>
<body>
    <header><img src="img/top.jpg" alt=""></header>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="img/l1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="img/l2.jpg" alt=""></div>
            <div class="swiper-slide"><img src="img/l3.jpg" alt=""></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Pagination -->
        <!-- <div class="swiper-button-next"></div> -->
        <!-- <div class="swiper-button-prev"></div> -->
    </div>
    <!-- 商品板块 -->
    <div class="goods gx">
        <a href="desc.php?title=WEHUB-功能特点&img=1"><img src="img/d1.jpg" alt=""></a>
        <a href="desc.php?title=WEHUB-基础版&img=2"><img src="img/d2.jpg" alt=""></a>
    </div>
    <div class="goods">
        <a href="desc.php?title=WEHUB-专业版&img=3"><img src="img/d3.jpg" alt=""></a>
    </div>
    <div class="goods">
        <a href="desc.php?title=WEHUB-产品分类&img=4"><img src="img/d4.jpg" alt=""></a>
    </div>
    <div class="goods">
        <a href="desc.php?title=WEHUB-应用场景&img=5"><img src="img/d5.jpg" alt=""></a>
    </div>
    

    <!-- 客服热线 -->
    <footer>
        <div class="line">
            <p>客服热线</p>
            <h3>400-88888888</h3>
            <a href="tel:40088888888">联系在线客服</a>
        </div>
        
        <div class="copyright">
            <p>Copyright@2017 苏州信玉堂营销策划有限公司</p>
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
         title: 'WEHUB',
          desc: 'WEHUB',
          link: 'http://xytang88.com/yin/wls/jinfu',
          imgUrl: 'http://xytang88.com/yin/wls/jinfu/share.jpg'}
          wx.onMenuShareTimeline(shareinfo);
     wx.onMenuShareAppMessage(shareinfo);
      });
</script>