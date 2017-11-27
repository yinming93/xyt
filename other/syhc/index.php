<?php
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
 	echo "window.location.href='http://szxytang.com/yin/bm/syhc/getcodeurl.php'";
 	echo "</script>";
 	exit;
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>运动场 生活家</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<script src="js/jquery-1.8.3.min.js"></script>
	<style>
	body{
		margin: 0px;
		padding: 0px;
		font-family: "微软雅黑";
		background-color: black;
		}
	.box{
    	width: 100%;
        margin: 0px;
        padding: 0px;
		position: absolute;
		background-color: #000;
		top:0px;
		left:0px;
		overflow: hidden;
		}
	.name{
		position:absolute;
		left:46%;
		top:56%;
		width:38%;
		height: 20px;
		font-size:15px;
		border: 1;
		border-radius: 5px;
		color: grey;
		}
	.tel{
		position:absolute;
		left:46%;
		top:63%;
		width:38%;
		height: 20px;
		font-size:15px;
		border: 1;
		border-radius: 5px;
		color: grey;
		}
	.bn{
		position:absolute;
		left:4%;
		top:88%;
		width:27%;
		height: 32px;
		border-radius:1px;
		background: orange;
		opacity: 0;
		font-size:18px;
		z-index: 100;
		color: white;
		border: 0;
	}
	.bn2{
		position:absolute;
		left:37%;
		top:88%;
		width:27%;
		height: 32px;
		border-radius:1px;
		background: orange;
		opacity: 0;
		font-size:18px;
		z-index: 100;
		color: white;
		border: 0;
	}
	.bn3{
		position:absolute;
		left:69%;
		top:88%;
		width:27%;
		height: 32px;
		border-radius:1px;
		background: orange;
		opacity: 0;
		font-size:18px;
		z-index: 100;
		color: white;
		border: 0;
	}
	#tu{
	    width: 100%;
	    height: 100%;
	    margin-bottom: -5px;
	}
	#gz{
	    width: 100%;
	    height: 100%;
	    z-index: 105;
	    position: absolute;
	    top: 0;
	    left: 0;
	}
	#guize{
	    width: 150px;
	    height: 36px;
	    background-color: red;
	    position: absolute;
	    top: 60%;
	    left: 30%;
	    opacity: 0;
	}
	#zi{
		width: 100%;
		position: absolute;
		top: 0%;
		left: 0%;
		background-color: black;
		color: white;
		opacity: 1;
		z-index: 101;
		display: none;
	}
	p{
		width: 90%;
		margin-left: 5%;
		margin-top: 50px;
	}
	#ri{
		position: absolute;
		top: 82%;
		left: 5%;
		color:white;
		font-size: 1em;
		width: 100%;
	}
	#cd{
		position: absolute;
		width: 38%;
		top: 70%;
		left: 46%;
		font-size: 1em;
	}
	.cj{
		width: 16%;
	}
	</style>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
</head>
<body onLoad="init()">
	<div class="box">
	<img id="tu" src="images/bg.jpg">
	<img id="gz" src="./gz.jpg" style="display:none;" onclick="gza()">
	<form action="add.php" method="POST">
		<input class="name" type="text" name="name" placeholder="请输入姓名">
		<input class="tel" type="tel" name="tel" placeholder="请输入电话">
		<input type="hidden" name="openid" value="<?php echo $openid; ?>">
		<select name="cd" id="cd">
			<option value="yu">羽毛球场</option>
			<option value="pp1">乒乓球场1</option>
			<option value="pp2">乒乓球场2</option>
		</select>

		<span id='ri'>
			<select class="cj" id="year" onChange="swap_day()" name="year"></select>年
			<select class="cj" id="month" onChange="swap_day()" name="month"></select>月
			<select class="cj" id="day" name="day"></select>日
			<select class="cj" id="hour" name="hour" style="width:20%;">
				<option value="10-12">10-12时</option>
				<option value="12-14">12-14时</option>
				<option value="14-16">14-16时</option>
				<option value="16-18">16-18时</option>
				<option value="18-20">18-20时</option>
			</select>
		</span>	
		<input class="bn" name="sub" type="button" value="提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交">

		<input class="bn2" name="sub2" type="button" onclick="cxa()" value="查&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;询">
		<input class="bn3" name="sub3" type="button" onclick="gui()" value="规&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;则">
	</form>
	<div id="lie" style="z-index:102;width:100%;height:100%;background:black;position:absolute;top:0%;left:0%;display:none;overflow-y:auto;color:white;opacity:0.8;text-align:center;">
	<div style="width:44px;height:25px;background:grey;position:fixed;right:0;line-height:25px;text-align:center;" onclick="gb()">关闭</div>
		<?php 
			include 'db.php';
			$t = date('Y-m-d');
			// 今天日期
			$m = date('Y-m-d',strtotime('+7 day'));
			// 七天后日期
			$sql="select * from $tbname where ri between '$t' and '$m'";
			// 查询七天内的数据
			$query = mysql_query($sql);
			 if( $query && mysql_num_rows($query)>0 ){
		        $qu = array();
		        while($row = mysql_fetch_assoc($query)){
		            $qu[] = $row;
		        }
		    }
		 ?>
		<h3>已预定场次（一周内）</h3>
		<table style="width:100%;">
		<tr style="font-weight:bold;">
			<td>预约人</td>
			<td>场地</td>
			<td>预约日期</td>
			<td>预约时间</td>
		</tr>
		<?php foreach($qu as $val): ?>
			<tr style="width:100%;">
				<td><?php echo $val['name'] ?></td>
				<td>
					 <?php 
		                if($val['cd'] == 'yu'){
		                    echo '羽毛球';
		                }elseif($val['cd'] == 'pp1'){
		                    echo '乒乓球一';
		                }else{  
		                    echo '乒乓球二';
		                }
            		 ?>
				</td>
				<td><?php echo $val['ri'] ?></td>
				<td><?php echo $val['hour'] ?>时</td>	
			</tr>
			<?php endforeach; ?>
		</table>	
	</div>
	</div>
	
