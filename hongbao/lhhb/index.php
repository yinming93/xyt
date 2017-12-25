<?php 
	header("Content-Type:text/html;charset=utf-8");
    //引入js类文件
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
//     define('CODE', $_GET['code']);
// 	define('APPID2', 'wxa6cf8ce6bdf6e482'); 
// 	define('APPSECRET2', '90f7975c4b24700007cad5c9f59f7bed'); 
//      include 'func.php';
// if(isset($_GET['code'])){
//     $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID2."&secret=".APPSECRET2."&code=".CODE."&grant_type=authorization_code";
//     $json_access_token = https_request($url);
//     $arr_access_token = json_decode($json_access_token, true);
//     $openid = $arr_access_token['openid'];

//     if (!$openid) {
//     	header('Location: http://xyt.xy-tang.com/liu/lhhb/index.php');
//     }
// include 'db.php';
//  	$sql="select *from lhhbuser where openid='".$openid."'";
// 	$query = mysql_query($sql);
// 	$row   = mysql_fetch_assoc($query);
// session_start();
// $token = md5(uniqid(rand(), true));     
// $_SESSION['token']= $token;  
//     } else{
//     $baseUrl = urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING']);
//     $url = __CreateOauthUrlForCode($baseUrl);
//     Header("Location: $url");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>读口令，抢红包-缇香郦城 环球城上墅级洋房，即将首开！</title>
	<style>
body{
	margin:0;
	padding:0;
	/*overflow: hidden;*/
}
.box{
	position: absolute;
	left: 0;
	top: 0;
	width: 100%;
}
.x1{position:absolute;left:36.28%;top:67.24%;width:25.11%;height:15.84%;z-index:9999;}
	</style>
<link rel="stylesheet" href="http://2015image.bj.bcebos.com/js/bootstrap.min.css">
<script src="http://2015image.bj.bcebos.com/js/jquery-1.11.1.min.js"></script>		
<script src="http://2015image.bj.bcebos.com/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:300px;margin: 30px auto; overflow: hidden;">
    <div class="modal-content">
      <div class="modal-header">
        <!--
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      -->
        <h4 class="modal-title" id="myModalLabel">请先完善您的资料，方便我们把奖品发放给您</h4>
      </div>
    <form class="bs-example bs-example-form" role="form">
    <input type="hidden" value="<?php echo $openid; ?>" name="openid">
    

      <div class="modal-body">      
        <div class="input-group input-group-lg">
          <span class="input-group-addon"  style="padding:0 10px;">
            <span class="glyphicon glyphicon-user"></span>
          </span>
          <input type="text" class="form-control" placeholder="请输入真实姓名" id="name" name="name" value="" maxlength="20">
        </div>
        <br/>
        <div class="input-group input-group-lg">
          <span class="input-group-addon" style="padding:0 10px;">
            <span class="glyphicon glyphicon-phone" ></span>
          </span>
          <input type="text" class="form-control" placeholder="请输入手机号码" id="tel" name="tel" value="" maxlength="11">
        </div>
      
      </div>
      <div class="modal-footer">
        <!--
      <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
      -->
      <button type="button" class="btn btn-primary" id="save_change">保存</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="box">
	<img src="images/2.jpg" width="100%">
	<a id="startRecord" class="x1"></a>

</div>
	<img src="images/3.jpg" width="100%" class="hb3" style="position:fixed;left:0;top:0;width:100%;height:100%;display:none">
<audio id='audio' src="./sr.mp3" loop autoplay="autoplay"></audio>
</body>
</html>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
<?php if(!$row): ?>
	// $('#myModal').modal({
	// backdrop:false
	// });
<?php endif; ?>

	wx.config({
		debug: false,
		appId:    '<?php echo $signPackage["appId"]?>',
		timestamp:'<?php echo $signPackage["timestamp"]?>',
		nonceStr: '<?php echo $signPackage["nonceStr"]?>',
		signature:'<?php echo $signPackage["signature"]?>',
		jsApiList:[
			"onMenuShareTimeline",
			"onMenuShareAppMessage",
			'translateVoice',
			'startRecord',
			'stopRecord',
			'onRecordEnd',
			'playVoice',
			'pauseVoice',
			'stopVoice',
			'uploadVoice',
        	'downloadVoice',
		]
	})
	wx.ready(function(){
		play= document.getElementById('audio');
		play.play();
		wx.hideOptionMenu();
		// var shareinfo={
		// 	title: '读口令，抢红包-缇香郦城 环球城上墅级洋房，即将首开！',
		// 	desc: '读口令，抢红包-缇香郦城 环球城上墅级洋房，即将首开！',
		// 	link: '',
		// 	imgUrl: 'http://xyt.xy-tang.com/liu/lhhb//share.jpg',
  //           success: function () { 

  //           },
  //           cancel: function () { 
  //           }
		// }
		// wx.onMenuShareTimeline(shareinfo);
		// wx.onMenuShareAppMessage(shareinfo);
		// wx.hideOptionMenu()
var voice = { localId: '', serverId: '' };
var timeOutEvent=0;
	$("#startRecord").on({
		touchstart: function(e){
		 	e.preventDefault();
		 	e.stopPropagation();
		 	play.pause();
			wx.startRecord({
				cancel: function(){
					alert('请确认授权录音才可以参与活动哦！')
				}
			})
		},
		touchmove: function(e){
			e.preventDefault();
		},
		touchend: function(){
			wx.stopRecord({
				success: function(res){
					voice.localId = res.localId;
					if(voice.localId == '' || voice.localId == 'undefined'){
						alert('请先录制一段声音')
						return
					}
					wx.translateVoice({
						localId: voice.localId,
						complete: function (res){
							if(res.hasOwnProperty('translateResult')){
								var text = res.translateResult;
								var data = "text="+text;
								$.post("postvoice.php",{'text':text,'openid':'<?php echo $openid; ?>'},function(res1){
										if (res1=='rep') {
											alert('您已经领取过红包了！')
											$(".hb3").show();
										}										
										if (res1=='ok') {
											alert('恭喜您领到一个红包，请注意查收！');
											$(".hb3").show();
										}										
										if (res1=='jx') {
											alert('继续努力');
											$(".hb3").show();
										}											

										if (res1=='no') {
											alert('红包领取完毕');
											$(".hb3").show();
										}										
										if (res1==-2) {
											alert('数据库异常')
										}
										play.play();
								})
							}else{
							  alert('无法识别，请稍后再试！')
							  return
							}
						}
					})	
				},
				fail: function(res){
					//alert(JSON.stringify(res))
					alert('无法识别，请稍后再试！')
				}
			})
			return false; 
		}
	})
})



		$("#save_change").on("click",function(){
    			$.ajax({
    			url:'add3.php',
    			data:$('form').serialize(),
    			type:'POST',
    			success:function(m){
    				if(m=='rep'){
    					alert("请勿重复提交！");
    				}    				
    				if(m=='-5'){
    					alert("报名活动结束！");
    				}    				
    				if(m=='has'){
    					alert("你已经报过名了");
    				}
    				if(m=='name'){
    					alert("请填写正确的姓名！");
    				}
    				if(m=='ok'){
    					alert("报名成功！");
    					$("input[name='name']").val('');
    					$("input[name='tel']").val('');	
						$('.fade,.bs-example-form').hide();


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
})


		$(".hb3").on('click',function(){
			$(this).hide();
		})


</script>