<?php
    //载入jssdk类
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>太湖上景花园·全系别墅</title>
<link rel="stylesheet" type="text/css" href="style/page.css"/>
<script type="text/javascript" src="script/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="script/js.js"></script>
<script type="text/javascript" src="script/main2.js"></script>
</head>
<body bgcolor=#fff>

<div class="warp">


<a href="javascript:;" class="dh">
    	<img src="images/dhico.png" />
       
    </a>

</div>
	
    <div class="txt wtxt">
  
  
	 <img src="images/4_01.jpg" width="100%" />
     <img src="images/4_02.jpg" width="100%" />
     <img src="images/4_03.jpg" width="100%" />
     <img src="images/4_04.jpg" width="100%" />
	
	  
    </div>












<!-- 首页导航 -->
<div class="dhm">
    <div class="dhbox">
        <a href="javascript:;" class="dhgb"><img src="images/gb.png" /></a>
        <ul>
            <li>
                <a href="dstj1.php">
                    <div class="dhl"><img src="images/1111.png" /></div>
                    <div class="dhr">
                        <p class="dht"><span>太湖风华</span>  </p>
                      
                        <p class="yw">Taihu Fenghua</p>
                    </div>
                </a>
            </li>
            <li style=" margin-left:20%;">
                <a href="dstj2.php">
                    <div class="dhl"><img src="images/1111.png" /></div>
                    <div class="dhr">
                        <p class="dht"><span>国际配套</span>  </p>
               
                        <p class="yw">International support</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="dstj3.php">
                    <div class="dhl"><img src="images/1111.png" /></div>
                    <div class="dhr">
                        <p class="dht"><span>浓荫墅区</span> </p>
                      
                        <p class="yw">Shaded villa area</p>
                    </div>
                </a>
            </li>
            <li style=" margin-left:20%;">
                <a href="dstj4.php">
                    <div class="dhl"><img src="images/1111.png" /></div>
                    <div class="dhr">
                        <p class="dht"><span>全系别墅</span> </p>
      
                        <p class="yw">Whole family villa</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="dstj5.php">
                    <div class="dhl"><img src="images/1111.png" /></div>
                    <div class="dhr">
                        <p class="dht"><span>豪宅专家</span> </p>
                       
                        <p class="yw">Luxury expert</p>
                    </div>
                </a>
            </li>
            <li style=" margin-left:20%;">
                <a href="http://3gimg.qq.com/lightmap/v1/wxmarker/index.html?marker=coord:31.221352936700395,120.43088972568512;title:%E5%A4%AA%E6%B9%96%E4%B8%8A%E6%99%AF%E8%8A%B1%E5%9B%AD;addr:%E4%B8%AD%E5%9B%BD%E6%B1%9F%E8%8B%8F%E7%9C%81%E8%8B%8F%E5%B7%9E%E5%B8%82%E5%90%B4%E4%B8%AD%E5%8C%BA%E8%83%A5%E5%8F%A3%E9%95%87%E6%A2%85%E8%88%8D%E6%9D%91&referer=wexinmp_profile&from=singlemessage&isappinstalled=0">
                    <div class="dhl"><img src="images/1111.png" /></div>
                    <div class="dhr">
                        <p class="dht"><span>一键导航</span> </p>
                        
                        <p class="yw">Navigation</p>
                    </div>
                </a>
            </li>
           
            <!--<li><a href="hygl.html#piao.qq.com"><img src="images/dh1.png" /></a></li>
            <li style=" margin-left:23%;"><a href="tgkw.html#piao.qq.com"><img src="images/dh2.png" /></a></li>
            <li><a href="yzdh.html#piao.qq.com"><img src="images/dh3.png" /></a></li>
            <li style=" margin-left:23%;"><a href="gfzr.html#piao.qq.com"><img src="images/dh4.png" /></a></li>
            <li><a href="yzly.html#piao.qq.com"><img src="images/dh5.png" /></a></li>
            <li style=" margin-left:23%;"><a href="zsyp.html#piao.qq.com"><img src="images/dh6.png" /></a></li>
            <li><a href="lzfx.html#piao.qq.com"><img src="images/dh7.png" /></a></li>-->
       </ul>
    </div>
    <div class="zlian"><img src="images/dhbg_02.png" /></div>
</div>
<!--首页导航结束-->


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
                title: '太湖上景花园·微楼书', // 分享标题
                link: 'http://szxytang.com/yin/wls/hljz', // 分享链接
                imgUrl: 'http://szxytang.com/yin/wls/hljz/share.jpg', // 分享图标
                success: function () { 
                    // 用户确认分享后执行的回调函数
                    //window.location.href = 'http://www.baidu.com';
                },
                cancel: function () { 
                    // 用户取消分享后执行的回调函数
                }
            });
            
            wx.onMenuShareAppMessage({
              title:  '太湖上景花园·微楼书',
              desc:   '',
              link:   'http://szxytang.com/yin/wls/hljz',
              imgUrl: 'http://szxytang.com/yin/wls/hljz/share.jpg',
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