<?php
    //载入jssdk类
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>照片会褪色，但记忆不会！</title>
<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<script src="js/jquery-1.8.2.min.js"></script>
<style type="text/css">
body, div, p, iframe, ul, ol, dl, dt, dd, li, dl, h1, h2, h3, h4, table,th, td, input, button, select, textarea {margin:0; padding:0;font-style: normal;font:100% "微软雅黑",Arial, Helvetica, sans-serif; color:#333;}
*{margin:0; padding:0;}
  #zone{
  background:url(img/index.jpg) no-repeat center top; background-size:cover;width:100%;
  
  /*overflow: hidden;*/
  }
  #bd{
  	width: 80%;
  	height: 300px;
  	background: ;
  	margin-right: auto;
  	margin-left: auto;
  	margin-top: 50%;
    display: none;
    opacity: 0.8;
  }
  form{
  	font-size: 14px;
  	font-family: 黑体;
  }
  input{
  	margin: 3px 0;
  	border-radius: 5px;
  	border: 1px;

  }
  #file{
  	opacity: 1;
  	margin-top: -10px;
  	color: white;
  }
  
  .admin_table{
    width:500px;
    height: 200px;
    border:0px #abcdef dashed;
    border-collapse:collapse;
    margin:-50px 1px;
    
}
#tjj{
	width:100px;
	height: 36px;
	background:#D4B878;
	border:0;
	color:white;
	font-size: 18px ;
}
#name{
  width: 130px;
  height: 30px;
}
#jtel{
  width: 130px;
  height: 30px;
}
#zpm{
  width: 130px;
  height: 30px;
}
#miaoshu{
  width: 130px;
  height: 70px;
}
.xfdr{
-webkit-animation:fadeInUp 1s .2s ease both;
-moz-animation:fadeInUp 1s .2s ease both;}
@-webkit-keyframes fadeInUp{
0%{opacity:0;
-webkit-transform:translateY(20px)}
100%{opacity:1;
-webkit-transform:translateY(0)}
}
@-moz-keyframes fadeInUp{
0%{opacity:0;
-moz-transform:translateY(20px)}
100%{opacity:1;
-moz-transform:translateY(0)}
}

.donghua{
-webkit-animation:bounce 1.8s infinite linear both;
-moz-animation:bounce 1.8s infinite linear both;}
@-webkit-keyframes bounce{
0%,20%,50%,80%,100%{-webkit-transform:translateY(0)}
40%{-webkit-transform:translateY(-10px)}
60%{-webkit-transform:translateY(-10px)}
}
@-moz-keyframes bounce{
0%,20%,50%,80%,100%{-moz-transform:translateY(0)}
40%{-moz-transform:translateY(-10px)}
60%{-moz-transform:translateY(-10px)}
}
.donghua2{
-webkit-animation:bounce 2s infinite linear both;
-moz-animation:bounce 2s infinite linear both;}
@-webkit-keyframes bounce{
0%,20%,50%,80%,100%{-webkit-transform:translateY(0)}
40%{-webkit-transform:translateY(-10px)}
60%{-webkit-transform:translateY(-10px)}
}
@-moz-keyframes bounce{
0%,20%,50%,80%,100%{-moz-transform:translateY(0)}
40%{-moz-transform:translateY(-10px)}
60%{-moz-transform:translateY(-10px)}
}
#zizi{
	width: 100%;
	height: 100%;
	background-color: black;
	opacity: 0.8;
	color: white;
	position: absolute;
	top: 0;
	left: 0;
	display: none;
}
#zizi p{
	color: white;
	padding:5px 20px;
}
#heikuang{
	width: 100%;
	height: 100%;
	background-color: black;
	opacity: 0.8;
	color: white;
	position: absolute;
	top: 0;
	left: 0;
	display: none;
}
</style>
</head>

<body id="zone">
<img class="donghua" src="./img/kssc.png" style="width:40%;position:absolute;top:60%;left:30%;" onclick="cxa()">
<img class="donghua2" src="./img/gui.png" style="width:40%;position:absolute;top:68%;left:30%;" onclick="cxa2()">
<div id="heikuang" onclick="xsa()"></div>
<div id="zizi" onclick="xsb()">
<p>
参展规则：<br><br>

