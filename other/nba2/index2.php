<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<script src="js/jquery-1.8.2.min.js"></script>
<link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<title>画舫类型测试答题</title>
</head>
<style>
	body{
	padding:0;
	margin:0;
	font-family:"黑体";
	}
	.main{
		width: 100%;
		height: 100%;
		background: url('bg2.jpg') no-repeat;
		background-size: 100% 100%;
	}
	.timu{
		width: 50%;
		height: 70%;
		background: url('bg3.png') no-repeat;
		background-size: 100% 100%;
		float: left;
		position: absolute;
		left: 25%;
		top: 20%;
		display: none;
		border-radius: 7px;
	}
	.timu img{
		width: 50%;
		margin-left: 25%;
		margin-top: 4%;
	}
	.timu p,.timu span{
		padding-left: 25%;
		margin-top: 3%;
		color: white;
	}
	.timu span label{
		width: 15%;
		height: 40px;
		background:#EE914E;
		border-radius: 5px;
		text-align: center;
		font-size: 16px;
		color: black;
		line-height: 40px;
		font-family:"黑体";
	}
	.timu span label input{
		opacity: 0;
		width: 1px;
	}
	.timu span label:nth-child(2),.timu span label:nth-child(3){
		margin-left: 1.4%;
	}
	#demo{
		opacity: 0;
		background: yellow;
		position: absolute;
		top: 0;
		left: 0;
	}
.sfdr1{
-webkit-animation:fadeInDown 2s .2s ease both;
-moz-animation:fadeInDown 2s .2s ease both;}
@-webkit-keyframes fadeInDown{
0%{opacity:0;
-webkit-transform:translateY(-20px)}
100%{opacity:1;
-webkit-transform:translateY(0)}
}
@-moz-keyframes fadeInDown{
0%{opacity:0;
-moz-transform:translateY(-20px)}
100%{opacity:1;
-moz-transform:translateY(0)}
}
.sfdr2{
-webkit-animation:fadeInDown 2s .7s ease both;
-moz-animation:fadeInDown 2s .7s ease both;}
@-webkit-keyframes fadeInDown{
0%{opacity:0;
-webkit-transform:translateY(-20px)}
100%{opacity:1;
-webkit-transform:translateY(0)}
}
@-moz-keyframes fadeInDown{
0%{opacity:0;
-moz-transform:translateY(-20px)}
100%{opacity:1;
-moz-transform:translateY(0)}
}
.sfdr3{
-webkit-animation:fadeInDown 2s 1.2s ease both;
-moz-animation:fadeInDown 2s 1.2s ease both;}
@-webkit-keyframes fadeInDown{
0%{opacity:0;
-webkit-transform:translateY(-20px)}
100%{opacity:1;
-webkit-transform:translateY(0)}
}
@-moz-keyframes fadeInDown{
0%{opacity:0;
-moz-transform:translateY(-20px)}
100%{opacity:1;
-moz-transform:translateY(0)}
}
.sfdr4{
-webkit-animation:fadeInDown 2s 1.7s ease both;
-moz-animation:fadeInDown 2s 1.7s ease both;}
@-webkit-keyframes fadeInDown{
0%{opacity:0;
-webkit-transform:translateY(-20px)}
100%{opacity:1;
-webkit-transform:translateY(0)}
}
@-moz-keyframes fadeInDown{
0%{opacity:0;
-moz-transform:translateY(-20px)}
100%{opacity:1;
-moz-transform:translateY(0)}
}.sfdr5{
-webkit-animation:fadeInDown 2s 2.2s ease both;
-moz-animation:fadeInDown 2s 2.2s ease both;}
@-webkit-keyframes fadeInDown{
0%{opacity:0;
-webkit-transform:translateY(-20px)}
100%{opacity:1;
-webkit-transform:translateY(0)}
}
@-moz-keyframes fadeInDown{
0%{opacity:0;
-moz-transform:translateY(-20px)}
100%{opacity:1;
-moz-transform:translateY(0)}
}
.fz1{
-webkit-animation:flipInX 1s .2s ease both;
-moz-animation:flipInX 1s .2s ease both;}
@-webkit-keyframes flipInX{
0%{-webkit-transform:perspective(400px) rotateX(90deg);
opacity:0}
40%{-webkit-transform:perspective(400px) rotateX(-10deg)}
70%{-webkit-transform:perspective(400px) rotateX(10deg)}
100%{-webkit-transform:perspective(400px) rotateX(0deg);
opacity:1}
}
@-moz-keyframes flipInX{
0%{-moz-transform:perspective(400px) rotateX(90deg);
opacity:0}
40%{-moz-transform:perspective(400px) rotateX(-10deg)}
70%{-moz-transform:perspective(400px) rotateX(10deg)}
100%{-moz-transform:perspective(400px) rotateX(0deg);
opacity:1}
}
.modal-dialog{
		margin-top:16%;
	}
