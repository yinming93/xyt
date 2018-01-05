<?php
  //引入js类文件
   require_once "../jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
	require_once('../func.php'); 
	require_once('../db.php'); 
	
	
$sql="select * from $tbname where a1='1' or a2='1' or a3='1' or a4='1' or a5='1' or a6='1' or a7='1' or a8='1' or a9='1' or a10='1'";
$query = mysql_query($sql);
$qq1 = mysql_num_rows($query);

$sql2="select * from $tbname where a1='2' or a2='2' or a3='2' or a4='2' or a5='2' or a6='2' or a7='2' or a8='2' or a9='2' or a10='2'";
$query2 = mysql_query($sql2);
$qq2 = mysql_num_rows($query2);

$sql3="select * from $tbname where a1='3' or a2='3' or a3='3' or a4='3' or a5='3' or a6='3' or a7='3' or a8='3' or a9='3' or a10='3'";
$query3 = mysql_query($sql3);
$qq3 = mysql_num_rows($query3);

$sql4="select * from $tbname where a1='4' or a2='4' or a3='4' or a4='4' or a5='4' or a6='4' or a7='4' or a8='4' or a9='4' or a10='4'";
$query4 = mysql_query($sql4);
$qq4 = mysql_num_rows($query4);

$sql5="select * from $tbname where a1='5' or a2='5' or a3='5' or a4='5' or a5='5' or a6='5' or a7='5' or a8='5' or a9='5' or a10='5'";
$query5 = mysql_query($sql5);
$qq5 = mysql_num_rows($query5);

$sql6="select * from $tbname where a1='6' or a2='6' or a3='6' or a4='6' or a5='6' or a6='6' or a7='6' or a8='6' or a9='6' or a10='6'";
$query6 = mysql_query($sql6);
$qq6 = mysql_num_rows($query6);

$sql7="select * from $tbname where a1='7' or a2='7' or a3='7' or a4='7' or a5='7' or a6='7' or a7='7' or a8='7' or a9='7' or a10='7'";
$query7 = mysql_query($sql7);
$qq7 = mysql_num_rows($query7);

$sql8="select * from $tbname where a1='8' or a2='8' or a3='8' or a4='8' or a5='8' or a6='8' or a7='8' or a8='8' or a9='8' or a10='8'";
$query8 = mysql_query($sql8);
$qq8 = mysql_num_rows($query8);

$sql9="select * from $tbname where a1='9' or a2='9' or a3='9' or a4='9' or a5='9' or a6='9' or a7='9' or a8='9' or a9='9' or a10='9'";
$query9 = mysql_query($sql9);
$qq9 = mysql_num_rows($query9);

$sql10="select * from $tbname where a1='10' or a2='10' or a3='10' or a4='10' or a5='10' or a6='10' or a7='10' or a8='10' or a9='10' or a10='10'";
$query10 = mysql_query($sql10);
$qq10 = mysql_num_rows($query10);

$sql11="select * from $tbname where a1='11' or a2='11' or a3='11' or a4='11' or a5='11' or a6='11' or a7='11' or a8='11' or a9='11' or a10='11'";
$query11 = mysql_query($sql11);
$qq11 = mysql_num_rows($query11);

$sql12="select * from $tbname where a1='12' or a2='12' or a3='12' or a4='12' or a5='12' or a6='12' or a7='12' or a8='12' or a9='12' or a10='12'";
$query12 = mysql_query($sql12);
$qq12 = mysql_num_rows($query12);

$sql13="select * from $tbname where a1='13' or a2='13' or a3='13' or a4='13' or a5='13' or a6='13' or a7='13' or a8='13' or a9='13' or a10='13'";
$query13 = mysql_query($sql13);
$qq13 = mysql_num_rows($query13);

$sql14="select * from $tbname where a1='14' or a2='14' or a3='14' or a4='14' or a5='14' or a6='14' or a7='14' or a8='14' or a9='14' or a10='14'";
$query14 = mysql_query($sql14);
$qq14 = mysql_num_rows($query14);

$sql15="select * from $tbname where a1='15' or a2='15' or a3='15' or a4='15' or a5='15' or a6='15' or a7='15' or a8='15' or a9='15' or a10='15'";
$query15 = mysql_query($sql15);
$qq15 = mysql_num_rows($query15);

