<?php
  //载入jssdk类
  require_once "jssdk.php";
  $jssdk = new JSSDK( APPID, APPSECRET );
  $signPackage = $jssdk->GetSignPackage();
  
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <title>答了这道题，男神女神陪你过七夕</title>
	<meta charset="utf-8" />
    <link href="style/style.css" rel="stylesheet" />    
    <script src="script/jquery.min.js"></script>
    <script src="script/ishoock.tools.js"></script>
    <script>
        var loading = [];
        $(function () {
            $(".option").on("click", function () {
                if (!$(this).parent().find(".right,.wrong")[0]) {
                    if (!$(this).hasClass("d")) {
                        $(this).addClass("wrong");
                    }
                    $(this).parent().find(".d").addClass("right");
                    $(this).parent().siblings(".answer").in();
                    $("body").animate({ "scrollTop": $(this).parent().offset().top-10 }, 200);
                    if ($(".right").length==6) {
                        $(".result").in();
                    }
                }
            });

            $(".q2img").on("click", function () {
                if ($(this).hasClass("off")) {
                    $(this).removeClass("off").addClass("on");
                    $(this).attr("src", "http://2016image.gz.bcebos.com/other/0805/image/q22.png");
                    cannon.play();
                } else {
                    $(this).removeClass("on").addClass("off");
                    $(this).attr("src", "http://2016image.gz.bcebos.com/other/0805/image/q21.png");
                    cannon.pause();
                }
            });
            loading = $("img").not(".result img");
            document.body.onscroll = Lazy;
            Lazy();
        });
        var cannon = new Audio();
        cannon.src = "http://2016image.gz.bcebos.com/other/0805/image/1.mp3";
        cannon.loop = false;
        cannon.onended = function () {
            $(".q2img").removeClass("on").addClass("off");
            $(".q2img").attr("src", "http://2016image.gz.bcebos.com/other/0805/image/q21.png");
        }
        function Lazy() {
            for (var i = 0; i < loading.length; i++) {
                if (($(loading[i]).offset().top>document.body.scrollTop)) {
                    if ($(loading[i]).attr("data-src") !="") {
                        $(loading[i]).attr("src", $(loading[i]).attr("data-src"));
                        $(loading[i]).attr("data-src", "");
                    }
                }
            }
        }
    </script>
