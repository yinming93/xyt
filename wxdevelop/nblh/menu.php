<meta charset="utf-8">
<pre>
<?php

	header("Content-type:text/html;charset=utf-8");
		//服务号：苏州地铁网
	define('APPID', 'wxfd04fde126335448'); 
    define('APPSECRET', '5269348321ccd0f2acd6ea3dc099edf9'); 
	
	$filename = "json.txt";

	if(file_exists($filename)) {
		$arr=json_decode(file_get_contents($filename), true);
		
	}



function my_json_encode($type, $arr){
	if(PHP_VERSION >= '5.4'){
		$str = json_encode($arr,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
	}else{
		switch($type){
			case 'text':
				isset($arr['text']['content']) && ($arr['text']['content'] = urlencode($arr['text']['content']));
				break;
		}
		$str = urldecode(json_encode($arr)); 
	}
	
	return $str;
}
	




	if(isset($_POST['do_submit'])) {
		for($i=0; $i<3; $i++) {
		
			//指定下标
			$button = "button_{$i}";
			$sub_button = "sub_button_{$i}_0";
			$type = "type_{$i}";
			$urlkey = "urlkey_{$i}";

			//如果有子菜单
			if(trim($_POST[$sub_button])!="") {
				for($j=0; $j<5; $j++) {
					$sub_button = "sub_button_{$i}_{$j}";
					$sub_type = "type_{$i}_{$j}";
					$sub_urlkey = "urlkey_{$i}_{$j}";	

					if(trim($_POST[$sub_button]) != "") {
						$menuarr['button'][$i]['name']=$_POST[$button];

						if($_POST[$sub_type]=="key") {
							$menuarr['button'][$i]['sub_button'][$j]['type']= "click";
							$menuarr['button'][$i]['sub_button'][$j]['name'] = $_POST[$sub_button]; 
							$menuarr['button'][$i]['sub_button'][$j]['key'] =$_POST[$sub_urlkey];	
						}else if($_POST[$sub_type]=="url") {
							$menuarr['button'][$i]['sub_button'][$j]['type']= "view";
							$menuarr['button'][$i]['sub_button'][$j]['name'] = $_POST[$sub_button]; 
							$menuarr['button'][$i]['sub_button'][$j]['url'] =$_POST[$sub_urlkey];					
						}
					}
				
				}



			
			}else {
				
				
				if(trim($_POST[$button])!="") {

					if($_POST[$type]=="key") {
						$menuarr['button'][$i]['type']= "click";
						$menuarr['button'][$i]['name'] = $_POST[$button]; 
						$menuarr['button'][$i]['key'] =$_POST[$urlkey];	
					}else if($_POST[$type]=="url") {
						$menuarr['button'][$i]['type']= "view";
						$menuarr['button'][$i]['name'] = $_POST[$button]; 
						$menuarr['button'][$i]['url'] =$_POST[$urlkey];					
					}

				

				}
			}
		}
			
			//数组格式
			echo "打印数组";	echo '<br>';
			var_dump($menuarr);
			echo '<br>';
		
			$jsonmenu = my_json_encode("text", $menuarr);
			//$jsonmenu = json_encode( $menuarr );
			
			//json格式
			echo "打印json";	echo '<br>';
			var_dump($jsonmenu);
			echo '<br>';
			
			
			$access_token = get_token();

			$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
			$result = https_request($url, $jsonmenu);
			
			
			//打印返回码
			echo "打印返回码";	echo '<br>';
			var_dump($result);



	}

	//获取access_token
	function get_token() {
	
		$appid=APPID;
		$secret=APPSECRET;

		$json=https_request("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$secret}");

		$arr= json_decode($json, true);

		$access_token = $arr["access_token"];

		return $access_token;
	}

	
	
	function https_request($url, $data = null){
		$curl = curl_init();
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
	



?>

	







<title>菜单管理</title>
<h1>菜单管理</h1>
<p>不需要设计的菜单留空就可以！</p>
<table border="1">
<form action="" method="post">
	<tr>
		<th>序号</th> <th>一级菜单</th> <th>子菜单</th>
	</tr>

	<?php
		for($i=0; $i<3; $i++) {
			$key="";

			if($arr['button'][$i]['type'] == 'view') {
				$key="url";
			}else if($arr['button'][$i]['type'] == 'click'){
				$key="key";
			}

	?>

	<tr>
		<th>菜单 <?php echo $i ?>:</th>
		<td>
			<input type="text" size="10" name="button_<?php echo $i ?>" value="<?php echo $arr['button'][$i]['name'] ?>"> <br>
			
			<input type="radio" name="type_<?php echo $i ?>" <?php if($key == 'url' || $key=="") echo "checked" ?> value="url"> 	链接 <br>
			<input type="radio" name="type_<?php echo $i ?>"  <?php if($key == 'key') echo "checked" ?> value="key"> 模拟关键字<br>
			<input type="text" name="urlkey_<?php echo $i ?>" size="30" value="<?php echo $arr['button'][$i][$key] ?>"> 
		</td>
		<td>
			<?php 
				for($j=0; $j<5; $j++) {



				if($arr['button'][$i]['sub_button'][$j]['type'] == 'view') {
					$k="url";
				}else if($arr['button'][$i]['sub_button'][$j]['type'] == 'click'){
					$k="key";
				}
			?>

			<p>
			<?php echo $j ?> 名称: <input type="text" size="10" name="sub_button_<?php echo $i."_".$j ?>" value="<?php echo $arr['button'][$i]['sub_button'][$j]['name'] ?>"> &nbsp;
				<input type="radio" name="type_<?php echo $i."_".$j ?>" <?php if($k == 'url') echo "checked" ?> value="url"> 	链接 &nbsp;  <input type="radio" name="type_<?php echo $i."_".$j ?>" <?php if($k == 'key') echo "checked" ?>  value="key"> 模拟关键字  &nbsp;
				<input type="text" name="urlkey_<?php echo $i."_".$j ?>"  value="<?php  echo $arr['button'][$i]['sub_button'][$j][$k] ?>"  size="30"> 
			</p>

			<?php
				}
			?>

		
		</td>
	</tr>
	<?php
		}
			file_put_contents($filename, $jsonmenu);
	?>		
	<tr>
		<td colspan="3" align="center"><br><input type="submit" name="do_submit" value="设置菜单"><br></td>
	</tr>
</form>
</table>
