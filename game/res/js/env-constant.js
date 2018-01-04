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
/******/ 	return __webpack_require__(__webpack_require__.s = 33);
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

/***/ 16:
/***/ function(module, exports, __webpack_require__) {

	var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol ? "symbol" : typeof obj; };

	var DPApp = __webpack_require__(11);
	DPApp.config({ unsupportOldApp: true });
	var $ = __webpack_require__(0);
	__webpack_require__(30);
	__webpack_require__(29);

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

	var userInfoPromise = function userInfoPromise() {
		var dtd = $.Deferred();
		if (!constant.dpFlag) {
			constant.dpid = '';
			constant.userId = '';
			constant.token = '';
			dtd.resolve();
		} else {
			DPApp.getUserInfo({
				success: function success(e) {
					constant.dpid = e.dpid;
					constant.userId = e.userId;
					constant.token = e.token;
					dtd.resolve();
				}
			});
		}
		return dtd.promise();
	};

	var cityIdPromise = function cityIdPromise() {
		var dtd = $.Deferred();
		DPApp.getCityId({
			success: function success(e) {
				constant.cityId = e.cityId ? e.cityId : 0;
				dtd.resolve();
			},
			fail: function fail(e) {
				constant.cityId = 0;
				dtd.resolve();
			}
		});
		return dtd.promise();
	};

	var dpLocationPromise = function dpLocationPromise() {
		var dtd = $.Deferred();
		DPApp.getLocation({
			success: function success(e) {
				constant.lng = e.lng;
				constant.lat = e.lat;
				dtd.resolve();
			},
			fail: function fail(e) {
				constant.lng = '';
				constant.lat = '';
				dtd.resolve();
			}
		});
		return dtd.promise();
	};

	var WhereAmI = __webpack_require__(41);
	var whereAmIpromise = function whereAmIpromise(config) {
		config && WhereAmI.config(config);

		var dtd = $.Deferred();
		WhereAmI(function (e) {
			constant.lng = e.lng;
			constant.lat = e.lat;
			if (config.city) {
				if (e.city) {
					constant.cityId = e.city.cityid;
				} else {
					constant.cityId = 0;
				}
			}
			dtd.resolve();
		}, function () {
			constant.lng = '';
			constant.lat = '';
			constant.cityId = 0;
			dtd.resolve();
		});
		return dtd.promise();
	};

	var locationPromise = function locationPromise() {
		if (WhereAmI) {
			var config = {};
			if (!constant.dpFlag) config.city = true;
			return whereAmIpromise(config);
		} else {
			return dpLocationPromise();
		}
	};

	var cxPromise = function cxPromise() {
		var dtd = $.Deferred();
		DPApp.getCX({
			business: 'payorder',
			success: function success(e) {
				constant.fingerprint = e.fingerprint;
				dtd.resolve();
			},
			fail: function fail(e) {
				constant.fingerprint = '';
				dtd.resolve();
			}
		});
		return dtd.promise();
	};

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

	var put = function put(k, v) {
		(typeof v === 'undefined' ? 'undefined' : _typeof(v)) === 'object' ? putCustom(k, v) : putRegular(k, v);
	};

	putRegular('mLogin', 'http://m.51ping.com/login?redir=' + location.href);
	var dpLogin = function dpLogin(callback) {
		if (constant.dpFlag) {
			DPApp.login({
				success: function success(e) {
					constant.dpid = e.dpid;
					constant.userId = e.userId;
					constant.token = e.token;
					callback && callback();
				}
			});
		} else {
			location.href = constant.mLogin;
		}
	};

	var pullDown = function pullDown() {
		DPApp.setPullDown({
			success: function success() {},
			fail: function fail() {},
			handle: function handle() {
				DPApp.stopPullDown({
					success: function success() {
						location.reload();
					},
					fail: function fail() {}
				});
			}
		});
	};

	var redirect = function redirect(url) {
		if (constant.dpFlag) {
			if (url.indexOf('dianping://') == 0) {
				DPApp.openScheme({
					url: url
				});
			} else {
				DPApp.openScheme({
					url: 'dianping://web',
					extra: {
						url: url
					}
				});
			}
		} else {
			location.href = url;
		}
	};

	var synthesislink = function synthesislink(url, link) {
		if (constant.dpFlag) {
			redirect(url);
		} else {
			location.href = link;
		}
	};

	var searchToObject = function searchToObject() {
		var url = location.search;
		var obj = new Object();
		if (url.indexOf('?') != -1) {
			var str = url.substr(1);
			var strs = str.split('&');
			for (var i = 0; i < strs.length; i++) {
				obj[strs[i].split('=')[0]] = decodeURI(strs[i].split('=')[1]);
			}
		}
		return obj;
	};

	// 去除iphone事件补丁，发现闪屏问题
	//  if (/ip(hone|od)|ipad/i.test(navigator.userAgent)) {
	//  	$("body").css("cursor", "pointer");
	//  }
	var ready = function ready(callback) {
		$(document).on('click', '[data-href]', function (e) {
			redirect($(this).data('href'));
		});
		constant.search = searchToObject();
		constant.search.anchor && $(window).scrollTop($(constant.search.anchor).offset().top);

		var dtd = $.Deferred();
		DPApp.ready(function () {
			$.when(userInfoPromise(), cityIdPromise(), locationPromise()).then(function () {
				$.abFuncs.push(function (data, headers, options) {
					if (!data.token && constant.token) data.token = constant.token;
					if (!data.dpid && constant.dpid) data.dpid = constant.dpid;
					if (!data.userId && constant.userId) data.userId = constant.userId;
					if (!data.cityId && constant.cityId) data.cityId = constant.cityId;
					if (!data.lng && constant.lng) data.lng = constant.lng;
					if (!data.lat && constant.lat) data.lat = constant.lat;
				});
				callback && callback();
				dtd.resolve();
			});
		});
		return dtd.promise();
	};

	// for test
	var setProductEnv = function setProductEnv(value) {
		productEnv = value;
	};

	module.e = {
		put: put,
		putRegular: putRegular,
		putCustom: putCustom,
		constant: constant,

		userInfoPromise: userInfoPromise,
		cityIdPromise: cityIdPromise,
		dpLocationPromise: dpLocationPromise,
		whereAmIpromise: whereAmIpromise,
		locationPromise: locationPromise,
		cxPromise: cxPromise,

		dpLogin: dpLogin,
		pullDown: pullDown,
		redirect: redirect,
		synthesislink: synthesislink,
		searchToObject: searchToObject,

		setProductEnv: setProductEnv,

		ready: ready
	};

