<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
				
	$tel   = addslashes($_POST['tel']);
	$name = addslashes($_POST['name']);
	$dz = addslashes($_POST['dz']);
	$ff = $_COOKIE['code'];
	$sql="select * from $tbname where tel='".$tel."'";
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);

	// echo 99;exit;
	foreach ($_POST as $k => $v) {
		if(!$v){
			echo -1;exit; 
		}
	}
	
	if(!is_numeric($tel) || strlen($tel)!=11 || !preg_match('/1[34578]{1}\d{9}/', $tel)){
		echo 'tel';exit;
	}	
	if($row){
		if($row['code']<$ff){
			$time = date('Y-m-d H:i:s');
			$sql="update $tbname set code='".$ff."',time='".$time."'where tel='".$tel."'";
			
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
	$sql = "insert into $tbname(name,tel,time,code,dz) values('".$name."','".$tel."','".$time."','".$ff."','".$dz."')";
	//echo $sql;
	$query = mysql_query($sql);
	if($query){
			echo 'ok';
	}else{
		echo -2;
	}

	}
	
?>