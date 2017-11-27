<?php
	/*
     * 【 东壹元家居生活广场 】
	 * 
	 *
	 *
	 * author： WangKai
	 * date： 2015.04.27
	 * mail：wangkaisd@163.com
	 */
	
	 
	//声明一个常量定义一个token的值
	define("TOKEN", "yhwhywx");
	
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
					// $content = array();
					// $content[] = array("Title"=>"正荣携手神州专车开启专车看房时代，点击即可预约看房", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/zrgl/img/3.jpg", "Url" =>"http://m.focus.cn/suzhou/zhuanti15/szjdzczr");
	
				$content = "中梁天颂    详情请致电贵宾热线：0512-6288 8808
城南中心、中环旁、临学府，ArtDeco风格精致电梯洋房、小高层，低密度高绿化率舒适社区 。百强中梁品质典范，打造城南稀缺高尚第一盘！项目地址：江苏省苏州市吴中区临湖镇浦庄大道与锦福路交汇（临湖实验中学北侧）
临时接待中心地址：江苏省苏州市吴中区临湖镇木东路与浦镇路交汇（浦庄加油站向西50米）";
				
				//取消关注后 ---- 再次回来
				case "unsubscribe":
					// $content = array();		
					// $content[] = array("Title"=>"正荣携手神州专车开启专车看房时代，点击即可预约看房", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/zrgl/img/3.jpg", "Url" =>"http://m.focus.cn/suzhou/zhuanti15/szjdzczr");
					$content = "中梁天颂    详情请致电贵宾热线：0512-6288 8808
