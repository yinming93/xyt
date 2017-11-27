<?php
$sql="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx86aac237f3306350&secret=18fb3a0232778b4c50a66a5a8e706aa5";
$str=file_get_contents($sql);
$back=json_decode($str,1);
$urlcon="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$back['access_token'];
$data='{
					 "button":[
					   {
						   "name":"菜单",
						   "sub_button":[
							{
							   "type":"click",
							   "name":"简介",
							   "key":"wls"
							},
							{
							   "type":"view",
							   "name":"产品",
							   "url":"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=205232888&idx=1&sn=1f53c3aec3e7fb26e79de5ab0ef2705f&scene=18#wechat_redirect"
							},
							{
							   "type":"view",
							   "name":"用户手册",
							   "url":"http://m.orientland.net/yhsy/index.html"
							},
							{
							   "type":"click",
							   "name":"联系我们",
							   "key":"lianxi"
							}]
					   },
					   {
						   "name":"尹明社区",
						   "sub_button":[
							{
							   "type":"click",
							   "name":"尹明生活",
							   "key":"sssh"
							},
							{
							   "type":"view",
							   "name":"尹明文化",
							   "url":"http://mp.weixin.qq.com/s?__biz=MzAxMzEzNjk5Ng==&mid=207224932&idx=1&sn=ed7ab13a62afe8d838a5518db5498a01&scene=18&uin=Mjg4NTY0ODI2Mg%3D%3D&key=1936e2bc22c2ceb56f88eda3131aa691874f585774bb3f40688c84a476746d1636c93cb758ad244f4389377113deb9ed&devicetype=Windows+7&version=61000721&lang=zh_CN&pass_ticket=lj7fGASlMZJrOHeWHBoNWFrqCeEO3Q4TjbnvUqMLWI0wJnWu5Z0oddoN3ZsAjXIn"
							},
							{
							   "type":"click",
							   "name":"尹明典故",
							   "key":"jrdg"
							}]
					   },
					   {	
						 "name":"微活动",
						   "sub_button":[
						    {
							   "type":"click",
							   "name":"粉丝福利",
							   "key":"fsfl"
							},
							{
							   "type":"click",
							   "name":"近期活动",
							   "key":"jqhd"
							}]
					   }
					 ]
					}';



	$ch = curl_init($urlcon);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Content-Length:'.strlen($data)));
	$data =curl_exec($ch);
	print_r($data);



