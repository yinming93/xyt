<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';

session_start();
	if (!$_SESSION['token']) {
	$info['status']=-1;
	$info['info']='非法操作！';
	echo json_encode($info);die;
}
		$info['status']=0;
		$info['info']='活动已结束，谢谢参与！';
		echo json_encode($info);die;
	// 抽奖：
	// 查询还有的奖品
	$rand=rand(0,100);

	$openid   = addslashes($_POST['openid']);
	$sub   = addslashes($_POST['sub']);

	$sql="select * from php_cjjp where tid=3 and cznum<count and status=1";
	$query = mysql_query($sql);
	$list = array();
	while ($row = mysql_fetch_assoc($query)){
		$list[] = $row;
	}
	
	$arr=array();

	foreach ($list as $k => $v) {
		if($v['rate']>=$rand)
		{
			$arr['name'][]=$v['name'];
			$arr['dushu'][]=$v['dushu'];
		}
	}

	$countname=count($arr['name']);

	$r=rand(0,$countname-1);


	if ($countname>0 && $sub==1) {

$date=date('Y-m-d');
	$sqlp="select count(*) count from php_cjjpls where openid='".$openid."' and date='".$date."'";
	$queryp = mysql_query($sqlp);
	$rowp   = mysql_fetch_assoc($queryp);	
if ($rowp['count']>=3) {
		$info['status']=0;
		$info['info']='您今天的抽奖机会已用完！，转盘转动无效';
		echo json_encode($info);die;
	}
	$sqljp="select * from php_cjjp where name='".$arr['name'][$r]."' and status=1";
	$queryjp = mysql_query($sqljp);
	$rowjp   = mysql_fetch_assoc($queryjp);	


		$jid=$rowjp['id'];
		$name=$arr['name'][$r];
		$money2=$rowjp['money'];
		$time=date('Y-m-d H:i:s');

$sqluser="select * from php_cjuser where openid='".$openid."'";
						$queryuser = mysql_query($sqluser);
						$rowuser   = mysql_fetch_assoc($queryuser);	
					if ($rowjp['money']>=1 && $rowuser['tel']) {
						// 执行红包接口，status=1
						//加载红包接口
								include 'wxpayall.class.php';
								//设置红包数固定额--数字类型
								$money = $rowjp['money'];
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
									$status=1;


								}else{
									//echo "红包系统繁忙";
									//echo $resultObj->result_code;
									//echo "erro";
									$status=6;
									$info['status']=6;
									// $info['info']='红包系统繁忙，转盘转动无效';
									// echo json_encode($info);die;
								}
						}else if($rowjp['money']<1 && $rowuser['tel']){
							$status=1;
						}else{
							$status=0;
						}

				$count=$rowjp['cznum'];
				$sqlj="UPDATE php_cjjp set cznum='".++$count."' where name='".$arr['name'][$r]."' and status=1";
				$queryj = mysql_query($sqlj);
				if($queryj){
					$sqli="insert into php_cjjpls(tid,openid,jid,date,money,name,time,status) VALUES(3,'{$openid}','{$jid}','{$date}','{$money2}','{$name}','{$time}',$status)";
					$queryi = mysql_query($sqli);
					$zengid=mysql_insert_id($queryi);
					if ($queryi) {
									
								$info['name']=$arr['name'][$r];
								$info['dushu']=$arr['dushu'][$r];
								$info['status']=1;
					}else{
						$info['status']=-1;
						$info['info']='插入数据库失败，转盘转动无效';
					}
				}
		echo json_encode($info);die;
	}else{
		$info['status']=0;
		$info['info']='没有奖品啦，转盘转动无效';
		echo json_encode($info);die;
	}



?>