/***/ },

/***/ 29:
/***/ function(module, exports, __webpack_require__) {

	var $ = __webpack_require__(0);

	$.exceptionMapper = {};

	var errorMsgReg = /^Uncaught (.+Error): (.*)/;
	window.addEventListener('error', function (e) {
	    var errorName;
	    var errorMsg;
	    var error = e.error;
	    var message = e.message;
	    if (error) {
	        errorName = error.name;
	        errorMsg = error.message;
	    } else {
	        var temp = message.match(errorMsgReg);
	        if (!temp) return true;
	        errorName = temp[1];
	        errorMsg = temp[2];
	    }
	    var errorHandler = $.exceptionMapper[errorName];
	    if (errorHandler) {
	        errorHandler(errorMsg);
	        e.preventDefault();
	    }
	});

	$.newError = function (type) {
	    var errorFunctionName = type + 'Error';
	    if (!window[errorFunctionName]) {
	        var errorFunctionTemplate = '\n            function ' + errorFunctionName + '(message) {\n                this.name = \'' + errorFunctionName + '\'\n                this.message = message || \'client error\'\n                this.stack = (new Error()).stack\n            }\n            ' + errorFunctionName + '.prototype = Object.create(Error.prototype)\n            ' + errorFunctionName + '.prototype.constructor = ' + errorFunctionName + '\n            window.' + errorFunctionName + ' = ' + errorFunctionName + '\n        ';
	        eval(errorFunctionTemplate);
	    }
	    return window[errorFunctionName];
	};

	$.cError = function (type, message) {
	    type = type || '';
	    message = message || '';
	    var errorFunction = $.newError(type);
	    throw new errorFunction(message);
	};

/***/ },

