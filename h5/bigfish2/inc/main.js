require.config({
    paths: {
		jquery:	'lib/jquery-3.1.0.min',
		PreloadJS: 'lib/preloadjs-0.6.2.min',
		jweixin: 'http://res.wx.qq.com/open/js/jweixin-1.0.0',
		jstween: 'lib/jstween.min',
		jstimeline: 'lib/jstimeline.min'
    }
});


define('Global', [], function() {
	var Global = {};

	Global.manifest = [
		'http://www.idreamroom.com/bigfish/style/images/img/13_36_12_793.jpg',
		'http://www.idreamroom.com/bigfish/style/img/14_15_15_323.png',
		'http://www.idreamroom.com/bigfish/style/img/14_15_15_432.png',
		'http://www.idreamroom.com/bigfish/style/img/14_15_15_588.png',
		'http://www.idreamroom.com/bigfish/style/img/14_15_15_713.png',
		'http://www.idreamroom.com/bigfish/style/img/10_22_4_724.png',
		'http://www.idreamroom.com/bigfish/style/img/10_22_4_787.png',
		'http://www.idreamroom.com/bigfish/style/img/14_15_15_916.png',
		'http://www.idreamroom.com/bigfish/style/img/14_15_15_995.png',
		'http://www.idreamroom.com/bigfish/style/img/14_15_16_57.png',
		'http://www.idreamroom.com/bigfish/style/img/13_27_8_33.png',
		'http://www.idreamroom.com/bigfish/style/img/17_16_1_552.png',
		'http://www.idreamroom.com/bigfish/style/img/17_17_42_677.png',
		'http://www.idreamroom.com/bigfish/style/img/17_19_29_646.png',
		'http://www.idreamroom.com/bigfish/style/img/17_21_21_818.png'
	];

	Global.wxConfig = {
		debug: false,
		jsApiList: [
			'checkJsApi',
			'onMenuShareTimeline',
			'onMenuShareAppMessage'
		]
	};
	Global.shareData = {
		title: '拉到底就可以摆脱地心引力',
		desc: '不一样的微信文章',
		link: 'http://www.idreamroom.com/bigfish2',
		imgUrl: 'http://www.idreamroom.com/bigfish2/res/img/share.jpg'
	};

	return Global;
});


