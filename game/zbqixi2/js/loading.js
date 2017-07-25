//加载成功
$(document).ready(function() {
	loadImage();
});

var imgList = [
	'img/1.jpg',
	'img/1.png',
	'img/2.png',
	'img/2-1.png',
	'img/2-2.png',
	'img/2-3.png',
	'img/2-4.png',
	'img/3.png',
	'img/3-2.png',
	'img/3-3.png',
	'img/3-4.png',
	'img/3-5.png',
	'img/3-6.png',
	'img/4-1.png',
	'img/4-2.png',
	'img/4-3.png',
	'img/4-4.png',
	'img/4-5.png',
	'img/4-6.png',
	'img/share.jpg',
	'img/didiao/1.jpg',
	'img/didiao/2.jpg',
	'img/didiao/3.jpg',
	'img/didiao/4.jpg',
	'img/didiao/5.jpg',
	'img/didiao/6.jpg',
	'img/gaodiao/1.jpg',
	'img/gaodiao/2.jpg',
	'img/gaodiao/3.jpg',
	'img/gaodiao/4.jpg',
	'img/gaodiao/5.jpg',
	'img/gaodiao/6.jpg',
	'img/gaodiao/7.jpg',
	'img/gaodiao/8.jpg',
	'img/gaodiao/9.jpg',
	'img/gaodiao/10.jpg',
	'img/jujue/1.jpg',
	'img/jujue/2.jpg',
	'img/jujue/3.jpg',
	'img/jujue/4.jpg',
	'img/jujue/5.jpg',
	'img/jujue/6.jpg',
	'img/jujue/7.jpg',
	'img/jujue/8.jpg',
	'img/jujue/9.jpg',
	'img/jujue/10.jpg',
	'img/jujue/11.jpg',
	'img/jujue/12.jpg',
	'img/jujue/13.jpg',
	'img/jujue/14.jpg',
	'img/jujue/15.jpg',
	'img/jujue/16.jpg',
	'img/jujue/17.jpg',
	'img/momo/1.jpg',
	'img/momo/2.jpg',
	'img/momo/3.jpg',
	'img/momo/4.jpg',
	'img/momo/5.jpg',
	'img/momo/6.jpg',
	'img/momo/7.jpg',
	'img/momo/8.jpg',
	'img/momo/9.jpg',
	'img/momo/10.jpg',
	'img/momo/11.jpg',
	'img/momo/12.jpg',
	'img/momo/13.jpg',
	'img/momo/14.jpg',
];

function loadImage() {
	var imgSize = imgList.length,
		loadnum = 0;
	var pic = [];
	//图片加载完毕执行方法
	function imagesLoad() {
		loadnum++;
		var shu = parseInt(loadnum / imgSize * 100);
		$(".loadText").html(shu + "%");
		if(loadnum == pic.length) {
			$("#loading").remove();
			$("#index").show();
		}
	}
	for(var i = 0; i < imgSize; i++) {
		pic[i] = new Image();
		pic[i].src = imgList[i];
		pic[i].onload = function() {
			imagesLoad();
		}
		pic[i].onerror = function() {
			imagesLoad();
		}
	}
}