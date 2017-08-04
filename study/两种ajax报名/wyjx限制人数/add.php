<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
				
	$tel   = addslashes($_POST['tel']);
	$name = addslashes($_POST['name']);	
	$sex = addslashes($_POST['sex']);	
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
		echo 'rep';
		exit;
	}

	if ($sex=='男'){
	//统计男生人数
	$sq = "select * from $tbname where sex='男'";
	$qu = mysql_query($sq);
	$qq = mysql_num_rows($qu);

	if($qq>20){
			echo "m";exit;
	}
	
	$time = date('Y-m-d H:i:s');
	$sql="INSERT INTO $tbname(name,sex,tel,time) VALUES('{$name}','{$sex}','{$tel}','{$time}')";
	$query = mysql_query($sql);
			if($query){
			echo 'ok';
	}else{
		echo -2;
	}
	}elseif ($sex=='女') {
	//统计女生人数
	$sq1 = "select * from $tbname where sex='女'";
	$qu1 = mysql_query($sq1);
	$qq1 = mysql_num_rows($qu1);

	if($qq1>20){
			echo "w";exit;
	}
	$time = date('Y-m-d H:i:s');
	$sql="INSERT INTO $tbname(name,sex,tel,time) VALUES('{$name}','{$sex}','{$tel}','{$time}')";
	$query = mysql_query($sql);
			if($query){
			echo 'ok';
	}else{
		echo -2;
	}
}
?>