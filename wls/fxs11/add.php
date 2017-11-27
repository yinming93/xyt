<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	$sq = "select * from $tbname";
	$qu = mysql_query($sq);
	$nu = mysql_num_rows($qu);
	$nua=$nu+1;
	$nnn=$nua+100;
	$nnna=$nnn-1;
	?>
<span id="ja" style="width:80%;height:50px;position:absolute;top:48%;left:10%;text-align:center;font-size:30px;background:transparent;border:0;"><?php echo $nnna ?></span>