</style>
<body>
<div class="main">
	<div class="timu" id="1">
		<img src="images/1.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o1" q='0'></label>
			<label>象征型舫<input type="radio" name="o1" q='0'></label>
			<label>集萃型舫<input type="radio" name="o1" q='1'></label>
		</span>
	</div>
	<div class="timu" id="2">
		<img src="images/2.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o2" q='0'></label>
			<label>象征型舫<input type="radio" name="o2" q='0'></label>
			<label>集萃型舫<input type="radio" name="o2" q='1'></label>
		</span>
	</div>
	<div class="timu" id="3">
		<img src="images/3.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o3" q='0'></label>
			<label>象征型舫<input type="radio" name="o3" q='0'></label>
			<label>集萃型舫<input type="radio" name="o3" q='1'></label>
		</span>
	</div>
	<div class="timu" id="4">
		<img src="images/4.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o4" q='0'></label>
			<label>象征型舫<input type="radio" name="o4" q='0'></label>
			<label>集萃型舫<input type="radio" name="o4" q='1'></label>
		</span>
	</div>
	<div class="timu" id="5">
		<img src="images/5.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o5" q='0'></label>
			<label>象征型舫<input type="radio" name="o5" q='0'></label>
			<label>集萃型舫<input type="radio" name="o5" q='1'></label>
		</span>
	</div>
	<div class="timu" id="6">
		<img src="images/6.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o6" q='0'></label>
			<label>象征型舫<input type="radio" name="o6" q='0'></label>
			<label>集萃型舫<input type="radio" name="o6" q='1'></label>
		</span>
	</div>
	<div class="timu" id="7">
		<img src="images/7.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o7" q='0'></label>
			<label>象征型舫<input type="radio" name="o7" q='0'></label>
			<label>集萃型舫<input type="radio" name="o7" q='1'></label>
		</span>
	</div>
	<div class="timu" id="8">
		<img src="images/8.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o8" q='0'></label>
			<label>象征型舫<input type="radio" name="o8" q='0'></label>
			<label>集萃型舫<input type="radio" name="o8" q='1'></label>
		</span>
	</div>
	<div class="timu" id="9">
		<img src="images/9.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o9" q='0'></label>
			<label>象征型舫<input type="radio" name="o9" q='0'></label>
			<label>集萃型舫<input type="radio" name="o9" q='1'></label>
		</span>
	</div>
	<div class="timu" id="10">
		<img src="images/10.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o10" q='0'></label>
			<label>象征型舫<input type="radio" name="o10" q='0'></label>
			<label>集萃型舫<input type="radio" name="o10" q='1'></label>
		</span>
	</div>
	<div class="timu" id="11">
		<img src="images/11.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o11" q='0'></label>
			<label>象征型舫<input type="radio" name="o11" q='0'></label>
			<label>集萃型舫<input type="radio" name="o11" q='1'></label>
		</span>
	</div>
	<div class="timu" id="12">
		<img src="images/12.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o12" q='0'></label>
			<label>象征型舫<input type="radio" name="o12" q='0'></label>
			<label>集萃型舫<input type="radio" name="o12" q='1'></label>
		</span>
	</div>
	<div class="timu" id="13">
		<img src="images/13.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o13" q='0'></label>
			<label>象征型舫<input type="radio" name="o13" q='1'></label>
			<label>集萃型舫<input type="radio" name="o13" q='0'></label>
		</span>
	</div>
	<div class="timu" id="14">
		<img src="images/14.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o14" q='0'></label>
			<label>象征型舫<input type="radio" name="o14" q='1'></label>
			<label>集萃型舫<input type="radio" name="o14" q='0'></label>
		</span>
	</div>
	<div class="timu" id="15">
		<img src="images/15.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o15" q='0'></label>
			<label>象征型舫<input type="radio" name="o15" q='1'></label>
			<label>集萃型舫<input type="radio" name="o15" q='0'></label>
		</span>
	</div>
	<div class="timu" id="16">
		<img src="images/16.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o16" q='0'></label>
			<label>象征型舫<input type="radio" name="o16" q='1'></label>
			<label>集萃型舫<input type="radio" name="o16" q='0'></label>
		</span>
	</div>
	<div class="timu" id="17">
		<img src="images/17.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o17" q='0'></label>
			<label>象征型舫<input type="radio" name="o17" q='1'></label>
			<label>集萃型舫<input type="radio" name="o17" q='0'></label>
		</span>
	</div>
	<div class="timu" id="18">
		<img src="images/18.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o18" q='0'></label>
			<label>象征型舫<input type="radio" name="o18" q='1'></label>
			<label>集萃型舫<input type="radio" name="o18" q='0'></label>
		</span>
	</div>
	<div class="timu" id="19">
		<img src="images/19.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o19" q='0'></label>
			<label>象征型舫<input type="radio" name="o19" q='1'></label>
			<label>集萃型舫<input type="radio" name="o19" q='0'></label>
		</span>
	</div>
	<div class="timu" id="20">
		<img src="images/20.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o20" q='0'></label>
			<label>象征型舫<input type="radio" name="o20" q='1'></label>
			<label>集萃型舫<input type="radio" name="o20" q='0'></label>
		</span>
	</div>
	<div class="timu" id="21">
		<img src="images/21.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o21" q='1'></label>
			<label>象征型舫<input type="radio" name="o21" q='0'></label>
			<label>集萃型舫<input type="radio" name="o21" q='0'></label>
		</span>
	</div>
	<div class="timu" id="22">
		<img src="images/22.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o22" q='1'></label>
			<label>象征型舫<input type="radio" name="o22" q='0'></label>
			<label>集萃型舫<input type="radio" name="o22" q='0'></label>
		</span>
	</div>
	<div class="timu" id="23">
		<img src="images/23.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o23" q='1'></label>
			<label>象征型舫<input type="radio" name="o23" q='0'></label>
			<label>集萃型舫<input type="radio" name="o23" q='0'></label>
		</span>
	</div>
	<div class="timu" id="24">
		<img src="images/24.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o24" q='1'></label>
			<label>象征型舫<input type="radio" name="o24" q='0'></label>
			<label>集萃型舫<input type="radio" name="o24" q='0'></label>
		</span>
	</div>
	<div class="timu" id="25">
		<img src="images/25.jpg" alt="">
		<p></p>
		<span>
			<label>写实型舫<input type="radio" name="o25" q='1'></label>
			<label>象征型舫<input type="radio" name="o25" q='0'></label>
			<label>集萃型舫<input type="radio" name="o25" q='0'></label>
		</span>
	</div>
	
	<!-- 开始答题按钮和遮罩层 -->
	<div id="zhezhao" style="width:100%;height:100%;background: url('bg2.jpg') no-repeat;;opacity:0.99;background-size: 100% 100%;">
	<img class="sfdr1" id="tu1" src="" style="width:13%;position:absolute;top:20%;left:35%;">
	<img class="sfdr2" id="tu2" src="" style="width:13%;position:absolute;top:20%;left:52%;">
	<img class="sfdr3" id="tu3" src="" style="width:13%;position:absolute;top:52%;left:26.5%;">
	<img class="sfdr4" id="tu4" src="" style="width:13%;position:absolute;top:52%;left:43.5%;">
	<img class="sfdr5" id="tu5" src="" style="width:13%;position:absolute;top:52%;left:60.5%;">
	</div>
	<span id="zia" style="width:30%;height:6%;background:;position:absolute;bottom:12%;left:30%;text-align:center;line-height:40px;color:white;font-size:24px;border:0;border-radius:5px;">系统已经为你随机选择了5道题</span>
	<input name="sub2" id="kaishi" type="button" value="开始答题" style="width:12%;height:6%;background:#EE914E;position:absolute;bottom:12%;left:61%;text-align:center;line-height:40px;color:black;font-size:15px;border:0;border-radius:5px;" onclick="ksdt()">

	<!-- 提交成绩按钮 -->
	<form action="add.php" method="POST">
	<!-- <h4 id="demo"></h4> -->
	<input type="text" name="ttt" id="demo">
	<h1 id="zizi" style="position:absolute;top:35%;left:20%;width:60%;text-align:center;color:white;display:none;">你已答题完毕，赶紧点击下方按钮提交成绩吧！</h1>
	<input name="sub" id="tijiao" type="button" value="确认提交" style="width:10%;height:40px;background:#EE914E;position:absolute;bottom:15%;left:45%;text-align:center;line-height:40px;color:black;font-size:15px;border:0;border-radius:5px;display:none;">
	</form>
