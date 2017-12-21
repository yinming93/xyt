<?php
	/*
     * 1.一次工作可以使用页面调试工具完成：如第三方服务器配置，自定义菜单等
	 * 2.修改自定义菜单不用删除，直接创建即可
	 *
	 *
	 * author： WangKai
	 * date： 2015.07.20
	 * mail：wangkaisd@163.com
	 */
	
	//加载公共函数
	//include "func.php";
	 
	//声明一个常量定义一个token的值
	define("TOKEN", "nblh170707");
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
	//===========================================================================================
		//响应消息
		public function responseMsg(){
			//接收微信服务器传来的XML数据包
			$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
			if(!empty($postStr)){
				//将接收到的XML格式字符串写入日志，R表示接收数据
				//$this->logger("接收消息：\n".$postStr);
				//XML 转化为 对象格式
				$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
				//获取数据类型
				$RX_TYPE = trim($postObj->MsgType);
				 
				//将接收到的XML格式字符串写入日志，R表示接收数据
				//$this->logger("接收消息,'.$RX_TYPE.'：\n".$postStr); 
				 
				//消息类型分离
				switch($RX_TYPE){
					case "event":
						$result = $this->receiveEvent($postObj);  //事件
						break;
					case "text":
						$result = $this->receiveText($postObj);   //文本
						break;
					case "image":
						//$result = $this->receiveImage($postObj);  //图片
						$result = $this->receiveText1($postObj);     //文本
						break;
					default:
						$result = "unknown msg type: ".$RX_TYPE;
						break;
				}

				echo $result;
				
			}else {
				//若未收到消息则返回空字符串
				echo "";
				exit;
			}
		}
//================================================================================================
		//接收 事件 消息
		private function receiveEvent($object){
			//发生不同事件，给用户反馈不同内容
			$content = "";
			switch($object->Event){
				//关注事件
				case "subscribe":
					//$content = "苏州地铁出行神器！关于苏州地铁的新鲜资讯、站点规划、线路规划、周边吃喝玩乐……这里都有！\n欢迎爆料，红包伺候！\nQQ：1420196584";// -- 关注开始 $object->EventKey
					$content = "欢迎关注！龙湖天琅";
					//$openid  = $object->FromUserName;
					
					break;

				default:
					$content = "receive a new event: ".$object->Event;
					break;
			}
			
			if(is_array($content)){
				if (isset($content[0])){
					$result = $this->transmitNews($object, $content);
				}else if (isset($content['MusicUrl'])){
					$result = $this->transmitMusic($object, $content);
				}
			}else{
				$result = $this->transmitText($object, $content);
			}

			return $result;
		}
