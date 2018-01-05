<?php
	//引入js类文件
	 require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
    if(isset($_GET['code'])){
        include 'func.php';
        define('CODE', $_GET['code']);
        define('APPID', 'wx461b5105da7629f1'); 
        define('APPSECRET', 'd80e5eb9158f81ed612f7b6810fb9093'); 
        //1
        //获页面授权的ACCESS_TOKEN 、 refresh_token、openid、 scope的类型
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".CODE."&grant_type=authorization_code";
        $json_access_token = https_request($url);
        $arr_access_token  = json_decode($json_access_token, true); //获取access_token
        //2.
        $openid = $arr_access_token['openid'];
        // var_dump($openid);
        // exit;
        // $wxname=$userinfo_arr['nickname'];
        // $wximg=$userinfo_arr['headimgurl'];
        // $wxsex=$userinfo_arr['sex'];
        // echo $wxsex;
		include 'db.php';
        $query=mysql_query("select *from $tbname where openid='$openid'");

        $row=mysql_fetch_array($query);
        // var_dump($row);die;
        
    } else{
        //echo "NO CODE";
        echo '操作失败！';
        exit;
        //写入日记文件
    }
  if(!$openid){
 	echo "<script>";
 	echo "window.location.href='http://xytang88.com/yin/bm/xincheng0102/getcodeurl.php';";
 	echo "</script>";
 	exit;
 }
 // if ($row){
	// echo "<script>";
	// echo "$('#box').css('display','none');";
	// echo "$('#shuzi').css('display','block');";
	// // echo "alert('已参与过')";
	// echo "</script>";
 // }
  // 当前时间戳
  $xz=time();
  // 活动结束时间
  // $js=strtotime('2017-05-28 17:59:00');
  // if ($xz>$js){
  // echo "<script>";
  // echo "window.location.href='indexj.php'";
  // echo "</script>";
  // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>入会申请表</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<style>
	body{
		margin: 0px;
		padding: 0px;
		font-family: "微软雅黑";
		background-color: white;
		}
	.box{
    	width: 100%;
        margin: 0px;
        padding: 0px;
		position: absolute;
		background-color: white;
		top:0px;
		left:0px;
		overflow: hidden;
		}
	#tu{
	    width: 100%;
	   }
	.main h2{
		color: #333333;
		font-weight: bold;
	}
	.main{
		width: 90%;
		margin-left: 5%;
	}
	.main p{
		font-size: 0.8em;
		color: #3c3c3c;
	}
	.main hr{
		border: 1px dashed #ccc;
	}
	.tt{
		font-size: 0.9em;
		color: #333;
	}
	.red{
		color: red;
	}
	.kuang{
		width: 100%;
		height: 40px;
		display: block;
		border-radius: 3px;
		border: 1px solid #999;
		color: #333;
		box-sizing: border-box;
		line-height: 1.4;
	}
	.dakuang{
		width: 100%;
		height: 80px;
		display: block;
		border-radius: 3px;
		border: 1px solid #999;
		color: #333;
		box-sizing: border-box;
		line-height: 1.4;
	}
	.bn{
		width: 100%;
		height: 40px;
		background-color: #339900;
		color: white;
		border-radius: 3px;
		border:0;
		line-height: 40px;
		text-align: center;
	}
	</style>

