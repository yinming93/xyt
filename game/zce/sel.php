<?php    
include 'db.php';
$sql="select * from $tbname1 order by code desc limit 0 ,200";
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
			background:#DE3669;
      margin: 0;
		}
		.sel_main{
			width: 90%;
			margin: 0 auto;
			background: #DE3669;
			padding-top: 5px;
		}
		h2{
			width: 100%;
			text-align: center;
			margin-top: 10px;
		}
    tr{
      border: 1px solid white;
    }
    td{
      border: 1px solid white;
    }
	</style>
</head>
<body id='sel'>
<img src="phb.jpg" alt="" style="padding:0;width:100%;">
	<div class="sel_main">
	<table width="100%"  cellspacing="0" style="border-radius:2px;border:1px solid white;color:white;">
	
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
  <br>
<a href="http://xyt.xy-tang.com/yin/youxi/zce/index.php" style="text-decoration:none;"><div align="center" style="width:40%;height:36px;margin-left:30%;background:orange;line-height:36px;border-radius:4px;color:white;">返&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;回</div></a>
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
             //所有要调用的 API 都要加到这个列表中
                        'onMenuShareAppMessage','onMenuShareTimeline'
                        ]
        });
      
        wx.ready(function(){
        //在这里调用 API

            wx.onMenuShareAppMessage({
              title:  '嫦娥别跑，我们来叙叙旧',
              desc:   '嫦娥这么美，不追怎么行？',
              link:   'http://xyt.xy-tang.com/yin/youxi/zce',
              imgUrl: 'http://xyt.xy-tang.com/yin/youxi/zce/share.jpg',
              trigger: function (res) {
                //alert('用户点击发送给朋友');
              },
              success: function (res) {
                //alert('已分享');
                // getElementById('ssss').style.display='none';
                // getElementById('ffff').style.display='block';
                // document.getElementById('add_tel').style.display='block';
              },
              cancel: function (res) {
                //alert('已取消');
                // alert("只有先分享到朋友或朋友圈才可以查看分数！");
              },
              fail: function (res) {
                //alert(JSON.stringify(res));
              }
            });



            wx.onMenuShareTimeline({
            title: '嫦娥别跑，我们来叙叙旧', // 分享标题
            link: 'http://xyt.xy-tang.com/yin/youxi/zce', // 分享链接
            imgUrl: 'http://xyt.xy-tang.com/yin/youxi/zce/share.jpg', // 分享图标
            success: function () { 
                // 用户确认分享后执行的回调函数
                //  getElementById('ssss').style.display='none';
                // getElementById('ffff').style.display='block';
                // document.getElementById('add_tel').style.display='block';
            },
            cancel: function () { 
                // 用户取消分享后执行的回调函数
                // alert("只有先分享到朋友或朋友圈才可以查看分数！");
            }
        });
        
        });
        
        //debug
        wx.error(function(res){
          alert(res.errMsg);
        });
    
    </script>