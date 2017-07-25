<?php       	
	//引入js类文件
	if ($_GET['type']==2) {

              		$time = date('Y-m-d H:i:s');
              		$openid=$_POST['openid'];
              		include 'db.php';
		$sq = "select * from $tbname";
		$qu = mysql_query($sq);
		$nu = mysql_num_rows($qu);
		$nua=$nu+1;
		$nnn=$nua+300;
					$query=mysql_query("select *from $tbname where openid='$openid'");
       			$row=mysql_fetch_array($query);
              	
						$sql2="INSERT INTO $tbname(openid,num,time) VALUES('{$openid}','{$nnn}','{$time}')";
						$query2 = mysql_query($sql2);
						$row2   = mysql_fetch_assoc($query2);
						$num=$nnn;
						echo $num;
					 
					 die;
              	}
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
		// include 'db.php';
		// $sq = "select * from $tbname";
		// $qu = mysql_query($sq);
		// $nu = mysql_num_rows($qu);
		// $nua=$nu+1;
		// $nnn=$nua+100;
		// $nnna=$nnn-1;

        // $query=mysql_query("select *from $tbname where openid='$openid'");
        // $row=mysql_fetch_array($query);
        // var_dump($row);die;
        $time = date('Y-m-d H:i:s');
    } else{
        //echo "NO CODE";
        echo '操作失败！';
        exit;
        //写入日记文件
    }
  if(!$openid){
 	echo "<script>";
 	echo "window.location.href='http://szxytang.com/yin/fanye/fxs1/getcodeurl.php';";
 	echo "</script>";
 	exit;
 }
 // if(!$row){
	// $num=$nnna;
 // }else{
 // 	$num=$row['num'];
 // }
  // 当前时间戳
  // $xz=time();
  // 活动结束时间
  // $js=strtotime('2017-05-28 17:59:00');
  // if ($xz>$js){
  // echo "<script>";
  // echo "window.location.href='indexj.php'";
  // echo "</script>";
  // }
?>
<!DOCTYPE html>
<html>
<head>
	<title>以我之手绘繁华，以你之手赠清凉</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="static/css/mobi.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
    <script src="static/js/jquery-1.8.2.min.js"></script>
    <script src="static/js/wScratchPad.js"></script>
	<meta http-equiv="Cache-Control" content="max-age=0" />
	<meta name="apple-touch-fullscreen" content="yes" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">	
	<script type="text/javascript" src="http://cdn.webfont.youziku.com/wwwroot/js/wf/youziku.api.min.js"></script>
</head>
<script>
	setInterval(
		function(){
		$.ajax({
			url:'add.php',
			data:$('form').serialize(),
			type:'POST',
			success:function(m){
				$("#ja").html(m);
				// alert(1);
			}
		})
		},500)
</script>
<style>
.name{
	position:absolute;
	left:40.5%;
	top:81.3%;
	width:31%;
	height: 23px;
/*	background: red;*/
	font-size:17px;
    border-radius: 5px;
    background-color: transparent;
    border: 0;
    text-align: center;
    color: #9A7832;
}
.tel{
	position:absolute;
	left:40.5%;
	top:88%;
	width:31%;
	height: 23px;
/*	background: red;*/
	font-size:17px;
    border-radius: 5px;
    background-color: transparent;
    color: #9A7832;
    border: 0;
    text-align: center;
}
.bn{
	position:absolute;
	left:31%;
	top:71%;
	width:40%;
	height: 54px;
	border-radius:8px;
	background: url(static/img/an.png);
	background-size: 100% 100%;
	font-size:18px;
    color: white;
    border: 0;
}
</style>
<script>
		$(function(){	
				//音乐
			$('.audio').click(function(){
				var play= document.getElementById('audio');
				if(play.paused == true){
					play.play();
					$(".audio>img").attr("src","img/play.png").addClass('fz');
				}else{
					play.pause();
					$(".audio>img").attr("src","img/pause.png").removeClass('fz');
				}		
			});
		//图片预加载
		function loadImages(sources, callback){
			var count = 0,
				images ={},
				imgNum = 0;
			for(src in sources){
				imgNum++;
			}
			for(src in sources){
				images[src] = new Image();
				images[src].onload = function(){
					if(++count >= imgNum){
						callback(images);
					}
				}
				images[src].src = sources[src];
			}
		}
		loadImages(['static/img/1.jpg','static/img/2.jpg','static/img/3.jpg','static/img/4.jpg','static/img/5.jpg','static/img/66.jpg','ccc.jpg',
					'static/img/1-1.png','static/img/1-2.png','static/img/1-3.png','static/img/1-4.png','static/img/1-5.png','static/img/gg.png',
					'static/img/2-1.png','static/img/2-2.png','static/img/2-3.png','static/img/2-4.png','static/img/2-5.png',
					'static/img/3-1.png','static/img/3-2.png','static/img/3-3.png',
					'static/img/3-4.png','static/img/3-5.png',
					'static/img/4-1.png','static/img/4-2.png','static/img/4-3.png','static/img/4-4.png','static/img/4-5.png',
					'static/img/5-1.png','static/img/5-2.png','static/img/5-3.png',
					'static/img/5-4.png','static/img/5-5.png',
					'static/img/6-1.png','static/img/6-2.png','static/img/6-3.png',
					'static/img/6-4.png','static/img/6-5.png',

					],function(){
		      $('.spinner').remove();
		      $('.p-index').show();
		      //alert(11111);
		});
	});