</div>
<!-- 对错弹框 -->
	<div id="true" style="width:40%;z-index:888;position:absolute;top:23%;left:30%;display:none;">
		<img src="images/true.png" style="width:100%;">
	</div>
	<div id="wrong" style="width:40%;z-index:888;position:absolute;top:23%;left:30%;display:none;" onclick="xsb()">
		<img src="images/wrong.png" style="width:100%;">
	</div>
</body>
</html>
<script src="./lib/jquery/jquery.min.js"></script>
<script src="./lib/bootstrap/js/bootstrap.js"></script>
<script src="js/dialog.js"></script>
<script>
	function dui(){
		$("#true").css('display','block');
		$("#true").fadeOut(1000);
	}
	function cuo(){
		$("#wrong").css('display','block');
	}
	function xsb(){
		$("#wrong").css('display','none');
	}

	function ksdt(){
		$("#zhezhao").css("display","none");
		$("#kaishi").css("display","none");
		$("#zia").css("display","none");
		// $("#tijiao").css("display","block");
		timedCount();
		// *给随机出来的五道题加动画
		$('#'+out[0]).attr('class','timu'+' fz1');
		$('#'+out[1]).attr('class','timu'+' fz1');
		$('#'+out[2]).attr('class','timu'+' fz1');
		$('#'+out[3]).attr('class','timu'+' fz1');
		$('#'+out[4]).attr('class','timu'+' fz1');
	}
