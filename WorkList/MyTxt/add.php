<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';	
	$a = $_GET['a'];


	switch($a){
    case 'xyt': 
    $pro   = addslashes($_POST['pro']);
    $price   = addslashes($_POST['price']);
    $over   = addslashes($_POST['over']);
	$link = addslashes($_POST['link']);	
	$editor = addslashes($_POST['editor']);	
	$level = '1';
	// 检查信息是否填写完整
	// foreach ($_POST as $k => $v) {
	// 	if(!$v){
	// 		echo 'wan';exit; 
	// 	}
	// }
	$time = date('Y-m-d H:i:s');
	$sql="INSERT INTO $tbname(project,link,editor,level,time,price,over) VALUES('{$pro}','{$link}','{$editor}','1','{$time}','{$price}','{$over}')";
	// echo $sql;exit;
	$query = mysql_query($sql);
	if($query){
		echo 'ok';
	}else{
		echo 'sb';
	}  
    mysql_close();}


    switch($a){
    case 'mc': 
    $pro   = addslashes($_POST['pro2']);
	$link = addslashes($_POST['link2']);	
	$editor = addslashes($_POST['editor2']);	
	$level = '2';
	// 检查信息是否填写完整
	// foreach ($_POST as $k => $v) {
	// 	if(!$v){
	// 		echo 'wan';exit; 
	// 	}
	// }
	$time = date('Y-m-d H:i:s');
	$sql="INSERT INTO $tbname(project,link,editor,level,time) VALUES('{$pro}','{$link}','{$editor}','2','{$time}')";
	// echo $sql;exit;
	$query = mysql_query($sql);
	if($query){
		echo 'ok';
	}else{
		echo 'sb';
	}  
    mysql_close();}

	
?>