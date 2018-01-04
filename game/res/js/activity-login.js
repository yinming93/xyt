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
/******/ 	return __webpack_require__(__webpack_require__.s = 31);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

	module.e = $;

/***/ },
/* 1 */
/***/ function(module, exports, __webpack_require__) {

	var Domain = __webpack_require__(12);
	var hostname = typeof location !== "undefined" ? location.hostname : "";

	var domain = Domain.requestHost(hostname);
	var pcDomain = Domain.requestHost(hostname, true);

	module.e = {
	    mobile: {
	        send: domain + "/account/ajax/mobileVerifySend",
	        login: domain + "/account/ajax/mfastlogin"
	    },
	    mobile_wx: {
	        send: domain + "/ajax/json/account/mobiledynamiclogincode/2",
	        login: domain + "/ajax/json/account/mobiledynamiclogin/98"
	    },
	    mobile_qq: {
	        send: domain + "/ajax/json/account/mobiledynamiclogincode/2",
	        login: domain + "/ajax/json/account/mobiledynamiclogin/98"
	    },
	    account: {
	        login: domain + "/account/ajax/passwordLogin"
	    },
	    cap: {
	        load: pcDomain + "/account/ajax/getCaptcha",
	        check: pcDomain + "/account/ajax/checkCaptcha",
	        appear: domain + "/account/ajax/captchaShow"
	    },
	    countrycode: {
	        url: domain + "/login/choosecountry?redirect="
	    },
	    frame: {
	        url: pcDomain + "/account/iframeLogin",
	        regUrl: pcDomain + "/account/iframeRegister"
	    }
	};

/***/ },
/* 2 */
/***/ function(module, exports, __webpack_require__) {

	module.e = function (source, add) {
	    if (add) {
	        for (var o in add) {
	            if (add.hasOwnProperty(o)) {
	                source[o] = add[o];
	            }
	        }
	    }
	    return source;
	};

/***/ },
/* 3 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * dom bind events
	 * */
	module.e = function (dom, eventName, fn) {
	    if (dom.addEventListener) {
	        dom.addEventListener(eventName, fn, false);
	    } else if (dom.attachEvent) {
	        dom.attachEvent("on" + eventName, fn);
	    } else {
	        dom["on" + eventName] = fn;
	    }
	};

/***/ },
/* 4 */
/***/ function(module, exports, __webpack_require__) {

	var Event = {
	    on: function on(name, lister) {
	        if (!name) {
	            return;
	        }
	        if (!this._events_) {
	            this._events_ = {};
	        }
	        var events = this._events_;
	        if (!events[name]) {
	            events[name] = [];
	        }
	        events[name].push(lister);
	    },
	    emit: function emit(name) {
	        var events = this._events_;
	        if (!name || !events || !events[name]) {
	            return;
	        }
	        var queue = events[name];
	        var length = queue.length;
	        var args = Array.prototype.slice.call(arguments, 1);
	        for (var i = 0; i < length; i++) {
	            queue[i].apply(this, args);
	        }
	    }

	};

	module.e = Event;

/***/ },
/* 5 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 *  Login 接口
	 * */
	var Event = __webpack_require__(4);
	var Extend = __webpack_require__(2);
	var Request = __webpack_require__(7);
	var Field = __webpack_require__(22);

	var LoginInterface = {
	    init: function init() {
	        this.fields = [];
	    },
	    setForm: function setForm(fields, formData) {
	        var self = this;
	        if (Object.prototype.toString.call(fields) === "[object Array]") {
	            fields.forEach(function (field) {
	                self.fields.push(Field.create(field));
	            });
	        } else {
	            throw new Error("fields should be an array");
	        }

	        // formData存放额外的表单数据
	        this.formData = formData;
	    },
	    check: function check(cb) {
	        for (var i = 0, l = this.fields.length; i < l; i++) {
	            var res = this.fields[i].check();
	            if (!res.pass) {
	                this.emit("error", res.msg);
	                return;
	            }
	        }
	        cb();
	    },
	    beforeLogin: function beforeLogin(done) {
	        //default
	        done();
	    },
	    login: function login() {
	        var self = this;
	        self.check(function () {
	            self.beforeLogin(function () {
	                if (self.isSubmitting) {
	                    return;
	                }
	                self.isSubmitting = true;
	                var timer = setTimeout(function () {
	                    self.isSubmitting = false;
	                }, 3000);
	                self.emit("logining");
	                Request({
	                    url: self.getUrl(),
	                    data: self.getData(),
	                    onSuc: function onSuc(res) {
	                        self.isSubmitting = false;
	                        clearTimeout(timer);
	                        if (res.code === 200) {
	                            self.emit("login");
	                        } else {
	                            self.emit("error", res.msg.err, res);
	                        }
	                    }
	                });
	            });
	        });
	    },
	    getUrl: function getUrl() {},
	    getData: function getData() {
	        var data = {};
	        this.fields.forEach(function (field) {
	            data[field.input.getAttribute("name")] = field.valueGetter();
	        });
	        return Extend(data, this.formData);
	    },
	    isSubmitting: false

	};
	Extend(LoginInterface, Event);

	/**
	 * Create a Login Object
	 * */
	module.e = function () {
	    return Extend({}, LoginInterface);
	};

