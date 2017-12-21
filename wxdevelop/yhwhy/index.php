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
				
					$content[] = array("Title"=>"CCTV少儿春晚颐和湾赛区人气评选投票开始啦！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/toup.jpg", "Url" =>"http://xyt.xy-tang.com/liu/liudistx4/plugin.php?id=tom_mengbao&vid=1");
						

					// $content = array();
					
					// $content[] = array("Title"=>"2015年吴中区第二届篮球联赛闭幕式暨颁奖晚会", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/619.jpg", "Url" =>"http://menu.xy-tang.com/active/xinyutang?ename=qiandao_yhw20150619");
					break;
					

					
				//取消关注后 ---- 再次回来
				case "unsubscribe":
					//$content = "欢迎再次关注颐和湾花园！\n点击此处即可参与<a href='http://xyt.xy-tang.com/2015n/yhw627'>苏州“颐和湾杯”第一届儿童歌唱大赛！</a>";
					$content[] = array("Title"=>"CCTV少儿春晚颐和湾赛区人气评选投票开始啦！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/toup.jpg", "Url" =>"http://xyt.xy-tang.com/liu/liudistx4/plugin.php?id=tom_mengbao&vid=1");
					// $content = array();
					
					// $content[] = array("Title"=>"2015年吴中区第二届篮球联赛闭幕式暨颁奖晚会", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/619.jpg", "Url" =>"http://menu.xy-tang.com/active/xinyutang?ename=qiandao_yhw20150619");
					
					break;
				
				//自定义菜单 -- 点击事件
				case "CLICK":
					switch ($object->EventKey){
						
						//苏式生活
						case "sssh":
							$content = array();
							
							$content[] = array("Title"=>"苏州清明习俗知多少？", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/1.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=207579627&idx=1&sn=f59ab6592e14a04a4843323f9743d755#rd");
							$content[] = array("Title"=>"春日好时光，不可辜负的姑苏美食！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/2.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=207579627&idx=2&sn=7817b8ba28f4f5c14dfbc3b68ffb3587#rd");
							$content[] = array("Title"=>"苏州最全赏梅攻略，忍不住就去吧！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/3.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=207579627&idx=3&sn=bc50110f3d6881c53168c629d6d6c072#rd");
							$content[] = array("Title"=>"美！终于等到你，2015年苏州的第一场雪 ", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/4.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=207579627&idx=4&sn=1722e8709540e36638e89e091fbec844#rd");
				
							
							break;

						//耐思电影
						case "nsdy":
							$content = array();
							
							$content[] = array("Title"=>"耐思电影| 《她》如云端情人惊艳你的夜晚", "Description"=>"夜幕降临后的古运河流光溢彩，柔和的月光挥洒在波光粼粼的河面上，倒映出沿岸的灯火辉煌。皓月高悬，夜色斑斓，我想", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/y3.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=400372404&idx=1&sn=d0eb89307787d798ac682f43b955d027#rd");

							break;

						//耐思学堂
						case "nsxt":
							$content = array();
							
							$content[] = array("Title"=>"耐思学堂∣周末彩泥秀，让孩子从我们的世界路过！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/y4.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=400372372&idx=1&sn=d5b1bb738aa51230e10145fe919e0911#rd");
							$content[] = array("Title"=>"耐思学堂 | 看尽旧时繁华 也爱现世美好", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/y5.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=400372372&idx=2&sn=33f55ac2c1f580174137e0ffd5dd268e#rd");
							$content[] = array("Title"=>"耐思学堂 | 枯枝“重生”，只需要一双巧手", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/y6.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=400372372&idx=3&sn=b979e95404c7912f4d9d710a51be445c#rd");
							$content[] = array("Title"=>"耐思学堂 | 有它小面创始人——黎叔，苏州创业嗨聊会", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/y7.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=400372372&idx=4&sn=b4720c959d0d82a33d82a1bad1f021b7#rd");

							break;

						//节日典故
						case "jrdg":
							$content = array();
							
							$content[] = array("Title"=>"古灵精怪的万圣节，还要搞什么“鬼”？", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/y8.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=400372090&idx=1&sn=9fa4ebcfb6ba08d3f9c7fad2c99550a9#rd");
							$content[] = array("Title"=>"无力抗拒丨朝晖送上的重阳糕", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/y9.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=400372090&idx=2&sn=babea05a50024eb0ae9c6ec2988b3c58#rd");
							$content[] = array("Title"=>"寒露 | 星稀凝寒露，月朗和清风", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/y10.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=400372090&idx=3&sn=3567881a0659225922cad251988fa05e#rd");
							$content[] = array("Title"=>"今日秋分 | 一种节气，一种风景，一种生活", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/y11.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=400372090&idx=4&sn=c2ace1819b41fa707c93e8d63098ea99#rd");
							$content[] = array("Title"=>"当我们在鬼节说鬼时，我们在恐惧什么？", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/y12.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=400372090&idx=5&sn=e41f571591bb673c645c4e595be58d4c#rd");

							
							break;
						//粉丝福利
						case "fsfl":
							// $content = array();
							
							// $content[] = array("Title"=>"【福利】仅此1天！你也可以免费拥有私人“医生”！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/31.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=208431803&idx=1&sn=63d75bf37e48f08add4959e67a403065#rd");
							// $content[] = array("Title"=>"【福利】爱就要疯狂！苏州这家鲜椒餐厅疯狂5.2折吃到爽！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/32.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=208431803&idx=2&sn=101e0e81006964d21b2e0763fc37ecef#rd");
							
				$content[] = array("Title"=>"别抢红包了！50块“分享”变500000元|我为颐和湾代言", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/50.jpg", "Url" =>"http://menu.xy-tang.com/active/xinyutang?ename=pay_20150802&from=singlemessage&isappinstalled=0&touserid=555eaa069b04df9a61a4f1c3");
							
							break;
						//近期活动
						case "jqhd":
							$content = array();
							
							$content[] = array("Title"=>"来吧，苏州首家售楼处书店将于11月7日完美绽放！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/y1.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=400372490&idx=1&sn=1cb0c2db73c1ab4439ad5f608e9e2f3b#rd");
							$content[] = array("Title"=>"谁是人气王？2016少儿春晚颐和湾赛区最佳人气选手投票开始啦！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/y2.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=400372490&idx=2&sn=ecb9022d732d1b46fbc732f6340cbbc3#rd");
							// $content[] = array("Title"=>"“全城热恋”震撼上演！上千人齐聚颐和湾花园！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/b2.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=208404481&idx=2&sn=60adc413b4fe67a22a3d29d851f86461#rd");
							// $content[] = array("Title"=>"全家总动员｜五一嗨皮去哪儿？", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/b3.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=208404481&idx=3&sn=8c17413092ab32afb06a8284a9864228#rd");
							// $content[] = array("Title"=>"同城活动｜约吗？你的周末，我来安排！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/b4.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=208404481&idx=4&sn=683c2885e0f29c4d6e1e781e0c5ddd95#rd");
							// $content[] = array("Title"=>"10元众筹阿玛尼香水，电影票免费拿！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/b5.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=208404481&idx=5&sn=2fc7980c2bc72a0270504c8ba9e27f11#rd");
							// $content[] = array("Title"=>"阿玛尼『苏州·牡丹』中国首秀圆满落幕！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/b6.jpg","Url"=>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=208404481&idx=6&sn=2cc8294bcf1cb8bae3ecb74fb0568c6b#rd");

							// $content[] = array("Title"=>"别抢红包了！50块“分享”变500000元|我为颐和湾代言", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/50.jpg", "Url" =>"http://menu.xy-tang.com/active/xinyutang?ename=pay_20150802&from=singlemessage&isappinstalled=0&touserid=555eaa069b04df9a61a4f1c3");
							break;
						case "wls":
							$content = "微楼书正在建设中...";
							break;
						case "lianxi":
							$content = "城之中心，国宾居所 欢迎品鉴【颐和湾花园】 项目地址：吴中区太湖西路199号（东吴塔西500米） 品鉴热线：\n0512-88998899";
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
				switch( trim($keyword) ){
					//1
					//case "516":
						//$content = "【516】点击此处参加\n<a href='http://xyt.xy-tang.com/2015/yao2015/yao1.html'>抽奖</a>";
						//break;
					//2
					//case "520":
						//$content = "【520】点击此处参加\n<a href='http://xyt.xy-tang.com/2015/yao2015/yao2.html'>抽奖</a>";
						//break;	
					//3
					//case "1314":
						//$content = "【1314】点击此处参加\n<a href='http://xyt.xy-tang.com/2015/yao2015/yao3.html'>抽奖</a>";

					//儿童节
					case "上春晚":
						$content = array();
					
						$content[] = array("Title"=>"CCTV少儿春晚颐和湾赛区人气评选投票开始啦！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/toup.jpg", "Url" =>"http://xyt.xy-tang.com/liu/liudistx4/plugin.php?id=tom_mengbao&vid=1");
						break;
					//钢琴
// 					case "钢琴":
// 						$content = array();
					
// 						$content[] = array("Title"=>"【福利】音乐会门票免费送！近距离接触国际钢琴大师科妮丽雅·赫尔曼！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/624.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=209716620&idx=1&sn=0ad3c7f0347d46dadd506185c189b5cc&scene=4#wechat_redirect");
// 						break;	
// 					default:
// 						$content = "有任何疑问可咨询在线客服东妹子哦~妹子有问必答，妹子在线时间为9：00—18：00（工作日），欢迎调戏~";
// 						break;

// 					case "报名":
// 						$content = array();
					
// 						$content[] = array("Title"=>"报名吧！苏州“颐和湾杯”第一届儿童歌唱大赛！
// ", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/baoming.jpg", "Url" =>"http://xyt.xy-tang.com/2015n/yhw627");
// 						break;

// 					//
// 					case "嘉年华":
// 						$content = array();
					
// 						$content[] = array("Title"=>"点击此处参与第二届“玩博会”暨新蕾乐园嘉年华的抢票活动", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/77.jpg", "Url" =>"http://menu.xy-tang.com/active/xinyutang?ename=zhuli_yhw0707");
// 						break;


// 					case "50万":
// 						$content = array();
// 						$content[] = array("Title"=>"别抢红包了！50块“分享”变500000元|我为颐和湾代言", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/50.jpg", "Url" =>"http://menu.xy-tang.com/active/xinyutang?ename=pay_20150802&from=singlemessage&isappinstalled=0&touserid=555eaa069b04df9a61a4f1c3");
// 						break;


// 					case "碟中谍5":
// 						$content = array();
// 						$content[] = array("Title"=>"亚洲最大巨幕观影，碟中谍5抢票中", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/dzd.png","Url" =>"http://menu.xy-tang.com/active/xinyutang?ename=zhuli_yhw0908");
// 						break;

// 					case "邀请函":
// 						$content = array();
// 						$content[] = array("Title"=>"你有一封实景园林《牡丹亭》邀请函请注意查收！", "Description"=>"", "PicUrl"=>"http://xyt.xy-tang.com/developer/yhwhy/img/mdt.jpg","Url" =>"http://xyt.xy-tang.com/2015n/hejunObj/yihewan/fanyekunqu/?code=0314fd5c9cc3333d44378c9db10853fb&state=1");
// 						break;
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
			/* return $result; */
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
	
	
	
	