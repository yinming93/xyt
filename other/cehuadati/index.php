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
        $query=mysql_query("select *from $tbname where openid='$openid'");

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
 	echo "window.location.href='http://szxytang.com/yin/bm/cehuadati/getcodeurl.php';";
 	echo "</script>";
 	exit;
 }
 if ($row){
	echo "<script>";
	echo "alert('已参与过');";
	// echo "window.location.href='sel.php';";
	echo "</script>";
 }
 // 当前时间戳
	// $xz=time();
	// // 活动结束时间
	// $js=strtotime('2017-04-03 23:59:59');
	// if ($xz>$js){
	// echo "<script>";
	// echo "alert('本次活动已圆满结束，感谢您的参与！');";
	// echo "window.location='sel.php'";
	// echo "</script>";
	// }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<title>苏南龙湖营销费用策划试题2017</title>
</head>
<style>
body{
	padding:0;
	margin:0;
	width: 100%;
}
.tt{
	width: 90%;
	margin-left: 5%;
}
#demo{
	width: 70%;
	margin-left: 15%;
	height: 50px;
	background: white;
	color:#A9854E;
	font-size:28px;
	text-align: center;
	position: fixed;
	top: 0;
}
#bm{
	width: 100%;
	height: 120%;
	background:black;
	opacity: 0.9;
	position: fixed;
	top:0;
	left: 0;
	z-index: 999;
}
.bn{
width:70%;
height:30px;
margin-left:15%;
}
.bn2{
width:70%;
height:30px;
margin-left:15%;
}
.bg{
	margin-top: 90px;
}
</style>
<body>
<div class="bg">
<div id="bm">
<br><br><br><br><br>
<form action="add.php?a=add" method="POST">
	<center><h3 style="color:white;">请输入您的姓名</h3></center>
	<input type="hidden" name="openid" value="<?php echo $openid; ?>">
	<input style="width:70%;height:30px;margin-left:15%;" type="text" name="name" id="name"><br><br>
	<input id="bn" class="bn" name="sub" type="button" value="开始答题">
