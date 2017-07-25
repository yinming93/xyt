<?php
	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="author" content="ranran">
<meta name="description" content="520">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title>七夕丨中南雅苑送你史上最牛表白神器</title>
<base href="http://xyt.xy-tang.com/yin/youxi/zhuangb2/">
<script>
var _czc = _czc || [];
_czc.push(["_setAccount", "1259134483"]);
</script>
<script type="text/javascript">
    var winW=document.documentElement.clientWidth;
    document.documentElement.style.fontSize=(winW/750)*100+"px";
</script>
<style>
/*css*/
html,body,ul,li,p,img,input,strong,a{margin: 0;padding: 0;-webkit-tap-highlight-color:rgba(0,0,0,0);}
ul,li{list-style: none;}
input{-webkit-appearance: none;border: none;background: transparent;outline: none;vertical-align: middle;font-size: 0.35rem;color: #fff;width: 3.88rem;height: .8rem;}
img{display: block;width: 100%;}
.auto-x{position: absolute;left: 0;right: 0;margin: 0 auto;}
section,.page3>div{position: absolute;top: 0;left: 0;overflow: hidden;width: 100%;height: 100%;background-size: 100% 100%;background-repeat:no-repeat; z-index: 0;visibility: hidden;}
.active{z-index: 100!important;visibility:visible!important;}
html{width: 100%;height: 100%;overflow: hidden;}
body{width: 100%;height: 100%;background: #f69bb3;}
/*===page1===*/
.page1 .bg1{height: 100%;top: 0;}
.page1 .elem1{width: 3.2rem;height: 2.6rem;top: 4rem;}
.heart{width: 100%;bottom: 0;left: .02rem;height: 0;-webkit-animation:fadeIn 1s both;}
.heart img{margin-top: -.18rem;}
.page1 .load{font-size: 0.36rem;color:white;width:1.76rem;height: 0.46rem;top: 7.38rem;z-index: 10;}
/*===page2===*/
.page2{background-image:url("image/page2_bg.jpg");}
.page2 .elem1{width: 6.7rem;margin:1rem auto .8rem;}
.page2 .elem2{font-size: 0;text-align: center;}
.page2 .elem2 li{display: inline-block;margin:0 .3rem 0.28rem;opacity: 0;}
.page2 .elem2 img{width: 1.64rem;border-radius: 0.82rem;}
.page2 .elem2 p{font-size: 0.28rem;color: #fff;padding-top: 0.22rem;}
.active .elem1{-webkit-animation:fadeIn 1s .2s both;}
@-webkit-keyframes fadeIn{
  0%{opacity: 0}
  100%{opacity: 1}
}
.active .elem2 li{-webkit-animation:fadeIn2 2s .5s both;}
@-webkit-keyframes fadeIn2{
  0%{opacity: 0;-webkit-transform:translateY(-20px);}
  100%{opacity: 1}
}
.active .elem2 li:nth-child(2){-webkit-animation-delay:.8s;}
.active .elem2 li:nth-child(3){-webkit-animation-delay:1.1s;}
.active .elem2 li:nth-child(4){-webkit-animation-delay:1.4s;}
.active .elem2 li:nth-child(5){-webkit-animation-delay:1.7s;}
.active .elem2 li:nth-child(6){-webkit-animation-delay:2s;}
.active .elem2 li img{-webkit-animation:shake 1s 3s both;}
@-webkit-keyframes shake {
  from,to{
    -webkit-transform: translate3d(0, 0, 0);
  }
  10%, 30%, 50%, 70%{
    -webkit-transform: translate3d(-3px, 0, 0);
  }
  20%, 40%, 60%, 80%,90%{
    -webkit-transform: translate3d(3px, 0, 0);
  }
}
/*===page3===*/
.page3{background-image: url("image/page4_bg.jpg");}
.page3 .elem1{width: 7.5rem;margin: 1rem auto .6rem;}
.info{border: 0.04rem solid #fff;width: 5.48rem;height: 1.60rem;margin: 0 auto;border-radius: 0.18rem;}
.info li{height: .8rem;line-height: .8rem;font-size: 0.36rem;color: #fff;position: relative;}
.info input{height: 100%;line-height: .8rem;}
::-webkit-input-placeholder{color: #fff;}
.info li:first-child{border-bottom: 1px solid #fff;}
.info strong{padding: 0 .36rem 0 .44rem;height: .8rem;display: inline-block;vertical-align: middle;}
.btn{display:block;width:4.1rem;height: 1.02rem;margin: 9.6rem auto 0;background: url("image/btn.png") no-repeat;background-size: 100% auto;/*bottom: 0.8rem;position:fixed;left: 0;right: 0*/position: relative;}
.active .btn{z-index: 200;}
.return{width: 1.46rem;height: .62rem;line-height: .62rem;font-size: .36rem;color: #fff;border: 2px solid #fff;border-radius: .1rem;position: absolute;top:.46rem;left: .52rem;text-decoration: none;text-align: center;z-index: 200;}
.page3 .active .info{-webkit-animation:fadeIn2 1s both;}
.card{position: relative;width: 6.06rem;height:6.66rem;margin: .5rem auto 0;text-align: center;}
.card img{position:absolute;left: 0;top: 0;width: 6.06rem;height: 6.66rem}
.card p{position: absolute;}
/*scene1*/
.info .subway{width: .5rem;line-height: .7rem;text-align: center;}
.card1 p{color: #ffdd04;font-size: .26rem;}
#namemsg1{left: 2.38rem;top: 1.26rem;width: 1.84rem;} 
#num1{left: 2.38rem;top: 0.92rem;width: 1.84rem;}
.card1 .month{left: 2.76rem;top: .53rem;width: .3rem}
.card1 .day{left: 3.3rem;top: .53rem;width: .3rem}
/*scene2*/
.scene2 .elem1{margin-top: 1rem}
.scene2 .info input{width: 3.7rem;}
.mlist{position: absolute;width: 2.62rem;background: rgba(255,255,255,.3);border-radius: .1rem;border:1px solid #fff;top: .1rem;left: 1.7rem;display: none;}
.mlist::after{content: "";width: 0;height: 0;position: absolute;top:.14rem;right:.1rem;border:.18rem solid transparent;border-top: .26rem solid #fff;}
.mlist span{display: block;width: 100%;height: .62rem;line-height: .62rem;padding-left: .12rem;margin-bottom: .02rem;font-size: .36rem;box-sizing:border-box;-webkit-box-sizing:border-box;}
.mlist .selnum{background: rgba(0,0,0,.6);}
.namemsg2{left: 1.65rem;top: 5.2rem;color: #fff;font-size: .28rem;width: auto;max-width:4.2rem} 
.num2{left: 4.1rem;top:1.55rem;color: #000;font-size: .26rem;width: auto;max-width:1.8rem} 
/*scene3*/
.scene3 .info input{width: 2.86rem;}
.card3 p{top:2.08rem;font-size: .2rem;color: #221815;width:1.3rem}
.card3 .namemsg3{left:2.38rem;}
.card3 .num3{left:3.92rem;}
.lspace{letter-spacing: 8px}
/*scene4*/
.scene4 .info{width: 6.54rem;}
.scene4 .info strong{padding: 0 .26rem 0 .2rem;}
.scene4 .info input{width: 5rem;line-height: .84rem;}
.scene4 .info input::-webkit-input-placeholder{font-size: .3rem;line-height: .84rem;}
.card4{font-size: .16rem;color: #000;}
.namemsg4{top:3.48rem;left:2.5rem;width: 1rem;font-size: .18rem;}
.namemsg4-2{top: 2.7rem;left: 1.96rem;width:.8rem;font-size: .18rem;}
.num4{top: 2.46rem; left: 3.44rem;width: 1.2rem;}
.card4 .day{top:3.5rem;left:1.86rem;width:.3rem;}
.card4 .month{width:.3rem;top: 3.5rem;left: 1.55rem}
/*scene5*/
.card5 p{top: 3rem;width: .9rem;color: #2d2c2c;font-size: .2rem;}
.namemsg5{left: 0.85rem;}
.num5{left: 4.3rem;}
/*scene6*/
.card6 p{color: #000;font-size: .18rem}
.namemsg6{left: 1.5rem;top: 3rem;width: 1rem;font-size: .3rem;}
.num6{left:3.9rem;top:4.9rem;font-size: .24rem;width: auto;max-width:1.8rem}
.card6 .year{left:3.1rem;top:5.28rem;width:1rem;}
.card6 .month{width:.3rem;top:5.28rem;left:3.96rem;width:.4rem;}
.card6 .day{top:5.28rem;left:4.34rem;width:.4rem;}
/*===page4===*/
.page4{background-image:url("image/page4_bg.jpg");}
.page4 .card{display: none;}
#result{z-index: 1000;}
.savepic{font-size: 0.36rem;color: #fff;text-align: center;margin: .4rem auto .4rem;}
.tips{background: url("image/tips.png") no-repeat;background-size: 100% 100%;width: 5.9rem;height: 2.66rem;bottom: 1.06rem;margin: 0 auto;}
.tips p{ font-size: .34rem;color: #fff;padding-left: .64rem;line-height: .48rem;}
.tips p:nth-child(1){padding-top: 1rem;}
canvas{width: 6.06rem;height: 6.66rem;display: none;}
.active #result{-webkit-animation:fadeIn 1s;}
</style>
</head>
<body>
<section class="page1 active">
    <div class="elem1 auto-x">
        <div class="heart auto-x">
            <img src="image/heart2.png">
        </div> 
    </div>
    <p class="load auto-x">Loading<span id="load"></span>%</p>
    <img src="image/page1_bg.png" alt="" class="bg1 auto-x">
</section>
<section class="page2">
        <img src="image/gname.png" class="elem1">
        <ul class="elem2" id="cardlist">
            <li>
                <img src="image/icon1.png">
                <p>承包地铁线</p>
            </li>
            <li>
                <img src="image/icon2.png">
                <p>黑卡</p>
            </li>
            <li>
                <img src="image/icon3.png">
                <p>环游世界</p>
            </li>
            <li>
                <img src="image/icon4.png">
                <p>小行星命名权</p>
            </li>
            <li>
                <img src="image/icon5.png">
                <p>卖身契</p>
            </li>
            <li>
                <img src="image/icon6.png">
                <p>名校毕业证书</p>
            </li>
        </ul>
</section>
<section class="page3">
    <!--场景一-->
    <div class="scene1">
        <img src="image/scene1.png" class="elem1">
        <ul class="info">
            <li>
                <strong>姓名</strong><input type="text" placeholder="请输入你的名字" id="name1">
            </li>
            <li>
                <strong>线路</strong>(<input type="tel" class="subway" id="subway">)号线
            </li>
        </ul>
    </div>
    <!-- 场景二 -->
    <div class="scene2">
        <img src="image/scene2.png" class="elem1">
        <ul class="info">
            <li>
                <strong>姓名</strong><input type="email" placeholder="请输入你的英文名字" id="name2">
            </li>
            <li>
                <strong>额度</strong>
                <input type="text" id="quota" class="quota" placeholder="请选择额度" readonly="readonly" />
                <div id="mlist" class="mlist">
                    <span>1,000,000</span>
                    <span>10,000,000</span>
                    <span>100,000,000</span>
                </div>
            </li>
        </ul>
    </div>
    <!--场景三-->
    <div class="scene3">
        <img src="image/scene3.png" class="elem1">
        <ul class="info">
            <li>
                <strong class="lspace">姓名</strong><input type="text" placeholder="请输入你的名字" id="name3">
            </li>
            <li>
                <strong>同行者</strong><input type="text" placeholder="请输入同行者名字" class="together" id="together">
            </li>
        </ul>
    </div>
    <!--场景四-->
    <div class="scene4">
        <img src="image/scene4.png" class="elem1">
        <ul class="info">
            <li>
                <strong>姓名</strong><input type="text" placeholder="请输入你的名字" id="name4">
            </li>
            <li>
                <strong>编号</strong><input type="text" placeholder="请输入少于9个字符(英文、数字均可)" class="serial" id="serial" maxlength="9" />
            </li>
        </ul>
    </div>
    <!--场景五-->
    <div class="scene5">
        <img src="image/scene5.png" class="elem1">
        <ul class="info">
            <li>
                <strong>甲方</strong><input type="text" placeholder="请输入你的姓名" id="name5">
            </li>
            <li>
                <strong>乙方</strong><input type="text" placeholder="请输入跟班姓名" id="another">
            </li>
        </ul>
    </div>
    <!--场景六-->
    <div class="scene6">
        <img src="image/scene6.png" class="elem1">
        <ul class="info">
            <li>
                <strong>姓名</strong><input type="text" placeholder="请输入你的名字" id="name6">
            </li>
            <li>
                <strong>学校</strong><input type="text" placeholder="请输入学校" id="school">
            </li>
        </ul>
    </div>
    <a href="javascript:;" class="btn"></a>
    <a href="javascript:;" class="return" id="return1">返回</a>
</section>
<section class="page4">
    <canvas id="c1" class="c1"></canvas>
    <div class="card card1" id="card">
        <img src="/yin/youxi/zhuangb/image/card1.png">
        <p class="month"></p>
        <p class="day"></p>
        <p id="num1"></p>
        <p id="namemsg1"></p>
    </div>
    <div class="card card2">
        <img src="/yin/youxi/zhuangb/image/card2.png">
        <p id="namemsg2" class="namemsg2"></p>
        <p id="num2" class="num2"></p>
    </div>
    <div class="card card3">
        <img src="/yin/youxi/zhuangb/image/card3.png">
        <p id="namemsg3" class="namemsg3"></p>
        <p id="num3" class="num3"></p>
     </div>
    <div class="card card4">
        <img src="/yin/youxi/zhuangb/image/card4.png">
        <p id="namemsg4" class="namemsg4"></p>
        <p id="num4" class="num4"></p>
        <p id="namemsg4-2" class="namemsg4-2"></p>
        <p class="month"></p>
        <p class="day"></p>
    </div>
    <div class="card card5">
        <img src="/yin/youxi/zhuangb/image/card5.png">
        <p id="namemsg5" class="namemsg5"></p>
        <p id="num5" class="num5"></p>
     </div>
     <div class="card card6">
        <img src="/yin/youxi/zhuangb/image/card6.png">                  
        <p id="namemsg6" class="namemsg6" data-bold="bold"></p>
        <p id="num6" class="num6" data-bold="bold"></p>  
        <p class="year">2016</p>
        <p class="month"></p>
        <p class="day"></p>
    </div>
    <div class="card" id="docard">
        <img src="" alt="" id="result">
    </div>
    <p class="savepic">保存上图,发朋友圈,装逼满分</p>
    <div class="tips">
        <p>告诉朋友，扫描图中的二维码</p>
        <p id="word"></p>
        <p>关注“苏州澳海胥江湾”</p>
    </div>
</section>
<script src="js/zepto.min.js"></script>
<script src="js/fastclick.js"></script>
<script src="js/style.js"></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    // var shareImgUrl='http://szxytang.com/yin/youxi/zhuangb/share.jpg';    
    // var shareLinkUrl='http://szxytang.com/yin/youxi/zhuangb/';
    // var shareTitle='520就要秀恩爱！';
    // var shareDesc='快来用xyt送礼神器送出你的爱~';
    // //查询接口注入权限验证配置信息
    // var proveUrl = "http://sso.h6app.com/jssdk2/getSignPackage" ;
    // function getConfig(canMethod){
    //     var url = encodeURIComponent(window.location.href);
    //     var sct = document.createElement("script");
    //     sct.setAttribute("id","dataProxy");
    //     sct.src = proveUrl+'?url='+url+'&callback='+canMethod+'';
    //     document.getElementsByTagName("body")[0].appendChild(sct);
    // }
    // function setConfig(result){
    //     wx.config(result.data);
    //     setShareData();
    // }
    // window.setConfig = setConfig ;
    // //设置分享参数
    // function setShareData(){
    //     wx.ready(function(){
    //         wx.onMenuShareAppMessage({
    //             "imgUrl" : shareImgUrl,
    //             "link" : shareLinkUrl,
    //             "desc" : shareDesc,
    //             "title" : shareTitle,
    //             success: function (res) {
    //                 _czc.push(["_trackEvent", "分享", "朋友"]);
    //             },
    //             cancel: function (res) {
                    
    //             },
    //         });

    //         wx.onMenuShareTimeline({
    //             "imgUrl" : shareImgUrl ,
    //             "link" : shareLinkUrl ,
    //             "title" : shareDesc,
    //             success: function () {
    //                 _czc.push(["_trackEvent", "分享", "朋友圈"]);
    //             },
    //             cancel: function () {
    //             }
    //         });
    //     });
    // }
    // getConfig("setConfig");
</script>
<span style="display:none;"><script src="http://s95.cnzz.com/stat.php?id=1259134483&web_id=1259134483" language="JavaScript"></script></span>
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
				title: '七夕丨中南雅苑送你史上最牛表白神器', // 分享标题
				link: 'http://xyt.xy-tang.com/yin/youxi/zhuangb2/', // 分享链接
				imgUrl: 'http://xyt.xy-tang.com/yin/youxi/zhuangb2/share.jpg', // 分享图标
				success: function () { 
					// 用户确认分享后执行的回调函数
					//window.location.href = 'http://www.baidu.com';
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
			  title:  '七夕丨中南雅苑送你史上最牛表白神器',
			  desc:   '七夕到了，最牛的表白方法你get到了吗？',
			  link:   'http://xyt.xy-tang.com/yin/youxi/zhuangb2/',
			  imgUrl: 'http://xyt.xy-tang.com/yin/youxi/zhuangb2/share.jpg',
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
		  // alert(res.errMsg);
		});
	
	</script>
<!--结束-->