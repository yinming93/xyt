<?php
	//引入js类文件
	 require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
    if(isset($_GET['code'])){
        include 'func.php';
        define('CODE', $_GET['code']);
        define('APPID', 'wx461b5105da7629f1'); 
        define('APPSECRET', 'd80e5eb9158f81ed612f7b6810fb9093'); 
        //1
        //获页面授权的ACCESS_TOKEN 、 refresh_token、openid、 scope的类型
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".CODE."&grant_type=authorization_code";
        $json_access_token = https_request($url);
        $arr_access_token  = json_decode($json_access_token, true); //获取access_token
        //2.
        $openid = $arr_access_token['openid'];
        // var_dump($openid);
        // exit;
        // $wxname=$userinfo_arr['nickname'];
        // $wximg=$userinfo_arr['headimgurl'];
        // $wxsex=$userinfo_arr['sex'];
        // echo $wxsex;
		include 'db.php';
        $query=mysql_query("select *from $tbname where touid='1'");
        $qq = mysql_num_rows($query);

        $query2=mysql_query("select *from $tbname where touid='2'");
        $qq2 = mysql_num_rows($query2);

        $query3=mysql_query("select *from $tbname where touid='3'");
        $qq3 = mysql_num_rows($query3);

        $query4=mysql_query("select *from $tbname where touid='4'");
        $qq4 = mysql_num_rows($query4);

        $query5=mysql_query("select *from $tbname where touid='5'");
        $qq5 = mysql_num_rows($query5);

        $query6=mysql_query("select *from $tbname where touid='6'");
        $qq6 = mysql_num_rows($query6);

        $query7=mysql_query("select *from $tbname where touid='7'");
        $qq7 = mysql_num_rows($query7);

        $query8=mysql_query("select *from $tbname where touid='8'");
        $qq8 = mysql_num_rows($query8);

        $query9=mysql_query("select *from $tbname where touid='9'");
        $qq9 = mysql_num_rows($query9);

        $query10=mysql_query("select *from $tbname where touid='10'");
        $qq10 = mysql_num_rows($query10);
        // var_dump($row);die;
        // 查询剩余投票次数
        $query0=mysql_query("select *from $tbname where openid='".$openid."'");
        $qq0 = mysql_num_rows($query0);
        $have = 8-$qq0;
       
        // 查询投过谁
        $queryx=mysql_query("select *from $tbname where openid='".$openid."' and touid='1'");
		$rowx = mysql_fetch_assoc($queryx);

		 $queryx2=mysql_query("select *from $tbname where openid='".$openid."' and touid='2'");
		$rowx2 = mysql_fetch_assoc($queryx2);

		 $queryx3=mysql_query("select *from $tbname where openid='".$openid."' and touid='3'");
		$rowx3 = mysql_fetch_assoc($queryx3);

		 $queryx4=mysql_query("select *from $tbname where openid='".$openid."' and touid='4'");
		$rowx4 = mysql_fetch_assoc($queryx4);

		 $queryx5=mysql_query("select *from $tbname where openid='".$openid."' and touid='5'");
		$rowx5 = mysql_fetch_assoc($queryx5);

		 $queryx6=mysql_query("select *from $tbname where openid='".$openid."' and touid='6'");
		$rowx6 = mysql_fetch_assoc($queryx6);

		 $queryx7=mysql_query("select *from $tbname where openid='".$openid."' and touid='7'");
		$rowx7 = mysql_fetch_assoc($queryx7);

		 $queryx8=mysql_query("select *from $tbname where openid='".$openid."' and touid='8'");
		$rowx8 = mysql_fetch_assoc($queryx8);

		 $queryx9=mysql_query("select *from $tbname where openid='".$openid."' and touid='9'");
		$rowx9 = mysql_fetch_assoc($queryx9);

		 $queryx10=mysql_query("select *from $tbname where openid='".$openid."' and touid='10'");
		$rowx10 = mysql_fetch_assoc($queryx10);
		
    } else{
        //echo "NO CODE";
        echo '操作失败！';
        exit;
        //写入日记文件
    }
  if(!$openid){
 	echo "<script>";
 	echo "window.location.href='http://szxytang.com/yin/bm/lh0615/getcodeurl.php';";
 	echo "</script>";
 	exit;
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>苏南龙湖供应商采集投票（仅限内部使用）</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<style>
	body{
		margin: 0px;
		padding: 0px;
		font-family: "微软雅黑";
		overflow: hidden;
	}
	.box{
    	width: 100%;
        margin: 0px;
        padding: 0px;
		position: absolute;
		background-color: #000;
		top:0px;
		left:0px;
	}

#tu{
    width: 100%;
    margin-bottom: -4px;
    z-index: -2;
}
.tous{
	width: 77%;
	height: 6.5%;
	/*background: red;*/
	position: absolute;
	left: 12%;
	overflow: hidden;
}
#o1{
top: 20.3%;
}
#o2{
top: 27.3%;
}
#o3{
top: 34.1%;
}
#o4{
top: 41%;
}
#o5{
top: 47.8%;
}
#o6{
top: 54.7%;
}
#o7{
top: 61.5%;
}
#o8{
top: 68.2%;
}
#o9{
top: 75%;
}
#o10{
top: 81.8%;
}
.txt{
	width: 85%;
	height: 100%;
	/*background: orange;*/
	line-height: 260%;
	color: white;
}
.piao{
	width: 15%;
	/*background: green;*/
}
.bn{
	/*background: url(xin.png) no-repeat center center;
	background-size: 50% 100%;*/
	width: 100%;
	height: 25px;
	border:0px;
}
.num{
	width: 100%;
	/*background: yellow;*/
	text-align: center;
	font-size: 10px;
	display: none;
}
.dog{
	float: left;
}
</style>