</script>
<script>
		function sy(){
			var play= document.getElementById('audio');		
			play.play();
		};
</script>
<body onload="sy()">
	<!-- 开始加载画面 -->
	<div class="spinner">
		  <div class="rect1"></div>
		  <div class="rect2"></div>
		  <div class="rect3"></div>
		  <div class="rect4"></div>
		  <div class="rect5"></div>
	</div>
	<section class="p-index" style="display:none;">
		<a href="http://9e08a994a1bb.vxplo.cn/idea/yBR41EL"><p style="width:80%;position: absolute; top:97%;left:10%;z-index:2000; color:;text-align:center;">技术支持：信玉堂|草帽互动</p></a>
		<!-- 1 -->
		<section class="m-page m-page1">
			<div class="m-img m-img01" style="background:url(static/img/1.jpg) center no-repeat;background-size:100% 100%">
				<a href="javascript:;" class="help-up" style="position:absolute;left:50%;bottom:2%;"></a>
			</div>
			<img class="fangda"  src="static/img/1-1.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="sfdr2"  src="static/img/1-2.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="sfdr3"  src="static/img/1-3.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="sfdr4"  src="static/img/1-4.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="sfdr5"  src="static/img/1-5.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="ttt"  src="ccc.jpg" style="position: absolute; top:16%;  left:0%; z-index:101; height:26%;"  />
       		<img src="static/img/gg.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
		</section>
		<!-- 2 -->
		<section class="m-page m-page1">
			<div class="m-img m-img01" style="background:url(static/img/2.jpg) center no-repeat;background-size:100% 100%">
				<a href="javascript:;" class="help-up"></a>
			</div>
			<img class="zbdr"  src="static/img/2-1.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="zbdr2"  src="static/img/2-2.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="zbdr3"  src="static/img/2-3.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="zbdr4"  src="static/img/2-4.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="zbdr5"  src="static/img/2-5.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
		</section>
		<!-- 3 -->
		<section class="m-page m-page1">
			<div class="m-img m-img01" style="background:url(static/img/3.jpg) center no-repeat;background-size:100% 100%">
				<a href="javascript:;" class="help-up"></a>
			</div>
			<img class="sfdr"  src="static/img/3-1.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="zbdr2"  src="static/img/3-2.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="ybdr3"  src="static/img/3-3.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="zbdr4"  src="static/img/3-4.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="sfdr5"  src="static/img/3-5.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
		</section>
		<!-- 4 -->
		<section class="m-page m-page1">
			<div class="m-img m-img01" style="background:url(static/img/4.jpg) center no-repeat;background-size:100% 100%">
			<a href="javascript:;" class="help-up"></a>
			</div>
			<img class="dr"  src="static/img/4-1.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="dr2"  src="static/img/4-2.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="dr3"  src="static/img/4-3.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="dr4"  src="static/img/4-4.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="dr5"  src="static/img/4-5.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
		</section>

		<!-- 5 -->
		<section class="m-page m-page1">
			<div class="m-img m-img01" style="background:url(static/img/5.jpg) center no-repeat;background-size:100% 100%">
			<a href="javascript:;" class="help-up"></a>
			</div>
			<img class="dr"  src="static/img/5-1.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="sfdr2"  src="static/img/5-2.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="sfdr3"  src="static/img/5-3.png" style="position: absolute; top:4%;  left:0%; z-index:101; width:100%;"  />
       		<img class="sfdr4"  src="static/img/5-4.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="sfdr5"  src="static/img/5-5.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="sfdr6"  src="static/img/5-6.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="sfdr7"  src="static/img/5-10.png" style="position: absolute; top:4%;  left:0%; z-index:101; width:100%;"  />
		</section>

		<!-- 6 -->
		<section class="m-page m-page1">
			<div class="m-img m-img01" style="background:url(static/img/66.jpg) center no-repeat;background-size:100% 100%">
			</div>
			<!-- <input id="ja" type="text" value="总转发数：<?php echo $nnna ?>" style="width:80%;height:50px;position:absolute;top:62%;left:10%;text-align:center;font-size:30px;background:transparent;border:0;"readonly="readonly"> -->
			<span id="ja" style="width:80%;height:50px;position:absolute;top:47.8%;left:25%;text-align:center;font-size:30px;background:transparent;border:0;"><?php echo $nnna ?></span>
			<img class="dr"  src="static/img/6-1.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="sfdr2"  src="static/img/6-2.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="sfdr3"  src="static/img/6-3.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="sfdr4"  src="static/img/6-4.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
       		<img class="sfdr5"  src="static/img/6-5.png" style="position: absolute; top:0%;  left:0%; z-index:101; width:100%;"  />
		</section>
		
		<div class="audio">
			<img  class='fz' src="./img/play.png" width='100%' alt="">
			<audio id='audio' src="img/sr.mp3" loop autoplay="autoplay"></audio>
		</div>
	</section>
	<script>
		// setInterval(function(){
		// 	var nmc = $("#ja").text();	
		// 		},1000);
	</script>
	<?php 
		// include 'db.php';
		// $query=mysql_query("select *from $tbname where openid='$openid'");
  //       $row=mysql_fetch_array($query);
  //        if(!$row){
		 
		//  }else{
		//  $nmca=$row['num'];
		//  }
	 ?>
	<script>
	var bh=$('html').width();
	var i=0;
	var h=3605;
	// alert(bh);
	var time=setInterval(function(){
					// $('.box').css('top',i-=1);
					$('.ttt').css('left',(i-=0.08)+'%');
					if (i<=-400) clearInterval(time);
				},1);

	 setTimeout(function(){
	     $(window).scrollTop(1);
	 },0);
	  document.getElementById('audio').play();
	  document.addEventListener("WeixinJSBridgeReady", function () {
			WeixinJSBridge.invoke('getNetworkType', {}, function (e) {
	            document.getElementById('audio').play();
			});
	  }, false);
	</script>
	<style>
		.audio{
			width: 30px;
			height: 30px;
			background: url(img/adbg.png);
			background-size: 100% 100%;

			position: absolute;
			top: 20px;
			right: 20px;
			z-index: 1000;
		}
		.fz{
		-webkit-animation:pulse 1s .2s infinite alternate;
		-moz-animation:pulse 1s .2s infinite alternate;}
		@-webkit-keyframes pulse{
		0%{-webkit-transform:scale(0.5)}
		100%{-webkit-transform:scale(1)}
		}
		@-moz-keyframes pulse{
		0%{-moz-transform:scale(0.5)}
		100%{-moz-transform:scale(1)}
		}
		.help-up{
		-webkit-animation:fadeOutUp 1.5s .2s infinite;
		-moz-animation:fadeOutUp 1.5s .2s infinite;}
		@-webkit-keyframes fadeOutUp{
		0%{opacity:1;
		-webkit-transform:translateY(0)}
		100%{opacity:0;
		-webkit-transform:translateY(-20px)}
		}
		@-moz-keyframes fadeOutUp{
		0%{opacity:1;
		-moz-transform:translateY(0)}
		100%{opacity:0;
		-moz-transform:translateY(-20px)}
		}
	</style>
	<!-- 引入脚本 -->
	<script src="static/js/jquery.easing.1.3.js"></script>
	<script src="static/js/99_main.js"></script>
	<script type="text/javascript">
   $youziku.load("#ja", "16176d9adf48441092ab5a3ab427ec6d", "jdzhonyuanjian");
   /*$youziku.load("#id1,.class1,h1", "16176d9adf48441092ab5a3ab427ec6d", "jdzhonyuanjian");*/
   /*．．．*/
   $youziku.draw();
