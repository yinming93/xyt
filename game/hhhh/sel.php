<?php    
include 'db.php';
$sql="select * from $tbname order by code desc,time limit 0 ,500";
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
			background:#71DAFA;
		}
		.sel_main{
			width: 90%;
			margin: 0 auto;
			background: #71DAFA;
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
<img src="bg1.jpg" alt="" style="width:100%;">
	<div class="sel_main">
<!-- <h2>排行榜查询</h2> -->
	<p style="padding:4px;color:red;font-size:12px;">
</p>
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
		<td align='center' width="25%"><?php echo $row['name']?></td>
       <td align='center' width="25%"> <?php echo preg_replace('/(1[3578]{1}[0-9])[0-9]{5}([0-9]{2})/i','$1*****$2',$row['tel'])?></td>
		<td align='center' width="25%"><?php echo $row['code']?>分</td>
	</tr>
	<?php
	}
		?>
	</div>
	</table>
<div align="center"><a href="http://szxytang.com/yin/youxi/hhhh/">返回 </a></div>
</body>
</html>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
        wx.config({
            debug: false,
            appId: '<?php echo $signPackage["appId"];?>',
            timestamp: <?php echo $signPackage["timestamp"];?>,
            nonceStr: '<?php echo $signPackage["nonceStr"];?>',
            signature: '<?php echo $signPackage["signature"];?>',
            jsApiList: [
                        'onMenuShareAppMessage','onMenuShareTimeline'
                        ]
        });
      
        wx.ready(function(){
            wx.onMenuShareAppMessage({
              title:  '不好！“猴塞雷”混入吉祥猴大军！！！',
              desc:   '放下手雷，也许我们还能做朋友',
              link:   'http://szxytang.com/yin/youxi/hhhh/',
              imgUrl: 'http://szxytang.com/yin/youxi/hhhh/share.jpg',
              trigger: function (res) {
              },
              success: function (res) {
              },
              cancel: function (res) {
              },
              fail: function (res) {
              }
            });
            wx.onMenuShareTimeline({
            title: '不好！“猴塞雷”混入吉祥猴大军！！！', // 分享标题
            link: 'http://szxytang.com/yin/youxi/hhhh/', // 分享链接
            imgUrl: 'http://szxytang.com/yin/youxi/hhhh/share.jpg', // 分享图标
            success: function () { 
            },
            cancel: function () {                 
            }
        });   
        });
        wx.error(function(res){
          alert(res.errMsg);
        });
    
    </script>