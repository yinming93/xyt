<?php    
include 'db.php';
$sql="select * from $tbname order by code desc,time limit 0 ,100";
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
	<title>排行榜查询</title>
	        <meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1">
	<style>
		#sel{
			background:#0B2241;
      margin: 0;
		}
		.sel_main{
			width: 90%;
      height: 300px;
			margin: 0 auto;
      overflow-y:auto;
      position: absolute;
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
<img src="./bg1.jpg" alt="" style="width:100%;">
<!-- <p style="font-size: 14px;color:white;">
&nbsp;&nbsp;&nbsp;&nbsp;<b>《活动规则》</b><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;前100名将获得1个月腾讯视频会员<br>
</p> -->

	<div class="sel_main">
<!-- <h2>排行榜查询</h2> -->
	<table border='1' width="100%"cellpadding="2" cellspacing="0" style="color:white;border:1px solid #244073;">
	
		<tr>
			<td align='center' width="25%">排行</td>
			<td align='center' width="25%">姓名</td>
            <td align='center' width="25%">电话</td>
			<td align='center' width="25%">分数</td>
		</tr>
	
		<?php
			while ($row=mysql_fetch_assoc($query)) {
	# code...
	$a++;

	?>
	<tr border='1px'>
		<td align='center' width="25%">第<?php echo $a ?>名</td>
		<td align='center' width="25%"><?php echo mb_substr($row['name'],0,3)?>xx</td>
       <td align='center' width="25%"> <?php echo preg_replace('/(1[3578]{1}[0-9])[0-9]{5}([0-9]{2})/i','$1*****$2',$row['tel'])?></td>
		<td align='center' width="25%"><?php echo $row['code']?>分</td>
	</tr>
	<?php
	}
		?>
	
	</table>
  </div>


<a href="http://xytang88.com/yin/youxi/gunzi6/getcodeurl.php"><img src="an.png" alt="" style="width:36%;position:absolute;top:83%;left:32%;"></a>
</body>
</html>
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
             title: '今年圣诞求不坑 ',
              desc: '圣诞那些坑，你能过几个？',
              link: 'http://xytang88.com/yin/youxi/gunzi6/getcodeurl.php',
              imgUrl: 'http://xytang88.com/yin/youxi/gunzi6/share.jpg'}
              wx.onMenuShareTimeline(shareinfo);
         wx.onMenuShareAppMessage(shareinfo);
          });
    </script>