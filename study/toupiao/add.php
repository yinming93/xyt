<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'DBCon.php';
	
	$id   = addslashes($_POST['id']);
	$openid = addslashes($_POST['openid']);
	$state   = addslashes($_POST['state']);
	
	
	$sql="select * from $tbname1 where Openid='".$openid."'";
	$query=mysql_query($sql);
	$row=mysql_fetch_assoc($query);
	
	
	
	if($row){
		if($state=='fst'){
			$sql="update $tbname1 set Profst=".$id." where Openid='".$openid."'";
			$query=mysql_query($sql);
			if($query){
				
				$sql="select * from $tbname where ID=".$id."";
				$query=mysql_query($sql);
				$row=mysql_fetch_assoc($query);
					
				
				if($row){
					$sql="update $tbname set Number=Number+1 where ID=".$id."";
					$query=mysql_query($sql);
					if($query){
						echo "ok";
						exit;
					}else{
						echo "error";
						exit;
					}	
				}else{
					echo "error";
					exit;
				}
				
			}else{
				echo 'error';
				exit;
			}
			
			
		}else{
			$sql="update $tbname1 set Prosec=".$id." where Openid='".$openid."'";
			$query=mysql_query($sql);
			
			if($query){
				
				$sql="select * from $tbname where ID=".$id."";
				$query=mysql_query($sql);
				$row=mysql_fetch_assoc($query);
					
				
				if($row){
					$sql="update $tbname set Number=Number+1 where ID=".$id."";
					$query=mysql_query($sql);
					if($query){
						echo "ok";
						exit;
					}else{
						echo "error";
						exit;
					}	
				}else{
					echo "error";
					exit;
				}
				
			}else{
				echo 'error';
				exit;
			}
		}
		
	}else{
		echo 'error';	
		exit;
	}
	
	
	
	
	
	
	
	
	
	$sql="select * from $tbname1 where ID='".$id."'";
	$query=mysql_query($sql);
	$row=mysql_fetch_assoc($query);
		
	
	if($row){
		$sql="update $tbname1 set Number=Number+1 where ID=".$id."";
		$query=mysql_query($sql);
		if($query){
			$sql="insert into $tbname(Openid,Time) values('".$openid."',now())";
			$query=mysql_query($sql);
			if($query){
				echo "ok";
			}else{
				echo "error";
			}
		}else{
			echo "error";
		}	
	}else{
		echo "error";
	}

?>