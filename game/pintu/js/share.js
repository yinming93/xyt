$("#seeRule").click(function () {
    $("#rule").show();
});
$("#rule").click(function () {
    $("#rule").hide();
});
$("#start").click(function () {
    //$("#index").hide();
    window.location.href = "pintu.php";
})

$("#sharegame").click(function () {
    $("#share").show();
})

/************************分享**************************/
var shareData = {
    title: '梦想不曾离开！',
    desc: '玩拼图游戏，赢取2016中国·西安华润置地草根歌手公益演唱会门票！',
    link: 'http://youhudong.cn/HuaRun/20151225_pt/game.html',
    imgUrl: 'http://youhudong.cn/HuaRun/20151225_pt/images/PicShare.jpg'
};

/*按照官方文档所述方法进行分享 begin*/
wx.ready(function () {
    // 2.1 分享给朋友
    wx.onMenuShareAppMessage({
        title: shareData.title,
        desc: shareData.desc,
        link: shareData.link,
        imgUrl: shareData.imgUrl,
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

    // 2.2分享到朋友圈
    wx.onMenuShareTimeline({
        title: shareData.title,
        desc: shareData.desc,
        link: shareData.link,
        imgUrl: shareData.imgUrl,
        trigger: function (res) {
            //alert('用户点击分享到朋友圈');
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

wx.error(function (res) {
    //alert(res.errMsg);
});
/*按照官方文档所述方法进行分享 end*/