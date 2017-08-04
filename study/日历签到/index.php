<?php
    //引入js类文件
     require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();

    if(isset($_GET['code'])){
        include 'func.php';
        define('CODE', $_GET['code']);
        define('APPID', 'wx461b5105da7629f1'); 
        define('APPSECRET', '16475969ec7efca986380bda36ecc737'); 
        //1
        //获页面授权的ACCESS_TOKEN 、 refresh_token、openid、 scope的类型
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".CODE."&grant_type=authorization_code";
        $json_access_token = https_request($url);
        $arr_access_token  = json_decode($json_access_token, true); //获取access_token
        //2
        $url  = "https://api.weixin.qq.com/sns/userinfo?access_token=". $arr_access_token['access_token'] ."&openid=".$arr_access_token['openid'];
        $json = https_request($url);
        $userinfo_arr = json_decode($json, true); 
        // var_dump($userinfo_arr);
        $openid=$userinfo_arr['openid']?$userinfo_arr['openid']:'aa';
        $nickname=$userinfo_arr['nickname']?$userinfo_arr['nickname']:'bb';
// echo $openid;
// echo $nickname;
    } else{
        //echo "NO CODE";
        echo '操作失败！';
        exit;
        //写入日记文件
    }
    include 'db.php';
    $qday=date("j");
    $sql="select * from $tbname where openid='{$openid}'";
    // echo $sql;
    $query=mysql_query($sql);
    $li=array();
        while ($rows=mysql_fetch_assoc($query)) {
        $li[]=$rows[qday];
        
    } 
     // var_dump($li);
$week=array('SUN','MON','TUE','WED','THU','FRI','SAT');
$start_weekday=date("w",mktime(0, 0, 0, date('m'), 1, date('Y')));
$days=date("t", mktime(0, 0, 0, date('m'), 1, date('Y')));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>这个夏天辛苦了，阳光可乐“免费”领</title>
<style>
body{
		margin: 0;
		padding: 0;
		font-family: "微软雅黑";
        /*background-color: #28304d;*/
        font-size: 1em;
	}
	#container {
		background: #f05a22;
		width:85%;
		position:absolute;
		left:9%;
		top:55%;
	}

	.fontb {
		color:#OOO;
		background: yellow;
	}
	

	td,th {
		width:20px;
		height:25px;
		text-align:center;
		
	}
	td{
		cursor: pointer;
	}
	form {
		margin:0px;
		padding:0px;
	}
	caption{
		font-size: 1.5em;
	}
	.img{
		position:absolute;
		left:0;
		top:0;
		z-index:-1000;
	}
	.center{
		position:absolute;
		left:9%;
		top:58%;

	}
</style>
 <script type="text/javascript" src="jquery-1.8.2.min.js"></script>
</head>
<body>
	<img class="img" src="bg.jpg" width="100%" alt="">
     <div id="container">
     <table align="center">
          <caption>08 August 2015</caption>
         <tr>
           <?php for($i=0; $i<count($week); $i++): ?>
               <th><?php echo $week[$i]; ?></th>
            <?php endfor; ?>
        </tr>
            <tr>
           <?php for($j=0; $j<$start_weekday; $j++): ?>
            <td>&nbsp;</td>
          <?php endfor; ?>

        <?php for($k=1; $k<=$days; $k++): ?>
            <?php  $j++; ?>
              
                <td class="<?php if(in_array($k, $li)) echo 'fontb'; ?>" openid="<?php echo $openid; ?>" nickname="<?php echo $nickname; ?>"><?php echo $k; ?></td>
           
              <?php if($j%7==0): ?>
                    </tr><tr>
              <?php endif; ?>
         <?php endfor; ?>

           <?php while($j%7!==0): ?>
             <?php $j++;?> 
                <td>&nbsp;</td>
            <?php endwhile; ?>

            </tr>
    </table>
</div>
</body>
</html>


 <script>
	$("td").on("click",function(){
	 	$_this=$(this);
	 	$qday=$_this.text();
	 	$openid=$_this.attr("openid");
	 	$nickname=$_this.attr("nickname");

	 	// alert($openid);
	 	// alert($qday);
	 	// alert($nickname);
			$.ajax({
        			url:'add.php',
                    // dataType:'json',
        			// data:{id:$id,ps:$ps,openid:$openid},
        			data:{qday:$qday,openid:$openid,nickname:$nickname},
        			type:'POST',
        			success:function(m){
        				if(m==1){
                 		$_this.css("background-color","yellow");
        				}else if(m==-1){
        					alert("插入数据库失败！");
        				}else if(m==0){
        					alert("请签到当前天！");
        				}else if(m==-2){
        					alert("您已经签到过了！");
        				}else if(m==-3){
        					alert("签到失败！");
        				}
        			}
        			});
	 })
 </script>

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
		 	 title: '200万+置业哪家强！',
		      desc: '赶紧来投票吧!',
		      link: 'http://xyt.xy-tang.com/liu/llwls',
		      imgUrl: 'http://xyt.xy-tang.com/liu/llwsl/share.jpg'}
		      wx.onMenuShareTimeline(shareinfo);
		 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>

    <script>
     wx.ready(function(){
        //在这里调用 API

            wx.onMenuShareAppMessage({
              title:  '阳光天地助你清凉一夏！',
              desc:   '赶紧来投票吧!',
              link:   'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://xyt.xy-tang.com/liu/qiandao/index.php&response_type=code&scope=snsapi_userinfo&state=1&connect_redirect=1#wechat_redirect',
              imgUrl: 'http://xyt.xy-tang.com/liu/qiandao/share.jpg',
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
            title: '阳光天地助你清凉一夏！', // 分享标题
            desc:   '赶紧来投票吧!',
            link: 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx461b5105da7629f1&redirect_uri=http://xyt.xy-tang.com/liu/qiandao/index.php&response_type=code&scope=snsapi_userinfo&state=1&connect_redirect=1#wechat_redirecto', // 分享链接
            imgUrl: 'http://xyt.xy-tang.com/liu/qiandao/share.jpg', // 分享图标
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
