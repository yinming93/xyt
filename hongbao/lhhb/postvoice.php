<?php
/**
 * 
 * 
 * 
 */
function getip() { 
	$unknown = 'unknown'; 
	if ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown) ) 
		{ $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; } 
	elseif ( isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown) ) 
		{ $ip = $_SERVER['REMOTE_ADDR']; 
} 
/* 处理多层代理的情况 或者使用正则方式：$ip = preg_match("/[\d\.]{7,15}/", $ip, $matches) ? $matches[0] : $unknown; */
if (false !== strpos($ip, ',')) $ip = reset(explode(',', $ip)); return $ip; 
} 


require("similar.php");
header("Content-Type:text/html;charset=utf-8");


echo "no";die;

$oldtext = "缇香郦城，环球城上墅级洋房，即将首开";


$oldtext = str_replace(array("？", "?", ",", "，", "。", "、", "“", "”", "：", "；"), array("", "", "", "", "", "", "", "", "", ""), $oldtext);
$newtext = trim( $_POST['text'] );
$newtext = str_replace(array("？", "?", ",", "，", "。", "、", "“", "”", "：", "；"), array("", "", "", "", "", "", "", "", "", ""), $newtext);

//返回相同的字符串
//$similar = $lcs->getLCS($oldtext,$newtext);
//返回相似度
$similar = $lcs->getSimilar($oldtext,$newtext);
//$similar = sprintf("%.3f", $similar);
$similar = $similar*100;
// $similar = round($similar, 2);
$similar = ceil($similar);

	// $query = mysql_query($sql);
//$similar = similar_text($oldtext, $newtext, $result);
//$similar = number_format($similar-0.005,2, ".");
session_start();
if (!$_SESSION['token']) {
	echo 'wai';die;
}

include 'db.php';
$openid = addslashes($_POST['openid']);	
	
 	$sql="select *from lhhbls where openid='".$openid."'";
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
	if ($row) {
		echo 'rep';
		die;
	}

if ($similar>=70) {
	
	//加载红包接口
	include 'wxpayall.class.php';
	$min = 1.8;//最小红包金额，单位(元)  填写最小值1 --数字类型
	$max = 2.5;//最大红包金额，单位(元) 填写最大值200 --数字类型
	$min=$min*100;
	$max=$max*100;
	$money = rand($min,$max);
	$sender = "恭喜发财";//红包标题
	$obj2 = array();
	$obj2['wxappid']        = APPID;
	$obj2['mch_id']         = MCHID;//商户号
	$obj2['mch_billno']	    = MCHID.date('YmdHis').rand(1000, 9999);//订单号
	$obj2['client_ip']    	= $_SERVER['REMOTE_ADDR'];
	$obj2['re_openid']      = $openid;//openid
	$obj2['total_amount']   = $money; //付款金额，单位（分）
	$obj2['total_num']      = 1;      //红包发放总人数
	$obj2['nick_name']      = $sender;//提供方名称
	$obj2['send_name']      = $sender;//红包发送者名称
	$obj2['wishing']        = "恭喜发财";//红包祝福语
	$obj2['act_name']      	= "恭喜发财";//活动名,字段必填,并且少于32个字符
	$obj2['remark']      	= "恭喜发财";//备注
	$url = 'https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack';
	$wxHongBaoHelper2 = new WxPay();
	$resultxml = $wxHongBaoHelper2->pay($url, $obj2);//发红包
	$resultObj = simplexml_load_string($resultxml, 'SimpleXMLElement', LIBXML_NOCDATA);//返回执行结果
	if($resultObj->result_code =="SUCCESS"){
		$sum    = $money/100;
		$time = date('Y-m-d H:i:s');
		$ip=getip();
		$sql="INSERT INTO lhhbls(openid,money,ip,time,status) VALUES('{$openid}','{$sum}','{$ip}','{$time}',1)";
		$query = mysql_query($sql);
		if($query){
			echo 'ok';
		}else{
			echo -2;
		}
	}else{
		echo "no";
		// echo json_encode( array("msg" =>"error") );
		exit;
	}
// echo $similar;
}else{
	echo 'jx';
}

//echo $newtext;
exit;
