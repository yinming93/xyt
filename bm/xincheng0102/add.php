<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';		
	$p1 = addslashes($_POST['p1']);
	$p2 = addslashes($_POST['p2']);
	$p3 = addslashes($_POST['p3']);	
	$p4 = addslashes($_POST['p4']);	
	$p5 = addslashes($_POST['p5']);	
	$p6 = addslashes($_POST['p6']);	
	$p7 = addslashes($_POST['p7']);	
	$p8 = addslashes($_POST['p8']);	
	$p9 = addslashes($_POST['p9']);	
	$p10 = addslashes($_POST['p10']);	
	$p11 = addslashes($_POST['p11']);	
	$p12 = addslashes($_POST['p12']);	
	$p13 = addslashes($_POST['p13']);	
	$p14 = addslashes($_POST['p14']);	
	$p15 = addslashes($_POST['p15']);	
	$p16 = addslashes($_POST['p16']);	
	$p17 = addslashes($_POST['p17']);	
	$p18 = addslashes($_POST['p18']);	
	$p19 = addslashes($_POST['p19']);	
	$p20 = addslashes($_POST['p20']);	
	$p21 = addslashes($_POST['p21']);	
	$p22 = addslashes($_POST['p22']);	
	$p23 = addslashes($_POST['p23']);	
	
	$openid = addslashes($_POST['openid']);	
	$sql="select * from $tbname where openid='".$openid."'";
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
	// 检查信息是否填写完整
	foreach ($_POST as $k => $v) {
		if(!$v){
			echo 'wan';exit; 
		}
	}
	if(!is_numeric($p5) || strlen($p5)!=11 || !preg_match('/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/', $p5)){
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

	$time = date('Y-m-d H:i:s');
	$sql="INSERT INTO $tbname(openid,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20,p21,p22,p23,time) VALUES('{$openid}','{$p1}','{$p2}','{$p3}','{$p4}','{$p5}','{$p6}','{$p7}','{$p8}','{$p9}','{$p10}','{$p11}','{$p12}','{$p13}','{$p14}','{$p15}','{$p16}','{$p17}','{$p18}','{$p19}','{$p20}','{$p21}','{$p22}','{$p23}','{$time}')";
	// echo $sql;exit;
	$query = mysql_query($sql);
	if($query){
		echo 'ok';
	}else{
		echo 'sb';
	}
?>