/***/ },
/* 6 */
/***/ function(module, exports, __webpack_require__) {

	var request = __webpack_require__(7);

	var addEvent = __webpack_require__(3);

	var config = __webpack_require__(1);

	var extend = __webpack_require__(2);
	/**
	 * 图形验证码弹出框
	 * @param params 传给诚信的参数 , optional
	 * @param suc{Function}
	 * @param onClose
	 *
	 * 验证成功后的回调函数,
	 * 回传一个code，后续操作需要
	 *
	 * v0.2.7 安全旁路，动态判定是否出图形验证码
	 * */

	var template = '<div class="EasyLogin_Title">请输入验证码</div>' + '<div class="EasyLogin_Cap">' + '<input type="text"  />' + '<img  />' + '</div>' + '<div class="EasyLogin_Mobile_Msg" style="display: none;"></div>' + '<a class="EasyLogin_Mobile_Btn" href="javascript:void(0);">确定</a>';

	module.e = function (params, suc, onClose) {
	    var appearData = {
	        captchaChannel: 0
	    },
	        sucCallback,
	        closeCallback;

	    //参数兼容
	    if (typeof params == "function") {
	        //直接是成功的回调函数，业务没有传相关参数进来，直接出图形验证码
	        sucCallback = params;
	        closeCallback = suc;
	    } else {
	        extend(appearData, params.capEnvData || {});
	        delete params.capEnvData;
	        extend(appearData, params);
	        sucCallback = suc;
	        closeCallback = onClose;
	    }

	    var overlay = document.createElement('div');
	    overlay.className = 'EasyLogin_Mobile_Overlay';

	    var pop = document.createElement("div");
	    pop.className = 'EasyLogin_Mobile_ImgPop';
	    pop.innerHTML = template;

	    var body = document.body;

	    var input = pop.getElementsByTagName("input")[0];
	    var img = pop.getElementsByTagName('img')[0];
	    var msg = pop.getElementsByClassName("EasyLogin_Mobile_Msg")[0];

	    var sig; //验证码相关数据
	    var opened = false;

	    var open = function open() {
	        body.appendChild(overlay);
	        body.appendChild(pop);
	        opened = true;
	    };
	    var close = function close() {
	        if (opened) {
	            body.removeChild(overlay);
	            body.removeChild(pop);
	        }
	    };

	    var error = function error(s) {
	        msg.innerHTML = s;
	        msg.style.display = "block";
	    };

	    var capServiceError = function capServiceError(uuid) {
	        //验证码服务挂了，直接关闭验证码
	        close();
	        sucCallback(uuid);
	    };

	    //获取验证码
	    var requestImg = function requestImg(sucCb) {

	        request({
	            url: config.cap.load,
	            onSuc: function onSuc(res) {
	                if (res.code == 200) {
	                    img.src = res.msg.url;
	                    sig = res.msg.signature;
	                    if (sucCb) {
	                        sucCb();
	                    }
	                } else {
	                    if (res.msg && res.msg.uuid) {
	                        //说明虽然需要展示验证码，但是验证码服务挂了，就不展示了
	                        capServiceError(res.msg.uuid);
	                    } else {
	                        if (res.msg && res.msg.err) {
	                            alert(res.msg.err);
	                        }
	                    }
	                }
	            }
	        });
	    };

	    var bind = function bind(pop, overlay) {
	        addEvent(overlay, 'click', function (e) {
	            setTimeout(function () {
	                close();
	                closeCallback && closeCallback();
	            }, 300);
	        });

	        //刷新
	        addEvent(img, 'click', requestImg);

	        //提交验证码
	        addEvent(pop.getElementsByTagName('a')[0], 'click', function () {
	            error("正在提交验证...");

	            var code = input.value.trim();
	            if (code) {
	                check({
	                    vcode: code,
	                    signature: sig
	                }, function (pass, m) {
	                    if (pass) {
	                        close();
	                        sucCallback(m);
	                    } else {
	                        error(m);
	                    }
	                });
	            } else {
	                error("请输入验证码");
	            }
	        });
	    };

	    appear(appearData, function (show, uuid) {
	        if (show) {
	            bind(pop, overlay);
	            requestImg(open);
	        } else {
	            sucCallback(uuid);
	        }
	    });
	};

	//验证验证码
	var check = function check(data, cb) {
	    request({
	        url: config.cap.check,
	        data: data,
	        onSuc: function onSuc(res) {
	            if (res.code == 200) {
	                cb(true, res.msg.uuid);
	            } else {
	                cb(false, res.msg.err);
	            }
	        }
	    });
	};

	//接口判断是否要出图形验证码
	var appear = function appear(data, cb) {
	    var channel = data.captchaChannel;
	    delete data.captchaChannel;
	    request({
	        url: config.cap.appear,
	        data: {
	            captchaChannel: channel,
	            params: encodeURIComponent(JSON.stringify(data))
	        },
	        onSuc: function onSuc(res) {
	            if (res && res.code == 200 && res.msg && res.msg.isShow == false && res.msg.uuid) {
	                cb(false, res.msg.uuid);
	            } else {
	                cb(true);
	            }
	        }
	    });
	};

/***/ },
/* 7 */
/***/ function(module, exports, __webpack_require__) {

	var globalCount = 0;

	var urlStringify = function urlStringify(url, data) {
	    if (!data) {
	        return url;
	    }
	    var param = [];
	    for (var o in data) {
	        if (data.hasOwnProperty(o)) {
	            param.push(o + "=" + data[o]);
	        }
	    }
	    return ~url.indexOf("?") ? url + param.join("&") : url + "?" + param.join("&");
	};

	/**
	 * jsonp
	 * */
	module.e = function (options) {

	    if (!options.url) {
	        throw new Error("url request!");
	    }
	    var data = options.data || {};
	    var cb = options.onSuc || function () {};
	    var cbName = data.callback = "EasyLoginCallBack" + ++globalCount;

	    var script = document.createElement("script");
	    script.src = urlStringify(options.url, data);

	    window[cbName] = function (res) {
	        delete window[cbName];
	        script.parentNode.removeChild(script);
	        cb(res);
	    };

	    document.getElementsByTagName("head")[0].appendChild(script);
	};

/***/ },
/* 8 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * pc iframe登录,注册
	 * */
	var config = __webpack_require__(1);
	var count = 0;
	var domain = __webpack_require__(12);

	exports.create = function (container, channel, options, isReg) {

	    var frameLogin = __webpack_require__(5)();
	    frameLogin.login = function () {};
	    var w = 540,
	        h = 260;
	    if (!options.wide) {
	        w = 290;
	        h = 300;
	    }

	    var cbName = "EasyLogin_frame_callback" + count++;

	    try {
	        document.domain = domain.rootDomain(location.hostname);
	    } catch (e) {}

	    var frame = document.createElement("iframe");
	    var url = isReg ? config.frame.regUrl : config.frame.url;
	    frame.src = url + "?callback=" + cbName + "&wide=" + !!options.wide + "&redir=" + encodeURIComponent(options.redir || "");

	    frame.width = w;
	    frame.height = h;
	    frame.frameBorder = "0";
	    frame.scrolling = "no";
	    container.appendChild(frame);

	    var callbacks = {
	        frameHeight: function frameHeight(h) {
	            //控制iframe高度
	            frame.height = h;
	        },
	        login: function login() {
	            //登录成功通知
	            frameLogin.emit("login");
	            //如果有redir， 默认跳过去
	            if (options.redir) {
	                location.href = options.redir;
	            }
	        }
	    };

	    window[cbName] = function (name) {
	        if (callbacks[name]) {
	            callbacks[name].apply(callbacks, Array.prototype.slice.call(arguments, 1));
	        }
	    };

	    return frameLogin;
	};

