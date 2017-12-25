<?php
$openid = 'oHmeTwOr7_ZMwAvpild5DFsm4oCI';
	//加载红包接口
	include 'wxpayall.class.php';
	//设置红包数固定额--数字类型
	// $money = 1;
	// $money = $money *100;

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
	var_dump($resultObj);die;

	if($resultObj->result_code =="SUCCESS"){
		$data['sum']    = $money/100;//红包金额 --数字类型--保存到数据库是字符类类型
		echo json_encode( array("sum"=>$data["sum"]) );
		
		//发送成功-插入数据库
		//插入
		$data['openid'] = $openid;//openid
		$data['date']   = date("Y-m-j H:i:s",time());//领取时间
		
		$insertId = $mode->insert( $data );//返回自增id 
		if($insertId>=0){
			//echo $data['sum'];
			//echo json_encode( array("msg" =>$insertId,"sum"=>$data["sum"]) );
			//exit;
		}

	}else{
		//echo "红包系统繁忙";
		//echo $resultObj->result_code;
		//echo "erro";
		echo json_encode( array("msg" =>"error") );
		exit;
	}
	
	