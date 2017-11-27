<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	$touid = $_GET['a'];			
	$openid   = addslashes($_POST['openid']);
	// echo $touid;exit;
	// 查询是否投过相同投票项
	$sql = "select *from $tbname where openid='".$openid."' and touid='".$touid."'";
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
	if($row){
		echo 'rep';
		exit;
	}

	// 查询是否已经投过8次
	$sql2 = "select *from $tbname where openid='".$openid."'";
	$query2 = mysql_query($sql2);
	$row2   = mysql_num_rows($query2);
	if($row2==8){
		echo 'm';
		exit;
	}else if($row2==7) {
		$time = date('Y-m-d');
		$sql="INSERT INTO $tbname(touid,openid,time) VALUES('{$touid}','{$openid}','{$time}')";
		$query = mysql_query($sql);
		if($query){
		echo 'tc';
		}else{
			echo -2;
		}
		exit;
	}
	



	$time = date('Y-m-d');
	$sql="INSERT INTO $tbname(touid,openid,time) VALUES('{$touid}','{$openid}','{$time}')";
	$query = mysql_query($sql);
			if($query){
			echo 'ok';
	}else{
		echo -2;
	}
?>