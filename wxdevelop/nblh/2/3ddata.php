<?php

include 'db.php';
$sql = "select * from $tbname order by time DESC";
$query=mysql_query($sql);

while($res = mysql_fetch_assoc($query)){
	
	if( $res["openid"]=="" || $res["nickname"]=="" || $res["headimgurl"]=="" ){
		continue;
	}
	
	$line.=' ';
	$line.=$res["openid"];
	$line.="|";
	$line.=base64_decode($res["nickname"]);
	$line.="|";
	$line.=$res["headimgurl"];
	$line.="|";
	$line.=date('H:i:s',$res["time"]);
	$line.=' ';
}

echo $line;










