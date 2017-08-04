<?php    
include 'db.php';
$sql="select * from $tbname1 order by code desc limit 0 ,50";
//echo $sql;
$a=0;
$query=mysql_query($sql);
//var_dump($row);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>排行榜查询</title>
	        <meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1">
	<style>
		#sel{
			background:#71c2ef;
		}
		.sel_main{
			width: 90%;
			margin: 0 auto;
			background: rgba(255,255,255,.3);
			padding-top: 5px;
		}
		h2{
			width: 100%;
			text-align: center;
			margin-top: 10px;
		}
	</style>
</head>
<body id='sel'>
	<div class="sel_main">
<h2>排行榜查询</h2>
	<p style="padding:4px;color:red;font-size:12px;">● 这里是答题游戏排行榜<br />
● 所有玩家参与游戏后，提交姓名联系方式即可前往临时售楼处领取营销中心启幕盛会邀请函<br />
● 届时将有Iphone6大奖等你来拿！</p>
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
       <td align='center' width="25%"> <?php echo preg_replace('/(1[3578]{1}[0-9])[0-9]{5}([0-9]{2})/i','$1*****$2',$row['tel'])?></td>
		<td align='center' width="25%"><?php echo $row['code']?>分</td>
	</tr>
	<?php
	}
		?>
	</div>
	</table>
<div align="center"><a href="http://xyt.xy-tang.com/2015n/yinming/td/index.html">返回 </a></div>
</body>
</html>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
        wx.config({
            debug: false,
            appId: '<?php echo $signPackage["appId"];?>',
            timestamp: '<?php echo $signPackage["timestamp"];?>',
            nonceStr: '<?php echo $signPackage["nonceStr"];?>',
            signature: '<?php echo $signPackage["signature"];?>',
            jsApiList: [
             //所有要调用的 API 都要加到这个列表中
                        "onMenuShareTimeline",
                        "onMenuShareAppMessage"
                        ]
        });
      
        wx.ready(function(){
        //在这里调用 API
            var shareinfo={};
            
            shareinfo.title = '你用几步走进枕湖美居的未来？'
            shareinfo.desc ='测测你能走多少步？'
            shareinfo.link='http://xyt.xy-tang.com/2015/yinming/yhwybyb22/index.html'
            shareinfo.imgUrl='http://xyt.xy-tang.com/2015/yinming/yhwybyb22/share.jpg'
            var sharelineinfo={
                title:shareinfo.desc,
                link:shareinfo.link,
                imgUrl:shareinfo.imgUrl
            };
            wx.onMenuShareAppMessage(shareinfo);
            wx.onMenuShareTimeline(sharelineinfo);
        
        });
   
    
    </script>
