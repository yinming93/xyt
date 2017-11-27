<?php
	header("Content-type: text/html; charset=utf-8"); 
	// require_once('../common/include.php'); 
	require_once "../jssdk.php";
	require_once('../func.php'); 
	require_once('../db.php'); 
	
	
$sql="select * from $tbname where a1='1' or a2='1' or a3='1' or a4='1' or a5='1'";
$query = mysql_query($sql);
$qq1 = mysql_num_rows($query);

$sql2="select * from $tbname where a1='2' or a2='2' or a3='2' or a4='2' or a5='2'";
$query2 = mysql_query($sql2);
$qq2 = mysql_num_rows($query2);

$sql3="select * from $tbname where a1='3' or a2='3' or a3='3' or a4='3' or a5='3'";
$query3 = mysql_query($sql3);
$qq3 = mysql_num_rows($query3);

$sql4="select * from $tbname where a1='4' or a2='4' or a3='4' or a4='4' or a5='4'";
$query4 = mysql_query($sql4);
$qq4 = mysql_num_rows($query4);

$sql5="select * from $tbname where a1='5' or a2='5' or a3='5' or a4='5' or a5='5'";
$query5 = mysql_query($sql5);
$qq5 = mysql_num_rows($query5);

$sql6="select * from $tbname where a1='6' or a2='6' or a3='6' or a4='6' or a5='6'";
$query6 = mysql_query($sql6);
$qq6 = mysql_num_rows($query6);

$sql7="select * from $tbname where a1='7' or a2='7' or a3='7' or a4='7' or a5='7'";
$query7 = mysql_query($sql7);
$qq7 = mysql_num_rows($query7);

$sql8="select * from $tbname where a1='8' or a2='8' or a3='8' or a4='8' or a5='8'";
$query8 = mysql_query($sql8);
$qq8 = mysql_num_rows($query8);

$sql9="select * from $tbname where a1='9' or a2='9' or a3='9' or a4='9' or a5='9'";
$query9 = mysql_query($sql9);
$qq9 = mysql_num_rows($query9);

$sql10="select * from $tbname where a1='10' or a2='10' or a3='10' or a4='10' or a5='10'";
$query10 = mysql_query($sql10);
$qq10 = mysql_num_rows($query10);

$sql11="select * from $tbname where a1='11' or a2='11' or a3='11' or a4='11' or a5='11'";
$query11 = mysql_query($sql11);
$qq11 = mysql_num_rows($query11);

$sql12="select * from $tbname where a1='12' or a2='12' or a3='12' or a4='12' or a5='12'";
$query12 = mysql_query($sql12);
$qq12 = mysql_num_rows($query12);
	
// echo $qq;
// var_dump($qq2);
// exit;
// $number1=$qq;
// $number2=$qq2;
// $number3=$qq3;
// $number4=$qq4;
// $number5=$qq5;
$a=array($qq1,$qq2,$qq3,$qq4,$qq5,$qq6,$qq7,$qq8,$qq9,$qq10,$qq11,$qq12);
$pos = array_search(max($a), $a);
$max = $a[$pos];
// echo $max;



$n1=round($qq1/$max,1);
$n2=round($qq2/$max,1);
$n3=round($qq3/$max,1);
$n4=round($qq4/$max,1);
$n5=round($qq5/$max,1);
$n6=round($qq6/$max,1);
$n7=round($qq7/$max,1);
$n8=round($qq8/$max,1);
$n9=round($qq9/$max,1);
$n10=round($qq10/$max,1);
$n11=round($qq11/$max,1);
$n12=round($qq12/$max,1);

	
	
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>中粮U粮+社区提升计划，正式启幕！</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css" media="screen">
         <!--  body {
            font-family: Helvetica, Verdana, Sans-Serif;
            background-color:#CEE6FF;
            color:#fff;
			text-align:center
          } -->
		   *{
			 margin:0px;
			 padding:0px;
			 width: 94%;
		   }
        </style>

    </head>
    <body>
		<div style="position:absolute; background-image:url(1.jpg); background-size:100% 100%; width:100%; height:100%;" >
			<img src="top.jpg" style="position:absolute; width:94%; top:1%; left:3%;" />
			<div style="position:absolute; top:46%; left:6%;  color:#000;" >
		
				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">1.社区三人自行车</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq1 ?>票</h1><br>
				<div class="progress-bar"></div><br><br>
				
				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">2.社区便民手推车</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq2 ?>票</h1><br>
				<div class="progress-bar-2"></div><br><br>
				
				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">3.宠物便便箱</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq3 ?>票</h1><br>
				<div class="progress-bar-3"></div><br><br>
				
				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">4.特斯拉充电桩</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq4 ?>票</h1><br>
				<div class="progress-bar-4"></div><br><br>
				
				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">5.快递蜂巢箱</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq5 ?>票</h1><br>
				<div class="progress-bar-5"></div><br><br>

				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">6.图书漂流角</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq6 ?>票</h1><br>
				<div class="progress-bar-6"></div><br><br>

				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">7.饮料自动贩卖机</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq7 ?>票</h1><br>
				<div class="progress-bar-7"></div><br><br>

				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">8.健康会所</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq8 ?>票</h1><br>
				<div class="progress-bar-8"></div><br><br>

				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">9.恒温泳池</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq9 ?>票</h1><br>
				<div class="progress-bar-9"></div><br><br>

				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">10.室内网球场</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq10 ?>票</h1><br>
				<div class="progress-bar-10"></div><br><br>

				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">11.中粮食堂</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq11 ?>票</h1><br>
				<div class="progress-bar-11"></div><br><br>

				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">12.国际双语幼儿园</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq12 ?>票</h1><br>
				<div class="progress-bar-12"></div><br><br>
				
				
				
				
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

          $('.progress-bar-3').gradientProgressBar({
              value: <?php echo $n3 ?>,
              size: 280,
              fill: {
                  gradient: ["#A4BAE7", "#112F66"]
              }
          });
		  
		   $('.progress-bar-4').gradientProgressBar({
              value: <?php echo $n4 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

		   $('.progress-bar-5').gradientProgressBar({
              value: <?php echo $n5 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

		    $('.progress-bar-6').gradientProgressBar({
              value: <?php echo $n6 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

		    $('.progress-bar-7').gradientProgressBar({
              value: <?php echo $n7 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

		    $('.progress-bar-8').gradientProgressBar({
              value: <?php echo $n8 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

		    $('.progress-bar-9').gradientProgressBar({
              value: <?php echo $n9 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

		    $('.progress-bar-10').gradientProgressBar({
              value: <?php echo $n10 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

		    $('.progress-bar-11').gradientProgressBar({
              value: <?php echo $n11 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

		    $('.progress-bar-12').gradientProgressBar({
              value: <?php echo $n12 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });
        </script>

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
		 	 title: '中粮U粮+社区提升计划，正式启幕！',
		      desc: '点击即可参与，一起携手创造更好的生活吧',
		      link: 'http://szxytang.com/yin/za/wenjuantj/getcodeurl.php',
		      imgUrl: 'http://szxytang.com/yin/za/wenjuantj/share.jpg'}
		      wx.onMenuShareTimeline(shareinfo);
		 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>