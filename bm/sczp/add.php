<?php
header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	include 'function.php';
	// $a = $_GET['a'];	
	// switch($a){
 //        case 'add':
       $jtel = $_POST['jtel'];  
    $sql="select * from $tbname where jtel='".$jtel."'";
    $query = mysql_query($sql);
    $row   = mysql_fetch_assoc($query);
    if($row){
            echo "<script>";
            echo "alert('您已经上传过啦!');";
            echo "window.location.href='index.php';";
            echo "</script>";
        exit;
    }
    //提交订单的数据
    	$name= $_POST['name'];
     //    $age= $_POST['age'];
    	// $sex= $_POST['sex'];
    	// $caiyi= $_POST['caiyi'];
        $jtel = $_POST['jtel'];
        $zpm = $_POST['zpm'];
        $miaoshu = $_POST['miaoshu'];
        // $jname= $_POST['jname'];
        // $job= $_POST['job'];
        $filename = upload('myfile','./uploads');
        // echo $filename;
        // exit;
        foreach ($_POST as $k => $v) {
        if(!$v){
            echo "<script>";
            echo "alert('信息不完整！');";
            echo "window.location.href='index.php';";
            echo "</script>";
            exit; 
        }
    }
        $time = date('Y-m-d H:i:s');
       $sql="insert into $tbname(name,filename,jtel,zpm,miaoshu,time) values('".$name."','".$filename."','".$jtel."','".$zpm."','".$miaoshu."','".$time."')";
        // var_dump($sql);
        //  exit;

         //    if(execute($sql)){
         //        success('<h1 style="font-size:30px;">报名成功</h1>');
         //    }else{
         //        error('<h2>报名失败</h2>');
         //    }
         // break;
        $query=mysql_query($sql);
        if ($query) {
            echo "<script>";
            echo "alert('恭喜你上传成功哦!');";
            echo "window.location.href='index.php';";
            echo "</script>";
            
        }else{
            echo "<script>";
            echo "alert('你报名失败了再试一遍!');";
            echo "window.location.href='index.php';";
            echo "</script>";
         }
         break;
        // }
          
    // 8 关闭数据库
    mysql_close();
?>