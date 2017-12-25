<?php

/*
查询红包-openid总数

查询链接：
http://szxytang.com/test/money3/querySum.php

*/
header("Content-type: text/html; charset=utf-8");
//数据库配置文件	
	include 'model.php';
	$modeShzn = new Model('greencity');
	
//查询总条数
	$total=$modeShzn->__call('count');
	
	echo "查询总数：".$total;
	
	echo "<br >";



//echo $res = mysql_query("Select Sum(sum) from greencity1");
	
	$res=$modeShzn->select();
	foreach($res as $v){
		$num += intval( $v["sum"] ); 
	}
	
	echo $num;
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	