$sql16="select * from $tbname where a1='16' or a2='16' or a3='16' or a4='16' or a5='16' or a6='16' or a7='16' or a8='16' or a9='16' or a10='16'";
$query16 = mysql_query($sql16);
$qq16 = mysql_num_rows($query16);

$sql17="select * from $tbname where a1='17' or a2='17' or a3='17' or a4='17' or a5='17' or a6='17' or a7='17' or a8='17' or a9='17' or a10='17'";
$query17 = mysql_query($sql17);
$qq17 = mysql_num_rows($query17);

$sql18="select * from $tbname where a1='18' or a2='18' or a3='18' or a4='18' or a5='18' or a6='18' or a7='18' or a8='18' or a9='18' or a10='18'";
$query18 = mysql_query($sql18);
$qq18 = mysql_num_rows($query18);

$sql19="select * from $tbname where a1='19' or a2='19' or a3='19' or a4='19' or a5='19' or a6='19' or a7='19' or a8='19' or a9='19' or a10='19'";
$query19 = mysql_query($sql19);
$qq19 = mysql_num_rows($query19);

$sql20="select * from $tbname where a1='20' or a2='20' or a3='20' or a4='20' or a5='20' or a6='20' or a7='20' or a8='20' or a9='20' or a10='20'";
$query20 = mysql_query($sql20);
$qq20 = mysql_num_rows($query20);

$sql21="select * from $tbname where a1='21' or a2='21' or a3='21' or a4='21' or a5='21' or a6='21' or a7='21' or a8='21' or a9='21' or a10='21'";
$query21 = mysql_query($sql21);
$qq21 = mysql_num_rows($query21);

$sql22="select * from $tbname where a1='22' or a2='22' or a3='22' or a4='22' or a5='22' or a6='22' or a7='22' or a8='22' or a9='22' or a10='22'";
$query22 = mysql_query($sql22);
$qq22 = mysql_num_rows($query22);

$sql23="select * from $tbname where a1='23' or a2='23' or a3='23' or a4='23' or a5='23' or a6='23' or a7='23' or a8='23' or a9='23' or a10='23'";
$query23 = mysql_query($sql23);
$qq23 = mysql_num_rows($query23);

$sql24="select * from $tbname where a1='24' or a2='24' or a3='24' or a4='24' or a5='24' or a6='24' or a7='24' or a8='24' or a9='24' or a10='24'";
$query24 = mysql_query($sql24);
$qq24 = mysql_num_rows($query24);

$sql25="select * from $tbname where a1='25' or a2='25' or a3='25' or a4='25' or a5='25' or a6='25' or a7='25' or a8='25' or a9='25' or a10='25'";
$query25 = mysql_query($sql25);
$qq25 = mysql_num_rows($query25);

$sql26="select * from $tbname where a1='26' or a2='26' or a3='26' or a4='26' or a5='26' or a6='26' or a7='26' or a8='26' or a9='26' or a10='26'";
$query26 = mysql_query($sql26);
$qq26 = mysql_num_rows($query26);

$sql27="select * from $tbname where a1='27' or a2='27' or a3='27' or a4='27' or a5='27' or a6='27' or a7='27' or a8='27' or a9='27' or a10='27'";
$query27 = mysql_query($sql27);
$qq27 = mysql_num_rows($query27);

$sql28="select * from $tbname where a1='28' or a2='28' or a3='28' or a4='28' or a5='28' or a6='28' or a7='28' or a8='28' or a9='28' or a10='28'";
$query28 = mysql_query($sql28);
$qq28 = mysql_num_rows($query28);

$sql29="select * from $tbname where a1='29' or a2='29' or a3='29' or a4='29' or a5='29' or a6='29' or a7='29' or a8='29' or a9='29' or a10='29'";
$query29 = mysql_query($sql29);
$qq29 = mysql_num_rows($query29);

$sql30="select * from $tbname where a1='30' or a2='30' or a3='30' or a4='30' or a5='30' or a6='30' or a7='30' or a8='30' or a9='30' or a10='30'";
$query30 = mysql_query($sql30);
$qq30 = mysql_num_rows($query30);

$sql31="select * from $tbname where a1='31' or a2='31' or a3='31' or a4='31' or a5='31' or a6='31' or a7='31' or a8='31' or a9='31' or a10='31'";
$query31 = mysql_query($sql31);
$qq31 = mysql_num_rows($query31);

