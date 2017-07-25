

<script type="text/ecmascript" src="wxshare.js"></script>


<?php
	$code = $_COOKIE['code'];
	$num = $_COOKIE['num'];
?>

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
<meta name="HandheldFriendly" content="True">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, minimal-ui" name="viewport">
<title>陪湾湾快跑赢大奖</title>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="format-detection" content="telephone=no"/>
<link href="../dist/css/uiqr.min.css?v=1" rel="stylesheet">
<script type="text/ecmascript" src="../dist/js/jquery.js"></script>
<script type="text/javascript" src="../dist/js/jquery.cookie.js"></script>
<script type="text/javascript" src="../dist/js/share_v2.js"></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
   <!--  <script>
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
    </script> -->
    </head>
<body>
<div class="end-body">  
  <div class="end-bg">
      <div id='share-box'>
          <p class="score"><?php echo $code; ?></p>
          <p class="gold"></p>
      </div>
      <!-- <a href="rank.php" class="btn-rank btnA">排行榜</a> -->
      <a href="javascript:;" class="btn-share btnA">任性晒分</a>
      <a href="game.php" class="btn-again btnA">继续玩耍</a>
      <?php if ($code>899): ?>
         <a id="" href="http://menu.xytang88.com/active/xinyutang?ename=bgy_zp0321" class="btn-login btnA">玩游戏赢大奖</a>
      <?php else: ?>
         <a id="" class="btn-login btnA" onclick="alert('抱歉，您的分数未达到标准哦！请再玩一次');">
      <?php endif ?>
      <!-- <div class="intro">
          <h4>活动须知</h4>
          <p>1.参与本活动必须严格遵守游戏规则，未按照游戏规则参与游戏者将视为无效，取消获奖资格。<br><br>
             2.本活动参与者需自行关注微信每日信息，我们不以其他方式另行通知，获奖者的名单以活动截止时间后排行榜为准，敬请关注。<br><br>
             3.所有中奖者需本人到售楼处领取，不得请人代领，活动参与者身份不限，中奖者需在主办方通知时间及地点内领取奖品，逾期作废。<br><br>
             4.为保证活动公平、公正性，中奖者以实际领取到的实物为准，不保留、不退还、不折现。<br><br>
             5.在参与本活动中，每个中奖者限领奖品一份，本次活动最终解释权归金科世界城所有。<br><br>

             
            <br><br>
      </p>
          <p>
            一等奖：<br><span>1名&nbsp;&nbsp;电饭煲一台</span><br>
            <br>
            二等奖：<br><span>1名&nbsp;&nbsp;榨汁机一台</span><br>
            <br>
            三等奖：<br><span>1名&nbsp;&nbsp;秋被一条</span><br>
            <br>
			      鼓励奖：<br><span>20名&nbsp;&nbsp;食用油一瓶</span><br>
            <br>
          </p>
      </div> -->
  </div>
</div>  
<!-- 微信弹出框 -->
<div class="modal-backdrop fade" style="display:none"></div>
<div class="modal-share-wx" style="display:none"></div>
<!-- 分享信息 -->
<div class="modal fade" id="share-modal" style="background-image:url(../dist/images/share/bigshare.png); background-size:100% 100%;">
<div class="modal-dialog" style="display:none">
    <div class="modal-content">
    <div class="modal-body">
      <p class="text-center text-danger">和你的朋友比比谁的分数更高^_^！</p>
      <div class="text-center" style=" width:90%; margin:auto">
         <img src="../dist/images/share/xyds_share.jpg" style="float:left;">
     <div style="float:right; width:60%; text-align:left">我在玩“浓情端午粽飘香”得到：分！</div>
     <div style="clear:both"></div>
        </div>
    </div>
    <div class="modal-footer" >
        <a href="javascript:;" class="btn btn-success btn-big" data-dismiss="modal">下次再晒分</a>
    </div>
    </div>
