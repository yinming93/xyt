<?php

/*2016.11.24
	发送金额大于账户金额 -- 发送失败 -- FAIL
	
*/
header("Content-type: text/html; charset=utf-8");
define('APPID','wx461b5105da7629f1'); 
define('APPSECRET','d80e5eb9158f81ed612f7b6810fb9093'); 

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//OAuth2.0 接口获取数据
if( !isset($_GET['code']) ){
	echo '操作失败！';
	header('Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://xytang88.com/test/171216hzlh/index.php&response_type=code&scope=snsapi_base&state=1#wechat_redirect');
	exit;
}

define('CODE', $_GET['code']);
include 'func.php';//公共函数
//获页面授权
$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".CODE."&grant_type=authorization_code";
$json_access_token = https_request($url);
$arr_access_token  = json_decode($json_access_token, true); //获取access_token

//判断openid是否获取到	
$openid=$arr_access_token['openid'];
if(!$openid){
	header('Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://xytang88.com/test/171216hzlh/index.php&response_type=code&scope=snsapi_base&state=1#wechat_redirect');
	exit;
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//数据库配置文件	
include 'model.php';
$mode = new Model('171216hzlh');

//1查询openid是否已经领过红包
$res = $mode->where( array('openid'=>$openid) )->select();
if($res){
	//已经领取过,显示红包金额
	$status='old';
	$moneySum = $res[0]['sum'];
	
}else{
	//2红包是否已领完
//+++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++
	//设置总红包个数//	
	$redPackNum =112;//
//+++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++

	$total=$mode->__call('count');
	if( $total>=$redPackNum ){
		$status='sorry';//红包抢完
	}else{
		$status='ok';//还有红包 ajax
	}
	
}
//----------------------------------------------------------------
				

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>龙湖天鉅，红包雨来袭！</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="blank" />

	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/rain.css" />
	<!--<script type="text/javascript" src="http://xinyutang.bj.bcebos.com/common/jquery-1.8.3.min.js"></script>-->
	<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
</head>

<body>
	<div class="page_rain">
		<div class="div bg_1"></div>
		<!--拆包-->
		<div class="chuai_box" style="display: none;">
			<div class="chuai">
				<div class="jine">
					<span id="jine"></span>
				</div>
				<p>获得来自【杭州龙湖】的红包</p>
			</div>
		</div>
		
	</div>
</body>
</html>
<script>

var status="<?php echo $status; ?>"
//1已经获取过红包
if( status=="old" ){
	
	temp()
	/*setTimeout(function(){//红包雨结束后，背景定格红包图
		$(".div").removeClass("bg_1");
		$(".div").addClass("bg_2");
	},200);
	*/
	
	
	//$(".page_rain").css("background-image","url(http://xinyutang.bj.bcebos.com/hongbao/171216hzlh/bg_redrain2.jpg)")
	
	//old 显示已经获取的金额
	$(".chuai_box").show();//红包显示
	$("#jine").text("<?php echo $moneySum.' 元';?>")
	
	
	
}else if( status=="sorry" ){
	//2红包已领完--显示红包飞走画面
	temp()
	//$(".page_rain").css("background-image","url(http://xinyutang.bj.bcebos.com/hongbao/171216hzlh/bg_redrain2.jpg)")
	
	$(".chuai_box").show();//红包显示
	$("#jine").text("红包已抽完")
	
}else if( status=="ok" ){
	//抢红包
	var a=0
	temp()
	//
	//执行
	$(document).on('touchstart', '.dd', function(){
		$(this).css("background-position","0 -100px");
		a++;
		//点击第5次时可以点中红包，可以设置随机数a=Math.random()*10   
		
		if(a == 4){
			//执行发红包程序
			var openid = "<?php echo $openid ?>";
			var data = "&openid="+openid;
			$.post("ajax.php",data,function(res){
//console.log(res);
				
				$(".chuai_box").show();//红包显示
				if(res=="FAIL"){
					$("#jine").text("红包已抽完")
				}else{
					$("#jine").text(res+" 元")
				}
				
			
				//clearInterval(Timerr,20);//停止红包雨
				$(".div").removeClass("bg_1");//删除已经下载的红包雨
				//setTimeout(function(){//红包雨结束后，背景定格红包图
					//$(".div").addClass("bg_2");
				//},3000);
			});
				
		}
	});
	
}

//动画
function temp(){

	var Timerr = setInterval(hongbaoyun,200);
	var removepackage = setInterval(function(){
										for(var jj=0;jj<$('.div>div').size()/4;jj++){
										$('.div>div').eq($('.div>div').size()-jj).remove();
										}
									},1000)
	function hongbaoyun(){
		for(var i=0;i<4;i++){//红包雨密度
			var m=parseInt(Math.random()*700+100);
			var j2=parseInt(Math.random()*300+1200);
			var j=parseInt(Math.random()*1600+000);
			var j1=parseInt(Math.random()*300+300);
			var n=parseInt(Math.random()*10+(-10));
			$('.div').prepend('<div class="dd"></div>');
			$('.div').children('div').eq(0).css({'left':j,'top':n});
			$('.div').children('div').eq(0).animate({'left':j-j1,'top':$(window).height()+20},3000);
		}
	} 
}
</script>

<?php
	require_once "jssdk.php";
    $jssdk = new Jssdk( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
	
?>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
wx.config({
	debug: false,
	appId:    '<?php echo $signPackage["appId"]?>',
	timestamp:'<?php echo $signPackage["timestamp"]?>',
	nonceStr: '<?php echo $signPackage["nonceStr"]?>',
	signature:'<?php echo $signPackage["signature"]?>',
	jsApiList:["onMenuShareTimeline","onMenuShareAppMessage"]
});
	
wx.ready(function(){ wx.hideOptionMenu() })

//防止下拉页面，查看域名
$(document).ready(function(){
	function stopScrolling( touchEvent ){
		touchEvent.preventDefault();
	}
	document.addEventListener( 'touchstart' , stopScrolling , false );
	document.addEventListener( 'touchmove' , stopScrolling , false );

}); 
</script>

<!--百度统计代码-->


