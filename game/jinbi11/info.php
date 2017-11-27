<?php 
$useragent = addslashes($_SERVER['HTTP_USER_AGENT']);
	if(strpos($useragent, 'MicroMessenger') === false && strpos($useragent, 'Windows Phone') === false ){
	echo " <center><h2>Sorry！非微信浏览器不能访问</h2></center>";
	exit;
	}

 require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();


include 'db.php';
	if(isset($_COOKIE['tel'])){
		$code=base64_decode($_COOKIE['code']);
		$tel=$_COOKIE['tel'];
		$sql="select * from $tbname where tel='".$tel."'";
     	$query=mysql_query($sql);
	    $row=mysql_fetch_assoc($query);
    	if($row){
		if($row['code']<$code){
			$sql="update $tbname set code='".$code."'where tel='".$tel."'";
			$query=mysql_query($sql);
			if($query){
				echo "<script charset='utf-8'>";
				echo "alert('更新成功！');window.location.href='sel.php'";
				echo "</script>";
			}
		}else{
				echo "<script charset='utf-8'>";
				echo "alert('您的分数比之前的小！');window.location.href='sel.php'";
				echo "</script>";
		}
	}
}

?>

<!DOCTYPE html>
<html>
    <head>
      <title>提交信息</title>
      <meta charset="utf-8">
       <meta http-equiv="content-type" content="text/html; charset=utf-8" />
       <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
       <meta name="apple-mobile-web-app-capable" content="yes" />
       <meta name="apple-mobile-web-app-status-bar-style" content="black" />
       <meta name="format-detection" content="telephone=no">
 <style type="text/css">
        body{
	margin: 0 auto;
	background-image: url(resource/assets/back.jpg);
	background-repeat:no-repeat;
	background-size:100% auto;
	background-color: #0193DE;
      }

	 .cp{margin:190px auto;width:250px;padding-left:25px;}
   #username{
  position:absolute;
  left:27%;
  top:240px;
  width:42%;
  height: 25px;
  font-size:18px;
  border-radius: 5px;
}

#tel{
  position:absolute;
  left:27%;
  top:290px;
  width:42%;
  height: 25px;
  font-size:18px;
  border-radius: 5px;
}
#bn{
  position:absolute;
  left:35%;
  top:340px;
  width:30%;
  height: 5%;
  border-radius:8px;
  background: white;
  font-size:18px;
}
 </style>

<script language = "javascript"> 
  function check(){ 
  //验证用户名 
  var username = document.getElementById("username"); 
  if(username.value.length==0){ 
     alert("姓名不能为空！"); 
     username.focus(); 
     return false; 
  } 
  if(username.value.length<2){ 
   alert("姓名长度不能低于2位！"); 
   username.value = ""; 
   username.focus(); 
     return false; 
  } 
   
    
  //验证手机号码的 
  var tel = document.getElementById("tel"); 
var pattern= /^1[34578]\d{9}$/  
if(tel.value.length==0){ 
   alert("请输入你的手机号码！"); 
   tel.focus(); 
   return false; 
} 
if(!pattern.test(tel.value)) {  
   alert("你输入的手机号码无效，请重新输入！"); 
   tel.value=""; 
   tel.focus(); 
     return false;  
}  
  
  } 
  </script> 
    </head>
<body>
<div class="cp" >
	<form id="form1" name="fm" method="get" action="submit.php" onsubmit="return check();"><!--    <b>姓名</b> -->
   <br><br>
	  <center><input name="name" type="text" id="username"  placeholder="请输入姓名"; /></center><br><br>
    <!-- <b>电话</b> -->
    <br><br>
	 <center><input name="tel" type="text" id="tel" placeholder="请输入手机号";/></center><br><br>
	 <input name="rsCount" type="hidden" id="rsCount" value="<?php echo $_COOKIE['code']; ?>" />

<center><input type="submit" id="bn" name="Submit" value=" 提 交 "/></center>
	 
 	  
   </form>
	
	
</div>	

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
              // 所有要调用的 API 都要加到这个列表中
            ]
          });
         wx.ready(function () {
        var shareinfo={
             title: '津西双层纪 万份金礼免费送！',
              desc: '津西双层纪 万份金礼免费送！',
              link: 'http://szxytang.com/yin/youxi/jinbi11',
              imgUrl: 'http://szxytang.com/yin/youxi/jinbi11/1.jpg'
          }
      wx.onMenuShareTimeline(shareinfo);
     wx.onMenuShareAppMessage(shareinfo);
          });
    </script>