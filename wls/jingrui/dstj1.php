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
<title>翡翠湾·企业品牌</title>
<link rel="stylesheet" type="text/css" href="style/page.css"/>
<script type="text/javascript" src="script/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="script/js.js"></script>
<script type="text/javascript" src="script/main2.js"></script>
</head>
<body bgcolor=#fff>
<audio id='audio' src="sr.mp3" loop autoplay="autoplay"></audio>
<div class="warp">


<a href="javascript:;" class="dh">
    	<img src="images/dhico.png" />
       
    </a>


<!-- <a href="index.html"><img src="images/main.jpg" /></a> -->

</div>
<div class="box mb2">
	
    <div class="txt wtxt">
  
  
	   <p><img src="images/1/10.png" width="100%" /></p>
	
	   <p><img src="images/1/13.png" width="100%" /></p>
	   
	    	
		
          
    </div>
</div>
<div class="lb"></div>










<!-- 首页导航 -->
<div class="dhm">
    <div class="dhbox">
        <a href="javascript:;" class="dhgb"><img src="images/gb.png" /></a>
        <ul>
            <li>
                <a href="dstj1.php">
                    <div class="dhl"><img src="images/1111.png" /></div>
                    <div class="dhr">
                        <p class="dht"><span>企业品牌</span>  </p>
                      
                        <p class="yw">Enterprise brand</p>
                    </div>
                </a>
            </li>
            <li style=" margin-left:20%;">
                <a href="dstj2.php">
                    <div class="dhl"><img src="images/1111.png" /></div>
                    <div class="dhr">
                        <p class="dht"><span>项目介绍</span>  </p>
               
                        <p class="yw">Project introduction</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="http://xyt.xy-tang.com/360/many360/">
                    <div class="dhl"><img src="images/1111.png" /></div>
                    <div class="dhr">
                        <p class="dht"><span>全景看房</span> </p>
                      
                        <p class="yw">Panoramic view</p>
                    </div>
                </a>
            </li>
            <li style=" margin-left:20%;">
                <a href="dstj4.php">
                    <div class="dhl"><img src="images/1111.png" /></div>
                    <div class="dhr">
                        <p class="dht"><span>热销户型</span> </p>
      
                        <p class="yw">Hot house</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="dstj5.php">
                    <div class="dhl"><img src="images/1111.png" /></div>
                    <div class="dhr">
                        <p class="dht"><span>五星物业</span> </p>
                       
                        <p class="yw">The five-star property</p>
                    </div>
                </a>
            </li>
            <li style=" margin-left:20%;">
                <a href="http://map.qq.com/m/place/info/pointx=121.075320&pointy=31.440320&level=14&word=%E7%BF%A1%E7%BF%A0%E6%B9%BE&addr=%E6%B1%9F%E8%8B%8F%E7%9C%81%E8%8B%8F%E5%B7%9E%E5%B8%82%E5%A4%AA%E4%BB%93%E5%B8%82%E4%B8%9C%E5%8F%A4%E8%B7%AF1%E5%8F%B7?ref=weixinmp_profile&ch=wap-map1.0">
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
                title: '景瑞·翡翠湾微楼书', // 分享标题
                link: 'http://szxytang.com/yin/wls/jingrui/', // 分享链接
                imgUrl: 'http://szxytang.com/yin/wls/jingrui/share.jpg', // 分享图标
                success: function () { 
                    // 用户确认分享后执行的回调函数
                    //window.location.href = 'http://www.baidu.com';
                },
                cancel: function () { 
                    // 用户取消分享后执行的回调函数
                }
            });
            
            wx.onMenuShareAppMessage({
              title:  '景瑞·翡翠湾微楼书',
              desc:   ' ',
              link:   'http://szxytang.com/yin/wls/jingrui/',
              imgUrl: 'http://szxytang.com/yin/wls/jingrui/share.jpg',
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