/***/ 30:
/***/ function(module, exports, __webpack_require__) {

	/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
	/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __WEBPACK_IMPORTED_MODULE_0_jquery__ && __WEBPACK_IMPORTED_MODULE_0_jquery__.__esModule ? function() { return __WEBPACK_IMPORTED_MODULE_0_jquery__['default'] } : function() { return __WEBPACK_IMPORTED_MODULE_0_jquery__; }
	/* harmony import */ Object.defineProperty(__WEBPACK_IMPORTED_MODULE_0_jquery___default, 'a', { get: __WEBPACK_IMPORTED_MODULE_0_jquery___default });


	/* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.scrollTo = function (selector, animation) {
	    var duration = arguments.length <= 2 || arguments[2] === undefined ? 400 : arguments[2];

	    var top = /* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.bind()(selector).offset().top;
	    if (!animation) {
	        /* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.bind()(window).scrollTop(top);
	    } else {
	        /* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.bind()('body').animate({ scrollTop: top }, duration);
	    }
	};

	/* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.each(['put', 'delete'], function (i, method) {
	    /* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a[method] = function (url, data, callback, type) {
	        // Shift arguments if data argument was omitted
	        if (/* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.isFunction(data)) {
	            type = type || callback;
	            callback = data;
	            data = undefined;
	        }

	        return /* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
	            url: url,
	            type: method,
	            dataType: type,
	            data: data,
	            success: callback
	        });
	    };
	});

	var rheaders = /^(.*?):[ \t]*([^\r\n]*)$/mg;
	var getResponseHeader = function getResponseHeader(responseHeadersString) {
	    var responseHeaders = {};
	    var match;
	    while (match = rheaders.exec(responseHeadersString)) {
	        responseHeaders[match[1].toLowerCase()] = match[2];
	    }
	    return responseHeaders;
	};

	var originalAjax = /* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax.bind(/* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a);

	/* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax = function (options) {
	    if (!options.data) options.data = {};
	    if (!options.headers) options.headers = {};
	    if (/* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajaxBefore && /* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajaxBefore(options.data, options.headers, options) === false) return;

	    var originalSuccess = options.success;
	    delete options.success;

	    var ajaxPromise = originalAjax(options);

	    return ajaxPromise.then(function (data, textStatus, jqXHR) {
	        var afterData;
	        if (/* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajaxAfter) {
	            var headers = getResponseHeader(jqXHR.getAllResponseHeaders ? jqXHR.getAllResponseHeaders() : '');
	            afterData = /* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajaxAfter(data, headers, options, textStatus, jqXHR);
	        }
	        if (afterData === undefined) afterData = data;

	        if (afterData === false) return /* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.Deferred().reject(data, textStatus, jqXHR);

	        originalSuccess && originalSuccess(afterData, textStatus, jqXHR);
	        return /* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.Deferred().resolve(afterData, textStatus, jqXHR);
	    });
	};

	/* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.abFuncs = [];
	/* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.aaFuncs = [];

	/* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajaxBefore = function (data, headers, options) {
	    if (data.jb !== undefined) {
	        delete data.jb;
	        return;
	    }
	    var beforeData;
	    /* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.abFuncs.forEach(function (fn) {
	        beforeData = fn(data, headers, options);
	        if (beforeData === false) return false;
	    });
	    return beforeData;
	};

	/* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajaxAfter = function (data, headers, options, textStatus, jqXHR) {
	    if (options.data.ja !== undefined) return;
	    var afterData;
	    /* harmony import */__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.aaFuncs.every(function (fn) {
	        var tempData = fn(data, headers, options, textStatus, jqXHR);
	        if (tempData !== undefined) afterData = tempData;
	        return !(afterData === false);
	    });
	    return afterData;
	};

/***/ },

/***/ 33:
/***/ function(module, exports, __webpack_require__) {

	

	window.WhereAmI = window.WhereAmI || '';
	window.envConstant = __webpack_require__(16);
	window.constant = window.envConstant.constant;

/***/ },

/***/ 41:
/***/ function(module, exports) {

	module.e = WhereAmI;

/***/ }

/******/ });