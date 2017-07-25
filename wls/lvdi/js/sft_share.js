
var wx_appId = "wx50ab73665aab3f45";
var wx_nonceStr = "renhenghaiheyuan";
var wx_timestamp = Math.round(new Date().getTime() / 1000);
var wx_ShareURL = document.URL;
var wx_signStr = "";

$.ajax({
    type: "POST",
    url: "http://wx.weisft.com/quanyu_wx_sdk/api.aspx",
    data: {
        "appId": wx_appId,
        "timestamp": wx_timestamp,
        "nonceStr": wx_nonceStr,
        "url": wx_ShareURL
    },
    success: function (data) {
        wx_signStr = data.signStr;
    },
    error: function (e) {
        //alert("请求分享接口失败，请稍后再试！");
    },
    dataType: "json",
    async: false
});

wx.config({
    debug: false,
    appId: wx_appId,
    timestamp: wx_timestamp,
    nonceStr: wx_nonceStr,
    signature: wx_signStr,
    jsApiList: [
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo',
        'hideMenuItems'
    ]
});

wx.ready(function () {

    var shareData = {
        title: wx_ShareTitle,
        desc: wx_ShareDesc,
        link: wx_RealShareURL,
        imgUrl: wx_SharePic
    };

    var shareTimelineData = {
        title: wx_Timeline_ShareTitle,
        desc: wx_ShareDesc,
        link: wx_RealShareURL,
        imgUrl: wx_SharePic
    };

    // 分享给朋友
    wx.onMenuShareAppMessage({
        title: shareData.title,
        desc: shareData.desc,
        link: shareData.link,
        imgUrl: shareData.imgUrl,
        trigger: function (res) {
            //shareData.link = wx_RealShareURL;
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

    // 分享到朋友圈
    wx.onMenuShareTimeline({
        title: shareTimelineData.title,
        link: shareTimelineData.link,
        imgUrl: shareTimelineData.imgUrl,
        trigger: function (res) {
            //shareTimelineData.link = wx_RealShareURL;
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

    //分享到QQ
    wx.onMenuShareQQ({
        title: shareData.title,
        desc: shareData.desc,
        link: shareData.link,
        imgUrl: shareData.imgUrl,
        trigger: function (res) {
            //shareData.link = wx_RealShareURL;
            //alert('用户点击分享到QQ');
        },
        complete: function (res) {
            //alert(JSON.stringify(res));
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

    // 分享到微博
    wx.onMenuShareWeibo({
        title: shareData.title,
        desc: shareData.desc,
        link: shareData.link,
        imgUrl: shareData.imgUrl,
        trigger: function (res) {
            //shareData.link = wx_RealShareURL;
            //alert('用户点击分享到微博');
        },
        complete: function (res) {
            //alert(JSON.stringify(res));
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

    //wx.onMenuShareAppMessage(shareData);
    //wx.onMenuShareTimeline(shareTimelineData);
    //wx.onMenuShareQQ(shareData);
    //wx.onMenuShareWeibo(shareData);
	
	wx.hideMenuItems({
        menuList: ["menuItem:share:qq", "menuItem:share:weiboApp", "menuItem:share:facebook", "menuItem:share:QZone", "menuItem:copyUrl", "menuItem:openWithQQBrowser", "menuItem:openWithSafari", "menuItem:share:email"] // 要隐藏的菜单项，只能隐藏“传播类”和“保护类”按钮，所有menu项见附录3
    });
	
});
wx.error(function (res) {
    //alert("分享接口繁忙，请稍后再试！");
});