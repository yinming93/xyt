var dataForWeixin={
  appId:  "",
  img:  "http://xyt.xy-tang.com/wls/zhyx/share.png",
  url:  "http://xyt.xy-tang.com/wls/zhyx/",
  title:  "中航·樾玺",
  desc: "向传奇致敬！",
  fakeid: "",
};
(function(){
  var onBridgeReady=function(){
    // 发送给好友; 
    WeixinJSBridge.on('menu:share:appmessage', function(argv){
      WeixinJSBridge.invoke('sendAppMessage',{
        "appid":    dataForWeixin.appId,
        "img_url":    dataForWeixin.img,
        "img_width":  "120",
        "img_height": "120",
        "link":       dataForWeixin.url,
        "desc":       dataForWeixin.desc,
        "title":      dataForWeixin.title
      }, function(res){});
    });
    // 分享到朋友圈;
    WeixinJSBridge.on('menu:share:timeline', function(argv){
      WeixinJSBridge.invoke('shareTimeline',{
      "img_url":dataForWeixin.img,
      "img_width":"120",
      "img_height":"120",
      "link":dataForWeixin.url,
      "desc":dataForWeixin.desc,
      "title":dataForWeixin.title
      }, function(res){});
    });
  };
  if(document.addEventListener){
    document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
  }else if(document.attachEvent){
    document.attachEvent('WeixinJSBridgeReady'   , onBridgeReady);
    document.attachEvent('onWeixinJSBridgeReady' , onBridgeReady);
  }
})();
$(function(){
	var width=$(document).width()/2-10;
//	alert(width);
	$('.left').css("right",width).click(function(){
		window.location.href='../index2.html';
	});
})

