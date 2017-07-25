<?php    
include 'db.php';
$sql="select * from $tbname order by code desc,time limit 0 ,850";
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
			background: url(./style/img_d/background.jpg);
      margin: 0;
		}
		.sel_main{
			width: 90%;
      height: 336px;
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
<!-- <img src="./style/img_d/background.jpg" alt="" style="width:100%;"> -->
<!-- <p style="font-size: 14px;color:white;font-weight:bold;">
&nbsp;一等奖1名:iPhone 7 Plus<br>
&nbsp;二等奖5名:apple watch<br>   
&nbsp;三等奖20名:韩国圣诞毛巾礼盒<br>
&nbsp;四等奖800名:10元话费（3个工作日内充值）<br>
</p> -->

	<div class="sel_main">
<!-- <h2>排行榜查询</h2> -->
	<table border='1' width="100%"cellpadding="2" cellspacing="0" style="color:white;border:1px solid yellow;">
	
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


<a href="http://szxytang.com/yin/youxi/longxia/getcodeurl.php"><img src="an.png" alt="" style="width:36%;position:absolute;top:83%;left:32%;"></a>
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
              title:  '一指禅戳戳戳！玩小游戏，免费吃龙虾！',
              desc:   '浓糊味龙虾火辣上市',
              link:   'http://szxytang.com/yin/youxi/longxia/getcodeurl.php',
              imgUrl: 'http://szxytang.com/yin/youxi/longxia/share.jpg',
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
            title: '一指禅戳戳戳！玩小游戏，免费吃龙虾！', // 分享标题
            desc:   '浓糊味龙虾火辣上市',
            link: 'http://szxytang.com/yin/youxi/ld', // 分享链接
            imgUrl: 'http://szxytang.com/yin/youxi/ld/share.jpg', // 分享图标
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