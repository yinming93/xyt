<?php
	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="yes" name="apple-touch-fullscreen" />
    <meta content="telephone=no" name="format-detection" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">
    <title>拼梵高名画九宫格，赢阿尔勒精美礼品！</title>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link href="css/animate.css" rel="stylesheet" />
    <style type="text/css">
        body {
            margin: 0 auto;
            max-width: 640px;
            height: 100%;
        }

        img {
            max-width: 100%!important;
            vertical-align: middle;
        }
        
    </style>
    <script type="text/javascript">
        function init() {
            $('#car_audio')[0].load("yinyue.mp3");
            $('#car_audio')[0].play("yinyue.mp3");
            document.getElementById("car_audio").loop = true;
        };
    </script>
</head>
<body onload="init()">
    <!--页面集合-->
    <div id="pageWrapper" style="display: ">
        <div id="pages">
            <div id="page_default" class="pagemodel">
                <div class="initloading">
                    <span class="normal-loading"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="mask"></div>
    <!--展示每关结果及重玩界面-->
    <div id="gameresult">
        <div class="resultcontainer">
            <div class="resultinfo"></div>
            <div class="btngroup">
                <a class="btn1 hide" id="againgame">再玩一次</a>
                <a class="btn1 hide" id="restartgame">再来一次</a>
                <a class="btn1 " id="continuegame">挑战下一关</a>
                <a class="btn1" id="sharegame" >炫耀一下</a>
            </div>
        </div>
    </div>
    <!--全部通关-->
    <div id="allPassed">
        <img src="images/0201.jpg" />
        <div class="resultinfo"></div>
         <div id="writeInfo" class="animated fadeInLeft" style="position: absolute; z-index: 2; top: 68%; left: 0; width: 50%; height: auto">
            <img src="images/0202.png" />
        </div>
        <div id="replay" class="animated fadeInRight" style="position: absolute; z-index: 2; top: 68%; left: 50%; width: 50%; height: auto">
            <img src="images/0203.png" />
        </div>
    </div>
    <!--提交信息-->
    <div id="submitPage">
        <img src="images/0301.jpg" />
        <div style="position: absolute; top: 50.5%; left: 39%">
            <input type="text" id="txtName" class="txtBox" />
        </div>
        <div style="position: absolute; top:58.2%; left: 39%">
            <input type="tel" id="txtTel" class="txtBox" />
        </div>
        <div id="tijiao" class="animated fadeInDown" style="position: absolute; z-index: 2; top: 69%;height:auto;left:0;width:100%">
            <img src="images/0302.png" />
        </div>
    </div>

    <!--页面模板-->
    <script type="text/template" style="display: none;" id="pageTemplate">
        <div id="<%= id%>" class="pagemodel">
            <div class="initloading">
                <span class="normal-loading"></span>
            </div>
        </div>
    </script>
    <!--每关倒计时-->
    <script type="text/template" style="display: none;" id="jigsawTemplate">
        <div class="drag-content">
            <div class="play-container">
                <div class="drag-box">
                </div>
                <div class="masker">
                    <div class="load">
                        <div class="first-layer"></div>
                        <div class="second-layer"></div>
                        <div class="third-layer"></div>
                        <div class="count-down">
                            <div class="play-button play-button-ready playbtn"></div>
                            <ul>
                                <li>3</li>
                                <li>2</li>
                                <li>1</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <span class="done">done</span>
            </div>
            <div class="timer">
                <div class="timer-con">
                    <span class="timer-icon"></span>
                    <span class="t counter">00.000''</span>
                </div>
                <div class="kapics">
                    1/1
                </div>
            </div>
        </div>
    </script>

    <script type="text/template" style="display: none;" id="jigsawLayoutTemplate">
        <% for(var i = 0 ; i < list.length;i++){%>
	<div class="item" sort="<%=list[i].sort%>" dragitem='1' style="width: <%=list[i].w%>px; height: <%=list[i].h%>px; background: url(<%=img%>) no-repeat; background-position: <%=list[i].x%>px <%=list[i].y%>px; background-size: <%=width%>px <%=height%>px;"></div>
        <%}%>
    </script>
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <!--分享提示-->
    <div id="share" style="display: none">
        <img src="images/share.png" style="width:100%;position: fixed; z-index: 9999; top: 0; left: 0; display: " ontouchstart="document.getElementById('share').style.display='none';" />
    </div>
    <!--音乐-->
    <audio id="car_audio" src="sound/yinyue.mp3" style="display: none;"></audio>

    <!--分享开始-->
    <script src="js/CommonShare.js"></script>
    <script src="js/share.js"></script>
    <!--分享结束-->
	
	<!--开始-->

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
				title: '拼梵高名画九宫格，赢阿尔勒精美礼品！', // 分享标题
				link: 'http://xyt.xy-tang.com/2016hj/pintu/', // 分享链接
			    imgUrl: 'http://xyt.xy-tang.com/2016hj/pintu/share.jpg', // 分享图标
				success: function () { 
					// 用户确认分享后执行的回调函数
					//window.location.href = 'http://www.baidu.com';
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
			  title:  '拼梵高名画九宫格，赢阿尔勒精美礼品！',
			  desc:   '梵高名画你认识几幅，赶快来挑战！',
			  link: 'http://xyt.xy-tang.com/2016hj/pintu/', // 分享链接
			  imgUrl: 'http://xyt.xy-tang.com/2016hj/pintu/share.jpg', // 分享图标
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
	
    <script>
        var link = window.location.href;
        if (link.indexOf("#rd") >= 0)
        {
            console.log(link.indexOf("#rd"));
            window.location.href = ll.replace("#rd", "");
        }
        
    </script>
</body>
</html>
