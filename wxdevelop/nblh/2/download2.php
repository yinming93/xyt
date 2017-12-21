<?php

//下载数据库图片

	//不存在就建立目录
function mkdirs($path , $mode = "0755") {  
  if (!is_dir($path)) { // 判断目录是否存在  
      mkdirs(dirname($path), $mode); // 循环建立目录   
    mkdir($path, $mode); // 建立目录  
  }  
  return true;  
 
}

function getImage( $url,$filename,$path="img" ){
	//远程
	$ch=curl_init();
    $timeout=1;
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
    $img=curl_exec($ch);
    curl_close($ch);
   
    //拼接图片目录
    mkdirs($path, $mode = "0755");
    $newName = "./".$path."/".$filename;
   
    //本地
    $fp=@fopen($newName,'a');
    fwrite($fp,$img);
    fclose($fp);
    return $newName;
}



/*步骤：

1循环读取数据库
2下载图片
3压力测试 -- 1000条数据 -- wifi下载

4从某个特定id下载

5测试 php fopen()和file_get_contents() 区别介绍 
http://www.cnblogs.com/echohao/p/5372056.html


链接地址
http://szxytang.com/weixianchang/3d2/download2.php


*/

include 'db.php';

//表名
//$tbname = "20170112zhongnan";

//可以分序号段下载
$startId = 100;//初始id
$endId   = 700;//结束id

//$sql = "select * from 20170112zhongnan order by time ASC";//升序
$sql = "select * from $tbname where id>=$startId and id<=$endId";

$query=mysql_query($sql);

$a=0;
while( $res = mysql_fetch_assoc($query) ){
	//解码
	$nickname=base64_decode( $res["nickname"] );
	
//=====================================================	
	echo ++$a." ".$nickname;
	echo "<br >";
//=====================================================
	//
	if($nickname==""){
		$nickname="未知";
	}
	getImage( $res["headimgurl"], $nickname.".jpg" );
}


echo "<br />";
echo "总人数 ".$a;



