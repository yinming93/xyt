<?php
header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	// include 'function.php';
	// $a = $_GET['a'];	
	// switch($a){
 //        case 'add':
    // $src = $_COOKIE['src'];
    $openid = $_POST['openid']; 
    $src = $_POST['base'];  
    foreach ($_POST as $k => $v) {
            if(!$v){
                echo "<script>";
                echo "alert('上传失败了再试一遍!');";
                echo "</script>";
               exit; 
            }
        }
    // if($row){
    //         echo "<script>";
    //         echo "alert('您已经上传过啦!');";
    //         echo "window.location.href='index.php';";
    //         echo "</script>";
    //     exit;
    // }
    //提交订单的数据
    	// $openid= $_POST['openid'];
     //    $age= $_POST['age'];
    	// $sex= $_POST['sex'];
    	// $caiyi= $_POST['caiyi'];
        // $jtel = $_POST['jtel'];
        // $jname= $_POST['jname'];
        // $job= $_POST['job'];
        
        // echo $filename;
        // exit;
        $time = date('Y-m-d H:i:s');
        $sql="insert into $tbname(openid,filename,time) values('".$openid."','".$src."','".$time."')";
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
            $sql="select * from $tbname where filename='".$src."'";
            $query = mysql_query($sql);
            $row   = mysql_fetch_assoc($query);
            $id = $row['id'];

            echo "<script>";
            // echo "alert('恭喜你上传成功哦!');";
            echo "window.location.href='index1.php?id=$id';";
            echo "</script>";
            
        }else{
            echo "<script>";
            echo "alert('上传失败了再试一遍!');";
            echo "window.location.href='getcodeurl.php';";
            echo "</script>";
         }
         break;
        // }
          
    // 8 关闭数据库
    mysql_close();
?>