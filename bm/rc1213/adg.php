<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';		
	
	
	// 统计人数

		$sq1 = "select sum(`age`) from $tbname where pro=1";
		$qu1 = mysql_query($sq1);
		$qq1 = mysql_fetch_row($qu1);
        $qqq1 = $qq1[0];
		echo $qqq1;
	
	