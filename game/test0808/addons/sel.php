<?php    
include 'db.php';
$sql="select * from $tbname order by code desc,time limit 0 ,50";
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
<img src="./bg1.jpg" alt="" style="width:100%;">
<!-- <p style="font-size: 14px;">
&nbsp;奖品说明<br>
&nbsp;第1名可获得1088元现金红包一个<br>
&nbsp;第2名可获得588元现金红包一个<br>
&nbsp;第3-10名可获得188元现金红包一个<br>
&nbsp;第11-50名可获得18元现金红包一个
</p> -->

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
<div align="center"><a href="http://xyt.xy-tang.com/yin/youxi/test0808/addons/">返回 </a></div>
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
              title:  '【有奖游戏】浪漫七夕 快来帮牛郎追织女吧！',
              desc:   '轻点牛郎，躲避王母，我们开始追织女！',
              link:   'http://xyt.xy-tang.com/yin/youxi/test0808/addons/',
              imgUrl: 'http://xyt.xy-tang.com/yin/youxi/test0808/addons/share.jpg',
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
            title: '【有奖游戏】浪漫七夕 快来帮牛郎追织女吧！', // 分享标题
            link: 'http://xyt.xy-tang.com/yin/youxi/test0808/addons/', // 分享链接
            imgUrl: 'http://xyt.xy-tang.com/yin/youxi/test0808/addons/share.jpg', // 分享图标
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
          // alert(res.errMsg);
        });
    
    </script>