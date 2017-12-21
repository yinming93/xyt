<?php
    header("Content-type: text/html; charset=utf-8");
	define('APPID','wx461b5105da7629f1'); 
	define('APPSECRET','d80e5eb9158f81ed612f7b6810fb9093'); 
	//OAuth2.0 接口获取数据
    if( !isset($_GET['code']) ){
		echo '操作失败！';
		header('Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://szxytang.com/developer/nblh/2/index.php&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect');
		exit;
    }
	
	define('CODE', $_GET['code']);
	include 'func.php';//公共函数
	
//1获页面授权的ACCESS_TOKEN 、 refresh_token、openid、 scope的类型
	$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".CODE."&grant_type=authorization_code";
	$json_access_token = https_request($url);
	$arr_access_token  = json_decode($json_access_token, true); //获取access_token
//2	
	$url  = "https://api.weixin.qq.com/sns/userinfo?access_token=". $arr_access_token['access_token'] ."&openid=".$arr_access_token['openid'] ."&lang=zh_CN";
    $json = https_request($url);
    $userinfo_arr = json_decode($json, true); 

	//p( $userinfo_arr);exit;
	
//判断openid是否获取到	
	$openid=$userinfo_arr['openid'];
	if(!$openid){
		header('Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://szxytang.com/developer/nblh/2/index.php&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect');
		exit;
	}

	$nickname   = base64_encode( $userinfo_arr['nickname'] );
	$headimgurl = $userinfo_arr['headimgurl'];
//查询数据库
	include 'db.php';
	$sql = "select * from $tbname where openid='$openid'";
	$query=mysql_query($sql);
	$res = mysql_fetch_assoc($query);
	
	$temp = '';
	
	if(!$res){
	
		$time = date("Y-m-d H:i:s",time());
		$sql="INSERT INTO $tbname(openid,nickname,headimgurl,time) VALUES('{$openid}','{$nickname}','{$headimgurl}','{$time}')";
		$query = mysql_query($sql);
		
		$temp = "ok1";
		
		
		//header('Location:http://xianchang.qq.com/live/client/index.html#/signin?campaign_id=354529');
		//exit;		
		
	//}else{
	
		//header('Location:http://xianchang.qq.com/live/client/index.html#/signin?campaign_id=354529');
		//exit;
		
	}else{
		$temp = "ok2";
	}			
		
	
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>龙湖天琅 签到上墙</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
	<meta http-equiv="Cache-Control" content="max-age=0" />
	<meta name="apple-touch-fullscreen" content="yes" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<style>

	.im1{
		position: absolute;
		top: 35%;
		left: 35%;
		width: 30%;
		z-index: 99;
		border-radius: 10px;
	}
	
	.im2{
		position: absolute;
		top: 0%;
		left: 0%;
		width: 100%;
		z-index: 98;
	}
</style>
</head>
<?php 
	if($temp == "ok1" || $temp=="ok2"){
		echo "签到成功！";
?>
	<img class="im1" src="<?php echo $headimgurl ?>" />
	<img class="im2" src="http://xinyutang.bj.bcebos.com/other/170707nblh1.jpg" />
<?php
	}else{
		echo 'no';
	}
?>
<body>
</body>
</html>
<?php
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();	
?>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
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
	
	wx.hideOptionMenu()
})
</script>