</script>
</body>
</html>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>	
    <script>
    var nmca;
    setInterval(function(){
	nmc = $("#ja").text();	
	nmca = Number(nmc)+Number(1);
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
              title:  '我是第'+nmca+'个为城市建设者送清凉的人，你加入吗？',
              desc:   '发送本条h5给好友，姑苏院子将以你的名义捐赠1元钱',
              link:   'http://szxytang.com/yin/fanye/fxs1/getcodeurl.php',
              imgUrl: 'http://szxytang.com/yin/fanye/fxs1/share.jpg',
              trigger: function (res) {
                //alert('用户点击发送给朋友');
              },
              success: function (res) {
              	$.post('index.php?type=2',{openid:'<?php echo $openid; ?>'},function(d){
              		// alert(d);

              	})
                // alert('已分享');
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
            title: '我是第'+nmca+'个为城市建设者送清凉的人，你加入吗？', // 分享标题
            link: 'http://szxytang.com/yin/fanye/fxs1/getcodeurl.php', // 分享链接
            imgUrl: 'http://szxytang.com/yin/fanye/fxs1/share.jpg', // 分享图标
            success: function (res) { 
            	$.post('index.php?type=2',{openid:'<?php echo $openid; ?>'},function(d){
              		// alert(d);

              	})
                // alert('已分享什么');
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
		},500);
    </script>