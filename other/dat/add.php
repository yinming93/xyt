<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';		
	$tel   = addslashes($_POST['tel']);
	$name = addslashes($_POST['name']);	
	$answer = addslashes($_POST['answer']);	
	$answer2 = addslashes($_POST['answer2']);	
	$answer3 = addslashes($_POST['answer3']);	
	$answer4 = addslashes($_POST['answer4']);	
	$answer5 = addslashes($_POST['answer5']);	
	$sql="select * from $tbname where tel='".$tel."'";
	
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
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
	//统计人数
	// $sq = "select * from $tbname";
	// $qu = mysql_query($sq);
	// $qq = mysql_num_rows($qu);
	// if($qq>29){
	// 	echo "m";exit;
	// }

	$time = date('Y-m-d H:i:s');
	$sql="INSERT INTO $tbname(tel,answer,answer2,answer3,answer4,answer5,time) VALUES('{$tel}','{$answer}','{$answer2}','{$answer3}','{$answer4}','{$answer5}','{$time}')";
	// echo $sql;exit;
	$query = mysql_query($sql);
	if($query){
		echo 'ok';
	}else{
		echo 'sb';
	}
?>