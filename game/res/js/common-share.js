/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].e;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			e: {},
/******/ 			i: moduleId,
/******/ 			l: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.e, module, module.e, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.l = true;

/******/ 		// Return the exports of the module
/******/ 		return module.e;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 32);
/******/ })
/************************************************************************/
/******/ ({

/***/ 0:
/***/ function(module, exports) {

	module.e = $;

/***/ },

/***/ 11:
/***/ function(module, exports) {

	module.e = DPApp;

/***/ },

/***/ 14:
/***/ function(module, exports, __webpack_require__) {

	
	var DPApp = __webpack_require__(11);
	var $ = __webpack_require__(0);

	// require('./wxlib/jweixin-1.0.0');
	__webpack_require__(21);

	var env = __webpack_require__(20);
	var constant = env.constant;

	var develop = '//tcps.51ping.com/weixin/config.js?apis=onMenuShareTimeline,onMenuShareAppMessage,onMenuShareQQ,onMenuShareQZone,onMenuShareWeibo,getLocation';
	var debug = location.search.indexOf('debug=true') != -1;
	if (debug) {
		develop = '//tcps.51ping.com/weixin/config.js?debug=true&apis=onMenuShareTimeline,onMenuShareAppMessage,onMenuShareQQ,onMenuShareQZone,onMenuShareWeibo,getLocation';
	}

	env.putCustom('wxConfigUrl', {
		d: develop,
		p: '//cps.dianping.com/weixin/config.js?apis=onMenuShareTimeline,onMenuShareAppMessage,onMenuShareQQ,onMenuShareQZone,onMenuShareWeibo,getLocation'
	});

	$('body').append($('<script></script>').attr('src', constant.wxConfigUrl));

	var defaultOption = {
		feed: [DPApp.Share.WECHAT_FRIENDS, DPApp.Share.WECHAT_TIMELINE, DPApp.Share.WEIBO, DPApp.Share.QQ, DPApp.Share.QZONE, DPApp.Share.SMS, DPApp.Share.EMAIL, DPApp.Share.COPY],
		wx_feed: ['WECHAT_FRIENDS', 'WECHAT_TIMELINE', 'QQ', 'QZONE', 'WEIBO'],
		wx_arrawtext: '点击右上角分享给好友或朋友圈',
		wx_arrawhtml: ''
	};

	var wxFeedMethodMap = {
		'WECHAT_FRIENDS': 'onMenuShareAppMessage',
		'WECHAT_TIMELINE': 'onMenuShareTimeline',
		'QQ': 'onMenuShareQQ',
		'QZONE': 'onMenuShareQZone',
		'WEIBO': 'onMenuShareWeibo'
	};

	var mergeOption = function mergeOption(option) {
		var mainOption = $.extend({}, defaultOption, option);
		mainOption.url && (mainOption.link = mainOption.url);
		mainOption.image && (mainOption.imgUrl = mainOption.image);
		mainOption.fail && (mainOption.cancel = mainOption.fail);
		return mainOption;
	};

	// 全部分享
	var shareAll = function shareAll(option) {
		var mainOption = mergeOption(option);
		_shareApp(mainOption);
		_shareWX(mainOption);
	};

	// 主app分享
	var shareApp = function shareApp(option) {
		var mainOption = mergeOption(option);
		_shareApp(mainOption);
	};

	var _shareApp = function _shareApp(mainOption) {
		DPApp.ready(function () {
			DPApp.initShare && DPApp.initShare(mainOption);
		});
	};

	// 微信分享
	var shareWX = function shareWX(option) {
		var mainOption = mergeOption(option);
		_shareWX(mainOption);
	};

	var _shareWX = function _shareWX(mainOption) {
		wx.ready(function () {
			var wxFeeds = mainOption.wx_feed;
			wxFeeds.forEach(function (v) {
				var method = wxFeedMethodMap[v];
				wx[method](mainOption);
			});

			wx.error(function (res) {
				// alert(JSON.stringify(res));
			});
		});
	};

	var wxArrawImg = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMUAAAEFBAMAAAChiT7DAAAALVBMVEUAAAD///////////////////////////////////////////////////////+hSKubAAAADnRSTlMAEHvvukAw35/PYCBQjyNYK6oAAARiSURBVHja7dvfC0txGMfx9zm2mR10ComQ/IjCwoX8XJS4kSYUkhZJbkThQtIoN2hRuJImSbnQxCVywYUbITdSCxvb/Hj+Bj/mV8PsnO2DcV53u1hP356nzvf79DxopB5OXoVawayy9OHkLEJJa6otneCjUrBP5iPjWlMth85l+2gJQjH74C1CNzL2XqWIzhqrfQgyB501Vs2aWcNHJmX1UtzM8ug4c0u4Zq8Qi1klh9hQO4HapjoyOZrSRVSuvaZpGSqDMwsRcwqNHGLbbDxiqcwe1ApVHzEvMx65rUQiPTVKX7bO2VmojdJ/WJ2zc2gVHeOHkvpjUJ6D3KgikUjfSaC3ZTFqzgF9jFjNRy39ErWEjUdtVBW58izU4pZFLfkWvXNEIpEfcW8ht+klcivzqKUqPmoDnyOX3oWakymi5jaQu/oCufRi5FI5IpHInzL4MHKDniO3aRZyhTxqnpVQc6vIDXyF3L2dyK0czw/0XcqdqUT+TlvX+ih5M5abNRsmmyej4ZrZ7qU5gLQ1jpQQSBxayyebl5s1ntBTd2g1YpK9pIe8KVW+N+Y+PeNUC7YILddsBVpewY7yc3ezdC/VPrdn6z7dO7uTNsbaQrpXaF8/660H9ZXJ0Y5T7n56LFH55TjOXro0pM4vbG8QnnMKGPSGX3CWEd62GuAuQSiR2YvaloaPWCJzArWr+mM4Z/XHiAVrH5YIIR6oqGKvkYvVkYubT2gTfP0TJZOjI5d3EpZXoTMDXhJWqkpnks8Ja0infx3cIKDRX2ryBZ1xjIDSeZqGPqNDB7IE4mWyNO3ouFwu+ASSrH4pycWI3PyShfR4RL721lcW0XC+pIMRPhpujZ/ro1bS7+gers/z/7rkI3cgh5pnyA2uEpI7Hvl3cOhTOjTwhT7Gjpn6GOU8AaTOhYlx4BYBDHwRIka8QhDjnoaIkaoTxL3jIWJwhSDS91tiCKy8pY9hJXmMeO3bH1kU3DpysVfIDX2NnJMlsFXIJdrN2/bRoGphFmopy6K26TldcRd30EvL05WBb/iVkQ1f3d0leC/Nb+1S+/zC+RwBzSu13AWK9NrgWutXcSe9NqR1YHrYK3pt4Bv5+/P7K6XTshcqmaxLt7nIOrcI4Wzxuwy1Kc3VcwjOC9TeHGun1cMq8QNvfYIbFKBSvZW1LCEMPkinnIn2ALGkLaOnSnzHO0NPubORi9k+H7WLNjfHZ/HHJRQuWuUwH214ZKrdonWZ5wCDzax2zEcjMQ0gbienl9ByfLqT3I/cuJfIpY8jd7aIVvO+ppas8yNRypsEV9tftbn0NhKJRP6Y4VkEgryR+2cbrYbcsFfIlRej5lkWtWSVn+ujtdZCHrmUTyQS+ZE7yHmZW6jFqsilF6CWsCJqI6vIrdyFmms51HY8R257np/5expSkUgLD70teX6qjxY8/pE9lfP6Y6RsCWrlOu30y743Y4j8Ry6WUFtj9xFbY7MRu211H60pVi8hVp5dQu06cu8AS3xanNZfwcgAAAAASUVORK5CYII=';
	var shareText = '点击右上角分享给好友或朋友圈';
	var $shareIt = $('<div class="share-it"></div>').css({
		'-webkit-user-select': 'none',
		'position': 'fixed',
		'width': '100%',
		'height': '100%',
		'background': 'rgba(0,0,0,0.85)',
		'top': 0,
		'left': 0,
		'z-index': 9999,
		'text-align': 'center',
		'color': '#fff'

	}).append($('<div></div>').css({
		'position': 'absolute',
		'right': '40px',
		'top': '20px',
		'width': '120px',
		'height': '160px',
		'background': 'url(' + wxArrawImg + ') no-repeat',
		'background-size': 'cover'
	})).append($('<p class="arraw-text">' + '' + '</p>').css({
		'position': 'absolute',
		'top': '200px',
		'color': '#fff',
		'width': '100%',
		'font-size': '20px'
	}));

	var active = function active(option) {
		var mainOption = mergeOption(option);
		if (mainOption.wx_test || constant.wxFlag) {
			activeWX(mainOption);
		} else {
			DPApp.ready(function () {
				DPApp.share(mainOption);
			});
		}
	};

	var activeWX = function activeWX(mainOption) {
		_shareWX(mainOption);
		if (mainOption.wx_arrawhtml) {
			$shareIt.html(mainOption.wx_arrawhtml);
		} else {
			$shareIt.children('.arraw-text').html(mainOption.wx_arrawtext);
		}
		$('body').append($shareIt);
		$shareIt.one('click', function (e) {
			$(this).remove();
		});
	};

	module.e = {
		shareAll: shareAll,
		shareApp: shareApp,
		shareWX: shareWX,
		active: active,
		activeWX: activeWX,

		initShare: shareAll,
		share: active
	};

/***/ },

/***/ 20:
/***/ function(module, exports, __webpack_require__) {

	var constant = {};

	var mainName = '51ping';
	var productEnv = false;

	var origin = location.origin;
	var pingIndex = origin.indexOf('dianping');
	if (pingIndex >= 0 || origin.indexOf('nugget.data.dp') >= 0) {
		mainName = 'dianping';
		productEnv = true;
	}

	var isDianPing = function isDianPing() {
		return DPApp.getUA() ? DPApp.getUA().appName : null;
	};
	var isWebChat = function isWebChat() {
		var ua = window.navigator.userAgent.toLowerCase();
		return ua.match(/MicroMessenger/i) == 'micromessenger';
	};

	if (isDianPing()) {
		constant.dpFlag = true;
	} else if (isWebChat()) {
		constant.wxFlag = true;
	}

	var putRegular = function putRegular(k, v) {
		if (productEnv) {
			v = v.replace('51ping', 'dianping');
		} else {
			v = v.replace('dianping', '51ping');
		}
		constant[k] = v;
	};

	var putCustom = function putCustom(k, obj) {
		var v = '';
		if (productEnv) {
			v = obj.p;
		} else {
			v = obj.d;
		}
		constant[k] = v;
	};

	module.e = {
		putRegular: putRegular,
		putCustom: putCustom,
		constant: constant

	};

/***/ },

/***/ 21:
/***/ function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;!function (a, b) {
	     true ? !(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	        return b(a);
	    }.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.e = __WEBPACK_AMD_DEFINE_RESULT__)) : b(a, !0);
	}(window, function (a, b) {
	    function c(b, c, d) {
	        a.WeixinJSBridge ? WeixinJSBridge.invoke(b, e(c), function (a) {
	            g(b, a, d);
	        }) : j(b, d);
	    }
	    function d(b, c, d) {
	        a.WeixinJSBridge ? WeixinJSBridge.on(b, function (a) {
	            d && d.trigger && d.trigger(a), g(b, a, c);
	        }) : d ? j(b, d) : j(b, c);
	    }
	    function e(a) {
	        return a = a || {}, a.appId = E.appId, a.verifyAppId = E.appId, a.verifySignType = "sha1", a.verifyTimestamp = E.timestamp + "", a.verifyNonceStr = E.nonceStr, a.verifySignature = E.signature, a;
	    }
	    function f(a) {
	        return {
	            "timeStamp": a["timestamp"] + "",
	            "nonceStr": a["nonceStr"],
	            "package": a["package"],
	            "paySign": a["paySign"],
	            "signType": a["signType"] || "SHA1"
	        };
	    }
	    function g(a, b, c) {
	        var d, e, f;
	        switch (delete b.err_code, delete b.err_desc, delete b.err_detail, d = b.errMsg, d || (d = b.err_msg, delete b.err_msg, d = h(a, d), b.errMsg = d), c = c || {}, c._complete && (c._complete(b), delete c._complete), d = b.errMsg || "", E.debug && !c.isInnerInvoke && alert(JSON.stringify(b)), e = d.indexOf(":"), f = d.substring(e + 1)) {
	            case "ok":
	                c.success && c.success(b);
	                break;
	            case "cancel":
	                c.cancel && c.cancel(b);
	                break;
	            default:
	                c.fail && c.fail(b);
	        }
	        c.complete && c.complete(b);
	    }
	    function h(a, b) {
	        var e,
	            f,
	            c = a,
	            d = p[c];
	        return d && (c = d), e = "ok", b && (f = b.indexOf(":"), e = b.substring(f + 1), "confirm" == e && (e = "ok"), "failed" == e && (e = "fail"), -1 != e.indexOf("failed_") && (e = e.substring(7)), -1 != e.indexOf("fail_") && (e = e.substring(5)), e = e.replace(/_/g, " "), e = e.toLowerCase(), ("access denied" == e || "no permission to execute" == e) && (e = "permission denied"), "config" == c && "function not exist" == e && (e = "ok"), "" == e && (e = "fail")), b = c + ":" + e;
	    }
	    function i(a) {
	        var b, c, d, e;
	        if (a) {
	            for (b = 0, c = a.length; c > b; ++b) {
	                d = a[b], e = o[d], e && (a[b] = e);
	            }return a;
	        }
	    }
	    function j(a, b) {
	        if (!(!E.debug || b && b.isInnerInvoke)) {
	            var c = p[a];
	            c && (a = c), b && b._complete && delete b._complete, console.log('"' + a + '",', b || "");
	        }
	    }
	    function k() {
	        0 != D.preVerifyState && (u || v || E.debug || "6.0.2" > z || D.systemType < 0 || A || (A = !0, D.appId = E.appId, D.initTime = C.initEndTime - C.initStartTime, D.preVerifyTime = C.preVerifyEndTime - C.preVerifyStartTime, H.getNetworkType({
	            isInnerInvoke: !0,
	            success: function success(a) {
	                var b, c;
	                D.networkType = a.networkType, b = "http://open.weixin.qq.com/sdk/report?v=" + D.version + "&o=" + D.preVerifyState + "&s=" + D.systemType + "&c=" + D.clientVersion + "&a=" + D.appId + "&n=" + D.networkType + "&i=" + D.initTime + "&p=" + D.preVerifyTime + "&u=" + D.url, c = new Image(), c.src = b;
	            }
	        })));
	    }
	    function l() {
	        return new Date().getTime();
	    }
	    function m(b) {
	        w && (a.WeixinJSBridge ? b() : q.addEventListener && q.addEventListener("WeixinJSBridgeReady", b, !1));
	    }
	    function n() {
	        H.invoke || (H.invoke = function (b, c, d) {
	            a.WeixinJSBridge && WeixinJSBridge.invoke(b, e(c), d);
	        }, H.on = function (b, c) {
	            a.WeixinJSBridge && WeixinJSBridge.on(b, c);
	        });
	    }
	    var o, p, q, r, s, t, u, v, w, x, y, z, A, B, C, D, E, F, G, H;
	    if (!a.jWeixin) return o = {
	        config: "preVerifyJSAPI",
	        onMenuShareTimeline: "menu:share:timeline",
	        onMenuShareAppMessage: "menu:share:appmessage",
	        onMenuShareQQ: "menu:share:qq",
	        onMenuShareWeibo: "menu:share:weiboApp",
	        onMenuShareQZone: "menu:share:QZone",
	        previewImage: "imagePreview",
	        getLocation: "geoLocation",
	        openProductSpecificView: "openProductViewWithPid",
	        addCard: "batchAddCard",
	        openCard: "batchViewCard",
	        chooseWXPay: "getBrandWCPayRequest"
	    }, p = function () {
	        var b,
	            a = {};
	        for (b in o) {
	            a[o[b]] = b;
	        }return a;
	    }(), q = a.document, r = q.title, s = navigator.userAgent.toLowerCase(), t = navigator.platform.toLowerCase(), u = !(!t.match("mac") && !t.match("win")), v = -1 != s.indexOf("wxdebugger"), w = -1 != s.indexOf("micromessenger"), x = -1 != s.indexOf("android"), y = -1 != s.indexOf("iphone") || -1 != s.indexOf("ipad"), z = function () {
	        var a = s.match(/micromessenger\/(\d+\.\d+\.\d+)/) || s.match(/micromessenger\/(\d+\.\d+)/);
	        return a ? a[1] : "";
	    }(), A = !1, B = !1, C = {
	        initStartTime: l(),
	        initEndTime: 0,
	        preVerifyStartTime: 0,
	        preVerifyEndTime: 0
	    }, D = {
	        version: 1,
	        appId: "",
	        initTime: 0,
	        preVerifyTime: 0,
	        networkType: "",
	        preVerifyState: 1,
	        systemType: y ? 1 : x ? 2 : -1,
	        clientVersion: z,
	        url: encodeURIComponent(location.href)
	    }, E = {}, F = {
	        _completes: []
	    }, G = {
	        state: 0,
	        data: {}
	    }, m(function () {
	        C.initEndTime = l();
	    }), H = {
	        config: function config(a) {
	            E = a, j("config", a);
	            var b = E.check === !1 ? !1 : !0;
	            m(function () {
	                var a, d, e;
	                if (b) c(o.config, {
	                    verifyJsApiList: i(E.jsApiList)
	                }, function () {
	                    F._complete = function (a) {
	                        C.preVerifyEndTime = l(), G.state = 1, G.data = a;
	                    }, F.success = function () {
	                        D.preVerifyState = 0;
	                    }, F.fail = function (a) {
	                        F._fail ? F._fail(a) : G.state = -1;
	                    };
	                    var a = F._completes;
	                    return a.push(function () {
	                        k();
	                    }), F.complete = function () {
	                        for (var c = 0, d = a.length; d > c; ++c) {
	                            a[c]();
	                        }F._completes = [];
	                    }, F;
	                }()), C.preVerifyStartTime = l();else {
	                    for (G.state = 1, a = F._completes, d = 0, e = a.length; e > d; ++d) {
	                        a[d]();
	                    }F._completes = [];
	                }
	            }), E.beta && n();
	        },
	        ready: function ready(a) {
	            0 != G.state ? a() : (F._completes.push(a), !w && E.debug && a());
	        },
	        error: function error(a) {
	            "6.0.2" > z || B || (B = !0, -1 == G.state ? a(G.data) : F._fail = a);
	        },
	        checkJsApi: function checkJsApi(a) {
	            var b = function b(a) {
	                var c,
	                    d,
	                    b = a.checkResult;
	                for (c in b) {
	                    d = p[c], d && (b[d] = b[c], delete b[c]);
	                }return a;
	            };
	            c("checkJsApi", {
	                jsApiList: i(a.jsApiList)
	            }, function () {
	                return a._complete = function (a) {
	                    if (x) {
	                        var c = a.checkResult;
	                        c && (a.checkResult = JSON.parse(c));
	                    }
	                    a = b(a);
	                }, a;
	            }());
	        },
	        onMenuShareTimeline: function onMenuShareTimeline(a) {
	            d(o.onMenuShareTimeline, {
	                complete: function complete() {
	                    c("shareTimeline", {
	                        title: a.title || r,
	                        desc: a.title || r,
	                        img_url: a.imgUrl || "",
	                        link: a.link || location.href,
	                        type: a.type || "link",
	                        data_url: a.dataUrl || ""
	                    }, a);
	                }
	            }, a);
	        },
	        onMenuShareAppMessage: function onMenuShareAppMessage(a) {
	            d(o.onMenuShareAppMessage, {
	                complete: function complete() {
	                    c("sendAppMessage", {
	                        title: a.title || r,
	                        desc: a.desc || "",
	                        link: a.link || location.href,
	                        img_url: a.imgUrl || "",
	                        type: a.type || "link",
	                        data_url: a.dataUrl || ""
	                    }, a);
	                }
	            }, a);
	        },
	        onMenuShareQQ: function onMenuShareQQ(a) {
	            d(o.onMenuShareQQ, {
	                complete: function complete() {
	                    c("shareQQ", {
	                        title: a.title || r,
	                        desc: a.desc || "",
	                        img_url: a.imgUrl || "",
	                        link: a.link || location.href
	                    }, a);
	                }
	            }, a);
	        },
	        onMenuShareWeibo: function onMenuShareWeibo(a) {
	            d(o.onMenuShareWeibo, {
	                complete: function complete() {
	                    c("shareWeiboApp", {
	                        title: a.title || r,
	                        desc: a.desc || "",
	                        img_url: a.imgUrl || "",
	                        link: a.link || location.href
	                    }, a);
	                }
	            }, a);
	        },
	        onMenuShareQZone: function onMenuShareQZone(a) {
	            d(o.onMenuShareQZone, {
	                complete: function complete() {
	                    c("shareQZone", {
	                        title: a.title || r,
	                        desc: a.desc || "",
	                        img_url: a.imgUrl || "",
	                        link: a.link || location.href
	                    }, a);
	                }
	            }, a);
	        },
	        startRecord: function startRecord(a) {
	            c("startRecord", {}, a);
	        },
	        stopRecord: function stopRecord(a) {
	            c("stopRecord", {}, a);
	        },
	        onVoiceRecordEnd: function onVoiceRecordEnd(a) {
	            d("onVoiceRecordEnd", a);
	        },
	        playVoice: function playVoice(a) {
	            c("playVoice", {
	                localId: a.localId
	            }, a);
	        },
	        pauseVoice: function pauseVoice(a) {
	            c("pauseVoice", {
	                localId: a.localId
	            }, a);
	        },
	        stopVoice: function stopVoice(a) {
	            c("stopVoice", {
	                localId: a.localId
	            }, a);
	        },
	        onVoicePlayEnd: function onVoicePlayEnd(a) {
	            d("onVoicePlayEnd", a);
	        },
	        uploadVoice: function uploadVoice(a) {
	            c("uploadVoice", {
	                localId: a.localId,
	                isShowProgressTips: 0 == a.isShowProgressTips ? 0 : 1
	            }, a);
	        },
	        downloadVoice: function downloadVoice(a) {
	            c("downloadVoice", {
	                serverId: a.serverId,
	                isShowProgressTips: 0 == a.isShowProgressTips ? 0 : 1
	            }, a);
	        },
	        translateVoice: function translateVoice(a) {
	            c("translateVoice", {
	                localId: a.localId,
	                isShowProgressTips: 0 == a.isShowProgressTips ? 0 : 1
	            }, a);
	        },
	        chooseImage: function chooseImage(a) {
	            c("chooseImage", {
	                scene: "1|2",
	                count: a.count || 9,
	                sizeType: a.sizeType || ["original", "compressed"],
	                sourceType: a.sourceType || ["album", "camera"]
	            }, function () {
	                return a._complete = function (a) {
	                    if (x) {
	                        var b = a.localIds;
	                        b && (a.localIds = JSON.parse(b));
	                    }
	                }, a;
	            }());
	        },
	        previewImage: function previewImage(a) {
	            c(o.previewImage, {
	                current: a.current,
	                urls: a.urls
	            }, a);
	        },
	        uploadImage: function uploadImage(a) {
	            c("uploadImage", {
	                localId: a.localId,
	                isShowProgressTips: 0 == a.isShowProgressTips ? 0 : 1
	            }, a);
	        },
	        downloadImage: function downloadImage(a) {
	            c("downloadImage", {
	                serverId: a.serverId,
	                isShowProgressTips: 0 == a.isShowProgressTips ? 0 : 1
	            }, a);
	        },
	        getNetworkType: function getNetworkType(a) {
	            var b = function b(a) {
	                var c,
	                    d,
	                    e,
	                    b = a.errMsg;
	                if (a.errMsg = "getNetworkType:ok", c = a.subtype, delete a.subtype, c) a.networkType = c;else switch (d = b.indexOf(":"), e = b.substring(d + 1)) {
	                    case "wifi":
	                    case "edge":
	                    case "wwan":
	                        a.networkType = e;
	                        break;
	                    default:
	                        a.errMsg = "getNetworkType:fail";
	                }
	                return a;
	            };
	            c("getNetworkType", {}, function () {
	                return a._complete = function (a) {
	                    a = b(a);
	                }, a;
	            }());
	        },
	        openLocation: function openLocation(a) {
	            c("openLocation", {
	                latitude: a.latitude,
	                longitude: a.longitude,
	                name: a.name || "",
	                address: a.address || "",
	                scale: a.scale || 28,
	                infoUrl: a.infoUrl || ""
	            }, a);
	        },
	        getLocation: function getLocation(a) {
	            a = a || {}, c(o.getLocation, {
	                type: a.type || "wgs84"
	            }, function () {
	                return a._complete = function (a) {
	                    delete a.type;
	                }, a;
	            }());
	        },
	        hideOptionMenu: function hideOptionMenu(a) {
	            c("hideOptionMenu", {}, a);
	        },
	        showOptionMenu: function showOptionMenu(a) {
	            c("showOptionMenu", {}, a);
	        },
	        closeWindow: function closeWindow(a) {
	            a = a || {}, c("closeWindow", {}, a);
	        },
	        hideMenuItems: function hideMenuItems(a) {
	            c("hideMenuItems", {
	                menuList: a.menuList
	            }, a);
	        },
	        showMenuItems: function showMenuItems(a) {
	            c("showMenuItems", {
	                menuList: a.menuList
	            }, a);
	        },
	        hideAllNonBaseMenuItem: function hideAllNonBaseMenuItem(a) {
	            c("hideAllNonBaseMenuItem", {}, a);
	        },
	        showAllNonBaseMenuItem: function showAllNonBaseMenuItem(a) {
	            c("showAllNonBaseMenuItem", {}, a);
	        },
	        scanQRCode: function scanQRCode(a) {
	            a = a || {}, c("scanQRCode", {
	                needResult: a.needResult || 0,
	                scanType: a.scanType || ["qrCode", "barCode"]
	            }, function () {
	                return a._complete = function (a) {
	                    var b, c;
	                    y && (b = a.resultStr, b && (c = JSON.parse(b), a.resultStr = c && c.scan_code && c.scan_code.scan_result));
	                }, a;
	            }());
	        },
	        openProductSpecificView: function openProductSpecificView(a) {
	            c(o.openProductSpecificView, {
	                pid: a.productId,
	                view_type: a.viewType || 0,
	                ext_info: a.extInfo
	            }, a);
	        },
	        addCard: function addCard(a) {
	            var e,
	                f,
	                g,
	                h,
	                b = a.cardList,
	                d = [];
	            for (e = 0, f = b.length; f > e; ++e) {
	                g = b[e], h = {
	                    card_id: g.cardId,
	                    card_ext: g.cardExt
	                }, d.push(h);
	            }c(o.addCard, {
	                card_list: d
	            }, function () {
	                return a._complete = function (a) {
	                    var c,
	                        d,
	                        e,
	                        b = a.card_list;
	                    if (b) {
	                        for (b = JSON.parse(b), c = 0, d = b.length; d > c; ++c) {
	                            e = b[c], e.cardId = e.card_id, e.cardExt = e.card_ext, e.isSuccess = e.is_succ ? !0 : !1, delete e.card_id, delete e.card_ext, delete e.is_succ;
	                        }a.cardList = b, delete a.card_list;
	                    }
	                }, a;
	            }());
	        },
	        chooseCard: function chooseCard(a) {
	            c("chooseCard", {
	                app_id: E.appId,
	                location_id: a.shopId || "",
	                sign_type: a.signType || "SHA1",
	                card_id: a.cardId || "",
	                card_type: a.cardType || "",
	                card_sign: a.cardSign,
	                time_stamp: a.timestamp + "",
	                nonce_str: a.nonceStr
	            }, function () {
	                return a._complete = function (a) {
	                    a.cardList = a.choose_card_info, delete a.choose_card_info;
	                }, a;
	            }());
	        },
	        openCard: function openCard(a) {
	            var e,
	                f,
	                g,
	                h,
	                b = a.cardList,
	                d = [];
	            for (e = 0, f = b.length; f > e; ++e) {
	                g = b[e], h = {
	                    card_id: g.cardId,
	                    code: g.code
	                }, d.push(h);
	            }c(o.openCard, {
	                card_list: d
	            }, a);
	        },
	        chooseWXPay: function chooseWXPay(a) {
	            c(o.chooseWXPay, f(a), a);
	        }
	    }, a.wx = a.jWeixin = H, H;
	});

/***/ },

/***/ 32:
/***/ function(module, exports, __webpack_require__) {

	
	window.commonShare = __webpack_require__(14);

/***/ }

/******/ });