/***/ },
/* 9 */
/***/ function(module, exports, __webpack_require__) {

	/*
		MIT License http://www.opensource.org/licenses/mit-license.php
		Author Tobias Koppers @sokra
	*/
	// css base code, injected by the css-loader
	module.e = function() {
		var list = [];

		// return the list of modules as css string
		list.toString = function toString() {
			var result = [];
			for(var i = 0; i < this.length; i++) {
				var item = this[i];
				if(item[2]) {
					result.push("@media " + item[2] + "{" + item[1] + "}");
				} else {
					result.push(item[1]);
				}
			}
			return result.join("");
		};

		// import a list of modules into the list
		list.i = function(modules, mediaQuery) {
			if(typeof modules === "string")
				modules = [[null, modules, ""]];
			var alreadyImportedModules = {};
			for(var i = 0; i < this.length; i++) {
				var id = this[i][0];
				if(typeof id === "number")
					alreadyImportedModules[id] = true;
			}
			for(i = 0; i < modules.length; i++) {
				var item = modules[i];
				// skip already imported module
				// this implementation is not 100% perfect for weird media query combinations
				//  when a module is imported multiple times with different media queries.
				//  I hope this will never occur (Hey this way we have smaller bundles)
				if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
					if(mediaQuery && !item[2]) {
						item[2] = mediaQuery;
					} else if(mediaQuery) {
						item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
					}
					list.push(item);
				}
			}
		};
		return list;
	};


