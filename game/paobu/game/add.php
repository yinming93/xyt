<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'DBCon.php';
	
	$tel   = addslashes($_POST['zc_tel1']);
	$uname = addslashes($_POST['zc_name1']);
	$code = addslashes($_POST['code']);

				
	
if(strlen($uname)>12||strlen($tel)>13){
	exit;
}
	$sql="select * from $tbname where Phone='".$tel."'";
	//echo $sql;
	$query=mysql_query($sql);
	$row=mysql_fetch_assoc($query);
	//var_dump($row);
		
	
	if($row){
		if($row['Code']<=$code){
			$sql="update $tbname set Code='".$code."', Name='".$uname."' where Phone='".$tel."'";
			$query=mysql_query($sql);
			if($query){
				echo "<script charset='utf-8'>";
				echo "	alert('您已成功提交信息！');window.location.href='rank.php';";
				echo "</script>";
			 }
			
		}else{
			echo "<script charset='utf-8'>";
			echo "	alert('您已成功提交信息！');window.location.href='rank.php';";
			echo "</script>";
		}
	}else{
		
			$sql="insert into $tbname(Name,Phone,Code,Time) values('".$uname."','".$tel."','".$code."',now())";	
			$query=mysql_query($sql);
			if($query){
				echo "<script charset='utf-8'>";
				echo "	alert('您已成功提交信息！');window.location.href='rank.php';";
				echo "</script>";
			 }
	
	}

?>