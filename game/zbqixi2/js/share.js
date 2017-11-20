var url1 = location.href.split('#')[0];
$.ajax({
	type: 'GET',
	url: '../../api/sample.php',
	dataType: 'json',
	data: {
		appid: "",
		secret: "",
		url1: url1,
	},
	error: function(XMLHttpRequest, textStatus, errorThrown) {
		//alert("请求对象" + XMLHttpRequest);
		//alert("错误类型" + textStatus);
		//alert("异常对象" + errorThrown);
		return false;
	},
	success: function(data) {
		var appId = data.appId;
		var timestamp = data.timestamp;
		var nonceStr = data.nonceStr;
		var signature = data.signature;
		wx.config({
			debug: false,
			appId: appId,
			timestamp: timestamp,
			nonceStr: nonceStr,
			signature: signature,
			jsApiList: ['onMenuShareQQ','onMenuShareQZone','onMenuShareTimeline', 'onMenuShareAppMessage']
		});
		wx.ready(function() {

			wx.onMenuShareQQ({
	
				title: '七夕装逼新攻略：龙湖邀你上头条！', // 分享标题
				link: 'http://www.cdunited.cn/longhu/lhqixi', // 分享链接
				imgUrl: 'http://www.cdunited.cn/longhu/lhqixi/img/share.jpg', // 分享图标
				desc: '七夕我们来上头条吧，单身狗、恩爱狗速来',
				success: function() {
					
					
					// 用户确认分享后执行的回调函数
				},
				cancel: function() {
					// 用户取消分享后执行的回调函数
					
				}
			});
	   wx.onMenuShareQZone({
				title: '七夕装逼新攻略：龙湖邀你上头条！', // 分享标题
				link: 'http://www.cdunited.cn/longhu/lhqixi', // 分享链接
				imgUrl: 'http://www.cdunited.cn/longhu/lhqixi/img/share.jpg', // 分享图标
				desc: '七夕我们来上头条吧，单身狗、恩爱狗速来',
				success: function() {
					
					// 用户确认分享后执行的回调函数
				},
				cancel: function() {
					// 用户取消分享后执行的回调函数
					
				}
			});
			// 在这里调用 API
			wx.onMenuShareTimeline({
	
				title: '七夕装逼新攻略：龙湖邀你上头条！', // 分享标题
				link: 'http://www.cdunited.cn/longhu/lhqixi', // 分享链接
				imgUrl: 'http://www.cdunited.cn/longhu/lhqixi/img/share.jpg', // 分享图标
				desc: '七夕我们来上头条吧，单身狗、恩爱狗速来',
				success: function() {
					
					// 用户确认分享后执行的回调函数
				},
				cancel: function() {
					// 用户取消分享后执行的回调函数
					
				}
			});
			wx.onMenuShareAppMessage({
	
				title: '七夕装逼新攻略：龙湖邀你上头条！', // 分享标题
				link: 'http://www.cdunited.cn/longhu/lhqixi', // 分享链接
				imgUrl: 'http://www.cdunited.cn/longhu/lhqixi/img/share.jpg', // 分享图标
				desc: '七夕我们来上头条吧，单身狗、恩爱狗速来',
				type: '', // 分享类型,music、video或link，不填默认为link
				dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
				success: function() {
					
					// 用户确认分享后执行的回调函数
				},
				cancel: function() {
					// 用户取消分享后执行的回调函数
					
				}
			});
		});
	}
});