<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	$openid = addslashes($_POST['openid']);			
	$name = addslashes($_POST['name']);			
	$tel= addslashes($_POST['tel']);			
	$ho = $_POST['fruit'];	
	$a1= $ho['0'];
	$a2= $ho['1'];
	$a3= $ho['2'];
	$a4= $ho['3'];
	$a5= $ho['4'];
	// exit;
	// $ho = implode(',', $ho);

	foreach ($_POST as $k => $v){
		if(!$v){
			echo -1;exit; 
		}
	}
	$time = date('Y-m-d H:i:s');
	$sql="INSERT INTO $tbname(openid,name,tel,a1,a2,a3,a4,a5,time) VALUES('{$openid}','{$name}','{$tel}','{$a1}','{$a2}','{$a3}','{$a4}','{$a5}','{$time}')";
	$query = mysql_query($sql);
			if($query){
			echo 'ok';
	}else{
		echo -2;
	}