<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
</head>
<body>
	<div class="box">
	<img id="tu" src="<?php if(!$row){ echo 'images/bg1.jpg';}else{echo 'images/cg.jpg';} ?>">
		<div class="main">
			<h2>MOC芯城汇产城联盟会员入会申请表</h2>
			<p>
				MOC芯城汇“产城联盟”实行严格的实名制、会员制、邀请制。对所有符合本章程规定条件的人士开放，根据本章程规定的推荐审核程序通过后，方可加。
			</p>
			<br>
			<hr>
			<form action="add.php" method="POST" style="<?php if ($row){echo 'display: none';} ?>;">
				<input type="hidden" name="openid" value="<?php echo $openid; ?>">
				<label class="tt">姓名<span class="red">*</span></label>
				<input class="kuang" type="text" name="p1">
				<br>
				<label class="tt">性别<span class="red">*</span></label>
				<input class="kuang" type="text" name="p2">
				<br>
				<label class="tt">出生日期（公历年月日）<span class="red">*</span></label>
				<input class="kuang" type="text" name="p3">
				<br>
				<label class="tt">个人爱好<span class="red">*</span></label>
				<input class="kuang" type="text" name="p4">
				<br>
				<label class="tt">手机<span class="red">*</span></label>
				<input class="kuang" type="tel" name="p5">	
				<br>
				<label class="tt">所在城市<span class="red">*</span></label>
				<input class="kuang" type="text" name="p6">
				<br>
				<label class="tt">E-mail<span class="red">*</span></label>
				<input class="kuang" type="text" name="p7">
				<br>
				<label class="tt">籍贯<span class="red">*</span></label>
				<input class="kuang" type="text" name="p8">
				<br>
				<label class="tt">通讯地址<span class="red">*</span></label>
				<input class="kuang" type="text" name="p9">
				<br>
				<label class="tt">微信号<span class="red">*</span></label>
				<input class="kuang" type="text" name="p10">
				<br>
				<label class="tt">公司名称<span class="red">*</span></label>
				<input class="kuang" type="text" name="p11">
				<br>
				<label class="tt">职务<span class="red">*</span></label>
				<input class="kuang" type="text" name="p12">
				<br>
				<label class="tt">所属行业<span class="red">*</span></label>
				<input class="kuang" type="text" name="p13">
				<br>
				<label class="tt">公司规模（人）<span class="red">*</span></label>
				<input class="kuang" type="tel" name="p14">
				<br>
				<label class="tt">教育经历<span class="red">*</span></label>
				<textarea name="p15" class="dakuang"></textarea>
				<br>
				<label class="tt">工作经历<span class="red">*</span></label>
				<textarea name="p16" class="dakuang"></textarea>
				<br>
				<label class="tt">公司简介<span class="red">*</span></label>
				<textarea name="p17" class="dakuang"></textarea>
				<br>
				<label class="tt">我能帮助会员做什么<span class="red">*</span></label>
				<textarea name="p18" class="dakuang"></textarea>
				<br>
				<label class="tt">我能会员能帮助我什么<span class="red">*</span></label>
				<textarea name="p19" class="dakuang"></textarea>
				<br>
				<label class="tt">我能帮助MOC芯城汇产城联盟做什么<span class="red">*</span></label>
				<textarea name="p20" class="dakuang"></textarea>
				<br>
				<label class="tt">我希望MOC芯城汇产城联盟能支持我什么<span class="red">*</span></label>
				<textarea name="p21" class="dakuang"></textarea>
				<br>
				<label class="tt">擅长的专业领域<span class="red">*</span></label>
				<textarea name="p22" class="dakuang"></textarea>
				<br>
				<label class="tt">意愿分享的内容<span class="red">*</span></label>
				<textarea name="p23" class="dakuang"></textarea>
				<br>
				<br>
				<label class="tt">联系人：</label>
				<p>企业家俱乐部经理 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;XXX &nbsp;电话：XXX &nbsp;手机：XXX（即微信）</p>
				<p>企业家俱乐部商务经理 &nbsp;周XXX&nbsp;电话：XXX&nbsp;手机：XXX（即微信）</p>
				<p>备 &nbsp;注：</p>
				<p>会员申请表手机版电子表单可直接提交</p>
				<p>会员申请表（word版本）填写完整后请发送至会员部邮箱:XXX@QQ.com</p>
			
				<!-- <input class="bn" name="sub" type="button" value="提交"> -->
				<div class="bn" id="tj">提交</div>
			</form>
			<br>
			<p style="text-align:center;">技术支持：信玉堂|草帽互动</p>
			<!-- <p id="two" style="<?php if (!$row){echo 'display: none';} ?>;width:66%;position:absolute;top:82%;left:17%;background-color:transparent;border:0;color:black;font-size:1.5em;text-align:center;">恭喜您<br>已成功报名</p> -->
		</div>
	</div>
</body>
</html>
<script>
	$("#tj").on("click",function(){
		$.ajax({
		url:'add.php',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){
			if(m=='chong'){
				alert("请勿重复提交！");
			}
			if(m=='ok'){
				// alert("报名成功！");
				window.location.href='getcodeurl.php';

			}  
			if(m=='m'){
				alert("报名人数已满！");
				window.location.href='getcodeurl.php';
			}    				
			if(m=='tel'){
				alert("手机号格式不正确！");
			}    				
			if(m=='wan'){
				alert("请完善信息！");
			}
			if(m=='sb'){
				alert("插入数据库失败！");
			}
		}
		})
	})
</script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>	
    <script type="text/javascript">
	wx.config({
		    debug: false,
		    appId: '<?php echo $signPackage["appId"];?>',
		    timestamp: '<?php echo $signPackage["timestamp"];?>',
		    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
		    signature: '<?php echo $signPackage["signature"];?>',
		    jsApiList: [
		"onMenuShareTimeline","onMenuShareAppMessage"
		    ]
		  });
		 wx.ready(function () {
		var shareinfo={
		 	 title: '会员申请表',
		      desc: '会员申请表',
		      link: 'http://xytang88.com/yin/bm/xincheng0102/getcodeurl.php',
		      imgUrl: 'http://xytang88.com/yin/bm/xincheng0102/images/bg1.jpg'}
		      wx.onMenuShareTimeline(shareinfo);
		 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>