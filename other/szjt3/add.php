<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';		
	$openid = addslashes($_POST['openid']);
	$tou = addslashes($_POST['tou']);
	$nichen = base64_encode($_POST['nichen']);
	$zan='0';
	$shen='1';
	$xy = addslashes($_POST['xy']);
	$tel = addslashes($_POST['tel']);
	$name = addslashes($_POST['name']);
	$sql="select * from $tbname where openid='".$openid."'";
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
	foreach ($_POST as $k => $v) {
		if(!$v){
			echo -1;exit; 
		}
	}
	if(preg_match('/^[a-zA-Z]*$/', $xy)){
		echo 'xy';exit;
	}
	if(is_numeric($name) || strlen($name)<4 || strlen($name)>12){
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
	$sql="INSERT INTO $tbname(openid,tou,nichen,name,tel,xy,zan,shen,time) VALUES('{$openid}','{$tou}','{$nichen}','{$name}','{$tel}','{$xy}','{$zan}','{$shen}','{$time}')";
	$query = mysql_query($sql);
			if($query){
			echo 'ok';
	}else{
		echo -2;
	}
?>