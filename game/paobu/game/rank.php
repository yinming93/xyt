<?php
	//载入jssdk类
	require_once "jssdk.php";
	$jssdk = new JSSDK( APPID, APPSECRET );
	$signPackage = $jssdk->GetSignPackage();

	include 'DBCon.php';
	$sql="select count(*) as count from $tbname ";
	$query=mysql_query($sql);
	$row=mysql_fetch_assoc($query);
	$count=$row['count'];
	
	$sqlall="select * from $tbname order by Code desc";
	$queryall=mysql_query($sqlall);

	
	$Num=0;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE html>
<html>
<head>
<meta name="HandheldFriendly" content="True">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<title>爱玩不玩，反正我玩了</title>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="format-detection" content="telephone=no"/>
<link href="../dist/css/uiqr.min.css" rel="stylesheet">
<script type="text/ecmascript" src="../dist/js/jquery.js"></script>
<!--    <script>
        $(function () {
            if (!is_wx()) { window.location.href = "test.html"; }
            
            var w = $(window).width();
            var h = w * 1.608;
            $(".result").height(h);



        })
        function is_wx() {
            var ua = navigator.userAgent.toLowerCase();
            if (ua.match(/MicroMessenger/i) == "micromessenger") {
                return true;
            } else {
                return false;
            }
        }
    </script>-->
</head>
<body>
<div class="rank-body">
  <div class="rank-bg"> 
      <div class="rank-top">	  
	  </div>
      <div class="rank-rep">
	  	     <ul style="padding-top:20px;">
				<?php while($rowall=mysql_fetch_assoc($queryall)){ $Num++ ?>
					<li>
						<h4><?php echo $Num; ?></h4>
						<p><?php echo $rowall['Name']; ?></p>
						<span><?php echo $rowall['Code']; ?>&nbsp;分</span>
					</li>
				<?php } ?>


			</ul>
      </div>
      <div class="rank-foot">
        <a href="index.php" class="btn-home btnA">回首页</a>
      </div>
  </div>
</div>
<!-- 微信弹出框 -->
<div class="modal-backdrop fade" style="display:none"></div>
<div class="modal-share-wx" style="display:none"></div>
<!-- share Modal -->
<div class="modal fade" id="share-modal">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-body">
      <p class="text-center text-danger">复制链接分享到朋友圈或发送给微信好友</p>
      <p><input type="text" id="wxshare" value="http://wx.guguan.net/weixin/game/mengwa/app/" class="form-control form-input"></p>
      <p class="text-center text-danger">点击下边的图标与朋友分享</p>
      <div class="text-center">
          <!-- Baidu Button BEGIN -->
          <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare" style="display:inline-block;float:none;">
          <a class="bds_tsina share_cbtn"></a>
          <a class="bds_tqq share_cbtn"></a>
          <a class="bds_qzone share_cbtn"></a>
          </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-default btn-big" data-dismiss="modal">取消</a>
    </div>
    </div>
</div>
</div>
			   <a href="http://wx.guguan.net/web/guguan/" style=" position:fixed; z-index:9999; bottom:0; left:0; color:#333; text-decoration:none; width:100%; text-align:center; font-size:10px">技术支持：信玉堂</a>  
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>


		wx.config({
			debug: false,
			appId: '<?php echo $signPackage["appId"];?>',
			timestamp: <?php echo $signPackage["timestamp"];?>,
			nonceStr: '<?php echo $signPackage["nonceStr"];?>',
			signature: '<?php echo $signPackage["signature"];?>',
			jsApiList: [
			 //所有要调用的 API 都要加到这个列表中
						'hideOptionMenu',
						'hideAllNonBaseMenuItem',
						'onMenuShareAppMessage',
						'onMenuShareTimeline'
						]
		});
	  
	    wx.ready(function(){
	    //在这里调用 API
			//隐藏所有非基础按钮接口
			//wx.hideAllNonBaseMenuItem();
			//隐藏右上角菜单接口
			//wx.hideOptionMenu();			
		
		
			wx.onMenuShareTimeline({
				title: '爱玩不玩，反正我玩了', // 分享标题
				link: 'http://szxytang.com/2015n/yinming/paobu/game', // 分享链接
			    imgUrl: 'http://szxytang.com/2015n/yinming/paobu/share.png', // 分享图标
				success: function () { 
					// 用户确认分享后执行的回调函数
					//window.location.href = 'http://www.baidu.com';
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
			  title:  '爱玩不玩，反正我玩了 ',
			  desc:   '我的洋房 美洋洋',
			  link: 'http://szxytang.com/2015n/yinming/paobu/game', // 分享链接
			  imgUrl: 'http://szxytang.com/2015n/yinming/paobu/share.png', // 分享图标
			  trigger: function (res) {
				//alert('用户点击发送给朋友');
			  },
			  success: function (res) {
				//alert('已分享');
				//window.location.href = 'http://www.baidu.com';
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
</body>
</html>