/***/ },
/* 10 */
/***/ function(module, exports, __webpack_require__) {

	/*
		MIT License http://www.opensource.org/licenses/mit-license.php
		Author Tobias Koppers @sokra
	*/
	var stylesInDom = {},
		memoize = function(fn) {
			var memo;
			return function () {
				if (typeof memo === "undefined") memo = fn.apply(this, arguments);
				return memo;
			};
		},
		isOldIE = memoize(function() {
			return /msie [6-9]\b/.test(window.navigator.userAgent.toLowerCase());
		}),
		getHeadElement = memoize(function () {
			return document.head || document.getElementsByTagName("head")[0];
		}),
		singletonElement = null,
		singletonCounter = 0,
		styleElementsInsertedAtTop = [];

	module.e = function(list, options) {
		if(typeof DEBUG !== "undefined" && DEBUG) {
			if(typeof document !== "object") throw new Error("The style-loader cannot be used in a non-browser environment");
		}

		options = options || {};
		// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
		// tags it will allow on a page
		if (typeof options.singleton === "undefined") options.singleton = isOldIE();

		// By default, add <style> tags to the bottom of <head>.
		if (typeof options.insertAt === "undefined") options.insertAt = "bottom";

		var styles = listToStyles(list);
		addStylesToDom(styles, options);

		return function update(newList) {
			var mayRemove = [];
			for(var i = 0; i < styles.length; i++) {
				var item = styles[i];
				var domStyle = stylesInDom[item.id];
				domStyle.refs--;
				mayRemove.push(domStyle);
			}
			if(newList) {
				var newStyles = listToStyles(newList);
				addStylesToDom(newStyles, options);
			}
			for(var i = 0; i < mayRemove.length; i++) {
				var domStyle = mayRemove[i];
				if(domStyle.refs === 0) {
					for(var j = 0; j < domStyle.parts.length; j++)
						domStyle.parts[j]();
					delete stylesInDom[domStyle.id];
				}
			}
		};
	}

	function addStylesToDom(styles, options) {
		for(var i = 0; i < styles.length; i++) {
			var item = styles[i];
			var domStyle = stylesInDom[item.id];
			if(domStyle) {
				domStyle.refs++;
				for(var j = 0; j < domStyle.parts.length; j++) {
					domStyle.parts[j](item.parts[j]);
				}
				for(; j < item.parts.length; j++) {
					domStyle.parts.push(addStyle(item.parts[j], options));
				}
			} else {
				var parts = [];
				for(var j = 0; j < item.parts.length; j++) {
					parts.push(addStyle(item.parts[j], options));
				}
				stylesInDom[item.id] = {id: item.id, refs: 1, parts: parts};
			}
		}
	}

	function listToStyles(list) {
		var styles = [];
		var newStyles = {};
		for(var i = 0; i < list.length; i++) {
			var item = list[i];
			var id = item[0];
			var css = item[1];
			var media = item[2];
			var sourceMap = item[3];
			var part = {css: css, media: media, sourceMap: sourceMap};
			if(!newStyles[id])
				styles.push(newStyles[id] = {id: id, parts: [part]});
			else
				newStyles[id].parts.push(part);
		}
		return styles;
	}

	function insertStyleElement(options, styleElement) {
		var head = getHeadElement();
		var lastStyleElementInsertedAtTop = styleElementsInsertedAtTop[styleElementsInsertedAtTop.length - 1];
		if (options.insertAt === "top") {
			if(!lastStyleElementInsertedAtTop) {
				head.insertBefore(styleElement, head.firstChild);
			} else if(lastStyleElementInsertedAtTop.nextSibling) {
				head.insertBefore(styleElement, lastStyleElementInsertedAtTop.nextSibling);
			} else {
				head.appendChild(styleElement);
			}
			styleElementsInsertedAtTop.push(styleElement);
		} else if (options.insertAt === "bottom") {
			head.appendChild(styleElement);
		} else {
			throw new Error("Invalid value for parameter 'insertAt'. Must be 'top' or 'bottom'.");
		}
	}

	function removeStyleElement(styleElement) {
		styleElement.parentNode.removeChild(styleElement);
		var idx = styleElementsInsertedAtTop.indexOf(styleElement);
		if(idx >= 0) {
			styleElementsInsertedAtTop.splice(idx, 1);
		}
	}

	function createStyleElement(options) {
		var styleElement = document.createElement("style");
		styleElement.type = "text/css";
		insertStyleElement(options, styleElement);
		return styleElement;
	}

	function createLinkElement(options) {
		var linkElement = document.createElement("link");
		linkElement.rel = "stylesheet";
		insertStyleElement(options, linkElement);
		return linkElement;
	}

	function addStyle(obj, options) {
		var styleElement, update, remove;

		if (options.singleton) {
			var styleIndex = singletonCounter++;
			styleElement = singletonElement || (singletonElement = createStyleElement(options));
			update = applyToSingletonTag.bind(null, styleElement, styleIndex, false);
			remove = applyToSingletonTag.bind(null, styleElement, styleIndex, true);
		} else if(obj.sourceMap &&
			typeof URL === "function" &&
			typeof URL.createObjectURL === "function" &&
			typeof URL.revokeObjectURL === "function" &&
			typeof Blob === "function" &&
			typeof btoa === "function") {
			styleElement = createLinkElement(options);
			update = updateLink.bind(null, styleElement);
			remove = function() {
				removeStyleElement(styleElement);
				if(styleElement.href)
					URL.revokeObjectURL(styleElement.href);
			};
		} else {
			styleElement = createStyleElement(options);
			update = applyToTag.bind(null, styleElement);
			remove = function() {
				removeStyleElement(styleElement);
			};
		}

		update(obj);

		return function updateStyle(newObj) {
			if(newObj) {
				if(newObj.css === obj.css && newObj.media === obj.media && newObj.sourceMap === obj.sourceMap)
					return;
				update(obj = newObj);
			} else {
				remove();
			}
		};
	}

	var replaceText = (function () {
		var textStore = [];

		return function (index, replacement) {
			textStore[index] = replacement;
			return textStore.filter(Boolean).join('\n');
		};
	})();

	function applyToSingletonTag(styleElement, index, remove, obj) {
		var css = remove ? "" : obj.css;

		if (styleElement.styleSheet) {
			styleElement.styleSheet.cssText = replaceText(index, css);
		} else {
			var cssNode = document.createTextNode(css);
			var childNodes = styleElement.childNodes;
			if (childNodes[index]) styleElement.removeChild(childNodes[index]);
			if (childNodes.length) {
				styleElement.insertBefore(cssNode, childNodes[index]);
			} else {
				styleElement.appendChild(cssNode);
			}
		}
	}

	function applyToTag(styleElement, obj) {
		var css = obj.css;
		var media = obj.media;

		if(media) {
			styleElement.setAttribute("media", media)
		}

		if(styleElement.styleSheet) {
			styleElement.styleSheet.cssText = css;
		} else {
			while(styleElement.firstChild) {
				styleElement.removeChild(styleElement.firstChild);
			}
			styleElement.appendChild(document.createTextNode(css));
		}
	}

	function updateLink(linkElement, obj) {
		var css = obj.css;
		var sourceMap = obj.sourceMap;

		if(sourceMap) {
			// http://stackoverflow.com/a/26603875
			css += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + " */";
		}

		var blob = new Blob([css], { type: "text/css" });

		var oldSrc = linkElement.href;

		linkElement.href = URL.createObjectURL(blob);

		if(oldSrc)
			URL.revokeObjectURL(oldSrc);
	}


/***/ },
/* 11 */,
/* 12 */
/***/ function(module, exports) {

	var env = function env(host) {
	    if (~host.indexOf("alpha.dp")) {
	        return "alpha";
	    }
	    if (~host.indexOf("51ping.com")) {
	        return "beta";
	    }
	    if (host.indexOf("ppe.") == 0) {
	        return "ppe";
	    }
	    if (~host.indexOf("dianping.com")) {
	        return "online";
	    }

	    return "beta";
	};

	exports.rootDomain = function (host) {
	    var e = env(host);
	    var config = {
	        alpha: "alpha.dp",
	        beta: "51ping.com",
	        ppe: "dianping.com",
	        online: "dianping.com"
	    };
	    return config[e];
	};

	exports.requestHost = function (host, isPc) {
	    var config = {
	        m: {
	            alpha: "m.alpha.dp",
	            beta: "m.51ping.com",
	            ppe: "ppe.m.dianping.com",
	            online: "m.dianping.com"
	        },
	        pc: {
	            alpha: "w.alpha.dp",
	            beta: "w.51ping.com",
	            ppe: "ppe.www.dianping.com",
	            online: "www.dianping.com"
	        }
	    };

	    return "//" + config[isPc ? "pc" : "m"][env(host)];
	};

/***/ },
/* 13 */
/***/ function(module, exports, __webpack_require__) {

	var $ = __webpack_require__(0);
	var EasyLogin = __webpack_require__(39);
	var toast = __webpack_require__(40);
	var env = __webpack_require__(42);
	var constant = env.constant;

	var easyLogin = function easyLogin(loginForm, elOptions, success) {
		var defaultElOptions = {
			platform: "mobile", //平台， mobile or pc,暂时只支持mobile, 默认值 mobile
			types: "phone", //phone 手机号短信登录, account 用户名密码登录， 默认值 phone
			channel: "9", //找账户中心申请的渠道ID, 如果types是phone， 此参数必须传
			defaultMobile: "", //默认手机号, optional
			messageType: 304
		};

		var tOptions = elOptions;
		var tSuccess = success;
		if (!success) {
			tSuccess = elOptions;
			tOptions = {};
		}

		var mergeElOptions = $.extend({}, defaultElOptions, tOptions);
		var $loginForm = $(loginForm);
		$(loginForm).html('');
		var loginFormElem = $loginForm[0];

		var el = EasyLogin(loginFormElem, mergeElOptions);

		$(loginForm).find('.EasyLogin_Mobile_tit').hide();

		el.on('info', function (msg) {
			toast(msg);
		});
		el.on('error', function (msg) {
			toast(msg);
		});
		el.on('login', function (msg) {
			tSuccess && tSuccess();
		});

		return el;
	};

	env.putCustom('checkLogin', {
		d: 'http://t.51ping.com/movie/activity/ajax/sendCouponEncrypt',
		p: 'http://tgapp.dianping.com/movie/activity/ajax/sendCouponEncrypt'
	});

	env.putCustom('defaultCouponUrl', {
		d: 'http://t.51ping.com/movie/activity/ajax/sendCoupon',
		p: 'http://tgapp.dianping.com/movie/activity/ajax/sendCoupon'
	});

	var couponLogin = function couponLogin(options) {
		env.userInfoPromise().then(function () {
			var defaultOptions = {
				auth_url: constant.checkLogin,
				coupon_url: constant.defaultCouponUrl,
				token: constant.token,
				activity_id: '',
				login_code: 403,
				succses_code: {
					200: function _() {
						console.log('please custom success callback');
					}
				},
				login_type: 'e',
				el_options: {}
			};
			var mergeOptions = $.extend({}, defaultOptions, options);

			$.ajax({
				url: mergeOptions.auth_url,
				data: {
					token: mergeOptions.token
				},
				dataType: 'jsonp',
				success: function success(resp) {
					if (resp.code == 200) {
						if (mergeOptions.activity_id) {
							$.get(mergeOptions.coupon_url, {
								vc: resp.msg.vc,
								ts: resp.msg.ts,
								mobileNo: $(mergeOptions.login_form + ' ' + 'input[name="mobile"]').val(),
								token: mergeOptions.token,
								activityId: mergeOptions.activity_id
							}, function (iresp) {
								var codeCallBack = mergeOptions.succses_code[iresp.code];
								if (codeCallBack) {
									codeCallBack(iresp.msg, resp.msg);
								} else {
									toast(iresp.msg.title || '未知错误');
								}
							}, 'jsonp');
						} else {
							mergeOptions.success && mergeOptions.success(resp.msg);
						}
					} else if (resp.code == mergeOptions.login_code) {
						if (mergeOptions.login_type == 'm') {
							env.dpLogin();
						} else {
							var el = easyLogin(mergeOptions.login_form, mergeOptions.el_options, function () {
								couponLogin(options);
							});
							$(mergeOptions.login_buttion).click(function (e) {
								e.preventDefault();
								el.login();
							});
							mergeOptions.login_show && mergeOptions.login_show();
						}
					} else {
						toast(JSON.stringify(resp.msg));
					}
				},
				error: function error(resp) {
					toast('网络繁忙，请稍候再试！');
				}
			});
		});
	};

	module.e = {
		easyLogin: easyLogin,
		couponLogin: couponLogin
	};

/***/ },
/* 14 */,
/* 15 */
/***/ function(module, exports, __webpack_require__) {

	__webpack_require__(24);
	var Factory = __webpack_require__(27);
	var extend = __webpack_require__(2);
	var Events = __webpack_require__(4);

	var CapPop = __webpack_require__(6);

	var PLATFORM_MOBILE = "mobile";
	var PLATFORM_PC = "pc";

	var createLoginer = function createLoginer(platform, types, channel, options) {
	    var arr = [];
	    for (var i = 0; i < types.length; i++) {
	        arr.push(Factory.create(platform + ":" + types[i], channel, options));
	    }
	    return arr;
	};
	var parseTypes = function parseTypes(types) {
	    if (typeof types === "string") {
	        return types.split(",");
	    }
	    return types;
	};

	var combo = function combo(api, container, loggers, options) {
	    if (options.types.length) {
	        api.active = loggers[0].loginer;
	        container.appendChild(loggers[0].container);
	    }
	};

	var events = function events(api, loggers) {
	    for (var i = 0; i < loggers.length; i++) {
	        var logger = loggers[i].loginer;

	        //delegate
	        ["login", "logining", "error", "info"].forEach(function (name) {
	            logger.on(name, function () {
	                var args = Array.prototype.slice.call(arguments, 0);
	                args.unshift(name);
	                api.emit.apply(api, args);
	            });
	        });
	    }
	};

	var EasyLogin = function EasyLogin(container, option) {
	    var defaultOptions = {
	        platform: PLATFORM_MOBILE, // pc , mobile
	        types: "phone", // phone , account,reg
	        channel: "", //申请的渠道
	        defaultMobile: "", //默认要填上的手机号，如果types里面phone
	        showCountryCode: true, //是否需要展示国家码
	        autoSend: false, //直接发送验证码，platform是mobile，types是phone的时候适用
	        messageType: 304, //短信类型
	        wide: true, //pc iframe登录 是否宽版
	        redir: "", //pc 登录回跳地址
	        mobileAutoLogin: false, //在输入验证码后自动触发登录
	        env: '', // 所处环境，目前只有通用('')和微信('wx')
	        formData: {} // 额外的表单数据
	    };

	    var api = extend({
	        active: null,
	        login: function login() {
	            this.active.login();
	        }
	    }, Events);

	    var options = extend(defaultOptions, option || {});
	    var types = options.types = parseTypes(options.types);

	    var loggers = createLoginer(options.platform, types, options.channel, options);

	    combo(api, container, loggers, options);

	    events(api, loggers);

	    return api;
	};

	module.e = EasyLogin;
	EasyLogin.CapPop = CapPop;

/***/ },
/* 16 */,
/* 17 */
/***/ function(module, exports, __webpack_require__) {

	module.e = __webpack_require__.p + "easy-login-default.css";

/***/ },
/* 18 */
/***/ function(module, exports, __webpack_require__) {

	// style-loader: Adds some css to the DOM by adding a <style> tag

	// load the styles
	var content = __webpack_require__(37);
	if(typeof content === 'string') content = [[module.i, content, '']];
	// add the styles to the DOM
	var update = __webpack_require__(10)(content, {});
	if(content.locals) module.e = content.locals;
	// Hot Module Replacement
	if(false) {
		// When the styles change, update the <style> tags
		if(!content.locals) {
			module.hot.accept("!!./../node_modules/css-loader/index.js?minimize!./easy-login-cap.css", function() {
				var newContent = require("!!./../node_modules/css-loader/index.js?minimize!./easy-login-cap.css");
				if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
				update(newContent);
			});
		}
		// When the module is disposed, remove the <style> tags
		module.hot.dispose(function() { update(); });
	}

/***/ },
/* 19 */,
/* 20 */,
/* 21 */,
/* 22 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * field
	 *
	 * {
	 *  input: Element .
	 *  validator:RegExp,
	 *  msg:String,
	 *  getValue:Function,
	 *  encode:false
	 * }
	 *
	 * */
	var Validate = __webpack_require__(28);

	exports.create = function (field) {
	    var f = {
	        input: field.input,
	        validator: new Validate(field.validator, field.msg),
	        valueGetter: field.getValue || function () {
	            var value = field.input.value;
	            return field.encode ? encodeURIComponent(value) : value;
	        },
	        check: function check() {
	            this.validator.setValue(this.valueGetter());
	            return {
	                pass: this.validator.match(),
	                msg: this.validator.msg
	            };
	        }
	    };

	    if (field.condition) {
	        f.validator.preMatch = field.condition;
	    }

	    return f;
	};

