var shareTitle="浓情端午粽飘香"
var descContent="端午节来啦 驿都城抢粽子大赛 赶快来参与领取你的端午节礼物吧~"
var lineLink="http://wx.guguan.net/games/YDC_run/tymengwa/app/index.php"
var imgUrl="http://wx.guguan.net/games/YDC_run/tymengwa/dist/images/share/xyds_share.jpg"


function shareFriend() {
	WeixinJSBridge.invoke('sendAppMessage',{
		"img_url": imgUrl,
		"img_width": "200",
		"img_height": "200",
		"link": lineLink,
		"desc": descContent,
		"title": shareTitle
	}, function(res) {
		//_report('send_msg', res.err_msg);
	})
}
function shareTimeline() {
	WeixinJSBridge.invoke('shareTimeline',{
		"img_url": imgUrl,
		"img_width": "200",
		"img_height": "200",
		"link": lineLink,
		"desc": descContent,
		"title": shareTitle
	}, function(res) {
		   //_report('timeline', res.err_msg);
	});
}
function shareWeibo() {
	WeixinJSBridge.invoke('shareWeibo',{
		"content": descContent,
		"url": lineLink,
	}, function(res) {
		//_report('weibo', res.err_msg);
	});
}
// 当微信内置浏览器完成内部初始化后会触发WeixinJSBridgeReady事件。
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	// 发送给好友
	WeixinJSBridge.on('menu:share:appmessage', function(argv){
		shareFriend();
	});
	// 分享到朋友圈
	WeixinJSBridge.on('menu:share:timeline', function(argv){
		shareTimeline();
	});
	// 分享到微博
	WeixinJSBridge.on('menu:share:weibo', function(argv){
		shareWeibo();
	});
}, false);