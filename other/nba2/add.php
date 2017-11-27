<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';

	$a = $_GET['a'];
    switch($a){
    case 'first': 

	$name = addslashes($_POST['name']);
	// $name= urldecode($na);		
	$time = 999999;
	$sql="select * from $tbname where name='".$name."'";
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
	if(!$name){
		echo -1;exit; 
	}
	if(is_numeric($name) || strlen($name)<4 || strlen($name)>18){
		echo 'name';exit;
	}
	// 判断是否玩过
	if($row){
		$nama= urlencode($name);
		setcookie('name',$nama,time()+360000);
		echo "ok";	
	}else{
		$sql="INSERT INTO $tbname(name,time) VALUES('{$name}','{$time}')";
		$query = mysql_query($sql);
		if($query){
		$nama= urlencode($name);
		setcookie('name',$nama,time()+360000);
		echo 'ok';
		}else{
			echo -2;
		}
	}

	

	}


	switch($a){
    case 'second': 
    $nam=$_COOKIE['name'];
	$name= urldecode($nam);		
    $time = addslashes($_POST['ttt']);
    // echo $name;exit;
    $sql="select * from $tbname where name='".$name."'";
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
    if($row['time']>$time){
			$sql="update $tbname set time='".$time."'where name='".$name."'";
			$query=mysql_query($sql);
			if($query){
				echo "ok";
			}
		}else{
				echo "ok";
		}	

	}
?>