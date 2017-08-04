<?php
	header("content-Type: text/html; charset=Utf-8"); 
	date_default_timezone_set("Asia/Shanghai");
	include 'db.php';
	    // $id=intval(mysql_real_escape_string($_POST['id']));
		$ip=$_SERVER['REMOTE_ADDR'];
		$openid=addslashes($_POST['openid']);
	// 	$sql="select * from $tbname where id=$id";
	// 	$query=mysql_query($sql);
	// 	$rows=mysql_fetch_assoc($query);
	// 	$sql2="select * from $tbname1 where tid=$id and openid='{$openid}'";
	// 	$query2=mysql_query($sql2);
	// 	$rows2=mysql_fetch_assoc($query2);
		$time=date("Y-m-d H:i:s");
	// 	$ps=$rows['ps'];
	// 		if ($rows2) {

	// 			if($rows2['state']==0){
	// 				$ps++;
	// 				$sqla="UPDATE $tbname SET ps =".$ps." WHERE id =$id";
	// 				$sqlb="UPDATE $tbname1 SET state=1 where tid=$id and openid='{$openid}'";
	// 				$querya=mysql_query($sqla);
	// 				$queryb=mysql_query($sqlb);
	// 					if($querya){
	// 					echo $ps;die;
	// 					}else{
	// 						echo 'a';die;
	// 					}
	// 			}else{
	// 				$ps--;
	// 				$sqla="UPDATE $tbname SET ps =".$ps." WHERE id =$id";
	// 				$sqlb1="UPDATE $tbname1 SET state=0 where tid=$id and openid='{$openid}'";
	// 				$querya=mysql_query($sqla);
	// 				$queryb1=mysql_query($sqlb1);
	// 				if($querya){
	// 				echo -$ps;die;
	// 				}else{
	// 						echo 'a';die;
	// 				}
	// 	}
	// }else{
	// 		$ps++;
	// 		$sqla="UPDATE $tbname SET ps =".$ps." WHERE id =$id";
	// 		$sqlb="INSERT INTO $tbname1(tid,openid,ip,time,state) VALUES('{$id}','{$openid}','{$ip}','{$time}','1')";

	// 		$querya=mysql_query($sqla);
	// 		$queryb=mysql_query($sqlb);
	// 			if($querya){
	// 				echo $ps;die;
	// 				}else{
	// 					echo 'a';die;
	// 				}
	// 	}
	$qday=addslashes($_POST['qday']);
	$nickname=addslashes($_POST['nickname']);
	if ($openid=='aa' || $nickname=='bb') {
		echo -3;exit;
	}
	$sql="select * from $tbname where openid='{$openid}' and qday={$qday}";
	$query=mysql_query($sql);
	$rows=mysql_fetch_assoc($query);
	if(!$rows){
	if(date("j")==$qday){
			$sql1="INSERT INTO $tbname(nickname,openid,qday,ip,time) VALUES('{$nickname}','{$openid}','{$qday}','{$ip}','{$time}')";
			$query1=mysql_query($sql1);
				if($query1){
					echo 1;die;
					}else{
						echo -1;die;
					}
	}else{
		echo 0;
	}
}else{
	echo -2;
}
?>
