<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';		
	$tel   = addslashes($_POST['tel']);
	$name = addslashes($_POST['name']);	
	$sex = addslashes($_POST['sex']);	
	$sql="select * from $tbname where tel='".$tel."'";
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);


	echo "m";exit;
	// 检查信息是否填写完整
	foreach ($_POST as $k => $v) {
		if(!$v){
			echo 'wan';exit; 
		}
	}
	if(!is_numeric($tel) || strlen($tel)!=11 || !preg_match('/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/', $tel)){
		echo 'tel';exit;
	}	
	if($row){
		echo 'chong';
		exit;
	}
	// 统计人数
	// $sq = "select * from $tbname";
	// $qu = mysql_query($sq);
	// $qq = mysql_num_rows($qu);
	// if($qq>49){
	// 	echo "m";exit;
	// }
	if ($sex=='28'){
		// 统计5月28人数
		$sq = "select * from $tbname where sex='28'";
		$qu = mysql_query($sq);
		$qq = mysql_num_rows($qu);
		if($qq>99){
			echo "m";exit;
		}
	}else if($sex=='29'){
		// 统计5月29人数
		$sq2 = "select * from $tbname where sex='29'";
		$qu2 = mysql_query($sq2);
		$qq2 = mysql_num_rows($qu2);
		if($qq2>99){
			echo "m";exit;
		}
	}else{
		// 统计5月30人数
		$sq3 = "select * from $tbname where sex='30'";
		$qu3 = mysql_query($sq3);
		$qq3 = mysql_num_rows($qu3);
		if($qq3>99){
			echo "m";exit;
		}
	}
	


	$time = date('Y-m-d H:i:s');
	$sql="INSERT INTO $tbname(name,tel,sex,time) VALUES('{$name}','{$tel}','{$sex}','{$time}')";
	// echo $sql;exit;
	$query = mysql_query($sql);
	if($query){
		echo 'ok';
	}else{
		echo 'sb';
	}
?>