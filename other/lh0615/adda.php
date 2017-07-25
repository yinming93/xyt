<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	$openid=$_GET['openid'];
	$sql="select *from $tbname where openid='".$openid."'";	
	$query=mysql_query($sql);
	$qq=mysql_num_rows($query);
	$have = 8-$qq;
	echo "你还有".$have."次投票机会";
	// var_dump($sql);
?>