//===================================================================================
		//接收文本消息
		private function receiveText($object){
			$keyword = trim($object->Content);
			
			//自动回复模式
			if( strstr($keyword, "龙湖天琅") ){
				$content = "<a href='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://szxytang.com/developer/nblh/2/index.php&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect'>点击 签到 </a>";
			
			}else{
				//$content = date("Y-m-d H:i:s",time()).$object->FromUserName	;
				$content = "请输入正确关键字！";
			}
			
			//返回文本
			$result = $this->transmitText($object, $content);
			
			//最终返回到客户端的内容
			return $result;
		}
		
		//针对图片 - 回复随机码
		private function receiveText1($object){
			//数据库
			include "db.php";
			//查询是否存在该openid
			$sql = "select * from $tbname where openid ='".$object->FromUserName."'";
			$res = mysql_query( $sql );
			$row = mysql_fetch_assoc( $res );
			//$content = serialize($row);
			
			if( $row ){//已存在
				//$content = $row["code"];
				$content="恭喜！您获得的随机抽奖码为 【". $row["code"]."】 ，请妥善保管哦！";
			}else{//不存在
				include "rand.php";
				$code = randpw($len=4,$format='NUMBER');
				//查询是否存在
				$sql = "select * from $tbname where code ='".$code."'";
				$res = mysql_query( $sql );
				$row = mysql_fetch_assoc( $res );
				
				//循环查询判断
				while($row){
					$code = randpw($len=4,$format='NUMBER');
					//查询是否存在
					$sql = "select * from $tbname where code ='".$code."'";
					$res = mysql_query( $sql );
					$row = mysql_fetch_assoc( $res );
				}
				
				//不存在 - 插入数据
				$time = date('Y-m-d H:i:s');
				$sql  = "INSERT INTO $tbname(openid,code,time) VALUES('{$object->FromUserName}','{$code}','{$time}')";
				$res  = mysql_query( $sql );
			
				//
				if($res){
					//随机码
					$content="恭喜！您获得的的随机抽奖码为 【".$code."】 ，请妥善保管哦！";
					
				}else{
					$content="系统繁忙稍后再试！";
				}
				
				
			}
			
			
			//返回文本
			$result = $this->transmitText($object, $content);
			//最终返回到客户端的内容
			return $result;
		}
		
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++		
		
		//接收图片消息
		private function receiveImage($object){
			$content = array("MediaId"=>$object->MediaId);
			$result = $this->transmitImage($object, $content);
			return $result;
		}


	//接收位置消息
		private function receiveLocation($object){
			//获取粉丝当前位置坐标
			//纬度为：$object->Location_X  经度为：$object->Location_Y
			
			//回复多图文
			$result = $this->transmitNews($object, $content);
			return $result;
			
		}
		
		
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		//接收语音消息 
		//语音识别 -- 可以开启或关闭  --- Recognition字段
		//语音识别 -- 中文分词(安装分词软件)
		private function receiveVoice($object){
			//1.开启语音识别功能 -- 回复识别后的文本
			if(isset($object->Recognition) && !empty($object->Recognition)){
				$content = "你刚才说的是：".$object->Recognition;
				$result = $this->transmitText($object, $content);
			}else{
				//2.未开启语音识别功能，就会直接使用普通语音功能
				$content = array("MediaId"=>$object->MediaId);
				$result = $this->transmitVoice($object, $content);
			}

			return $result;
		}

		//接收视频消息
		private function receiveVideo($object){
			$content = array("MediaId"=>$object->MediaId, "ThumbMediaId"=>$object->ThumbMediaId, "Title"=>"", "Description"=>"");
			$result = $this->transmitVideo($object, $content);
			return $result;
		}

		//接收链接消息
		private function receiveLink($object){
			$content = "你发送的是链接，标题为：".$object->Title."；内容为：".$object->Description."；链接地址为：".$object->Url;
			$result = $this->transmitText($object, $content);
			return $result;
		}
		
		
		
//========================================================================================
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
			return $result;
		}

		//回复图片消息
		private function transmitImage($object, $imageArray){
			$itemTpl = "<Image>
						<MediaId><![CDATA[%s]]></MediaId>
						</Image>";

			$item_str = sprintf($itemTpl, $imageArray['MediaId']);

			$xmlTpl = " <xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[image]]></MsgType>
						$item_str
						</xml>";

			$result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
			return $result;
		}
		
		//回复语音消息
		private function transmitVoice($object, $voiceArray){
			$itemTpl = "<Voice>
						<MediaId><![CDATA[%s]]></MediaId>
						</Voice>";

			$item_str = sprintf($itemTpl, $voiceArray['MediaId']);

			$xmlTpl = " <xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[voice]]></MsgType>
						$item_str
						</xml>";

			$result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
			return $result;
		}

		//回复视频消息
		private function transmitVideo($object, $videoArray){
			$itemTpl = "<Video>
						<MediaId><![CDATA[%s]]></MediaId>
						<ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
						<Title><![CDATA[%s]]></Title>
						<Description><![CDATA[%s]]></Description>
						</Video>";

			$item_str = sprintf($itemTpl, $videoArray['MediaId'], $videoArray['ThumbMediaId'], $videoArray['Title'], $videoArray['Description']);

			$xmlTpl = " <xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[video]]></MsgType>
						$item_str
						</xml>";

			$result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
			return $result;
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

		//回复音乐消息
		private function transmitMusic($object, $musicArray){
			$itemTpl = "<Music>
						<Title><![CDATA[%s]]></Title>
						<Description><![CDATA[%s]]></Description>
						<MusicUrl><![CDATA[%s]]></MusicUrl>
						<HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
						</Music>";

			$item_str = sprintf($itemTpl, $musicArray['Title'], $musicArray['Description'], $musicArray['MusicUrl'], $musicArray['HQMusicUrl']);

			$xmlTpl = " <xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[music]]></MsgType>
						$item_str
						</xml>";

			$result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
			return $result;
		}

		//回复多客服消息
		private function transmitService($object){
			$xmlTpl = " <xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[transfer_customer_service]]></MsgType>
						</xml>";
			$result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
			return $result;
		}	
					
	}

	
	
	