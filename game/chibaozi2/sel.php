<?php
include 'db.php';
$sql="select * from $tbname order by code desc";
//echo $sql;
$a=0;
$query=mysql_query($sql);
//var_dump($row);

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
	body{
		margin:0;
		padding: 0;
	}
		#sel{
			background:#AD0002; 
		}
		.sel_main{
			width: 90%;
			margin: 0 auto;
			background: #AD0002;
			padding-top: 5px;
		}
		h2{
			width: 100%;
			text-align: center;
			margin-top: 10px;
		}
		tr{
			color: white;
		}
	</style>
</head>
<body id='sel'>
<img src="bg1.jpg" alt="" style="width:100%;">
	<div class="sel_main">

	
	<table border='1' width="100%">
	
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
		<td align='center' width="25%"><?php echo $row['uname']?></td>
       <td align='center' width="25%"> <?php echo preg_replace('/(1[358]{1}[0-9])[0-9]{5}([0-9]{2})/i','$1*****$2',$row['tel'])?></td>
		<td align='center' width="25%"><?php echo $row['code']?>分</td>
	</tr>
	<?php
	}
		?>
	</div>
	</table>
<div align="center"><a style="color:white;text-decoration:none;" href="index.php">返回 </a></div>
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
              // 所有要调用的 API 都要加到这个列表中
            ]
          });
         wx.ready(function () {
        var shareinfo={
             title: '东环里吃青团武道赛开始啦！',
              desc: '玩游戏，赢大礼！',
              link: 'http://szxytang.com/yin/youxi/chibaozi',
              imgUrl: 'http://szxytang.com/yin/youxi/chibaozi/share.jpg'
          }
      wx.onMenuShareTimeline(shareinfo);
     wx.onMenuShareAppMessage(shareinfo);
          });
    </script>