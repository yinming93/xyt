<?php 
header("content-Type: text/html; charset=Utf-8"); 
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
		$code=base64_decode($_GET['code']);
		if($code==0){
			echo "<script charset='utf-8'>";
			echo "alert('分享成功！');window.location.href='index.php'";
			echo "</script>";
		}
		
		
		
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
				echo "alert('您的分数比之前的小，请继续努力！');window.location.href='sel.php'";
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
	background-image: url(images/c1.jpg);
	background-repeat: no-repeat;
	background-size: 100% auto;
      }

	 .cp{margin:100px auto;width:250px;padding-left:25px;}
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
    if(username.value.length>4){ 
   alert("姓名长度不能高于4位！"); 
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
	<form id="form1" name="fm" method="post" action="submit.php" onsubmit="return check();"><b style="position: absolute;top:155px;left:20%;">姓名</b>
   <br><br>
	  <center><input name="name" type="text" id="username"  style="width:130px;height:28px;border-radius: 5px;position: absolute;top:150px;left:32%;color: grey;"/></center><br><br>
    <b style="position: absolute;top:228px;left:20%;">手机</b>
    <br><br>
	 <center><input name="tel" type="text" id="tel" style="width:130px;height:28px;border-radius: 5px;position: absolute;top:220px;left:32%;color: grey;"/></center><br><br>
	 <input name="rsCount" type="hidden" id="rsCount" value="<?php echo $_GET['code']; ?>" />

<center><input type="submit" name="Submit" value=" 提 交 "/style="width:80px;height:30px;color:#444;margin-left:-25px;margin-top:50px;"></center>
	 
 	  
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
             title: '东环里吃青团武道赛开始啦！',
              desc: '玩游戏，赢大礼！',
              link: 'http://szxytang.com/yin/youxi/chibaozi',
              imgUrl: 'http://szxytang.com/yin/youxi/chibaozi/share.jpg'
          }
      wx.onMenuShareTimeline(shareinfo);
     wx.onMenuShareAppMessage(shareinfo);
          });
    </script>