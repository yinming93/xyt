<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';		
	$tel   = addslashes($_POST['tel']);
	$name = addslashes($_POST['name']);
	$cd = addslashes($_POST['cd']);
	$openid = addslashes($_POST['openid']);

	$year = addslashes($_POST['year']);
	$month = addslashes($_POST['month']);
	$day = addslashes($_POST['day']);
	$hour = addslashes($_POST['hour']);
	if ($month<10){
		$month='0'.$month;
	}
	if ($day<10){
		$day='0'.$day;
	}
	$ri =$year.'-'.$month.'-'.$day;

	$time = date('Y-m-d');

	$sql="select * from $tbname where ri='".$ri."' and cd='".$cd."' and hour='".$hour."'";
	// 查询同一天内同一场地的同一时间段是否被预约
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
	if($row){
		echo 'chong';
		exit;
	}

	// $ttt=substr($time , 0 , 10);
	$sql="select * from $tbname where openid='".$openid."' and time ='".$time."'";
	// 判断每人只能预约一次
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
	if($row){
		echo 'tian';
		exit;
	}
	
	// 检查信息是否填写完整
	foreach ($_POST as $k => $v) {
		if(!$v){
			echo 'wan';exit; 
		}
	}
	if(!is_numeric($tel) || strlen($tel)!=11 || !preg_match('/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/', $tel)){
		echo 'tel';exit;
	}
	// 判断时间是否是两天内	
	$tt = strtotime(date('Y-m-d'));
	// 当天时间戳
	$to = strtotime(date('Y-m-d',strtotime('+2 day')));
	// 当前时间两天后的时间戳
	$rr = strtotime($ri);
	// 预约时间的时间戳
// echo $rr;exit;
	if($rr<$tt||$to<$rr){
		echo "chao";
		exit;
	}
	//统计人数
	// $sq = "select * from $tbname";
	// $qu = mysql_query($sq);
	// $qq = mysql_num_rows($qu);
	// if($qq>29000000000){
	// 	echo "m";exit;
	// }
	$sql="INSERT INTO $tbname(name,openid,tel,ri,cd,hour,time) VALUES('{$name}','{$openid}','{$tel}','{$ri}','{$cd}','{$hour}','{$time}')";
	// echo $sql;exit;
	$query = mysql_query($sql);
	if($query){
		echo 'ok';
	}else{
		echo 'sb';
	}
?>