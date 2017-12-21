<?php
/*
include "db.php";

$sql = "select count(openid) from $tbname";
$res = mysql_query( $sql );


$id  = intval($res["id"]);

var_dump( $res );

*/


//php生成 不重复 随机数
	function randpw($len=8,$format='ALL'){
		$is_abc = $is_numer = 0;
		$password = $tmp ='';  
		switch($format){
			case 'ALL':
				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
				//去掉不易识别的字符
				//l L I z 0 o 
				//$chars='ABCDEFGHJKLMNPQRSTUVWXY123456789';
			break;
			case 'CHAR':
				//大小写混合
				//$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
				//纯小写
				$chars='abcdefghijklmnopqrstuvwxyz';
			break;
			case 'NUMBER':
				$chars='0123456789';
				break;
			default :
				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
				break;
		}
		
		mt_srand((double)microtime()*1000000*getmypid());
		
		while(strlen($password)<$len){
			$tmp =substr($chars,(mt_rand()%strlen($chars)),1);
			if(($is_numer <> 1 && is_numeric($tmp) && $tmp > 0 )|| $format == 'CHAR'){
			$is_numer = 1;
			}
			if(($is_abc <> 1 && preg_match('/[a-zA-Z]/',$tmp)) || $format == 'NUMBER'){
			$is_abc = 1;
			}
			$password.= $tmp;
		}
		
		if($is_numer <> 1 || $is_abc <> 1 || empty($password) ){
			$password = randpw($len,$format);
		}
		
		return $password;
	}

	
	
	echo randpw($len=6,$format='NUMBER');
	