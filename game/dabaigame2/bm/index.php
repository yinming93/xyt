<?php
	//引入js类文件
	 require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>一起来拍尔康吧</title>
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
	left:8%;
	top:20%;
	width:80%;
	height: 30px;
/*	background: red;*/
	font-size:15px;
    border-radius: 5px;
    background: transparent;
    border: 1px solid #ccc;
}

.tel{
	position:absolute;
	left:8%;
	top:30%;
	width:80%;
	height: 30px;
/*	background: red;*/
	font-size:15px;
    border-radius: 5px;
    background: transparent;
    border: 1px solid #ccc;
}
.dz{
    position:absolute;
    left:8%;
    top:40%;
    width:80%;
    height: 30px;
/*  background: red;*/
    font-size:15px;
    border-radius: 5px;
    background: transparent;
    border: 1px solid #ccc;
}

.bn{
	position:absolute;
	left:8%;
	top:66%;
	width:80%;
	height: 46px;
	border-radius:8px;
	background: grey;
	opacity: 0;
	font-size:18px;
    color: white;
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
	<div class="box">
	<img id="tu" src="images/bg.jpg" alt="换个生活方式？从热波电跑开始！">
    <div style="width:100%;height:40px;background:#1073C9;position:absolute;top:0;left:0;line-height:40px;text-align:center;color:white;font-size:17px;">提交信息</div>
    <div style="position:absolute;left:8%;top:66%;width:84%;height:46px;background:#1073C9;border-radius:5px;color:white;text-align:center;line-height:46px;">提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交</div>
	<form action="add.php" method="POST">

		<input class="name" type="text" name="name" placeholder="请输入姓名">
        <input class="tel" type="tel" name="tel" placeholder="请输入电话">
        <input class="dz" type="text" name="dz" placeholder="请输入地址">
		<input class="bn" name="sub" type="button" value="报名">
	</form>
    <!-- <a href="http://xyt.xy-tang.com/2015n/hejunObj/xyt/?from=groupmessage&isappinstalled=0" style="position: absolute; top:97%; left:37%;  z-index:2000; color:white;text-decoration: none;font-size:13px;">信玉堂技术支持</a> -->
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
    				if(m=='rep'){
    					alert("请勿重复提交！");
                        window.location.href='../index.php';
    				}
    				if(m=='name'){
    					alert("请填写正确的姓名！");
    				}
    				if(m=='ok'){
    					alert("提交成功！");
    					window.location.href='../index.php';
    				}    				
    				if(m=='tel'){
    					alert("手机号格式不正确！");
    				}    				
                    if(m=='shua'){
                        alert("恭喜刷新成绩！");
                        window.location.href='../index.php';
                    }
                    if(m=='nuli'){
                        alert("继续加油刷新成绩吧！");
                        window.location.href='../index.php';
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
		 	 title: '一起来拍尔康吧',
		      desc: '玩游戏赢大奖',
		      link: 'http://xyt.xy-tang.com/yin/youxi/dabaigame/',
		      imgUrl: 'http://xyt.xy-tang.com/yin/youxi/dabaigame/share.jpg'}
		      wx.onMenuShareTimeline(shareinfo);
		 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>

    <script>
     wx.ready(function(){
        //在这里调用 API

            wx.onMenuShareAppMessage({
              title:  '一起来拍尔康吧',
              desc:   '玩游戏赢大奖',
              link:   'http://xyt.xy-tang.com/yin/youxi/dabaigame/',
              imgUrl: 'http://xyt.xy-tang.com/yin/youxi/dabaigame/share.jpg',
              trigger: function (res) {
                //alert('用户点击发送给朋友');
              },
              success: function (res) {
                //alert('已分享');
                // getElementById('ssss').style.display='none';
                // getElementById('ffff').style.display='block';
                // document.getElementById('add_tel').style.display='block';
              },
              cancel: function (res) {
                //alert('已取消');
                // alert("只有先分享到朋友或朋友圈才可以查看分数！");
              },
              fail: function (res) {
                //alert(JSON.stringify(res));
              }
            });



            wx.onMenuShareTimeline({
            title: '一起来拍尔康吧', // 分享标题
            desc:   '玩游戏赢大奖',
            link: 'http://xyt.xy-tang.com/yin/youxi/dabaigame/', // 分享链接
            imgUrl: 'http://xyt.xy-tang.com/yin/youxi/dabaigame/share.jpg', // 分享图标
            success: function () { 
                // 用户确认分享后执行的回调函数
                //  getElementById('ssss').style.display='none';
                // getElementById('ffff').style.display='block';
                // document.getElementById('add_tel').style.display='block';
            },
            cancel: function () { 
                // 用户取消分享后执行的回调函数
                // alert("只有先分享到朋友或朋友圈才可以查看分数！");
            }
        });
        
        });
        
        //debug
        wx.error(function(res){
          // alert(res.errMsg);
        });
    
    </script>