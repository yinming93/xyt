<?php
	header("Content-Type:text/html;charset=utf-8");
// 主要是数据，http://xytang88.com/developer/zyf/curl.php
	$json_menu = '{
					 "button":[
					   {	
				          "type":"view",
				          "name":"丰博览",
				          "url":"http://filef4ff590d54ac.iiih5.cn/idea/wt1vCpg5"
					   },						  
					   {	
				          "type":"view",
				          "name":"感动人物投票",
				          "url":"http://xytang88.com/phpgii/index.php/Home/Tpuser/login8/tid/29"
					   },
					   {	
					 "name":"丰生活",
					   "sub_button":[
						{
						   "type":"view",
						   "name":"一键导航",
						   "url":"http://xytang88.com/liu/images/loc6.php"
						},
						{
						   "type":"view",
						   "name":"联系我们",
						   "url":"https://mp.weixin.qq.com/s/80bemNhfQxRnuA_R-GVRZA"
						},
						{
						   "type":"view",
						   "name":"畅所欲言",
						   "url":"http://xytang88.com/phpgii/index.php/Home/tpuser/add18/tid/23"
						},
					    {	
					          "type":"view",
					          "name":"丰互动",
					          "url":"http://file51296cae2191.vt.iamh5.cn/v3/idea/Qn1iFJ33"
						   }
							]
					   }
					 ]
				}';
			$access_token = get_access_token();
			$menu_url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$access_token}";
			$result   = https_request($menu_url, $json_menu);
			var_dump($result);
			$arr  = json_decode($json_menu, true);
			echo my_json_encode('text', $arr);
	function my_json_encode($type, $p){
		if(PHP_VERSION >= '5.4'){
			$str = json_encode($p, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
		}else{
			switch($type){
				case 'text':
					isset($p['text']['content']) && ($p['text']['content'] = urlencode($p['text']['content']));
					break;
			}
			$str = urldecode(json_encode($p)); 
		}
		return $str;
	}
	function https_request($url, $data=null){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		if(!empty($data)){
		    curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//输出到字符串
		$output = curl_exec($curl);
		curl_close($curl);
		return $output;
	}
	//获取token
	function get_access_token(){
		$appid     = "wxe72e1d660fdaccc2";
	    $appsecret = "1a7586b33fa40f954fe072deadd93c59";
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsecret}";
		$json_access_token = https_request($url);
		$arr_access_token  = json_decode($json_access_token, true);
		return $arr_access_token["access_token"];
	}