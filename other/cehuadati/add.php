<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	$a = $_GET['a'];
	switch($a){
    case 'add': 		
	$name = addslashes($_POST['name']);	
	$openid = addslashes($_POST['openid']);	
	$jdt = 0;
	$code = 0;
	$time = $_COOKIE['tt'];
	$sql="select * from $tbname where openid='".$openid."'";
	// echo $sql;exit;
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
	// 检查信息是否填写完整
	if(!$name){
		echo 'wan';exit; 
	}
	if($row['code']){
		echo 'chong';
		exit;
	}
	$sql="INSERT INTO $tbname(name,openid,code,jdt,time) VALUES('{$name}','{$openid}','{$code}','{$jdt}','{$time}')";
	// echo $sql;exit;
	$query = mysql_query($sql);
	if($query){
		echo 'ok';
	}else{
		echo 'sb';
	}
}

	switch($a){
    case 'update':
    $time = $_COOKIE['tt'];
    $openid = addslashes($_POST['openid2']);
    $sql="select * from $tbname where openid='".$openid."'";
    $o1 = addslashes($_POST['o1']);
    $o2 = addslashes($_POST['o2']);
    $o3 = addslashes($_POST['o3']);
    $o4 = addslashes($_POST['o4']);
    $o5 = addslashes($_POST['o5']);
    $o6 = addslashes($_POST['o6']);
    $o7 = addslashes($_POST['o7']);
    $o8 = addslashes($_POST['o8']);
    $o9 = addslashes($_POST['o9']);
    $o10 = addslashes($_POST['o10']);
    $o11 = addslashes($_POST['o11']);
    $ho = $_POST['ho'];	
    $o12 = implode(',', $ho);
    $o13 = addslashes($_POST['o13']);
    $o14 = addslashes($_POST['o14']);
    $o15 = addslashes($_POST['o15']);
	// echo $o12;
 //    exit;
    $jdt = addslashes($_POST['jdt']);
  	$cod=$o1+$o2+$o3+$o4+$o5+$o6+$o7+$o8+$o9+$o10+$o11+$o13+$o14+$o15;
  	$codd=$cod*6;
  	if($o12=='1,1'){
  		$code=$codd+6;
  	}else{
  		$code=$codd;
  	}
    // echo $code;
    // exit;
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
	// 检查信息是否填写完整
	// if($o1==null||$o2==null||$o3==null||$o4==null||$o5==null||$o6==null||$o7==null||$o8==null||$o9==null||$o10==null||$o11==null||$o12==null||$o13==null||$o14==null||$o15==null||!$jdt){
	// 	echo 'wan';exit; 
	// }

	if($row){
		$sql="update $tbname set code='".$code."',jdt='".$jdt."',time='".$time."' where openid='".$openid."'";
		$query = mysql_query($sql);
		if($query){
			echo 'ok';
		}else{
			echo 'sb';
		}
	  }
	}
?>