城南中心、中环旁、临学府，ArtDeco风格精致电梯洋房、小高层，低密度高绿化率舒适社区 。百强中梁品质典范，打造城南稀缺高尚第一盘！项目地址：江苏省苏州市吴中区临湖镇浦庄大道与锦福路交汇（临湖实验中学北侧）
临时接待中心地址：江苏省苏州市吴中区临湖镇木东路与浦镇路交汇（浦庄加油站向西50米）";
					break;
				
				//自定义菜单 -- 点击事件
				case "CLICK":
					switch ($object->EventKey){
						//多图文
						// case "zixun":
						// 	$content = array();
							
						// 	// $content[] = array("Title"=>"东壹元送粽子啦，开抢！", "Description"=>"", "PicUrl"=>"https://mmbiz.qlogo.cn/mmbiz/5Nr8ZLoBuficcrfmedk3xXuCC9OCRuI5hOfmAZHpoXgJARoTJ6DVdI7YtOYohmqMAyaeD3jqeAiabQW4OG8dWb2g/0?wx_fmt=jpeg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MjM5Mjc3MTU5OA==&mid=211415854&idx=1&sn=d44c164d659d13b5f03a85922738755c#rd");
						// 	$content[] = array("Title"=>"东壹元杯丨少儿才艺大赛火热报名中！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/dyy/img/www.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MjM5Mjc3MTU5OA==&mid=211413179&idx=1&sn=8bf276b7636f31feec6c483ed98f42be#rd");
						// 	$content[] = array("Title"=>"选铺如找对象，很难也很简单！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/dyy/img/yy2.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MjM5Mjc3MTU5OA==&mid=211840296&idx=1&sn=e44220c5c0b12794c73cdc5ef4aac139#rd");
						// 	$content[] = array("Title"=>"特大优惠，duang的来了！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/dyy/img/1.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MjM5Mjc3MTU5OA==&mid=210750550&idx=2&sn=c79a4964991138b10bb093d3be5ca361#rd");
						// 	$content[] = array("Title"=>"重磅消息：众多国际大牌进驻东壹元香江家居", "Description"=>"", "PicUrl"=>"https://mmbiz.qlogo.cn/mmbiz/5Nr8ZLoBuficwlBDhZ9hvBGtEib4tekyQKpUOrBQIBtHh1ISPBpbwTo38Xn7It4d7J5Woyjpl9wfQwEibroJFLYrg/0?wx_fmt=png", "Url" =>"http://mp.weixin.qq.com/s?__biz=MjM5Mjc3MTU5OA==&mid=211029944&idx=2&sn=21b979debf1035231f9758c878057afb#rd");
						// 	$content[] = array("Title"=>"买铺养老最靠谱！", "Description"=>"", "PicUrl"=>"https://mmbiz.qlogo.cn/mmbiz/5Nr8ZLoBuf8G6AzTZ572Jub7xaah3H47PeA4pK1fH2UIhdMWbibvBl4bIYHNE4ELiawYniatIdnRFPsMpPgBhTBBQ/0?wx_fmt=jpeg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MjM5Mjc3MTU5OA==&mid=211029944&idx=1&sn=4ae01f0f9925916375b7055c8757a02e#rd");
						// 	$content[] = array("Title"=>"买铺合算，必须狠赚！", "Description"=>"", "PicUrl"=>"https://mmbiz.qlogo.cn/mmbiz/5Nr8ZLoBuficcrfmedk3xXuCC9OCRuI5hp4I8x7dXWVRh5XohSQQialV6AoUx44icCfaY8VffOoBviaSdZ0UELF3iaw/0?wx_fmt=png", "Url" =>"http://mp.weixin.qq.com/s?__biz=MjM5Mjc3MTU5OA==&mid=211221835&idx=2&sn=1718d85b6e2aa642ebd4b32cc83ce0f0#rd");
						// 	$content[] = array("Title"=>"假如杜甫有个旺铺！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/dyy/img/44.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MjM5Mjc3MTU5OA==&mid=209928129&idx=1&sn=f1bc26da22361e5d7a941a578199cf85#rd");
							
						// 	break;
						case "wls":
							$content = "微楼书正在建设中......";
							break;						
						case "vip":
							$content = "联系电话0512-XXXXXXXX......";
							break;						
						case "xmdt":
							$content = "项目动态稍后奉上......";
							break;						
						case "h1":
							$content = array();
							
							$content[] = array("Title"=>"活动一", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/1.jpg", "Url" =>"");
							break;
						case "fensi":
							$content = "感谢你们，稍后继续......";
							break;
						case "fuli":
							$content = array();
							
							$content[] = array("Title"=>"福利稍后", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/y8.jpg", "Url" =>"");
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
			
			if(isset($keyword)){
				if( trim($keyword) == "熊抱" ){
					$content = '请点击此处 <a href="http://menu.xy-tang.com/active/xinyutang?ename=zhuli_zr0701"> http://menu.xy-tang.com/active/xinyutang?ename=zhuli_zr0701 </a>  抢薰衣草小熊啦~';
					// $content[] = array("Title"=>"东壹元千份夏日礼全城送！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/dyy/img/sq1.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MjM5Mjc3MTU5OA==&mid=210404896&idx=1&sn=10ee7722340678b1d02465158f6fc342#rd");
				}else if(trim($keyword) == "蓝精灵"){
					$content = '请点击此处 <a href="http://menu.xy-tang.com/active/xinyutang?ename=zhuli_zr0709"> http://menu.xy-tang.com/active/xinyutang?ename=zhuli_zr0709 </a> 抢《蓝精灵》门票啦~';
				}else if(trim($keyword) == "终结者"){
					$content = '请点击<a href="http://menu.xy-tang.com/active/xinyutang?ename=zhuli_zr0818"> 此处 </a> 抢正荣国领《终结者5》电影票啦~';
				}else if(trim($keyword) == "大阅兵"){
					$content = '请点击<a href="http://menu.xy-tang.com/active/xinyutang?ename=zhuli_zr0901"> 此处 </a> 点击此处 “为祖国点赞”抢正荣国领大礼包啦！~';
				}
			}else{
				$content = "资源正在建设中......";
			}
			
			//数组或文本
			if(is_array($content)){
				$result = $this->transmitNews($object, $content);	
			}else{
				$result = $this->transmitText($object, $content);
			}
			
			//返回文本
		   // $result = $this->transmitText($object, $content);
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
	
	
	
	