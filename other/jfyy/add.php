<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';	
	session_start();	
	$tel   = addslashes($_POST['tel']);
	$name = addslashes($_POST['name']);	
	$cod=$_COOKIE['fenshu'];
	$code=$cod*10;

	
	$openid = addslashes($_POST['openid']);	
	$sql="select * from $tbname where openid='".$openid."'";
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);

	if (!$_SESSION['token']) {
	echo 'wai';die;
	# code...
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
	if($row){
		echo 'chong';
		exit;
	}
	// 统计人数
	// $sq = "select * from $tbname";
	// $qu = mysql_query($sq);
	// $qq = mysql_num_rows($qu);
	// if($qq>49){
	// 	echo "m";exit;
	// }

	$time = addslashes($_POST['ttt']);
	$sql="INSERT INTO $tbname(openid,name,tel,code,time) VALUES('{$openid}','{$name}','{$tel}','{$code}','{$time}')";
	// echo $sql;exit;
	$query = mysql_query($sql);
	if($query){
		echo 'ok';
	}else{
		echo 'sb';
	}
?>