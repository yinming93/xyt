<?php 
header("Content-type: text/html; charset=utf-8");  
$appid = "wx461b5105da7629f1";  
$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri=http://xyt.xy-tang.com/2016hj/wxwanda/toupiao/index.php&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect';  
header("Location:".$url); 
?>