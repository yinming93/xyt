<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';		
	
	$name = addslashes($_POST['name']);	
	$age = addslashes($_POST['age']);
	// $che   = addslashes($_POST['che']);	
	// $sex = addslashes($_POST['sex']);
	$tel = addslashes($_POST['tel']);
	// $sfz = addslashes($_POST['sfz']);
	$pro = addslashes($_POST['pro']);
	// $city = addslashes($_POST['city']);
	
	$openid = addslashes($_POST['openid']);	
	$sql="select * from $tbname where openid='".$openid."'";
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
	// 检查信息是否填写完整
	foreach ($_POST as $k => $v) {
		if(!$v){
			echo 'wan';exit; 
		}
	}
	// if(!is_numeric($tel) || strlen($tel)!=11 || !preg_match('/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/', $tel)){
	// 	echo 'tel';exit;
	// }	
	if($row){
		echo 'chong';
		exit;
	}
	if($pro==0){
		echo 'wan';
		exit;
	}
	// 统计人数
	if ($pro==1) {
		$sq1 = "select sum(`age`) from $tbname where pro=1";
		$qu1 = mysql_query($sq1);
		$qq1 = mysql_fetch_row($qu1);
		$qqq1 = $qq1[0];
		if($qqq1>49){
		echo "m";exit;
	}
	}

	if ($pro==2) {
		$sq2 = "select sum(`age`) from $tbname where pro=2";
		$qu2 = mysql_query($sq2);
		$qq2 = mysql_fetch_row($qu2);
		$qqq2 = $qq2[0];
		if($qqq2>49){
			echo "m";exit;
		}
	}

	if ($pro==3) {
		$sq3 = "select sum(`age`) from $tbname where pro=3";
		$qu3 = mysql_query($sq3);
		$qq3 = mysql_fetch_row($qu3);
		$qqq3 = $qq3[0];
		if($qqq3>49){
			echo "m";exit;
		}
	}

	if ($pro==4) {
		$sq4 = "select sum(`age`) from $tbname where pro=4";
		$qu4 = mysql_query($sq4);
		$qq4 = mysql_fetch_row($qu4);
		$qqq4 = $qq4[0];
		if($qqq4>49){
			echo "m";exit;
		}
	}

	if ($pro==5) {
		$sq5 = "select sum(`age`) from $tbname where pro=5";
		$qu5 = mysql_query($sq5);
		$qq5 = mysql_fetch_row($qu5);
		$qqq5 = $qq5[0];
		if($qqq5>49){
			echo "m";exit;
		}
	}

	if ($pro==6) {
		$sq6 = "select sum(`age`) from $tbname where pro=6";
		$qu6 = mysql_query($sq6);
		$qq6 = mysql_fetch_row($qu6);
		$qqq6 = $qq6[0];
		if($qqq6>79){
			echo "m";exit;
		}
	}
	
	
	$time = date('Y-m-d H:i:s');
	$sql="INSERT INTO $tbname(openid,name,age,tel,pro,time) VALUES('{$openid}','{$name}','{$age}','{$tel}','{$pro}','{$time}')";
	// echo $sql;exit;
	$query = mysql_query($sql);
	if($query){
		echo 'ok';
	}else{
		echo 'sb';
	}
?>