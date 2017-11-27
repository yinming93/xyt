<?php
	/**
	 * action页面 
	 *
	 *
	 * auther:WangKai
	 * date:2015/03/29
	 * email:wangkaisd@163.com
	 *
	 */
	
	include_once'common/model.php';	
	
	//创建praise表对象
	$praise_model = new Model('praise');		
	
	//创建user_info表对象
	$user_model = new Model('user_info');	
	
	//创建share表对象
	//$share_model = new Model('share');		

//===============================================================	
	//判断行为
	switch( $_POST['praise'] ){
		//判断我是否为ta点过赞
		case 'a':
				  praiseA($praise_model);
				  break;  
		//我为ta点赞
		case 'b':
				  praiseB($praise_model);
				  break;  
		//查看谁为ta点赞的列表
		case 'c':
				  praiseC($praise_model, $user_model);
				  break;  
		//查询用户信息
		case 'd':
				  praiseD($user_model);
				  break; 
		default:
				  break;
	}
	
	
	
//====================================================	
	//判断我是否为ta点过赞
	function praiseA($model){
		//查询是否存在--被点赞人openid和点赞人who
		$list = $model->where( array('openid'=>$_POST['my_openid'],'who'=>$_POST['openid']) )->select();
		//p($list );
		if( empty($list) ){
			//openid没有赞过my_openid
			echo 'openid没有赞过my_openid';
			//exit;
		}else{
			echo 'yes';
		}
		
	}
	
	//我为ta点赞
	function praiseB($model){
		/*
		 * 完善： 先查询是否已经点过赞
		 *
		 *
		 */
		
		
		
		
		
		//插入被点赞人openid和点赞人who
		$res = $model->insert( array('openid'=>$_POST['my_openid'],'who'=>$_POST['openid']) );
		/* if( $res ){
			echo 'yes';
		}else{
			
			echo 'no';
		} */
		echo 'yes';
		
		/*
		*  注意：数据插入成功，但是返回值$res,总是不对
		*        可以使用pdo改进
		*
		*/
	}
//====================================================================================	
	/*
	 * 若是大型项目必须点击加载动态输出用户的消息
	 * 此次项目中只是使用点击一次一次性将有的 消息都输出的  --- 不好
	 *
     *
	 *
	 */
	
	//查看谁为ta点赞的列表  --- praise表
	function praiseC($praise_model, $user_model){
		//查询
		$list = $praise_model->where( array('openid'=>$_POST['my_openid']) )->select();
		//p($list );
		if( empty($list) ){
			//没有人赞过my_openid
			echo 'no';
			exit;
		}else{
		//$list 列表
			//用户列表
			$user_list[] = array();
			//unset($list[0]);//干掉第0个字段  --- mysql的自增id从1开始
			foreach( $list as $v ){
				
				//查询每个who的user_info信息
				$user_list[] = $user_model->where( array('openid'=>$v['who']) )->select();
			}
			
unset($user_list[0]);//?????????
	
			foreach( $user_list as $v ){
				//循环去除'[ ]'
				$str = json_encode( $v );
				$str_new = trim($str,'[ ]');
				$str_put .= $str_new .'·';
			}
			
			echo rtrim($str_put,'·');
			
		/*	//测试单个
			//$str = json_encode( $user_list[1] );
			//$str_new = trim($str,'[ ]');
			//$str = str_replace("},{", "}-{", $str_new);
			//echo $str_new; 
		*/	
		/* 	
			$str = json_encode($list);
			$str_new = trim($str,'[ ]');// 格式 '{"name":"wangkai","age":"28"}-{"name":"wangkai","age":"28"}'
			//str_replace("world","John","Hello world!");
			$str = str_replace("},{", "}-{", $str_new);// 格式 '{"name":"wangkai","age":"28"}-{"name":"wangkai","age":"28"}'
			
			echo $str;
		 */
		
		}
		
	}//end
	
	
//===============================================================================================
	//分享时用到的对方的信息
	function praiseD($model){
		//
		$list = $model->where( array('openid'=>$_POST['my_openid']) )->select();
		//p($list );
		if( empty($list) ){
			//openid没有赞过my_openid
			echo 'no';
			exit;
			//$str = print_r($list, true);
			//error_log($str,3,"./post.log");
			//echo json_encode($list);
		}else{
		    //日志文件
			//error_log($str,3,"./post.log");
			//json文件
			//对变量进行 JSON 编码 返回 value 值的 JSON 形式 
			// '[{"name":"wangkai","age":"28"}]' json格式字符串 
			
			
			//echo json_encode($list);// 格式 '[{"name":"wangkai","age":"28"}]';
			$str = json_encode($list);
			$str_new = trim($str,'[ ]');// 格式 '{"name":"wangkai","age":"28"}'
			echo $str_new;
		}
	}
	 
	 
	//结束
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 