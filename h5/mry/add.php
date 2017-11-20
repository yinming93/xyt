<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'DBCon.php';
	
	$url = $_POST['url'];
	$sql="insert into $tbname(url) values('$url')";	
	$query=mysql_query($sql);
	if($query){
		$sqlsel="select * from $tbname where url='$url'";
		$querysel=mysql_query($sqlsel);
		$row=mysql_fetch_assoc($querysel);
		if($row){
			echo $row['ID'];
		}else{
			echo 'none';
		}
	}
?>