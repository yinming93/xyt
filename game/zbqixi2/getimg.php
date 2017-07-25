<?php
session_start();
error_reporting(0);
define('JZ_WAHAHA', 'yohe');
$nameone = $_GET['nameone'];
$num = $_GET['num'];
$k=$_GET['k'];
if ($num == 1) {
	$jujue = array('img/jujue/1.jpg', 'img/jujue/2.jpg', 'img/jujue/3.jpg', 'img/jujue/4.jpg', 'img/jujue/5.jpg', 'img/jujue/6.jpg', 'img/jujue/7.jpg', 'img/jujue/8.jpg', 'img/jujue/9.jpg', 'img/jujue/10.jpg', 'img/jujue/11.jpg', 'img/jujue/12.jpg', 'img/jujue/13.jpg', 'img/jujue/14.jpg', 'img/jujue/15.jpg', 'img/jujue/16.jpg');
	$dst_path = $jujue[$k];
} else if ($num == 2) {
	$jujue = array('img/momo/1.jpg', 'img/momo/2.jpg', 'img/momo/3.jpg', 'img/momo/4.jpg', 'img/momo/5.jpg', 'img/momo/6.jpg', 'img/momo/7.jpg', 'img/momo/8.jpg', 'img/momo/9.jpg', 'img/momo/10.jpg', 'img/momo/11.jpg', 'img/momo/12.jpg', 'img/momo/13.jpg', 'img/momo/14.jpg');
	$dst_path = $jujue[$k];
} else if ($num == 3) {
	$jujue = array('img/gaodiao/1.jpg', 'img/gaodiao/2.jpg', 'img/gaodiao/3.jpg', 'img/gaodiao/4.jpg', 'img/gaodiao/5.jpg', 'img/gaodiao/6.jpg', 'img/gaodiao/7.jpg', 'img/gaodiao/8.jpg', 'img/gaodiao/9.jpg', 'img/gaodiao/10.jpg');
	$dst_path = $jujue[$k];
} else if ($num == 4) {
	$jujue = array('img/didiao/1.jpg', 'img/didiao/2.jpg', 'img/didiao/3.jpg', 'img/didiao/4.jpg', 'img/didiao/5.jpg', 'img/didiao/6.jpg');
	$dst_path = $jujue[$k];
} else {
	header("Location:index.html");
}
/*imagecreatefromstring()--从字符串中的图像流新建一个图像，返回一个图像标示符，其表达了从给定字符串得来的图像
 图像格式将自动监测，只要php支持jpeg,png,gif,wbmp,gd2.*/
$dst = imagecreatefromstring(file_get_contents($dst_path));
$font = 'img/msyh.ttf';
$black = imagecolorallocate($dst, 0, 0, 0);
imagefttext($dst, 22, 0, 369, 720, $black, $font, $nameone);
/*imagefttext($img,$size,$angle,$x,$y,$color,$fontfile,$text)
 $img由图像创建函数返回的图像资源
 size要使用的水印的字体大小
 angle（角度）文字的倾斜角度，如果是0度代表文字从左往右，如果是90度代表从上往下
 x,y水印文字的第一个文字的起始位置
 color是水印文字的颜色
 fontfile，你希望使用truetype字体的路径*/
list($dst_w, $dst_h, $dst_type) = getimagesize($dst_path);
/*list(mixed $varname[,mixed $......])--把数组中的值赋给一些变量*/
/*getimagesize()返回图像的所有信息，包括大小，类型等等*/
switch($dst_type) {
	case 1 :
		//GIF
		header("content-type:image/gif");
		imagegif($dst);
		break;
	case 2 :
		//JPG
		header("content-type:image/jpeg");
		imagejpeg($dst);
		break;
	case 3 :
		//PNG
		header("content-type:image/png");
		imagepng($dst);
		break;
	default :
		break;
	/*将GD图像流(image)输出*/
}
imagedestroy($dst);
?>