<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	session_start();	
	$tel   = addslashes($_POST['tel']);
	$name = addslashes($_POST['name']);
	// $token = $_POST['token'];

	$ff = $_COOKIE['code'];
	$sql="select * from $tbname where tel='".$tel."'";
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);

	if (!$_SESSION['token']) {
	echo 'wai';die;
	# code...
	}

	// echo 99;exit;
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
		if($row['code']<$ff){
			$time = date('Y-m-d H:i:s');
			$sql="update $tbname set code='".$ff."',time='".$time."' where tel='".$tel."'";
			
			$query=mysql_query($sql);

			if ($query) {
			echo 'shua';
			}
		}else{
			echo "nuli";
			
		}
	}else{

	//插入数据
	$time = date('Y-m-d H:i:s');
	$sql = "insert into $tbname(name,tel,time,code) values('".$name."','".$tel."','".$time."','".$ff."')";
	//echo $sql;
	$query = mysql_query($sql);
	if($query){
			setcookie('tel',$tel,time()+360000);
			echo 'ok';
	}else{
		echo -2;
	}

	}
	
?>