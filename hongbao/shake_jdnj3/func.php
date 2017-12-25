<?php
    /*公共函数
	 *
	 * auther:WangKai
	 * date:2015/03/25
	 * email:wangkaisd@163.com
	 */
	
	
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
	

//-----------------------------------------------------------
	
	//按格式打印
	function p($arr){ 
		echo "<pre>";	
		var_dump($arr);	
		echo "</pre>";
	}

//-----------------------------------------------------------

