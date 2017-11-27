<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'DBCon.php';
	
	$name   = addslashes($_POST['name']);
	$tel   = addslashes($_POST['tel']);
	$openid = addslashes($_POST['openid']);
	
	$sql="select * from $tbname1 where Openid='".$openid."'";
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
	if($row){
		echo "ok";
		exit;
	}
	
	$sql="insert into $tbname1(Name,Phone,Openid) values('".$name."','".$tel."','".$openid."')";
	$query=mysql_query($sql);
	if($query){
		echo "ok";
	}else{
		echo "error";
	}
?>