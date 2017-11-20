<?php
	header("Content-type: text/html; charset=utf-8"); 
	require_once('../common/include.php'); 
	require_once('../common/func.php'); 
	require_once('../DBCon.php'); 
	
	
	$openid=$_GET['openid'];
	$state=$_GET['state'];
	
	
	$sql="select * from $tbname order by Number desc";
	$query = mysql_query($sql);

	
	$Num=0;
	$number=array();
	$name=array();
	while($row=mysql_fetch_assoc($query)){ 
	
		$Num++;
		$number[$Num]=$row['Number'];
		$name[$Num]=$row['Name'];
	}
	
	$name1=$name[1];
	$name2=$name[2];
	$name3=$name[3];
	$name4=$name[4];
	$name5=$name[5];
	$name6=$name[6];
	$name7=$name[7];
	$name8=$name[8];
	$name9=$name[9];
	$name10=$name[10];
	
	
	$number1=$number[1];
	$number2=$number[2];
	$number3=$number[3];
	$number4=$number[4];
	$number5=$number[5];
	$number6=$number[6];
	$number7=$number[7];
	$number8=$number[8];
	$number9=$number[9];
	$number10=$number[10];

	
	
	
	$n1=1;
	$n2=round($number2/$number1,2);
	$n3=round($number3/$number1,2);
	$n4=round($number4/$number1,2);
	$n5=round($number5/$number1,2);
	$n6=round($number6/$number1,2);
	$n7=round($number7/$number1,2);
	$n8=round($number8/$number1,2);
	$n9=round($number9/$number1,2);
	$n10=round($number10/$number1,2);
	
	
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>无锡未来“十大巨星”投票</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css" media="screen">
         <!--  body {
            font-family: Helvetica, Verdana, Sans-Serif;
            background-color:#202126;
            color:#fff;
			text-align:center
          } -->
		   *{
			 margin:0px;
			 padding:0px;
		   }
        </style>

    </head>
    <body>

		<div style="position:absolute; background-image:url(1.jpg); background-size:100% 100%; width:100%; height:170%;" >
			<img src="top.jpg" style="position:absolute; width:94%; top:1%; left:3%;" />
			<div style="position:absolute; top:28%; left:6%;  color:#000;" >
		
				<h1 style="position:absolute; font-size:12px; top:-3%;">1.<?php echo $name1 ?></h1>
				
				<h1 style="position:absolute; font-size:12px; top:-3%; right:0%;"><?php echo $number1 ?>票</h1>
				<div class="progress-bar"></div><br><br>
				
				
				<h1 style="position:absolute; font-size:12px; top:7%;">2.<?php echo $name2 ?></h1>
				<h1 style="position:absolute; font-size:12px; top:7%; right:0%;"><?php echo $number2 ?>票</h1>
				<div class="progress-bar-2"></div><br><br>
				
				<h1 style="position:absolute; font-size:12px; top:17%;">3.<?php echo $name3 ?></h1>
				<h1 style="position:absolute; font-size:12px; top:17%; right:0%;"><?php echo $number3 ?>票</h1>
				<div class="progress-bar-solid"></div><br><br>
				
				<h1 style="position:absolute; font-size:12px; top:27%;">4.<?php echo $name4 ?></h1>
				<h1 style="position:absolute; font-size:12px; top:27%; right:0%;"><?php echo $number4 ?>票</h1>
				<div class="progress-bar-solid1"></div><br><br>
				
				<h1 style="position:absolute; font-size:12px; top:37%;">5.<?php echo $name5 ?></h1>
				<h1 style="position:absolute; font-size:12px; top:37%; right:0%;"><?php echo $number5 ?>票</h1>
				<div class="progress-bar-solid1"></div><br><br>
				
				<h1 style="position:absolute; font-size:12px; top:47%;">6.<?php echo $name6 ?></h1>
				<h1 style="position:absolute; font-size:12px; top:47%; right:0%;"><?php echo $number6 ?>票</h1>
				<div class="progress-bar-solid1"></div><br><br>
				
				<h1 style="position:absolute; font-size:12px; top:57%;">7.<?php echo $name7 ?></h1>
				<h1 style="position:absolute; font-size:12px; top:57%; right:0%;"><?php echo $number7 ?>票</h1>
				<div class="progress-bar-solid1"></div><br><br>
				
				<h1 style="position:absolute; font-size:12px; top:67%;">8.<?php echo $name8 ?></h1>
				<h1 style="position:absolute; font-size:12px; top:67%; right:0%;"><?php echo $number8 ?>票</h1>
				<div class="progress-bar-solid1"></div><br><br>
				
				<h1 style="position:absolute; font-size:12px; top:77%;">9.<?php echo $name9 ?></h1>
				<h1 style="position:absolute; font-size:12px; top:77%; right:0%;"><?php echo $number9 ?>票</h1>
				<div class="progress-bar-solid1"></div><br><br>
				
				<h1 style="position:absolute; font-size:12px; top:87%;">10.<?php echo $name10 ?></h1>
				<h1 style="position:absolute; font-size:12px; top:87%; right:0%;"><?php echo $number10 ?>票</h1>
				<div class="progress-bar-solid1"></div><br><br>
				
				
			</div>
		</div>

        <script src="jquery-1.11.3.min.js"></script>
        <script src="gradient-progress-bar.js"></script>

        <script type="text/javascript">

          $('.progress-bar').gradientProgressBar({
              value: <?php echo $n1 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

          $('.progress-bar-2').gradientProgressBar({
              value: <?php echo $n2 ?>,
              size: 280,
              fill: {
                  gradient: ["#A4BAE7", "#112F66"]
				 /*  color: '#EEC900' */
              }
          });

          $('.progress-bar-solid').gradientProgressBar({
              value: <?php echo $n3 ?>,
              size: 280,
              fill: {
                  gradient: ["#A4BAE7", "#112F66"]
              }
          });
		  
		   $('.progress-bar-solid1').gradientProgressBar({
              value: <?php echo $n4 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

		  
		 


        </script>

    </body>
</html>
<!--开始-->

	<script>
		
	  
	    wx.ready(function(){
	    //在这里调用 API

		
		
			wx.onMenuShareTimeline({
				title: '无锡未来“十大巨星”投票', // 分享标题
				link: 'http://xyt.xy-tang.com/2016hj/wxwanda/toupiao/getcodeurl.php', // 分享链接
				imgUrl: 'http://xyt.xy-tang.com/2016hj/wxwanda/toupiao/share.jpg', // 分享图标
				success: function () { 
					// 用户确认分享后执行的回调函数
					//window.location.href = 'http://www.baidu.com';
					if('<?php echo $state ?>' == 'noshare'){
						var openid  = '<?php echo $openid ?>';
						
						var data = "openid="+openid;
						
						$.post("../share.php",data,function(res){
							if(res=='ok'){
								alert("分享成功，获得一次投票机会！");
								window.location.href='../getcodeurl.php';
							}else{
								alert("分享失败，请稍后再试！");
								return false;
							}   
						});
					
					}
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
				  title:  '无锡未来“十大巨星”投票',
				  desc:   '无锡未来发展的10大重点项目，等你来投票！',
				  link: 'http://xyt.xy-tang.com/2016hj/wxwanda/toupiao/getcodeurl.php', // 分享链接
				  imgUrl: 'http://xyt.xy-tang.com/2016hj/wxwanda/toupiao/share.jpg', // 分享图标
				  trigger: function (res) {
					//alert('用户点击发送给朋友');
				  },
				  success: function (res) {
					//alert('已分享');
				  },
				  cancel: function (res) {
					//alert('已取消');
				  },
				  fail: function (res) {
					//alert(JSON.stringify(res));
				  }
			});
		
	    });
		
		//debug
		wx.error(function(res){
		  alert(res.errMsg);
		});
	
	</script>
<!--结束-->