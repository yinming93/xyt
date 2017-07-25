<?php
    //载入jssdk类
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,minimal-ui">
        <meta http-equiv="pragma" content="no-cache">
        <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
        <meta http-equiv="expires" content="-1">
        <title>不好！“猴塞雷”混入吉祥猴大军！！！</title>
        <link rel="stylesheet" type="text/css" href="css/m.min.css">
        <script src="js/jquery-1.8.2.min.js"></script>
    </head>
    <body>
        <div id="container">

        </div>

        <script type="text/javascript">
            var mebtnopenurl = 'http://game2.id87.com';
            window.shareData = {
                "imgUrl": "http://game2.id87.com/games/icon/qmxzfzm.png",
                "timeLineLink": "http://game2.id87.com/games/qmxzfzm/index.html",
                "tTitle": "找人啊",
                "tContent": ""
            };

            function goHome() {
                window.location = mebtnopenurl;
            }
            function ttt(){
            	location.reload();
            }
            function clickMore() {
                // if ((window.location + "").indexOf("zf", 1) > 0) {
                //     window.location = "https://www.baidu.com/";
                // }
                // else {
                //     goHome();
                // }
                window.location = "guize.php";
            }
            function clickMore1(){
                window.location = "bm.php";
            }
            function dp_share() {
                document.title = "我在1分钟内" + (myData.score) + "次找到猴赛雷！你也来试试！";
                document.getElementById("share").style.display = "";
                window.shareData.tTitle = document.title;
            }
            function dp_Ranking() {
                window.location = mebtnopenurl;
            }

            function showAd() {
            }
            function hideAd() {
            }
            document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {

                WeixinJSBridge.on('menu:share:appmessage', function(argv) {
                    WeixinJSBridge.invoke('sendAppMessage', {
                        "img_url": window.shareData.imgUrl,
                        "link": window.shareData.timeLineLink,
                        "desc": window.shareData.tContent,
                        "title": window.shareData.tTitle
                    }, onShareComplete);
                });

                WeixinJSBridge.on('menu:share:timeline', function(argv) {
                    WeixinJSBridge.invoke('shareTimeline', {
                        "img_url": window.shareData.imgUrl,
                        "img_width": "640",
                        "img_height": "640",
                        "link": window.shareData.timeLineLink,
                        "desc": window.shareData.tContent,
                        "title": window.shareData.tTitle
                    }, onShareComplete);
                });
            }, false);
            var myData = {gameid: "qmxzfzm"};
            window.shareData.timeLineLink = "http://game2.id87.com/";
            function dp_submitScore(score) {
                myData.score = parseInt(score);
                myData.scoreName = "成功寻找" + score + "次房祖名";
                document.cookie="code="+score;
                if (score > 1) {
                    if (confirm("你一共找到" + score + "次'猴赛雷'，你的24k氪金眼还没瞎吗？快让你的朋友也来试试吧")) {
                        dp_share();
                    }
                }
            }
            function onShareComplete(res) {
                if (localStorage.myuid && myData.score != undefined) {
                    setTimeout(function() {
                        if (confirm("？")) {
                            window.location = "";
                        }
                        else {
                            document.location.href = mebtnopenurl;
                        }
                    }, 500);
                }
                else {
                    document.location.href = mebtnopenurl;
                }
            }
        </script>
    </body>
</html>
<script id="tpl" type="text/html">
    <div class="grid">
        <div class="page hide" id="loading">
            <div class="loading-txt"><%=loading%></div>
        </div>
        <div class="page hide" id="index">
            <h1><%=title%></h1>

            <div id="help"><%=help_txt%></div>
            <div class="btns">
                <button data-type="color" class="btn play-btn">
                    <%=btn_start%>
                </button>
                <a href="javascript:void(0);"  onclick="clickMore();" class="btn btn-boyaa">
                    <%=btn_more_game%>
                </a>
            </div>
        </div>
        <div class="page hide" id="room">
            <header>
                <span class="lv">
                    <%=score%>
                    <em>
                        1
                    </em>
                </span>
                <span class="time">
                </span>
                <!-- <span class="btn btn-pause">
                     <%=btn_pause%>
                 </span>
                -->
            </header>
            <div id="box" class="lv1">
            </div>
        </div>
        <div class="page hide" id="dialog">
            <div class="inner">
                <div class="content gameover">
                    <div class="inner-content">

                        <h3></h3>
                        <div class="btn-wrap">
                            
                            <a href="javascript:void(0);" onclick="clickMore1();" class="btn btn-boyaa">
                                <%=btn_more_game1%>
                            </a>
                        </div>


                    </div>
                </div>
                <div class="content pause">
                    <div class="inner-content">

                        <h3>
                            <%=game_pause%>
                        </h3>
                        <div class="btn-wrap">
                            <button class="btn btn-resume">
                                <%=btn_resume%>
                            </button>
                            <a href="javascript:void(0);" onclick="clickMore();" class="btn btn-boyaa">
                                <%=btn_more_game%>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            </ins>
        </div>
    </div>
    <div id=share style="display: none">
        <img width=100% src="share.png"
             style="position: fixed; z-index: 9999; top: 0; left: 0; display: "
             ontouchstart="document.getElementById('share').style.display='none';" />
    </div>
</script>
<script src="js/libs.min.js"></script>
<script src="js/main.min3.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
        wx.config({
            debug: false,
            appId: '<?php echo $signPackage["appId"];?>',
            timestamp: <?php echo $signPackage["timestamp"];?>,
            nonceStr: '<?php echo $signPackage["nonceStr"];?>',
            signature: '<?php echo $signPackage["signature"];?>',
            jsApiList: [
                        'onMenuShareAppMessage','onMenuShareTimeline'
                        ]
        });
      
        wx.ready(function(){
            wx.onMenuShareAppMessage({
              title:  '不好！“猴塞雷”混入吉祥猴大军！！！',
              desc:   '放下手雷，也许我们还能做朋友',
              link:   'http://szxytang.com/yin/youxi/hhhh/',
              imgUrl: 'http://szxytang.com/yin/youxi/hhhh/share.jpg',
              trigger: function (res) {
              },
              success: function (res) {
              },
              cancel: function (res) {
              },
              fail: function (res) {
              }
            });
            wx.onMenuShareTimeline({
            title: '不好！“猴塞雷”混入吉祥猴大军！！！', // 分享标题
            link: 'http://szxytang.com/yin/youxi/hhhh/', // 分享链接
            imgUrl: 'http://szxytang.com/yin/youxi/hhhh/share.jpg', // 分享图标
            success: function () { 
            },
            cancel: function () {                 
            }
        });   
        });
        wx.error(function(res){
          alert(res.errMsg);
        });
    
    </script>