<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
				
	$tel   = addslashes($_POST['tel']);
	$name = addslashes($_POST['name']);		
	$tt = addslashes($_POST['ttt']);

	$sql="select * from $tbname where tel='".$tel."'";
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
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
		if($row['time']>$tt){
			$sql="update $tbname set time='".$tt."'where tel='".$tel."'";
			$query=mysql_query($sql);
			if ($query) {
				echo "shua";
				exit;
			}
			}else{
				echo "nu";
				exit;
			}
	}else{
		$sql="INSERT INTO $tbname(name,tel,time) VALUES('{$name}','{$tel}','{$tt}')";
		$query = mysql_query($sql);
				if($query){
				echo 'ok';
		}else{
			echo -2;
		}
	}
?>