/***/ },
/* 23 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * 国家码 模块，
	 * 传一个div ， 初始化国家码code， 跳转链接
	 *
	 * */

	var config = __webpack_require__(1);
	var addEvent = __webpack_require__(3);

	exports.create = function (dom) {
	    //set country code
	    var urlMatch = location.href.match(/countrycode=([^&$]+)/);
	    var urlCode;
	    var storageCode;
	    if (urlMatch) {
	        urlCode = urlMatch[1];
	    }
	    try {
	        storageCode = localStorage.getItem("country-code");
	    } catch (e) {}

	    if (urlCode || storageCode) {
	        dom.innerHTML = urlCode || storageCode;
	        dom.setAttribute("data-code", urlCode || storageCode);
	    }

	    addEvent(dom.parentNode, 'click', function () {
	        location.href = config.countrycode.url + encodeURIComponent(location.href);
	    });
	};

/***/ },
/* 24 */
/***/ function(module, exports) {

	/**
	 * es5 shim
	 * */

	if (!Array.prototype.forEach) {
	    Array.prototype.forEach = function (callback, thisArg) {
	        var T;

	        if (typeof callback !== "function") {
	            throw new TypeError(callback + ' is not a function');
	        }

	        if (arguments.length > 1) {
	            T = thisArg;
	        }
	        for (var i = 0; i < this.length; i++) {
	            callback.call(T, this[i], i, this);
	        }
	    };
	}

/***/ },
/* 25 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * 移动端 账号密码登陆模块
	 * */
	var config = __webpack_require__(1);
	var CapPop = __webpack_require__(6);

	exports.create = function (container, channel, options) {

	    var dom;
	    var userNameInput, passwordInput;
	    var uuid;
	    /**
	     * render dom
	     * */
	    var render = function render() {
	        var template = '<div class="EasyLogin_row"><input type="text" name="username" placeholder="手机号/邮箱/用户名" /></div>' + '<div class="EasyLogin_row"><input type="password" name="password" placeholder="密码" /></div>';

	        dom = document.createElement("div");
	        dom.className = "EasyLogin_Mobile_Account";
	        dom.innerHTML = template;
	        container.appendChild(dom);
	    };
	    /**
	     * bind events
	     * */
	    var initEvent = function initEvent() {
	        var inputs = dom.getElementsByTagName("input");
	        userNameInput = inputs[0];
	        passwordInput = inputs[1];
	    };

	    var AccountLogin = __webpack_require__(5)();
	    AccountLogin.getUrl = function () {
	        return config.account.login;
	    };

	    render();
	    initEvent();

	    AccountLogin.init();

	    AccountLogin.setForm([{
	        input: userNameInput,
	        validator: /^[\w\W]{1,}$/,
	        msg: "请输入手机号/用户名/邮箱",
	        encode: true
	    }, {
	        input: passwordInput,
	        validator: /^[\w\W]{1,}$/,
	        msg: "请输入密码",
	        encode: true
	    }]);

	    AccountLogin.beforeLogin = function (done) {
	        CapPop({
	            captchaChannel: 101,
	            username: userNameInput.value
	        }, function (id) {
	            uuid = id;
	            done();
	        });
	    };

	    var superGetData = AccountLogin.getData;

	    AccountLogin.getData = function () {
	        var data = superGetData.call(AccountLogin);
	        data.uuid = uuid;
	        return data;
	    };

	    return AccountLogin;
	};

