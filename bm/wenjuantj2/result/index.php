<?php
  //引入js类文件
   require_once "../jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
	require_once('../func.php'); 
	require_once('../db.php'); 
	
	
$sql="select * from $tbname where a1='1'";
$query = mysql_query($sql);
$qq1 = mysql_num_rows($query);

$sql2="select * from $tbname where a1='2'";
$query2 = mysql_query($sql2);
$qq2 = mysql_num_rows($query2);

$sql3="select * from $tbname where a1='3'";
$query3 = mysql_query($sql3);
$qq3 = mysql_num_rows($query3);

$sql4="select * from $tbname where a1='4'";
$query4 = mysql_query($sql4);
$qq4 = mysql_num_rows($query4);

$sql5="select * from $tbname where a1='5'";
$query5 = mysql_query($sql5);
$qq5 = mysql_num_rows($query5);

$sql6="select * from $tbname where a1='6'";
$query6 = mysql_query($sql6);
$qq6 = mysql_num_rows($query6);

$sql7="select * from $tbname where a1='7'";
$query7 = mysql_query($sql7);
$qq7 = mysql_num_rows($query7);

$sql8="select * from $tbname where a1='8'";
$query8 = mysql_query($sql8);
$qq8 = mysql_num_rows($query8);

	
// echo $qq;
// var_dump($qq2);
// exit;
// $number1=$qq;
// $number2=$qq2;
// $number3=$qq3;
// $number4=$qq4;
// $number5=$qq5;
$a=array($qq1,$qq2,$qq3,$qq4,$qq5,$qq6,$qq7,$qq8);
$pos = array_search(max($a), $a);
$max = $a[$pos];
// echo $max;

// $qq1=779;
// $qq2=678;
// $qq3=674;
// $qq4=475;
// $qq5=886;
// $qq6=597;
// $qq7=547;
// $qq8=1203;
// $qq9=1184;
// $qq10=1176;
// $qq11=1192;
// $qq12=1184;
// $max=1500;

$n1=round($qq1/$max,1);
$n2=round($qq2/$max,1);
$n3=round($qq3/$max,1);
$n4=round($qq4/$max,1);
$n5=round($qq5/$max,1);
$n6=round($qq6/$max,1);
$n7=round($qq7/$max,1);
$n8=round($qq8/$max,1);

	
	
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>仁恒杯.羽球联赛 冠军猜猜猜</title>
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
			<img src="top.jpg" style="position:absolute; width:100%; top:0%; left:0%;" />
			<div style="position:absolute; top:160%; left:6%;  color:#000;" >
		
				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">1.奕羽羽毛球俱乐部队</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq1 ?>票</h1><br>
				<div class="progress-bar"></div><br><br>
				
				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">2.民生过云楼联队</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq2 ?>票</h1><br>
				<div class="progress-bar-2"></div><br><br>
				
				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">3.追风队</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq3 ?>票</h1><br>
				<div class="progress-bar-3"></div><br><br>
				
				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">4.思美特队</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq4 ?>票</h1><br>
				<div class="progress-bar-4"></div><br><br>
				
				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">5.超凡动一动队</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq5 ?>票</h1><br>
				<div class="progress-bar-5"></div><br><br>

				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">6.苏报智屋队</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq6 ?>票</h1><br>
				<div class="progress-bar-6"></div><br><br>

				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">7.苏城广告队</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq7 ?>票</h1><br>
				<div class="progress-bar-7"></div><br><br>

				<h1 style="font-size:12px;margin-top:-6%;text-align:left;">8.新华日报队</h1>
				<h1 style="font-size:12px;margin-top:-6%;text-align:right;"><?php echo $qq8 ?>票</h1><br>
				<div class="progress-bar-8"></div><br><br>

				
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
       title: '仁恒杯.羽球联赛 冠军猜猜猜',
          desc: '冠军猜得准 奖品拿的稳',
          link: 'http://szxytang.com/yin/za/wenjuantj2/getcodeurl.php',
          imgUrl: 'http://szxytang.com/yin/za/wenjuantj2/share.jpg'}
          wx.onMenuShareTimeline(shareinfo);
     wx.onMenuShareAppMessage(shareinfo);
      });
    </script>