1.上传苏州老物件真实照片，即可参与评选<br><br>
2.活动时间：6月25日-7月8日<br><br>
3.奖品设置：<br>
一等奖：小米pad2一台<br>
二等奖：小米空气净化器一个<br>
三等奖：小米耳机一个<br><br>

4.注意事项：后期将会有工作人员同获奖作品所有者进行联系，请确认填写手机号码准确无误。
</p>
</div>
<div id="bd" class="xfdr">
	<form action="add.php?a=add" method="post" enctype="multipart/form-data">
<table class="admin_table">
<br>
            <tr><td style="color:white;">姓名:</td>
            <td><input type="text" name="name" id="name" /></td></tr>

            <tr><td style="color:white;">上传照片:</td><td><input type="file" id="file" name="myfile"/></td></tr><br/>
 
            <tr><td style="color:white;">联系电话:</td>
            <td><input type="text" name="jtel" id="jtel" /></td></tr><br/>
			<tr><td style="color:white;">作品名:</td>
            <td><input type="text" name="zpm" id="zpm" /></td></tr><br/>
             <tr><td style="color:white;">作品描述:</td>
            <td><textarea name="miaoshu" id="miaoshu" cols="30" rows="10"></textarea></td></tr><br/>
           
            <tr><td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" id="tjj" value="提交" onclick="return add()" /></td></tr>
</table>
        </form>
</div>
</body>
</html>
<script language="javascript">
function cxa(){
  document.getElementById('bd').style.display='block';
    document.getElementById('heikuang').style.display='block';
}
function cxa2(){
  document.getElementById('zizi').style.display='block';
}
function xsb(){
  document.getElementById('zizi').style.display='none';
}
function xsa(){
  document.getElementById('heikuang').style.display='none';
  document.getElementById('bd').style.display='none';
}
    function add(){
        var regPartton=/1[3-8]+\d{9}/;
        if($("#name").val()==''){
            alert("姓名不能为空");
            $("#name").focus();
            return false;
       
        }else if($("#file").val()==''){
            alert("图片不能为空");
            $("#file").focus();
            return false;
        
        }else if($("#jtel").val()==''){
            alert("电话不能为空");
            $("#jtel").focus();
            return false;
        }else if($("#zpm").val()==''){
            alert("作品名不能为空");
            $("#zpm").focus();
            return false;
        }else if($("#miaoshu").val()==''){
            alert("作品描述不能为空");
            $("#miaoshu").focus();
            return false;
        }else if(!regPartton.test($("#jtel").val())){
            alert("手机号码格式不正确！");
            $("#jtel").focus();
            return false;
}}
        
        // var name = $("#name").val();
        // var age = $("#age").val();
        // var caiyi = $("#caiyi").val();
        // var filename = $("#file").val();
        // var jname = $("#jname").val();
        // var jtel  = $("#jtel").val();

        // var data = "name="+name+"&age="+age+"&caiyi="+caiyi+"&filename="+filename+"&jname="+jname+"&jtel="+jtel;
        // //var data = {name:"+name+",tel:"+tel+",code:"+code+"};
        // //alert(data);
        //     $.post("add.php",data,function(res){
            
        //         //$("#msg").html(text);
        //        // alert(res);
        //         if(res=="ok"){
        //             alert("恭喜你报名成功！");
        //             window.location.href='index.php';
                
        //         }else{
        //             alert("恭喜你报名成功！");
        //             window.location.href='index.php';
        //         }
        //     });



    
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
             //所有要调用的 API 都要加到这个列表中
                        'onMenuShareAppMessage','onMenuShareTimeline'
                        ]
        });
      
        wx.ready(function(){
        //在这里调用 API

            wx.onMenuShareAppMessage({
              title:  '照片会褪色，但记忆不会！',
              desc:   '上传老照片，赢取港中旅惊喜大奖！',
              link:   'http://szxytang.com/yin/bm/sczp/',
              imgUrl: 'http://szxytang.com/yin/bm/sczp/share.jpg',
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
            title: '照片会褪色，但记忆不会！', // 分享标题
            link: 'http://szxytang.com/yin/bm/sczp/', // 分享链接
            imgUrl: 'http://szxytang.com/yin/bm/sczp/share.jpg', // 分享图标
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