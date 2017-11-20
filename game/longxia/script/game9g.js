var _czc = _czc || []; !
function(a, b) {
    "function" == typeof define && (define.amd || define.cmd) ? define(function() {
        return b(a)
    }) : b(a, !0)
} (this,
function(a, b) {
    function c(b, c, d) {
        a.WeixinJSBridge ? WeixinJSBridge.invoke(b, e(c),
        function(a) {
            g(b, a, d)
        }) : j(b, d)
    }
    function d(b, c, d) {
        a.WeixinJSBridge ? WeixinJSBridge.on(b,
        function(a) {
            d && d.trigger && d.trigger(a),
            g(b, a, c)
        }) : d ? j(b, d) : j(b, c)
    }
    function e(a) {
        return a = a || {},
        a.appId = z.appId,
        a.verifyAppId = z.appId,
        a.verifySignType = "sha1",
        a.verifyTimestamp = z.timestamp + "",
        a.verifyNonceStr = z.nonceStr,
        a.verifySignature = z.signature,
        a
    }
    function f(a) {
        return {
            timeStamp: a.timestamp + "",
            nonceStr: a.nonceStr,
            "package": a.package,
            paySign: a.paySign,
            signType: a.signType || "SHA1"
        }
    }
    function g(a, b, c) {
        var d, e, f;
        switch (delete b.err_code, delete b.err_desc, delete b.err_detail, d = b.errMsg, d || (d = b.err_msg, delete b.err_msg, d = h(a, d, c), b.errMsg = d), c = c || {},
        c._complete && (c._complete(b), delete c._complete), d = b.errMsg || "", z.debug && !c.isInnerInvoke && alert(JSON.stringify(b)), e = d.indexOf(":"), f = d.substring(e + 1)) {
        case "ok":
            c.success && c.success(b);
            break;
        case "cancel":
            c.cancel && c.cancel(b);
            break;
        default:
            c.fail && c.fail(b)
        }
        c.complete && c.complete(b)
    }
    function h(a, b) {
        var d, e, f, g;
        if (b) {
            switch (d = b.indexOf(":"), a) {
            case o.config:
                e = "config";
                break;
            case o.openProductSpecificView:
                e = "openProductSpecificView";
                break;
            default:
                e = b.substring(0, d),
                e = e.replace(/_/g, " "),
                e = e.replace(/\b\w+\b/g,
                function(a) {
                    return a.substring(0, 1).toUpperCase() + a.substring(1)
                }),
                e = e.substring(0, 1).toLowerCase() + e.substring(1),
                e = e.replace(/ /g, ""),
                -1 != e.indexOf("Wcpay") && (e = e.replace("Wcpay", "WCPay")),
                f = p[e],
                f && (e = f)
            }
            g = b.substring(d + 1),
            "confirm" == g && (g = "ok"),
            "failed" == g && (g = "fail"),
            -1 != g.indexOf("failed_") && (g = g.substring(7)),
            -1 != g.indexOf("fail_") && (g = g.substring(5)),
            g = g.replace(/_/g, " "),
            g = g.toLowerCase(),
            ("access denied" == g || "no permission to execute" == g) && (g = "permission denied"),
            "config" == e && "function not exist" == g && (g = "ok"),
            b = e + ":" + g
        }
        return b
    }
    function i(a) {
        var b, c, d, e;
        if (a) {
            for (b = 0, c = a.length; c > b; ++b) d = a[b],
            e = o[d],
            e && (a[b] = e);
            return a
        }
    }
    function j(a, b) {
        if (z.debug && !b.isInnerInvoke) {
            var c = p[a];
            c && (a = c),
            b && b._complete && delete b._complete,
            console.log('"' + a + '",', b || "")
        }
    }
    function k() {
        if (! ("6.0.2" > w || y.systemType < 0)) {
            var b = new Image;
            y.appId = z.appId,
            y.initTime = x.initEndTime - x.initStartTime,
            y.preVerifyTime = x.preVerifyEndTime - x.preVerifyStartTime,
            C.getNetworkType({
                isInnerInvoke: !0,
                success: function(a) {
                    y.networkType = a.networkType;
                    var c = "https://open.weixin.qq.com/sdk/report?v=" + y.version + "&o=" + y.isPreVerifyOk + "&s=" + y.systemType + "&c=" + y.clientVersion + "&a=" + y.appId + "&n=" + y.networkType + "&i=" + y.initTime + "&p=" + y.preVerifyTime + "&u=" + y.url;
                    b.src = c
                }
            })
        }
    }
    function l() {
        return (new Date).getTime()
    }
    function m(b) {
        t && (a.WeixinJSBridge ? b() : q.addEventListener && q.addEventListener("WeixinJSBridgeReady", b, !1))
    }
    function n() {
        C.invoke || (C.invoke = function(b, c, d) {
            a.WeixinJSBridge && WeixinJSBridge.invoke(b, e(c), d)
        },
        C.on = function(b, c) {
            a.WeixinJSBridge && WeixinJSBridge.on(b, c)
        })
    }
    var o, p, q, r, s, t, u, v, w, x, y, z, A, B, C;
    if (!a.jWeixin) return o = {
        config: "preVerifyJSAPI",
        onMenuShareTimeline: "menu:share:timeline",
        onMenuShareAppMessage: "menu:share:appmessage",
        onMenuShareQQ: "menu:share:qq",
        onMenuShareWeibo: "menu:share:weiboApp",
        previewImage: "imagePreview",
        getLocation: "geoLocation",
        openProductSpecificView: "openProductViewWithPid",
        addCard: "batchAddCard",
        openCard: "batchViewCard",
        chooseWXPay: "getBrandWCPayRequest"
    },
    p = function() {
        var b, a = {};
        for (b in o) a[o[b]] = b;
        return a
    } (),
    q = a.document,
    r = q.title,
    s = navigator.userAgent.toLowerCase(),
    t = -1 != s.indexOf("micromessenger"),
    u = -1 != s.indexOf("android"),
    v = -1 != s.indexOf("iphone") || -1 != s.indexOf("ipad"),
    w = function() {
        var a = s.match(/micromessenger\/(\d+\.\d+\.\d+)/) || s.match(/micromessenger\/(\d+\.\d+)/);
        return a ? a[1] : ""
    } (),
    x = {
        initStartTime: l(),
        initEndTime: 0,
        preVerifyStartTime: 0,
        preVerifyEndTime: 0
    },
    y = {
        version: 1,
        appId: "",
        initTime: 0,
        preVerifyTime: 0,
        networkType: "",
        isPreVerifyOk: 1,
        systemType: v ? 1 : u ? 2 : -1,
        clientVersion: w,
        url: encodeURIComponent(location.href)
    },
    z = {},
    A = {
        _completes: []
    },
    B = {
        state: 0,
        res: {}
    },
    m(function() {
        x.initEndTime = l()
    }),
    C = {
        config: function(a) {
            z = a,
            j("config", a),
            m(function() {
                c(o.config, {
                    verifyJsApiList: i(z.jsApiList)
                },
                function() {
                    A._complete = function(a) {
                        x.preVerifyEndTime = l(),
                        B.state = 1,
                        B.res = a
                    },
                    A.success = function() {
                        y.isPreVerifyOk = 0
                    },
                    A.fail = function(a) {
                        A._fail ? A._fail(a) : B.state = -1
                    };
                    var a = A._completes;
                    return a.push(function() {
                        z.debug || k()
                    }),
                    A.complete = function(b) {
                        for (var c = 0,
                        d = a.length; d > c; ++c) a[c](b);
                        A._completes = []
                    },
                    A
                } ()),
                x.preVerifyStartTime = l()
            }),
            z.beta && n()
        },
        ready: function(a) {
            0 != B.state ? a() : (A._completes.push(a), !t && z.debug && a())
        },
        error: function(a) {
            "6.0.2" > w || ( - 1 == B.state ? a(B.res) : A._fail = a)
        },
        checkJsApi: function(a) {
            var b = function(a) {
                var c, d, b = a.checkResult;
                for (c in b) d = p[c],
                d && (b[d] = b[c], delete b[c]);
                return a
            };
            c("checkJsApi", {
                jsApiList: i(a.jsApiList)
            },
            function() {
                return a._complete = function(a) {
                    if (u) {
                        var c = a.checkResult;
                        c && (a.checkResult = JSON.parse(c))
                    }
                    a = b(a)
                },
                a
            } ())
        },
        onMenuShareTimeline: function(a) {
            d(o.onMenuShareTimeline, {
                complete: function() {
                    c("shareTimeline", {
                        title: a.title || r,
                        desc: a.title || r,
                        img_url: a.imgUrl,
                        link: a.link || location.href
                    },
                    a)
                }
            },
            a)
        },
        onMenuShareAppMessage: function(a) {
            d(o.onMenuShareAppMessage, {
                complete: function() {
                    c("sendAppMessage", {
                        title: a.title || r,
                        desc: a.desc || "",
                        link: a.link || location.href,
                        img_url: a.imgUrl,
                        type: a.type || "link",
                        data_url: a.dataUrl || ""
                    },
                    a)
                }
            },
            a)
        },
        onMenuShareQQ: function(a) {
            d(o.onMenuShareQQ, {
                complete: function() {
                    c("shareQQ", {
                        title: a.title || r,
                        desc: a.desc || "",
                        img_url: a.imgUrl,
                        link: a.link || location.href
                    },
                    a)
                }
            },
            a)
        },
        onMenuShareWeibo: function(a) {
            d(o.onMenuShareWeibo, {
                complete: function() {
                    c("shareWeiboApp", {
                        title: a.title || r,
                        desc: a.desc || "",
                        img_url: a.imgUrl,
                        link: a.link || location.href
                    },
                    a)
                }
            },
            a)
        },
        startRecord: function(a) {
            c("startRecord", {},
            a)
        },
        stopRecord: function(a) {
            c("stopRecord", {},
            a)
        },
        onVoiceRecordEnd: function(a) {
            d("onVoiceRecordEnd", a)
        },
        playVoice: function(a) {
            c("playVoice", {
                localId: a.localId
            },
            a)
        },
        pauseVoice: function(a) {
            c("pauseVoice", {
                localId: a.localId
            },
            a)
        },
        stopVoice: function(a) {
            c("stopVoice", {
                localId: a.localId
            },
            a)
        },
        onVoicePlayEnd: function(a) {
            d("onVoicePlayEnd", a)
        },
        uploadVoice: function(a) {
            c("uploadVoice", {
                localId: a.localId,
                isShowProgressTips: 0 == a.isShowProgressTips ? 0 : 1
            },
            a)
        },
        downloadVoice: function(a) {
            c("downloadVoice", {
                serverId: a.serverId,
                isShowProgressTips: 0 == a.isShowProgressTips ? 0 : 1
            },
            a)
        },
        translateVoice: function(a) {
            c("translateVoice", {
                localId: a.localId,
                isShowProgressTips: 0 == a.isShowProgressTips ? 0 : 1
            },
            a)
        },
        chooseImage: function(a) {
            c("chooseImage", {
                scene: "1|2",
                count: a.count || 9,
                sizeType: a.sizeType || ["original", "compressed"]
            },
            function() {
                return a._complete = function(a) {
                    if (u) {
                        var b = a.localIds;
                        b && (a.localIds = JSON.parse(b))
                    }
                },
                a
            } ())
        },
        previewImage: function(a) {
            c(o.previewImage, {
                current: a.current,
                urls: a.urls
            },
            a)
        },
        uploadImage: function(a) {
            c("uploadImage", {
                localId: a.localId,
                isShowProgressTips: 0 == a.isShowProgressTips ? 0 : 1
            },
            a)
        },
        downloadImage: function(a) {
            c("downloadImage", {
                serverId: a.serverId,
                isShowProgressTips: 0 == a.isShowProgressTips ? 0 : 1
            },
            a)
        },
        getNetworkType: function(a) {
            var b = function(a) {
                var c, d, e, b = a.errMsg;
                if (a.errMsg = "getNetworkType:ok", c = a.subtype, delete a.subtype, c) a.networkType = c;
                else switch (d = b.indexOf(":"), e = b.substring(d + 1)) {
                case "wifi":
                case "edge":
                case "wwan":
                    a.networkType = e;
                    break;
                default:
                    a.errMsg = "getNetworkType:fail"
                }
                return a
            };
            c("getNetworkType", {},
            function() {
                return a._complete = function(a) {
                    a = b(a)
                },
                a
            } ())
        },
        openLocation: function(a) {
            c("openLocation", {
                latitude: a.latitude,
                longitude: a.longitude,
                name: a.name || "",
                address: a.address || "",
                scale: a.scale || 28,
                infoUrl: a.infoUrl || ""
            },
            a)
        },
        getLocation: function(a) {
            a = a || {},
            c(o.getLocation, {
                type: a.type || "wgs84"
            },
            function() {
                return a._complete = function(a) {
                    delete a.type
                },
                a
            } ())
        },
        hideOptionMenu: function(a) {
            c("hideOptionMenu", {},
            a)
        },
        showOptionMenu: function(a) {
            c("showOptionMenu", {},
            a)
        },
        closeWindow: function(a) {
            a = a || {},
            c("closeWindow", {
                immediate_close: a.immediateClose || 0
            },
            a)
        },
        hideMenuItems: function(a) {
            c("hideMenuItems", {
                menuList: a.menuList
            },
            a)
        },
        showMenuItems: function(a) {
            c("showMenuItems", {
                menuList: a.menuList
            },
            a)
        },
        hideAllNonBaseMenuItem: function(a) {
            c("hideAllNonBaseMenuItem", {},
            a)
        },
        showAllNonBaseMenuItem: function(a) {
            c("showAllNonBaseMenuItem", {},
            a)
        },
        scanQRCode: function(a) {
            a = a || {},
            c("scanQRCode", {
                needResult: a.needResult || 0,
                scanType: a.scanType || ["qrCode", "barCode"]
            },
            function() {
                return a._complete = function(a) {
                    var b, c;
                    v && (b = a.resultStr, b && (c = JSON.parse(b), a.resultStr = c && c.scan_code && c.scan_code.scan_result))
                },
                a
            } ())
        },
        openProductSpecificView: function(a) {
            c(o.openProductSpecificView, {
                pid: a.productId,
                view_type: a.viewType || 0
            },
            a)
        },
        addCard: function(a) {
            var e, f, g, h, b = a.cardList,
            d = [];
            for (e = 0, f = b.length; f > e; ++e) g = b[e],
            h = {
                card_id: g.cardId,
                card_ext: g.cardExt
            },
            d.push(h);
            c(o.addCard, {
                card_list: d
            },
            function() {
                return a._complete = function(a) {
                    var c, d, e, b = a.card_list;
                    if (b) {
                        for (b = JSON.parse(b), c = 0, d = b.length; d > c; ++c) e = b[c],
                        e.cardId = e.card_id,
                        e.cardExt = e.card_ext,
                        e.isSuccess = e.is_succ ? !0 : !1,
                        delete e.card_id,
                        delete e.card_ext,
                        delete e.is_succ;
                        a.cardList = b,
                        delete a.card_list
                    }
                },
                a
            } ())
        },
        chooseCard: function(a) {
            c("chooseCard", {
                app_id: z.appId,
                location_id: a.shopId || "",
                sign_type: a.signType || "SHA1",
                card_id: a.cardId || "",
                card_type: a.cardType || "",
                card_sign: a.cardSign,
                time_stamp: a.timestamp + "",
                nonce_str: a.nonceStr
            },
            function() {
                return a._complete = function(a) {
                    a.cardList = a.choose_card_info,
                    delete a.choose_card_info
                },
                a
            } ())
        },
        openCard: function(a) {
            var e, f, g, h, b = a.cardList,
            d = [];
            for (e = 0, f = b.length; f > e; ++e) g = b[e],
            h = {
                card_id: g.cardId,
                code: g.code
            },
            d.push(h);
            c(o.openCard, {
                card_list: d
            },
            a)
        },
        chooseWXPay: function(a) {
            c(o.chooseWXPay, f(a), a)
        }
    },
    b && (a.wx = a.jWeixin = C),
    C
});
var Base64 = {
    table: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '+', '/'],
    UTF16ToUTF8: function(str) {
        var res = [],
        len = str.length;
        for (var i = 0; i < len; i++) {
            var code = str.charCodeAt(i);
            if (code > 0x0000 && code <= 0x007F) {
                res.push(str.charAt(i))
            } else if (code >= 0x0080 && code <= 0x07FF) {
                var byte1 = 0xC0 | ((code >> 6) & 0x1F);
                var byte2 = 0x80 | (code & 0x3F);
                res.push(String.fromCharCode(byte1), String.fromCharCode(byte2))
            } else if (code >= 0x0800 && code <= 0xFFFF) {
                var byte1 = 0xE0 | ((code >> 12) & 0x0F);
                var byte2 = 0x80 | ((code >> 6) & 0x3F);
                var byte3 = 0x80 | (code & 0x3F);
                res.push(String.fromCharCode(byte1), String.fromCharCode(byte2), String.fromCharCode(byte3))
            } else if (code >= 0x00010000 && code <= 0x001FFFFF) {} else if (code >= 0x00200000 && code <= 0x03FFFFFF) {} else {}
        };
        return res.join('')
    },
    UTF8ToUTF16: function(str) {
        var res = [],
        len = str.length;
        var i = 0;
        for (var i = 0; i < len; i++) {
            var code = str.charCodeAt(i);
            if (((code >> 7) & 0xFF) == 0x0) {
                res.push(str.charAt(i))
            } else if (((code >> 5) & 0xFF) == 0x6) {
                var code2 = str.charCodeAt(++i);
                var byte1 = (code & 0x1F) << 6;
                var byte2 = code2 & 0x3F;
                var utf16 = byte1 | byte2;
                res.push(Sting.fromCharCode(utf16))
            } else if (((code >> 4) & 0xFF) == 0xE) {
                var code2 = str.charCodeAt(++i);
                var code3 = str.charCodeAt(++i);
                var byte1 = (code << 4) | ((code2 >> 2) & 0x0F);
                var byte2 = ((code2 & 0x03) << 6) | (code3 & 0x3F);
                var utf16 = ((byte1 & 0x00FF) << 8) | byte2;
                res.push(String.fromCharCode(utf16))
            } else if (((code >> 3) & 0xFF) == 0x1E) {} else if (((code >> 2) & 0xFF) == 0x3E) {} else {}
        };
        return res.join('')
    },
    encode: function(str) {
        if (!str) {
            return ''
        };
        var utf8 = this.UTF16ToUTF8(str);
        var i = 0;
        var len = utf8.length;
        var res = [];
        while (i < len) {
            var c1 = utf8.charCodeAt(i++) & 0xFF;
            res.push(this.table[c1 >> 2]);
            if (i == len) {
                res.push(this.table[(c1 & 0x3) << 4]);
                res.push('==');
                break
            };
            var c2 = utf8.charCodeAt(i++);
            if (i == len) {
                res.push(this.table[((c1 & 0x3) << 4) | ((c2 >> 4) & 0x0F)]);
                res.push(this.table[(c2 & 0x0F) << 2]);
                res.push('=');
                break
            };
            var c3 = utf8.charCodeAt(i++);
            res.push(this.table[((c1 & 0x3) << 4) | ((c2 >> 4) & 0x0F)]);
            res.push(this.table[((c2 & 0x0F) << 2) | ((c3 & 0xC0) >> 6)]);
            res.push(this.table[c3 & 0x3F])
        };
        return res.join('')
    },
    decode: function(str) {
        if (!str) {
            return ''
        };
        var len = str.length;
        var i = 0;
        var res = [];
        while (i < len) {
            code1 = this.table.indexOf(str.charAt(i++));
            code2 = this.table.indexOf(str.charAt(i++));
            code3 = this.table.indexOf(str.charAt(i++));
            code4 = this.table.indexOf(str.charAt(i++));
            c1 = (code1 << 2) | (code2 >> 4);
            c2 = ((code2 & 0xF) << 4) | (code3 >> 2);
            c3 = ((code3 & 0x3) << 6) | code4;
            res.push(String.fromCharCode(c1));
            if (code3 != 64) {
                res.push(String.fromCharCode(c2))
            };
            if (code4 != 64) {
                res.push(String.fromCharCode(c3))
            }
        };
        return this.UTF8ToUTF16(res.join(''))
    }
};
var CryptoJS = CryptoJS ||
function(u, p) {
    var d = {},
    l = d.lib = {},
    s = function() {},
    t = l.Base = {
        extend: function(a) {
            s.prototype = this;
            var c = new s;
            a && c.mixIn(a);
            c.hasOwnProperty("init") || (c.init = function() {
                c.$super.init.apply(this, arguments)
            });
            c.init.prototype = c;
            c.$super = this;
            return c
        },
        create: function() {
            var a = this.extend();
            a.init.apply(a, arguments);
            return a
        },
        init: function() {},
        mixIn: function(a) {
            for (var c in a) a.hasOwnProperty(c) && (this[c] = a[c]);
            a.hasOwnProperty("toString") && (this.toString = a.toString)
        },
        clone: function() {
            return this.init.prototype.extend(this)
        }
    },
    r = l.WordArray = t.extend({
        init: function(a, c) {
            a = this.words = a || [];
            this.sigBytes = c != p ? c: 4 * a.length
        },
        toString: function(a) {
            return (a || v).stringify(this)
        },
        concat: function(a) {
            var c = this.words,
            e = a.words,
            j = this.sigBytes;
            a = a.sigBytes;
            this.clamp();
            if (j % 4) for (var k = 0; k < a; k++) c[j + k >>> 2] |= (e[k >>> 2] >>> 24 - 8 * (k % 4) & 255) << 24 - 8 * ((j + k) % 4);
            else if (65535 < e.length) for (k = 0; k < a; k += 4) c[j + k >>> 2] = e[k >>> 2];
            else c.push.apply(c, e);
            this.sigBytes += a;
            return this
        },
        clamp: function() {
            var a = this.words,
            c = this.sigBytes;
            a[c >>> 2] &= 4294967295 << 32 - 8 * (c % 4);
            a.length = u.ceil(c / 4)
        },
        clone: function() {
            var a = t.clone.call(this);
            a.words = this.words.slice(0);
            return a
        },
        random: function(a) {
            for (var c = [], e = 0; e < a; e += 4) c.push(4294967296 * u.random() | 0);
            return new r.init(c, a)
        }
    }),
    w = d.enc = {},
    v = w.Hex = {
        stringify: function(a) {
            var c = a.words;
            a = a.sigBytes;
            for (var e = [], j = 0; j < a; j++) {
                var k = c[j >>> 2] >>> 24 - 8 * (j % 4) & 255;
                e.push((k >>> 4).toString(16));
                e.push((k & 15).toString(16))
            }
            return e.join("")
        },
        parse: function(a) {
            for (var c = a.length,
            e = [], j = 0; j < c; j += 2) e[j >>> 3] |= parseInt(a.substr(j, 2), 16) << 24 - 4 * (j % 8);
            return new r.init(e, c / 2)
        }
    },
    b = w.Latin1 = {
        stringify: function(a) {
            var c = a.words;
            a = a.sigBytes;
            for (var e = [], j = 0; j < a; j++) e.push(String.fromCharCode(c[j >>> 2] >>> 24 - 8 * (j % 4) & 255));
            return e.join("")
        },
        parse: function(a) {
            for (var c = a.length,
            e = [], j = 0; j < c; j++) e[j >>> 2] |= (a.charCodeAt(j) & 255) << 24 - 8 * (j % 4);
            return new r.init(e, c)
        }
    },
    x = w.Utf8 = {
        stringify: function(a) {
            try {
                return decodeURIComponent(escape(b.stringify(a)))
            } catch(c) {
                throw Error("Malformed UTF-8 data");
            }
        },
        parse: function(a) {
            return b.parse(unescape(encodeURIComponent(a)))
        }
    },
    q = l.BufferedBlockAlgorithm = t.extend({
        reset: function() {
            this._data = new r.init;
            this._nDataBytes = 0
        },
        _append: function(a) {
            "string" == typeof a && (a = x.parse(a));
            this._data.concat(a);
            this._nDataBytes += a.sigBytes
        },
        _process: function(a) {
            var c = this._data,
            e = c.words,
            j = c.sigBytes,
            k = this.blockSize,
            b = j / (4 * k),
            b = a ? u.ceil(b) : u.max((b | 0) - this._minBufferSize, 0);
            a = b * k;
            j = u.min(4 * a, j);
            if (a) {
                for (var q = 0; q < a; q += k) this._doProcessBlock(e, q);
                q = e.splice(0, a);
                c.sigBytes -= j
            }
            return new r.init(q, j)
        },
        clone: function() {
            var a = t.clone.call(this);
            a._data = this._data.clone();
            return a
        },
        _minBufferSize: 0
    });
    l.Hasher = q.extend({
        cfg: t.extend(),
        init: function(a) {
            this.cfg = this.cfg.extend(a);
            this.reset()
        },
        reset: function() {
            q.reset.call(this);
            this._doReset()
        },
        update: function(a) {
            this._append(a);
            this._process();
            return this
        },
        finalize: function(a) {
            a && this._append(a);
            return this._doFinalize()
        },
        blockSize: 16,
        _createHelper: function(a) {
            return function(b, e) {
                return (new a.init(e)).finalize(b)
            }
        },
        _createHmacHelper: function(a) {
            return function(b, e) {
                return (new n.HMAC.init(a, e)).finalize(b)
            }
        }
    });
    var n = d.algo = {};
    return d
} (Math); (function() {
    var u = CryptoJS,
    p = u.lib.WordArray;
    u.enc.Base64 = {
        stringify: function(d) {
            var l = d.words,
            p = d.sigBytes,
            t = this._map;
            d.clamp();
            d = [];
            for (var r = 0; r < p; r += 3) for (var w = (l[r >>> 2] >>> 24 - 8 * (r % 4) & 255) << 16 | (l[r + 1 >>> 2] >>> 24 - 8 * ((r + 1) % 4) & 255) << 8 | l[r + 2 >>> 2] >>> 24 - 8 * ((r + 2) % 4) & 255, v = 0; 4 > v && r + 0.75 * v < p; v++) d.push(t.charAt(w >>> 6 * (3 - v) & 63));
            if (l = t.charAt(64)) for (; d.length % 4;) d.push(l);
            return d.join("")
        },
        parse: function(d) {
            var l = d.length,
            s = this._map,
            t = s.charAt(64);
            t && (t = d.indexOf(t), -1 != t && (l = t));
            for (var t = [], r = 0, w = 0; w < l; w++) if (w % 4) {
                var v = s.indexOf(d.charAt(w - 1)) << 2 * (w % 4),
                b = s.indexOf(d.charAt(w)) >>> 6 - 2 * (w % 4);
                t[r >>> 2] |= (v | b) << 24 - 8 * (r % 4);
                r++
            }
            return p.create(t, r)
        },
        _map: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/="
    }
})();
eval(function(p, a, c, k, e, d) {
    e = function(c) {
        return (c < a ? "": e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
    };
    if (!''.replace(/^/, String)) {
        while (c--) d[e(c)] = k[c] || e(c);
        k = [function(e) {
            return d[e]
        }];
        e = function() {
            return '\\w+'
        };
        c = 1;
    };
    while (c--) if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
    return p;
} ('1n=b(I,3D){7.I=I||q;7.V=q;7.3D=3D||q;7.D=q;7.1w=q;7.36=q;7.22=q;7.3V=q;7.1d="E://9g.9Y.3a";7.4Y=q;7.3Y=q;7.4V=q;7.33=q;7.1L=q;7.5m=q;7.29=q;7.4L=["4T.3a","4T.3a","4T.3a"];7.C={1C:"E://V.9g.J/3S.1h",Q:7.1d,11:"3v",15:"3v"};7.P=q;7.W=q;7.2I=1I;7.1x=q;7.2E=q;7.2z=q;7.u=Y K(7);7.1G=Y 1s(7);7.1l()};1n.t.1l=b(){7.D=7.u.1H("D");7.1w=7.u.1H("1w");7.36=7.u.1H("36");7.22=7.u.1H("H");7.2I=(7.u.1H("f")=="3w");7.3Y=7.1d+"/7D.1k"+(7.D?"?D="+7.D:"");7.4V=7.1d+"/6V.1k"+(7.D?"?D="+7.D:"");7.33=(7.2I?7.4V:7.3Y);7.29=7.4L[2Y(2f.2g()*7.4L.2c)];7.2E=7.u.1H("2E");7.2z=7.u.1H("2z");2l(7.u.1p()){12"N":7.P=Y 1O(7);S;12"9g":7.P=Y 2N(7);S;12"26":7.P=Y 2A(7);S;12"2r":7.P=Y 3q(7);S};h(7.I)7.5h();j k=7;1S(b(){k.u.45()},1U);1S(b(){k.u.69()},7h)};1n.t.5h=b(){j k=7;7.4Y="/7a.1k?I="+7.I+(7.D?"&D="+7.D:"")+(A.R?"&H="+A.R:"")+"&f=3w"+"&2n="+7.29;7.C.1C="E://V.9g.J/"+7.I+"/3S.1h";7.C.Q="E://"+2Y(2f.2g()*8u)+"."+7.I+"."+7.29+7.4Y;7.u.5n();h(!7.D||7.D=="26"||7.D=="9g"){h(7.u.1p()=="9g"&&7.P&&7.P.Z=="1.0.5"&&7.u.3I()){}F{7.5L=Y 5S(7)}};h(7.u.1p()=="9g"&&7.u.3I()){1S(b(){X.O="6A::8l::"+k.1d+"/P/4M.1k?r="+2f.2g()},1U)};7.57();1S(b(){k.5j()},1U);1S(b(){k.u.6R()},8w);h(7.u.1p()=="N"||7.u.1p()=="9g"){1S(b(){k.4v()},4m)};3b.2u(["3y","8x",(7.2I?"7W":"7Z"),1]);3b.2u(["3y","I",7.I,1]);3b.2u(["3y","D",7.D,1]);h(7.u.1p()=="N"){3b.2u(["3y","7P",7.P.Z,1])}};1n.t.57=b(){h(A.1u){j l="E://N.9g.J/1G/7R?I="+7.I+"&3z="+A.1u+(7.D?"&D="+7.D:"")+(7.22?"&3n="+7.22:"");j k=7;7.u.1f(l,b(o){h(o.2o){k.1G.39();k.W=q}F{A.R=o.3n;k.W=k.u.24(k.W,o.W);k.V=o.V;}})}F{j l="E://N.9g.J/1G/7S?I="+7.I+(7.D?"&D="+7.D:"")+(7.u.1H("f")=="3w"?"&f=3w":"");j k=7;7.u.1f(l,b(o){k.V=o.V;})}};1n.t.4v=b(){h(!7.4i())w;h(A.R&&!c.W){A.32=A.32||0;h(A.32&&A.32<3){j k=7;7.1G.5a(b(){j 4w="";h(k.3V)4w=k.3V.8b;k.u.5z({11:"3v",15:"8a"+4w+"8f，84？",2w:[{2S:"86",2e:b(){X.O=k.1d+"/4v/Y.1k"}},{2S:"87",2e:q}]});A.32++})}}};1n.t.88=b(I,G){7.u.1f("E://N.9g.J/P/89?I="+I,G)};1n.t.3H=b(){w 7.1d+"/P/1x.1k?r="+2f.2g()};1n.t.5j=b(G){j l="E://N.9g.J/1x/83?I="+7.I+(A.R?"&3n="+A.R:"");j k=7;7.u.1f(l,b(o){h(o.W)k.W=k.u.24(k.W,o.W);h(o.V)k.V=o.V;h(o.1x)k.1x=o.1x;h(k.W&&(k.D==q||k.D=="26")){k.2I=1I;k.33=k.3Y};G&&G.1v(k)})};1n.t.1V=b(C){h(C)7.C=7.u.24(7.C,C);h(7.P&&7.P.1V)7.P.1V()};1n.t.1W=b(){7.P&&7.P.1W()};1n.t.4E=b(v,G){j l="E://N.9g.J/P/8e";h(v.I)l=7.u.1e(l,"I",v.I);h(v.D)l=7.u.1e(l,"D",v.D);h(v.H)l=7.u.1e(l,"H",v.H);h(v.1w)l=7.u.1e(l,"1w",v.1w);h(v.1c)l=7.u.1e(l,"1c",v.1c);h(v.2n)l=7.u.1e(l,"2n",v.2n);7.u.1f(l,b(o){G&&G.1v(q)})};1n.t.4F=b(){j k=7;h(7.2I&&7.D&&7.D!="9g"&&7.D!="26"&&7.D!="2r"&&7.D!="8g"){7.P.1K=b(){X.O=k.33};7.u.37();w};h(7.1x){h(7.1x.I==7.I){7.P.1K=b(){h(!k.34||k.34&&k.1L!=k.5c){k.3X(b(){X.O=k.3H()})}F{X.O=k.3H()}};7.u.37()}F{7.P.1K=b(){X.O=k.3H()};7.u.37()}}F{7.P.1K=b(){X.O=k.33};7.u.37()}};1n.t.5H=b(G){j k=7;h(A.R&&7.1L!=q&&7.1L>0){h(!7.34||7.34&&(7.4x=="82"&&7.1L<7.4q||7.4x=="3h"&&7.1L>7.4q)){7.3X(b(o){h(o.U){k.34=1Q;k.4x=o.7T;k.4q=o.7O||o.5f==-1?k.1L:o.5f;k.5c=k.1L;G&&G.1v(q)}})}}};1n.t.3X=b(G){h(!A.R){w};h(7.1L==q||6m(7.1L)){w};j 2E=(7.22&&7.22!=A.R?7.22:"");j 2C="";h(2E&&!7.2C){2C="y";7.2C=1Q};j 2z=(7.2z?"y":"");j a=[7.I,A.R,7.1L,17(7.5m),17(7.C.11),2E,2C,2z];j o=7X.8h(7.u.47("8B",a.8C("|")));j l="E://N.9g.J/1x/3X?o="+o+(7.1w?"&1w="+7.1w:"");j k=7;7.u.1f(l,b(o){h(o.U){k.u.25(o);G&&G.1Z(q,o)}F{k.u.25("8A")}})};1n.t.4i=b(){w(7.u.1H("8y")=="y"||A.R=="8z=="||A.R=="8I=="||A.R=="8J=="||A.R=="8K=="||A.R=="8H=="||A.R=="8E=="||A.R=="8F==")};1s=b(c){7.c=c};1s.t.3i=b(v){j 3x={2b:"H",1D:O.1Y,U:q,27:q};v=7.c.u.24(3x,v);h(7.5k()){v.27&&v.27.1v(q);w};h(7.53(v,10)){v.U&&v.U.1v(q);w};h(v.2b=="H"&&!A.1u){7.3t(v)}F h(v.2b=="W"&&!A.14){7.3t(v)}F{j l="E://N.9g.J/P/3i";h(v.2b=="H")l+="?3z="+A.1u;h(v.2b=="W")l+="?14="+A.14;j k=7;7.c.u.1f(l,b(o){h(o&&o.U){k.5b(v,o);v.U&&v.U.1v(q)}F{k.39();k.3t(v)}})}};1s.t.5k=b(){h(1m.2o&&1m.3c){7.c.u.25("2o = "+1m.2o+", 3c = "+1m.3c);1m.2a("2o");1m.2a("3c");7.39();w 1Q};w 1I};1s.t.39=b(){A.2a("1u");A.2a("14");A.2a("R");A.2a("3U")};1s.t.5b=b(v,o){7.39();h(o.1u)A.1u=o.1u;h(o.14)A.14=o.14;h(o.R)A.R=o.R;h(o.3U)A.3U=o.3U;j 23="54"+v.2b+"52";1m[23]=Y 2v().31()};1s.t.53=b(v,59){j 23="54"+v.2b+"52";h(1m[23]){j 4B=1m[23];1m.2a(23);h(4B&&(Y 2v().31()-4B)<=59*1U)w 1Q};w 1I};1s.t.3t=b(v){2l(v.2b){12"H":h(7.c.u.1p()=="N"){7.4D(v.1D)}F{v.27&&v.27.1v(q)};S;12"W":h(7.c.u.1p()=="N"){h(!A.1u){7.4D(v.1D)}F{7.5P(v.1D)}}F{7.5Q(v.1D)};S}};1s.t.8t=b(G){h(!A.14){G&&G.1Z(q,q)}F{j k=7;j l="E://N.9g.J/P/4C?14="+A.14;7.c.u.1f(l,b(o){h(o.2o){A.2a("14");k.c.W=q;G&&G.1Z(q,q)}F{k.c.W=k.c.u.24(k.c.W,o);G&&G.1Z(q,o)}})}};1s.t.5a=b(){j H=7.c.22;j G=q;2l(T.2c){12 1:h(1J T[0]=="6j")H=T[0];h(1J T[0]=="b")G=T[0];S;12 2:H=T[0];G=T[1];S};h(H){j k=7;j l="E://N.9g.J/P/4C?H="+H;7.c.u.1f(l,b(o){j W=q;h(o.2o){k.c.u.25(o.3c)}F{W=o;k.c.3V=W};G&&G.1Z(q,W)})}F{G&&G.1Z(q,q)}};1s.t.4D=b(1D){j 2M=7.c.1d+"/1G/2M.P.1k?3O="+17(1D);j l="E://N.9g.J/1G/3i?5O="+17(2M)+"&2K="+7.c.u.3p();X.O.1R(l)};1s.t.5P=b(1D){j 2M=7.c.1d+"/1G/2M.P.1k?3O="+17(1D);j U="E://N.9g.J/1G/3i?5O="+17(2M)+"&2K="+7.c.u.3p();j 27=7.c.1d+"/P/4M.1k";j l="E://N.9g.J/1G/4C?U="+17(U)+"&27="+17(27)+(7.c.D?"&D="+7.c.D:"");X.O.1R(l)};1s.t.5Q=b(1D){j l=7.c.1d+"/P/76.1k?7b="+17(1D);X.O=l};1s.t.7c=b(G){j H=7.c.22;h(H&&A.1u&&H!=A.R){j l="E://N.9g.J/1G/Q?3z="+A.1u+"&H="+H;j k=7;7.c.u.1f(l,b(o){j 13=0;h(o.3M){k.c.u.25(o);13=-1}F{13=o.6X};G&&G.1Z(q,13)})}F{G&&G.1Z(q,-1)}};5S=b(c){7.c=c;7.73=Y 5J(c);7.1N=Y 2B(c)};5J=b(c){7.c=c;j a=x.1a("a");a.H="2U";a.1b="2U";j k=7;a.1r("28",b(1x){k.c.5L.1N.4J();1x.4l()});x.19("1i")[0].1g(a);};2B=b(c){7.c=c;7.4H=1I;7.1l()};2B.t.1l=b(){j L=x.1a("L");L.H="2D";L.1b="2D";j 3J=x.1a("3J");2i(j i=1;i<=6;i++){j 2j=x.1a("2j");j B=x.1a("B");j a=x.1a("a");j Q=7.c.1d;2l(i){12 1:a.1z="6Y　";B.1j="E://V.9g.J/B/1N/6Z.1h";Q=7.c.1d+"/P/4M.1k";S;12 2:a.1z="7C　";B.1j="E://V.9g.J/B/1N/7F.1h";Q=7.c.1d+"/P/7E.1k";S;12 3:a.1z="7z　";B.1j="E://V.9g.J/B/1N/7y.1h";Q=7.c.1d+"/P/1x.1k";S;12 4:a.1z="7A";B.1j="E://V.9g.J/B/1N/7L.1h";Q=7.c.1d+"/P/7K.1k";S;12 5:2j.H="5Y";a.1z="7N";B.1j="E://V.9g.J/B/1N/7M.1h";Q=7.c.1d+"/P/7H.1k";S;12 6:a.1z="7G";B.1j="E://V.9g.J/B/1N/7J.1h";Q=7.c.1d+"/7I.1k";S};2j.1g(B);2j.1g(a);(b(Q){2j.1r("28",b(){X.O=Q})})(Q);3J.1g(2j)};L.1g(3J);x.19("1i")[0].1g(L);7.5M()};2B.t.5M=b(){h(A.14){j l="E://N.9g.J/7o/7j?5K=0&14="+A.14;7.c.u.1f(l,b(o){h(o&&o.5Z>0){j L=x.1a("L");L.1b="2C";L.1z="+"+o.5Z;x.1E("5Y").1g(L)}})}};2B.t.4J=b(){j L=x.1E("2D");L.1b="2D 4J";j 18=x.1a("L");18.H="4G";18.1b="4G";x.19("1i")[0].1g(18);j k=7;18.1r("28",b(){k.60()});7.4H=1Q};2B.t.60=b(){j L=x.1E("2D");L.1b="2D";j 18=x.1E("4G");h(18)x.19("1i")[0].2k(18);7.4H=1I};K=b(c){7.c=c};K.t.24=b(2T,v){h(2T==7t||2T==q){w v}F{h(v){2i(1B 44 v){2T[1B]=v[1B]}};w 2T}};K.t.3I=b(){w/6G|6N|6S|78/1o.1M(2q.2p)};K.t.8L=b(){w/4I|am/i.1M(2q.2p)};K.t.1p=b(){j 1T=2q.2p;h(/aq/1o.1M(1T)){w"N"}F h(/c/1o.1M(1T)){w"9g"}F h(/6k/1o.1M(1T)){w"26"}F h(/4O/1o.1M(1T)){w"2r"}F{w"ah"}};K.t.3l=b(){j 13=q;j Z=q;j 1T=2q.2p;2l(7.1p()){12"N":13=1T.1A(/ak\\/([^\\s]+)/i);h(13)Z=13[1];S;12"9g":13=1T.1A(/aj\\s([^\\s]+)/i);h(13)Z=13[1];S;12"26":13=1T.1A(/ar\\/([^\\s]+)/i);h(13)Z=13[1];S;12"2r":13=1T.1A(/4O\\/([^\\s]+)/i);h(13)Z=13[1];S};w Z};K.t.3R=b(5T,5V){j 56=5T.1A(/(\\d+)(?!\\d)/1o);j 4t=5V.1A(/(\\d+)(?!\\d)/1o);j 13=1Q;2i(j i=0;i<99;i++){h(4t.2c<i+1){13=1Q;S};j 4r=2Y(56[i]);j 4p=2Y(4t[i]);h(4r!=4p){13=(4r>4p);S}};w 13};K.t.43=b(){w/(a7:\\/\\/)|(a6\\.0\\.0.1)/1o.1M(O.1Y)};K.t.9V=b(){h(O.3O&&O.3F){w O.3O+O.3F}F{w O.1Y.1A(/[^?#]+/i)[0]}};K.t.6t=b(){w O.1Y.1A(/[^#;]+/i)[0]};K.t.4o=b(){h(O.3F){w O.3F}F{w O.1Y.1A(/(?:E|4R):\\/\\/[^\\/]+([^?#;]+)/i)[1]}};K.t.9P=b(){w O.5X};K.t.1H=b(1B){j 2h=Y 4u("(^|&)"+1B+"=([^&]*)(&|$)","i");j r=X.O.5X.3B(1).1A(2h);h(r!=q)w r[2];w q};K.t.1e=b(l,1B,1P){l=l.1R(/(#.*)/1o,"");j 2h=Y 4u("([\\?&])"+1B+"=([^&]*)(?=&|$)","i");h(2h.1M(l)){w l.1R(2h,"$1"+1B+"="+1P)}F{w l+(l.20("?")==-1?"?":"&")+1B+"="+1P}};K.t.a2=b(l,1B){l=l.1R(/(#.*)/1o,"");j 2h=Y 4u("([\\?&])"+1B+"=([^&]*)(?=&|$)","i");h(2h.1M(l)){l=l.1R(2h,"");h(l.20("?")==-1)l=l.1R("&","?")};w l};K.t.ab=b(1q){h(!1q)w"E://V.9g.J/5I.1h";h(1q.20("/0")!=-1){1q=1q.3B(0,1q.2c-2)+"/64"};w 1q};K.t.ae=b(1q){h(!1q)w"E://V.9g.J/5I.1h";h(1q.20("/0")!=-1){1q=1q.3B(0,1q.2c-2)+"/9T"};w 1q};K.t.6w=b(){j 2x=Y 2v();2x.9U(0);w 2x.31()/1U};K.t.9Q=b(){j 2x=Y 2v();2x.9R(0,0,0,0);w 2x.31()/1U};K.t.9Z=b(){j 1t=T[0];j 5r=T[1]||"5u-5v-5w 5o:5q:5s";h(1J 1t=="an"){1t=Y 2v(1t*1U)};j 2J=b(4z){4z+="";w 4z.1R(/^(\\d)$/,"0$1")};j 4y={5u:1t.5t(),9X:1t.5t().6l().5i(2),M:1t.5x()+1,5v:2J(1t.5x()+1),d:1t.5p(),5w:2J(1t.5p()),5o:2J(1t.ax()),5q:2J(1t.aC()),5s:2J(1t.ay())};w 5r.1R(/([a-z])(\\1)*/1o,b(m){w 4y[m]})};K.t.5F=b(4Z,5E){w 2Y((2f.2g()*(5E-4Z+1))+4Z)};K.t.2y=b(5D){j 4P="ag";j 4Q="";2i(j i=0;i<5D;i++){j n=7.5F(1,4P.2c)-1;4Q+=4P.3B(n,1)};w 4Q};K.t.3p=b(){h(!1m.2K){1m.2K=7.2y(40)};w 1m.2K};K.t.96=b(15,G){j k=7;7.c.5H(b(){h(7.c.1w=="5G"){X.O=k.c.1d+"/5G/98.1k?36="+k.c.36;w}});h(7.c.D=="2r"){h(7.c.C.11.20("3u")==-1)7.c.C.11+="[3u]";h(7.c.C.15.20("3u")==-1)7.c.C.15+="[3u]"};7.c.1V()};K.t.37=b(){h(x.1E("50"))w;j 2O=x.1a("B");2O.H="50";2O.1j="E://V.9g.J/B/9a.1h";2O.1b="50";x.19("1i")[0].1g(2O);j 18=x.1a("L");18.1b="9h";x.19("1i")[0].1g(18);18.1r("28",b(){x.19("1i")[0].2k(18);x.19("1i")[0].2k(2O);})};K.t.5z=b(v){Y 35(7.c,v).3T()};35=b(c,v){7.c=c;j 3x={11:"3v",15:"",2w:[],4U:q,4S:q};7.v=7.c.u.24(3x,v);7.1l()};35.t.1l=b(){h(7.v.4U){7.v.2w.2u(7.c.u.24({2S:"9c",2R:"#5y",3A:"#9d",2e:q},7.v.4U))};h(7.v.4S){7.v.2w.2u(7.c.u.24({2S:"8R",2R:"#5y",3A:"#8P",2e:q},7.v.4S))}};35.t.3T=b(){h(x.1E("3Q"))w;j L=x.1a("L");L.H="3Q";L.1b="3Q";L.1z="<5N><5C>"+7.v.11+"</5C></5N><5B>"+7.v.15.1R(/\\n/g,"<8T/>")+"</5B><4k></4k>";j k=7;2i(j i=0;i<7.v.2w.2c;i++){(b(2d){j a=x.1a("a");a.1z=2d.2S;h(2d.2R)a.5A.2R=2d.2R;h(2d.3A)a.5A.90=2d.3A;a.1r("28",k.5W);a.1r("28",b(e){2d.2e&&2d.2e.1v(k.c);e.4l()});L.19("4k")[0].1g(a)})(7.v.2w[i])};x.19("1i")[0].1g(L);j 18=x.1a("L");18.H="4c";18.1b="4c";x.19("1i")[0].1g(18)};35.t.5W=b(e){j L=x.1E("3Q");h(L)x.19("1i")[0].2k(L);j 18=x.1E("4c");h(18)x.19("1i")[0].2k(18);e.4l()};K.t.1f=b(l,U){l=7.c.u.1e(l,"5U",2f.2g());Y 48(7.c,"8W",l,q,"5R",U)};K.t.6d=b(l,o,2s,U){l=7.c.u.1e(l,"5U",2f.2g());Y 55(l,o,2s,U).58()};48=b(c,62,l,o,1c,U){7.c=c;7.1y=q;h(X.61){7.1y=Y 61()}F{7.1y=Y 9E("9F.9C")};7.1c=1c;7.U=U;7.1y.3T(62,l,1Q);j k=7;7.1y.9z=b(){k.G.1v(k)};7.1y.9A(o)};48.t.G=b(){h(7.1y.9B==4&&7.1y.5K==9M){j o=q;2l(7.1c){12"6z":o=7.1y.49;S;12"5R":3L{o=4W.3K(7.1y.49)}3N(e){o=7.1y.49};S};7.U&&7.U.1Z(7.1y,o)}};55=b(l,o,2s,U,4h){j 4f=1I;j 2H=x.19("9L")[0]||x.9I;j 2Z=x.1a("6y");j 2t="2t"+(2f.2g()+"").5i(2);j 5l=b(){h(2H!=q){2H.2k(2Z);3L{9n X[2t]}3N(9o){};2H=q}};j 1l=b(){2Z.9p="9m-8";2H.9j(2Z,2H.9k);X[2t]=b(5d){4f=1Q;U(5d)};2s=2s||"G";h(l.20("?")>0){l=l+"&"+2s+"="+2t}F{l=l+"?"+2s+"="+2t};h(1J o=="46"&&o!=q){2i(j p 44 o){l=l+"&"+p+"="+9l(o[p])}}};j 51=b(){h(1J X[2t]=="b"){5l()};h(1J 4h=="b"&&4f==1I){4h()}};7.58=b(){1l();2Z.1j=l;X.1S(51,66)}};K.t.5n=b(){j L=x.1a("L");L.H="5g";L.1b="5g";h(7.c.3D){L.1z="<B 41=\'9x\' 1j=\'E://V.9g.J/B/63.1h\' /><B 41=\'5e\' 1j=\'E://V.9g.J/"+7.c.I+"/5e.1h\' />"}F{L.1z="<B 41=\'9t\' 1j=\'E://V.9g.J/B/63.1h\' />"};x.19("1i")[0].1g(L);j 6Q=(7.1p()=="9g"?1U:4m);1S(b(){x.19("1i")[0].2k(L);j a=x.1E("2U");h(a){a.1b="2U 9s";j 4j=b(){a.1b="2U 9r 9u";j B=x.1E("42");h(B){B.1b="42 9w";j 3Z=b(){1S(b(){B.1b="42 9v"},1U)};B.1r("6I",3Z);B.1r("6U",3Z)}};a.1r("6I",4j);a.1r("6U",4j)}},6Q)};K.t.6R=b(){h(7.c.D=="26"&&7.1p()!="26"){j l="E://N.9g.J/3j/6M.3r?D="+7.c.D;7.1f(l,b(o){h(o.ad){j B=x.1a("B");B.H="6P";B.1j=o.ad.1C;B.1b="6P";B.1r("28",b(){X.O="E://N.9g.J/3j/2e.3r?H="+o.ad.H});x.19("1i")[0].1g(B)}})};h(7.c.D=="2r"&&7.1p()!="2r"){j 6J=(7.1H("9q")=="1");j l="E://N.9g.J/3j/6M.3r?D="+7.c.D;j k=7;7.1f(l,b(o){h(o.ad){j B=x.1a("B");B.H="6H";B.1b="6H";B.1j=o.ad.1C;B.1r("28",b(){h(6J){h(k.1p()=="N"){j 38=x.1a("B");38.H="6L";38.1b="6L";38.1j="E://V.9g.J/B/"+(k.3I()?"9y.1h":"9K.1h");x.19("1i")[0].1g(38)}F{X.O="9J://"}}F{X.O="E://N.9g.J/3j/2e.3r?H="+o.ad.H}});x.19("1i")[0].1g(B)}})}};K.t.25=b(1F){h(7.c.4i()){9O("[9N]\\n"+7.4n(1F))}};K.t.4n=b(1F,21){21=21||"";j 15="";h(1J 1F=="46"&&1F!=q){2i(j 2m 44 1F){h(1J 1F[2m]=="46"&&1F[2m]!=q)15+=21+2m+" = \\n"+21+"(\\n"+7.4n(1F[2m],21+"    ")+21+")\\n";F 15+=21+2m+" = "+1F[2m]+"\\n"}}F{15+=21+1F};w 15};K.t.47=b(23,6O){j 4b=3e.4d.4e.3K(23);j 6g=3e.4d.4e.3K(6O);j 6i=3e.9H.47(6g,3e.4d.4e.3K(23),{4b:4b,6e:3e.6e.9D});w 6i.6l()};K.t.4a=b(){j 1X=q;j 1P=q;j 2L=q;j G=q;2l(T.2c){12 1:1X=T[0];S;12 2:1X=T[0];h(!6m(T[1]))1P=T[1];h(1J T[1]=="b")G=T[1];S;12 3:1X=T[0];1P=T[1];h(1J T[2]=="6j")2L=T[2];h(1J T[2]=="b")G=T[2];S;12 4:1X=T[0];1P=T[1];2L=T[2];G=T[3];S};h(1X==q){7.25("4a 8V: 8U 1X");w};j l="E://N.9g.J/3T/4a?1X="+17(1X);h(1P!=q)l=7.1e(l,"1P",1P);h(2L!=q)l=7.1e(l,"2L",17(2L));h(7.c.I)l=7.1e(l,"I",7.c.I);h(A.R)l=7.1e(l,"3n",A.R);7.1f(l,b(o){h(o.U){G&&G.1v(q)}})};K.t.45=b(){h(7.43())w;j 67=1m.68||0;j 4g=Y 2v().31();h(4g-67<4m)w;F 1m.68=4g;j 2F=7.c.u.2y(10);j l="E://N.9g.J/P/8X/"+2F+"?l="+17(O.1Y)+"&6c="+17(7.4o());h(7.c.I)l+="&I="+7.c.I;h(A.14)l+="&14="+A.14;h(A.1u)l+="&3z="+A.1u;l+="&2K="+7.3p();j k=7;7.1f(l,b(o){h(o.H){}});1S(b(){k.45()},66)};K.t.69=b(){h(7.43())w;j 2F=7.c.u.2y(10);j l="E://N.9g.J/8Z/8Y/"+2F+"?l="+17(O.1Y)+"&6c="+17(7.4o())+"&2n="+O.8O;h(A.R)l=7.1e(l,"H",A.R);h(A.14)l=7.1e(l,"14",A.14);h(7.c.W){j 2V=7.c.W.2V||"";j 2X=7.c.W.2X||"";j 2W=7.c.W.2W||"";h(2V||2X||2W){l=7.1e(l,"2V",17(2V));l=7.1e(l,"2X",17(2X));l=7.1e(l,"2W",17(2W))}};7.1f(l,b(o){})};K.t.8N=b(){3L{j 6a=(("4R:"==x.O.8M)?" 4R://":" E://");x.8S(8Q("%91 H=\'9b\'%3E%3C/9e%3E%9i 1j=\'"+6a+"9f.94.J/93.6b%92%95\' 1c=\'6z/97\'%3E%3C/6y%3E"))}3N(e){65.3M(e)}};1O=b(c){7.c=c;7.Z=q;7.4A=1I;7.1K=q;7.30=q;7.1l()};1O.t.1l=b(){7.Z=7.c.u.3l();7.6v()};1O.t.3P=b(Z){w 7.c.u.3R(7.Z,Z)};1O.t.al=b(){j k=7;x.1r("ap",b 6x(){3s.6E("1N:1W:ao",b(6q){3s.6r("af",{"6o":k.c.C.1C,"Q":k.c.C.Q,"3h":k.c.C.15,"11":k.c.C.11},b(3d){h(3d.6s=="ai:3W"){k.3g()}F{k.3f()}})});3s.6E("1N:1W:az",b(6q){3s.6r("aB",{"6o":k.c.C.1C,"at":"6p","as":"6p","Q":k.c.C.Q,"3h":k.c.C.15,"11":k.c.C.11},b(3d){h(3d.6s=="aw:3W"){k.3g()}F{k.3f()}})})},1I)};1O.t.6v=b(){j 2P=7.c.u.6w();j 3G=7.c.u.2y(16);j 2F=7.c.u.2y(10);j l=7.c.u.6t();j 6u="E://N.9g.J/aa/a4/"+2F+"?3G="+3G+"&2P="+2P+"&l="+17(l);j k=7;7.c.u.1f(6u,b(o){h(o.2Q){j 2Q=o.2Q;N.4y({25:1I,a3:"a5",2P:2P,au:3G,2Q:2Q,av:["ac","6D","6C","a8","a9","a1","9S","a0","9W","aA","7s","7q","7r","7w","7x","7u","7v","7k","7l","7i","7p","7m","7n","7B","70","71","74","72","6W","7e","7g","7f","75","79"]});N.4A(b(){k.4A=1Q;k.1V()});N.3M(b(3d){})}})};1O.t.1V=b(){j k=7;N.6D({11:7.c.C.11,Q:7.c.C.Q,6F:7.c.C.1C,U:b(){j v={I:k.c.I,D:k.c.D,H:A.R||q,1w:1,1c:1,2n:(k.c.C.Q||"").20(k.c.29!=-1)?k.c.29:q};k.c.4E(v,b(){k.3f()})},3W:b(){k.3g()}});N.6C({11:7.c.C.11,3h:7.c.C.15,Q:7.c.C.Q,6F:7.c.C.1C,1c:"",8r:"",U:b(){j v={I:k.c.I,D:k.c.D,H:A.R||q,1w:2,1c:1,2n:(k.c.C.Q||"").20(k.c.29!=-1)?k.c.29:q};k.c.4E(v,b(){k.3f()})},3W:b(){k.3g()}})};1O.t.1W=b(){7.1V();h(7.c.I){7.c.4F()}};1O.t.3f=b(){3b.2u(["8q","8p","8s"]);7.1K&&7.1K.1v(7.c);};1O.t.3g=b(){7.30&&7.30.1v(7.c);};2N=b(c){7.c=c;7.Z=q;7.1c=q;7.1K=q;7.30=q;7.3o=q;7.1l()};2N.t.1l=b(){7.Z=7.c.u.3l();h(/6B\\8v/1o.1M(2q.2p))7.1c="3m";h(/6B\\8k/1o.1M(2q.2p))7.1c="4X";j k=7;x.1r("8j",b 6x(){h(k.3o)x.11=k.3o;k.1K&&k.1K.1v(k.c)})};2N.t.3P=b(Z){w 7.c.u.3R(7.Z,Z)};2N.t.1V=b(){h(7.1c=="3m"){X.O="6A::8o::"+7.c.C.Q+"::"+7.c.C.11+"::"+7.c.C.15+"::"+7.c.C.1C}F h(7.1c=="4X"){7.3o=x.11;j 6n="9G............................................................|";x.11=6n+7.c.C.Q+"|"+7.c.C.11+"|"+7.c.C.15+"|"+7.c.C.1C;}};2N.t.1W=b(){7.1V();h(7.c.I){7.c.4F()}};2A=b(c){7.c=c;7.Z=q;X.2G={};7.1l()};2A.t.1l=b(){7.Z=7.c.u.3l();j l="E://8n.26.3a/8m.6b";j o={2G:"8G"};7.c.u.6d(l,o,q,b(o){X.2G=o})};2A.t.3P=b(Z){w 7.c.u.3R(7.Z,Z)};2A.t.1W=b(){h(2G.4K===\'4I\'||2G.4K===\'8D\'){h(2G.4K===\'4I\'){3L{7V.7Y("81.80",[7.c.C.11,7.c.C.15,7.c.C.Q,\'\'])}3N(e){65.3M(e.7U)}}F{h(7.3P("9.9.0.0")){7.6h();6k.6f(7.c.C.11,7.c.C.15,7.c.C.Q,\'\',\'\',\'8c\',\'3k\')}F{O.1Y="8d:6f:"}}}F{7.c.u.25("85")}};2A.t.6h=b(){j B=x.1E("3k");h(!B){B=x.1a("B");B.H="3k";h(7.c.I)B.1j="E://V.9g.J/"+7.c.I+"/3S.1h";F B.1j="E://V.9g.J/3S.1h";B.1b="3k";x.19("1i")[0].1g(B)}};3q=b(c){7.c=c;7.Z=q;7.1c=q;7.1K=q;7.30=q;7.1l()};3q.t.1l=b(){7.1c=(2q.2p.1A(/(6G|6N|6S)/1o)?"3m":"4X")};3q.t.1W=b(){j 4s={7Q:"1W",11:7.c.C.11,l:7.c.C.Q,8i:7.c.C.1C,77:7.c.C.15};h(7.1c=="3m"){O.1Y="4O.7d://"+17(4W.6K(4s))}F h(X.4N&&4N.6T){4N.6T(4W.6K(4s))}};', 62, 659, '|||||||this||||function|game9g|||||if||var|_this|url|||data||null|||prototype|utils|options|return|document|||localStorage|img|shareData|spid|http|else|callback|id|gameid|com|Game9GUtils|div||wx|location|app|link|myuid|break|arguments|success|game|user|window|new|version||title|case|result|token|content||encodeURIComponent|mask|getElementsByTagName|createElement|className|type|baseurl|setParameter|ajax|appendChild|png|body|src|html|init|sessionStorage|Game9G|ig|getAppType|headimgurl|addEventListener|Game9GAuth|date|accessToken|apply|source|event|xmlhttp|innerHTML|match|name|imgurl|redirect|getElementById|obj|auth|getParameter|false|typeof|shareOK|score|test|menu|Game9GWx|value|true|replace|setTimeout|ua|1000|setShareData|share|action|href|call|indexOf|tab|fromid|key|extend|debug|uc|fail|touchstart|shareDomain|removeItem|level|length|btn|click|Math|random|reg|for|li|removeChild|switch|item|domain|errcode|userAgent|navigator|zhongsou|jsonparam|jsonpcallback|push|Date|buttons|dt|getRandomString|pklastuser|Game9GUC|Game9GUIMenu|notice|game9gmenu|pkuid|rnd|uc_param_str|theHead|isnewuser|paddNum|sessionid|memo|trans|Game9GApp|imgShare|timestamp|signature|color|label|target|game9g9gstart|country|city|province|parseInt|scriptControll|shareCancel|getTime|bonusTipCount|moreurl|isSubmitted|Game9GUtilsDialog|animalid|shareTip|tip|clear|cn|_czc|errmsg|res|CryptoJS|shareOKHandler|shareCancelHandler|desc|check|pm|game9gucicon|getAppVersion|iOS|uid|oldTitle|getSessionId|Game9GZhongsou|jsp|WeixinJSBridge|checkTask|搜悦游戏|9G游戏|zf|defaults|_setCustomVar|access_token|bgcolor|substr||cpid||pathname|noncestr|getEventUrl|isIOS|ul|parse|try|error|catch|origin|isVersionOver|game9gdialog|compareVersion|icon|open|unionid|fromuser|cancel|submit|homeurl|imgfinish||class|game9g9gstarttip|isLocal|in|heartbeat|object|encrypt|Game9GUtilsAjax|responseText|track|iv|game9gmask|enc|Utf8|finish|thisTime|timeout|isTest|afinish|footer|preventDefault|3000|describe|getPath|n2|rankScore|n1|sharedData|r2|RegExp|bonus|fromNickname|gameOrder|config|num|ready|checkTime|getuser|loginWx|shareLog|shareFlow|game9gmenumask|visible|android|show|fr|shareDomains|games|JavascriptInterface|souyue|base|str|https|buttonCancel|cneps|buttonOK|gzurl|JSON|Android|gameurl|min|game9gshareevent|timer|_ok_time|checkOKLoad|check_|Game9GUtilsJsonp|r1|connect|request|sec|getFromUser|checkOkSave|autoScore|responseData|cplogo|lastRankScore|game9gloading|initGame|substring|getEventToday|checkError|collect|scoreName|loading|HH|getDate|mm|format|ss|getFullYear|yyyy|MM|dd|getMonth|FFFFFF|dialog|style|section|h2|len|max|getRandomInt|zoo|autoSubmit|default|Game9GUIStart|status|ui|getNotice|header|fromurl|registerWx|loginForm|json|Game9GUI|version1|_|version2|close|search|game9gmenu_credit|sum|hide|XMLHttpRequest|method|slogan1||console|10000|lastTime|heartbeatTime|logView|cnzz_protocol|php|path|jsonp|mode|web_share|srcs|createIconImage|encrypted|string|ucbrowser|toString|isNaN|space|img_url|640|argv|invoke|err_msg|getFullUrl|ajaxUrl|initJsApi|now|onBridgeReady|script|text|appcall|uuid|onMenuShareAppMessage|onMenuShareTimeline|on|imgUrl|iPhone|game9gadbottom|animationend|isZhousouInstalled|stringify|game9gzhongsoutip|get|iPod|word|game9gad|interval|showAd|iPad|onJSClick|webkitAnimationEnd|goto9g|scanQRCode|linkResult|玩游戏|icon_01|getLocation|hideOptionMenu|closeWindow|start|showOptionMenu|chooseCard|login|description|Mac|openCard|gamecenter|bckurl|saveLink|onclick|chooseWXPay|addCard|openProductSpecificView|1200|previewImage|getcreditsum|downloadVoice|chooseImage|downloadImage|getNetworkType|credit|uploadImage|stopRecord|onRecordEnd|startRecord|undefined|stopVoice|uploadVoice|playVoice|pauseVoice|icon_03|大奖赛|个人中心|openLocation|一起玩|gototop|games_3|icon_02|进公众号|my_credit|gz_9g|icon_06|my|icon_04|icon_05|我的积分|refreshRankScore|wx_ver|category|connect2|connect3|order|message|ucweb|新用户|Base64|startRequest|老用户|page_share|shell|asc|getevent|是否立即领取|其它分享接口|去领取|放弃|getGameInfo|gameinfo|您的朋友|nickname|来自9G游戏|ext|gameshare|帮你赢得了一元话费|51h5|encode|image|game9gWxShareOk|sandroid|setbackurl|getucparam|hao|setwxshare|分享|_trackEvent|dataUrl|成功|getUser|100000|sios|2000|用户|istest|b1Atb251RGNNZktTeTRCdXp3NDFCMkpoNzR0OA|提交失败|game9gcom2014123|join|iphone|b1Atb251SzlpMHV6eXBZLTlmTkIwUm9VWl9NWQ|b1Atb251UG8tVnNWbDM3UVFvaUI4M2hJbUQyTQ|dnfrpfbivecpbtnt|b1Atb251RHpoRmtpa2M2YjhGbF9sUDRzQ28wTQ|b1Atb251T1ZmS0VubEhKSXdxTi1NQ3NuV2xvZw|b1Atb251R0xBLVRldGNjcGxGZmNLWlhsOXZ0bw|b1Atb251Qi1MbllvTkRTVjduc0c3eGlQUnlQNA|isAndroid|protocol|tongji|hostname|888888|unescape|取消|write|br|要求|ERROR|GET|heart|view|log|backgroundColor|3Cspan|3Fid|stat|cnzz|3D2947366|shareConfirm|javascript|second||sharetoevent|cnzz_stat_icon_2947366|确定|FF0000|span|s5||game9gsharemask|3Cscript|insertBefore|firstChild|escape|utf|delete|ex|charset|isappinstalled|pulse|bounceInLeft|game9glogo|infinite|bounceOutLeft|bounceInRight|game9glogo_up|zhongsou_share_ios|onreadystatechange|send|readyState|XMLHTTP|CBC|ActiveXObject|Microsoft||AES|documentElement|wx360a9785675a8653|zhongsou_share_android|head|200|DEBUG|alert|getQueryString|today|setHours|showMenuItems|132|setMilliseconds|getUrl|showAllNonBaseMenuItem|yy|game6|formatDate|hideAllNonBaseMenuItem|hideMenuItems|removeParameter|appId|getjsapisignature|wxe0fb670c408a3705|127|file|onMenuShareQQ|onMenuShareWeibo|api|getHead64|checkJsApi||getHead132|sendAppMessage|ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789|other|send_app_msg|Game9g|MicroMessenger|initWeixinJSBridge|linux|number|appmessage|WeixinJSBridgeReady|micromessenger|UCBrowser|img_height|img_width|nonceStr|jsApiList|share_timeline|getHours|getSeconds|timeline|translateVoice|shareTimeline|getMinutes'.split('|'), 0, {})); (function(u) {
    function p(b, n, a, c, e, j, k) {
        b = b + (n & a | ~n & c) + e + k;
        return (b << j | b >>> 32 - j) + n
    }
    function d(b, n, a, c, e, j, k) {
        b = b + (n & c | a & ~c) + e + k;
        return (b << j | b >>> 32 - j) + n
    }
    function l(b, n, a, c, e, j, k) {
        b = b + (n ^ a ^ c) + e + k;
        return (b << j | b >>> 32 - j) + n
    }
    function s(b, n, a, c, e, j, k) {
        b = b + (a ^ (n | ~c)) + e + k;
        return (b << j | b >>> 32 - j) + n
    }
    for (var t = CryptoJS,
    r = t.lib,
    w = r.WordArray,
    v = r.Hasher,
    r = t.algo,
    b = [], x = 0; 64 > x; x++) b[x] = 4294967296 * u.abs(u.sin(x + 1)) | 0;
    r = r.MD5 = v.extend({
        _doReset: function() {
            this._hash = new w.init([1732584193, 4023233417, 2562383102, 271733878])
        },
        _doProcessBlock: function(q, n) {
            for (var a = 0; 16 > a; a++) {
                var c = n + a,
                e = q[c];
                q[c] = (e << 8 | e >>> 24) & 16711935 | (e << 24 | e >>> 8) & 4278255360
            }
            var a = this._hash.words,
            c = q[n + 0],
            e = q[n + 1],
            j = q[n + 2],
            k = q[n + 3],
            z = q[n + 4],
            r = q[n + 5],
            t = q[n + 6],
            w = q[n + 7],
            v = q[n + 8],
            A = q[n + 9],
            B = q[n + 10],
            C = q[n + 11],
            u = q[n + 12],
            D = q[n + 13],
            E = q[n + 14],
            x = q[n + 15],
            f = a[0],
            m = a[1],
            g = a[2],
            h = a[3],
            f = p(f, m, g, h, c, 7, b[0]),
            h = p(h, f, m, g, e, 12, b[1]),
            g = p(g, h, f, m, j, 17, b[2]),
            m = p(m, g, h, f, k, 22, b[3]),
            f = p(f, m, g, h, z, 7, b[4]),
            h = p(h, f, m, g, r, 12, b[5]),
            g = p(g, h, f, m, t, 17, b[6]),
            m = p(m, g, h, f, w, 22, b[7]),
            f = p(f, m, g, h, v, 7, b[8]),
            h = p(h, f, m, g, A, 12, b[9]),
            g = p(g, h, f, m, B, 17, b[10]),
            m = p(m, g, h, f, C, 22, b[11]),
            f = p(f, m, g, h, u, 7, b[12]),
            h = p(h, f, m, g, D, 12, b[13]),
            g = p(g, h, f, m, E, 17, b[14]),
            m = p(m, g, h, f, x, 22, b[15]),
            f = d(f, m, g, h, e, 5, b[16]),
            h = d(h, f, m, g, t, 9, b[17]),
            g = d(g, h, f, m, C, 14, b[18]),
            m = d(m, g, h, f, c, 20, b[19]),
            f = d(f, m, g, h, r, 5, b[20]),
            h = d(h, f, m, g, B, 9, b[21]),
            g = d(g, h, f, m, x, 14, b[22]),
            m = d(m, g, h, f, z, 20, b[23]),
            f = d(f, m, g, h, A, 5, b[24]),
            h = d(h, f, m, g, E, 9, b[25]),
            g = d(g, h, f, m, k, 14, b[26]),
            m = d(m, g, h, f, v, 20, b[27]),
            f = d(f, m, g, h, D, 5, b[28]),
            h = d(h, f, m, g, j, 9, b[29]),
            g = d(g, h, f, m, w, 14, b[30]),
            m = d(m, g, h, f, u, 20, b[31]),
            f = l(f, m, g, h, r, 4, b[32]),
            h = l(h, f, m, g, v, 11, b[33]),
            g = l(g, h, f, m, C, 16, b[34]),
            m = l(m, g, h, f, E, 23, b[35]),
            f = l(f, m, g, h, e, 4, b[36]),
            h = l(h, f, m, g, z, 11, b[37]),
            g = l(g, h, f, m, w, 16, b[38]),
            m = l(m, g, h, f, B, 23, b[39]),
            f = l(f, m, g, h, D, 4, b[40]),
            h = l(h, f, m, g, c, 11, b[41]),
            g = l(g, h, f, m, k, 16, b[42]),
            m = l(m, g, h, f, t, 23, b[43]),
            f = l(f, m, g, h, A, 4, b[44]),
            h = l(h, f, m, g, u, 11, b[45]),
            g = l(g, h, f, m, x, 16, b[46]),
            m = l(m, g, h, f, j, 23, b[47]),
            f = s(f, m, g, h, c, 6, b[48]),
            h = s(h, f, m, g, w, 10, b[49]),
            g = s(g, h, f, m, E, 15, b[50]),
            m = s(m, g, h, f, r, 21, b[51]),
            f = s(f, m, g, h, u, 6, b[52]),
            h = s(h, f, m, g, k, 10, b[53]),
            g = s(g, h, f, m, B, 15, b[54]),
            m = s(m, g, h, f, e, 21, b[55]),
            f = s(f, m, g, h, v, 6, b[56]),
            h = s(h, f, m, g, x, 10, b[57]),
            g = s(g, h, f, m, t, 15, b[58]),
            m = s(m, g, h, f, D, 21, b[59]),
            f = s(f, m, g, h, z, 6, b[60]),
            h = s(h, f, m, g, C, 10, b[61]),
            g = s(g, h, f, m, j, 15, b[62]),
            m = s(m, g, h, f, A, 21, b[63]);
            a[0] = a[0] + f | 0;
            a[1] = a[1] + m | 0;
            a[2] = a[2] + g | 0;
            a[3] = a[3] + h | 0
        },
        _doFinalize: function() {
            var b = this._data,
            n = b.words,
            a = 8 * this._nDataBytes,
            c = 8 * b.sigBytes;
            n[c >>> 5] |= 128 << 24 - c % 32;
            var e = u.floor(a / 4294967296);
            n[(c + 64 >>> 9 << 4) + 15] = (e << 8 | e >>> 24) & 16711935 | (e << 24 | e >>> 8) & 4278255360;
            n[(c + 64 >>> 9 << 4) + 14] = (a << 8 | a >>> 24) & 16711935 | (a << 24 | a >>> 8) & 4278255360;
            b.sigBytes = 4 * (n.length + 1);
            this._process();
            b = this._hash;
            n = b.words;
            for (a = 0; 4 > a; a++) c = n[a],
            n[a] = (c << 8 | c >>> 24) & 16711935 | (c << 24 | c >>> 8) & 4278255360;
            return b
        },
        clone: function() {
            var b = v.clone.call(this);
            b._hash = this._hash.clone();
            return b
        }
    });
    t.MD5 = v._createHelper(r);
    t.HmacMD5 = v._createHmacHelper(r)
})(Math); (function() {
    var u = CryptoJS,
    p = u.lib,
    d = p.Base,
    l = p.WordArray,
    p = u.algo,
    s = p.EvpKDF = d.extend({
        cfg: d.extend({
            keySize: 4,
            hasher: p.MD5,
            iterations: 1
        }),
        init: function(d) {
            this.cfg = this.cfg.extend(d)
        },
        compute: function(d, r) {
            for (var p = this.cfg,
            s = p.hasher.create(), b = l.create(), u = b.words, q = p.keySize, p = p.iterations; u.length < q;) {
                n && s.update(n);
                var n = s.update(d).finalize(r);
                s.reset();
                for (var a = 1; a < p; a++) n = s.finalize(n),
                s.reset();
                b.concat(n)
            }
            b.sigBytes = 4 * q;
            return b
        }
    });
    u.EvpKDF = function(d, l, p) {
        return s.create(p).compute(d, l)
    }
})();
CryptoJS.lib.Cipher ||
function(u) {
    var p = CryptoJS,
    d = p.lib,
    l = d.Base,
    s = d.WordArray,
    t = d.BufferedBlockAlgorithm,
    r = p.enc.Base64,
    w = p.algo.EvpKDF,
    v = d.Cipher = t.extend({
        cfg: l.extend(),
        createEncryptor: function(e, a) {
            return this.create(this._ENC_XFORM_MODE, e, a)
        },
        createDecryptor: function(e, a) {
            return this.create(this._DEC_XFORM_MODE, e, a)
        },
        init: function(e, a, b) {
            this.cfg = this.cfg.extend(b);
            this._xformMode = e;
            this._key = a;
            this.reset()
        },
        reset: function() {
            t.reset.call(this);
            this._doReset()
        },
        process: function(e) {
            this._append(e);
            return this._process()
        },
        finalize: function(e) {
            e && this._append(e);
            return this._doFinalize()
        },
        keySize: 4,
        ivSize: 4,
        _ENC_XFORM_MODE: 1,
        _DEC_XFORM_MODE: 2,
        _createHelper: function(e) {
            return {
                encrypt: function(b, k, d) {
                    return ("string" == typeof k ? c: a).encrypt(e, b, k, d)
                },
                decrypt: function(b, k, d) {
                    return ("string" == typeof k ? c: a).decrypt(e, b, k, d)
                }
            }
        }
    });
    d.StreamCipher = v.extend({
        _doFinalize: function() {
            return this._process(!0)
        },
        blockSize: 1
    });
    var b = p.mode = {},
    x = function(e, a, b) {
        var c = this._iv;
        c ? this._iv = u: c = this._prevBlock;
        for (var d = 0; d < b; d++) e[a + d] ^= c[d]
    },
    q = (d.BlockCipherMode = l.extend({
        createEncryptor: function(e, a) {
            return this.Encryptor.create(e, a)
        },
        createDecryptor: function(e, a) {
            return this.Decryptor.create(e, a)
        },
        init: function(e, a) {
            this._cipher = e;
            this._iv = a
        }
    })).extend();
    q.Encryptor = q.extend({
        processBlock: function(e, a) {
            var b = this._cipher,
            c = b.blockSize;
            x.call(this, e, a, c);
            b.encryptBlock(e, a);
            this._prevBlock = e.slice(a, a + c)
        }
    });
    q.Decryptor = q.extend({
        processBlock: function(e, a) {
            var b = this._cipher,
            c = b.blockSize,
            d = e.slice(a, a + c);
            b.decryptBlock(e, a);
            x.call(this, e, a, c);
            this._prevBlock = d
        }
    });
    b = b.CBC = q;
    q = (p.pad = {}).Pkcs7 = {
        pad: function(a, b) {
            for (var c = 4 * b,
            c = c - a.sigBytes % c,
            d = c << 24 | c << 16 | c << 8 | c,
            l = [], n = 0; n < c; n += 4) l.push(d);
            c = s.create(l, c);
            a.concat(c)
        },
        unpad: function(a) {
            a.sigBytes -= a.words[a.sigBytes - 1 >>> 2] & 255
        }
    };
    d.BlockCipher = v.extend({
        cfg: v.cfg.extend({
            mode: b,
            padding: q
        }),
        reset: function() {
            v.reset.call(this);
            var a = this.cfg,
            b = a.iv,
            a = a.mode;
            if (this._xformMode == this._ENC_XFORM_MODE) var c = a.createEncryptor;
            else c = a.createDecryptor,
            this._minBufferSize = 1;
            this._mode = c.call(a, this, b && b.words)
        },
        _doProcessBlock: function(a, b) {
            this._mode.processBlock(a, b)
        },
        _doFinalize: function() {
            var a = this.cfg.padding;
            if (this._xformMode == this._ENC_XFORM_MODE) {
                a.pad(this._data, this.blockSize);
                var b = this._process(!0)
            } else b = this._process(!0),
            a.unpad(b);
            return b
        },
        blockSize: 4
    });
    var n = d.CipherParams = l.extend({
        init: function(a) {
            this.mixIn(a)
        },
        toString: function(a) {
            return (a || this.formatter).stringify(this)
        }
    }),
    b = (p.format = {}).OpenSSL = {
        stringify: function(a) {
            var b = a.ciphertext;
            a = a.salt;
            return (a ? s.create([1398893684, 1701076831]).concat(a).concat(b) : b).toString(r)
        },
        parse: function(a) {
            a = r.parse(a);
            var b = a.words;
            if (1398893684 == b[0] && 1701076831 == b[1]) {
                var c = s.create(b.slice(2, 4));
                b.splice(0, 4);
                a.sigBytes -= 16
            }
            return n.create({
                ciphertext: a,
                salt: c
            })
        }
    },
    a = d.SerializableCipher = l.extend({
        cfg: l.extend({
            format: b
        }),
        encrypt: function(a, b, c, d) {
            d = this.cfg.extend(d);
            var l = a.createEncryptor(c, d);
            b = l.finalize(b);
            l = l.cfg;
            return n.create({
                ciphertext: b,
                key: c,
                iv: l.iv,
                algorithm: a,
                mode: l.mode,
                padding: l.padding,
                blockSize: a.blockSize,
                formatter: d.format
            })
        },
        decrypt: function(a, b, c, d) {
            d = this.cfg.extend(d);
            b = this._parse(b, d.format);
            return a.createDecryptor(c, d).finalize(b.ciphertext)
        },
        _parse: function(a, b) {
            return "string" == typeof a ? b.parse(a, this) : a
        }
    }),
    p = (p.kdf = {}).OpenSSL = {
        execute: function(a, b, c, d) {
            d || (d = s.random(8));
            a = w.create({
                keySize: b + c
            }).compute(a, d);
            c = s.create(a.words.slice(b), 4 * c);
            a.sigBytes = 4 * b;
            return n.create({
                key: a,
                iv: c,
                salt: d
            })
        }
    },
    c = d.PasswordBasedCipher = a.extend({
        cfg: a.cfg.extend({
            kdf: p
        }),
        encrypt: function(b, c, d, l) {
            l = this.cfg.extend(l);
            d = l.kdf.execute(d, b.keySize, b.ivSize);
            l.iv = d.iv;
            b = a.encrypt.call(this, b, c, d.key, l);
            b.mixIn(d);
            return b
        },
        decrypt: function(b, c, d, l) {
            l = this.cfg.extend(l);
            c = this._parse(c, l.format);
            d = l.kdf.execute(d, b.keySize, b.ivSize, c.salt);
            l.iv = d.iv;
            return a.decrypt.call(this, b, c, d.key, l)
        }
    })
} (); (function() {
    for (var u = CryptoJS,
    p = u.lib.BlockCipher,
    d = u.algo,
    l = [], s = [], t = [], r = [], w = [], v = [], b = [], x = [], q = [], n = [], a = [], c = 0; 256 > c; c++) a[c] = 128 > c ? c << 1 : c << 1 ^ 283;
    for (var e = 0,
    j = 0,
    c = 0; 256 > c; c++) {
        var k = j ^ j << 1 ^ j << 2 ^ j << 3 ^ j << 4,
        k = k >>> 8 ^ k & 255 ^ 99;
        l[e] = k;
        s[k] = e;
        var z = a[e],
        F = a[z],
        G = a[F],
        y = 257 * a[k] ^ 16843008 * k;
        t[e] = y << 24 | y >>> 8;
        r[e] = y << 16 | y >>> 16;
        w[e] = y << 8 | y >>> 24;
        v[e] = y;
        y = 16843009 * G ^ 65537 * F ^ 257 * z ^ 16843008 * e;
        b[k] = y << 24 | y >>> 8;
        x[k] = y << 16 | y >>> 16;
        q[k] = y << 8 | y >>> 24;
        n[k] = y;
        e ? (e = z ^ a[a[a[G ^ z]]], j ^= a[a[j]]) : e = j = 1
    }
    var H = [0, 1, 2, 4, 8, 16, 32, 64, 128, 27, 54],
    d = d.AES = p.extend({
        _doReset: function() {
            for (var a = this._key,
            c = a.words,
            d = a.sigBytes / 4,
            a = 4 * ((this._nRounds = d + 6) + 1), e = this._keySchedule = [], j = 0; j < a; j++) if (j < d) e[j] = c[j];
            else {
                var k = e[j - 1];
                j % d ? 6 < d && 4 == j % d && (k = l[k >>> 24] << 24 | l[k >>> 16 & 255] << 16 | l[k >>> 8 & 255] << 8 | l[k & 255]) : (k = k << 8 | k >>> 24, k = l[k >>> 24] << 24 | l[k >>> 16 & 255] << 16 | l[k >>> 8 & 255] << 8 | l[k & 255], k ^= H[j / d | 0] << 24);
                e[j] = e[j - d] ^ k
            }
            c = this._invKeySchedule = [];
            for (d = 0; d < a; d++) j = a - d,
            k = d % 4 ? e[j] : e[j - 4],
            c[d] = 4 > d || 4 >= j ? k: b[l[k >>> 24]] ^ x[l[k >>> 16 & 255]] ^ q[l[k >>> 8 & 255]] ^ n[l[k & 255]]
        },
        encryptBlock: function(a, b) {
            this._doCryptBlock(a, b, this._keySchedule, t, r, w, v, l)
        },
        decryptBlock: function(a, c) {
            var d = a[c + 1];
            a[c + 1] = a[c + 3];
            a[c + 3] = d;
            this._doCryptBlock(a, c, this._invKeySchedule, b, x, q, n, s);
            d = a[c + 1];
            a[c + 1] = a[c + 3];
            a[c + 3] = d
        },
        _doCryptBlock: function(a, b, c, d, e, j, l, f) {
            for (var m = this._nRounds,
            g = a[b] ^ c[0], h = a[b + 1] ^ c[1], k = a[b + 2] ^ c[2], n = a[b + 3] ^ c[3], p = 4, r = 1; r < m; r++) var q = d[g >>> 24] ^ e[h >>> 16 & 255] ^ j[k >>> 8 & 255] ^ l[n & 255] ^ c[p++],
            s = d[h >>> 24] ^ e[k >>> 16 & 255] ^ j[n >>> 8 & 255] ^ l[g & 255] ^ c[p++],
            t = d[k >>> 24] ^ e[n >>> 16 & 255] ^ j[g >>> 8 & 255] ^ l[h & 255] ^ c[p++],
            n = d[n >>> 24] ^ e[g >>> 16 & 255] ^ j[h >>> 8 & 255] ^ l[k & 255] ^ c[p++],
            g = q,
            h = s,
            k = t;
            q = (f[g >>> 24] << 24 | f[h >>> 16 & 255] << 16 | f[k >>> 8 & 255] << 8 | f[n & 255]) ^ c[p++];
            s = (f[h >>> 24] << 24 | f[k >>> 16 & 255] << 16 | f[n >>> 8 & 255] << 8 | f[g & 255]) ^ c[p++];
            t = (f[k >>> 24] << 24 | f[n >>> 16 & 255] << 16 | f[g >>> 8 & 255] << 8 | f[h & 255]) ^ c[p++];
            n = (f[n >>> 24] << 24 | f[g >>> 16 & 255] << 16 | f[h >>> 8 & 255] << 8 | f[k & 255]) ^ c[p++];
            a[b] = q;
            a[b + 1] = s;
            a[b + 2] = t;
            a[b + 3] = n
        },
        keySize: 8
    });
    u.AES = p._createHelper(d)
})();