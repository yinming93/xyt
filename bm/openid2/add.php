<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
				
	$openid   = addslashes($_POST['openid']);
	$tel   = addslashes($_POST['tel']);
	$name = addslashes($_POST['name']);	
	$mon = addslashes($_POST['mon']);
	$sql="select * from $tbname where openid='".$openid."' or tel='".$tel."'";
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
	$sql="INSERT INTO $tbname(openid,name,tel,mon,time) VALUES('{$openid}','{$name}','{$tel}','{$mon}','{$time}')";
	$query = mysql_query($sql);
			if($query){
			echo 'ok';
	}else{
		echo -2;
	}
?>