/***/ },
/* 26 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * 手机验证码登录模块
	 * */
	var addEvent = __webpack_require__(3);
	var config = __webpack_require__(1);
	var Request = __webpack_require__(7);
	var CapPop = __webpack_require__(6);
	var CountryCode = __webpack_require__(23);

	exports.create = function (container, channel, options) {
	    config = config['mobile' + (options.env ? '_' + options.env : '')];

	    var dom;
	    var mobileInput, codeInput, channelInput, typeInput, countryCodeEl;
	    var messageType = options.messageType || 304;
	    var capEnvData = options.capEnvData || {};

	    var MobileLogin = __webpack_require__(5)();
	    MobileLogin.getUrl = function () {
	        return config.login;
	    };

	    var getMobile = function getMobile() {
	        //获取手机号方法，拼接country code 和 mobile
	        var code = countryCodeEl ? countryCodeEl.getAttribute("data-code") : "86";
	        var m = mobileInput.value.trim();
	        return code == "86" ? m : code + "_" + m;
	    };

	    /**
	     * render dom
	     * */
	    var render = function render() {
	        var template = '<div class="EasyLogin_row"><div class="EasyLogin_Mobile_tit EasyLogin_Mobile_Country"><span class="EasyLogin-country-code" data-code="86">86</span><div class="EasyLogin_Mobile_Arrow"></div></iv></div><input type="text" name="mobile" placeholder="请输入手机号" /><a class="J_send EasyLogin_send" href="javascript:;">发送验证码</a></div>' + '<div class="EasyLogin_row"><div class="EasyLogin_Mobile_tit">验证码</div><input type="text" name="vcode" placeholder="请输入验证码" /><input type="hidden" value="' + channel + '" name="channel" /><input type="hidden" value="' + messageType + '" name="type" /></div>';

	        dom = document.createElement("div");
	        dom.className = "EasyLogin_Mobile_Mobile";
	        dom.innerHTML = template;
	        container.appendChild(dom);

	        var inputs = dom.getElementsByTagName("input");
	        mobileInput = inputs[0];
	        codeInput = inputs[1];
	        channelInput = inputs[2];
	        typeInput = inputs[3];
	        countryCodeEl = dom.getElementsByClassName("EasyLogin-country-code")[0];
	        if (!options.showCountryCode) {
	            countryCodeEl.parentNode.className = "EasyLogin_Mobile_tit";
	            countryCodeEl.parentNode.innerHTML = "手机号";
	            countryCodeEl = null;
	        }

	        //设置默认手机号
	        if (options && options.defaultMobile) {
	            mobileInput.value = options.defaultMobile;
	        }

	        //验证码输入以后自动登录
	        if (options && options.mobileAutoLogin) {
	            var lastValue = null;
	            addEvent(codeInput, "input", function () {
	                var value = codeInput.value;
	                if (value && value.length == 6 && value != lastValue) {
	                    MobileLogin.login();
	                }
	                lastValue = value;
	            });
	        }
	    };
	    /**
	     * bind events
	     * */
	    var initEvent = function initEvent() {

	        var isSending = false;
	        var send = dom.getElementsByTagName("a")[0];

	        //初始化国家码
	        if (countryCodeEl) {
	            CountryCode.create(countryCodeEl);
	        }

	        //发送验证码
	        var sendCapcha = function sendCapcha() {
	            if (isSending) {
	                return;
	            }
	            var checkRes = MobileLogin.fields[0].check();

	            if (!checkRes.pass) {
	                MobileLogin.emit("error", checkRes.msg);
	                return;
	            }
	            isSending = true;
	            //先出图形验证码

	            CapPop({
	                capEnvData: capEnvData,
	                mobile: getMobile(),
	                captchaChannel: 102
	            }, function (uuid) {
	                Request({
	                    url: config.send,
	                    data: {
	                        mobileNo: getMobile(),
	                        mobile: getMobile(), // 兼容微信登录
	                        uuid: uuid,
	                        type: messageType
	                    },
	                    onSuc: function onSuc(res) {
	                        countdown(send, function () {
	                            isSending = false;
	                        });
	                        if (res.code === 200) {
	                            MobileLogin.emit("info", res.msg.info);
	                        } else {
	                            MobileLogin.emit("error", res.msg.err);
	                        }
	                    }
	                });
	            }, function () {
	                isSending = false;
	            });
	        };

	        addEvent(send, "click", sendCapcha);

	        if (options.autoSend) {
	            sendCapcha();
	        }
	    };

	    /**
	     * 倒计时
	     * */
	    var countdown = function countdown(dom, finish) {
	        var current = 60;
	        dom.className = dom.className + " sending";
	        var timer = setInterval(function () {
	            if (current > 1) {
	                dom.innerHTML = "重新发送(" + current + ")";
	                current--;
	            } else {
	                clearInterval(timer);
	                dom.innerHTML = "发送验证码";
	                dom.className = dom.className.replace("sending", "");
	                finish();
	            }
	        }, 1000);
	    };

	    render();

	    MobileLogin.init();

	    MobileLogin.setForm([{
	        input: mobileInput,
	        validator: /^(\d+_\d+)|(1\d{10})$/,
	        msg: "请输入正确的手机号",
	        getValue: getMobile,
	        condition: function condition() {
	            return getMobile().length <= 16;
	        }
	    }, {
	        input: codeInput,
	        validator: /^\d+$/,
	        msg: "请输入正确的验证码"
	    }, {
	        input: channelInput,
	        validator: /^[\w\W]+$/,
	        msg: "无效的渠道号"
	    }, {
	        input: typeInput,
	        validator: /\d+/,
	        msg: "无效的短信类型"
	    }], options.formData);

	    initEvent();

	    return MobileLogin;
	};

