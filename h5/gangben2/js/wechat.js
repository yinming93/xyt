 $(function() {
	window.share = {
		imgUrl : window.userimg ? window.userimg : window.location.origin + "/images/shareimg.jpg",
		link : window.location.origin,
		title : window.shareTitle ? window.shareTitle : "学会这几招，轻松让ta跪地求饶",
		desc : "朋友~爱爱姿势足够好，就能赢大奖，我也是极猛的！"
		}
	
		shareConfig();
	});
	
	function shareConfig(){
        //alert(JSON.stringify(window.share));
		 $.getJSON('a.php?act=jsticket',
        { 'strURL' :  location.href },
        function(data)
        {
		
            wx.config({
                debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
                appId: data.appid, // 必填，公众号的唯一标识
                timestamp: data.timestamp, // 必填，生成签名的时间戳
                nonceStr: data.nonceStr, // 必填，生成签名的随机串
                signature: data.signature,// 必填，签名，见附录1
                jsApiList: [
                    'checkJsApi',
                    'onMenuShareTimeline',
                    'onMenuShareAppMessage'
                ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
            });

            wx.ready(function () {
                wxcheck();
                function wxcheck(){
                    wx.checkJsApi({
                        jsApiList: [
                            'onMenuShareTimeline',
                            'onMenuShareAppMessage'
                        ],
                        success: function (res) {
                            //alert(JSON.stringify(res));

                        }
                    });
                }

                wx.onMenuShareTimeline({
                    imgUrl : window.share.imgUrl,
                    link : window.share.link,
                    title : window.share.title,
                    desc : window.share.title,
                    success: function () {
                        // 用户确认分享后执行的回调函数
                        if(_hmt){
                            _hmt.push(['_trackEvent','click', "分享朋友圈"]);
                        }
                    },
                    cancel: function () {
                        // 用户取消分享后执行的回调函数
                    }
                });

                wx.onMenuShareAppMessage({
                    imgUrl : window.share.imgUrl,
                    link : window.share.link,
                    title : window.share.title,
                    desc : window.share.desc,
                    trigger: function (res) {
                        //	alert('用户点击分享到朋友圈');
                    },
                    success: function (res) {
                        //	alert('已分享');
                        if(_hmt){
                            _hmt.push(['_trackEvent','click', "分享朋友"]);
                        }
                    },
                    cancel: function (res) {
                        //	alert('已取消');
                    },
                    fail: function (res) {
                        //	alert(JSON.stringify(res));
                    }
                });

            });
        });

			
		}
	
		
		



