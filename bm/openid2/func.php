<?php
    /*公共函数
	 *
	 *
	 *
	 *
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
	
	
	//获取access_token  -- 与全局access_token不同
	//判断access_token是否过期  -- 查询token2.txt文件
	//Array ( [access_token] => Ax0yUfRuxLGTmehnRO9Lj0vKwRt9Rov5HBZnwf5eDeVuSz-cYI2bE3Wxuc8GLfosuAOXcuhTfBT9b-Jd5sRyXw6dWzOtT15UkJy4A3pDO94 [expires_in] => 7200 ) 
	function get_access_token(){
		
		$current = time() ;//当前时间戳
		
		//对象，表access_token
		$model = new Model('access_token');
		//查询数据库access_token表,返回数组4个字段
		//$arr 3维数组
		$arr = $model->where('id=1')->select();
		
		//超过7200s,需要重新获取access_token
		if($arr[0]['old_time'] + $arr[0]['expires_in'] - 30 <  $current){
			$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsecret}";
			$json_access_token = https_request($url);
			$arr_access_token  = json_decode($json_access_token, true);//json转化为array数组
			//数组中添加一个元素
			$arr_access_token['old_time'] = $current;
			//更新表
			$model->where(array('id'=>1))->update($arr_access_token);
			return $arr_access_token["access_token"];
		}
		
		//数据库中未过期的access_token
		return $arr[0]['access_token'];
	}

//---------------------------------------------------------------	
	
	//按格式打印
	function p($arr){ 
		echo "<pre>";	
		var_dump($arr);	
		echo "</pre>";
	}

//-----------------------------------------------------------
	
	
//------------------------------------------------------------------------------------------
