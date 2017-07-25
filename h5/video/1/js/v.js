// 微信视频Hack方案
;void function (win, doc, undefined) {
    // 原理：调用链中的某个事件被标识为用户事件而非系统事件
    // 进而导致浏览器以为是用户触发播放而允许播放
    HTMLVideoElement.prototype._play = HTMLVideoElement.prototype.play;
    function wxPlayVideo(video) {
        // <summary>
        // 微信播放Hack
        // </summary>
        // <param name="video" type="HTMLVideoElement">视频标签对象</param>

        WeixinJSBridge.invoke('getNetworkType', {}, function (e) {
            video._play();
        });
    }

    function play() {
        var self = this;

        self._play();

        var evtFns = [];

        try {
            wxPlayVideo(self);
            return;
        } catch (ex) {
            evtFns.push("WeixinJSBridgeReady", function evt() {
                wxPlayVideo(self);
                for (var i = 0; i < evtFns.length; i += 2) document.removeEventListener(evtFns[i], evtFns[i + 1], false);
            });
            document.addEventListener("WeixinJSBridgeReady", evtFns[evtFns.length - 1], false);
        }
    }

    HTMLVideoElement.prototype.play = play;
}(window, document);