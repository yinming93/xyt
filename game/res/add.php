<?php
		
	header("Content-Type:text/html;charset=utf-8");
	include 'DBCon.php';
	
	$name = addslashes($_POST['name']);
	$tel = addslashes($_POST['tel']);
	$openid = addslashes($_POST['openid']);
	$headimgurl = addslashes($_POST['imgurl']);
	$nickname = addslashes($_POST['nick']);
	$rcode = addslashes($_POST['rcode']);

	


	 $sql="select * from $tbname where Openid='".$openid."'";
		$query = mysql_query($sql);
		$row   = mysql_fetch_assoc($query);
		
		if($row){
			if($row['Utime']>(int)$rcode){
				$sql="update $tbname set Utime='".$rcode."' , Time=now() where Openid='".$openid."'";
				$query = mysql_query($sql);
				if($query){
					echo 'ok'; 
				}else{
					echo 'error';
				}
			}else {
				echo 'ok'; 
			}
		}else{
			$sql="insert into $tbname (Openid,Name,Phone,Img,Nick,Utime,Time) values('".$openid."','".$name."','".$tel."','".$headimgurl."','".$nickname."','".$rcode."',now() )";
			$query = mysql_query($sql);
			if($query){
				echo 'ok';
			}else{
				echo 'error';
			}
		} 

?>