</form>
</div>
<h4 id="demo"></h4>
一、选择（每题6分共15题）
<form action="add.php?a=update" method="POST">
	<div class="tt" id="t1">
	<p>1、微信公司合同服务将至，由于服务良好，仍继续合作，可提前走   类型工作联系单，审批后可采用直接委托方式续签</p>
	<label><input type="radio" name="o1" value='1'>A、《营销分供方招选》</label><br><br>
	<label><input type="radio" name="o1" value='0'>B、《营销事前报备》</label><br><br>
	<label><input type="radio" name="o1" value='0'>C、《销售中心费用相关》</label><br><br>
	</div>

	<div class="tt" id="t2">
	<p>2、活动分供方必须年初招标签订框架合同，分供方数量必须小于等于几家</p>
	<label><input type="radio" name="o2" value='0'>A、5</label><br><br>
	<label><input type="radio" name="o2" value='1'>B、8</label><br><br>
	<label><input type="radio" name="o2" value='0'>C、10</label><br><br>
	<label><input type="radio" name="o2" value='0'>C、15</label><br><br>
	</div>

	<div class="tt" id="t3">
	<p>3、单次活动大于等于10万元，从相应的框架分供方中招投标，如需引入外部分供方，单独提交   类型工作联系单新增供方申请</p>
	<label><input type="radio" name="o3" value='1'>A、《营销分供方招选》</label><br><br>
	<label><input type="radio" name="o3" value='0'>B、《营销事前报备》</label><br><br>
	<label><input type="radio" name="o3" value='0'>C、《销售中心费用相关》</label><br><br>
	</div>

	<div class="tt" id="t4">
	<p>4、物料制作类分供方需通过招标的方式签订年框合同，同类型物料制作分供方框架合作书小于等于几家</p>
	<label><input type="radio" name="o4" value='1'>A、3</label><br><br>
	<label><input type="radio" name="o4" value='0'>B、5</label><br><br>
	<label><input type="radio" name="o4" value='0'>C、8</label><br><br>
	<label><input type="radio" name="o4" value='0'>C、10</label><br><br>
	</div>

	<div class="tt" id="t5">
	<p>5、如遇单笔合作业务（如精神堡垒、售场导视、合同资料架等专项制作品），非框架合作供方的服务范围，单笔大于多少金额，需另行招标</p>
	<label><input type="radio" name="o5" value='1'>A、3万</label><br><br>
	<label><input type="radio" name="o5" value='0'>B、5万</label><br><br>
	<label><input type="radio" name="o5" value='0'>C、8万</label><br><br>
	<label><input type="radio" name="o5" value='0'>C、10万</label><br><br>
	</div>

	<div class="tt" id="t6">
	<p>6、原则上综合得分最高者中标，什么情况下方案最优者中标</p>
	<label><input type="radio" name="o6" value='1'>A、依据招标要求，投标分供方的《技术标》在专业能力、方案创新与可执行性更适合招标项目需求，且中标价格相差5%以内，方案最优者中标</label><br><br>
	<label><input type="radio" name="o6" value='0'>B、依据招标要求，投标分供方的《技术标》在专业能力、方案创新与可执行性更适合招标项目需求，且中标价格相差8%以内，方案最优者中标</label><br><br>
	<label><input type="radio" name="o6" value='0'>C、依据招标要求，投标分供方的《技术标》在专业能力、方案创新与可执行性更适合招标项目需求，且中标价格相差10%以内，方案最优者中标</label><br><br>
	</div>

	<div class="tt" id="t7">
	<p>7、无合同付款指单次业务无法签订合同，且发生金额不超过     万；</p>
	<label><input type="radio" name="o7" value='1'>A、3万</label><br><br>
	<label><input type="radio" name="o7" value='0'>B、5万</label><br><br>
	<label><input type="radio" name="o7" value='0'>C、8万</label><br><br>
	<label><input type="radio" name="o7" value='0'>C、10万</label><br><br>
	</div>

	<div class="tt" id="t8">
	<p>8、如框架协议实际金额超过合同预估金额，需要签订补充协议；非框架协议实际金额超过合同总金额，需要进行合同变更，其中营销推广费合同变更金额比例限制不得高于原合同金额的      %。</p>
	<label><input type="radio" name="o8" value='0'>A、10</label><br><br>
	<label><input type="radio" name="o8" value='0'>B、20</label><br><br>
	<label><input type="radio" name="o8" value='1'>C、30</label><br><br>
	</div>

	<div class="tt" id="t9">
	<p>9、 2017年苏南直投预算费效比</p>
	<label><input type="radio" name="o9" value='0'>A、0.9%</label><br><br>
	<label><input type="radio" name="o9" value='0'>B、1.06%</label><br><br>
	<label><input type="radio" name="o9" value='1'>C、1.09%</label><br><br>
	</div>

	<div class="tt" id="t10">
	<p>10、2017年苏南电商预算收益费效比</p>
	<label><input type="radio" name="o10" value='0'>A、0.9%</label><br><br>
	<label><input type="radio" name="o10" value='1'>B、0.5%</label><br><br>
	<label><input type="radio" name="o10" value='0'>C、0.3%</label><br><br>
	</div>

	<div class="tt" id="t11">
	<p>11、2017年苏南电商预算投放费效比</p>
	<label><input type="radio" name="o11" value='0'>A、0.9%</label><br><br>
	<label><input type="radio" name="o11" value='1'>B、0.5%</label><br><br>
	<label><input type="radio" name="o11" value='0'>C、0.3%</label><br><br>
	</div>

	<div class="tt" id="t12">
	<p>12、以下哪几类费用可以走电商合同</p>
	<label><input type="checkbox" name="ho[]" value='1'>A、媒体</label><br><br>
	<label><input type="checkbox" name="ho[]" value='1'>B、户外</label><br><br>
	<label><input type="checkbox" name="ho[]" value='0'>C、活动费</label><br><br>
	<label><input type="checkbox" name="ho[]" value='0'>D、官微官网推广</label><br><br>
	</div>

	<div class="tt" id="t13">
	<p>13、电商合同中的房源及优惠信息如何确认</p>
	<label><input type="radio" name="o13" value='0'>A、照抄上月合同</label><br><br>
	<label><input type="radio" name="o13" value='0'>B、与项目营销经理确认</label><br><br>
	<label><input type="radio" name="o13" value='1'>C、参照月度电商工作联系单</label><br><br>
	</div>

	<div class="tt" id="t14">
	<p>14、独家资源金额超过多少必须经过议价后投放</p>
	<label><input type="radio" name="o14" value='0'>A、3万</label><br><br>
	<label><input type="radio" name="o14" value='0'>B、5万</label><br><br>
	<label><input type="radio" name="o14" value='1'>C、无论金额大小都必须议价</label><br><br>
	</div>

	<div class="tt" id="t15">
	<p>15、投放金额超过多少需群Q报备</p>
	<label><input type="radio" name="o15" value='0'>A、3万</label><br><br>
	<label><input type="radio" name="o15" value='0'>B、5万</label><br><br>
	<label><input type="radio" name="o15" value='1'>C、无论金额大小都必须议价</label><br><br>
	</div>
