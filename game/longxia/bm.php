<?php
    //引入js类文件
     require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();

    session_start();   
    $token = md5(uniqid(rand(), true));     
    $_SESSION['token']= $token;

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
        // var_dump($row);die;
    } else{
        //echo "NO CODE";
        echo '操作失败！';
        exit;
        //写入日记文件
    }
 // 当前时间戳
    // $xz=time();
    // // 活动结束时间
    // $js=strtotime('2017-04-03 23:59:59');
    // if ($xz>$js){
    // echo "<script>";
    // echo "alert('本次活动已圆满结束，感谢您的参与！');";
    // echo "window.location='sel.php'";
    // echo "</script>";
    // }
include 'db.php';
    if(isset($_COOKIE['tel'])){
        $ff = $_COOKIE['code'];
        $tel=$_COOKIE['tel'];
        $sql="select * from $tbname where tel='".$tel."'";
        $query=mysql_query($sql);
        $row=mysql_fetch_assoc($query);
        if($row){
        if($row['code']<$ff){
            $time = date('Y-m-d H:i:s');
           $sql="update $tbname set code='".$ff."',time='".$time."' where tel='".$tel."'";
            $query=mysql_query($sql);
            if($query){
                echo "<script charset='utf-8'>";
                echo "alert('更新成功！');window.location.href='sel.php'";
                echo "</script>";
            }
        }else{
                echo "<script charset='utf-8'>";
                echo "alert('您的分数比之前的小！');window.location.href='sel.php'";
                echo "</script>";
        }
    }
}
?>
<!DOCTYPE html>
<script src="jquery-1.8.2.min.js"></script>
<script>
	// window.onload = function(){
	// 		alert("本次活动已圆满结束");
			
	// 	}
</script>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>一指禅戳戳戳！玩小游戏，免费吃龙虾！</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<style>
	body{
		margin: 0px;
		padding: 0px;
		font-family: "微软雅黑";
	}
	.box{
    	width: 100%;
        background: #D4E4F8;
        margin: 0px;
        padding: 0px;
		position: absolute;
		top:0px;
		left:0px;
		
	}
.name{
	position:absolute;
	left:41%;
	top:64.8%;
	width:30%;
	height: 28px;

	font-size:18px;
}
.tel{
	position:absolute;
	left:41%;
	top:77%;
	width:30%;
	height: 28px;

	font-size:18px;
}

.bn{
	position:absolute;
	left:37%;
	top:89%;
	width:25%;
	height: 5%;
/*	border-radius:5px;
	background: #FFF36B;*/
	opacity: 0;
	font-size:18px;
}
#tu{
    width: 100%;
    height: 100%;
    margin-bottom: -5px;
}
	</style>

<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
</head>
<body>
	<div class="box" >
	<img id="tu" src="images/bg.jpg" alt="">
	<form action="add.php" method="POST">
		<input style="background-color:transparent;border:0;"class="name" type="text" name="name">
		<input style="background-color:transparent;border:0;"class="tel" type="text" name="tel">
        <!-- style="background-color:transparent;border:0;"<input style="background-color:transparent;border:0;" class="fh" type="text" name="fh" placeholder="例:1幢1101"> -->
        <input type="hidden" name="token" value="<?php echo $token; ?>" id="token">
		<input class="bn" name="sub" type="button" value="">
	</form>
	</div>
</body>
</html>
<script>
    		$("input[name='sub']").on("click",function(){

    			$.ajax({
    			url:'add.php',
    			data:$('form').serialize(),
    			type:'POST',
    			success:function(m){

    				// if(m==99){
    				// 	alert("活动已结束");
    				// }
    				if(m=='name'){
    					alert("请填写正确的姓名！");
    				}
                    if(m=='wai'){
                        alert("访问错误！");
                    }
    				if(m=='ok'){
    					alert("提交成功！");
    					$("input[name='name']").val('');
    					$("input[name='tel']").val('');
                        window.location.href='sel.php';
    				}    				
    				if(m=='tel'){
    					alert("手机号格式不正确！");
    				}
                    if(m=='shua'){
                        alert("恭喜你刷新成绩！");
                        window.location.href='sel.php';
                    }   				
                    if(m=='nuli'){
                        alert("请继续努力刷新成绩！");
                        window.location.href='sel.php';
                    }
    				if(m==-1){
    					alert("请完善信息！");
    				}
    				if(m==-2){
    					alert("插入数据库失败！");
    				}
    			}
    			});
    		});
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
              // 所有要调用的 API 都要加到这个列表中
            ]
          });
         wx.ready(function () {
        var shareinfo={
             title: "一指禅戳戳戳！玩小游戏，免费吃龙虾！",
              desc: '浓糊味龙虾火辣上市',
              link: 'http://szxytang.com/yin/youxi/longxia/getcodeurl.php',
              imgUrl: 'http://szxytang.com/yin/youxi/longxia/share.jpg'}
              wx.onMenuShareTimeline(shareinfo);
         wx.onMenuShareAppMessage(shareinfo);
          });
</script>

  