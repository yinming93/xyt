<?php    
header("Content-type: text/html; charset=utf-8"); 
	require_once('common/include.php'); 
	require_once('common/func.php'); 
	require_once('DBCon.php'); 
$sql="select * from $tbname order by Utime , Time";
//echo $sql;
$a=0;
$query=mysql_query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>英雄榜</title>
	        <meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1">
	<style>
		#sel{
			
			
      margin: 0;
		}
		.sel_main{
			background:none;
			width: 90%;
      height: 520px;
			margin: 0 auto;
      overflow-y:auto;
      position: absolute;
      top: 12%;
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
	<img src="bg.jpg" style="position:absolute; width:100%; height:100%;" />
<!-- <img src="./style/img_d/background.jpg" alt="" style="width:100%;"> -->
<!-- <p style="font-size: 14px;color:white;font-weight:bold;">
&nbsp;一等奖1名:iPhone 7 Plus<br>
&nbsp;二等奖5名:apple watch<br>   
&nbsp;三等奖20名:韩国圣诞毛巾礼盒<br>
&nbsp;四等奖800名:10元话费（3个工作日内充值）<br>
</p> -->

	<div class="sel_main">
<!-- <h2>排行榜查询</h2> -->
	<table border='1' width="100%"cellpadding="2" cellspacing="0" style="color:white;border:0.5px solid #EFBA96;">
	
		<tr>
			<td align='center' width="15%">排行</td>
			<td align='center' width="18%">头像</td>
            <td align='center' width="18%">昵称</td>
			<td align='center' width="20%">用时(s)</td>
			<td align='center' width="25%">提交时间</td>
		</tr>
	
		<?php
			while ($row=mysql_fetch_assoc($query)) {
	# code...
	$a++;

	?>
	<tr border='1px'>
		<td align='center' width="15%"><?php echo $a ?></td>
		<td align='center' width="18%"><img src='<?php echo $row['Img']?>' width="50px" height="50px" /></td>
		<td align='center' width="18%"><?php echo $row['Nick']?></td>
		<td align='center' width="20%"><?php echo $row['Utime']?></td>
		<td align='center' width="25%"><?php echo $row['Time']?></td>
	</tr>
	<?php
	}
		?>
	
	</table>
  </div>



</body>
</html>

    <script>

        wx.ready(function(){
        //在这里调用 API

            wx.onMenuShareAppMessage({
              title:  '游鸿明宝应开唱！玩拼图，领门票',
              desc:   '以歌为礼，问好宝应',
              link:   'http://xytang88.com/yin/youxi/res/getcodeurl.php',
              imgUrl: 'http://xytang88.com/yin/youxi/res/share.jpg',
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
            title: '游鸿明宝应开唱！玩拼图，领门票', // 分享标题
            desc:   '以歌为礼，问好宝应',
            link:   'http://xytang88.com/yin/youxi/res/getcodeurl.php',
              imgUrl: 'http://xytang88.com/yin/youxi/res/share.jpg',
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