</head>
<body>
    <img src="http://2016image.gz.bcebos.com/other/0805/image/share.jpg" style="position:absolute;opacity:0;top:-10000px;">
    <div class="header">
        <h1>答了这道题，男神女神陪你过七夕</h1>
        <span class="time">2016-08-5</span>&nbsp;&nbsp;
        <span class="author">杭州龙湖</span>
    </div>
    <img data-src="http://2016image.gz.bcebos.com/other/0805/image/1.png" />
    <div class="line1">
        ...密..封.线..内..禁.止..答..题...
    </div>
    <div class="tips1">
        考 试 规 则<br/>
        本试卷请在答题框中点选
    </div>
    <div class="hr">////////////////////////</div>
    <div class="qestions">
        <div class="qestion">
            <h2>1.电影题</h2>
            请根据下面的电影片段，猜出他们在做什么：<br/>
            <img class="q1img" data-src="http://2016image.gz.bcebos.com/other/0805/image/q1.gif" />
            <div class="options">
                <div class="option">
                    <div class="check"></div>
                    <div class="text">吐口水</div>
                </div>
                <div class="option d">
                    <div class="check"></div>
                    <div class="text">接吻</div>
                </div>
                <div class="option">
                    <div class="check"></div>
                    <div class="text">嘿嘿嘿</div>
                </div>
                <div class="option">
                    <div class="check"></div>
                    <div class="text">人工呼吸</div>
                </div>
            </div>
            <div class="answer">
                <div class="line"></div>
                <div class="contents">
                    <img data-src="http://2016image.gz.bcebos.com/other/0805/image/d.png" />
                    <div class="text">
                        答案：接吻，这是门技术活儿！ 
                    </div>
                </div>
            </div>
        </div>
        <div class="hr">////////////////////////</div>

        <div class="qestion">
            <h2>2.听力题</h2>
            请点击试听歌曲，猜出这首歌的名字？<br />
            <img class="q2img off" data-src="http://2016image.gz.bcebos.com/other/0805/image/q21.png" />
            <img class="hide" data-src="http://2016image.gz.bcebos.com/other/0805/image/q22.png" />
            <div class="options">
                <div class="option">
                    <div class="check"></div>
                    <div class="text">飞吻</div>
                </div>
                <div class="option d">
                    <div class="check"></div>
                    <div class="text">吻别</div>
                </div>
                <div class="option">
                    <div class="check"></div>
                    <div class="text">给我吻</div>
                </div>
                <div class="option">
                    <div class="check"></div>
                    <div class="text">身体掏空</div>
                </div>
            </div>
            <div class="answer">
                <div class="line"></div>
                <div class="contents">
                    <img data-src="http://2016image.gz.bcebos.com/other/0805/image/d.png" />
                    <div class="text">
                        答案：吻别，歌神张学友的代表作
                    </div>
                </div>
            </div>
        </div>
        <div class="hr">////////////////////////</div>

        <div class="qestion">
            <h2>3.文学题</h2>
            请给下面这个字选择正确的拼音：<br />
            <img class="q3img" data-src="http://2016image.gz.bcebos.com/other/0805/image/q3.gif" />
            <div class="options">
                <div class="option">
                    <div class="check"></div>
                    <div class="text">wo</div>
                </div>
                <div class="option">
                    <div class="check"></div>
                    <div class="text">shuo</div>
                </div>
                <div class="option d">
                    <div class="check"></div>
                    <div class="text">wen</div>
                </div>
                <div class="option">
                    <div class="check"></div>
                    <div class="text">bie</div>
                </div>
            </div>
            <div class="answer">
                <div class="line"></div>
                <div class="contents">
                    <img data-src="http://2016image.gz.bcebos.com/other/0805/image/d.png" />
                    <div class="text">
                        答案：wen，“吻”的古字。
                    </div>
                </div>
            </div>
        </div>
        <div class="hr">////////////////////////</div>

        <div class="qestion">
            <h2>4.歪果语题</h2>
            请将下面单词中的字母填充完整。<br />
            <img class="q4img" data-src="http://2016image.gz.bcebos.com/other/0805/image/q4.gif" />
            <div class="options">
                <div class="option">
                    <div class="check"></div>
                    <div class="text">L</div>
                </div>
                <div class="option d">
                    <div class="check"></div>
                    <div class="text">i</div>
                </div>
                <div class="option">
                    <div class="check"></div>
                    <div class="text">G</div>
                </div>
                <div class="option">
                    <div class="check"></div>
                    <div class="text">V</div>
                </div>
            </div>
            <div class="answer">
                <div class="line"></div>
                <div class="contents">
                    <img data-src="http://2016image.gz.bcebos.com/other/0805/image/d.png" />
                    <div class="text">
                        答案：kiss，like   
                    </div>
                </div>
            </div>
        </div>
        <div class="hr">////////////////////////</div>

        <div class="qestion">
            <h2>5.常识题</h2>
            亲吻不能达到以下哪种功效？<br />
            <img class="q5img" data-src="http://2016image.gz.bcebos.com/other/0805/image/q5.gif" />
            <div class="options">
                <div class="option d">
                    <div class="check"></div>
                    <div class="text">怀孕</div>
                </div>
                <div class="option">
                    <div class="check"></div>
                    <div class="text">減肥</div>
                </div>
                <div class="option">
                    <div class="check"></div>
                    <div class="text">止痛</div>
                </div>
                <div class="option">
                    <div class="check"></div>
                    <div class="text">防止蛀牙</div>
                </div>
            </div>
            <div class="answer">
                <div class="line"></div>
                <div class="contents">
                    <img data-src="http://2016image.gz.bcebos.com/other/0805/image/d.png" />
                    <div class="text">
                        答案：怀孕，麻麻骗我接吻会怀孕。
                    </div>
                </div>
            </div>
        </div>
        <div class="hr">////////////////////////</div>

        <div class="qestion">
            <h2>6.实践题</h2>
            以下哪种食物最有助于提高吻技？<br />
            <img class="q6img" data-src="http://2016image.gz.bcebos.com/other/0805/image/6.gif" />
            <div class="options">
                <div class="option">
                    <div class="check"></div>
                    <div class="text">螺丝</div>
                </div>
                <div class="option">
                    <div class="check"></div>
                    <div class="text">葡萄</div>
                </div>
                <div class="option">
                    <div class="check"></div>
                    <div class="text">樱桃</div>
                </div>
                <div class="option d">
                    <div class="check"></div>
                    <div class="text">星球杯</div>
                </div>
            </div>
            <div class="answer">
                <div class="line"></div>
                <div class="contents">
                    <img data-src="http://2016image.gz.bcebos.com/other/0805/image/d.png" />
                    <div class="text">
                        答案：星球杯，亲测有效。 
                    </div>
                </div>
            </div>
        </div>
        <div class="hr">////////////////////////</div>
    </div>
    <div class="result"></div>
    <div class="text1">
        分分钟涨知识了
    </div>
    <img class="ddd" data-src="http://2016image.gz.bcebos.com/other/0805/image/ddd.png" /><br/>
    <img class="text2" data-src="http://2016image.gz.bcebos.com/other/0805/image/text2.png" /><br />
    <img class="arrow" data-src="http://2016image.gz.bcebos.com/other/0805/image/arrow.png" /><br />
    <img class="text3" data-src="http://2016image.gz.bcebos.com/other/0805/image/text3.png" /><br />
	
	 <img class="arrow" data-src="http://2016image.gz.bcebos.com/other/0805/image/arrow.png" /><br />
    <img class="rule" data-src="http://2016image.gz.bcebos.com/other/0805/image/rule.png" /><br />
    <img class="rule" data-src="http://2016image.gz.bcebos.com/other/0805/image/prize.png" /><br />

  <!--  <img class="prize" data-src="http://2016image.gz.bcebos.com/other/0805/image/prize.png" /><br />-->
    <img class="p" data-src="http://2016image.gz.bcebos.com/other/0805/image/p1.jpg" /><br />
    <img class="p" data-src="http://2016image.gz.bcebos.com/other/0805/image/p2.jpg" /><br />
    <img class="p" data-src="http://2016image.gz.bcebos.com/other/0805/image/p3.jpg" /><br />
    <img class="p" data-src="http://2016image.gz.bcebos.com/other/0805/image/p4.jpg" /><br />
  <!--  <img class="p" data-src="http://2016image.gz.bcebos.com/other/0805/image/p5.jpg" /><br />
    <img class="p" data-src="http://2016image.gz.bcebos.com/other/0805/image/p6.jpg" /><br />-->
   
  <!--  <img class="qr" data-src="http://2016image.gz.bcebos.com/other/0805/image/qr.png" /><br />-->
    <div class="footer">
        <div class="state">
            <span class="read">阅读 100000+</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <img src="http://2016image.gz.bcebos.com/other/0805/image/like.jpg" /><span class="liked">3092</span>
            <span class="complain">投诉</span>
        </div>
        <div class="message">写留言<img src="http://2016image.gz.bcebos.com/other/0805/image/pan.png" /></div>
    </div>
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "/hm.baidu.com/hm.js?1c1f0607e1df9bac8bb7407b211de5a2";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</body>
</html>
<!--开始-->
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
       title: '答了这道题，男神女神陪你过七夕',
          desc: 'kiss',
          link: 'http://xyt.xy-tang.com/yin/youxi/d1',
          imgUrl: 'http://xyt.xy-tang.com/yin/youxi/d1/share.jpg'
      }
      wx.onMenuShareTimeline(shareinfo);
   wx.onMenuShareAppMessage(shareinfo);
      });
    </script>
<!--结束-->
