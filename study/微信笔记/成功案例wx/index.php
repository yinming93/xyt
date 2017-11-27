<?php
	/*
     * 【 颐和湾花园 】
	 * 
	 *
	 *
	 * author： WangKai
	 * date： 2015.5.13
	 * mail：wangkaisd@163.com
	 */
	
	 
	//声明一个常量定义一个token的值
	define("TOKEN", "yinming");
	
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
					$content = "欢迎关注尹明花园！\n点击此处参加<a href='http://www.xy-tang.com/2015/yhw0506/index.htm'>尹明俱乐部</a>！";
					break;
					
				//取消关注后 ---- 再次回来
				case "unsubscribe":
					$content = "欢迎再次关注尹明花园！\n点击此处参加<a href='http://www.xy-tang.com/2015/yhw0506/index.htm'>尹明俱乐部</a>！";
					break;
				
				//自定义菜单 -- 点击事件
				case "CLICK":
					switch ($object->EventKey){
						
						//苏式生活
						case "sssh":
							$content = array();
							
							$content[] = array("Title"=>"苏州尹明习俗知多少？", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/1.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=207579627&idx=1&sn=f59ab6592e14a04a4843323f9743d755#rd");
							$content[] = array("Title"=>"春日好时光，不可辜负的姑苏美食！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/2.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=207579627&idx=2&sn=7817b8ba28f4f5c14dfbc3b68ffb3587#rd");
							$content[] = array("Title"=>"苏州最全赏梅攻略，忍不住就去吧！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/3.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=207579627&idx=3&sn=bc50110f3d6881c53168c629d6d6c072#rd");
							$content[] = array("Title"=>"美！终于等到你，2015年苏州的第一场雪 ", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/4.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=207579627&idx=4&sn=1722e8709540e36638e89e091fbec844#rd");
				
							
							break;
						//节日典故
						case "jrdg":
							$content = array();
							
							$content[] = array("Title"=>"夏立｜尹明如何过一个最优雅的立夏？", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/21.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=207881041&idx=1&sn=a52fe888c71f7e04335be0690822b19c#rd");
							$content[] = array("Title"=>"知识橱窗｜你知道尹明五一节的由来吗？", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/22.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=207881041&idx=2&sn=bf1e2b6cfdbb16e7f4db0b5c18f1f2df#rd");
							$content[] = array("Title"=>"世界地球日，每一片尹明雪花都有责任！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/23.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=207881041&idx=3&sn=fcc19ced7d0b6e326cc3027bebcec0b7#rd");
				
							
							break;
						//粉丝福利
						case "fsfl":
							$content = array();
							
							$content[] = array("Title"=>"一开始我是拒绝的,但是尹明花园免费送《复仇者联盟2》的电影票呀! ", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/31.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=207886844&idx=1&sn=a6bd930b15f2fae88d4c4d34be6b5c73#rd");
							$content[] = array("Title"=>"世界这么大，想和尹明去看一看 ", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/32.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=207886844&idx=2&sn=afa8f45ed934ba6b86adf7430ae5d7fb#rd");
							$content[] = array("Title"=>"尹明俱乐部，等你活力加入 ", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/33.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=207886844&idx=3&sn=9d868fa261a444e871bc0f958d2f6ae5#rd");
				
							
							break;
						//近期活动
						case "jqhd":
							$content = array();
							
							$content[] = array("Title"=>"一开始我是拒绝的,但是尹明花园免费送《复仇者联盟2》的电影票呀! ", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/31.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=207880878&idx=1&sn=09a1064f2271c58909a404efbf799474#rd");
				
							
							break;
						case "wls":
							$content = "尹明微楼书正在建设中...";
							break;
						case "lianxi":
							$content = "城之中心，国宾居所 欢迎品鉴【尹明花园】 项目地址：吴中区太湖西路199号（东吴塔西500米） 品鉴热线：\n0512-88998899";
							break;
					}
					break;
			
				//点击菜单跳转链接时的事件推送 
				//case "VIEW":
					//$content = "跳转链接 ".$object->EventKey;
					//break;
				
				default:
					$content = "receive a new event: ".$object->Event;
					break;
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
				switch($keyword){
					//1
					case "516":
						$content = "【516】点击此处参加\n<a href='http://xyt.xy-tang.com/2015/yao2015/yao1.html'>抽奖</a>";
						break;
					//2
					case "520":
						$content = "【520】点击此处参加\n<a href='http://xyt.xy-tang.com/2015/yao2015/yao2.html'>抽奖</a>";
						break;	
					//3
					case "1314":
						$content = "【1314】点击此处参加\n<a href='http://xyt.xy-tang.com/2015/yao2015/yao3.html'>抽奖</a>";
						break;
					default:
						$content = "有任何疑问可咨询在线尹明客服东妹子哦~妹子有问必答，妹子在线时间为9：00—18：00（工作日），欢迎调戏~";
						break;
				}
			}else{
				$content = "";
			}
		
			//返回文本
		    $result = $this->transmitText($object, $content);
			return $result;
		}

		//接收图片消息
	
		//接收位置消息

		//接收语音消息 
		//语音识别 -- 可以开启或关闭  --- Recognition字段
		//语音识别 -- 中文分词(安装分词软件)

		//接收视频消息

		//接收链接消息

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

		//回复语音消息
		
		//回复视频消息
		

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
		

		//回复多客服消息
		

		//日志记录
		
		
					
	}//end
	
	
	
	