<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script>
	setInterval(
		function(){
		$.ajax({
			url:'adda.php?openid=<?php echo $openid?>',
			data:$('form').serialize(),
			type:'POST',
			success:function(m){
				$("#cishu").html(m);
			}
		})
		},1000)
</script>
</head>
<body>
	<div id="box" class="box">
	<div id="cishu" style="color:white;position:absolute;top:5%;left:5%;width:90%;height:40px;text-align:center;font-size:20px;font-weight:bold;">你还有<?php echo $have;?>次投票机会</div>
	<img id="tu" src="images/bg.jpg">
		<form action="add.php" method="POST">
		<input type="hidden" name="openid" value="<?php echo $openid; ?>">
		<div class="tous" id="o1">
			<div class="dog txt">江苏美诺文化传媒有限公司</div>
			<div class="dog piao">
				<input id="sub1" class="bn" name="sub1" type="button" style="background: url(<?php if($rowx){echo "xin2.png";}else{echo "xin.png";} ?>) no-repeat center center;background-size: 50% 100%;">
				<span class="num" id="n1" style="display:<?php if($have<1){echo 'block';}?>"><?php echo $qq; ?></span>
			</div>
		</div>
		<div class="tous" id="o2">
			<div class="dog txt">江苏尚田文化传媒有限公司</div>
			<div class="dog piao">
				<input id="sub2" class="bn" name="sub2" type="button" style="background: url(<?php if($rowx2){echo "xin2.png";}else{echo "xin.png";} ?>) no-repeat center center;background-size: 50% 100%;">
				<span class="num" id="n2" style="display:<?php if($have<1){echo 'block';}?>"><?php echo $qq2; ?></span>
			</div>
		</div>
		<div class="tous" id="o3">
			<div class="dog txt">常州金熙文化传媒有限公司</div>
			<div class="dog piao">
				<input id="sub3" class="bn" name="sub3" type="button" style="background: url(<?php if($rowx3){echo "xin2.png";}else{echo "xin.png";} ?>) no-repeat center center;background-size: 50% 100%;">
				<span class="num" id="n3" style="display:<?php if($have<1){echo 'block';}?>"><?php echo $qq3; ?></span>
			</div>
		</div>
		<div class="tous" id="o4">
			<div class="dog txt">无锡宝能广告有限公司</div>
			<div class="dog piao">
				<input id="sub4" class="bn" name="sub4" type="button" style="background: url(<?php if($rowx4){echo "xin2.png";}else{echo "xin.png";} ?>) no-repeat center center;background-size: 50% 100%;">
				<span class="num" id="n4" style="display:<?php if($have<1){echo 'block';}?>"><?php echo $qq4; ?></span>
			</div>
		</div>
		<div class="tous" id="o5">
			<div class="dog txt">无锡菲尔文化传媒有限公司</div>
			<div class="dog piao">
				<input id="sub5" class="bn" name="sub5" type="button" style="background: url(<?php if($rowx5){echo "xin2.png";}else{echo "xin.png";} ?>) no-repeat center center;background-size: 50% 100%;">
				<span class="num" id="n5" style="display:<?php if($have<1){echo 'block';}?>"><?php echo $qq5; ?></span>
			</div>
		</div>
		<div class="tous" id="o6">
			<div class="dog txt">无锡热可可文化发展有限公司</div>
			<div class="dog piao">
				<input id="sub6" class="bn" name="sub6" type="button" style="background: url(<?php if($rowx6){echo "xin2.png";}else{echo "xin.png";} ?>) no-repeat center center;background-size: 50% 100%;">
				<span class="num" id="n6" style="display:<?php if($have<1){echo 'block';}?>"><?php echo $qq6; ?></span>
			</div>
		</div>
		<div class="tous" id="o7">
			<div class="dog txt">常州市视听广告文化传媒有限公司</div>
			<div class="dog piao">
				<input id="sub7" class="bn" name="sub7" type="button" style="background: url(<?php if($rowx7){echo "xin2.png";}else{echo "xin.png";} ?>) no-repeat center center;background-size: 50% 100%;">
				<span class="num" id="n7" style="display:<?php if($have<1){echo 'block';}?>"><?php echo $qq7; ?></span>
			</div>
		</div>
		<div class="tous" id="o8">
			<div class="dog txt">宜兴博睿佰特传媒有限公司</div>
			<div class="dog piao">
				<input id="sub8" class="bn" name="sub8" type="button" style="background: url(<?php if($rowx8){echo "xin2.png";}else{echo "xin.png";} ?>) no-repeat center center;background-size: 50% 100%;">
				<span class="num" id="n8" style="display:<?php if($have<1){echo 'block';}?>"><?php echo $qq8; ?></span>
			</div>
		</div>
		<div class="tous" id="o9">
			<div class="dog txt">无锡悦尚文化传媒有限公司</div>
			<div class="dog piao">
				<input id="sub9" class="bn" name="sub9" type="button" style="background: url(<?php if($rowx9){echo "xin2.png";}else{echo "xin.png";} ?>) no-repeat center center;background-size: 50% 100%;">
				<span class="num" id="n9" style="display:<?php if($have<1){echo 'block';}?>"><?php echo $qq9; ?></span>
			</div>
		</div>
		<div class="tous" id="o10">
			<div class="dog txt">无锡飞马营销策划有限公司</div>
			<div class="dog piao">
				<input id="sub10" class="bn" name="sub10" type="button" style="background: url(<?php if($rowx10){echo "xin2.png";}else{echo "xin.png";} ?>) no-repeat center center;background-size: 50% 100%;">
				<span class="num" id="n10" style="display:<?php if($have<1){echo 'block';}?>"><?php echo $qq10; ?></span>
			</div>
		</div>
	</form>
	</div>
