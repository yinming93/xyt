<?php    
include 'db.php';
$sql="select * from $tbname order by time asc limit 0 ,850";
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
	<title>排行榜</title>
	        <meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1">
	<style>
		#sel{
			background: url(./bb.jpg);
      margin: 0;
      background:#C30D23;
		}
		.sel_main{
			width: 90%;
      height: 264px;
			margin: 0 auto;
      overflow-y:auto;
      position: absolute;
      top: 23%;
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
<a href="http://9e08a994a1bb.vxplo.cn/idea/yBR41EL"><p style="width:80%;position: absolute; top:96%;left:10%;z-index:2000; color:white;text-align:center;font-size:12px;">技术支持：信玉堂|草帽互动</p></a>

<img src="./bb.jpg" alt="" style="width:100%;">
<p style="font-size: 14px;color:white;font-weight:bold;position:absolute;top:15%;left:5%;">
往下滑表格可查看更多排名<br>
</p>

	<div class="sel_main">
<!-- <h2>排行榜查询</h2> -->
	<table border='1' width="100%"cellpadding="2" cellspacing="0" style="color:white;border:1px solid white;">
	
		<tr>
			<td align='center' width="25%">排行</td>
			<td align='center' width="25%">姓名</td>
            <td align='center' width="25%">电话</td>
			<td align='center' width="25%">用时</td>
		</tr>
	
		<?php
			while ($row=mysql_fetch_assoc($query)) {
	# code...
	$a++;

	?>
	<?php 
	$tim=$row['time'];
	$tima=$tim/100;
	 ?>

	<tr border='1px'>
		<td align='center' width="25%">第<?php echo $a ?>名</td>
		<td align='center' width="25%"><?php echo $row['name']?></td>
       <td align='center' width="25%"> <?php echo preg_replace('/(1[3578]{1}[0-9])[0-9]{5}([0-9]{2})/i','$1*****$2',$row['tel'])?></td>
		<td align='center' width="25%"><?php echo $tima?>秒</td>
	</tr>
	<?php
	}
		?>
	
	</table>
  </div>


<a href="http://szxytang.com/yin/za/tianci/getcodeurl.php"><img src="fan.png" alt="" style="width:36%;position:absolute;top:87%;left:32%;"></a>
</body>
</html>
<!-- 引入脚本 -->
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
	    ]
	  });
	 wx.ready(function () {
	var shareinfo={
	 	 title: '建发·泱誉丨填词赢舞剧《孔子》门票',
	      desc: '建发·泱誉携手舞剧《孔子》 7月26日，苏州文化艺术中心大剧院，不见不散',
	      link: 'http://szxytang.com/yin/za/jfyy/getcodeurl.php',
	      imgUrl: 'http://szxytang.com/yin/za/jfyy/share.jpg'}
	      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
	  });
</script>