function load_page_1() {
    $("#c1").css("display", "block");
    $("#c2").css("display", "block");
    $("#c2").addClass("imgElementClick");
    $("#c3").css("display", "block");
    $("#c4").css("display", "block")
}
function load_page_2() {
    $("#c1").css("display", "block");
    $("#c2").css("display", "none");
    $("#c3").css("display", "none");
    $("#c4").css("display", "none");
    $("#c29").css("display", "block");
    $("#c29").addClass("imgElementClick");
    $("#c18").addClass("imgElementClick");
    $("#c19").addClass("imgElementClick");
    $("#c30").css("display", "block");
    $("#c21").css("display", "block");
    $("#c25").css("display", "block");
    $("#c13").css("display", "block");
    $("#c14").css("display", "block");
    $("#c14_").css("display", "block");
    $("#c16").css("display", "block");
    $("#c17").css("display", "block");
    $("#c5").css("display", "block");
    $("#c6").css("display", "block")
}
var baozi_max = 50;
var eat_max_time = 15;
var first_eat = true;
var finish_eat = false;
var eat_count = 0;
var anim_count = 0;
var animArr_1 = ["#c28", "#c26", "#c27", "#c26", "#c27"];
var animArr_2 = ["#c34", "#c31", "#c32", "#c33", "#c35"];
var animArr_3 = ["#c35m", "#c34m", "#c31m", "#c32m", "#c33m"];
function tmpFn() {
    if (anim_count > 4) {
        anim_count = 0
    }
    if (anim_count == 2 || anim_count == 4) {
        eat_count++;
        $("#c14_").html("x " + eat_count)
    }
    if (eat_count > baozi_max * 0.33 && eat_count < baozi_max * 0.66) {
        $("#c6").css("display", "none");
        $("#c7").css("display", "block")
    } else {
        if (eat_count > baozi_max * 0.66) {
            $("#c7").css("display", "none");
            $("#c8").css("display", "block")
        }
    }
    animArr_1.forEach(function(a) {
        $(a).css("display", "none")
    });
    $(animArr_1[anim_count]).css("display", "block");
    animArr_2.forEach(function(a) {
        $(a).css("display", "none")
    });
    $(animArr_2[anim_count]).css("display", "block");
    animArr_3.forEach(function(a) {
        $(a).css("display", "none")
    });
    $(animArr_3[anim_count]).css("display", "block");
    anim_count++
}
function winORlose() {
    if (finish_eat == true) {
        return
    } else {
        finish_eat = true
    }
    $("#c29").css("display", "none");
    $("#c10").css("display", "block");
    animArr_1.forEach(function(a) {
        $(a).css("display", "none")
    });
    animArr_2.forEach(function(a) {
        $(a).css("display", "none")
    });
    animArr_3.forEach(function(a) {
        $(a).css("display", "none")
    });
    if (eat_count <= 20) {
        $("#c22").css("display", "block")
    } else {
        if (eat_count > 20 && eat_count <= 40) {
            $("#c23").css("display", "block")
        } else {
            if (eat_count > 40) {
                $("#c24").css("display", "block")
            }
        }
    }
    setTimeout(function() {
        $("#c10").css("display", "none");
        $("#c11").css("display", "block");
        $("#c36").css("display", "block");
        $("#c12").css("display", "block");
        $("#c18").css("display", "block");
        $("#c19").css("display", "block");
        $("#c20").css("display", "block");
        if (eat_count <= 20) {
            chat = eat_count + "个寿司不过瘾，必须得更牛逼些！！";
            share = "我在蓝光名仕公馆中秋吃寿司赛中吃了" + eat_count + "个寿司，打败5%的人，求填饱";
            share_imgUrl = "share.jpg"
        } else {
            if (eat_count <= 35) {
                chat = "我勒个去，你只吃了" + eat_count + "个寿司，太慢了吧！";
                share = "我在蓝光名仕公馆中秋吃寿司赛中吃了" + eat_count + "个寿司，打败15%的人，求填饱";
                share_imgUrl = "share.jpg"
            } else {
                if (eat_count <= 50) {
                    chat = "胃口不错，一口气吃" + eat_count + "个，吃完寿司记得再喝点小酒";
                    share = "我在蓝光名仕公馆中秋吃寿司赛中吃了" + eat_count + "个寿司，打败25%的人，求填饱";
                    share_imgUrl = "share.jpg"
                } else {
                    if (eat_count <= 65) {
                        chat = "万万没有想到！你吃了" + eat_count + "个寿司！放开吃，吃完哥请你喝酒！";
                        share = "我在蓝光名仕公馆中秋吃寿司赛中吃了" + eat_count + "个寿司，打败35%的人，求填饱";
                        share_imgUrl = "share.jpg"
                    } else {
                        if (eat_count <= 80) {
                            chat = "你吃了" + eat_count + "个寿司，看样子你根本停不下来，加油，再来一次更牛的！！";
                            share = "我在蓝光名仕公馆中秋吃寿司赛中吃了" + eat_count + "个寿司，打败45%的人，求填饱";
                            share_imgUrl = "share.jpg"
                        } else {
                            if (eat_count <= 95) {
                                chat = "你吃了" + eat_count + "个寿司，这样的速度，标准的一吃货啊，有潜质 ！";
                                share = "我在蓝光名仕公馆中秋吃寿司赛中吃了" + eat_count + "个寿司，打败55%的人，求填饱";
                                share_imgUrl = "share.jpg"
                            } else {
                                if (eat_count <= 110) {
                                    chat = "你吃了" + eat_count + "个寿司，我看你天赋异禀、骨骼惊奇，想来是百年难得一见的吃货奇才！";
                                    share = "我在蓝光名仕公馆中秋吃寿司赛中吃了" + eat_count + "个寿司，打败65%的人，求填饱";
                                    share_imgUrl = "share.jpg"
                                } else {
                                    if (eat_count <= 125) {
                                        chat = "我勒个去，你吃了" + eat_count + "个寿司…说点什么好？记得吃药…。";
                                        share = "我在蓝光名仕公馆中秋吃寿司赛中吃了" + eat_count + "个寿司，打败75%的人，求填饱";
                                        share_imgUrl = "share.jpg"
                                    } else {
                                        if (eat_count <= 140) {
                                            chat = "你吃了" + eat_count + "个寿司，这么快的速度，够神啊";
                                            share = "我在蓝光名仕公馆中秋吃寿司赛中吃了" + eat_count + "个寿司，打败85%的人，求填饱";
                                            share_imgUrl = "share.jpg"
                                        } else {
                                            chat = "天啊，你竟然吃了" + eat_count + "个寿司，简直是神一般的存在，膜拜啦！";
                                            share = "我在蓝光名仕公馆中秋吃寿司赛中吃了" + eat_count + "个寿司，打败95%的人，神一般的存在！";
                                            share_imgUrl = "share.jpg"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $("#c20").html(chat)
    },
    2000)
}
var chat = "";
$(document).on("click touchstart", "#c2",
function(a) {
    a.preventDefault();
    a.stopPropagation();
    load_page_2()
});
// $(document).on('touchend', "#c3",
// function() {
//     $('.guize').fadeIn();
// });

// $(document).on('touchend', ".guize",
// function() {
// 	$('.guize').fadeOut();
// });

$(document).on("click touchstart", "#c29",
function(a) {
    $("#zimu").css("opacity",1);
    // alert('打广告了');
    a.preventDefault();
    a.stopPropagation();
    if (first_eat == true) {
        $("#c17").animate({
            width: 0
        },
        eat_max_time * 1000, winORlose);
        first_eat = false
    }
    $("#c25").css("display", "none");
    tmpFn()
});
$(document).on("click touchstart", "#c18",
function(a) {
	window.location.href="http://mp.weixin.qq.com/s?__biz=MzIwMjE2MTQ1OA==&mid=402384662&idx=1&sn=514d5c84b8319b2afccea9f71956335c#rd";
	/* return false;
    a.preventDefault();
    a.stopPropagation();
	var b = new Base64();
	var score=document.getElementById('score');
	score.value=eat_count;
	var str = b.encode(score.value+'G');
    window.location.href = 'info.php?code=' + str */
});
$(document).on("click touchstart", "#c19",
function(a) {
    a.preventDefault();
    a.stopPropagation();
    $("#container").html("");
    window.location.reload()
});
$(function() {});
var shareUrl = "http://xytang.l97a.bolead.com/linwei/yuebing/index.html",
shareTitle = "蓝光名仕公馆 中秋吃寿司大赛！",
share = "中秋吃寿司大赛，求超越！",
share_imgUrl = "share.jpg";
var onBridgeReady = function() {
    var a = "";
    WeixinJSBridge.on("menu:share:appmessage",
    function(b) {
        var f = shareUrl + "images/" + share_imgUrl,
        c = shareUrl;
        var e = shareTitle;
        var d = share;
        WeixinJSBridge.invoke("sendAppMessage", {
            img_url: f,
            img_width: "240",
            img_height: "240",
            link: c,
            desc: d,
            title: e
        },
        function(g) {})
    });
    WeixinJSBridge.on("menu:share:timeline",
    function(b) {
        var f = shareUrl + "images/" + share_imgUrl,
        c = shareUrl;
        var e = shareTitle;
        var d = share;
        WeixinJSBridge.invoke("shareTimeline", {
            img_url: f,
            img_width: "240",
            img_height: "240",
            link: c,
            desc: d,
            title: d
        },
        function(g) {})
    })
};
if (document.addEventListener) {
    document.addEventListener("WeixinJSBridgeReady", onBridgeReady, false)
} else {
    if (document.attachEvent) {
        document.attachEvent("WeixinJSBridgeReady", onBridgeReady);
        document.attachEvent("onWeixinJSBridgeReady", onBridgeReady)
    }
};
/*  |xGv00|64afc39a02a4fd356fdf7a63851d2f26 */
