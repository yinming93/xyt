;(function(root, undefined) {
	'use strict';

	var getItemsByAttr = function(elems, attr, val) {
			var elem;
			var arr = [];
			for (var i = 0, l = elems.length; i < l; ++i) {
				elem = elems[i];
				if (elem.getAttribute(attr) === val) {
					arr.push(elem);
				}
			}
			return arr;
		};

	var hasQueryString = function(name, str) {
			var pos = str.indexOf('?');
			if (pos > 0) {
				str = str.substring(pos);
			}
			var reg = new RegExp("(^|&)" + name + "(=|&|$)");
			return reg.test(str.substr(1));
		};

	var getQueryString = function(name, str) {
			var pos = str.indexOf('?');
			if (pos > 0) {
				str = str.substring(pos);
			}
			var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
			var r = str.substr(1).match(reg);
			return r !== null ? decodeURI(r[2]) : null;
		};

	var getType = function(o) {
			return Object.prototype.toString.call(o).match(/^\[object\s(.*)\]$/)[1];
		};

	var _log = function(data) {
			var msg = '[ideal viewport] ' + data.type + ': ';

			switch(data.tpl) {
				case 'arguments':
					msg += 'arguments "' + data.name + '" value is ' + data.val + '(' + getType(data.val) + ')';
					break;

				default:
					msg += data.msg;
					break;
			}

			console.log(msg);
		};


	/* 理想视口 */
	var idealViewport = function(_options) {
			var options      = _options            || {};
			var orientation  = options.orientation || 'portrait';
			var width        = options.width       || 'device-width';
			var addMarker    = options.addMarker   || true;

			var scale = 1.0;
			var screenWidth = window.screen.width;
			var screenHeight = window.screen.height;

			var portrait = function() {
					if (screenWidth < screenHeight) {
						scale = parseInt(screenWidth) / width;
					}
					else {
						scale = parseInt(screenHeight) / width;
						width = width / screenHeight * screenWidth;
					}
				};

			var landscape = function() {
					if (screenWidth > screenHeight) {
						scale = parseInt(screenWidth) / width;
					}
					else {
						scale = parseInt(screenHeight) / width;
						width = width / screenHeight * screenWidth;
					}
				};

			var contentKeys = [
					'width',
					'height',
					'initial-scale',
					'minimum-scale',
					'maximum-scale',
					'user-scalable',
					'target-densitydpi'
				];

			var contentVals = {
					'width'            : 'device-width',
					'height'           : null,
					'initial-scale'    : 1.0,
					'minimum-scale'    : 1.0,
					'maximum-scale'    : 1.0,
					'user-scalable'    : 'no',
					'target-densitydpi': 'device-dpi'
				};


			/* 计算参数 */
			if (width !== 'device-width') {
				if (isNaN(parseInt(width))) {
					_log({
						type: 'note',
						tpl: 'arguments',
						name: 'width',
						val: width
					});
					width = 'device-width';
				}
				else {
					width = parseInt(width);
					if (orientation === 'portrait') {
						portrait();
					}
					else if (orientation === 'landscape') {
						landscape();
					}
					else {
						_log({
							type: 'note',
							tpl: 'arguments',
							name: 'orientation',
							val: orientation
						});
						portrait();
					}

					// 设置内容
					contentVals.width = width;
					contentVals['initial-scale'] = scale;
					contentVals['minimum-scale'] = scale;
					contentVals['maximum-scale'] = scale;
				}
			}


			/* 构建内容 */
			var content = '';
			var key, val;
			for (var i = 0, l = contentKeys.length; i < l; ++i) {
				key = contentKeys[i];
				val = contentVals[key];
				if (val !== null) {
					content += key + '=' + val;
					if (i + 1 < l) {
						content += ', ';
					}
				}
			}


			/* 创建标签 */
			var meta = document.createElement('meta');
			meta.setAttribute('name', 'viewport');
			meta.setAttribute('content', content);
			if (addMarker) {
				meta.setAttribute('data-ideal-viewport', '');
			}


			/* 插入标签 */
			var head = document.getElementsByTagName('head')[0];
			var metas = head.getElementsByTagName('meta');

			var target = getItemsByAttr(metas, 'data-ideal-viewport', '')[0];
			if (target) {
				head.insertBefore(meta, target);
				head.removeChild(target);
				return meta;
			}

			var viewportArr = getItemsByAttr(metas, 'name', 'viewport');
			var viewport = viewportArr[viewportArr.length - 1];
			if (viewport) {
				head.insertBefore(meta, viewport.nextSibling);
				return meta;
			}

			var lastMeta = metas[metas.length - 1];
			if (lastMeta) {
				head.insertBefore(meta, lastMeta.nextSibling);
				return meta;
			}

			var firstChildNode = head.childNodes[0];
			if (firstChildNode) {
				head.insertBefore(meta, firstChildNode);
				return meta;
			}

			head.appendChild(meta);
			return meta;
		};


	/* 自动创建 */
	var autoCreate = 'true';
	var scripts = document.getElementsByTagName('script');
	var script, src;
	for (var i = 0, l = scripts.length; i < l; ++i) {
		script = scripts[i];
		src = script.getAttribute('src');
		if (src && hasQueryString('ideal-viewport', src)) {
			break;
		}
		else {
			script = null;
		}
	}

	if (script) {
		var orientation, width, addMarker;

		// 获取参数
		autoCreate = getQueryString('auto', src) || autoCreate;
		if (autoCreate === 'true') {
			orientation = getQueryString('orientation', src);
			width       = getQueryString('width',       src);
			addMarker   = getQueryString('addMarker',   src);
		}

		if (autoCreate === 'true') {
			idealViewport({
				orientation: orientation,
				width      : width,
				addMarker  : addMarker,
			});
		}
	}


	/* 模组支持 */
	if (typeof define === 'function' && define.amd) {
		define(['idealViewport'], function () { return idealViewport; });
	}
	else if (typeof module !== 'undefined' && typeof exports === 'object') {
		module.exports = idealViewport;
	}
	else if (root !== undefined) {
		root.idealViewport = idealViewport;
	}
})(this);
