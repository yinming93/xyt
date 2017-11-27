<?php
require ('config.php');
if (isset($_GET['date_time'])) {
   $date_time=$_GET['date_time'];
}

$dob = strtotime($date_time);
$y = date('Y', $dob);
 if (($m = (date('m') - date('m', $dob))) < 0) {
  $y++;
 } elseif ($m == 0 && date('d') - date('d', $dob) < 0) {
  $y++;
 }
$nian= date('Y') - $y;

$d1=strtotime ("now");
$d2=strtotime($date_time);
//$nian=round(($d1-$d2)/3600/24/365);
$nian2=($d1-$d2)/3600/24/365;
$Days=round(($d1-$d2)/3600/24);
$yue=round(($d1-$d2)/3600/24/30);
$zhou=round(($d1-$d2)/3600/24/7);
$xiaoshi=round(($d1-$d2)/3600);
$fen=round(($d1-$d2)/60);
$miao=round(($d1-$d2));
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="gb2312">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta name="format-detection" content="telephone=no"/>


<link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/lift.css" />


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<?php require ('weixin_sdk.php'); ?>
<title>生命计算器</title>
</head>
<body class="l_list">
    <div class="container">
        <div class="media">
          <div class="media-left">
            <a href="#">
              <img alt="64x64"  class="media-object img-circle" style="width: 64px; height: 64px;" src="images/a1.png">
            </a>
          </div>
          <div class="media-body">
            <h5 class="media-heading text-muted">你已经</h5>
            <h3><strong><span id="age"><?php echo $nian2; ?></span>岁了</strong></h3>
          </div>
        </div>
      </div>
    </div>
    </div> <!-- E header -->


    <div class="list_area container">
        <ul class="list-unstyled">
            <li class="list_first"> <h6 class="text-muted">你已经存在了</h6> </li>
            <li> <strong><?php echo $nian; ?></strong> 年 </li>
            <li> <strong><?php echo $yue; ?></strong> 月 </li>
            <li> <strong><?php echo $zhou; ?></strong> 周 </li>
            <li> <strong><?php echo $Days; ?></strong> 天</li>
            <li> <strong><?php echo $xiaoshi; ?></strong> 小时 </li>
            <li> <strong><?php echo $fen; ?></strong> 分钟 </li>
            <li> <strong><?php echo $miao; ?></strong> 秒 </li>
        </ul>

        <div class="buttons text-center">
            <a href="future.php?date_time=<?php echo $date_time; ?>" class="btn btn-default btn-lg">未来</a>

 <p class="text-muted"><a href="http://mp.weixin.qq.com/s?__biz=MzA5NTAzMTc4OA==&mid=201052462&idx=1&sn=9d6e84126154059701909befdf596dc6#rd">关注一个让你开心的账号</a></p>

        </div> <!-- E buttons -->
    </div> <!-- E list_area -->
</body>

<script>
function show() {
    var age = $("#age").text();
    age = parseFloat(age);
    var age2 = age + 0.00000011;
    age2 = age2.toFixed(8);
    $("#age").text(age2);
}
setInterval("show()",1000);
</script>

<script>
wx.config(config);
wx.ready(function () {
    // 在这里调用 API
    wx.onMenuShareTimeline({
        title: '不知不觉今天是我活着的第<?php echo $Days; ?>天了', // 分享标题
        link : 'http://mp.weixin.qq.com/s?__biz=MzA5NTAzMTc4OA==&mid=204176429&idx=1&sn=9066d1c42a5565a20085c9caf101ef4f#rd', // 分享链接
        imgUrl: 'http://yun.anhui520.com.cn/web/shengming/images/share.jpg', // 分享图标
        success: function () {
			location.href="http://mp.weixin.qq.com/s?__biz=MzA5NTAzMTc4OA==&mid=201052462&idx=1&sn=9d6e84126154059701909befdf596dc6#rd";            // 用户确认分享后执行的回调函数
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
        }
    });

    wx.onMenuShareAppMessage({
        title: '不知不觉今天是我活着的第<?php echo $Days; ?>天了', // 分享标题
        desc: '我珍惜生活，我感恩每一个遇到的朋友，生命万岁！', // 分享链接
        link: 'http://mp.weixin.qq.com/s?__biz=MzA5NTAzMTc4OA==&mid=204176429&idx=1&sn=9066d1c42a5565a20085c9caf101ef4f#rd', // 分享链接
        imgUrl: 'http://yun.anhui520.com.cn/web/shengming/images/share.jpg', // 分享图标
        type: '', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function () {
			location.href="http://mp.weixin.qq.com/s?__biz=MzA5NTAzMTc4OA==&mid=201052462&idx=1&sn=9d6e84126154059701909befdf596dc6#rd";            // 用户确认分享后执行的回调函数
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
        }
    });
});
</script>



</html>
