
var dataForWeixin={
  appId:  "",
  img:  "http://114.215.183.41:8082/2015/zhengrong/share.png",
  url:  "http://114.215.183.41:8082/2015/zhengrong/",
  title:  "2015 �ɻ�������",
  desc: "���١��Ҹ��ǰ�",
  fakeid: "",
};
(function(){
  var onBridgeReady=function(){
    // ���͸�����; 
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
    // ��������Ȧ;
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