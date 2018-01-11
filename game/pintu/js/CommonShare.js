/*在引用该文件之前需先引用JQuery*/

$.ajax({
    type: 'post',
    url: '../../Common/WxJsHandler.ashx',
    data: {
        "flag": "GetShareSignature",
        "url": window.location.href,
    },
    dataType: 'text',
    contentType: "application/x-www-form-urlencoded; charset=utf-8",
    success: function (msg) {
		var obj = eval('(' + msg + ')');
        wx.config({
            debug: false,
            appId: obj.appId,
            timestamp: obj.timestamp,
            nonceStr: obj.nonceStr,
            signature: obj.signature,
            jsApiList: [
              'checkJsApi',
              'onMenuShareTimeline',
              'onMenuShareAppMessage',
              'onMenuShareQQ',
              'onMenuShareWeibo',
              'hideMenuItems',
              'showMenuItems',
              'hideAllNonBaseMenuItem',
              'showAllNonBaseMenuItem',
              'translateVoice',
              'startRecord',
              'stopRecord',
              'onRecordEnd',
              'playVoice',
              'pauseVoice',
              'stopVoice',
              'uploadVoice',
              'downloadVoice',
              'chooseImage',
              'previewImage',
              'uploadImage',
              'downloadImage',
              'getNetworkType',
              'openLocation',
              'getLocation',
              'hideOptionMenu',
              'showOptionMenu',
              'closeWindow',
              'scanQRCode',
              'chooseWXPay',
              'openProductSpecificView',
              'addCard',
              'chooseCard',
              'openCard'
            ]
        });
    },
    error: function (msg) {
        console.log("error：" + msg);
    }
})

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
            pv("share");
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
            pv("share");
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

function _log(text){
	var log = '<p id="log" style="position:fixed;top:0;left:0;z-index:5000">'+ text +'</p>';
	$('body').append(log);
    console.log(text);
}

//5音频接口--------------------------------------------------
//5.1开始录音接口
function startRecord() {
    wx.ready(function () {
        wx.startRecord({
            cancel: function () {
                alert('用户拒绝授权录音');
            }
        });
    });
}
//5.2停止录音接口
function stopRecord() {
    wx.ready(function () {
        wx.stopRecord({
            success: function (res) {
                voice.localId = res.localId;
                uploadVoice();
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });
    });
}
//5.3 监听录音自动停止接口
function onVoiceRecordEnd() {
    wx.ready(function () {
        wx.onVoiceRecordEnd({
            complete: function (res) {
                voice.localId = res.localId;
                uploadVoice();
                alert('录音时间已超过一分钟');
            }
        });
    });
}
//5.4 播放语音接口
function playVoice() {
    wx.ready(function () {
        if (voice.localId == "") {
            alert('请先使用【点击录音】录制一段声音');
            return;
        }
        wx.playVoice({
            localId: voice.localId
        });
    });
};
//5.8上传语音接口
function uploadVoice() {
    wx.ready(function () {
        wx.uploadVoice({
            localId: voice.localId,
            success: function (res) {
                //alert('上传语音成功，serverId 为' + res.serverId);
                voice.serverId = res.serverId;
				//_log(voice.serverId);
            }
        });
    });
};

/*
当分享的文字需要实时变化时，可再适当的时候调用该function
*/
function wechatReady() {
    wx.ready(function () {
        wx.onMenuShareTimeline({ //分享到朋友圈
            title: shareData.title,
            link: shareData.link,
            imgUrl: shareData.imgUrl,
            trigger: function (res) {
                //alert('用户点击分享到朋友圈');
                pv("share");
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
        wx.onMenuShareAppMessage({ //分享给朋友
            title: shareData.title,
            desc: shareData.desc,
            link: shareData.link,
            imgUrl: shareData.imgUrl,
            trigger: function (res) {
                //alert('用户点击发送给朋友');
                pv("share");
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
}

pv("view");//此句为自动执行，页面打开即该页面的浏览量+1

/*
pv统计
*/
function pv(type) {
    pageMark = ""; //项目标识
    proName = ""; //项目名称
    linkaddress = window.location.href;
    //console.log(linkaddress);
    li = linkaddress.split("/");
    //console.log(li);
    if (li.length >= 6 && (li[2].toString() == "youhudong.cn" || li[2].toString() == "magical.net.cn")) {
        pageMark = li[3].toString() + "_" + li[4].toString();
        //console.log(pageMark);
        proName = "【" + document.title + "】";
        //console.log(proName);
        //更新友互动的PV数据
        $.ajax({
            type: 'post',
            url: '../../Common/pvHandler.ashx',
            data: {
                "proName": proName,
                "pageMark": pageMark,
                "type": type,
                "url": window.location.href
            },
            dataType: 'text',
            contentType: "application/x-www-form-urlencoded; charset=utf-8",
            success: function (msg) {
                //console.log("msg=" + msg);
            },
            error: function (msg) {
                //console.log("error：" + msg);
            }
        })
    }
}


