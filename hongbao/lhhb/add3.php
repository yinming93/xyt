<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	$tel   = addslashes($_POST['tel']);
	$name = addslashes($_POST['name']);	
	$openid = addslashes($_POST['openid']);	
	$sql="select * from lhhbuser where openid='".$openid."'";
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
	foreach ($_POST as $k => $v) {
		if(!$v){
			echo -1;exit; 
		}
	}
	if(is_numeric($name) || strlen($name)<4 || strlen($name)>18){
		echo 'name';exit;
	}
	if(!is_numeric($tel) || strlen($tel)!=11 || !preg_match('/1[34578]{1}\d{9}/', $tel)){
		echo 'tel';exit;
	}	
	if($row){
		echo 'rep';
		exit;
	}
	$time = date('Y-m-d H:i:s');
	$sql="INSERT INTO lhhbuser(openid,name,tel,time) VALUES('{$openid}','{$name}','{$tel}','{$time}')";
	$query = mysql_query($sql);
		if($query){
		echo 'ok';
		}else{
			echo -2;
		}
?>