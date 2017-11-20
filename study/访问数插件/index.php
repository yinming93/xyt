<?php
$str = 'a';
if (file_put_contents("test.txt",$str,FILE_APPEND)){
	
}else{
	
};
 file_get_contents('test.txt');
 stripslashes(file_get_contents('test.txt'));
$fw = strlen(file_get_contents('test.txt'));

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>访问次数</title>
</head>
<body>
浏览：<?php echo $fw;?>
</body>
</html>