var BodyHeight = document.body.offsetHeight;
var pageTwoTop = BodyHeight * 0.44;
var pageTwoTopa = BodyHeight * 0.568;
var u = navigator.userAgent;
var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
var k = 0;
var num = 0;
$("#nameone,#nametwo").focus(function() {
	if(isAndroid) {
		changeWH();
	}
});

function changeWH() {
	$("body").css("height", BodyHeight);
	$("#index").css("height", BodyHeight);
	$("#pagetwo").css("height", BodyHeight);
	$("#pagethree").css("height", BodyHeight);
}
$(".pageOne-2").click(function() {
	$("#pageone").hide();
	$("#pagetwo").show();
});
$(".pageOne-3").click(function() {
	$("#pageone").hide();
	$("#pagethree").show();
});

$(".pageTwo-2").click(function() {
	$(".pageTwo-2").hide()
	$(".pageTwo-22").show()
	$(".pageTwo-3").show()
	$(".pageTwo-33").hide()
	num = 1;
});
$(".pageTwo-3").click(function() {
	$(".pageTwo-33").show()
	$(".pageTwo-3").hide()
	$(".pageTwo-2").show()
	$(".pageTwo-22").hide()
	num = 2;

});

$(".pageThree-2").click(function() {
	$(".pageThree-2").hide()
	$(".pageThree-22").show()
	$(".pageThree-3").show()
	$(".pageThree-33").hide()
	num = 3;
});
$(".pageThree-3").click(function() {
	$(".pageThree-33").show()
	$(".pageThree-3").hide()
	$(".pageThree-2").show()
	$(".pageThree-22").hide();
	num = 4;
});

$(".submit").click(function() {
	check();
});

function check() {
	var flag = true;
	if(num == 0) {
		alert('请选择选项');
		return false;
	}
	if($("#pagetwo").is(":visible")) {
		var nameone = document.getElementById("nameone").value;
		if(nameone == '') {
			alert("输入你的姓名！");
			return false;
		} else {
			if(num == 1) {
				k = Math.floor(Math.random() * 16);
			} else if(num == 2) {
				k = Math.floor(Math.random() * 14);
			}
			$(".result-1").attr("src", 'getimg.php?nameone=' + nameone + '&k=' + k + '&num=' + num);
			$(".result").show();
			$(".pagetwo").hide();
			shareend(nameone,num);
		}
	} else {
		var nameone = document.getElementById("nametwo").value;
		if(nameone == '') {
			alert("输入你的姓名！");
			return false;
		} else {
			if(num == 3) {
				k = Math.floor(Math.random() * 10);
			} else if(num == 4) {
				k = Math.floor(Math.random() * 6);
			}
			shareend(nameone,num);
			$(".result-1").attr("src", 'getimg.php?nameone=' + nameone + '&k=' + k + '&num=' + num);
			$(".result").show();
			$(".pagetwo").hide();
		}
	}
}

function shareend(name,num) {
	var url1 = location.href.split('#')[0];
	var name= name;
	var num=num;
	var desc="";
	if((num==1)||(num==2)){
		desc=name+"刚刚生成了专属的七夕头条，嗯，这份狗粮我吃了。";
	}else if((num==3)||(num==4)){
		desc=name+"刚刚生成了专属的七夕头条，嗯，今天狗粮特价 ";
	}
	$.ajax({
		type: 'GET',
		url: '../../api/sample.php',
		dataType: 'json',
		data: {
			appid: "",
			secret: "",
			url1: url1,
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			//alert("请求对象" + XMLHttpRequest);
			//alert("错误类型" + textStatus);
			//alert("异常对象" + errorThrown);
			return false;
		},
		success: function(data) {
			var appId = data.appId;
			var timestamp = data.timestamp;
			var nonceStr = data.nonceStr;
			var signature = data.signature;
			wx.config({
				debug: false,
				appId: appId,
				timestamp: timestamp,
				nonceStr: nonceStr,
				signature: signature,
				jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage']
			});
			wx.ready(function() {
				// 在这里调用 API
				wx.onMenuShareTimeline({
					title: '七夕装逼新攻略：龙湖邀你上头条！', // 分享标题
					link: 'http://www.cdunited.cn/longhu/lhqixi', // 分享链接
					imgUrl: 'http://www.cdunited.cn/longhu/lhqixi/img/share.jpg', // 分享图标
					desc: desc,
					success: function() {
						// 用户确认分享后执行的回调函数
					},
					cancel: function() {
						// 用户取消分享后执行的回调函数	
					}
				});
				wx.onMenuShareAppMessage({
					title: '七夕装逼新攻略：龙湖邀你上头条！', // 分享标题
					link: 'http://www.cdunited.cn/longhu/lhqixi', // 分享链接
					imgUrl: 'http://www.cdunited.cn/longhu/lhqixi/img/share.jpg', // 分享图标
					desc: desc,
					type: '', // 分享类型,music、video或link，不填默认为link
					dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
					success: function() {
						// 用户确认分享后执行的回调函数
					},
					cancel: function() {
						// 用户取消分享后执行的回调函数
					}
				});
			});
		}
	});
}