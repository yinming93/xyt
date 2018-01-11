<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'DBCon.php';
	
	$name = addslashes($_POST['name']);
	$tel = addslashes($_POST['tel']);
	$score = addslashes($_POST['score']);
	

	$sql="select * from $tbname where Phone='".$tel."'";
	$query=mysql_query($sql);
	$row=mysql_fetch_assoc($query);
	
	if($row){
		if((float)$row['Code']>(float)$score){
			$sql="update $tbname set Code='".$score."' ,Time=now() where Phone='".$tel."'";
			$query=mysql_query($sql);
			if($query){
				echo 'ok';
			}else{
				echo 'error';
			}
		}else{
			echo 'ok';
		}
	}else{
		$sql="insert into $tbname(Name,Phone,Code,Time) values('".$name."','".$tel."',".$score.",now())";	
		$query=mysql_query($sql);
		if($query){
			echo "ok";
		}else{
			echo "error";
		}
	}

?>