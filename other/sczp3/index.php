<?php
	//引入js类文件
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
		include 'db.php';
        $query=mysql_query("select *from sczp1121 where openid='$openid'");

        $row=mysql_fetch_array($query);
        // var_dump($row);die;
        
    } else{
        //echo "NO CODE";
        echo '操作失败！';
        exit;
        //写入日记文件
    }
  if(!$openid){
 	echo "<script>";
 	echo "window.location.href='http://szxytang.com/yin/za/sczp3/getcodeurl.php';";
 	echo "</script>";
 	exit;
 }
 // if ($row){
	// echo "<script>";
	// echo "$('#box').css('display','none');";
	// echo "$('#shuzi').css('display','block');";
	// // echo "alert('已参与过')";
	// echo "</script>";
 // }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>分享你的精彩时刻</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="format-detection" content="telephone=no, email=no" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--[if IE]>
<script src="js/html5shiv.min.js"></script>
<![endif]-->
</head>
<style>
	body{
		background:url(bg.jpg) no-repeat;
		background-size:100% auto;
	}
	#tjj{
		width: 99%;
		height: 40px;
		background-color: #0494D2;
		border: none;
		font-size: 20px;
		color: white;
	}
</style>
<body>
<!--头部-->
<!-- <div id="user_head">
        <a id="left_ico" href="javascript:history.go(-1);">
          <i class="icon iconfont">&#xe645;</i>
        </a>
        <span>个人头像</span>
        <a id="s_dpage" href="javascript:void(0);">
           <i class="icon iconfont">&#xe633;</i> 
        </a>
</div> -->
<form action="add.php?a=add" method="post" enctype="multipart/form-data">
<a href="javascript:void(0);" class="logoBox" id="logoBox" style="width:50%;">
    <img id="bgl" src="images/userico.jpg" width="100%">
</a>
<div class="htmleaf-container">
<div id="clipArea"></div>
<div id="view"></div>
</div>
<input type="hidden" name="openid" id="openid" value='<?php echo $openid; ?>'>
<!-- <input type="text" name="base" id="base"> -->
<textarea name="base" id="base" cols="30" rows="10" style="width:200px;height:200px;visibility:hidden;"></textarea>
<div class="btn-1">
<!-- <button>确认更换</button> -->
<input type="submit" id="tjj" value="生&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;成" onclick="add()" />
</div>
 </form>
<script>
	function add(){
		var srca = document.getElementById("logoBox").getElementsByTagName('img')[0].src;
		// var srca = document.getElementsByTagName('img').src;
		// document.cookie="src="+srca;
		document.getElementById('base').value=srca;
		// alert(srca);
	}
</script>
<div id="dpage">
 <!-- <a href="javascript:void(0);">
     <input type="button" name="file" class="button" value="拍照">
	  <input id="file" type="file" onchange="javascript:setImagePreview();" accept="image/*" multiple  />
 </a>
 <a href="javascript:void(0);"><input type="button" name="file" class="button" value="选取照片">
 <input id="file" type="file" onchange="javascript:setImagePreview();" accept="image/*" multiple  />
 </a> -->
 <a href="javascript:void(0);">
     <input type="button" name="file" class="button" value="拍照">
	  <input id="file" type="file" accept="image/*" multiple  />
 </a>
 <!-- <a href="javascript:void(0);"><input type="button" name="file" class="button" value="选取照片">
 <input id="file" type="file" accept="image/*" multiple  />
 </a> -->
 <a href="javascript:void(0);" class="qx"><button id="clipBtn">截取图片</button></a>
</div>

