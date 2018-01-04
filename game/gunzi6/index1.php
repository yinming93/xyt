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
        // var_dump($row);die;
        
    } else{
        //echo "NO CODE";
        echo '操作失败！';
        exit;
        //写入日记文件
    }
      if(!$openid){
 	echo "<script>";
 	echo "window.location.href='http://xytang88.com/yin/youxi/gunzi6/getcodeurl2.php';";
 	echo "</script>";
 	exit;
 }
     session_start();   
    $token = md5(uniqid(rand(), true));     
    $_SESSION['token']= $token;
 // 当前时间戳
    // $xz=time();
    // // 活动结束时间
    // $js=strtotime('2017-04-03 23:59:59');
    // if ($xz>$js){
    // echo "<script>";
    // echo "alert('本次活动已圆满结束，感谢您的参与！');";
    // echo "window.location='sel.php'";
    // echo "</script>";
    // }
include 'db.php';
$sqla="select * from $tbname where openid='".$openid."'";
$querya = mysql_query($sqla);
$rowa   = mysql_fetch_assoc($querya);

    if($rowa){
        $ff = $_COOKIE['code'];
        $sql="select * from $tbname where openid='".$openid."'";
        $query=mysql_query($sql);
        $row=mysql_fetch_assoc($query);
        if($row){
        if($row['code']<$ff){
            $time = date('Y-m-d H:i:s');
           $sql="update $tbname set code='".$ff."',time='".$time."' where openid='".$openid."'";
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
<!doctype html>
<html>
	<head>
		<title>提交分数</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
	
	<style>
		*{
			margin:0;
			padding:0;
		}
		
		body{
			/*background:url(bg.jpg) repeat;
			background-size:100%;*/
		}
		
		.main1{
			margin:0 auto;
			width:260px;
			height:200px;
			/* border:1px solid red; */
			text-align:center;
			color:white;
			font-size:16px;
			
			
			position:absolute;
			top:57%;
			left:17%;
			
			/*display: none;*/
			
			/* background-color: grey; */
		}
		
		.tj{
			
			width: 60%;
			height: 8%;
			position: absolute;
			top: 84%;
			left: 20%;
			opacity: 0;
		}
		
		.dk{
			border-radius: 5px;
			width: 60%;
			height: 5%;
			position: absolute;
			top: 54%;
			left: 28%;
			font-size: 15px;
			background: transparent;
			border: 0;
			color: black;
		}
		
		p input{
			width: 150px;
			height: 30px; 
			border: 1px solid grey;
		}
		
		input{
			width: 30px;
			height: 20px; 
			border: 1px solid grey;
		}
		
		.bodybg{
			width: 100%;
	        margin: 0px;
	        padding: 0px;
			position: absolute;
			background-color: #000;
			top:0px;
			left:0px;
			overflow: hidden;
		}
		
		.dj1{
			width: 100px;
			height: 35px; 
			/* border: 1px solid red; */
			position:absolute;
			bottom:47%;
			
			left:50%;
			margin-left:-50px;
		}
		
		.dj2{
			width: 100px;
			height: 35px; 
			/* border: 1px solid red; */
			position:absolute;
			bottom:24%;
			
			left:50%;
			margin-left:-50px;
		}
		
		.fh{
			width: 50px;
			height: 20px;
			margin: 30px auto 0px auto; 
			border: 2px solid #FCD080;
			border-radius: 10px;
			text-align: center;
			
			font-size: 14px;
			font-weight: 900;
			line-height: 20px;
		}
		
		.xx{
			width: 200px;
			height: 30px;
			margin: 0 auto; 
			/* border: 2px solid #FFFFFF; */
			border-radius: 10px;
			text-align: center;
			
			font-size: 18px;
			font-weight: 900;
			line-height: 30px;
			
		}
		
	</style>
	</head>
<body style="background-color:#090F33;">
	<div class="bodybg" id="bodybg">
		<img id="bg" src="img/bgg.jpg" style="width:100%;position:relative;top:0;left:0;"/>


		<form action="add.php" method="post" onsubmit ="return check();" >
			<input type="hidden" value="<?php echo $openid ?>" name="openid">
			<input type="text" name="name" class="dk" id="username" />	

			<input type="tel" name="tel" class="dk" id="tel" style="position:absolute;top:61%;" />
			
			<input type="text" name="qq" class="dk" id="qq" style="position:absolute;top:69%;"/>

			<input type="submit" value="" class="tj"/>
		</form>
	</div>
</body>


</html>

<script language = "javascript"> 
  
	//表单1
	function check(){ 

	  //验证姓名 
		var username1 = document.getElementById("username"); 
		if(username1.value.length==0){ 
		   alert("姓名不能为空！"); 
		   username1.focus(); //当判断为空时，会自动将焦点聚焦在这里
		   return false; 
		} 
		  if(username1.value.length<2||username1.value.length>18){ 
			alert("姓名长度不能低于2位和大于18位！"); 
			username1.focus(); 
			return false; 
		} 



		//验证qq 
		var qqa = document.getElementById("qq"); 
		
		  if(qqa.value.length<1){ 
			alert("请完善地址"); 
			qqa.focus(); 
			return false; 
		} 
	//==========================================================================	
	  //验证手机号码的 
	  var tel1 = document.getElementById("tel"); 
	  var pattern= /^1[34758]\d{9}$/ 

	  if(tel1.value.length==0){ 
		 alert("请输入你的手机号码！"); 
		 tel1.focus(); 
		 return false; 
	  } 
	  if(!pattern.test(tel1.value)) {  
		 alert("你输入的手机号码无效，请重新输入！"); 
		 tel1.value=""; 
		 tel1.focus(); 
		 return false;  
	  } 

	} 




</script>
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
             title: '今年圣诞求不坑 ',
              desc: '圣诞那些坑，你能过几个？',
              link: 'http://xytang88.com/yin/youxi/gunzi6/getcodeurl.php',
              imgUrl: 'http://xytang88.com/yin/youxi/gunzi6/share.jpg'}
              wx.onMenuShareTimeline(shareinfo);
         wx.onMenuShareAppMessage(shareinfo);
          });
    </script>