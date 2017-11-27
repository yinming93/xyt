<?php
header("Content-Type:text/html;charset=utf-8");
include 'db.php';
$code=base64_decode($_POST['rsCount']);
$tel=$_POST['tel'];
$uname=$_POST['name'];
setcookie('tel',$tel,time()+3600000);
if(strlen($code)>10||strlen($uname)>12||strlen($tel)>13){
	exit;
}
	$sql="select * from $tbname where tel='".$tel."'";
	//echo $sql;
	$query=mysql_query($sql);
	$row=mysql_fetch_assoc($query);
	//var_dump($row);

	if($row){
		if($row['code']<$code){
			$sql="update $tbname set code='".$code."'where tel='".$tel."'";
			$query=mysql_query($sql);
			if($query){
				echo "<script charset='utf-8'>";
				echo "alert('更新成功！');window.location.href='sel.php'";
				echo "</script>";
			}
		}else{
				echo "<script charset='utf-8'>";
				echo "alert('您的分数比之前的小！');window.location.href='sel.php'";
				echo "</script>";
		}
		
	}else{
		$time=date('Y-m-d H:i:s');
		$sql="insert into $tbname(uname,tel,code,time)values('".$uname."','".$tel."','".$code."','".$time."')";
		//echo $sql;
		$query=mysql_query($sql);
		//var_dump($query);
		if($query){           
			echo "<script charset='utf-8'>";
			echo "alert('填写成功');window.location.href='sel.php'";
			echo "</script>";
		}
	}

?>