<script src="js/jquery.min.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="js/jquery-2.1.1.min.js"><\/script>')</script>
<script src="js/iscroll-zoom.js"></script>
<script src="js/hammer.js"></script>
<script src="js/jquery.photoClip.js"></script>
<script>
var obUrl = ''
//document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
$("#clipArea").photoClip({
	width: 280,
	height: 280,
	file: "#file",
	view: "#view",
	ok: "#clipBtn",
	loadStart: function() {
		console.log("照片读取中");
	},
	loadComplete: function() {
		console.log("照片读取完成");
	},
	clipFinish: function(dataURL) {
		console.log(dataURL);
	}
});
</script>
<script>
$(function(){
$("#logoBox,#s_dpage").click(function(){
$(".htmleaf-container").fadeIn(300);
$("#dpage").addClass("show");
})
	$("#clipBtn").click(function(){
		$("#logoBox").empty();
		$('#logoBox').append('<img src="' + imgsource + '" align="absmiddle" style=" width:100%;">');
		$(".htmleaf-container").hide();
		$("#dpage").removeClass("show");
	})
});
</script>
<script type="text/javascript">
$(function(){
	jQuery.divselect = function(divselectid,inputselectid) {
		var inputselect = $(inputselectid);
		$(divselectid+" small").click(function(){
			$("#divselect ul").toggle();
			$(".mask").show();
		});
		$(divselectid+" ul li a").click(function(){
			var txt = $(this).text();
			$(divselectid+" small").html(txt);
			var value = $(this).attr("selectid");
			inputselect.val(value);
			$(divselectid+" ul").hide();
			$(".mask").hide();
			$("#divselect small").css("color","#333")
		});
	};
	$.divselect("#divselect","#inputselect");
});
</script>
<script type="text/javascript">
$(function(){
	jQuery.divselectx = function(divselectxid,inputselectxid) {
		var inputselectx = $(inputselectxid);
		$(divselectxid+" small").click(function(){
			$("#divselectx ul").toggle();
			$(".mask").show();
		});
		$(divselectxid+" ul li a").click(function(){
			var txt = $(this).text();
			$(divselectxid+" small").html(txt);
			var value = $(this).attr("selectidx");
			inputselectx.val(value);
			$(divselectxid+" ul").hide();
			$(".mask").hide();
			$("#divselectx small").css("color","#333")
		});
	};
	$.divselectx("#divselectx","#inputselectx");
});
</script>
<script type="text/javascript">
$(function(){
	jQuery.divselecty = function(divselectyid,inputselectyid) {
		var inputselecty = $(inputselectyid);
		$(divselectyid+" small").click(function(){
			$("#divselecty ul").toggle();
			$(".mask").show();
		});
		$(divselectyid+" ul li a").click(function(){
			var txt = $(this).text();
			$(divselectyid+" small").html(txt);
			var value = $(this).attr("selectyid");
			inputselecty.val(value);
			$(divselectyid+" ul").hide();
			$(".mask").hide();
			$("#divselecty small").css("color","#333")
		});
	};
	$.divselecty("#divselecty","#inputselecty");
});
</script>
<script type="text/javascript">
$(function(){
   $(".mask").click(function(){
	   $(".mask").hide();
	   $(".all").hide();
   })
	$(".right input").blur(function () {
		if ($.trim($(this).val()) == '') {
			$(this).addClass("place").html();
		}
		else {
			$(this).removeClass("place");
		}
	})
});
</script>
<script>
$("#file0").change(function(){
	var objUrl = getObjectURL(this.files[0]) ;
	 obUrl = objUrl;
	console.log("objUrl = "+objUrl) ;
	if (objUrl) {
		$("#img0").attr("src", objUrl).show();
	}
	else{
		$("#img0").hide();
	}
}) ;
function qd(){
   var objUrl = getObjectURL(this.files[0]) ;
   obUrl = objUrl;
   console.log("objUrl = "+objUrl) ;
   if (objUrl) {
	   $("#img0").attr("src", objUrl).show();
   }
   else{
	   $("#img0").hide();
   }
}
function getObjectURL(file) {
	var url = null ;
	if (window.createObjectURL!=undefined) { // basic
		url = window.createObjectURL(file) ;
	} else if (window.URL!=undefined) { // mozilla(firefox)
		url = window.URL.createObjectURL(file) ;
	} else if (window.webkitURL!=undefined) { // webkit or chrome
		url = window.webkitURL.createObjectURL(file) ;
	}
	return url ;
}
</script>
<script type="text/javascript">
var subUrl = "";
$(function (){
	$(".file-3").bind('change',function(){
		subUrl = $(this).val()
		$(".yulan").show();
		$(".file-3").val("");
	});

	$(".file-3").each(function(){
		if($(this).val()==""){
			$(this).parents(".uploader").find(".filename").val("营业执照");
		}
	});
$(".btn-3").click(function(){
$("#img-1").attr("src", obUrl);
$(".yulan").hide();
$(".file-3").parents(".uploader").find(".filename").val(subUrl);
})
	$(".btn-2").click(function(){
		$(".yulan").hide();
	})

});
</script>
<script type="text/javascript">
function setImagePreview() {
	var preview, img_txt, localImag, file_head = document.getElementById("file_head"),
			picture = file_head.value;
	if (!picture.match(/.jpg|.gif|.png|.bmp/i)) return alert("您上传的图片格式不正确，请重新选择！"),
			!1;
	if (preview = document.getElementById("preview"), file_head.files && file_head.files[0]) preview.style.display = "block",
			preview.style.width = "100px",
			preview.style.height = "100px",
			preview.src = window.navigator.userAgent.indexOf("Chrome") >= 1 || window.navigator.userAgent.indexOf("Safari") >= 1 ? window.webkitURL.createObjectURL(file_head.files[0]) : window.URL.createObjectURL(file_head.files[0]);
	else {
		file_head.select(),
				file_head.blur(),
				img_txt = document.selection.createRange().text,
				localImag = document.getElementById("localImag"),
				localImag.style.width = "100px",
				localImag.style.height = "100px";
		try {
			localImag.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)",
					localImag.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = img_txt
		} catch(f) {
			return alert("您上传的图片格式不正确，请重新选择！"),
					!1
		}
		preview.style.display = "none",
				document.selection.empty()
	}
	return document.getElementById("DivUp").style.display = "block",
			!0
}
</script>

</body>
</html>

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
		    ]
		  });
		 wx.ready(function () {
		var shareinfo={
		 	 title: '我的精彩时刻等你来喝彩',
		      desc: '一起晒出你的精彩时刻吧',
		      link: '',
		      imgUrl: 'http://szxytang.com/yin/za/sczp3/share.jpg'}
		      wx.onMenuShareTimeline(shareinfo);
		 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>