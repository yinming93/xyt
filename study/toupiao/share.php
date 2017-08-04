<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'DBCon.php';
	
	
	$openid = addslashes($_POST['openid']);
	
	
	$sql="update $tbname1 set Share='yes' where Openid='".$openid."'";
	$query=mysql_query($sql);
	if($query){
		echo "ok";
	}else{
		echo "error";
	}
?>