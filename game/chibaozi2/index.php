<?php
	 require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
?> 

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>碧桂园翡翠湾之挑战大胃王</title>
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<meta name="format-detection" content="telephone=no"/>
<meta name="format-detection" content="address=no"/>
<meta name="viewport" id="viewport" content="target-densitydpi=device-dpi,width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="author" content="cgi.beijing"/>
<meta name="copyright" content=""/>
<link href="http://ttxd.qq.com/cp/ttxd_cbzwdh_140505/css/cgi.waiting.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="guize">
     <img src="images/share_tip_2.png" width='100%'  height="100%">
</div>
<div id="zimu" style="width:100%;height:50px;z-index:999999;position: absolute;top:0;opacity:0;"><marquee border="0" align="middle" scrolldelay="120">千亿房企 十强品牌</marquee>
<marquee border="0" align="middle" scrolldelay="10">&nbsp;&nbsp;二环以内 鎏金地段</marquee>
<marquee border="0" align="middle" scrolldelay="150">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;拥双公园 享原生态</marquee>
<marquee border="0" align="middle" scrolldelay="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名校林立 医疗无忧</marquee>
<marquee border="0" align="middle" scrolldelay="10">&nbsp;&nbsp;&nbsp;超大面宽 奢适平墅</marquee>
<marquee border="0" align="middle" scrolldelay="120">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;匠心设计 全屋精装</marquee>
<marquee border="0" align="middle" scrolldelay="150">&nbsp;&nbsp;&nbsp;&nbsp;重金打造 五重园林</marquee>
<marquee border="0" align="middle" scrolldelay="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;一级物业 国宾礼遇</marquee>
</div>
<div id="loading">15%</div>
<div id="container"></div>
<input type='hidden' name='score' id='score' value=''>
<script src="js/ping_tcss_ied.js"></script>
<script type="text/javascript">if(typeof(pgvMain)=="function"){pgvMain()};</script>
<script src="js/jquery.js"></script>
<script src="js/jquery.preload.min.js"></script>
<script src="js/resize.js"></script>
<script src="js/page.js"></script>
<script src="base64.js"></script>
<script>
$(function() {
    $("#loading").css("line-height", $(window).innerHeight() + "px");
    $("#loading").css("opacity", 0.6);
    init();
    preloadImg()
});
var items = [];
function init() {
    items.push({
        name: "c1",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c1.jpg"
    });
    items.push({
        name: "c2",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c2.png"
    });
    items.push({
        name: "c3",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c3.png"
    });
    items.push({
        name: "c4",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c4.png"
    });
    items.push({
        name: "c5",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c5.png"
    });
    items.push({
        name: "c6",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c6.png"
    });
    items.push({
        name: "c7",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c7.png"
    });
    items.push({
        name: "c8",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c8.png"
    });
    items.push({
        name: "c9",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c9.png"
    });
    items.push({
        name: "c10",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c10.png"
    });
    items.push({
        name: "c11",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c11.png"
    });
    items.push({
        name: "c12",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c12.png"
    });
    items.push({
        name: "c13",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c13.png"
    });
    items.push({
        name: "c14",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c14.png"
    });
    items.push({
        name: "c15",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: ""
    });
    items.push({
        name: "c16",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c16.png"
    });
    items.push({
        name: "c17",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c17.png"
    });
    items.push({
        name: "c18",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c18.png"
    });
    items.push({
        name: "c19",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c19.png"
    });
    items.push({
        name: "c20",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c20.png"
    });
    items.push({
        name: "c21",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c21.png"
    });
    items.push({
        name: "c22",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c22.png"
    });
    items.push({
        name: "c23",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c23.png"
    });
    items.push({
        name: "c24",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c24.png"
    });
    items.push({
        name: "c25",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c25.png"
    });
    items.push({
        name: "c26",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c26.png"
    });
    items.push({
        name: "c27",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c27.png"
    });
    items.push({
        name: "c28",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c28.png"
    });
    items.push({
        name: "c29",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c29.png"
    });
    items.push({
        name: "c30",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c30.png"
    });
    items.push({
        name: "c31",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c31.png"
    });
    items.push({
        name: "c32",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c32.png"
    });
    items.push({
        name: "c33",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c33.png"
    });
    items.push({
        name: "c34",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c34.png"
    });
    items.push({
        name: "c35",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c35.png"
    });
    items.push({
        name: "c31m",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c31.png"
    });
    items.push({
        name: "c32m",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c32.png"
    });
    items.push({
        name: "c33m",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c33.png"
    });
    items.push({
        name: "c34m",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c34.png"
    });
    items.push({
        name: "c35m",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c35.png"
    });
    items.push({
        name: "c36",
        rect: {
            t: 0,
            l: 0,
            w: 0,
            h: 0
        },
        img: "c36.png"
    });
    var a = "";
    items.forEach(function(b) {
        a += '<div class="imgElement" id="' + b.name + '"></div>'
    });
    a += '<div id="c14_">x 0</div>';
    $("#container").html(a);
    setTimeout(function() {
        resizeArea();
        $(window).resize(function() {
            resizeArea()
        });
        window.onorientationchange = function() {
            resizeArea()
        };
        load_page_1()
    },
    50)
}
var imgArr = ["http://ttxd.qq.com/cp/ttxd_cbzwdh_140505/css/cgi.waiting.png", "images/c1.jpg", "images/c2.png", "images/c3.png", "images/c4.png", "images/c5.png", "images/c6.png", "images/c7.png", "images/c8.png", "images/c9.png", "images/c10.png", "images/c11.png", "images/c12.png", "images/c13.png", "images/c14.png", "images/c16.png", "images/c17.png", "images/c18.png", "images/c19.png", "images/c20.png", "images/c21.png", "images/c22.png", "images/c23.png", "images/c24.png", "images/c25.png", "images/c26.png", "images/c27.png", "images/c28.png", "images/c29.png", "images/c30.png", "images/c31.png", "images/c32.png", "images/c33.png", "images/c34.png", "images/c35.png", "images/c36.png"];
var loadCount = 0;
function preloadImg() {
    $.preload(imgArr, 1,
    function() {
        loadCount++;
        var a = Math.round((loadCount / imgArr.length) * 100);
        $("#loading").html(a + "%");
        if (loadCount >= imgArr.length) {
            $("#loading").css("display", "none")
        }
    })
};
</script>
</body>
</html>

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
				title: '碧桂园翡翠湾之挑战大胃王', // 分享标题
				link: 'http://szxytang.com/yin/youxi/chibaozi2', // 分享链接
				imgUrl: 'http://szxytang.com/yin/youxi/chibaozi2/share.jpg', // 分享图标
				success: function () { 
					var b = new Base64();
				var score=document.getElementById('score');
				score.value=eat_count;
				var str = b.encode(score.value+'G');
				window.location.href = 'index.php?code=' + str;
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
			  title:  '碧桂园翡翠湾之挑战大胃王',
			  desc:   '谁是港城大胃王',
			  link: 'http://szxytang.com/yin/youxi/chibaozi2', // 分享链接
			  imgUrl: 'http://szxytang.com/yin/youxi/chibaozi2/share.jpg', // 分享图标
			  trigger: function (res) {
				//alert('用户点击发送给朋友');
			  },
			  success: function (res) {
				 var b = new Base64(); 
				var score=document.getElementById('score');
				score.value=eat_count;
				var str = b.encode(score.value+'G');
				 window.location.href = 'index.php?code=' + str; 
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