</div>
</div>
<!-- 信息填写弹出 -->
<div class="modal fade" id="login-modal">
  <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-body">
        <a class="close" href="javascript:;" data-dismiss="modal"></a>
        <p class="form-tit">请准确输入您的联系方式，<br>便于接收中奖通知哦~</p>
        <div class="loginInpBox clearfix">
<script>
  function checkMobile(){ 
        if($("#zc_name1").val()==''){alert('名字不能为空');return false;}   
        if($("#zc_tel1").val()==''){alert('电话不能为空');return false;} 
    
  }
</script>   
<form action="add.php" method="post" name="zc"  onSubmit="return checkMobile();">    
              <div class="form-group has-error">
                  姓名：<input type="text" class="form-control" value="" id="zc_name1" name="zc_name1">
              </div>          
              <div class="form-group has-success">
                  手机：<input type="text" class="form-control" value="" id="zc_tel1" name="zc_tel1">
<input type="text" name="vaaa"  id="vaaa" value="nihao" style=" display:none">
<input type="text" name="code"  id="vaaa" value=<?php echo $code; ?> style=" display:none">      
              </div>
			  
              <div class="form-group has-error">
                  <p class="text-danger" id="errmsg"></p>
              </div>  
              <div class="oauth clearfix">
                  <input name="提交" type="submit" value="提交" class="oauthBtn btn btn-success" style="width:90%; margin:auto"></form>  
              </div>      
        </div>
      </div>
      </div> 
  </div>       
</div>
         <a href="http://wx.guguan.net/web/guguan/" style=" position:fixed; z-index:9999; bottom:0; left:0; color:#333; text-decoration:none; width:100%; text-align:center; font-size:10px">技术支持：信玉堂</a>  


 
<script src="http://static.qr.cntv.cn/qr/js/libs/seajs/sea.js"></script>
<script src="../dist/js/init.js"></script>
<!--分享弹出-->
<script id="bdshare_js" data="type=tools&amp;uid=5447347" ></script>
<script id="bdshell_js"></script>
<script>
  
 
  
  var playlog=eval("("+$.cookie('playlog')+")");
  var gold=playlog.gold;
  var score=playlog.score;
  $('.gold').html(gold);//金币的数量
  $('.score').html(score);//羊的数量
  //判断是否登录
  var mobile=$.cookie('uc_cntv_mobile');
  var suffix='';
  var isLogin=0;
  if(mobile) {
    suffix=mobile;isLogin=1;
  }else{
      suffix='guest';
  }
  var total_gold=parseInt($.cookie('total_gold_'+suffix))//总金币数量

  if(isNaN(total_gold)) total_gold=0;

  //累加本次的金币
  if(isNaN(total_gold) == false  && total_gold >= 0 && $.cookie('need_add') == '1' )
  {
      total_gold = total_gold + parseInt(gold);

      $.cookie('total_gold_'+suffix,total_gold,{
        expires:365,
        path:"/",
        domain:"hd.qr.cntv.cn",
        secure:false,
        raw:true
      });
      
      $.cookie('need_add', null);

      if(isLogin==1){

        last_gold = parseInt($.cookie('last_gold'));
        if(isNaN(last_gold)) last_gold=0;

        gold = gold + last_gold;
        total_gold = total_gold + last_gold;
        $.cookie('last_gold', 0);
        //调用接口
        var url = 'http://q.cntv.cn/spring_online/save_score.lua';
        /*$.ajax({
          type:"POST",
          cache:false,
          url:url,
          dataType:'jsonp',
          jsonp : 'callback',
          data:({
            mobile:mobile,
            gold:gold
          })
        });*/
      }
  }
  
  


  $('.total').html('<span>总金币：</span>' + total_gold);//金币的数量
  

  //isLogin = 1;
  var linkurl = 'game.html';
  if(isLogin==1) 
  {
    $('#btnLogin').attr('href', linkurl);
    $('.total').show();
  }

  $('#submit_mobile').click(function(){

    if($('#username').val() == '' || $('#username').val() == '姓名'){
      $('#errmsg').html('请输入您的姓名！');
      return;
    }

    if($('#mobile').val() == '' || $('#mobile').val() == '手机号'){
      $('#errmsg').html('请输入您的手机号！');
      return;
    }

    

    reg = new RegExp("^1[0-9]{10}$");
    if(!reg.test($('#mobile').val())){
      $('#errmsg').html('您输入的格式有误！');
      return;
    }


    $.cookie('uc_cntv_mobile',$('#mobile').val(),{
        expires:365,
        path:"/",
        domain:"hd.qr.cntv.cn",
        secure:false,
        raw:true
    });
    location.href = linkurl + '?login=ok';


  });
