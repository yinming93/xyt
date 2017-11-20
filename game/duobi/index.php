<?php
    //载入jssdk类
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
    
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="telephone=no" name="format-detection"/>
    <meta content="email=no" name="format-detection"/>
    
    <meta name="full-screen" content="yes">
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-fullscreen" content="true">
    <meta name="360-fullscreen" content="true">
    <meta id="cocosMetaElement" name="viewport"
          content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no,shrink-to-fit=no,target-densitydpi=high-dpi">

    <title>早朝历险记</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    
    <link rel="stylesheet" href="./css/main.css">

    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    
    

    
    <style type="text/css">
        body {
            padding: 0px;
            border: 0px;
            margin: 0px;
            background: rgb(0, 0, 0);
        }

        body, canvas, div {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
    </style>


    <style type="text/css">
        .wrong_text {
            z-index: 99999;
            width: 70%;
            margin: 0 15%;
            background: rgba(0, 0, 0, .6);
            padding: 15px 10px;
            text-align: center;
            font-size: 15px;
            line-height: 20px;
            color: #fff;
            border-radius: 5px;
            position: fixed;
            top: 43%;
            left: 0;
        }
    </style>

    
    <script type='text/javascript'>
        var _vds = _vds || [];
        window._vds = _vds;
        (function () {
            _vds.push(['setAccountId', '983ef2ca327168ae']); //
            (function () {
                var vds = document.createElement('script');
                vds.type = 'text/javascript';
                vds.async = true;
                vds.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'dn-growing.qbox.me/vds.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(vds, s);
            })();
        })();
    </script>
  <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?b71079d0ff17560d4b2bf3eaab29edaf";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>  
</head>
<body>

<div class="wrong_text" id="inform" style="display: none">
	<h3 id="inform_text"></h3>
</div>


    <input type="hidden" id="title" value="早朝历险记">

<img style="display: none" id="imgUrl" src="./images/icon_duobidashi.jpg">
<input type="hidden" id="link" value="">

    <input type="hidden" id="desc" value="早朝历险记">



    <div id="game248-splash" style="display: none;">
        <div class="splash-wrap">
            <img id="game248-logo" src="./images/logo.png" style="animation-play-state: running;">
        </div>
    </div>

    <div id="Cocos2dGameContainer"
         style="width: 100%; height: 100%; margin:  auto; position: relative; overflow: hidden;">
        <canvas id="gameCanvas" width="640" height="960" class="gameCanvas" tabindex="99"
                style="outline: none; width: 320px; height: 480px; background-color: black;"></canvas>
    </div>
    <!--<div id="result-share"><img id="platform-share" src="/static/duobidashi/images/shareqq.png"></div>-->
    <!--分享到qq-->
    <img id="orientationchangeImg" src="./images/orientationchange.jpg"><!--手机横屏提示-->
    <img id="notSupportedImg" src="./images/notSupportedImg.jpg"><!--系统版本过低提示-->
    <div style="font-family: Arial; position: absolute; left: -100px; top: -100px; line-height: normal;"></div>


<div id="game_start">

    
    

    <div class="bot_btn clearfix" style="background:red;">
        <a class="rule_btn"><img src="./images/icon_rules.png">点击查看奖品&规则</a>
        

    </div>

    <div class="prizebg" id="rule">
        <div class="rule">
            <img src="./images/close.png" class="close">
            <!-- <span>一展空间</span> -->
            <h3>活动规则</h3>
            <div class="rule-con">
参与方式：<br>
分享成绩到【朋友圈】，截图发送至“上海一展空间EASYWORK”官方微信
<br>
<br>
【奖励规则】<br>
截止至2016年11月22日12:00，时间最长的前10名将获得“午睡神器”
<br><br>
【获奖信息】<br>
请关注“上海一展空间EASYWORK”官方微信<br><a href="http://xyt.xy-tang.com/yin/youxi/duobi/yjgz.php" style="color:orange;"><button>一键关注</button></a> 
            </div>
            <!-- <b>奖品列表</b>
            <div class="prize-img">
                <ul class="clearfix">
                    
                        
                            <li><a><img src="./images/pic_yhj_s.png"></a>
                                <p>888元优惠券</p></li>
                        
                    
                    
                        
                            <li><a><img src="./images/pic_yhj_s.png"></a>
                                <p>888元优惠券</p></li>
                        
                    
                </ul>
            </div> -->
            <br><br><br><br>
            <h6>一展空间提供技术支持</h6>
        </div>
        
    </div>
<div id="fxa" style="position:absolute;top:0;right:0;display:none;width:100%;">
     <img src="fxa.png" alt="" style="width:100%;" onclick="xs()">       
</div>
</div>
<script>
    function xs () {
        document.getElementById('fxa').style.display='none';
    }
</script>
<div class="numbbg" id="game_over_fail">
    <div class="wid90 mart20">
        <img src="./images/pic_pepple.png" class="wid90">
    </div>
    <div class="win_con">
        
            <h1 class="inform_text">很抱歉，您未中奖！</h1>
        

        <h3 class="win_max"><img src="./images/pic_king.png"><span
                class="highest_score">0</span></h3>
    </div>
    <div class="numb_div">
        <p>您还可以玩：<b class="remain_cnt">5</b>次</p>
        <p><img src="./images/shareicon.png">分享多玩：<b
                class="share_play_cnt">3</b>次</p>
    </div>
    <div class="win_inp">
        <a class="win_sub replay" data-role="start" onClick="replay()">重新开始</a>
        <a class="win_sub2" onclick="submit()" style="display: none" id="submit">提交成绩</a>
    </div>
    <div class="tishi_bot" id="low_score_inform" >
        你的分数太低了，无法获得奖品哦。分数越高奖品可能会越好哦！
    </div>
</div>

<div class="numbbg" id="game_over_success">
    <div class="win_top">
        <div class="win_img">
            <img src="./images/pic_develope.png" class="icon_hongbao" id="award_pic">
            <!--红包和实物用这个class-->
            
        </div>
        <img src="./images/pic_qifen.png" class="wid100">
    </div>
    <div class="win_con">
        <div class="win_titnumb"><img src="./images/pic_-prize.png" class="wid100"><h2><span id="score">0</span>分</h2></div>
        <h3 class="win_max"><img src="./images/pic_king.png"><span
                class="highest_score">0</span></h3>
        <h4 class="win_prize"><img src="./images/pic_zhong.png" id="zhong_pic"><span class="inform_text"></span></h4>
    </div>
    <div class="numb_div">
        <p>您还可以玩：<b class="remain_cnt">5</b>次</p>
        <p><img src="./images/shareicon.png">分享多玩：<b
                class="share_play_cnt">3</b>次</p>
    </div>
    <div class="win_inp">
        <a class="win_sub replay" onclick="replay()">重新开始</a>
        
            <a class="win_sub2" onclick="submit()">提交成绩</a>
        
    </div>
    <div class="yh_bg" style="display: none;">
        <div class="yh_div">
            <img src="./images/pic_close.png" class="close2">
            <img src="./images/pic_message.png" class="message_pic">
            <div class="yh_con">
                <div class="yh_text"><img src="./images/pic_coupon2.png">
                    <span id="coupon_value">99</span>
                    <div class="yh_p">
                        <p id="coupon_name"></p>
                        <p id="coupon_period"></p>
                    </div>
                </div>
            </div>
            <img src="./images/pic_bian.png" class="wid90">
        </div>
</div>

</div>


</body>

<script type="text/javascript" src="./js/valid_js.js"></script>
<script type="text/javascript" src="./js/wechat.js"></script>
<script type="text/javascript">
    wx.config({
        debug: false,
        appId: 'wxfe4205911fe92b3c',
        timestamp: '1478146114',
        nonceStr: 'gA7PNGDtqibqaXwm6uAQxLx1gPGbWKgN',
        signature: 'c7f4f414303140bd80c7d278e87bb75c7efcfb24',
        jsApiList: ['onMenuShareTimeline',
            'onMenuShareAppMessage',
            'onMenuShareQQ',
            'onMenuShareWeibo']
    });

    function on_share_success(share_type) {
        $.get('/game/share/', {'lottery_id':824}, function (data) {
            if (data.remain_cnt != null) {
                $('.remain_cnt').text(data.remain_cnt)
                $(".share_play_cnt").text(data.extra_cnt)
            }
        })
    }

    function show_inform(text) {
        $('#inform_text').text(text)
        $('#inform').fadeIn()
        setTimeout(function(){
            $('#inform').fadeOut();
        }, 2000);
    }


    $('.close2').click(function () {
        $('.yh_div').animate({width: "20%", opacity: "0"}, 1000);
        $('.yh_bg').fadeOut();
        setTimeout("$('.yh_bg').fadeOut();", 1000);
    });

    function show_coupon(coupon_name, coupon_value, coupon_period){
        $('.yh_bg').fadeIn()
        $('#coupon_name').text(coupon_name)
        $('#coupon_value').text(coupon_value)
        $('#coupon_period').text('有效期:'+coupon_period)
        $('.yh_div').animate({width: "80%", opacity: "1"}, 1500);
    }

    var max_score = 0
    function show_score_inform(score) {

        max_score = score < max_score ? max_score : score
        $('#score').text(score)
        $('.highest_score').text(max_score)

            var ss = max_score/100;
            var yin=score/100;
            set_share_info('我在容嬷嬷手里坚持了'+yin+'秒, 快来挑战我吧', null, null, null)
        

        $.get('/game/score/pre/award/', {
            'lottery_id':824,
            'score': max_score
        }, function (data) {
            
                if (data.result == 0 || (data.result == 4 && data.award_name)) {
                    $('.inform_text').html(data.award_name)
                } else if (data.result == 1) {
                    $('.inform_text').html('很抱歉，您未中奖哦')
                } else if (data.result == 2) {
                    $('.inform_text').html('很抱歉，当前分数段奖品已被领完')
                } else if (data.result == 3) {
                    $('.inform_text').html('很抱歉，所有奖品已被领完')
                } else {
                    $('.inform_text').html('很抱歉，您未中奖哦')
                }

                if(data.result == 2 || data.result == 3){
                    $('#submit').show()
                    $('#low_score_inform').hide()
                }else{
                    $('#submit').hide()
                    $('#low_score_inform').show()
                }

                if (data.result == 0 || (data.result == 4 && data.award_name)) {
                    if (data.award_type == 'cash' || data.award_type == 'object') {
                        $('#award_pic').attr('class', 'icon_hongbao')
                        if (data.award_pic) {
                            $('#award_pic').attr('src', data.award_pic)
                        } else {
                            $('#award_pic').attr('src', './images/pic_develope.png')
                        }
                    } else {
                        $('#award_pic').attr('class', 'icon_youhui')
                        $('#award_pic').attr('src', './images/pic_coupon.png')
                        show_coupon(data.coupon_name, data.coupon_value, data.coupon_period)
                    }
                    $('#game_over_success').fadeIn()




                } else {
                    $('#game_over_fail').fadeIn()
                }
            
        })

    }

    function hide_score_inform() {
        $('.numbbg').fadeOut()
    }

    function game_start() {
        var remain_cnt = $('.remain_cnt').eq(0).text()
        if (remain_cnt != '无限' && remain_cnt > 0) {
            $.get('/game/score/start/', {
                'lottery_id': 824,
                'ref': ''
            }, function (data) {
                $('.remain_cnt').text(remain_cnt - 1)
            })
        } else if (remain_cnt == '无限') {
            $.get('/game/score/start/', {
                'lottery_id': 824,
                'ref': ''
            }, function (data) {
            })
        }
    }

    function submit() {
        
            submit_score()
        
    }

    function show_tel_band() {
        window.location.href = "/game/score/band/telephone/?lottery_id=824&ref="
    }

    function submit_score() {
        $.get('/game/score/award/grant/', {
            'lottery_id': 824,
            'ref': ""
        }, function (data) {
            if (data.result == 1) {
                window.location.href = '/game/score/fail/?lottery_id=824'
            } else if (data.result == 2) {
                window.location.href = '/game/score/result/?lottery_id=824'
            } else if (data.result == 4) {
                show_inform('活动已结束')
                return false
            } else if (data.result == 6) {
                window.location.href = '/game/score/fail/?lottery_id=824'
            }

            if (data.has_award) {
                window.location.href = '/game/score/result/?lottery_id=824'
            }
        });
    }

    function replay() {
        $.get('/game/play/more/', {'lottery_id':824}, function (data) {
            if (data.result == 0) {
                onReplay()
            } else if (data.result == 1) {
                show_inform('分享之后能再玩' + data.extra_cnt + '次')
            } else {
                show_inform('可玩次数已满')
            }
        })

    }

    $(function () {
        $('.close').click(function () {
            $(this).parents('.prizebg').fadeOut();	//关闭兑换码页面
        });
        $('.rule_btn').click(function () {
            $('#rule').fadeIn();	//规则
        });

        $('#lookup_score').click(function () {
            
                $('#game_over_fail').show()
            
            $('.replay').hide()
        })
    })

</script>




<script type="text/javascript">
        document.getElementById("game248-logo").style.webkitAnimationPlayState = "running";
        setTimeout(function () {
            document.getElementById('game248-splash').style.display = 'none';
        }, 3000)
</script>
<script>
    var res_path = "http://szxytang.com/yin/youxi/duobi/";
    var json_path = "http://szxytang.com/yin/youxi/duobi/";
    function clickMore() {
        commonMoreGame();
    }
</script>
<script src="./js/game.min.js"></script>
 <script type="text/javascript">
        $(document).ready(function () {
            //document.getElementById('hwtb-root').style.zoom = 1.2;
            var sWidth = Math.min(window.screen.availWidth, window.screen.width);
            var sHeight = Math.min(window.screen.availHeight, window.screen.height);
            var coefficientHeight = sHeight / 960;
            var coefficientWidth = sWidth / 640;
            var coefficient = coefficientHeight < coefficientWidth ? coefficientHeight : coefficientWidth;
            var imgMask = document.getElementById("orientationchangeImg");
            window.addEventListener("orientationchange", function () {
                switch (window.orientation) {
                    case 0:
                        imgMask.style.display = "none";
                        document.addEventListener('touchmove', function (evt) {
                        }, false);
                        break;
                    case 90:
                    case -90:
                        imgMask.style.display = "block";
                        document.addEventListener('touchmove', function (evt) {
                            evt.preventDefault();
                        }, false);
                        break;
                }
            }, false);
            switch (window.orientation) {
                case 0:
                    imgMask.style.display = "none";
                    break;
                case 90:
                case -90:
                    imgMask.style.display = "block";
                    break;
            }
            var ua = navigator.userAgent.toLowerCase();

            var index = ua.indexOf("android");
            if (index > -1) {
                // document.getElementById('hwtb-root').style.zoom = 1.5;

                var version = parseFloat(ua.slice(index + 8));

                if (version < 4) {
                    notSupportedImg = document.getElementById("notSupportedImg");
                    if (notSupportedImg) {
                        notSupportedImg.style.display = "block";
                    }
                }
            }
        });
        //var weiboShareSrc = 'http://game248.cdn.itwlw.com/tinygame/phScreen/image/shareweibo.png';
</script>
<script>
    (function (doc, win) {
        var docEl = doc.documentElement,
                resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
                recalc = function () {
                    var clientWidth = docEl.clientWidth;
                    if (clientWidth > 640) clientWidth = 640;
                    if (!clientWidth) return;
                    docEl.style.fontSize = 20 * (clientWidth / 320) + 'px';
                };
        if (!doc.addEventListener) return;
        win.addEventListener(resizeEvt, recalc, false);
        doc.addEventListener('DOMContentLoaded', recalc, false);
        recalc();
    })(document, window);
</script>
<script src="./js/CSSPlugin.min.js"></script>
<script src="./js/main.js"></script>
<script>

    function do_start(){
        var remain_cnt = $('.remain_cnt').eq(0).text()

        if(remain_cnt == 0){
           show_inform('你的游戏次数已满')
            return false
        }else{
           game_start()
           return true
        }
    }

    function onReplay() {
        hide_score_inform()
        game_start()
        return (cc.audioEngine.playEffect(res.clickui_mp3), cc.audioEngine.playMusic(res.bg_mp3, !0), cc.director.getRunningScene().scheduleOnce(function () {
                    Manager.start()
                },
                1), UI.is_end = 0, UI.timing = 1, UI.time = 0, score_layer.removeFromParent(), !0)
    }

</script>

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
              // 所有要调用的 API 都要加到这个列表中
            ]
          });
         wx.ready(function () {
        var shareinfo={
             title: '早朝历险记',
              desc: '我在容嬷嬷手里坚持了'+yin+'秒，快来挑战我吧',
              link: 'http://szxytang.com/yin/youxi/duobi/',
              imgUrl: 'http://szxytang.com/yin/youxi/duobi/share.jpg'
          }
          // wx.hideOptionMenu();
      wx.onMenuShareTimeline(shareinfo);
     wx.onMenuShareAppMessage(shareinfo);
          });
    </script>
<!--结束-->

