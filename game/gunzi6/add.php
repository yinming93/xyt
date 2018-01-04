<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	session_start();	

	$tel   = addslashes($_POST['tel']);
	$name = addslashes($_POST['name']);
	$qq = addslashes($_POST['qq']);
	$openid = addslashes($_POST['openid']);
	$code =$_COOKIE['code'];
	//$md    = addslashes($_POST['md']);
	//var_dump($bast);
	$sql="select * from $tbname where openid='".$openid."'";

	
	$query = mysql_query($sql);
	$row   = mysql_fetch_assoc($query);
// var_dump($query);
// exit;
	if (!$_SESSION['token']) {
	echo "<script>";
	echo "alert('错误访问！');";
	echo "</script>";
	die;
	}
	if (!$tel) {
	echo "<script>";
	echo "alert('请完善信息！');";
	echo "</script>";
	die;
	}
	if (!$name) {
	echo "<script>";
	echo "alert('请完善信息！');";
	echo "</script>";
	die;
	}
	if (!$code) {
	echo "<script>";
	echo "alert('请完善信息！');";
	echo "</script>";
	die;
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

			$sql="update $tbname set code='".$code."' where openid='".$openid."'";
			
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
				echo "<script>";
				echo "alert('恭喜刷新成绩！');";
				echo "window.location.href='http://xytang88.com/yin/youxi/gunzi6/sel.php'";
				echo "</script>";
				exit;

			}
		}else{
			// 				echo "aaaaaa";
			// exit;
				echo "<script>";
				echo "alert('继续努力');";
				echo "window.location.href='http://xytang88.com/yin/youxi/gunzi6/sel.php'";
				echo "</script>";
				exit;
		}

}	

//if(empty($query)){
		//插入数据
	$time = date('Y-m-d H:i:s');
	$sql = "insert into $tbname(name,tel,code,qq,openid,time) values('".$name."','".$tel."','".$code."','".$qq."','".$openid."','".$time."')";
	// echo $sql;
	// exit;
	$query = mysql_query($sql);


if($query){
		setcookie('tel',$tel,time()+7200000);
		echo "<script>";
		echo "alert('提交成功！');window.location.href='sel.php'";
		echo "</script>";
	}else{
		echo "<script>";
		echo "window.location.href='sel.php'";
		echo "</script>";
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