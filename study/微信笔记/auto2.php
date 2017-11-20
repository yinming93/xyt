<?php
/**
  * wechat php test
  */

//define your token
define("TOKEN", "yinming");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->responseMsg();
// if(!isset($_GET['echostr'])){
//     //调用WeChat对象中的方法响应用户消息
//     $wechatObj->responseMsg();
// }else{
//     //验证token
//     $wechatObj->valid();
// }

class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;//开发者信息
                // $type=$postObj->MsgType;
                $keyword = trim($postObj->Content);
                $time = time();

                //==============返回使用的东西========================
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <ArticleCount>4</ArticleCount>
                            <Articles>
                                <item>
                                <Title><![CDATA[尹明大集体中文网]]></Title>
                                <Description><![CDATA[这里是尹明大集体中文网简介摘要，看不懂是你蠢，不要瞎逼比]]></Description>
                                <PicUrl><![CDATA[http://pica.nipic.com/2007-11-09/2007119124513598_2.jpg]]></PicUrl>
                                <Url><![CDATA[http://user.qzone.qq.com/934162347/infocenter?ptsig=GvALr8QVN3JLoOOs5JN93y1AUZYuTbelqcAzu8NVMrY_]]></Url>
                                </item>
                                <item>
                                <Title><![CDATA[尹明商城大促销咯]]></Title>
                                <Description><![CDATA[尹明商城手机数码大促销啦，快来抢购吧！]]></Description>
                                <PicUrl><![CDATA[http://pic33.nipic.com/20130911/2361655_151952004314_2.jpg]]></PicUrl>
                                <Url><![CDATA[http://user.qzone.qq.com/934162347/infocenter?ptsig=GvALr8QVN3JLoOOs5JN93y1AUZYuTbelqcAzu8NVMrY_]]></Url>
                                </item>
                                <item>
                                <Title><![CDATA[尹明水上乐园]]></Title>
                                <Description><![CDATA[夏季去哪儿？当然是尹明水上乐园，现在下单抢票半价哦，赶快行动把！]]></Description>
                                <PicUrl><![CDATA[http://img4.cache.netease.com/travel/2011/6/17/2011061712240732c63.jpg]]></PicUrl>
                                <Url><![CDATA[http://user.qzone.qq.com/934162347/infocenter?ptsig=GvALr8QVN3JLoOOs5JN93y1AUZYuTbelqcAzu8NVMrY_]]></Url>
                                </item>
                                <item>
                                <Title><![CDATA[尹明大厦]]></Title>
                                <Description><![CDATA[买房去哪儿？当然是尹明大厦，近千款户型供你选择，心动不如行动！]]></Description>
                                <PicUrl><![CDATA[http://pic15.nipic.com/20110725/5269583_200714379173_2.jpg]]></PicUrl>
                                <Url><![CDATA[http://user.qzone.qq.com/934162347/infocenter?ptsig=GvALr8QVN3JLoOOs5JN93y1AUZYuTbelqcAzu8NVMrY_]]></Url>
                                </item>
                            </Articles>
							</xml>";             
				if(!empty( $keyword ))
                {
                    if($keyword=="新闻"){
                        $msgType = "news";
                        $textTpl = $textTpl;
                    }else{
                        $msgType = "text";
                        $textTpl="
                        <xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        </xml>
                        ";
                    }
              		
                	$contentStr = "亲，试试看输入“新闻”吧！".['Y-M-D h:i:s'];
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>