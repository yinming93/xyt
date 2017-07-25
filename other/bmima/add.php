<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
				
	$openid = addslashes($_POST['openid']);
	$m1 = addslashes($_POST['m5']);

	$sql="select * from $tbname where openid='".$openid."'";
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
	foreach ($_POST as $k => $v) {
		if(!$v){
			echo -1;exit; 
		}
	}
	if ($m1!='城市山水梦居西溪') {
		echo "cuo";exit;
	}
	if($row){
		echo 'rep';
		exit;
	}
	$time = date('Y-m-d H:i:s');
	$sql="INSERT INTO $tbname(openid,time) VALUES('{$openid}','{$time}')";
	$query = mysql_query($sql);
			if($query){
			echo 'ok';
	}else{
		echo -2;
	}
?>