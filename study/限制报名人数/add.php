<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
				
	$tel   = addslashes($_POST['tel']);
	$name = addslashes($_POST['name']);
	$code =addslashes($_POST['code']);
	//$md    = addslashes($_POST['md']);
	//var_dump($bast);
	$sql="select * from $tbname where tel='".$tel."'";

	// var_dump($sql);
	// exit;
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
// var_dump($query);
// exit;
	foreach ($_POST as $k => $v) {
		if(!$v){
			echo -1;exit; 
		}
	}
	// if($row){
	// 	echo "<script>";
	// 	echo "alert('亲，您已经提交过啦！');window.location.href='index.php'";
	// 	echo "</script>";
	// 	exit;
	// }
if($row){

	//  echo $row['code'];
	// exit;
		if($row['code']<$code){

			$sql="update $tbname set code='".$code."' where tel='".$tel."'";
			
			$query=mysql_query($sql);
			// var_dump($query);
			// exit;
			


			if($query){
					// $data['info']="刷新成绩！";
					// //$data['sel']=1;
					// echo json_encode($data);
					// exit;
// echo "wwwwww";
// exit;
				// echo "<script>";
				// echo "alert('更上一层楼');";
				// echo "window.location.href='index.php'";
				// echo "</script>";
				echo "ok";
				exit;

			}
		}else{
			// 				echo "aaaaaa";
			// exit;
				// echo "<script>";
				// echo "alert('继续努力');";
				// echo "window.location.href='index.php'";
				// echo "</script>";
			echo "ok1";
				exit;
		}

}	

//统计人数
$sq = "select * from $tbname";
$qu = mysql_query($sq);
$qq = mysql_num_rows($qu);

if($qq>19){
	echo "m";exit;
}
//if(empty($query)){
		//插入数据
	$time = date('Y-m-d H:i:s');
	$sql = "insert into $tbname(name,tel,code,time) values('".$name."','".$tel."','".$code."','".$time."')";
	// echo $sql;
	// exit;
	$query = mysql_query($sql);


if($query){
		// echo "<script>";
		// echo "alert('填写成功！');window.location.href='index.php'";
		// echo "</script>";
	echo "ss";
	}else{
		// echo "<script>";
		// echo "window.location.href='index.php'";
		// echo "</script>";
		echo "dd";
	}

//
	
// 	//插入数据
// 	$time = date('Y-m-d H:i:s');
// 	$sql = "insert into $tbname1(uname,tel,time) values('".$uname."','".$tel."','".$time."')";
// 	//echo $sql;
// 	$query = mysql_query($sql);
	
// 	//var_dump($sql);
// //exit;	
// 	if($query){
// 		echo "<script>";
// 		echo "alert('填写成功！');window.location.href='index.php'";
// 		echo "</script>";
// 	}

	
?>