</script>
<!-- 判断有没有答对 -->
<script>
var shu = 0;
$("input:radio").on('click',function(){
	 if($(this).attr("q")==0){
        // Alert('选错咯，请重新选择！');
        cuo();
        $(this).attr("checked",false);
      }else{
      	dui();
      	shu++;
      	if (shu<5){
      		$(this).parent().parent().parent().css('display','none');
      	}else{
      		// Alert('已全部答完，点击下方按钮提交');
      		$('#tijiao').css('display','block');
      		$('#zizi').css('display','block');
      		$(this).parent().parent().parent().css('display','none');
      	}
      	
      }
})
</script>
<!-- 随机取5道题显示 -->
<script>
//原数组
var arr = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25];
//输出数组
var out = [];
//输出个数
var num = 5;
while(out.length < num){
    var temp = (Math.random()*arr.length) >> 0;
    out.push(arr.splice(temp,1));
}
document.getElementById(out[0]).style.display='block';
document.getElementById(out[1]).style.display='block';
document.getElementById(out[2]).style.display='block';
document.getElementById(out[3]).style.display='block';
document.getElementById(out[4]).style.display='block';

// *随机的5张单独图片显示在最上方
$('#tu1').attr('src','images/'+out[0]+'.jpg');
$('#tu2').attr('src','images/'+out[1]+'.jpg');
$('#tu3').attr('src','images/'+out[2]+'.jpg');
$('#tu4').attr('src','images/'+out[3]+'.jpg');
$('#tu5').attr('src','images/'+out[4]+'.jpg');
</script>
<script>
$("input[name='sub']").on("click",function(){

var tt1=$('#'+out[0]).children().children().children("input[type='radio']:checked").val();
var tt2=$('#'+out[1]).children().children().children("input[type='radio']:checked").val();
var tt3=$('#'+out[2]).children().children().children("input[type='radio']:checked").val();
var tt4=$('#'+out[3]).children().children().children("input[type='radio']:checked").val();
var tt5=$('#'+out[4]).children().children().children("input[type='radio']:checked").val();
if(tt1==null||tt2==null||tt3==null||tt4==null||tt5==null){
    Alert("你还有题未完成哦!");
    return false;
}


	$.ajax({
	url:'add.php?a=second',
	data:$('form').serialize(),
	type:'POST',
	success:function(m){
		// alert(m);return false;
		if(m=='rep'){
			Alert("请勿重复提交！");
		}
		if(m=='ok'){
			// Alert('提交成功');
			window.location.href='sel.php';
		}
		if(m==-1){
			Alert("请输入您的姓名！");
		}
		if(m==-2){
			Alert("插入数据库失败！");
		}
	}
	});
});
</script>
<script>
var c=0;
var t;	
function timedCount(){
document.getElementById('demo').value=c;
c=c+1;
t=setTimeout("timedCount()",10);
}
</script>