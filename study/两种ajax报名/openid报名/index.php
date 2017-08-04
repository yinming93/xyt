<?php
    //载入jssdk类

    require_once('common/include.php'); 
    require_once('common/func.php'); 
    include 'db.php';
    
    if(isset($_GET['code'])){
        define("CODE", $_GET['code']);
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".CODE."&grant_type=authorization_code";
        $json_access_token = https_request($url);
        $arr_access_token = json_decode($json_access_token, true);
        

        define("ACCESS_TOKEN", $arr_access_token['access_token']);

        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=".ACCESS_TOKEN."&openid=".$arr_access_token['openid']."&lang=zh_CN";
        $json = https_request($url);
        $userinfo_arr = json_decode($json, true); 
            
            $openid = $userinfo_arr['openid'];
            $headimgurl = $userinfo_arr['headimgurl'];
                
    }else{
        echo "参数错误，请稍后再试...";
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>世茂石湖湾冰雪世纪狂欢嘉年华</title>
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
#name{
	position:absolute;
	left:40%;
	top:67.5%;
	width:50%;
	height: 35px;
/*	background: red;*/
	font-size:18px;
}
#tel{
	position:absolute;
	left:40%;
	top:76%;
	width:42%;
	height: 25px;
/*	background: red;*/
	font-size:18px;
}
.bn{
	position:absolute;
	left:36%;
	top:89%;
	width:25%;
	height: 5%;
	border-radius:8px;
	background: red;
	opacity: 0;
	font-size:18px;
}
#tu{
    width: 100%;
    margin-bottom: -17px;
}
	</style>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
</head>
<body>
	<div class="box">
	<img id="tu" src="images/bg.jpg" alt="世贸石湖湾冰雪嘉年华">
	<form action="add.php" method="POST">
		<input id="name" type="text" name="name">
		<input id="tel" type="text" name="tel">
        <input type="hidden" id="openid" name="openid" value="<?php echo $openid; ?>">
		<input class="bn" name="sub" type="button" value="报名" onclick="add()">
	</form>
	</div>
</body>
</html>
<script>
 function add(){
        var name = $("#name").val();
        var tel  = $("#tel").val();
        var openid  = $("#openid").val();

        var data = "name="+name+"&tel="+tel+"&openid="+openid;
        //var data = {name:"+name+",tel:"+tel+",code:"+code+"};
        // alert(data);return false;
            $.post("add.php",data,function(m){
            if(m=='rep'){
                        alert("请勿重复提交！");
                    }
                    if(m=='name'){
                        alert("请填写正确的姓名！");
                    }
                    if(m=='ok'){
                        alert("报名成功！");
                        $("input[name='name']").val('');
                        $("input[name='tel']").val('');
                    }                   
                    if(m=='tel'){
                        alert("手机号格式不正确！");
                    }                   

                    if(m==-1){
                        alert("请完善信息！");
                    }
                    if(m==-2){
                        alert("插入数据库失败！");
                    }
            });



    }
    		// $("input[name='sub']").on("click",function(){

    		// 	$.ajax({
    		// 	url:'add.php',
    		// 	data:$('form').serialize(),
    		// 	type:'POST',
    		// 	success:function(m){

    		// 		if(m=='rep'){
    		// 			alert("请勿重复提交！");
    		// 		}
    		// 		if(m=='name'){
    		// 			alert("请填写正确的姓名！");
    		// 		}
    		// 		if(m=='ok'){
    		// 			alert("报名成功！");
    		// 			$("input[name='name']").val('');
    		// 			$("input[name='tel']").val('');
    		// 		}    				
    		// 		if(m=='tel'){
    		// 			alert("手机号格式不正确！");
    		// 		}    				

    		// 		if(m==-1){
    		// 			alert("请完善信息！");
    		// 		}
    		// 		if(m==-2){
    		// 			alert("插入数据库失败！");
    		// 		}
    		// 	}
    		// 	});
    		// });
</script>
    <!--开始-->
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
        
      
        wx.ready(function(){
        //在这里调用 API

        
        
            wx.onMenuShareTimeline({
                title: '一次报名模版', // 分享标题
                link: 'http://szxytang.com/yin/bm/bm/getcodeurl.php', // 分享链接
                imgUrl: 'http://szxytang.com/yin/bm/bm/share.jpg', // 分享图标
                success: function () { 
                    // 用户确认分享后执行的回调函数
                    //window.location.href = 'http://www.baidu.com';
                },
                cancel: function () { 
                    // 用户取消分享后执行的回调函数
                }
            });
            
            wx.onMenuShareAppMessage({
              title:  '一次报名模版',
              desc:   '一起',
              link:   'http://szxytang.com/yin/bm/bm/getcodeurl.php',
              imgUrl: 'http://szxytang.com/yin/bm/bm/share.jpg',
              trigger: function (res) {
                //alert('用户点击发送给朋友');

              },
              success: function (res) {
                //alert('已分享');
                
              },
              cancel: function (res) {
                //alert('已取消');
              },
              fail: function (res) {
                //alert(JSON.stringify(res));
              }
            });
        
        });
        
        //debug
        wx.error(function(res){
          alert(res.errMsg);
        });
    
    </script>
<!--结束-->