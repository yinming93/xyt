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
	define("TOKEN", "dev_snlh1013");
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
				$this->logger("接收消息：\n".$postStr);
				//XML 转化为 对象格式
				$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
				//获取数据类型
				$RX_TYPE = trim($postObj->MsgType);
				 
				//将接收到的XML格式字符串写入日志，R表示接收数据
				$this->logger("接收消息,'.$RX_TYPE.'：\n".$postStr); 
				 
				//消息类型分离
				switch($RX_TYPE){
					case "event":
						$result = $this->receiveEvent($postObj);  //事件
						break;
					case "text":
						$result = $this->receiveText($postObj);   //文本
						break;
					case "image":
						$result = $this->receiveImage($postObj);  //图片
						break;
					case "voice":
						$result = $this->receiveVoice($postObj);   //语音
						break;
					case "video":
						$result = $this->receiveVideo($postObj);   //视频
						break;
					case "link":
						$result = $this->receiveLink($postObj);    //链接
						break;
					default:
						$result = "unknown msg type: ".$RX_TYPE;
						break;
				}
				
				//将响应的XML消息再次写入日志，T表示响应消息
				$this->logger("回复消息,类型是'.$RX_TYPE.'：\n".$result);
				//返回XML数据包给微信服务器
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
				
				//用户关注公众账号时就应该将该用户消息保存入数据库
				
					//$content = "苏州地铁出行神器！关于苏州地铁的新鲜资讯、站点规划、线路规划、周边吃喝玩乐……这里都有！\n欢迎爆料，红包伺候！\nQQ：1420196584";// -- 关注开始 $object->EventKey
					//$content = "这是一个苏州地铁出行神器！附近地铁站、在线购票、新鲜资讯、地铁规划、周边吃喝玩乐……这里都有！\n\n地铁君强烈推荐：\n想在苏州买房，可以关注<a href='http://t.cn/Rcfvg7n'>苏州买房之前</a> \n\n苏州吃喝玩乐，可以关注<a href='http://t.cn/RcnGT7h'>苏州生活指南</a> ";// -- 关注开始 $object->EventKey
					//$content = "hi，这是一个苏州地铁出行神器！附近地铁站、在线购票、新鲜资讯、地铁规划、周边吃喝玩乐……这里都有！\n\n地铁君墙裂推荐↓↓↓\n 苏州吃喝玩乐购，可以关注 <a href='http://t.cn/RcnGT7h'>苏州生活指南</a>";
					//$content = "hi，这是一个苏州地铁出行神器！附近地铁站、在线购票、新鲜资讯、地铁规划、周边吃喝玩乐……这里都有！\n\n地铁君墙裂推荐↓↓↓\n ➀ 苏州吃喝玩乐购，关注→<a href='http://t.cn/RcnGT7h'>苏州生活指南</a>\n ➁ 亲子活动精选，10000+个家庭首选！关注→ <a href='http://t.cn/RXYHFJ6'>企鹅亲子</a>\n ";
					//$content = "hi，这是一个苏州地铁出行神器！附近地铁站、在线购票、新鲜资讯、地铁规划、周边吃喝玩乐……这里都有！\n\n地铁君墙裂推荐↓↓↓\n ➀ 苏州吃喝玩乐购，关注→<a href='http://t.cn/RcnGT7h'>苏州生活指南</a>\n ➁ 亲子活动精选，10000+个家庭首选！关注→ <a href='http://t.cn/RXYHFJ6'>企鹅亲子</a>\n ";
					
					//$content = "hi，这是一个苏州地铁出行神器！最近地铁站、首末班车表、地铁线路图、在线购票、地铁规划、周边吃喝玩乐…这里都有！\n\n 快速查询↓↓↓\n ➀ 在线购票→ <a href='http://sm.e-metro.cn/Home/Index/line_weixin'>点击进入</a>\n ➁ 地铁1 2 4号线线路图→ <a href='http://wx3.sinaimg.cn/large/aa7dce74gy1ffg7cit8asj21jk1f37ek.jpg'>点击进入</a>\n ➂ 地铁时刻表+首末班车表→<a href='http://szxing-fwc.icitymobile.com/metro'>点击查询</a>\n\n更多功能，请查看自定义菜单";
					$content = "哈喽~新盆友，终于等到你~\n\n① <a href='http://www.longfor.com/mobile/wxjs/'>点击了解九墅详情</a>\n② <a href='http://www.longfor.com/mobile/wxzyt/'>点击了解紫云台详情</a>\n③ <a href='http://www.longfor.com/mobile/czlyc/'>点击了解龙誉城详情</a>\n④ <a href='http://www.longfor.com/mobile/wxjlqc/'>点击了解九里晴川详情</a>\n⑤ <a href='http://www.longfor.com/mobile/czslyz/'>点击了解双珑原著详情</a>\n⑥ <a href='http://www.longfor.com/mobile/wxtcyz/?f=78G67A'>点击了解天宸原著详情</a>\n\n想了解更多苏南龙湖项目、福利等信息，点击菜单栏，更多惊喜等着你哟~";
					
					break;
				//取消关注事件
				case "unsubscribe":
					$content = "用户取消关注";
					
					break;
				
				//需要二维码接口
				//用户扫描带场景值二维码时，可能推送以下两种事件：
				//1.用户还未关注公众号，则用户可以关注公众号，关注后微信会将带场景值关注事件推送给开发者。
				//2.用户已经关注公众号，则微信会将带场景值扫描事件推送给开发者。 
				case "SCAN":
					//此处是以前已关注用户扫描时
					//此处需要更新已关注者数据库信息 ---- 待完善！！！
					//
					$content = "扫描场景SCAN: ".$object->EventKey;
					break;
					
					
				//自定义菜单 -- 点击事件
				case "CLICK":
					switch ($object->EventKey){
						case "yzrz":
							$content = "搭建中...";
							break;
						case "gcjd":
							$content = "搭建中...";
							break;
						case "zsjd":
							$content = "搭建中...";
							break;
						case "yzbm":
							$content = "搭建中...";
							break;
						case "yjyx":
							$content = "搭建中...";
							break;
						case "pzyl":
							$content = "搭建中...";
							break;
						
						case "snzy":
							$content = "搭建中...";
							break;
						
						
						
						default:
							$content = " ";
							break;
					}
					break;
				//上报地理位置事件	
				//1.用户进入公众账号界面时
				//2.在用户同意下，在会话界面每隔5秒获取一次
				case "LOCATION":
					//$content = "上传位置：纬度 ".$object->Latitude.";经度 ".$object->Longitude;
					break;
				//点击菜单跳转链接时的事件推送 
				case "VIEW":
					$content = "跳转链接 ".$object->EventKey;
					break;
				//点击菜单拉取消息时的事件推送 
				case "MASSSENDJOBFINISH":
					$content = "消息ID：".$object->MsgID."，结果：".$object->Status."，粉丝数：".$object->TotalCount."，过滤：".$object->FilterCount."，发送成功：".$object->SentCount."，发送失败：".$object->ErrorCount;
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
			
			//多客服人工回复模式
			if(strstr($keyword, "您好") || strstr($keyword, "你好") || strstr($keyword, "在吗")){
				$result = $this->transmitService($object);
			}else{  
				//自动回复模式
				if( strstr($keyword, "红包1") ){
					$content = "点击 <a href='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxb14c1564ece4725d&redirect_uri=http://xyt.xy-tang.com/test/money2/index.php&response_type=code&scope=snsapi_base&state=1#wechat_redirect'>领取红包</a>";
				
				}else if(strstr($keyword, "地铁图") || strstr($keyword, "地图") || strstr($keyword, "地铁路线图") || strstr($keyword, "地铁线路图") || strstr($keyword, "线网图") || strstr($keyword, "地铁")){
				   //$result = $this->transmitImage1($object);
				   	$content = "点击查看 <a href='http://wx3.sinaimg.cn/large/aa7dce74gy1ffg7cit8asj21jk1f37ek.jpg'>地铁路线图</a>";

				   
			    }else if( strstr($keyword, "购票") || strstr($keyword, "买票") || strstr($keyword, "我要买票") || strstr($keyword, "在线购票")){
					$content = "点击 <a href='http://sm.e-metro.cn/Home/Index/line_weixin.html'>购票</a>";
				
				}else if(strstr($keyword, "红包1")){
					$content = "点击领取 <a href='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxb14c1564ece4725d&redirect_uri=http://xyt.xy-tang.com/test/money2/index.php&response_type=code&scope=snsapi_base&state=1#wechat_redirect'>现金红包</a>";
				}else if(strstr($keyword, "地铁卡")){
					$content = "点击链接 <a href='http://wf.ncwxyx.com/app/index.php?i=7&c=entry&zid=7&au=1&do=Auth&m=mon_zl'>地铁卡</a> 参加活动 ";
				
				}else if( strstr($keyword, "试乘") ){
					$content = "抢票步骤：\n1.关注“苏州地铁网”公众号 \n2.转.发以下图文至盆.友.圈，集满50个赞，截图回复至本平台，并附姓名联系方式。\n先到先得，送完为止！\n图文链接 <a href='http://t.cn/R6URm5F'>试乘</a>";
				}else if(strstr($keyword, "单图文")){
					$content = array();
					$content[] = array("Title"=>"单图文标题",  "Description"=>"单图文内容", "PicUrl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg", "Url" =>"http://www.baidu.com");
				}else if(strstr($keyword, "大栗")){
					$content = array();
					$content[] = array("Title"=>"论吃栗子的重要性",  "Description"=>"世间最温暖的事，莫过于吃", "PicUrl"=>"http://xytang88.com/developer/dev_snlh/tw1020.jpg", "Url" =>"https://mp.weixin.qq.com/s?__biz=MzA5OTA4NjAwOA==&mid=2651344164&idx=1&sn=c9bc24aed3267b728b202987d4b0f17c&chksm=8b7b56f3bc0cdfe5448d3e1e4587ee0fc007ab36703edbca0f03ab451a889ea375f70310df5d#rd");
				}
				else if(strstr($keyword, "图文") || strstr($keyword, "多图文")){
					$content = array();
					$content[] = array("Title"=>"多图文1标题", "Description"=>"", "PicUrl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg", "Url" =>"http://m.cnblogs.com/?u=txw1958");
					$content[] = array("Title"=>"多图文2标题", "Description"=>"", "PicUrl"=>"http://d.hiphotos.bdimg.com/wisegame/pic/item/f3529822720e0cf3ac9f1ada0846f21fbe09aaa3.jpg", "Url" =>"http://m.cnblogs.com/?u=txw1958");
				}else if(strstr($keyword, "音乐")){
					$content = array();
					$content = array("Title"=>"最炫民族风", "Description"=>"歌手：凤凰传奇", "MusicUrl"=>"http://121.199.4.61/music/zxmzf.mp3", "HQMusicUrl"=>"http://121.199.4.61/music/zxmzf.mp3");
				}else{
					$content = date("Y-m-d H:i:s",time())."\n感谢您的提问，小编会及时回复您！或直接拨打0512-69899000咨询！";
				}
				//图文或音乐
				if(is_array($content)){
					if(isset($content[0]['PicUrl'])){
						$result = $this->transmitNews($object, $content);
					}else if(isset($content['MusicUrl'])){
						$result = $this->transmitMusic($object, $content);
					}
				}else if( strstr($keyword, "厦门")){
				
					//返回图片transmitImage1($object)
					$result = $this->transmitImage1($object);
					
				}else{
					//返回文本
					$result = $this->transmitText($object, $content);
				}
			}
			
			//最终返回到客户端的内容
			return $result;
		}

		//接收图片消息
		private function receiveImage($object){
			$content = array("MediaId"=>$object->MediaId);
			$result = $this->transmitImage($object, $content);
			return $result;
		}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
		
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
		
		//回复图片消息  -- 自定义图片mediaId  -  先上传永久素材获取mediaId
		private function transmitImage1($object){
		/*	
			$itemTpl = "<Image>
						<MediaId><![CDATA[%s]]></MediaId>
						</Image>";

			$item_str = sprintf($itemTpl, "VPXLR1TtDrH_d06qQ8zpsOs0L8901ESjQ2N1X_ZLgQvobRRK9xiAnvKWJ4byC7Ap");

			$xmlTpl = " <xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[image]]></MsgType>
						$item_str
						</xml>";

			$result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
			return $result;
		*/	
//===================================================
$xmlTpl = "<xml><ToUserName><![CDATA[%s]]></ToUserName><FromUserName><![CDATA[%s]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[image]]></MsgType><Image><MediaId><![CDATA[NIJpeiEH28qXDs05pQ1PIKl_MFt7F3mO5wjmY8dl3C6sl9b-sRmgaslP32WQ0qSJ]]></MediaId></Image></xml>";
$result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
echo $result;				   
//===================================================				
			
			
			
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

		//日志记录
		private function logger($log_content){
			// if(isset($_SERVER['HTTP_APPNAME'])){   //SAE
			//	sae_set_display_errors(false);
			//	sae_debug($log_content);
			//	sae_set_display_errors(true);
			//}else if($_SERVER['REMOTE_ADDR'] != "127.0.0.1"){ //LOCAL 
				$max_size = 10000;
				$log_filename = "log.xml";
				if(file_exists($log_filename) and (abs(filesize($log_filename)) > $max_size)){unlink($log_filename);}
				file_put_contents($log_filename, date('H:i:s').$log_content."\r\n", FILE_APPEND);
			//}
		}
		
		
		
					
	}
?>