</body>
</html>
<script>
	$("input[name='sub1']").on("click",function(){
		$.ajax({
		url:'add.php?a=1',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){	
			// $('.num').css('display','block');
			if(m=='ok'){
				var z1 = "<?php echo $qq ?>";
				var zz1 =  parseInt(z1)+1;
				$("#n1").html(zz1);
				$("#sub1").css("background","url(xin2.png) no-repeat center center");
				$("#sub1").css("background-size","50% 100%");
				alert("投票成功！");
			} 
			if(m=='rep'){
				alert("你已投过此公司！");
			}
			if(m=='m'){
				alert("你的投票机会已用光！");
			}
			if(m=='tc'){
				$('.num').css('display','block');
				var z1 = "<?php echo $qq ?>";
				var zz1 =  parseInt(z1)+1;
				$("#n1").html(zz1);
				$("#sub1").css("background","url(xin2.png) no-repeat center center");
				$("#sub1").css("background-size","50% 100%");
				alert("投票成功！");
			}    				
			if(m==-2){
				alert("插入数据库失败！");
			}
		}
		});
	});
	$("input[name='sub2']").on("click",function(){
		$.ajax({
		url:'add.php?a=2',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){
		// $('.num').css('display','block');				
			if(m=='ok'){
				var z1 = "<?php echo $qq2 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#n2").html(zz1);
				$("#sub2").css("background","url(xin2.png) no-repeat center center");
				$("#sub2").css("background-size","50% 100%");
				alert("投票成功！");
			} 
			if(m=='rep'){
				alert("你已投过此公司！");
			}
			if(m=='m'){
				alert("你的投票机会已用光！");
			} 
			if(m=='tc'){
				$('.num').css('display','block');
				var z1 = "<?php echo $qq2 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#n2").html(zz1);
				$("#sub2").css("background","url(xin2.png) no-repeat center center");
				$("#sub2").css("background-size","50% 100%");
				alert("投票成功！");

			}   				
			if(m==-2){
				alert("插入数据库失败！");
			}
		}
		});
	});
	$("input[name='sub3']").on("click",function(){
		$.ajax({
		url:'add.php?a=3',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){	
		// $('.num').css('display','block');			
			if(m=='ok'){
				var z1 = "<?php echo $qq3 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#n3").html(zz1);
				$("#sub3").css("background","url(xin2.png) no-repeat center center");
				$("#sub3").css("background-size","50% 100%");
				alert("投票成功！");
			} 
			if(m=='rep'){
				alert("你已投过此公司！");
			}
			if(m=='m'){
				alert("你的投票机会已用光！");
			}  
			if(m=='tc'){
				$('.num').css('display','block');
				var z1 = "<?php echo $qq3 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#n3").html(zz1);
				$("#sub3").css("background","url(xin2.png) no-repeat center center");
				$("#sub3").css("background-size","50% 100%");
				alert("投票成功！");
			}  				
			if(m==-2){
				alert("插入数据库失败！");
			}
		}
		});
	});
	$("input[name='sub4']").on("click",function(){
		$.ajax({
		url:'add.php?a=4',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){
		// $('.num').css('display','block');				
			if(m=='ok'){
				var z1 = "<?php echo $qq4 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#n4").html(zz1);
				$("#sub4").css("background","url(xin2.png) no-repeat center center");
				$("#sub4").css("background-size","50% 100%");
				alert("投票成功！");
			}  
			if(m=='rep'){
				alert("你已投过此公司！");
			}
			if(m=='m'){
				alert("你的投票机会已用光！");
			}   
			if(m=='tc'){
				$('.num').css('display','block');
				var z1 = "<?php echo $qq4 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#n4").html(zz1);
				$("#sub4").css("background","url(xin2.png) no-repeat center center");
				$("#sub4").css("background-size","50% 100%");
				alert("投票成功！");
			}				
			if(m==-2){
				alert("插入数据库失败！");
			}
		}
		});
	});
	$("input[name='sub5']").on("click",function(){
		$.ajax({
		url:'add.php?a=5',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){
		// $('.num').css('display','block');				
			if(m=='ok'){
				var z1 = "<?php echo $qq5 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#n5").html(zz1);
				$("#sub5").css("background","url(xin2.png) no-repeat center center");
				$("#sub5").css("background-size","50% 100%");
				alert("投票成功！");
			}   
			if(m=='rep'){
				alert("你已投过此公司！");
			}
			if(m=='m'){
				alert("你的投票机会已用光！");
			} 
			if(m=='tc'){
				$('.num').css('display','block');
				var z1 = "<?php echo $qq5 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#n5").html(zz1);
				$("#sub5").css("background","url(xin2.png) no-repeat center center");
				$("#sub5").css("background-size","50% 100%");
				alert("投票成功！");
			} 				
			if(m==-2){
				alert("插入数据库失败！");
			}
		}
		});
	});
	$("input[name='sub6']").on("click",function(){
		$.ajax({
		url:'add.php?a=6',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){
		// $('.num').css('display','block');				
			if(m=='ok'){
				var z1 = "<?php echo $qq6 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#sub6").css("background","url(xin2.png) no-repeat center center");
				$("#sub6").css("background-size","50% 100%");
				$("#n6").html(zz1);
				alert("投票成功！");
			}  
			if(m=='rep'){
				alert("你已投过此公司！");
			}
			if(m=='m'){
				alert("你的投票机会已用光！");
			}   
			if(m=='tc'){
				$('.num').css('display','block');
				var z1 = "<?php echo $qq6 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#sub6").css("background","url(xin2.png) no-repeat center center");
				$("#sub6").css("background-size","50% 100%");
				$("#n6").html(zz1);
				alert("投票成功！");
			}				
			if(m==-2){
				alert("插入数据库失败！");
			}
		}
		});
	});
	$("input[name='sub7']").on("click",function(){
		$.ajax({
		url:'add.php?a=7',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){
		// $('.num').css('display','block');				
			if(m=='ok'){
				var z1 = "<?php echo $qq7 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#sub7").css("background","url(xin2.png) no-repeat center center");
				$("#sub7").css("background-size","50% 100%");
				$("#n7").html(zz1);
				alert("投票成功！");
			}  
			if(m=='rep'){
				alert("你已投过此公司！");
			}
			if(m=='m'){
				alert("你的投票机会已用光！");
			}  
			if(m=='tc'){
				$('.num').css('display','block');
				var z1 = "<?php echo $qq7 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#sub7").css("background","url(xin2.png) no-repeat center center");
				$("#sub7").css("background-size","50% 100%");
				$("#n7").html(zz1);
				alert("投票成功！");
			} 				
			if(m==-2){
				alert("插入数据库失败！");
			}
		}
		});
	});
	$("input[name='sub8']").on("click",function(){
		$.ajax({
		url:'add.php?a=8',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){
		// $('.num').css('display','block');				
			if(m=='ok'){
				var z1 = "<?php echo $qq8 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#sub8").css("background","url(xin2.png) no-repeat center center");
				$("#sub8").css("background-size","50% 100%");
				$("#n8").html(zz1);
				alert("投票成功！");
			}   
			if(m=='rep'){
				alert("你已投过此公司！");
			}
			if(m=='m'){
				alert("你的投票机会已用光！");
			}  
			if(m=='tc'){
				$('.num').css('display','block');
				var z1 = "<?php echo $qq8 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#sub8").css("background","url(xin2.png) no-repeat center center");
				$("#sub8").css("background-size","50% 100%");
				$("#n8").html(zz1);
				alert("投票成功！");
			}				
			if(m==-2){
				alert("插入数据库失败！");
			}
		}
		});
	});
	$("input[name='sub9']").on("click",function(){
		$.ajax({
		url:'add.php?a=9',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){
		// $('.num').css('display','block');				
			if(m=='ok'){
				var z1 = "<?php echo $qq9 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#sub9").css("background","url(xin2.png) no-repeat center center");
				$("#sub9").css("background-size","50% 100%");
				$("#n9").html(zz1);
				alert("投票成功！");
			}   
			if(m=='rep'){
				alert("你已投过此公司！");
			}
			if(m=='m'){
				alert("你的投票机会已用光！");
			}  
			if(m=='tc'){
				$('.num').css('display','block');
				var z1 = "<?php echo $qq9 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#sub9").css("background","url(xin2.png) no-repeat center center");
				$("#sub9").css("background-size","50% 100%");
				$("#n9").html(zz1);
				alert("投票成功！");
			}				
			if(m==-2){
				alert("插入数据库失败！");
			}
		}
		});
	});
	$("input[name='sub10']").on("click",function(){
		$.ajax({
		url:'add.php?a=10',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){
		// $('.num').css('display','block');				
			if(m=='ok'){
				var z1 = "<?php echo $qq10 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#sub10").css("background","url(xin2.png) no-repeat center center");
				$("#sub10").css("background-size","50% 100%");
				$("#n10").html(zz1);
				alert("投票成功！");
			}  
			if(m=='rep'){
				alert("你已投过此公司！");
			}
			if(m=='m'){
				alert("你的投票机会已用光！");
			} 
			if(m=='tc'){
				$('.num').css('display','block');
				var z1 = "<?php echo $qq10 ?>";
				var zz1 =  parseInt(z1)+1;
				$("#sub10").css("background","url(xin2.png) no-repeat center center");
				$("#sub10").css("background-size","50% 100%");
				$("#n10").html(zz1);
				alert("投票成功！");
			}  				
			if(m==-2){
				alert("插入数据库失败！");
			}
		}
		});
	});
</script>
<!--开始-->
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
		 	 title: '苏南龙湖供应商采集投票（仅限内部使用）',
		      desc: '.',
		      link: 'http://szxytang.com/yin/bm/lh0615/getcodeurl.php',
		      imgUrl: 'http://szxytang.com/yin/bm/lh0615/share.jpg'
		  }
      wx.onMenuShareTimeline(shareinfo);
	 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>
<!--结束-->