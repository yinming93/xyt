<?php
	//引入js类文件
	 require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();

?>
<!DOCTYPE html>
<script src="jquery-1.8.2.min.js"></script>
<script>
	window.onload=alert('游戏活动已经结束！')
</script>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>趣味钓月饼</title>
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
	top:65%;
	width:29%;
	height: 22px;
/*	background: red;*/
	font-size:18px;
}
.tel{
	position:absolute;
	left:41%;
	top:75.5%;
	width:29%;
	height: 21px;
/*	background: red;*/
	font-size:18px;
}
.fh{
    position:absolute;
    left:41%;
    top:86.5%;
    width:29%;
    height: 22px;
/*  background: red;*/
    font-size:18px;
}
.bn{
	position:absolute;
	left:36%;
	top:93%;
	width:25%;
	height: 5%;
	border-radius:8px;
	background: orange;
	opacity: 1;
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
	<img id="tu" src="images/bg.jpg" alt="金科观天下">
	<form action="add.php" method="POST">
		<input style="background-color:transparent;border:0;" class="name" type="text" name="name">
		<input style="background-color:transparent;border:0;" class="tel" type="text" name="tel">
        <input style="background-color:transparent;border:0;" class="fh" type="text" name="fh" placeholder="例:1幢1101">
		<input class="bn" name="sub" type="button" value="提交">
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

    				
    				if(m=='name'){
    					alert("请填写正确的姓名！");
    				}
    				if(m=='ok'){
    					alert("提交成功！");
    					$("input[name='name']").val('');
    					$("input[name='tel']").val('');
                        window.location.href='index.php';
    				}    				
    				if(m=='tel'){
    					alert("手机号格式不正确！");
    				}
                    if(m=='shua'){
                        alert("恭喜你刷新成绩！");
                        window.location.href='index.php';
                    }   				
                    if(m=='nuli'){
                        alert("请继续努力刷新成绩！");
                        window.location.href='index.php';
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
		 	 title: '一不小心捞到宝，要不要上交给国家捏',
		      desc: '每年中秋都会发生一件大事，比如这个...',
		      link: 'http://xyt.xy-tang.com/2015n/yinming/jkgtx',
		      imgUrl: 'http://xyt.xy-tang.com/2015n/yinming/jkgtx/share.jpg'}
		      wx.onMenuShareTimeline(shareinfo);
		 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>

    <script>
     wx.ready(function(){
        //在这里调用 API

            wx.onMenuShareAppMessage({
              title:  '一不小心捞到宝，要不要上交给国家捏',
              desc:   '每年中秋都会发生一件大事，比如这个...',
              link:   'http://xyt.xy-tang.com/2015n/yinming/jkgtx',
              imgUrl: 'http://xyt.xy-tang.com/2015n/yinming/jkgtx/share.jpg',
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
            title: '一不小心捞到宝，要不要上交给国家捏', // 分享标题
            desc:   '每年中秋都会发生一件大事，比如这个...',
            link: 'http://xyt.xy-tang.com/2015n/yinming/jkgtx', // 分享链接
            imgUrl: 'http://xyt.xy-tang.com/2015n/yinming/jkgtx/share.jpg', // 分享图标
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
          alert(res.errMsg);
        });
    
    </script>