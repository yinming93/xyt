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
} ('1r=c(L,3J){7.L=L||q;7.Y=q;7.3J=3J||q;7.G=q;7.1z=q;7.3b=q;7.25=q;7.3z=q;7.1d="H://9g.7o.35";7.5a=q;7.48=q;7.4L=q;7.3q=q;7.1E=q;7.45=q;7.2c=q;7.4Q=["4y.35","4y.35","4y.35"];7.D={1M:"H://Y.9g.I/3M.1l",V:7.1d,S:"47",13:"47"};7.J=q;7.15=q;7.2G=1Q;7.1H=q;7.2T=q;7.2S=q;7.v=12 N(7);7.1C=12 1y(7);7.1n()};1r.u.1n=c(){7.G=7.v.1J("G");7.1z=7.v.1J("1z");7.3b=7.v.1J("3b");7.25=7.v.1J("K");7.2G=(7.v.1J("f")=="44");7.48=7.1d+"/8s.1g"+(7.G?"?G="+7.G:"");7.4L=7.1d+"/8m.1g"+(7.G?"?G="+7.G:"");7.3q=(7.2G?7.4L:7.48);7.2c=7.4Q[3t(1W.2b()*7.4Q.2k)];7.2T=7.v.1J("2T");7.2S=7.v.1J("2S");2j(7.v.1c()){U"P":7.J=12 20(7);R;U"9g":7.J=12 2X(7);R;U"1q":7.J=12 2g(7);R;U"27":7.J=12 2Y(7);R;U"2o":7.J=12 4a(7);R;U"4k":7.J=12 55(7);R};h(7.L){7.6X()};j k=7;1B(c(){k.v.5g()},1X);1B(c(){k.v.6N()},8D);h(7.46()&&7.v.3X()=="/8E/7g.1g"){1B(c(){j a=A.1a("a");a.1Y="1v.1g";a.1F="7Z";A.18("1b")[0].1h(a)},6y)}};1r.u.6X=c(){j k=7;7.5a="/7S.1g?L="+7.L+(7.G?"&G="+7.G:"")+(C.T?"&K="+C.T:"")+"&f=44"+"&2u="+7.2c;7.D.1M="H://Y.9g.I/"+7.L+"/3M.1l";7.D.V="H://"+3t(1W.2b()*7R)+"."+7.L+"."+7.2c+7.5a;h(7.G=="8f"){7.v.73()}E{7.v.5w()};h(!7.G||7.G=="27"||7.G=="9g"){h(7.v.1c()=="9g"&&7.J&&7.J.X=="1.0.5"&&7.v.41()){}E{7.6v=12 6w(7)}};h(7.v.1c()=="9g"&&7.v.41()){1B(c(){11.Q="5Z::8g::"+k.1d+"/J/4B.1g?r="+1W.2b()},1X)};7.6W();h(7.v.1c()=="1q"){7.J.5m()};1B(c(){k.6Z()},1X);1B(c(){k.v.7e()},6y);h(7.v.1c()=="P"||7.v.1c()=="9g"){1B(c(){k.5e()},3V)};3s.2v(["3U","8i",(7.2G?"86":"8a"),1]);3s.2v(["3U","L",7.L,1]);3s.2v(["3U","G",7.G,1]);h(7.v.1c()=="P"){3s.2v(["3U","89",7.J.X,1])}};1r.u.6W=c(){h(C.1x){j l="H://P.9g.I/1C/85?L="+7.L+"&3h="+C.1x+(7.G?"&G="+7.G:"")+(7.25?"&3g="+7.25:"");j k=7;7.v.1e(l,c(o){h(o.2q){k.1C.31();k.15=q}E{C.T=o.3g;k.15=k.v.2a(k.15,o.15);k.Y=o.Y;}})}E{j l="H://P.9g.I/1C/8c?L="+7.L+(7.G?"&G="+7.G:"")+(7.v.1J("f")=="44"?"&f=44":"");j k=7;7.v.1e(l,c(o){k.Y=o.Y;})}};1r.u.5e=c(){h(!7.46())B;h(C.T&&!b.15){C.3v=C.3v||0;h(C.3v&&C.3v<3){j k=7;7.1C.74(c(){j 5q="";h(k.3z)5q=k.3z.8G;k.v.5U({S:"47",13:"8I"+5q+"7F，7D？",2R:[{3a:"7O",2n:c(){11.Q=k.1d+"/5e/12.1g"}},{3a:"7G",2n:q}]});C.3v++})}}};1r.u.7I=c(L,F){7.v.1e("H://P.9g.I/J/7P?L="+L,F)};1r.u.4c=c(){B 7.1d+"/J/1H.1g?r="+1W.2b()};1r.u.6Z=c(F){j l="H://P.9g.I/1H/7v?L="+7.L+(C.T?"&3g="+C.T:"");j k=7;7.v.1e(l,c(o){h(o.15)k.15=k.v.2a(k.15,o.15);h(o.Y)k.Y=o.Y;h(o.1H)k.1H=o.1H;h(k.15&&(k.G==q||k.G=="27")){k.2G=1Q;k.3q=k.48};F&&F.1s(k)})};1r.u.1G=c(D){h(D)7.D=7.v.2a(7.D,D);h(7.J&&7.J.1G)7.J.1G()};1r.u.1N=c(){7.J&&7.J.1N()};1r.u.4Y=c(w,F){j l="H://P.9g.I/J/7z";h(w.L)l=7.v.1m(l,"L",w.L);h(w.G)l=7.v.1m(l,"G",w.G);h(w.K)l=7.v.1m(l,"K",w.K);h(w.1z)l=7.v.1m(l,"1z",w.1z);h(w.1i)l=7.v.1m(l,"1i",w.1i);h(w.2u)l=7.v.1m(l,"2u",w.2u);7.v.1e(l,c(o){F&&F.1s(q)})};1r.u.5n=c(){j k=7;h(7.2G&&7.G&&7.G!="9g"&&7.G!="27"&&7.G!="2o"&&7.G!="7C"){7.J.1L=c(){11.Q=k.3q};7.v.38();B};h(7.1H){h(7.1H.L==7.L){7.J.1L=c(){h(!k.3u||k.3u&&k.1E!=k.5W){k.4b(c(){11.Q=k.4c()})}E{11.Q=k.4c()}};7.v.38()}E{7.J.1L=c(){11.Q=k.4c()};7.v.38()}}E{7.J.1L=c(){11.Q=k.3q};7.v.38()}};1r.u.6d=c(F){j k=7;h(C.T&&7.1E!=q&&7.1E>0){h(!7.3u||7.3u&&(7.5k=="7B"&&7.1E<7.5b||7.5k=="42"&&7.1E>7.5b)){7.4b(c(o){h(o.14){k.3u=1Z;k.5k=o.7A;k.5b=o.7K||o.6m==-1?k.1E:o.6m;k.5W=k.1E;h(k.J&&k.J.43)k.J.43.1T(q,o);F&&F.1s(q)}})}}};1r.u.4b=c(F){h(!C.T){B};h(7.1E==q||6M(7.1E)){B};j 2T=(7.25&&7.25!=C.T?7.25:"");j 2L="";h(2T&&!7.2L){2L="y";7.2L=1Z};j 2S=(7.2S?"y":"");j a=[7.L,C.T,7.1E,19(7.45),19(7.D.S),2T,2L,2S];j o=7H.7J(7.v.4v("7i",a.7q("|")));j l="H://P.9g.I/1H/4b?o="+o+(7.1z?"&1z="+7.1z:"");j k=7;7.v.1e(l,c(o){h(o.14){k.v.29(o);F&&F.1T(q,o)}E{k.v.29("7m")}})};1r.u.6q=c(39,13,F){j l="H://7r.9g.I/7s/7p?Z="+C.Z+"&7n="+39+"&13="+19(13);7.v.1e(l,c(o){F&&F.1T(q,o)})};1r.u.46=c(){B(7.v.1J("8t")=="y"||C.T=="8w=="||C.T=="8z=="||C.T=="8y=="||C.T=="8x=="||C.T=="8n=="||C.T=="8l=="||C.T=="8o=="||C.T=="8r=="||C.T=="8p==")};1y=c(b){7.b=b};1y.u.3O=c(w){j 4e={2e:"K",1t:Q.1Y,14:q,2i:q};w=7.b.v.2a(4e,w);h(7.5Y()){w.2i&&w.2i.1s(q);B};h(7.5y(w,10)){w.14&&w.14.1s(q);B};h(w.2e=="K"&&!C.1x){7.3y(w)}E h(w.2e=="15"&&!C.Z){7.3y(w)}E{j l="H://P.9g.I/J/3O";h(w.2e=="K")l+="?3h="+C.1x;h(w.2e=="15")l+="?Z="+C.Z;j k=7;7.b.v.1e(l,c(o){h(o&&o.14){k.6h(w,o);w.14&&w.14.1s(q)}E{k.31();k.3y(w)}})}};1y.u.5Y=c(){h(1o.2q&&1o.3m){7.b.v.29("2q = "+1o.2q+", 3m = "+1o.3m);1o.2d("2q");1o.2d("3m");7.31();B 1Z};B 1Q};1y.u.31=c(){C.2d("1x");C.2d("Z");C.2d("T");C.2d("3H")};1y.u.6h=c(w,o){7.31();h(o.1x)C.1x=o.1x;h(o.Z)C.Z=o.Z;h(o.T)C.T=o.T;h(o.3H)C.3H=o.3H;j 23="5D"+w.2e+"5t";1o[23]=12 2C().2Q()};1y.u.5y=c(w,5H){j 23="5D"+w.2e+"5t";h(1o[23]){j 5j=1o[23];1o.2d(23);h(5j&&(12 2C().2Q()-5j)<=5H*1X)B 1Z};B 1Q};1y.u.3y=c(w){2j(w.2e){U"K":h(7.b.v.1c()=="P"){7.5l(w.1t)}E h(7.b.v.1c()=="1q"){7.b.J.3j(w.1t)}E{w.2i&&w.2i.1s(q)};R;U"15":h(7.b.v.1c()=="P"){h(!C.1x){7.5l(w.1t)}E{7.78(w.1t)}}E h(7.b.v.1c()=="1q"){7.b.J.3j(w.1t)}E{7.6C(w.1t)};R}};1y.u.8F=c(F){h(!C.Z){F&&F.1T(q,q)}E{j k=7;j l="H://P.9g.I/J/5o?Z="+C.Z;7.b.v.1e(l,c(o){h(o.2q){C.2d("Z");k.b.15=q;F&&F.1T(q,q)}E{k.b.15=k.b.v.2a(k.b.15,o);F&&F.1T(q,o)}})}};1y.u.74=c(){j K=7.b.25;j F=q;2j(W.2k){U 1:h(1R W[0]=="6L")K=W[0];h(1R W[0]=="c")F=W[0];R;U 2:K=W[0];F=W[1];R};h(K){j k=7;j l="H://P.9g.I/J/5o?K="+K;7.b.v.1e(l,c(o){j 15=q;h(o.2q){k.b.v.29(o.3m)}E{15=o;k.b.3z=15};F&&F.1T(q,15)})}E{F&&F.1T(q,q)}};1y.u.5l=c(1t){j 2D=7.b.1d+"/1C/2D.J.1g?2y="+19(1t);j l="H://P.9g.I/1C/3O?6z="+19(2D)+"&2K="+7.b.v.3P();11.Q.1V(l)};1y.u.78=c(1t){j 2D=7.b.1d+"/1C/2D.J.1g?2y="+19(1t);j 14="H://P.9g.I/1C/3O?6z="+19(2D)+"&2K="+7.b.v.3P();j 2i=7.b.1d+"/J/4B.1g";j l="H://P.9g.I/1C/5o?14="+19(14)+"&2i="+19(2i)+(7.b.G?"&G="+7.b.G:"");11.Q.1V(l)};1y.u.6C=c(1t){j l=7.b.1d+"/J/3j.1g?7h="+19(1t);11.Q=l};1y.u.8e=c(F){j K=7.b.25;h(K&&C.1x&&K!=C.T){j l="H://P.9g.I/1C/V?3h="+C.1x+"&K="+K;j k=7;7.b.v.1e(l,c(o){j 17=0;h(o.3D){k.b.v.29(o);17=-1}E{17=o.8d};F&&F.1T(q,17)})}E{F&&F.1T(q,-1)}};6w=c(b){7.b=b;7.87=12 6u(b);7.22=12 2V(b)};6u=c(b){7.b=b;j a=A.1a("a");a.K="3k";a.1k="3k";j k=7;a.1w("2m",c(1H){k.b.6v.22.4N();1H.4I()});A.18("1b")[0].1h(a);};2V=c(b){7.b=b;7.4X=1Q;7.1n()};2V.u.1n=c(){j O=A.1a("O");O.K="2W";O.1k="2W";j 3x=A.1a("3x");2t(j i=1;i<=6;i++){j 2x=A.1a("2x");j x=A.1a("x");j a=A.1a("a");j V=7.b.1d;2j(i){U 1:a.1F="8b　";x.1j="H://Y.9g.I/x/22/88.1l";V=7.b.1d+"/J/4B.1g";R;U 2:a.1F="8h　";x.1j="H://Y.9g.I/x/22/8j.1l";V=7.b.1d+"/J/7U.1g";R;U 3:a.1F="7V　";x.1j="H://Y.9g.I/x/22/7W.1l";V=7.b.1d+"/J/1H.1g";R;U 4:a.1F="7T";x.1j="H://Y.9g.I/x/22/7Q.1l";V=7.b.1d+"/J/7g.1g";R;U 5:2x.K="5G";a.1F="7X";x.1j="H://Y.9g.I/x/22/82.1l";V=7.b.1d+"/J/83.1g";R;U 6:a.1F="84";x.1j="H://Y.9g.I/x/22/81.1l";V=7.b.1d+"/7Y.1g";R};2x.1h(x);2x.1h(a);(c(V){2x.1w("2m",c(){11.Q=V})})(V);3x.1h(2x)};O.1h(3x);A.18("1b")[0].1h(O);7.71()};2V.u.71=c(){h(C.Z){j l="H://P.9g.I/80/8k?6a=0&Z="+C.Z;7.b.v.1e(l,c(o){h(o&&o.5F>0){j O=A.1a("O");O.1k="2L";O.1F="+"+o.5F;A.1U("5G").1h(O)}})}};2V.u.4N=c(){j O=A.1U("2W");O.1k="2W 4N";j 1f=A.1a("O");1f.K="4R";1f.1k="4R";A.18("1b")[0].1h(1f);j k=7;1f.1w("2m",c(){k.5N()});7.4X=1Z};2V.u.5N=c(){j O=A.1U("2W");O.1k="2W";j 1f=A.1U("4R");h(1f)A.18("1b")[0].2l(1f);7.4X=1Q};N=c(b){7.b=b};N.u.2a=c(36,w){h(36==8A||36==q){B w}E{h(w){2t(1P 52 w){36[1P]=w[1P]}};B 36}};N.u.41=c(){B/6k|6l|62|8B/1p.1v(2B.2p)};N.u.8C=c(){B/3A|8H/i.1v(2B.2p)};N.u.1c=c(){j 1D=2B.2p;h(/8M/1p.1v(1D)){B"P"}E h(/b/1p.1v(1D)){B"9g"}E h(/1q/1p.1v(1D)){B"1q"}E h(/6Y/1p.1v(1D)){B"27"}E h(/53/1p.1v(1D)){B"2o"}E h(/I\\.8N\\.4k/1p.1v(1D)){B"4k"}E{B"8O"}};N.u.3l=c(){j 17=q;j X=q;j 1D=2B.2p;2j(7.1c()){U"P":17=1D.1I(/8L\\/([^\\s]+)/i);h(17)X=17[1];R;U"9g":17=1D.1I(/8J\\s([^\\s]+)/i);h(17)X=17[1];R;U"1q":17=1D.1I(/8K\\/([^\\s]+)/i);h(17)X=17[1];R;U"27":17=1D.1I(/8q\\/([^\\s]+)/i);h(17)X=17[1];R;U"2o":17=1D.1I(/53\\/([^\\s]+)/i);h(17)X=17[1];R};B X};N.u.3Q=c(65,67){j 66=65.1I(/(\\d+)(?!\\d)/1p);j 4J=67.1I(/(\\d+)(?!\\d)/1p);j 17=1Z;2t(j i=0;i<99;i++){h(4J.2k<i+1){17=1Z;R};j 54=3t(66[i]);j 58=3t(4J[i]);h(54!=58){17=(54>58);R}};B 17};N.u.5h=c(){B/(8u:\\/\\/)|(8v\\.0\\.0.1)/1p.1v(Q.1Y)};N.u.7t=c(){h(Q.2y&&Q.4d){B Q.2y+Q.4d}E{B Q.1Y.1I(/[^?#]+/i)[0]}};N.u.6b=c(){B Q.1Y.1I(/[^#;]+/i)[0]};N.u.3X=c(){h(Q.4d){B Q.4d}E{B Q.1Y.1I(/(?:H|5d):\\/\\/[^\\/]+([^?#;]+)/i)[1]}};N.u.7j=c(){B Q.6g};N.u.1J=c(1P){j 2f=12 4m("(^|&)"+1P+"=([^&]*)(&|$)","i");j r=11.Q.6g.4h(1).1I(2f);h(r!=q)B r[2];B q};N.u.1m=c(l,1P,21){l=l.1V(/(#.*)/1p,"");j 2f=12 4m("([\\?&])"+1P+"=([^&]*)(?=&|$)","i");h(2f.1v(l)){B l.1V(2f,"$1"+1P+"="+21)}E{B l+(l.1O("?")==-1?"?":"&")+1P+"="+21}};N.u.7l=c(l,1P){l=l.1V(/(#.*)/1p,"");j 2f=12 4m("([\\?&])"+1P+"=([^&]*)(?=&|$)","i");h(2f.1v(l)){l=l.1V(2f,"");h(l.1O("?")==-1)l=l.1V("&","?")};B l};N.u.7L=c(1u){h(!1u)B"H://Y.9g.I/4H.1l";h(1u.1O("/0")!=-1){1u=1u.4h(0,1u.2k-2)+"/64"};B 1u};N.u.7u=c(1u){h(!1u)B"H://Y.9g.I/4H.1l";h(1u.1O("/0")!=-1){1u=1u.4h(0,1u.2k-2)+"/7E"};B 1u};N.u.5c=c(){j 2H=12 2C();2H.7w(0);B 2H.2Q()/1X};N.u.7y=c(){j 2H=12 2C();2H.7x(0,0,0,0);B 2H.2Q()/1X};N.u.6A=c(){j 1A=W[0];j 4w=W[1]||"4u-3F-4j 4q:4r:4s";h(1R 1A=="7M"){1A=12 2C(1A*1X)};j 2P=c(4n){4n+="";B 4n.1V(/^(\\d)$/,"0$1")};j 5p={4u:1A.6K(),7N:1A.6K().6G().6n(2),M:1A.6I()+1,3F:2P(1A.6I()+1),d:1A.6R(),4j:2P(1A.6R()),4q:2P(1A.7k()),4r:2P(1A.8P()),4s:2P(1A.aN())};B 4w.1V(/([a-z])(\\1)*/1p,c(m){B 5p[m]})};N.u.aM=c(){j t=W[0];j 4w=W[1]||"4u-3F-4j 4q:4r:4s";h(t aP 2C){t=t.2Q()/1X};j 2E="";j 2J=7.5c()-t;h(2J<60){2E="aO"}E h(2J<60*60){2E=1W.6E(2J/60)+"aL"}E h(2J<60*60*24){2E=1W.6E(2J/60/60)+"aI"}E{2E=7.6A(t,"3F-4j")};B 2E};N.u.72=c(59,6V){B 3t((1W.2b()*(6V-59+1))+59)};N.u.2F=c(76){j 4z="aH";j 4o="";2t(j i=0;i<76;i++){j n=7.72(1,4z.2k)-1;4o+=4z.4h(n,1)};B 4o};N.u.3P=c(){h(!1o.2K){1o.2K=7.2F(40)};B 1o.2K};N.u.aK=c(13,F){j k=7;7.b.6d(c(){h(k.b.1z=="6j"){11.Q=k.b.1d+"/6j/aJ.1g?3b="+k.b.3b;B};h(k.b.1z=="aQ"){j 39=k.1J("o");h(39){k.b.6q(39,k.b.D.S,c(o){4Z.6O(o)})}}});h(7.b.G=="2o"){h(7.b.D.S.1O("4i")==-1)7.b.D.S+="[4i]";h(7.b.D.13.1O("4i")==-1)7.b.D.13+="[4i]"};h(7.1c()=="4k"){h(7.b.D.S.1O("2U")==-1)7.b.D.S+="[2U]";h(7.b.D.13.1O("2U")==-1)7.b.D.13+="[2U]"};1B(c(){2j(k.1c()){U"P":7.b.1G();R;U"9g":F&&F.1s(q);R;U"1q":k.b.1G();R;4H:h(k.b.J){h(aX(13)){F&&F.1s(q)}};R}},aW)};N.u.38=c(){h(A.1U("4x"))B;j 2N=A.1a("x");2N.K="4x";2N.1j="H://Y.9g.I/x/aZ.1l";2N.1k="4x";A.18("1b")[0].1h(2N);j 1f=A.1a("O");1f.1k="aY";A.18("1b")[0].1h(1f);1f.1w("2m",c(){A.18("1b")[0].2l(1f);A.18("1b")[0].2l(2N);})};N.u.5U=c(w){12 34(7.b,w).3W()};34=c(b,w){7.b=b;j 4e={S:"47",13:"",2R:[],51:q,50:q};7.w=7.b.v.2a(4e,w);7.1n()};34.u.1n=c(){h(7.w.51){7.w.2R.2v(7.b.v.2a({3a:"aV",3c:"#5I",4f:"#aS",2n:q},7.w.51))};h(7.w.50){7.w.2R.2v(7.b.v.2a({3a:"aR",3c:"#5I",4f:"#aU",2n:q},7.w.50))}};34.u.3W=c(){h(A.1U("49"))B;j O=A.1a("O");O.K="49";O.1k="49";O.1F="<5O><5M>"+7.w.S+"</5M></5O><5s>"+7.w.13.1V(/\\n/g,"<br/>")+"</5s><57></57>";j k=7;2t(j i=0;i<7.w.2R.2k;i++){(c(2h){j a=A.1a("a");a.1F=2h.3a;h(2h.3c)a.2r.3c=2h.3c;h(2h.4f)a.2r.aT=2h.4f;a.1w("2m",k.6c);a.1w("2m",c(e){2h.2n&&2h.2n.1s(k.b);e.4I()});O.18("57")[0].1h(a)})(7.w.2R[i])};A.18("1b")[0].1h(O);j 1f=A.1a("O");1f.K="4O";1f.1k="4O";A.18("1b")[0].1h(1f)};34.u.6c=c(e){j O=A.1U("49");h(O)A.18("1b")[0].2l(O);j 1f=A.1U("4O");h(1f)A.18("1b")[0].2l(1f);e.4I()};N.u.1e=c(l,14){l=7.b.v.1m(l,"5V",1W.2b());12 4K(7.b,"aG",l,q,"5X",14)};N.u.6T=c(l,o,2z,14){l=7.b.v.1m(l,"5V",1W.2b());12 61(l,o,2z,14).5C()};4K=c(b,68,l,o,1i,14){7.b=b;7.1K=q;h(11.63){7.1K=12 63()}E{7.1K=12 at("as.av")};7.1i=1i;7.14=14;7.1K.3W(68,l,1Z);j k=7;7.1K.au=c(){k.F.1s(k)};7.1K.ar(o)};4K.u.F=c(){h(7.1K.ao==4&&7.1K.6a==an){j o=q;2j(7.1i){U"7d":o=7.1K.4T;R;U"5X":3S{o=2w.3R(7.1K.4T)}3Y(e){o=7.1K.4T};R};7.14&&7.14.1T(7.1K,o)}};61=c(l,o,2z,14,4S){j 4P=1Q;j 2I=A.18("aq")[0]||A.ap;j 3d=A.1a("6r");j 2A="2A"+(1W.2b()+"").6n(2);j 5B=c(){h(2I!=q){2I.2l(3d);3S{aw 11[2A]}3Y(aD){};2I=q}};j 1n=c(){3d.aC="aF-8";2I.aE(3d,2I.aB);11[2A]=c(6f){4P=1Z;14(6f)};2z=2z||"F";h(l.1O("?")>0){l=l+"&"+2z+"="+2A}E{l=l+"?"+2z+"="+2A};h(1R o=="4t"&&o!=q){2t(j p 52 o){l=l+"&"+p+"="+ay(o[p])}}};j 5u=c(){h(1R 11[2A]=="c"){5B()};h(1R 4S=="c"&&4P==1Q){4S()}};7.5C=c(){1n();3d.1j=l;11.1B(5u,6Q)}};N.u.5w=c(){j O=A.1a("O");O.K="5v";O.1k="5v";h(7.b.3J){O.1F="<x 3K=\'ax\' 1j=\'H://Y.9g.I/x/5Q.1l\' /><x 3K=\'5P\' 1j=\'H://Y.9g.I/"+7.b.L+"/5P.1l\' />"}E{O.1F="<x 3K=\'aA\' 1j=\'H://Y.9g.I/x/5Q.1l\' />"};h(1o.G){O.1F+="<x 3K=\'5S\' 1j=\'H://Y.9g.I/5S/"+1o.G+".1l\' />"};A.18("1b")[0].1h(O);j 70=((7.1c()=="9g"||7.1c()=="1q")?1X:3V);1B(c(){A.18("1b")[0].2l(O);j a=A.1U("3k");h(a){a.1k="3k az";j 56=c(){a.1k="3k bq bk";j x=A.1U("4M");h(x){x.1k="4M bh";j 4W=c(){1B(c(){x.1k="4M bm"},1X)};x.1w("5K",4W);x.1w("5J",4W)}};a.1w("5K",56);a.1w("5J",56)}},70)};N.u.73=c(){j x=A.1a("x");x.1j="H://Y.9g.I/x/bl.bo";x.2r.bn="bi";x.2r.bj=bp;x.2r.bg="b5%";x.2r.b4=0;x.2r.b7=0;A.18("1b")[0].1h(x);A.S="2U";1B(c(){A.18("1b")[0].2l(x);A.S="2U"},3V)};N.u.7e=c(){h(7.b.G=="27"&&7.1c()!="27"){j l="H://P.9g.I/3L/7c.3Z?G="+7.b.G;7.1e(l,c(o){h(o.ad){j x=A.1a("x");x.K="7f";x.1j=o.ad.1M;x.1k="7f";x.1w("2m",c(){11.Q="H://P.9g.I/3L/2n.3Z?K="+o.ad.K});A.18("1b")[0].1h(x)}})};h(7.b.G=="2o"&&7.1c()!="2o"){j 7a=(7.1J("b6")=="1");j l="H://P.9g.I/3L/7c.3Z?G="+7.b.G;j k=7;7.1e(l,c(o){h(o.ad){j x=A.1a("x");x.K="7b";x.1k="7b";x.1j=o.ad.1M;x.1w("2m",c(){h(7a){h(k.1c()=="P"){j 3o=A.1a("x");3o.K="79";3o.1k="79";3o.1j="H://Y.9g.I/x/"+(k.41()?"b1.1l":"b0.1l");A.18("1b")[0].1h(3o)}E{11.Q="b3://"}}E{11.Q="H://P.9g.I/3L/2n.3Z?K="+o.ad.K}});A.18("1b")[0].1h(x)}})}};N.u.29=c(1S){h(7.b.46()){b2("[bd]\\n"+7.4p(1S))}};N.u.4p=c(1S,26){26=26||"";j 13="";h(1R 1S=="4t"&&1S!=q){2t(j 2s 52 1S){h(1R 1S[2s]=="4t"&&1S[2s]!=q)13+=26+2s+" = \\n"+26+"(\\n"+7.4p(1S[2s],26+"    ")+26+")\\n";E 13+=26+2s+" = "+1S[2s]+"\\n"}}E{13+=26+1S};B 13};N.u.4v=c(23,6x){j 4F=3i.4E.4D.3R(23);j 6P=3i.4E.4D.3R(6x);j 6H=3i.bc.4v(6P,3i.4E.4D.3R(23),{4F:4F,6S:3i.6S.bf});B 6H.6G()};N.u.4C=c(){j 28=q;j 21=q;j 2O=q;j F=q;2j(W.2k){U 1:28=W[0];R;U 2:28=W[0];h(!6M(W[1]))21=W[1];h(1R W[1]=="c")F=W[1];R;U 3:28=W[0];21=W[1];h(1R W[2]=="6L")2O=W[2];h(1R W[2]=="c")F=W[2];R;U 4:28=W[0];21=W[1];2O=W[2];F=W[3];R};h(28==q){7.29("4C be: b9 28");B};j l="H://P.9g.I/3W/4C?28="+19(28);h(21!=q)l=7.1m(l,"21",21);h(2O!=q)l=7.1m(l,"2O",19(2O));h(7.b.L)l=7.1m(l,"L",7.b.L);h(C.T)l=7.1m(l,"3g",C.T);7.1e(l,c(o){h(o.14){F&&F.1s(q)}})};N.u.5g=c(){h(7.5h())B;j 6U=1o.6J||0;j 5f=12 2C().2Q();h(5f-6U<3V)B;E 1o.6J=5f;j 2M=7.b.v.2F(10);j l="H://P.9g.I/J/b8/"+2M+"?l="+19(Q.1Y)+"&6s="+19(7.3X());h(7.b.L)l+="&L="+7.b.L;h(C.Z)l+="&Z="+C.Z;h(C.1x)l+="&3h="+C.1x;l+="&2K="+7.3P();j k=7;7.1e(l,c(o){h(o.K){}});1B(c(){k.5g()},6Q)};N.u.6N=c(){h(7.5h())B;j 2M=7.b.v.2F(10);j l="H://P.9g.I/6O/bb/"+2M+"?l="+19(Q.1Y)+"&6s="+19(7.3X())+"&2u="+Q.ba;h(C.T)l=7.1m(l,"K",C.T);h(C.Z)l=7.1m(l,"Z",C.Z);h(7.b.15){j 3e=7.b.15.3e||"";j 3f=7.b.15.3f||"";j 3n=7.b.15.3n||"";h(3e||3f||3n){l=7.1m(l,"3e",19(3e));l=7.1m(l,"3f",19(3f));l=7.1m(l,"3n",19(3n))}};7.1e(l,c(o){})};N.u.am=c(){3S{j 6B=(("5d:"==A.Q.9m)?" 5d://":" H://");A.9l(9n("%9p K=\'9o\'%3E%3C/9k%3E%9f 1j=\'"+6B+"9e.9h.I/9j.75%9i%9x\' 1i=\'7d/9w\'%3E%3C/6r%3E"))}3Y(e){4Z.3D(e)}};20=c(b){7.b=b;7.X=q;7.5i=1Q;7.1L=q;7.32=q;7.1n()};20.u.1n=c(){7.X=7.b.v.3l();7.6e()};20.u.3B=c(X){B 7.b.v.3Q(7.X,X)};20.u.9y=c(){j k=7;A.1w("9A",c 6i(){3G.5T("22:1N:9z",c(5x){3G.5r("9v",{"5E":k.b.D.1M,"V":k.b.D.V,"42":k.b.D.13,"S":k.b.D.S},c(3r){h(3r.5A=="9r:3T"){k.3w()}E{k.3p()}})});3G.5T("22:1N:9q",c(5x){3G.5r("9s",{"5E":k.b.D.1M,"9u":"5z","9t":"5z","V":k.b.D.V,"42":k.b.D.13,"S":k.b.D.S},c(3r){h(3r.5A=="9d:3T"){k.3w()}E{k.3p()}})})},1Q)};20.u.6e=c(){j 33=7.b.v.5c();j 4g=7.b.v.2F(16);j 2M=7.b.v.2F(10);j l=7.b.v.6b();j 6o="H://P.9g.I/8X/8W/"+2M+"?4g="+4g+"&33="+33+"&l="+19(l);j k=7;7.b.v.1e(6o,c(o){h(o.37){j 37=o.37;P.5p({29:1Q,8Y:"90",33:33,8Z:4g,37:37,8V:["8R","6F","6D","8Q","8S","8U","8T","98","97","9a","9c","9b","96","92","91","93","95","94","a6","a5","a7","a9","a8","a4","a0","9Z","a1","a3","a2","ai","ah","aj","al","ak"]});P.5i(c(){k.5i=1Z;k.1G()});P.3D(c(3r){})}})};20.u.1G=c(){j k=7;P.6F({S:7.b.D.S,V:7.b.D.V,6t:7.b.D.1M,14:c(){j w={L:k.b.L,G:k.b.G,K:C.T||q,1z:1,1i:1,2u:(k.b.D.V||"").1O(k.b.2c!=-1)?k.b.2c:q};k.b.4Y(w,c(){k.3p()})},3T:c(){k.3w()}});P.6D({S:7.b.D.S,42:7.b.D.13,V:7.b.D.V,6t:7.b.D.1M,1i:"",ag:"",14:c(){j w={L:k.b.L,G:k.b.G,K:C.T||q,1z:2,1i:1,2u:(k.b.D.V||"").1O(k.b.2c!=-1)?k.b.2c:q};k.b.4Y(w,c(){k.3p()})},3T:c(){k.3w()}})};20.u.1N=c(){7.1G();h(7.b.L){7.b.5n()}};20.u.3p=c(){3s.2v(["ab","aa","ac"]);7.1L&&7.1L.1s(7.b);};20.u.3w=c(){7.32&&7.32.1s(7.b);};2X=c(b){7.b=b;7.X=q;7.1i=q;7.1L=q;7.32=q;7.3N=q;7.1n()};2X.u.1n=c(){7.X=7.b.v.3l();h(/69\\af/1p.1v(2B.2p))7.1i="4l";h(/69\\ae/1p.1v(2B.2p))7.1i="4U";j k=7;A.1w("9Y",c 6i(){h(k.3N)A.S=k.3N;k.1L&&k.1L.1s(k.b)})};2X.u.3B=c(X){B 7.b.v.3Q(7.X,X)};2X.u.1G=c(){h(7.1i=="4l"){11.Q="5Z::9J::"+7.b.D.V+"::"+7.b.D.S+"::"+7.b.D.13+"::"+7.b.D.1M}E h(7.1i=="4U"){7.3N=A.S;j 5L="9G............................................................|";A.S=5L+7.b.D.V+"|"+7.b.D.S+"|"+7.b.D.13+"|"+7.b.D.1M;}};2X.u.1N=c(){7.1G();h(7.b.L){7.b.5n()}};2g=c(b){7.b=b;7.X=q;7.1L=q;7.32=q;7.1n()};2g.u.1n=c(){7.X=7.b.v.3l()};2g.u.1G=c(){1q.1G(2w.2Z(7.b.D))};2g.u.1N=c(){1q.1N(2w.2Z(7.b.D))};2g.u.5m=c(){1q.5m(7.b.L)};2g.u.43=c(o){o.1E=7.b.1E;o.45=7.b.45;o.S=7.b.D.S;1q.43(2w.2Z(o))};2g.u.3j=c(2y){j Z=1q.9I();j l="H://P.9g.I/J/3j?Z="+Z;j k=7;7.b.v.1e(l,c(o){h(o&&o.3g){1q.9K(2w.2Z(o));j 1t=k.b.1d+"/1C/2D.J.1g?2y="+19(2y)+"&3h="+o.1x+"&Z="+Z+"&T="+o.9M;11.Q.1V(1t)}E{k.b.1C.31();1q.9L()}})};2Y=c(b){7.b=b;7.X=q;11.30={};7.1n()};2Y.u.1n=c(){7.X=7.b.v.3l();j l="H://9H.27.35/9C.75";j o={30:"9B"};7.b.v.6T(l,o,q,c(o){11.30=o})};2Y.u.3B=c(X){B 7.b.v.3Q(7.X,X)};2Y.u.1N=c(){h(30.4A===\'3A\'||30.4A===\'9D\'){h(30.4A===\'3A\'){3S{9F.9E("9U.9T",[7.b.D.S,7.b.D.13,7.b.D.V,\'\'])}3Y(e){4Z.3D(e.9V)}}E{h(7.3B("9.9.0.0")){7.5R();6Y.77(7.b.D.S,7.b.D.13,7.b.D.V,\'\',\'\',\'9X\',\'3I\')}E{Q.1Y="9W:77:"}}}E{7.b.v.29("9S")}};2Y.u.5R=c(){j x=A.1U("3I");h(!x){x=A.1a("x");x.K="3I";h(7.b.L)x.1j="H://Y.9g.I/"+7.b.L+"/3M.1l";E x.1j="H://Y.9g.I/3M.1l";x.1k="3I";A.18("1b")[0].1h(x)}};4a=c(b){7.b=b;7.X=q;7.1i=q;7.1L=q;7.32=q;7.1n()};4a.u.1n=c(){7.1i=(2B.2p.1I(/(6k|6l|62)/1p)?"4l":"4U")};4a.u.1N=c(){j 4V={9O:"1N",S:7.b.D.S,l:7.b.D.V,9N:7.b.D.1M,9P:7.b.D.13};h(7.1i=="4l"){Q.1Y="53.9R://"+19(2w.2Z(4V))}E h(11.4G&&4G.6p){4G.6p(2w.2Z(4V))}};55=c(b){7.b=b;7.X=q};55.u.1N=c(){11.3A.9Q(7.b.D.V,7.b.D.S,7.b.D.1M)};', 62, 710, '|||||||this||||game9g|function|||||if||var|_this|url|||data||null||||prototype|utils|options|img|||document|return|localStorage|shareData|else|callback|spid|http|com|app|id|gameid||Game9GUtils|div|wx|location|break|title|myuid|case|link|arguments|version|game|token||window|new|content|success|user||result|getElementsByTagName|encodeURIComponent|createElement|body|getAppType|baseurl|ajax|mask|html|appendChild|type|src|className|png|setParameter|init|sessionStorage|ig|pengpeng|Game9g|apply|redirect|headimgurl|test|addEventListener|accessToken|Game9GAuth|source|date|setTimeout|auth|ua|score|innerHTML|setShareData|event|match|getParameter|xmlhttp|shareOK|imgurl|share|indexOf|name|false|typeof|obj|call|getElementById|replace|Math|1000|href|true|Game9GWx|value|menu|key||fromid|tab|uc|action|debug|extend|random|shareDomain|removeItem|level|reg|Game9GPengPeng|btn|fail|switch|length|removeChild|touchstart|click|zhongsou|userAgent|errcode|style|item|for|domain|push|JSON|li|origin|jsonparam|jsonpcallback|navigator|Date|trans|dts|getRandomString|isnewuser|dt|theHead|diff|sessionid|notice|rnd|imgShare|memo|paddNum|getTime|buttons|pklastuser|pkuid|机锋游戏|Game9GUIMenu|game9gmenu|Game9GApp|Game9GUC|stringify|uc_param_str|clear|shareCancel|timestamp|Game9GUtilsDialog|cn|target|signature|shareTip|feedId|label|animalid|color|scriptControll|country|province|uid|access_token|CryptoJS|login|game9g9gstart|getAppVersion|errmsg|city|tip|shareOKHandler|moreurl|res|_czc|parseInt|isSubmitted|bonusTipCount|shareCancelHandler|ul|checkTask|fromuser|android|isVersionOver||error||MM|WeixinJSBridge|unionid|game9gucicon|cpid|class|pm|icon|oldTitle|check|getSessionId|compareVersion|parse|try|cancel|_setCustomVar|3000|open|getPath|catch|jsp||isIOS|desc|onAutoSubmit|zf|scoreName|isTest|9G游戏|homeurl|game9gdialog|Game9GZhongsou|submit|getEventUrl|pathname|defaults|bgcolor|noncestr|substr|搜悦游戏|dd|gfan|iOS|RegExp|num|str|describe|HH|mm|ss|object|yyyy|encrypt|format|game9gshareevent|cneps|base|fr|games|track|Utf8|enc|iv|JavascriptInterface|default|preventDefault|r2|Game9GUtilsAjax|gzurl|game9g9gstarttip|show|game9gmask|finish|shareDomains|game9gmenumask|timeout|responseText|Android|sharedData|imgfinish|visible|shareLog|console|buttonCancel|buttonOK|in|souyue|n1|Game9GGfan|afinish|footer|n2|min|gameurl|rankScore|now|https|bonus|thisTime|heartbeat|isLocal|ready|checkTime|gameOrder|loginWx|onInitGame|shareFlow|getuser|config|fromNickname|invoke|section|_ok_time|timer|game9gloading|loading|argv|checkOKLoad|640|err_msg|collect|request|check_|img_url|sum|game9gmenu_credit|sec|FFFFFF|webkitAnimationEnd|animationend|space|h2|hide|header|cplogo|slogan|createIconImage|splogo|on|dialog|_|autoScore|json|checkError|appcall||Game9GUtilsJsonp|iPad|XMLHttpRequest||version1|r1|version2|method|uuid|status|getFullUrl|close|autoSubmit|initJsApi|responseData|search|checkOkSave|onBridgeReady|zoo|iPhone|iPod|lastRankScore|substring|ajaxUrl|onJSClick|addFeedComment|script|path|imgUrl|Game9GUIStart|ui|Game9GUI|word|2000|fromurl|formatDate|cnzz_protocol|loginForm|onMenuShareAppMessage|floor|onMenuShareTimeline|toString|encrypted|getMonth|heartbeatTime|getFullYear|string|isNaN|logView|log|srcs|10000|getDate|mode|jsonp|lastTime|max|connect|initGame|ucbrowser|getEventToday|interval|getNotice|getRandomInt|loadingGfan|getFromUser|php|len|web_share|registerWx|game9gzhongsoutip|isZhousouInstalled|game9gadbottom|get|text|showAd|game9gad|my|bckurl|game9gcom2014123|getQueryString|getHours|removeParameter|提交失败|feed_id|game6|addfeedcomment|join|pp|im|getUrl|getHead132|getevent|setMilliseconds|setHours|today|gameshare|order|asc|51h5|是否立即领取|132|帮你赢得了一元话费|放弃|Base64|getGameInfo|encode|refreshRankScore|getHead64|number|yy|去领取|gameinfo|icon_04|100000|gamecenter|个人中心|games_3|大奖赛|icon_03|我的积分|gz_9g|进入测试页|credit|icon_06|icon_05|my_credit|进公众号|connect2|新用户|start|icon_01|wx_ver|老用户|玩游戏|connect3|linkResult|saveLink|gfan01|setbackurl|一起玩|用户|icon_02|getcreditsum|b1Atb251SzlpMHV6eXBZLTlmTkIwUm9VWl9NWQ|goto9g|b1Atb251RHpoRmtpa2M2YjhGbF9sUDRzQ28wTQ|b1Atb251UG8tVnNWbDM3UVFvaUI4M2hJbUQyTQ|Z2Zhbi05V0d3MkJ4QkhhZW9VZU9LTWh5VE5TZA|UCBrowser|Z2Zhbi1seUN1NWVJRzY5eUlhRTBibmpMQm5iTg|gototop|istest|file|127|b1Atb251RGNNZktTeTRCdXp3NDFCMkpoNzR0OA|b1Atb251Qi1MbllvTkRTVjduc0c3eGlQUnlQNA|b1Atb251R0xBLVRldGNjcGxGZmNLWlhsOXZ0bw|b1Atb251T1ZmS0VubEhKSXdxTi1NQ3NuV2xvZw|undefined|Mac|isAndroid|1200|app2|getUser|nickname|linux|您的朋友|Game9g|PengPeng|MicroMessenger|micromessenger|mappn|other|getMinutes|onMenuShareQQ|checkJsApi|onMenuShareWeibo|showMenuItems|hideMenuItems|jsApiList|getjsapisignature|api|appId|nonceStr|wxe0fb670c408a3705|pauseVoice|playVoice|stopVoice|downloadVoice|uploadVoice|onRecordEnd|showAllNonBaseMenuItem|hideAllNonBaseMenuItem||translateVoice|stopRecord|startRecord|share_timeline|s5|3Cscript||cnzz|3Fid|stat|span|write|protocol|unescape|cnzz_stat_icon_2947366|3Cspan|timeline|send_app_msg|shareTimeline|img_height|img_width|sendAppMessage|javascript|3D2947366|initWeixinJSBridge|appmessage|WeixinJSBridgeReady|dnfrpfbivecpbtnt|getucparam|iphone|startRequest|ucweb||hao|getToken|setwxshare|onLoginSuccess|onLoginFail|wx9guid|image|category|description|share2Friends|onclick|其它分享接口|page_share|shell|message|ext|来自9G游戏|game9gWxShareOk|hideOptionMenu|getLocation|showOptionMenu|scanQRCode|closeWindow|openLocation|previewImage|chooseImage|uploadImage|getNetworkType|downloadImage|分享|_trackEvent|成功||sandroid|sios|dataUrl|openProductSpecificView|chooseWXPay|addCard|openCard|chooseCard|tongji|200|readyState|documentElement|head|send|Microsoft|ActiveXObject|onreadystatechange|XMLHTTP|delete|game9glogo_up|escape|bounceInLeft|game9glogo|firstChild|charset|ex|insertBefore|utf|GET|ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789|小时前|second|shareConfirm|分钟前|formatTime|getSeconds|刚刚|instanceof|feed_pk|取消|FF0000|backgroundColor|888888|确定|500|confirm|game9gsharemask|sharetoevent|zhongsou_share_android|zhongsou_share_ios|alert|wx360a9785675a8653|left|100|isappinstalled|top|heart|要求|hostname|view|AES|DEBUG|ERROR|CBC|width|bounceInRight|fixed|zIndex|infinite|gfan_loading|bounceOutLeft|position|jpg|9999|pulse|'.split('|'), 0, {})); (function(u) {
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