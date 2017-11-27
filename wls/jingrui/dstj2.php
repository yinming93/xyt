<?php
    //载入jssdk类
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
    
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>翡翠湾·项目介绍</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="static/css/mobi.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
    <script src="static/js/jquery-1.8.2.min.js"></script>
    <script src="static/js/wScratchPad.js"></script>
	<meta http-equiv="Cache-Control" content="max-age=0" />
	<meta name="apple-touch-fullscreen" content="yes" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<link rel="stylesheet" type="text/css" href="style/page.css"/>
<script type="text/javascript" src="script/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="script/js.js"></script>
<script type="text/javascript" src="script/main2.js"></script>
</head>

<style>
.run-input-share {
position: absolute;
display: block;
left: 10%;
top: 10%;
margin-top: 102px;
margin-left: 3px;
text-indent: -9999px;
width: 300px;
height: 200px;
}
#scratchpad{
position:absolute;
top:0;
z-index:99999;	
}
.ca{
	width:40%;
	height:10px;
	left:30%;
	position:absolute;
	top:60%;
	z-index:1000000;
	}
	
	
	
	
	.formdiv{
			display: blcok;
			width: 80%;
			position: absolute;
			top: 30%;
			left:11%;
			z-index: 2000;
		}	
		
		input.labelauty + label { font: 12px "Microsoft Yahei";}
		
		
		.inputa{ 
			border:2px solid #919191; 
			height:25px; 
			line-height:20px;  
			width:66%; 
			background:#fff;
			-moz-border-radius: 0.2em; 
			-webkit-border-radius:0.2em;  
			border-radius:0.8em;
			padding:1%;color:#000; 			
		}
			
			
		.btn{
			width:45%; 
			border:2px solid #919191; 
			height:30px; 
			line-height:25px;
			background:#fff; 
			-moz-border-radius: 0.2em; 
			-webkit-border-radius:0.2em;  
			border-radius:0.5em; 
			color:#666666; 
			font-size:16px; 
		}
		
		
		.name{ width:100%; margin:0 auto; padding:2% 0; text-align:left; font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#F8EFC9;}
		.tel{ width:100%; margin:0 auto; padding:2% 0; text-align:left; font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#F8EFC9;}
		.add{ width:100%; margin:0 auto; padding:2% 0; text-align:left; font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#F8EFC9;}
		.ck{ width:100%; margin:0 auto; padding:2% 0; text-align:left; font-size:15px;font-family:'Microsoft Yahei',Arial, Helvetica, sans-serif; color:#F8EFC9;}
		.btnboxb{width:100%;text-align:center;padding:13% 0;}


.main1{
			margin:0 auto;
			width:240px;
			height:200px;
			/* border:1px solid red; */
			text-align:center;
			/* color:white; */
			font-size:16px;
			
			z-index: 999;
			position:absolute;
			top:65%;
			left:10%;
			
		
			/* background-color: grey; */
		}
		
		.tj{
			
			width: 100px;
			height: 30px;
			border: 0; 
			/*
			border-radius: 5px;
			*/
			margin-left: 20%;
			background:url(img/tj.jpg) no-repeat 50%;
		}
		
		.dk{
			/* width: 80px;
			height: 40px; */
			/* border: 1px solid red; */
			border-radius: 5px;
			/* background: grey; */
			margin-top: 5px;
		}
		input{
			width: 30px;
			height: 20px; 
			border: 1px solid grey;
		}

p input{
			width: 150px;
			height: 30px; 
			border: 1px solid grey;
			margin-top: -10px;
		}

</style>



<script>
	
		$(function(){
			
				//音乐
			$('.audio').click(function(){
				var play= document.getElementById('audio');
				if(play.paused == true){
					play.play();
					$(".audio>img").attr("src","img/play.png").addClass('fz');
				}else{
					play.pause();
					$(".audio>img").attr("src","img/pause.png").removeClass('fz');
				}
					
			});
		

		
		//图片预加载
		function loadImages(sources, callback){
			var count = 0,
				images ={},
				imgNum = 0;
			for(src in sources){
				imgNum++;
			}
			
			for(src in sources){
				images[src] = new Image();
				images[src].onload = function(){
					if(++count >= imgNum){
						callback(images);
					}
				}
				images[src].src = sources[src];
			}
		}



		loadImages(['static/img/1.jpg',
					'static/img/2.jpg',
					'static/img/3.jpg',
					'static/img/4.jpg',
					'static/img/5.jpg',
					'static/img/6.jpg',
					],function(){
		      $('.spinner').remove();
		      $('.p-index').show();
		      //alert(11111);
		});
	 

	});
	
	
</script>




<body>
<audio id='audio' src="sr.mp3" loop autoplay="autoplay"></audio>
<div style="z-index:99;"class="warp">
<a href="javascript:;"class="dh">
    	<img src="images/dhico.png" />      
</a>
</div>

<div style="z-index:99;"class="lb"></div>


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
	<!-- 开始加载画面 -->
	<div class="spinner">
		  <div class="rect1"></div>
		  <div class="rect2"></div>
		  <div class="rect3"></div>
		  <div class="rect4"></div>
		  <div class="rect5"></div>
	</div>

	<section class="p-index" style="display:none;">
		
		<a href="http://szxytang.com/2015n/hejunObj/xyt/?from=groupmessage&isappinstalled=0" style="position: absolute; top:97%; left:38%;  z-index:2000; color:black;">信玉堂技术支持</a>
		
		<!-- 1 -->
		<section class="m-page m-page1">
		
			<div class="m-img m-img01" style="background:url(static/img/1.jpg) center no-repeat;background-size:100% 100%">
				<a href="javascript:;" class="help-up" style="position:absolute;left:50%;bottom:2%;"></a>
			</div>
		</section>
		
		<!-- 2 -->
		<section class="m-page m-page1">
			<div class="m-img m-img01" style="background:url(static/img/2.jpg) center no-repeat;background-size:100% 100%">
				<a href="javascript:;" class="help-up"></a>
			</div>
		</section>
		
		<!-- 3 -->
		<section class="m-page m-page1">
			<div class="m-img m-img01" style="background:url(static/img/3.jpg) center no-repeat;background-size:100% 100%">
				<a href="javascript:;" class="help-up"></a>
			</div>
		
		</section>
		
		<!-- 4 -->
		<section class="m-page m-page1">
			<div class="m-img m-img01" style="background:url(static/img/4.jpg) center no-repeat;background-size:100% 100%">
				<a href="javascript:;" class="help-up"></a>
			</div>
		
		</section>
			
		<!-- 5 -->
		<section class="m-page m-page1">
			<div class="m-img m-img01" style="background:url(static/img/5.jpg) center no-repeat;background-size:100% 100%">
				<a href="javascript:;" class="help-up"></a>
			</div>
			
		</section>

		<!-- 6 -->
		<section class="m-page m-page1">
			<div class="m-img m-img01" style="background:url(static/img/6.jpg) center no-repeat;background-size:100% 100%">
				<a href="javascript:;" class="help-up"></a>
			</div>
			
		</section>

		

		<!-- <div class="audio">
			<img  class='fz' src="./img/play.png" width='100%' alt="">
			<audio id='audio' src="./img/sr.mp3" loop autoplay="autoplay"></audio>
		</div> -->
	
	</section>
	
	
	<style>
		.audio{
			width: 30px;
			height: 30px;
			background: url(img/adbg.png);
			background-size: 100% 100%;

			position: absolute;
			top: 20px;
			right: 20px;
			z-index: 1000;
		}
		.fz{
		-webkit-animation:pulse 1s .2s infinite alternate;
		-moz-animation:pulse 1s .2s infinite alternate;}
		@-webkit-keyframes pulse{
		0%{-webkit-transform:scale(0.5)}
		100%{-webkit-transform:scale(1)}
		}
		@-moz-keyframes pulse{
		0%{-moz-transform:scale(0.5)}
		100%{-moz-transform:scale(1)}
		}
		.help-up{
		-webkit-animation:fadeOutUp 1.5s .2s infinite;
		-moz-animation:fadeOutUp 1.5s .2s infinite;}
		@-webkit-keyframes fadeOutUp{
		0%{opacity:1;
		-webkit-transform:translateY(0)}
		100%{opacity:0;
		-webkit-transform:translateY(-20px)}
		}
		@-moz-keyframes fadeOutUp{
		0%{opacity:1;
		-moz-transform:translateY(0)}
		100%{opacity:0;
		-moz-transform:translateY(-20px)}
		}
	</style>
	<!-- 引入脚本 -->
	<script src="static/js/jquery.easing.1.3.js"></script>
	<script src="static/js/99_main.js"></script>
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