</script>
<script>
  function get(name) 
  { 
      var reg = new RegExp("(\\?|&)"+ name +"=([^&]*)(&|$)");
      var r = window.location.search.toString().match(reg); 
      if (r!=null){
  return unescape(r[2]);
      }
      else{
  return null; 
      }
  }
  
seajs.use(["jquery","bootstrap"], function($) {

    var mode = get("mode") || 0;
    //var score = get("score") || 0;
    var remaining,post;
    var infoDesc,shareDesc;
    /*shareDesc = "<p class='score'>"+ score +"</p>"
    $("#share-box").append(shareDesc);*/
    
    var infoDesc = '' + score + '';


    $("#bdshare").attr("data","{'bdDes':'"+ infoDesc +"','text':'"+ infoDesc +"','pic':'http://wx.guguan.net/tymengwa/dist/images/share/xyds_share.jpg','url':'http://wx.guguan.net/tymengwa/'}");

    $(".btn-share").click(function(){
        if(!window.WeixinApi || !window.WeixinJSBridge) {
            $("#share-modal").modal("show");
        } else {
            $(".modal-backdrop,.modal-share-wx").css({"display":"block"});
            $(".modal-backdrop").addClass("in modal-backdrop-opacity");
        }
    })

    $(".modal-backdrop,.close").click(function(){
        $(".modal-backdrop,.modal-share-wx").css({"display":"none"});
        $(".modal-backdrop").removeClass("in modal-backdrop-opacity");
        $(".modal").removeClass("in");
        $(".modal").css({"display":"none"});
    })

    $("#btnLogin").click(function(){
        if(isLogin != 1){
          $("#login-modal").modal("show");
          $("#username").val('姓名');
          $("#mobile").val('手机号');
          $("#errmsg").html('');
        }
    })
    $("#oauth-reg").click(function(){
        $("#login-modal").modal("hide");
        $("#reg-modal").modal("show");
    })  

    //输入框获得焦点
    $("#login-modal .form-control").bind({
            focus:function(){
            if (this.value == this.defaultValue){
            this.value="";}
            },
            blur:function(){
            if (this.value == ""){
            this.value = this.defaultValue;}
            }
        });

    $("#wxshare").click(function(){
        this.select();
    })

})

//分享弹出自定义参数
var bds_config = {};
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>


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
				title: '陪湾湾快跑赢大奖', // 分享标题
				link: 'http://szxytang.com/yin/youxi/paobu/game/', // 分享链接
			    imgUrl: 'http://szxytang.com/yin/youxi/paobu/share.png', // 分享图标
				success: function () { 
					// 用户确认分享后执行的回调函数
					//window.location.href = 'http://www.baidu.com';
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			
			wx.onMenuShareAppMessage({
			  title:  '陪湾湾快跑赢大奖',
			  desc:   '湾湾没想到，奖品如此丰富！',
			  link: 'http://szxytang.com/yin/youxi/paobu/game/', // 分享链接
			  imgUrl: 'http://szxytang.com/yin/youxi/paobu/share.png', // 分享图标
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