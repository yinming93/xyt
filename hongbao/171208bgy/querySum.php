<?php

/*
查询红包-openid总数

查询链接：
http://szxytang.com/test/money3/querySum.php

*/
header("Content-type: text/html; charset=utf-8");
//数据库配置文件	
	include '1/model.php';
	$modeShzn1 = new Model('0721zzyss1');
	$modeShzn2 = new Model('0721zzyss2');
	$modeShzn3 = new Model('0721zzyss3');
	
//查询总条数
	$total1=$modeShzn1->__call('count');
	$total2=$modeShzn2->__call('count');
	$total3=$modeShzn3->__call('count');
	
	
	
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>0721紫竹云山墅 抢红包! </title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
</head>
<body>		
<style>

body{
	font-size: 18px;
	font-family:Helvetica;
	font-family:"Times New Roman",Georgia,Serif;
}

</style>
<?php
	echo "第1轮 -- 查询总数：".$total1;
	echo "<br />";
	echo "第2轮 -- 查询总数：".$total2;
	echo "<br />";
	echo "第3轮 -- 查询总数：".$total3;
?>

</body>		
</html>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	