$sql32="select * from $tbname where a1='32' or a2='32' or a3='32' or a4='32' or a5='32' or a6='32' or a7='32' or a8='32' or a9='32' or a10='32'";
$query32 = mysql_query($sql32);
$qq32 = mysql_num_rows($query32);

	
// echo $qq;
// var_dump($qq2);
// exit;
// $number1=$qq;
// $number2=$qq2;
// $number3=$qq3;
// $number4=$qq4;
// $number5=$qq5;
$a=array($qq1,$qq2,$qq3,$qq4,$qq5,$qq6,$qq7,$qq8,$qq9,$qq10,$qq11,$qq12,$qq13,$qq14,$qq15,$qq16,$qq17,$qq18,$qq19,$qq20,$qq21,$qq22,$qq23,$qq24,$qq25,$qq26,$qq27,$qq28,$qq29,$qq30,$qq31,$qq32);
$pos = array_search(max($a), $a);
$max = $a[$pos];
// echo $max;

// $qq1=779;
// $qq2=678;
// $qq3=674;
// $qq4=475;
// $qq5=886;
// $qq6=597;
// $qq7=547;
// $qq8=1203;
// $qq9=1184;
// $qq10=1176;
// $qq11=1192;
// $qq12=1184;
// $max=1500;
$qq1=$qq1+0;
$qq2=$qq2+0;
$qq3=$qq3+0;
$qq4=$qq4+0;
$qq5=$qq5+0;
$qq6=$qq6+0;
$qq7=$qq7+0;
$qq8=$qq8+0;

