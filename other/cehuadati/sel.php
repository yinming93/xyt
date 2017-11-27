<?php    
include 'db.php';
$sql="select * from $tbname order by code desc";
//echo $sql;
$a=0;
$query=mysql_query($sql);
//var_dump($row);
//载入jssdk类
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	        <meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1">
	<style>
		#sel{
			background:white;
      		margin: 0;
		}
		.sel_main{
			width: 90%;
      height: 336px;
			margin: 0 auto;
      overflow-y:auto;
      position: absolute;
      top: 24%;
      left: 5%;
		}
		h2{
			width: 100%;
			text-align: center;
			margin-top: 10px;
		}
	</style>
</head>
<body id='sel'>
<center><h3>成绩展示</h3></center>

	<div class="sel_main">
<!-- <h2>排行榜查询</h2> -->
	<table border='1' width="100%"cellpadding="2" cellspacing="0" style="color:black;border:1px solid #E3C46C;">
	
		<tr>
			<td align='center' width="33%">序号</td>
			<td align='center' width="33%">姓名</td>
			<td align='center' width="34%">分数</td>
		</tr>
	
		<?php
			while ($row=mysql_fetch_assoc($query)) {
	# code...
	$a++;

	?>
	<tr border='1px'>
		<td align='center' width="33%"><?php echo $a ?>号</td>
		<td align='center' width="33%"><?php echo $row['name']?></td>
		<td align='center' width="34%"><?php echo $row['code']?></td>
	</tr>
	<?php
	}
		?>
	
	</table>
  </div>


<a href="http://szxytang.com/yin/bm/cehuadati/getcodeurl.php">
<button style="width:31%;position:absolute;top:83%;left:34%;">返回</button>
</a>
</body>
</html>
<!--开始-->
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">

wx.config({
        debug: false,
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: '<?php echo $signPackage["timestamp"];?>',
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: [
    "onMenuShareTimeline","onMenuShareAppMessage"
          // 所有要调用的 API 都要加到这个列表中
        ]
      });
     wx.ready(function () {
    var shareinfo={
       title: '苏南龙湖营销费用策划试题2017',
          desc: '仅供内部使用',
          link: 'http://szxytang.com/yin/bm/cehuadati/getcodeurl.php',
          imgUrl: 'http://szxytang.com/yin/bm/cehuadati/share.jpg'
      }
      // wx.hideOptionMenu();
      wx.onMenuShareTimeline(shareinfo);
   wx.onMenuShareAppMessage(shareinfo);
      });
    </script>
<!--结束-->