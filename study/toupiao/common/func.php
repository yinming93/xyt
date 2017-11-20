<?php

	//通过http中get
	function http_request($url){
		$ch = curl_init;
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);
		if($output === false){
			return "cURl Error:".curl_error($ch);
		}
		
		return $output;
	}
	
	//通过https中get/post
	//data是json字符串，只用在post情况
	function https_request($url, $data=null){
		$curl = curl_init();
		
		//默认get
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		//post
		if(!empty($data)){
		    curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			
		}
		
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//输出到字符串
		$output = curl_exec($curl);
		curl_close($curl);
		
		if($output === false){
			return "cURl Error:".curl_error($ch);
		}
		return $output;//json
	}
	
	
	
	
	
	/*微信不接收\uxxxx格式的json内容需要对json字符串处理
   	 *仅支持发送text消息，其他类型消息自己添加代码
	 *
	 */
	function my_json_encode($type, $arr){
		if(PHP_VERSION >= '5.4'){
			$str = json_encode($arr,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
		}else{
			switch($type){
				case 'text':
					isset($arr['text']['content']) && ($arr['text']['content'] = urlencode($arr['text']['content']));
					break;
			}
			$str = urldecode(json_encode($arr)); 
		}
		
		return $str;
	}
	
	
	//按格式打印
	function p($arr){ 
		echo "<pre>";	
		var_dump($arr);	
		echo "</pre>";
	}