/***/ },
/* 27 */
/***/ function(module, exports, __webpack_require__) {

	exports.create = function (type, channel, options) {
	    options = options || {};
	    var loginer;
	    var container = document.createElement("div");

	    switch (type) {
	        case "mobile:phone":
	            loginer = __webpack_require__(26).create(container, channel, options);
	            break;
	        case "mobile:account":
	            loginer = __webpack_require__(25).create(container, channel, options);
	            break;
	        case "pc:phone":
	            loginer = __webpack_require__(8).create(container, channel, options);
	            break;
	        case "pc:account":
	            loginer = __webpack_require__(8).create(container, channel, options);
	            break;
	        case "pc:reg":
	            loginer = __webpack_require__(8).create(container, channel, options, true);
	    }

	    return {
	        loginer: loginer,
	        container: container
	    };
	};

/***/ },
/* 28 */
/***/ function(module, exports, __webpack_require__) {

	var Event = __webpack_require__(4);
	var Extend = __webpack_require__(2);
	/**
	 * Class Validate
	 * */
	var Validate = function Validate(matcher, msg) {
	    if (matcher !== undefined) {
	        this.setMatcher(matcher);
	    }
	    if (msg !== undefined) {
	        this.setMsg(msg);
	    }
	};
	Validate.prototype = {
	    constructor: Validate,
	    setMatcher: function setMatcher(matcher) {
	        if (Object.prototype.toString.call(matcher) !== "[object RegExp]") {
	            throw new Error("matcher must be regexp");
	        } else {
	            this.matcher = matcher;
	        }
	    },
	    setValue: function setValue(value) {
	        this.value = value;
	    },
	    setMsg: function setMsg(msg) {
	        this.msg = msg;
	    },
	    match: function match() {
	        if (!this.preMatch()) {
	            return false;
	        }
	        if (this.matcher) {
	            return this.matcher.test(this.value);
	        }
	        return true;
	    },
	    preMatch: function preMatch() {
	        //正则前预先校验， 用于非正则匹配，比如长度等
	        return true;
	    }
	};

	Extend(Validate.prototype, Event);

	module.e = Validate;

/***/ },
/* 29 */,
/* 30 */,
/* 31 */
/***/ function(module, exports, __webpack_require__) {

	/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__file_name_name_ext_css_easy_login_default_css__ = __webpack_require__(17);
	/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__file_name_name_ext_css_easy_login_default_css___default = __WEBPACK_IMPORTED_MODULE_0__file_name_name_ext_css_easy_login_default_css__ && __WEBPACK_IMPORTED_MODULE_0__file_name_name_ext_css_easy_login_default_css__.__esModule ? function() { return __WEBPACK_IMPORTED_MODULE_0__file_name_name_ext_css_easy_login_default_css__['default'] } : function() { return __WEBPACK_IMPORTED_MODULE_0__file_name_name_ext_css_easy_login_default_css__; }
	/* harmony import */ Object.defineProperty(__WEBPACK_IMPORTED_MODULE_0__file_name_name_ext_css_easy_login_default_css___default, 'a', { get: __WEBPACK_IMPORTED_MODULE_0__file_name_name_ext_css_easy_login_default_css___default });
	/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__style_css_minimize_css_easy_login_cap_css__ = __webpack_require__(18);
	/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__style_css_minimize_css_easy_login_cap_css___default = __WEBPACK_IMPORTED_MODULE_1__style_css_minimize_css_easy_login_cap_css__ && __WEBPACK_IMPORTED_MODULE_1__style_css_minimize_css_easy_login_cap_css__.__esModule ? function() { return __WEBPACK_IMPORTED_MODULE_1__style_css_minimize_css_easy_login_cap_css__['default'] } : function() { return __WEBPACK_IMPORTED_MODULE_1__style_css_minimize_css_easy_login_cap_css__; }
	/* harmony import */ Object.defineProperty(__WEBPACK_IMPORTED_MODULE_1__style_css_minimize_css_easy_login_cap_css___default, 'a', { get: __WEBPACK_IMPORTED_MODULE_1__style_css_minimize_css_easy_login_cap_css___default });

	window.Toast = window.Toast || alert;


	window.EasyLogin = __webpack_require__(15);
	window.activityLogin = __webpack_require__(13);

/***/ },
/* 32 */,
/* 33 */,
/* 34 */,
/* 35 */,
/* 36 */,
/* 37 */
/***/ function(module, exports, __webpack_require__) {

	exports = module.e = __webpack_require__(9)();
	// imports


	// module
	exports.push([module.i, ".EasyLogin_Mobile_Overlay{position:fixed;z-index:100000000;left:0;top:0;background:#000;opacity:.4;width:100%;height:100%}.EasyLogin_Mobile_ImgPop{z-index:100000001;background:#fff;border-radius:10px;-webkit-border-radius:10px;-moz-border-radius:10px;-ms-border-radius:10px;position:fixed;left:5%;top:50%;margin-top:-110px;padding:0 20px 25px;width:90%;box-sizing:border-box}.EasyLogin_Mobile_ImgPop .EasyLogin_Title{line-height:55px;color:#323232;text-align:center;font-size:20px;border-bottom:1px dashed #e1e1e1}.EasyLogin_Mobile_ImgPop .EasyLogin_Cap{margin:25px 0 15px;display:box;display:-webkit-box;display:-ms-flexbox}.EasyLogin_Mobile_ImgPop .EasyLogin_Cap img,.EasyLogin_Mobile_ImgPop .EasyLogin_Cap input{border-radius:6px;-webkit-border-radius:6px;-moz-border-radius:6px;-ms-border-radius:6px}.EasyLogin_Mobile_ImgPop .EasyLogin_Cap input{-webkit-box-flex:1;box-flex:1;-ms-box-flex:1;-ms-flex:1;text-align:center;font-size:20px;border:1px solid #e1e1e1;display:block;height:51px;margin-right:10px;outline:none}.EasyLogin_Mobile_ImgPop .EasyLogin_Cap img{width:130px;height:53px;display:block}.EasyLogin_Mobile_ImgPop .EasyLogin_Mobile_Msg{line-height:25px;font-size:12px;color:red}.EasyLogin_Mobile_Btn{display:block;background-color:#f63;line-height:45px;color:#fff;text-align:center;border-radius:5px;-webkit-border-radius:5px;-moz-border-radius:5px;-ms-border-radius:5px;font-size:18px;text-decoration:none}", ""]);

	// exports


/***/ },
/* 38 */,
/* 39 */
/***/ function(module, exports) {

	module.e = EasyLogin;

/***/ },
/* 40 */
/***/ function(module, exports) {

	module.e = Toast;

/***/ },
/* 41 */,
/* 42 */
/***/ function(module, exports) {

	module.e = envConstant;

/***/ }
/******/ ]);