</body>
</html>
<script>
	function cxa(){
		document.getElementById('lie').style.display='block';
	}
	function gb(){
		document.getElementById('lie').style.display='none';
	}
	function gui(){
		document.getElementById('gz').style.display='block';
	}
	function gza(){
		document.getElementById('gz').style.display='none';
	}
</script>
<script>
    		$("input[name='sub']").on("click",function(){
    			$.ajax({
    			url:'add.php',
    			data:$('form').serialize(),
    			type:'POST',
    			success:function(m){
// alert(m);
    				if(m=='chong'){
    					alert("该时间段已经被预定请选择其他时间！");
    				}
    				if(m=='ok'){
    					alert("恭喜你预约成功！");
    					window.location.href='getcodeurl.php';
    				}  
    				if(m=='chao'){
    					alert("只能选择未来两天之内的时间段哦！");
    				} 
    				if(m=='tian'){
    					alert("你今天已经预约过了哦！");
    				}    				
    				if(m=='tel'){
    					alert("手机号格式不正确！");
    				}    				
    				if(m=='wan'){
    					alert("请完善信息！");
    				}
    				if(m=='sb'){
    					alert("插入数据库失败！");
    				}
    			}
    			});
    		});
</script>
<script>
var month_big = new Array("1","3","5","7","8","10","12"); //包含所有大月的数组
var month_small = new Array("4","6","9","11"); //包含所有小月的数组 
 
//页面加载时调用的初始化select控件的option的函数
function init()
{
  var select_year = document.getElementById("year"); //获取id为"year"的下拉列表框
  var select_month = document.getElementById("month"); //获取id为"month"的下拉列表框
  var select_day = document.getElementById("day"); //获取id为"day"的下拉列表框
   
  //将年份选项初始化，从2016到2020
  for(var i = 2016; i <= 2020; i++)
  {
    select_year_option = new Option(i, i);
    select_year.options.add(select_year_option);
  }
   
  //将月份选项初始化，从1到12
  for(var i = 1; i <= 12; i++)
  {
    select_month_option = new Option(i, i);
    select_month.options.add(select_month_option);
  }
   
  //调用swap_day函数初始化日期  
  swap_day();
}
//判断数组array中是否包含元素obj的函数，包含则返回true，不包含则返回false
function array_contain(array, obj)
{
  for (var i = 0; i < array.length; i++)
  {
    if (array[i] === obj)
    {
      return true;
    }
  }
  return false;
}
 
//根据年份和月份调整日期的函数
function swap_day()
{
  var select_year = document.getElementById("year"); //获取id为"year"的下拉列表框
  var select_month = document.getElementById("month"); //获取id为"month"的下拉列表框
  var select_day = document.getElementById("day"); //获取id为"day"的下拉列表框
   
  select_day.options.length = 0; //在调整前先清空日期选项里面的原有选项
  var month = select_month.options[select_month.selectedIndex].value; //获取被选中的月份month
   
  //如果month被包含在month_big数组中，即被选中月份是大月，则将日期选项初始化为31天
  if(array_contain(month_big, month))
  {
    for(var i = 1; i <= 31; i++)
    {
      select_day_option = new Option(i, i);
      select_day.options.add(select_day_option);
    }
  }
   
  //如果month被包含在month_small数组中，即被选中月份是小月，则将日期选项初始化为30天
  else if(array_contain(month_small, month))
  {
    for(var i = 1; i <= 30; i++)
    {
      select_day_option = new Option(i, i);
      select_day.options.add(select_day_option);
    }
  }
   
  //如果month为2，即被选中的月份是2月，则调用initFeb()函数来初始化日期选项
  else
  {
    initFeb();   
  }
}
//判断年份year是否为闰年，是闰年则返回true，否则返回false
function isLeapYear(year)
{
  var a = year % 4;
  var b = year % 100;
  var c = year % 400;
  if( ( (a == 0) && (b != 0) ) || (c == 0) )
  {
    return true;
  }
  return false;
}
 
//根据年份是否闰年来初始化二月的日期选项
function initFeb()
{
  var select_year = document.getElementById("year"); //获取id为"year"的下拉列表框
  var select_day = document.getElementById("day"); //获取id为"day"的下拉列表框
  var year = parseInt(select_year.options[select_year.selectedIndex].value); //获取被选中的年份并转换成Int
   
  //如果是闰年，则将日期选项初始化为29天
  if(isLeapYear(year))
  {
    for(var i = 1; i <= 29; i++)
    {
      select_day_option = new Option(i, i);
      select_day.options.add(select_day_option);
    }
  }
   
  //如果不是闰年，则将日期选项初始化为28天
  else
  {
    for(var i = 1; i <= 28; i++)
    {
      select_day_option = new Option(i, i);
      select_day.options.add(select_day_option);
    }
  }
}
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
		    ]
		  });
		 wx.ready(function () {
		var shareinfo={
		 	 title: '运动场 生活家',
		      desc: '水漾花城运动场开启预约',
		      link: 'http://szxytang.com/yin/bm/syhc/getcodeurl.php',
		      imgUrl: 'http://szxytang.com/yin/bm/syhc/share.jpg'}
		      wx.onMenuShareTimeline(shareinfo);
		 wx.onMenuShareAppMessage(shareinfo);
		  });
    </script>