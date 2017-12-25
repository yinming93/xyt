<?php
	header("Content-type: text/html; charset=utf-8");
	define('APPID','wx461b5105da7629f1'); 
	define('APPSECRET','d80e5eb9158f81ed612f7b6810fb9093'); 

	//OAuth2.0 接口获取数据
    if( !isset($_GET['code']) ){
		echo '操作失败！';
		header('Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://xytang88.com/test/1013jnyy/index.php&response_type=code&scope=snsapi_base&state=1#wechat_redirect');
		exit;
    }
	
	define('CODE', $_GET['code']);
	include 'func.php';//公共函数
	
//1获页面授权的ACCESS_TOKEN 、 refresh_token、openid、 scope的类型
	$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".CODE."&grant_type=authorization_code";
	$json_access_token = https_request($url);
	$arr_access_token  = json_decode($json_access_token, true); //获取access_token
	
//2	
//判断openid是否获取到	
	$openid = $arr_access_token["openid"];
	if(!$openid){
		header('Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://xytang88.com/test/1013jnyy/index.php&response_type=code&scope=snsapi_base&state=1#wechat_redirect');
		exit;
	}

//数据库配置文件	
	include "model.php";
	$mode = new Model("1013jnyy");

//查询总条数
//echo $total=$mode->__call('count');exit;
	
	//查询openid是否已经领过红包
	$res = $mode->where( array('openid'=>$openid) )->select();
	//p($res);exit;
	
	if($res){
		//已经领取过,显示红包金额
		$status = "old";
		$moneySum = $res[0]["sum"];
		
	}else{
	//判断
		//
		$res1 = $mode->where( array("sum"=>"1") )->select();
		$num1 = count( $res1 );//计算个数
		if( $num1 >=380 ){//774
			//
			$res2 = $mode->where( array("sum"=>"2") )->select();
			$num2 = count( $res2 );//计算个数
			if( $num2>=150 ){//300
				//
				$res3 = $mode->where( array("sum"=>"5") )->select();
				$num3 = count( $res3 );//计算个数
				if( $num3>=25 ){//50
					$res4 = $mode->where( array("sum"=>"10") )->select();
					$num4 = count( $res4 );//计算个数
					if( $res4>=10 ){//20
						$status="sorry";
					}else{
						$money = 10;//元
						$status="ok";
					}
					
				}else{
					
					$money = 5;
					$status="ok";//
				}
				
			}else{
				$money = 2;//元
				$status="ok";
			}
			
		}else{
			$money = 1;//元
			$status="ok";
			
		}
		
		
		//红包存在 - 发送
		if( $status == "ok" ){
			
			require('wxpayall.class.php');
				
			//设置红包数固定额
			$money = $money *100;

			$sender = "江南御园";//红包标题
			$obj2 = array();
			$obj2['wxappid']        = APPID;
			$obj2['mch_id']         = MCHID;//商户号
			$obj2['mch_billno']	    = MCHID.date('YmdHis').rand(1000, 9999);//订单号
			$obj2['client_ip']    	= $_SERVER['REMOTE_ADDR'];

			$obj2['re_openid']      = $openid;//openid

			$obj2['total_amount']   = $money;//付款金额，单位分
			$obj2['total_num']      = 1;//红包发放总人数
			$obj2['nick_name']      = $sender;//提供方名称
			$obj2['send_name']      = $sender;//红包发送者名称
			$obj2['wishing']        = "融创";//红包祝福语
			$obj2['act_name']      	= "融创";//活动名,字段必填,并且少于32个字符
			$obj2['remark']      	= "抢红包";//备注
//你参与的【抢红包活动】，成功获得【紫竹云山墅】赠送的红包...

			$url = "https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack";
			$wxHongBaoHelper2 = new WxPay();
			$resultxml = $wxHongBaoHelper2->pay($url, $obj2);//发红包
			$resultObj = simplexml_load_string($resultxml, 'SimpleXMLElement', LIBXML_NOCDATA);//返回执行结果
							
//p( json_encode($resultObj) );exit;
//echo $resultObj->result_code;exit;

			//红包发送成功
			//result_code交易是否成功需要查看result_code来判断 SUCCESS/FAIL
			if($resultObj->result_code =="SUCCESS"){
				
				//插入
				$data['openid'] = $openid;//openid
				$data['date']   = date("Y-m-j h:i:sa",time());//领取时间
				$data['sum']    = $money/100;//红包金额
				
				$insertId = $mode->insert( $data );//返回自增id 
				//exit;
				if($insertId>=0){
					$status="new";
					$moneySum=$data['sum'];
				}
			}else{
				//账户可能没钱了
				$status="sorry";
			}
				
		}

	}//end
	
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>融创·江南御园</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta http-equiv="Cache-Control" content="max-age=0" />
		<meta name="apple-touch-fullscreen" content="yes" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<link rel="stylesheet" href="css/main.css" />
		<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		
		
	</head>
	<body>	

		<?php if($status=="old" || $status=="new"){ ?>		
				<img id="show" src="http://xinyutang.bj.bcebos.com/1710/1013jnyy.jpg" />
				<div id="sum"><?php echo $moneySum ?> 元</div>
				
		<?php }else if($status=="sorry"){ ?>

				<img id="sorry" src="http://xinyutang.bj.bcebos.com/1710/1013jnyyno.jpg" />
				
		<?php } ?>

	</body>		
</html>
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
		jsApiList:[
			"onMenuShareTimeline","onMenuShareAppMessage"
		]
	})
		
	wx.ready(function(){
		wx.hideOptionMenu()	
	})
</script>
<script>
//防止下拉页面，查看域名
	$(document).ready(function(){
		function stopScrolling( touchEvent ){
			touchEvent.preventDefault()
		}
		document.addEventListener( 'touchstart' , stopScrolling , false )
		document.addEventListener( 'touchmove' , stopScrolling , false )
	})
</script>
	