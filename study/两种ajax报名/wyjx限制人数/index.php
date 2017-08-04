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
	<title>轻羽飞扬 共聚锦绣，来吴越锦绣挥洒激情吧！</title>
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
	left:35%;
	top:38%;
	width:42%;
	height: 25px;
/*	background: red;*/
	font-size:18px;
    border-radius: 5px;
}
.tel{
	position:absolute;
	left:35%;
	top:50%;
	width:42%;
	height: 25px;
/*	background: red;*/
	font-size:18px;
    border-radius: 5px;
}
.bn{
	position:absolute;
	left:37.5%;
	top:58%;
	width:25%;
	height: 5%;
	border-radius:8px;
	background: grey;
	opacity: 1;
	font-size:18px;
    color: white;
}
#tu{
    width: 100%;
    height: 100%;
    margin-bottom: -5px;
}
.nan{
    position:absolute;
    left:38%;
    top:45.5%;
    width:42%;
    height: 20px;
    border-radius: 6px;
/*  background: red;*/
    font-size:16px;
    color: white;
}
.nv{
    position:absolute;
    left:65%;
    top:45.5%;
    width:32%;
    height: 20px;
    border-radius: 6px;
/*  background: red;*/
    font-size:16px;
    color: white;

}
	</style>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
</head>
<body>
	<div class="box">
	<img id="tu" src="images/bg.jpg" alt="轻羽飞扬 共聚锦绣，来吴越锦绣挥洒激情吧！">
	<form action="add.php" method="POST">
		<p style="position:absolute;top:37%;left:11%;font-size:18px;color:white;">姓&nbsp;&nbsp;&nbsp;&nbsp;名</p><input class="name" type="text" name="name">
        <p style="position:absolute;top:43%;left:11%;font-size:18px;color:white;">性&nbsp;&nbsp;&nbsp;&nbsp;别</p>
        <label class="nan"><input type="radio" name="sex" value="男" checked="checked"/>男</label>
        <label class="nv"><input type="radio" name="sex" value="女" />女</label>
		<p style="position:absolute;top:49%;left:11%;font-size:18px;color:white;">联系方式</p><input class="tel" type="text" name="tel">
		<input class="bn" name="sub" type="button" value="报名">
	</form>
    <a href="http://xyt.xy-tang.com/2015n/hejunObj/xyt/?from=groupmessage&isappinstalled=0" style="position: absolute; top:97%; left:37%;  z-index:2000; color:white;text-decoration: none;font-size:13px;">信玉堂技术支持</a>
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
                    if(m=='m'){
                        alert("男生已满！");
                    }
                    if(m=='w'){
                        alert("女生已满！");
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
		 	 title: '轻羽飞扬 共聚锦绣，来吴越锦绣挥洒激情吧！',
		      desc: '首届吴越锦绣杯羽毛球友谊赛集结号吹响！',
		      link: 'http://szxytang.com/yin/bm/wyjx',
		      imgUrl: 'http://szxytang.com/yin/bm/wyjx/share.jpg'}
		      wx.onMenuShareTimeline(shareinfo);
		 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>

    <script>
     wx.ready(function(){
        //在这里调用 API

            wx.onMenuShareAppMessage({
              title:  '轻羽飞扬 共聚锦绣，来吴越锦绣挥洒激情吧！',
              desc:   '首届吴越锦绣杯羽毛球友谊赛集结号吹响！',
              link:   'http://szxytang.com/yin/bm/wyjx',
              imgUrl: 'http://szxytang.com/yin/bm/wyjx/share.jpg',
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
            title: '轻羽飞扬 共聚锦绣，来吴越锦绣挥洒激情吧！', // 分享标题
            desc:   '首届吴越锦绣杯羽毛球友谊赛集结号吹响！',
            link: 'http://szxytang.com/yin/bm/wyjx', // 分享链接
            imgUrl: 'http://szxytang.com/yin/bm/wyjx/share.jpg', // 分享图标
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