<?php
	
	/**
	 * 	 微信JSSDK接口
	 *
	 *
	 *
	 * auther:WangKai
	 * date:2015/03/28
	 * email:wangkaisd@163.com
	 */
	 
	//微信sdk，php生成token和签名
		$jssdk = new JSSDK( APPID, APPSECRET );
		$signPackage = $jssdk->GetSignPackage();
//---------------------------------------------------------------
	class JSSDK{
	  private $appId;
	  private $appSecret;
	  private $access_token_file = '/alidata/www/default/xingekeji/access_token.json';
	  private $jsapi_ticket_file = '/alidata/www/default/xingekeji/jsapi_ticket.json';

	  //初始化
	  public function __construct($appId, $appSecret){
		$this->appId = $appId;
		$this->appSecret = $appSecret;
	  }

	  
	  public function getSignPackage(){
		//获取临时票据
		$jsapiTicket = $this->getJsApiTicket();
		
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		
		$url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	    //当前时间戳
		$timestamp = time();
	   
		//随机字符串
		$nonceStr = $this->createNonceStr();

		//这里参数的顺序要按照 key 值 ASCII 码升序排序（拼接字符串）
		$string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
		//对字符串sha1()加密
		$signature = sha1($string);
		
		//
		$signPackage = array(
		  "appId"     => $this->appId,
		  "nonceStr"  => $nonceStr,
		  "timestamp" => $timestamp,
		  "url"       => $url,
		  "signature" => $signature,
		  "rawString" => $string
		);
		
		return $signPackage; 
		
	  }

	  //获取随机字符串
	  private function createNonceStr($length = 16){
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$str = "";
		for ($i = 0; $i < $length; $i++){
		  $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
		}
		return $str;
	  }
		
	  //获取票据
	  private function getJsApiTicket(){
		// jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
		$data = json_decode(file_get_contents($this->jsapi_ticket_file));
		
		//若时间超过7200秒，那么就会重新请求 jsapi_ticket
		if ($data->expire_time < time()){
		  $accessToken = $this->getAccessToken();
		  // 如果是企业号用以下 URL接口 获取 ticket
		  // $url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";
		  // 如果是普通公众号用以下 URL接口 获取 ticket
		  $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
		  $res = json_decode($this->httpGet($url));
		  $ticket = $res->ticket;
		  
		  //数据操作
		  if($ticket){
			$data->expire_time = time() + 7000;
			$data->jsapi_ticket = $ticket;
			$fp = fopen( $this->jsapi_ticket_file, "w" );
			fwrite($fp, json_encode($data));
			fclose($fp);
		  }
		}else{
		  $ticket = $data->jsapi_ticket;
		}

		return $ticket;
	  }
	 // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
	 // access_token  不是全局的
	  private function getAccessToken(){
		
		$data = json_decode( file_get_contents( $this->access_token_file ) );
		if ($data->expire_time < time()){
		  // 如果是企业号用以下URL获取access_token
		  // $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
		  // 如果是企业号用以下URL获取access_token
		  $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appId&secret=$this->appSecret";
		  $res = json_decode($this->httpGet($url));
		  $access_token = $res->access_token;
		  
		  if ($access_token){
			$data->expire_time = time() + 7000;
			$data->access_token = $access_token;
			$fp = fopen( $this->access_token_file, "w" );
			fwrite($fp, json_encode($data));
			fclose($fp);
		  }
		}else{
		  $access_token = $data->access_token;
		}
		
		return $access_token;
		
	  }
	
	//执行请求 http
	  private function httpGet($url){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, 500);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, $url);

		$res = curl_exec($curl);
		curl_close($curl);

		return $res;
		
	  }
	  
	 
	}//结束

	
?>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script>
		wx.config({
			  debug: false,
			  appId:      '<?php echo $signPackage["appId"];    ?>',
			  timestamp:   <?php echo $signPackage["timestamp"];?>,
			  nonceStr:   '<?php echo $signPackage["nonceStr"]; ?>',
			  signature:  '<?php echo $signPackage["signature"];?>',
			  jsApiList: [
				'checkJsApi',
				'onMenuShareTimeline',
				'onMenuShareAppMessage',
				'onMenuShareQQ',
				'onMenuShareWeibo',
				'hideMenuItems',
				'showMenuItems',
				'hideAllNonBaseMenuItem',
				'showAllNonBaseMenuItem',
				'translateVoice',
				'startRecord',
				'stopRecord',
				'onRecordEnd',
				'playVoice',
				'pauseVoice',
				'stopVoice',
				'uploadVoice',
				'downloadVoice',
				'chooseImage',
				'previewImage',
				'uploadImage',
				'downloadImage',
				'getNetworkType',
				'openLocation',
				'getLocation',
				'hideOptionMenu',
				'showOptionMenu',
				'closeWindow',
				'scanQRCode',
				'chooseWXPay',
				'openProductSpecificView',
				'addCard',
				'chooseCard',
				'openCard'
			  ]
		});
	</script>