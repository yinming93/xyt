 (function() {
   function getLink() {
     if (window.location.host.indexOf('dev.benbun.com') >= 0) {
       return 'http://dev.benbun.com/web/baidu/tansuocaifu/';
     } else {
       return 'http://w.benbun.com/baidu/tansuocaifu/';
     }
   }
   var link = getLink();
   if (/MicroMessenger/i.test(navigator.userAgent)) {
     $.when($.getScript("http://res.wx.qq.com/open/js/jweixin-1.0.0.js"), $.getScript("resource/js/wxshare.min.js"))
       .done(function() {
         window.wxshare.config({
           title: '你以为你以为的就是你以为的吗 ？',
           desc: '我并不这么以为',
           timelineText: '你以为你以为的就是你以为的吗 ？',
           link: link,
           imgUrl: link + 'resource/assets/share.jpg?ver=3',
           onSuccess: function() {

           }
         });
       });
   }
 })();
