<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
				
	$tel    = addslashes($_POST['tel']);
	$uname  = addslashes($_POST['username']);
	// $uname2 = addslashes($_POST['username2']);
	// $school = addslashes($_POST['school']);
	// $qm     = addslashes($_POST['qm']);
	// $date    = addslashes($_POST['date']);
	$ff = addslashes($_POST['code']);

	// var_dump($ff);
	//var_dump($bast);
	$sql="select * from $tbname1 where tel='".$tel."'";
	//echo $sql;
	
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
    //var_dump($row);

	if($row){
		if($row['code']<$ff){

			$sql="update $tbname1 set code='".$ff."' where tel='".$tel."'";
			
			$query=mysql_query($sql);

			if ($query) {
			echo "<script>";
			echo "alert('恭喜你刷新成绩！');window.location.href='sel.php'";
			echo "</script>";
			}
		}else{
			echo "<script>";
			echo "alert('继续努力刷新吧！');window.location.href='sel.php'";
			echo "</script>";
		}
	}else{

	
	//插入数据
	$time = date('Y-m-d H:i:s');
	$sql = "insert into $tbname1(uname,tel,time,code) values('".$uname."','".$tel."','".$time."','".$ff."')";
	//echo $sql;
	$query = mysql_query($sql);
	
	//var_dump($sql);
//exit;	
	
		echo "<script>";
		echo "alert('提交成功！');window.location.href='sel.php'";
		echo "</script>";
	}

	
?>