require(['jquery', 'PreloadJS', 'jweixin', 'jstween', 'jstimeline', 'Global'], function($, PreloadJS, wx, JT, JTL, Global) {
	var browser = {
		versions: function() {
			var u = navigator.userAgent, app = navigator.appVersion;
			return { //移动终端浏览器版本信息 
				ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端 
				android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或uc浏览器 
				iPhone: u.indexOf('iPhone') > -1, //是否为iPhone或者QQHD浏览器 
				iPad: u.indexOf('iPad') > -1, //是否iPad 
			};
		}(),
	};
	if (browser.versions.iPhone || browser.versions.iPad || browser.versions.ios) {
		$('p').css('fontSize', '22px');
		$('.fs30').css('fontSize', '34px');
		$('.fs22').css('fontSize', '30px');
	}

	var $bgm = $('#bgm');
	var bgmLoaded = false;
	$bgm.one('timeupdate', function() {
		if (poster_state) { return; }
		bgmLoaded = true;
		$bgm[0].pause();
	});
	$(window).on('touchstart', function() {
		if (bgmLoaded) { return; }
		$bgm[0].play();
	});

	// 加载资源
	var loader = new createjs.LoadQueue(false);
    loader.setMaxConnections(100);
    loader.maintainScriptOrder = true;
	loader.addEventListener('progress', function (e) {
		console.log(Math.floor(e.progress * 100) + '%');
	});
    loader.addEventListener('complete', function () {});
    loader.loadManifest(Global.manifest);


	var state = 1;
	var $window = $(window);
	var $body = $('body');
	var $main = $('.main');
	var $div = $main.find(':not(audio, .poster, .info, .content, span, br, img)');

	var $img = $main.find('.content img');
	var imgLoad = function (url, callback) {
			var img = new Image();
			img.src = url;
			if (img.complete) {
				callback(url);
			}
			else {
				img.onload = function () {
					callback(url);
					img.onload = null;
				};
			};
		};
	var hasLoaded = [];
	var isAllLoaded = false;
	var checkMode = 0;
	var imgCheck = function() {
			if (isAllLoaded) { return; }
			$img.each(function(i) {
				var $this = $(this);
				var offsetTop = $this.offset().top + (checkMode === 0 ? 0 : $this.parent().height() / 2);
				if (!hasLoaded[i] && $window.scrollTop() + $window.height() > offsetTop) {
					hasLoaded[i] = true;
					if (hasLoaded.length >= $img.length) {
						isAllLoaded = true;
					}
					imgLoad($this.data('src'), function(url) {
						$this.attr('src', url);
					});
				}
			});
		};
	imgCheck();
	checkMode = 1;
	

	$window.on('scroll', function() {
		imgCheck();
		if (state === 1 && $window.height() + $window.scrollTop() > $main[0].scrollHeight - 10) {
			state = 2;
			$window.on(navigator.userAgent.indexOf("Firefox") > 0 ? 'DOMMouseScroll' : 'mousewheel', function() { return false; });
			$window.on('touchstart', function() { return false; });
			$body.stop().animate({ scrollTop: $main[0].scrollHeight - $window.height() }, 500, anim);
		}
	});

	var anim = function() {
			$body.css({
				width: '100%',
				overflow: 'hidden'
			});
			$main.css({
				height: $main.height(),
				overflow: 'hidden',
				webkitPerspective: 1000,
				perspective : 1000,
				//webkitPerspectiveOrigin: '50% 50% 0', perspectiveOrigin: '50% 50% 0',
				webkitTransformStyle: 'flat',
				transformStyle: 'flat'
			});
			setTimeout(function() {
				$body.stop().animate({
					scrollTop: 0
				}, 5000);
				//$main.stop().animate({ height: $window.height() }, 5000);

				var i = $div.length - 1;
				var timer = setInterval(function() {
					$div.each(function() {
						var $this = $(this);
						if ($window.scrollTop() === 0) {
							clearInterval(timer);
							timer = setInterval(function() {
								if (i < 0) {
									clearInterval(timer);
									return;
								}
								$div.eq(i).data('anim-index', i);
								collect($div[i], i); --i;
							}, 80);
						}
						else if (typeof $this.data('anim-index') === 'undefined' && $window.scrollTop() + $window.height() / 2 < $this.offset().top) {
							$this.data('anim-index', i);
							collect(this, i); --i;
						}
					});
				}, 1000 / 16);
			}, 1000);
		};

	var collect = function(elem, index) {
			var $elem = $(elem);
			var offset = $elem.offset();
			var newVars = {
					left: ($main.width() - $elem.width()) / 2,
					top: ($window.height() - $elem.height()) / 2,
					rotationX: Math.random() * 721 - 360,
					rotationY: Math.random() * 721 - 360,
					rotationZ: Math.random() * 721 - 360,
					scaleX: 0.5,
					scaleY: 0.5,
					scaleZ: 0.5
				};
			$elem.css({
				position: 'absolute',
				left: offset.left,
				top: offset.top,
				width: $elem.width(),
				height: $elem.height()
			});
			JT.fromTo(elem, 1, {
				left: offset.left,
				top: offset.top,
				rotationX: 0,
				rotationY: 0,
				rotationZ: 0,
				scaleX: 1,
				scaleY: 1,
				scaleZ: 1
			}, {
				left: newVars.left,
				top: newVars.top,
				rotationX: newVars.rotationX,
				rotationY: newVars.rotationY,
				rotationZ: newVars.rotationZ,
				scaleX: newVars.scaleX,
				scaleY: newVars.scaleY,
				scaleZ: newVars.scaleZ,
				ease: JT.Quad.In,
				onEnd: function () {
					continuing(elem, newVars, index);
				}
			});
		};

	var regRX = new RegExp("rotateX[(]([^d]*)deg[)]");
	var regRY = new RegExp("rotateY[(]([^d]*)deg[)]");
	var regRZ = new RegExp("rotateZ[(]([^d]*)deg[)]");
	var continuing_state = 0;
	var continuing = function(elem, vars, index) {
			var $elem = $(elem);
			var s = (Math.random() >= 0.5 ? 1 : -1) * (Math.random() * 2 + 1) / 10;
			var newVars = {
					rotationX: Math.random() * 721 - 360,
					rotationY: Math.random() * 721 - 360,
					rotationZ: Math.random() * 721 - 360,
					scaleX: s,
					scaleY: s,
					scaleZ: s
				};
			JT.fromTo(elem, 1, {
				rotationX: vars.rotationX,
				rotationY: vars.rotationY,
				rotationZ: vars.rotationZ,
				scaleX: vars.scaleX,
				scaleY: vars.scaleY,
				scaleZ: vars.scaleZ
			}, {
				rotationX: newVars.rotationX,
				rotationY: newVars.rotationY,
				rotationZ: newVars.rotationZ,
				scaleX: newVars.scaleX,
				scaleY: newVars.scaleY,
				scaleZ: newVars.scaleZ,
				ease: JT.Quad.InOut,
				onEnd: function() {
					continuing(elem, newVars, index);
					if (continuing_state === 0 && index === 0) {
						continuing_state = 1;
						setTimeout(function() {
							JT.killAll();
							$div.each(function() {
								var $this = $(this);
								var rx, ry, rz;
								var rotationX = parseInt((rx = $this.attr('style').match(regRX), rx) ? rx[1] : 0);
								var rotationY = parseInt((ry = $this.attr('style').match(regRY), ry) ? ry[1] : 0);
								var rotationZ = parseInt((rz = $this.attr('style').match(regRZ), rz) ? rz[1] : 0);
								instability(this, {
									rotationX: rotationX,
									rotationY: rotationY,
									rotationZ: rotationZ
								}, parseInt($this.data('anim-index')));
							});
						}, 500);
					}
				}
			});
		};

	var instability_state = 0;
	var instability = function(elem, vars, index) {
			var $elem = $(elem);
			var newVars = {
					rotationX: vars.rotationX + (Math.random() * 6 - 3),
					rotationY: vars.rotationY + (Math.random() * 6 - 3),
					rotationZ: vars.rotationZ + (Math.random() * 6 - 3)
				};
			JT.fromTo(elem, 0.1, {
				rotationX: vars.rotationX,
				rotationY: vars.rotationY,
				rotationZ: vars.rotationZ
			}, {
				rotationX: newVars.rotationX,
				rotationY: newVars.rotationY,
				rotationZ: newVars.rotationZ,
				ease: JT.Linear.None,
				onEnd: function() {
					instability(elem, vars, index);
					if (instability_state === 0 && index === 0) {
						instability_state = 1;
						setTimeout(function() {
							JT.killAll();
							$div.each(function() {
								var $this = $(this);
								var rx, ry, rz;
								var rotationX = parseInt((rx = $this.attr('style').match(regRX), rx) ? rx[1] : 0);
								var rotationY = parseInt((ry = $this.attr('style').match(regRY), ry) ? ry[1] : 0);
								var rotationZ = parseInt((rz = $this.attr('style').match(regRZ), rz) ? rz[1] : 0);
								boom(this, {
									x: 0,
									y: 0,
									z: 0,
									rotationX: rotationX,
									rotationY: rotationY,
									rotationZ: rotationZ
								}, parseInt($this.data('anim-index')));
							});

							poster_state = true;
							$bgm[0].play();
							poster($poster[0], 1, function() {
								$poster.show();
							});
							$posterImg.each(function() {
								poster(this, 1.2, null);
							});
						}, 1000);
					}
				}
			});
		};

	var boom = function(elem, vars, index) {
			var $elem = $(elem);
			var newVars = {
					x: (Math.random() * 100 + 900) * (Math.random() >= 0.5 ? 1 : -1),
					y: (Math.random() * 100 + 900) * (Math.random() >= 0.5 ? 1 : -1),
					z: (Math.random() * 100 + 900) * (Math.random() >= 0.5 ? 1 : -1),
					rotationX: Math.random() * 721 - 360,
					rotationY: Math.random() * 721 - 360,
					rotationZ: Math.random() * 721 - 360
				};
			JT.fromTo(elem, 1, {
				opacity: 1,
				x: vars.x,
				y: vars.y,
				z: vars.z,
				rotationX: vars.rotationX,
				rotationY: vars.rotationY,
				rotationZ: vars.rotationZ
			}, {
				opacity: 0,
				x: newVars.x,
				y: newVars.y,
				z: newVars.z,
				rotationX: newVars.rotationX,
				rotationY: newVars.rotationY,
				rotationZ: newVars.rotationZ,
				ease: JT.Quad.Out,
				onEnd: function() {
					$elem.remove();
				}
			});
		};

	var poster_state = false;
	var $poster = $('.poster');
	var $posterImg = $poster.find('img');
	$poster.height($window.height());
	var poster = function(elem, time, onStart) {
			var s = (Math.random() >= 0.5 ? 1 : -1) * (Math.random() * 2 + 1) / 10;
			JT.fromTo(elem, time, {
				opacity: 0,
				rotationX: Math.random() * 721 - 360,
				rotationY: Math.random() * 721 - 360,
				rotationZ: Math.random() * 721 - 360,
				scaleX: s,
				scaleY: s,
				scaleZ: s
			}, {
				opacity: 1,
				rotationX: 0,
				rotationY: 0,
				rotationZ: 0,
				scaleX: 1,
				scaleY: 1,
				scaleZ: 1,
				ease: JT.Quad.Out,
				onStart: onStart
			});
		};

	var animate = function () {
		    requestAnimationFrame(animate);
		};


	// 微信接口
	var $share = $('.share');
	Global.shareData.success = function() {
		$share.hide();
		window.location.hash = "#" + new Date().getTime();
	};

	$.ajax({
		type: "POST",
		url: "inc/lib/wxshare/share.php",
		dataType: "json",
		data: {
			url: window.location.href
		}
	}).done(function(data) {
		wx.config({
			debug: Global.wxConfig.debug,
			appId: data.appId,
			timestamp: data.timestamp,
			nonceStr: data.nonceStr,
			signature: data.signature,
			jsApiList: Global.wxConfig.jsApiList
		});
		wx.ready(function () {
			wx.onMenuShareTimeline(Global.shareData);
			wx.onMenuShareAppMessage(Global.shareData);
		});
	});
});