<?php
	/*
     * 【 中亿丰 】
	 * author： liu
	 * date： 2017.8.7
	 * mail：1029327279@qq.com
	 */
	function https_request($url, $data = null)
	{
		$curl = curl_init();
		curl_setopt ( $curl, CURLOPT_SAFE_UPLOAD, FALSE);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);
		return $output;
	}
	//声明一个常量定义一个token的值
	define("TOKEN", "zyf123456");
	//通过WhChat类，创建一个对象
	$wechatObj = new WeChat();
	//如果没有通过GET收到echostr字符串，说明不是在使用token验证
	if(!isset($_GET['echostr'])){
		//调用WeChat对象中的方法响应用户消息
		$wechatObj->responseMsg();
	}else{
		//验证token
		$wechatObj->valid();
	}
	class WeChat{
		//验证签名  -- 开发者首次提交验证申请时
		public function valid(){
			$echoStr   = $_GET["echostr"];
			$signature = $_GET["signature"];
			$timestamp = $_GET["timestamp"];
			$nonce     = $_GET["nonce"];
			$token  = TOKEN;
			$tmpArr = array($token, $timestamp, $nonce);
			sort($tmpArr);
			$tmpStr = implode($tmpArr);
			$tmpStr = sha1($tmpStr);
			if($tmpStr == $signature){
				echo $echoStr;
				exit;
			}
		}
		//响应消息
		public function responseMsg(){
			//接收微信服务器传来的XML数据包
			$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
			if(!empty($postStr)){
				
				//XML 转化为 对象格式
				$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
				//获取数据类型
				$RX_TYPE = trim($postObj->MsgType);
				 
				 
				//消息类型  -- 分离
				switch($RX_TYPE){
					case "event":
						$result = $this->receiveEvent($postObj);  //事件
						break;
					case "text":
						$result = $this->receiveText($postObj);   //文本
						break;
					default:
						$result = "unknown msg type: ".$RX_TYPE;
						break;
				}
			
				//返回XML数据包给微信服务器
				echo $result;
				
			}else {
				//若未收到消息则返回空字符串
				echo "";
				exit;
			}
		}

		//接收 事件 消息
		private function receiveEvent($object){
			//发生不同事件，给用户反馈不同内容

			$content = "";
			switch($object->Event){
				//关注事件
				case "subscribe":
			$appid="wxe72e1d660fdaccc2";
			$secret="1a7586b33fa40f954fe072deadd93c59";
			$json=https_request("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$secret}");
			$arr= json_decode($json, true);
			$access_token = $arr["access_token"];
			 $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token={$access_token}&openid={$object->FromUserName}&lang=zh_CN";
                        $result = https_request($url);
                        $result= json_decode($result);
                        $nickname=$result->nickname;
					$content = array();
					$content[] = array("Title"=>$nickname."好！欢迎来到中亿丰CLUB，这里有你所不了解的中亿丰故事", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/zyf/img/0.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MjM5NjAzNTQwNQ==&mid=2663042157&idx=1&sn=cf366d558f00b9585ff87665f806b012&chksm=bda1024f8ad68b593644d361b424656794533c3f10c0a9b74ee7e054b93c1293c84b5cf1bccd&mpshare=1&scene=1&srcid=0807F6oPI12s8HkGTo42LSxL#rd");
					$content[] = array("Title"=>"这里有城市建设发展趋势和潮流的管廊建设", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/zyf/img/1.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MjM5NjAzNTQwNQ==&mid=2663041991&idx=1&sn=ff26cfe79f1f77bc21a4ee943c6551ff&chksm=bda105e58ad68cf30782eda561069fc08bd4cebbd095ea4f26693f7919ab9531ea4ed3bc4830&mpshare=1&scene=1&srcid=0807U6rK8TxY81yZrINDOWVn#rd");
					$content[] = array("Title"=>"中亿丰书香悦读会招募", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/zyf/img/sx.jpg", "Url" =>"http://mp.weixin.qq.com/s/LT4djA3btvvz9j57Uk7mLQ");
					break;
				//取消关注后 ---- 再次回来
				case "unsubscribe":
					//$content = "欢迎再次关注颐和湾花园！\n点击此处即可参与<a href='http://xyt.xy-tang.com/2015n/yhw627'>苏州“颐和湾杯”第一届儿童歌唱大赛！</a>";
					// $content[] = array("Title"=>"CCTV少儿春晚颐和湾赛区人气评选投票开始啦！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/toup.jpg", "Url" =>"http://xyt.xy-tang.com/liu/liudistx4/plugin.php?id=tom_mengbao&vid=1");
					// $content = array();
					// $content[] = array("Title"=>"2015年吴中区第二届篮球联赛闭幕式暨颁奖晚会", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/619.jpg", "Url" =>"http://menu.xy-tang.com/active/xinyutang?ename=qiandao_yhw20150619");
					break;
				//自定义菜单 -- 点击事件
				case "CLICK":
					switch ($object->EventKey){
				default:
					$content = "receive a new event: ".$object->Event;
					break;
				}
			}
			//数组或文本
			if(is_array($content)){
				$result = $this->transmitNews($object, $content);	
			}else{
				$result = $this->transmitText($object, $content);
			}
			
			return $result;
		}

		//接收文本消息
		private function receiveText($object){
			$keyword = trim($object->Content);
			/* 	
			if(isset($keyword)){
				$content = "有任何疑问可咨询在线客服东妹子哦~妹子有问必答，妹子在线时间为9：00—18：00（工作日），欢迎调戏~";
			}else{
				$content = "";
			}
			 */
			if(isset($keyword)){	 
				switch( trim($keyword) ){
					case "书香悦读会":
						$content = '<a href="http://szxytang.com/liu/fy350/"></a>';					
					case "小丰丰":
						$content = '<a href="http://mp.weixin.qq.com/s?__biz=MjM5NjAzNTQwNQ==&mid=515559841&idx=1&sn=f3951009d07e4098f3f08108c8e48b17&chksm=3da11f830ad696952a5165979e171508c502148d4b51443801c9e6585283c01ca7a8be670f3c#rd">表情包</a>';					
					case "表情包":
						$content = '<a href="http://mp.weixin.qq.com/s?__biz=MjM5NjAzNTQwNQ==&mid=515559841&idx=1&sn=f3951009d07e4098f3f08108c8e48b17&chksm=3da11f830ad696952a5165979e171508c502148d4b51443801c9e6585283c01ca7a8be670f3c#rd">表情包</a>';
				}
			}else{
				$content = "";
			}
		
			//返回文本
		    //$result = $this->transmitText($object, $content);
			
			
			//数组或文本
			if(is_array($content)){
				$result = $this->transmitNews($object, $content);	
			}else{
				$result = $this->transmitText($object, $content);
			}
			return $result;
		}

		//回复文本消息
		private function transmitText($object, $content){
			$xmlTpl = " <xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[text]]></MsgType>
						<Content><![CDATA[%s]]></Content>
						</xml>";
			$result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), $content);
			/* return $result; */
		}

		
		//回复图文消息
		private function transmitNews($object, $newsArray){
			if(!is_array($newsArray)){
				return;
			}
			$itemTpl = "<item>
						<Title><![CDATA[%s]]></Title>
						<Description><![CDATA[%s]]></Description>
						<PicUrl><![CDATA[%s]]></PicUrl>
						<Url><![CDATA[%s]]></Url>
						</item>";
			$item_str = "";
			foreach ($newsArray as $item){
				$item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['PicUrl'], $item['Url']);
			}
			$xmlTpl = "<xml>
					   <ToUserName><![CDATA[%s]]></ToUserName>
					   <FromUserName><![CDATA[%s]]></FromUserName>
					   <CreateTime>%s</CreateTime>
					   <MsgType><![CDATA[news]]></MsgType>
					   <ArticleCount>%s</ArticleCount>
					   <Articles>
					   $item_str
					   </Articles>
					   </xml>";

			$result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), count($newsArray));
			return $result;
		}

	}//end
	
	
	
	