$n1=round($qq1/$max,1);
$n2=round($qq2/$max,1);
$n3=round($qq3/$max,1);
$n4=round($qq4/$max,1);
$n5=round($qq5/$max,1);
$n6=round($qq6/$max,1);
$n7=round($qq7/$max,1);
$n8=round($qq8/$max,1);
$n9=round($qq9/$max,1);
$n10=round($qq10/$max,1);
$n11=round($qq11/$max,1);
$n12=round($qq12/$max,1);
$n13=round($qq13/$max,1);
$n14=round($qq14/$max,1);
$n15=round($qq15/$max,1);
$n16=round($qq16/$max,1);
$n17=round($qq17/$max,1);
$n18=round($qq18/$max,1);
$n19=round($qq19/$max,1);
$n20=round($qq20/$max,1);
$n21=round($qq21/$max,1);
$n22=round($qq22/$max,1);
$n23=round($qq23/$max,1);
$n24=round($qq24/$max,1);
$n25=round($qq25/$max,1);
$n26=round($qq26/$max,1);
$n27=round($qq27/$max,1);
$n28=round($qq28/$max,1);
$n29=round($qq29/$max,1);
$n30=round($qq30/$max,1);
$n31=round($qq31/$max,1);
$n32=round($qq32/$max,1);

	
	
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>“2017年度十大新闻”评选活动</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./swiper.min.css">
        <script src="../jquery-1.8.2.min.js"></script>
        </head>
        <style type="text/css" media="screen">
        
		   *{
			 margin:0px;
			 padding:0px;
			 width: 94%;
		   }

       .swiper-container {
        width: 100%;
        height: auto;
        }
        .swiper-container .swiper-slide img{
            width: 100%;
        }
        #cj{
          width: 30%;
          height: 30px;
          text-align: center;
          line-height: 30px;
          background-color: #3367D6;
          margin-left: 32%;
          font-size: 0.8em;
          color: white;
        }
        .piao{
        	color: #3367D6;
        }

        .audio{
            width: 30px;
            height: 30px;
            background: url(../img/adbg.png);
            background-size: 100% 100%;

            position: fixed;
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
<script>
$(function(){
        //音乐
            $('.audio').click(function(){
                var play= document.getElementById('audio');
                if(play.paused == true){
                    play.play();
                    $(".audio>img").attr("src","../img/play.png").addClass('fz');
                }else{
                    play.pause();
                    $(".audio>img").attr("src","../img/pause.png").removeClass('fz');
                }
                    
            })


            

        })

function sy(){
            var play= document.getElementById('audio');     
            play.play();

        }
</script>
    
    <body onload="sy()">
		<div style="position:absolute;width:100%; height:100%;" >
			<div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="img/l1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="img/l2.jpg" alt=""></div>
            <div class="swiper-slide"><img src="img/l3.jpg" alt=""></div>
            <div class="swiper-slide"><img src="img/l4.jpg" alt=""></div>
            <div class="swiper-slide"><img src="img/l5.jpg" alt=""></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Pagination -->
        <!-- <div class="swiper-button-next"></div> -->
        <!-- <div class="swiper-button-prev"></div> -->
    </div>
			<div style="position:absolute; top:50%; left:6%;  color:#000;" >
		
				<h1 style="font-size:12px;margin-top:-5%;text-align:left;">1、3月，集团发布新一轮组织机构调整方案并进行重要管理岗位的内部竞聘，设立营销、项管、技术、运营、人力、财务、行政七大职能管控中心，打造房建总承包、基础设施、机电安装、建筑产业化、产业投资、国内和海外七大产业板块。</h1>
				<h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq1 ?>票</h1><br>
				<div class="progress-bar"></div><br><br>
				
				<h1 style="font-size:12px;margin-top:-5%;text-align:left;">2、3月下旬，中恒投资、海外事业部、PPP研究中心、集团旗下子公司中固建科、新天堂喜迎迁址，陆续进驻高融大厦办公。</h1>
				<h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq2 ?>票</h1><br>
				<div class="progress-bar-2"></div><br><br>
				
				<h1 style="font-size:12px;margin-top:-5%;text-align:left;">3、4月，中亿丰安装荣获“江苏省安装行业发展30年功勋企业奖”、“江苏省安装行业发展30年科技创新奖先进单位”，9月，中远机电成品支架产线正式上线，并于当月完成合格的C型钢生产，10月初生产出成品支架样品。目前，中远成套设备厂主要开发了成品支架和抗震支架产线。</h1>
				<h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq3 ?>票</h1><br>
				<div class="progress-bar-3"></div><br><br>
				
				<h1 style="font-size:12px;margin-top:-5%;text-align:left;">4、4月，集团人力资源委员会审议通过并发布《集团公司职等职级薪酬指导规范表（2017年）》，将原6等32级调整为9等38级；10月发布《公司干部管理办法》；12月人力资源管理中心发布《员工职业生涯管理办法》、《公司任职资格管理办法》、《公司任职资格等级认证管理办法》。</h1>
				<h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq4 ?>票</h1><br>
				<div class="progress-bar-4"></div><br><br>
				
				<h1 style="font-size:12px;margin-top:-5%;text-align:left;">5、集团信息化建设稳步推进并提升服务功能应用，5月集团召开信息化推进大会，重组信息化委员会，并审议信息化委员会章程、工作制度及协调机制等文件；7月，中亿丰全时综合检查系统上线，8月集团协同办公（OA）平台上线。</h1>
				<h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq5 ?>票</h1><br>
				<div class="progress-bar-5"></div><br><br>

				<h1 style="font-size:12px;margin-top:-5%;text-align:left;">6、5月11日，苏州中恒通路桥股份有限公司新三版挂牌，股票代码870355，中恒通以挂牌上市为新的起点，充分凭借资本市场的力量，提升品牌价值，以更加优质的产品和服务回馈社会。</h1>
				<h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq6 ?>票</h1><br>
				<div class="progress-bar-6"></div><br><br>

				<h1 style="font-size:12px;margin-top:-5%;text-align:left;">7、2017年集团与国内顶级高校智库北京大学国家发展研究院联合举办了中高管团队北大高级工商管理研修班，5月29日为期两年的中高层团队北大工商管理研修班正式开学。</h1>
				<h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq7 ?>票</h1><br>
				<div class="progress-bar-7"></div><br><br>

				<h1 style="font-size:12px;margin-top:-5%;text-align:left;">8、6月3日，首届中亿丰企业文化论坛暨苏州民营企业文化促进会“苏商文化沙龙”召开，9月，由苏州慈善总会冠名的中亿丰和合慈善基金会成立，接连承办全国企业文化研修班及ENR年度颁奖典礼，中亿丰企业文化、品牌建设持续加强，获全国企业文化建设示范单位称号</h1>
				<h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq8 ?>票</h1><br>
				<div class="progress-bar-8"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">9、6月10日，中亿丰建设集团与中国机械设备工程股份有限公司（CMEC）签署巴林东锡特拉住宅EPC项目战略合作协议，集团将以巴林东锡特拉住宅项目为契机，探索国际工程承包“F+EPC”模式，全力开拓中东市场。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq9 ?>票</h1><br>
        <div class="progress-bar-9"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">10、抢抓城市综合管廊发展机遇，集团先后承建澄阳路综合管廊、龙翔路综合管廊、城北路综合管廊支线管廊。龙翔路地下综合管廊首次采用顶管法施工，克服了诸多技术困难，成功完成近间距双排顶管的贯通任务。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq10 ?>票</h1><br>
        <div class="progress-bar-10"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">11、2017年7月19日至20日，省特检院专家对中远机电压力管道安装GC2、 GB2(2)两个工业管道资质和压力容器安装一级资质许可进行鉴定评审。此次特种设备三项专业资质的取得，标志着安装板块在做大建筑民用机电的基础上，加大转型力度，吹响进军工业安装领域的号角。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq11 ?>票</h1><br>
        <div class="progress-bar-11"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">12、集团大力推广装配式建筑，搭建装配式技术平台，成立装配式推进组，在昆山开放大学项目全面应用预制“新三板”，劳务分公司全面开展装配式建筑参观考察和学习培训，为提供劳务技术人才做储备</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq12 ?>票</h1><br>
        <div class="progress-bar-12"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">13、深入拓展海外区域市场，中亿丰越南公司挂牌成立一周年，在越南实施海阳电厂、芹苴电厂项目有序推进；古建分公司派遣木匠团队远赴加拿大组装仿唐式大殿工程。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq13 ?>票</h1><br>
        <div class="progress-bar-13"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">14、10月27日，美京假日广场成功举办招商峰会，并计划2018年底整体投入运营，该项目被视为集团从建筑施工到商业运维，跨界商业地产推动产业创新与消费升级的转型之作。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq14 ?>票</h1><br>
        <div class="progress-bar-14"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">15、7月24-25日，由江苏省住房和城乡建设厅主办、中亿丰建设集团协办的“2017年江苏省住房和城乡建设系统建筑施工塔式起重机司机职业技能竞赛”成功举办，我司代表苏州市的两名选手，分别荣获第一名和第三名的好成绩。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq15 ?>票</h1><br>
        <div class="progress-bar-15"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">16、今年，集团全面搭建技术交流平台，培育“四新”技术人才，8月-9月集团开展中亿丰总工程师讲堂暨施工学术论文交流主题系列活动，9月6日，中亿丰首个BIM工作站在龙翔路管廊项目部正式成立，为公司全面发展提供强有力的技术支撑和先导作用。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq16 ?>票</h1><br>
        <div class="progress-bar-16"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">17、“走出去”深化市场区域布局，2月广西分公司在南宁注册成立；6月西安分公司承接包头晶澳项目，并荣获“西安市先进建筑施工企业”，进一步打响西北市场品牌；郑州分公司项目遍及郑州、洛阳、新郑、平顶山、许昌五个地级市；徐州分公司承接宜家项目；淮安分公司将淮安市金融中心项目、新城市广场项目打造为标杆项目，赢取市场口碑，上海分公司承接博世首个装配式构件施工公建项目； 8月广东分公司在佛山注册成立。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq17 ?>票</h1><br>
        <div class="progress-bar-17"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">18、基础设施板块全面进行组织架构调整和拓展业务发展，下设3大分公司、2大子公司、5大事业部；环保事业部中标湖北省垃圾填埋场环境整治项目，水利水电分公司获得信用等级考评AAA；新天堂获姑苏杯优质工程奖；古建分公司承接“毋敛古城三大庙”项目；轨交事业部承接轨道交通3号线，奠定了基础设施板块全产业链的集成。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq18 ?>票</h1><br>
        <div class="progress-bar-18"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">19、中亿丰集团与福耀集团成功携手，9月22日，福耀玻璃苏州项目正式开工，该项目是福耀集团在华东投资建设规模最大、规格最高的运营和研发基地；12月12日苏州市市委书记周乃翔一行深入福耀玻璃苏州项目现场进行实地考察。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq19 ?>票</h1><br>
        <div class="progress-bar-19"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">20、今年是公司成立65年华诞暨中亿丰建设集团更名四周年，集团全面深化党建工作，深入部署和落实学习党的十九大精神，10月8日，集团召开中共中亿丰建设集团全体党员大会，会议选举产生新一届党委、纪委委员。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq20 ?>票</h1><br>
        <div class="progress-bar-20"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">21、10月13-14日，中国安装协会专家组对中亿丰安装板块申报的中国安装工程优质奖项目高铁新城圆融广场项目机电安装工程进行了复查。12月，国家安装工程优质奖已公示高铁新城圆融广场项目机电安装工程为获奖项目。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq21 ?>票</h1><br>
        <div class="progress-bar-21"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">22、积极探索“互联网+集采”，10月18日，集团集中采购管理平台和物资管理平台上线试运行，逐步实现在线询价、采购合同、在线评标、供应商管理等功能，提升企业供应链管理水平。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq22 ?>票</h1><br>
        <div class="progress-bar-22"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">23、11月2日，装饰分公司和中远机电共同承担的“成品住宅厨卫部品装配化的研究与应用”项目顺利通过验收。该项目研究历时2年半，形成一套较为完善的厨卫部品装配化综合技术。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq23 ?>票</h1><br>
        <div class="progress-bar-23"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">24、11月21日，住房城乡建设部发布《关于核准2017年度第十三批建设工程企业资质资格名单的公告》，中亿丰建设集团成功获批市政公用工程施工总承包特级资质，完成年度市政“一升特”目标。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq24 ?>票</h1><br>
        <div class="progress-bar-24"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">25、8月中亿丰二期会议中心正式启用，今年为满足集团发展办公环境和设施需求，对原中亿丰大厦大厅和办公环境进行改造升级，新的办公环境将于年底全面装修完成。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq25 ?>票</h1><br>
        <div class="progress-bar-25"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">26、12月8日，中亿丰建设集团股份有限公司与苏州建设交通高等职业技术学校校企合作签约，此次与苏州建设交通学校联合进行“订单式”人才培养，共享课题研究、技术资料、相关教材和培训资料成果，储备技术人才。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq26 ?>票</h1><br>
        <div class="progress-bar-26"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">27、强化企业风险内控，今年集团安全管理委员会制定集团公司不良行为问责和应急处置激励细则，以及项目部激励资金和不良行为风险保证金管理办法。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq27 ?>票</h1><br>
        <div class="progress-bar-27"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">28、今年集团品牌影响力持续扩大和提升，中亿丰连续十二年蝉联ENR中国承包商80强（53位）、位列中国民营企业500强（474位）、中国建筑业双200强（84位）。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq28 ?>票</h1><br>
        <div class="progress-bar-28"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">29、集团全面提升青年员工团队建设，今年集团新入职员工78人，集团先后组织开展青年风采大赛、“悦分享”职工朗读文化沙龙等文化活动，为青年员工提供展示自我的舞台。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq29 ?>票</h1><br>
        <div class="progress-bar-29"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">30、集团旗下子公司中正建设承建的微软办公楼工程荣获第一座国优奖，同时也是集团斩获的第7座国优奖，10月镇江高等专科学校（新校区）建设项目举行了竣工暨交接仪式；中正建设以工程创优和高品质的服务成功打响集团中正建设子品牌。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq30 ?>票</h1><br>
        <div class="progress-bar-30"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">31、今年集团全新打造BIM建设，集团成立工程研究中心BIM研究室，组织开展各类BIM应用培训在预制装配式中的应用和研究，11月，中亿丰荣获第八届创新杯优秀总承包应用BIM应用奖。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq31 ?>票</h1><br>
        <div class="progress-bar-31"></div><br><br>

        <h1 style="font-size:12px;margin-top:-5%;text-align:left;">32、打造精品工程质量品牌，创建精品之路持续提升，集团承建的苏州国际博览中心三期工程捧回第十座鲁班奖，同时集团荣获创建鲁班奖工程优秀企业、集团李国建荣获创鲁班奖工程荣誉项目经理；韩树山、邱全洪、李建华荣获创建鲁班奖工程先进个人。</h1>
        <h1 class="piao" style="font-size:12px;margin-top:-4%;text-align:right;"><?php echo $qq32 ?>票</h1><br>
        <div class="progress-bar-32"></div><br><br>



        <div id="cj" onclick="cj()">点击抽奖</div>
        <br>
        <div id="md" style="width:80%;margin-left:7%;height:330px;text-align:center;color:white;font-size:0.9em;line-height:40px;background:black;opacity:0.9;margin-top:-130%;display:none;">
          <h4>中奖名单</h4>
          <p>植物哥哥</p>
          <h4>领奖地点</h4>
          <p>中亿丰大厦616办公室</p>
          <h4>咨询电话</h4>
          <p>65798515</p> 
          <br>
          <div style="width:40%;height:30px;margin-left:30%;background:grey;line-height:30px;" onclick="xs()">关闭</div>
        </div>
				
			</div>
		</div>

        <div class="audio">
            <img  class='fz' src="../img/play.png" width='100%' alt="">
            <audio id='audio' src="../img/sr.mp3" loop autoplay="autoplay"></audio>
        </div>
        <script>
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
        <!-- Swiper JS -->
        <script src="./swiper.min.js"></script>
        <!-- Initialize Swiper -->
        <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            autoHeight: true, //enable auto height
            autoplay:2000,
            autoplayDisableOnInteraction : false
        });
        </script>

        <script src="jquery-1.11.3.min.js"></script>
        <script src="gradient-progress-bar.js"></script>

        <script type="text/javascript">
          function cj () {
            $("#md").css("display","block")
          }
          function xs () {
            $("#md").css("display","none")
          }

          $('.progress-bar').gradientProgressBar({
              value: <?php echo $n1 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

          $('.progress-bar-2').gradientProgressBar({
              value: <?php echo $n2 ?>,
              size: 280,
              fill: {
                  gradient: ["#A4BAE7", "#112F66"]
				 /*  color: '#EEC900' */
              }
          });

          $('.progress-bar-3').gradientProgressBar({
              value: <?php echo $n3 ?>,
              size: 280,
              fill: {
                  gradient: ["#A4BAE7", "#112F66"]
              }
          });
		  
		   $('.progress-bar-4').gradientProgressBar({
              value: <?php echo $n4 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

		   $('.progress-bar-5').gradientProgressBar({
              value: <?php echo $n5 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

		    $('.progress-bar-6').gradientProgressBar({
              value: <?php echo $n6 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

		    $('.progress-bar-7').gradientProgressBar({
              value: <?php echo $n7 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

		    $('.progress-bar-8').gradientProgressBar({
              value: <?php echo $n8 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

         $('.progress-bar-9').gradientProgressBar({
              value: <?php echo $n9 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

          $('.progress-bar-10').gradientProgressBar({
              value: <?php echo $n10 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

           $('.progress-bar-11').gradientProgressBar({
              value: <?php echo $n11 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

            $('.progress-bar-12').gradientProgressBar({
              value: <?php echo $n12 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

             $('.progress-bar-13').gradientProgressBar({
              value: <?php echo $n13 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

              $('.progress-bar-14').gradientProgressBar({
              value: <?php echo $n14 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

               $('.progress-bar-15').gradientProgressBar({
              value: <?php echo $n15 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

                $('.progress-bar-16').gradientProgressBar({
              value: <?php echo $n16 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

                 $('.progress-bar-17').gradientProgressBar({
              value: <?php echo $n17 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

                  $('.progress-bar-18').gradientProgressBar({
              value: <?php echo $n18 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

                   $('.progress-bar-19').gradientProgressBar({
              value: <?php echo $n19 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

                    $('.progress-bar-20').gradientProgressBar({
              value: <?php echo $n20 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

           $('.progress-bar-21').gradientProgressBar({
              value: <?php echo $n21 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

            $('.progress-bar-22').gradientProgressBar({
              value: <?php echo $n22 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

             $('.progress-bar-23').gradientProgressBar({
              value: <?php echo $n23 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

              $('.progress-bar-24').gradientProgressBar({
              value: <?php echo $n24 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

               $('.progress-bar-25').gradientProgressBar({
              value: <?php echo $n25 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

                $('.progress-bar-26').gradientProgressBar({
              value: <?php echo $n26 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

                 $('.progress-bar-27').gradientProgressBar({
              value: <?php echo $n27 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

                  $('.progress-bar-28').gradientProgressBar({
              value: <?php echo $n28 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

                   $('.progress-bar-29').gradientProgressBar({
              value: <?php echo $n29 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

                    $('.progress-bar-30').gradientProgressBar({
              value: <?php echo $n30 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

                     $('.progress-bar-31').gradientProgressBar({
              value: <?php echo $n31 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

                      $('.progress-bar-32').gradientProgressBar({
              value: <?php echo $n32 ?>,
              size: 280,
              fill: {
                   gradient: ["#A4BAE7", "#112F66"]
              }
          });

		    
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
       title: '“2017年度十大新闻”评选活动',
          desc: '感谢您参加！',
          link: 'http://xytang88.com/yin/za/wenjuantj3/getcodeurl.php',
          imgUrl: 'http://xytang88.com/yin/za/wenjuantj3/share.jpg'}
          wx.onMenuShareTimeline(shareinfo);
     wx.onMenuShareAppMessage(shareinfo);
      });
    </script>