二、简答题（每题10分共1题）
	<div class="tt">
	<p>简述推广费用发生及提交流程（10分）</p>
	<textarea name="jdt" id="" cols="30" rows="10" style="width:90%;margin-left:5%;"></textarea>
	</div><br>
	<input type="hidden" name="openid2" value="<?php echo $openid; ?>">
	<input class="bn2" name="sub2" type="button" value="交卷"><br><br>
</form>
</div>
</body>
</html>
<script src="http://2015image.bj.bcebos.com/js/jquery-1.11.1.min.js"></script> 
<script>
	var myVar;var t=1800;
		function startTimer(){/*setInterval() 间隔指定的毫秒数不停地执行指定的代码*/
			
			myVar=setInterval(function(){myTimer()},1000);
		}
		function myTimer(){/* 定义一个得到本地时间的函数*/
			/* var d=new Date();
			var t=d.toLocaleTimeString(); */
			t-=1;
			a1=(Math.floor(t/60)+(t%60)/100).toString();
			if(a1.length==2){
				a1=a1+".00";
			}else if(a1.length==4){
				a1=a1+"0";
			}
			if (t==0){
				$("input[name='sub2']").trigger("click");
			}
			//document.getElementById("demo").innerHTML=Math.floor(t/60)+(t%60)/100;
			document.getElementById("demo").innerHTML='时间：'+a1;
			document.cookie="tt="+a1;
		}
		function stopTimer(){/* clearInterval() 方法用于停止 setInterval() 方法执行的函数代码*/
			clearInterval(myVar);
		}
</script>
<script>
	$("input[name='sub']").on("click",function(){
		$.ajax({
		url:'add.php?a=add',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){
			if(m=='chong'){
				alert("请勿重复提交！");
			}
			if(m=='ok'){
				document.getElementById('bm').style.display='none';
				startTimer()
				alert('答题过程中不得中途退出，退出不交卷即默认弃权')
			}  			
			if(m=='wan'){
				alert("请填写姓名！");
			}
		}
		})
	})
</script>
<script>
	$("input[name='sub2']").on("click",function(){
		$.ajax({
		url:'add.php?a=update',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){
			// alert(m);return false;
			if(m=='chong'){
				alert("请勿重复提交！");
			}
			if(m=='ok'){
				alert('交卷成功');
				window.location.href='sel.php';
			}  			
			if(m=='wan'){
				alert("你有题目尚未作答！");
			}
		}
		})
	})
</script>
<!--开始-->
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
       title: '苏南龙湖营销费用策划试题2017',
          desc: '仅供内部使用',
          link: 'http://szxytang.com/yin/bm/cehuadati/getcodeurl.php',
          imgUrl: 'http://szxytang.com/yin/bm/cehuadati/share.jpg'
      }
      // wx.hideOptionMenu();
      wx.onMenuShareTimeline(shareinfo);
   wx.onMenuShareAppMessage(shareinfo);
      });
    </script>
<!--结束-->