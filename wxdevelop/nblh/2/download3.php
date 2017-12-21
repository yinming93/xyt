<?php
/*


*/

function get_file($url, $folder = "./"){  
  set_time_limit (24 * 60 * 60);       // 设置超时时间  
 // $destination_folder = $folder . '/'; // 文件下载保存目录，默认为当前文件目录  
  $destination_folder = $folder; // 文件下载保存目录，默认为当前文件目录  
  if(!is_dir($destination_folder)){    // 判断目录是否存在  
      mkdirs($destination_folder);     // 如果没有就建立目录  
  }  
  $newfname = $destination_folder . basename($url); // 取得文件的名称  
  $file = fopen ($url, "rb");          // 远程下载文件，二进制模式  
  if($file){ // 如果下载成功  
        $newf = fopen ($newfname, "wb"); // 远在文件文件  
        if($newf) // 如果文件保存成功  
           while (!feof($file)) { // 判断附件写入是否完整  
           fwrite($newf, fread($file, 1024 * 8), 1024 * 8); // 没有写完就继续  
        }  
  }  
  
  if ($file) {  
    fclose($file); // 关闭远程文件  
  }  
  
  if ($newf) {  
    fclose($newf); // 关闭本地文件  
  }  
  return true;  
}  

function mkdirs($path , $mode = "0755") {  
  if (!is_dir($path)) { // 判断目录是否存在  
      mkdirs(dirname($path), $mode); // 循环建立目录   
    mkdir($path, $mode); // 建立目录  
  }  
  return true;  
 
}
 
//========================================================================== 
 
  
// 使用示例  
//var_dump( get_file('http://images2015.cnblogs.com/news/24442/201610/24442-20161031104644908-57254170.png') );  
 
include 'db.php';

//表名
//$tbname = "bgybmbm1";

//可以分序号段下载
$startId = 87;//初始id
$endId   = 131;//结束id

//$sql = "select * from bgybmbm1 order by time ASC";//升序
$sql = "select * from $tbname where id>=$startId and id<=$endId";
$query=mysql_query($sql);


while($res = mysql_fetch_assoc($query)){
	if($res["nickname"]==""){
		$res["nickname"]="未知";
	}
	get_file( $res["headimgurl"],$res["nickname"].".jpg");
}


 
 
 
 
 
 
 
 
 
 
 
 