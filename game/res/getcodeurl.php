<?php 



header("Content-type: text/html; charset=utf-8");  
$appid = "wx461b5105da7629f1";  
$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri=http://xytang88.com/yin/youxi/res/index.php&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';  
header("Location:".$url); 
?>