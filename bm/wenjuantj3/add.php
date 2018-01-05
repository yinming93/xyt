<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	$openid = addslashes($_POST['openid']);			
	$name = addslashes($_POST['name']);			
	$tel= addslashes($_POST['tel']);			
	// $a1= addslashes($_POST['fruit']);	

		$t = date('Y-m-d');
        $query=mysql_query("select *from $tbname where openid='$openid' and time='".$t."'");
        $row=mysql_fetch_array($query);
        if ($row){
			echo 22;
			exit;
		 }

	$ho = $_POST['fruit'];	
	$a1= $ho['0'];
	$a2= $ho['1'];
	$a3= $ho['2'];
	$a4= $ho['3'];
	$a5= $ho['4'];
	$a6= $ho['5'];
	$a7= $ho['6'];
	$a8= $ho['7'];
	$a9= $ho['8'];
	$a10= $ho['9'];

	if (!$a1) {
		echo 3;
		exit;
	}
	if (!$a2) {
		$a2=0;
	}
	if (!$a3) {
		$a3=0;
	}
	if (!$a4) {
		$a4=0;
	}
	if (!$a5) {
		$a5=0;
	}
	if (!$a6) {
		$a6=0;
	}
	if (!$a7) {
		$a7=0;
	}
	if (!$a8) {
		$a8=0;
	}
	if (!$a9) {
		$a9=0;
	}
	if (!$a10) {
		$a10=0;
	}
	// exit;
	// $ho = implode(',', $ho);

	foreach ($_POST as $k => $v){
		if(!$v){
			echo -1;exit; 
		}
	}
	if(!is_numeric($tel) || strlen($tel)!=11 || !preg_match('/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/', $tel)){
		echo 'tel';exit;
	}	
	$time = date('Y-m-d');
	$sql="INSERT INTO $tbname(openid,name,tel,a1,a2,a3,a4,a5,a6,a7,a8,a9,a10,time) VALUES('{$openid}','{$name}','{$tel}','{$a1}','{$a2}','{$a3}','{$a4}','{$a5}','{$a6}','{$a7}','{$a8}','{$a9}','{$a10}','{$time}')";
	$query = mysql_query($sql);
			if($query){
			echo 'ok';
	}else{
		echo -2;
	}