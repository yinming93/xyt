<?php
	//引入js类文件
	 require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
    $ff = $_COOKIE['code'];


    include 'db.php';
    if(isset($_COOKIE['tel'])){
        $ff = $_COOKIE['code'];
        $tel=$_COOKIE['tel'];
        $sql="select * from $tbname where tel='".$tel."'";
        $query=mysql_query($sql);
        $row=mysql_fetch_assoc($query);
        if($row){
        if($row['code']<$ff){
            $sql="update $tbname set code='".$ff."'where tel='".$tel."'";
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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>提交分数</title>
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
	left:32%;
	top:30.5%;
	width:43%;
	height: 25px;
/*	background: red;*/
	font-size:18px;
}
.tel{
	position:absolute;
	left:32%;
	top:40%;
	width:43%;
	height: 25px;
/*	background: red;*/
	font-size:18px;
}
.bn{
	position:absolute;
	left:36%;
	top:55%;
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
	<div class="box">
	<img id="tu" src="images/bg.jpg" alt="">
	<form action="add.php" method="POST">
		<p style="position:absolute;top:29%;left:15%;font-size:17px;">姓名：</p><input class="name" type="text" name="name">
		<p style="position:absolute;top:38.5%;left:15%;font-size:17px;">电话：</p><input class="tel" type="text" name="tel">
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
                        window.location.href="sel.php";
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
    			}
    			});
    		});
</script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
        wx.config({
            debug: false,
            appId: '<?php echo $signPackage["appId"];?>',
            timestamp: <?php echo $signPackage["timestamp"];?>,
            nonceStr: '<?php echo $signPackage["nonceStr"];?>',
            signature: '<?php echo $signPackage["signature"];?>',
            jsApiList: [
                        'onMenuShareAppMessage','onMenuShareTimeline'
                        ]
        });
      
        wx.ready(function(){
            wx.onMenuShareAppMessage({
              title:  '不好！“猴塞雷”混入吉祥猴大军！！！',
              desc:   '放下手雷，也许我们还能做朋友',
              link:   'http://szxytang.com/yin/youxi/hhhh/',
              imgUrl: 'http://szxytang.com/yin/youxi/hhhh/share.jpg',
              trigger: function (res) {
              },
              success: function (res) {
              },
              cancel: function (res) {
              },
              fail: function (res) {
              }
            });
            wx.onMenuShareTimeline({
            title: '不好！“猴塞雷”混入吉祥猴大军！！！', // 分享标题
            link: 'http://szxytang.com/yin/youxi/hhhh/', // 分享链接
            imgUrl: 'http://szxytang.com/yin/youxi/hhhh/share.jpg', // 分享图标
            success: function () { 
            },
            cancel: function () {                 
            }
        });   
        });
        wx.error(function(res){
          alert(res.errMsg);
        });
    
    </script>