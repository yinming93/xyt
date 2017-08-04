<?php
	/* 自定义菜单 接口调用 http请求方式：POST方式
	 *
	 *
	 *
	 */
	
	/* 
	//get方式
	//初始化
	$ch = curl_init();
	
	///设置选项，包括URL
	curl_setopt($ch, CURLOPT_URL, "http://www.baidu.com");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//是否输出到字符串   1是   0否
	//执行并获取HTML文档内容
	$output = curl_exec($ch);
	
	//放curl句柄
	curl_close($ch);
	
	var_dump($output);
	*/
	
	/*
	//post方式
	
	$url = "";
	$arr = array("name"=>"wangkai");
	
	//初始化
	$ch = curl_init();
	
	///设置选项，包括URL
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//是否输出到字符串   1是   0否
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFILES, $arr);
	
	
	
	//执行并获取HTML文档内容
	$output = curl_exec($ch);
	
	//放curl句柄
	curl_close($ch);
	
	var_dump($output);
	*/
	
	
	
	
	
	//
	
	$json_menu = ' {
					 "button":[
					    {
						   "name":"中梁天颂",
						   "sub_button":[
							{	
						    "type":"click",
							"name":"微楼书",
							"key":"wls"
					        },
							{	
						    "type":"click",
							"name":"项目动态",
							"url":"xmdt"
					        },
					        {	
						    "type":"view",
							"name":"3D看房",
							"url":"https://www.baidu.com/"
					        },
					        {
							   "type":"click",
							   "name":"vip热线",
							   "key":"vip"
							}]
					   }, 
					   {
						   "name":"活动",
						   "sub_button":[
							{
							   "type":"click",
							   "name":"活动一",
							   "key":"h1"
							},
							{
							   "type":"view",
							   "name":"一键导航",
							   "url":"https://www.baidu.com/"
							}]
					   },
					   {	
						 "name":"粉丝福利",
						   "sub_button":[
						    {	
							   "type":"click",
							   "name":"粉丝",
							   "key":"fensi"
							},
							{
							   "type":"click",
							   "name":"福利",
							   "key":"fuli"
							}]
					   }
					 ]
					}';
					
	$access_token = get_access_token();
	$menu_url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$access_token}";
	
	$result   = https_request($menu_url, $json_menu);
	
	var_dump($result);//string(27) "{"errcode":0,"errmsg":"ok"}" 
	 
	
//-----------------------------------------------	
	//数组转化为json格式乱码时
	
	$arr  = json_decode($json_menu, true);
	//$json = json_encode($arr);
	//var_dump($json);
	
	echo my_json_encode('text', $arr);
	
	/*微信不接收\uxxxx格式的json内容需要对json字符串处理
   	 *仅支持发送text消息，其他类型消息自己添加代码
	 *
	 *
	 *
	 *
	 */
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
	
//----------------------------------------------------------------------------------------------
	
	//执行请求
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
		
		return $output;
	}
	
	
	//获取token
	function get_access_token(){
		//东壹元7303J1VlvsMaoSGoMi--cSGoulPunsVryAMexGVzN7Gv232Fgf-mYgJuwOtVShaTU1h8QTP_FfePtiChIABi42MPPN1s6Pzf-42mG68EM5s
		$appid     = "wx215d0405a2102bda";
	    $appsecret = "ec8babdf7d9fb9d51e80a7ba5902e1f3";
		
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsecret}";
		$json_access_token = https_request($url);
		$arr_access_token  = json_decode($json_access_token, true);
		//Array ( [access_token] => Ax0yUfRuxLGTmehnRO9Lj0vKwRt9Rov5HBZnwf5eDeVuSz-cYI2bE3Wxuc8GLfosuAOXcuhTfBT9b-Jd5sRyXw6dWzOtT15UkJy4A3pDO94 [expires_in] => 7200 ) 
		
		return $arr_access_token["access_token"];
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	