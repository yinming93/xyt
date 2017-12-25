<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	session_start();
	if (!$_SESSION['token']) {
echo 'wai';die;
}		
		echo '活动已结束，谢谢参与！';die;
	$tel   = addslashes($_POST['tel']);
	$openid = addslashes($_POST['openid']);	
	foreach ($_POST as $k => $v) {
		if(!$v){
			echo -1;exit; 
		}
	}
	if(!is_numeric($tel) || strlen($tel)!=11 || !preg_match('/1[34578]{1}\d{9}/', $tel)){
		echo 'tel';exit;
	}	
	
	if(!$openid){
		echo 'openid';
		exit;
	}
	$sql="select * from php_cjuser where tel='".$tel."' or openid='".$openid."'";
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
		if($row){
		echo 'rep';
		exit;
	}

				// var_dump($rowls);
				// die;



	$time = date('Y-m-d H:i:s');
	$sql="INSERT INTO php_cjuser(tid,openid,tel,time) VALUES(3,'{$openid}','{$tel}','{$time}')";
	$query = mysql_query($sql);
			if($query){
								$sqlls="select * from php_cjjpls where openid='".$openid."' order by id DESC";
				$queryls = mysql_query($sqlls);
				$rowls   = mysql_fetch_assoc($queryls);
				if ($rowls['status']==0 && $rowls['money']>=1) {
											// 执行红包接口，status=1
						//加载红包接口
								include 'wxpayall.class.php';
								//设置红包数固定额--数字类型
								$money = $rowls['money'];
								if ($money>=20) {
									$money=18.8;
									# code...
								}
								$money = $money *100;
							/*
								$min = 1;//最小红包金额，单位(元)  填写最小值1 --数字类型
								$max = 1.2;//最大红包金额，单位(元) 填写最大值200 --数字类型
								$min=$min*100;
								$max=$max*100;
								$money = rand($min,$max);
							*/
								$sender = "我爱宅2周年庆感恩";//红包标题
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
								$obj2['act_name']      	= "我爱宅2周年庆";//活动名,字段必填,并且少于32个字符
								$obj2['remark']      	= "我爱宅2周年庆";//备注
								$url = 'https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack';
								$wxHongBaoHelper2 = new WxPay();
								$resultxml = $wxHongBaoHelper2->pay($url, $obj2);//发红包
								$resultObj = simplexml_load_string($resultxml, 'SimpleXMLElement', LIBXML_NOCDATA);//返回执行结果
								if($resultObj->result_code =="SUCCESS"){
									// $data['sum']    = $money/100;
									//红包金额 --数字类型--保存到数据库是字符类类型
									// $sum=$money/100;
									// $status=1;	
									// $sqlu="update php_cjjpls set status=1 where id=".$rowls['id'];
									// $queryu=mysql_query($sqlu);
									// if ($queryu) {
									// 	echo 'ok';
									// 	die;
									// 	# code...
									// }
								}else{
									//echo "红包系统繁忙";
									//echo $resultObj->result_code;
									//echo "erro";
									$sqlu="update php_cjjpls set status=6 where id=".$rowls['id'];
									$queryu=mysql_query($sqlu);
									echo -3;die;
								}
					// 调用红包接口$rowls['money']  如果红包大于20 那么把它等于18.8元；
					// 把status更新为1

					# code...
				}
									$sqlu="update php_cjjpls set status=1 where id=".$rowls['id'];
									$queryu=mysql_query($sqlu);
									if ($queryu) {
										echo 'ok';
										die;
										# code...
									}
			
	}else{
		echo -2;
	}
?>