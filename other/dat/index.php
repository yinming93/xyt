<?php
   require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="stylesheet" href="./css/index.css">
    <title>做完10道题，85%的人知道自己当不了老板</title>
    <!-- Bootstrap -->
    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  <form action="add.php">
  <!-- 答对题最终画面 -->
  <div>
    <img id="last" src="img/comeon.jpg" class="bg" onclick="again()">
    <div style="position:absolute;left:10%;top:52%;width:80%;height:200px;text-align:center;line-height:200px;color:#D0B824;font-size:24px;font-weight:bold;">
      <span id="last2">很遗憾你只答对了</span><span id="code"></span>题
    </div>
    <div style="width:80%;height:100px;position:absolute;left:10%;top:71%;text-align:center;color:white;font-size:18px;font-weight:bold;">你有<span id="code1"></span>0%好老板成分，分享给好友，看看朋友里有多少人是块当老板的料吧！</div>
    <a href="http://mp.weixin.qq.com/s/yZGQZMpwjCEqr0lfkZly4A"><div style="width:43%;height:80px;background:;position:absolute;bottom:0%"></div></a>
  </div>
  <!-- 第10题 -->
  <div id="ten">
    <img src="img/bg10.jpg" class="bg" onclick="qr10()">
    <div class="bbtn">
      <div class="btna" id="btna10">
        <span>A</span>
        <span style="margin-top:6px;">授意HR给员工邮箱里发鸡汤类文章，激励员工不畏困难，向着目标奋进的岁月才是青春！</span>
      </div>
      <div class="btnb" id="btnb10">
        <span>B</span>
        <span style="margin-top:6px;">正式发出公告，可为拜访客户的员工报销一定次数的打车费，降低时间成本，但不能次次打车</span>
      </div>
      <div class="btnc" id="btnc10">
        <span>C</span>
        <span style="margin-top:6px;">干脆公司搬去龙湖一展空间，打飞机扒火车搭地铁乘公交开汽车踩单车样样方便到广告法不让说</span>
      </div>
      <label class="A" onclick="a10()"><input type="radio" name="answer10" value="A" />A</label>
      <label class="B" onclick="b10()"><input type="radio" name="answer10" value="B" />B</label>
      <label class="C" onclick="c10()"><input type="radio" name="answer10" value="C" />C</label>
    </div>
  </div>
  <!-- 第9题 -->
  <div id="nine">
    <img src="img/bg9.jpg" class="bg" onclick="qr9()">
    <div class="bbtn">
      <div class="btna" id="btna9">
        <span>A</span>
        <span>每人发个午睡抱枕，鼓励大家补充睡眠</span>
      </div>
      <div class="btnb" id="btnb9">
        <span>B</span>
        <span>在办公室购买一套咖啡机，咖啡豆不间断供应，只选星爸爸的</span>
      </div>
      <div class="btnc" id="btnc9">
        <span>C</span>
        <span>拍他起来，居高临下地用鼻孔恐吓他，在全公司范围内杀鸡儆猴</span>
      </div>
      <label class="A" onclick="a9()"><input type="radio" name="answer9" value="A" />A</label>
      <label class="B" onclick="b9()"><input type="radio" name="answer9" value="B" />B</label>
      <label class="C" onclick="c9()"><input type="radio" name="answer9" value="C" />C</label>
    </div>
  </div>
  <!-- 第8题 -->
  <div id="eight">
    <img src="img/bg8.jpg" class="bg" onclick="qr8()">
    <div class="bbtn">
      <div class="btna" id="btna8">
        <span>A</span>
        <span style="margin-top:6px;">组织游泳羽毛球等健康的一系列团建活动，告诉大家玩手机对颈椎不好会影响工作效率</span>
      </div>
      <div class="btnb" id="btnb8">
        <span>B</span>
        <span style="margin-top:6px;">检讨工作量是否不够饱，工作分配是否不合理，员工压力是否过大需要手游解压</span>
      </div>
      <div class="btnc" id="btnc8">
        <span>C</span>
        <span>告诉员工你也想玩，但现在是工作时间，要遵守办公室规则</span>
      </div>
      <label class="A" onclick="a8()"><input type="radio" name="answer8" value="A" />A</label>
      <label class="B" onclick="b8()"><input type="radio" name="answer8" value="B" />B</label>
      <label class="C" onclick="c8()"><input type="radio" name="answer8" value="C" />C</label>
    </div>
  </div>
  <!-- 第7题 -->
  <div id="seven">
    <img src="img/bg7.jpg" class="bg" onclick="qr7()">
    <div class="bbtn">
      <div class="btna" id="btna7">
        <span>A</span>
        <span style="margin-top:6px;">先点赞，然后连续半个月晒自己的加班餐、加班心情、加班后的停车场等一系列的照片</span>
      </div>
      <div class="btnb" id="btnb7">
        <span>B</span>
        <span>和员工一起加班，侧面了解现有工作量是否非要加班才能完成</span>
      </div>
      <div class="btnc" id="btnc7">
        <span>C</span>
        <span style="margin-top:6px;">把员工加班的照发朋友圈，讴歌团队的积极奋进。从成本考虑暂不提加班费，但是给与精神鼓舞</span>
      </div>
      <label class="A" onclick="a7()"><input type="radio" name="answer7" value="A" />A</label>
      <label class="B" onclick="b7()"><input type="radio" name="answer7" value="B" />B</label>
      <label class="C" onclick="c7()"><input type="radio" name="answer7" value="C" />C</label>
    </div>
  </div>
  <!-- 第6题 -->
  <div id="six">
    <img src="img/bg6.jpg" class="bg" onclick="qr6()">
    <div class="bbtn">
      <div class="btna" id="btna6">
        <span>A</span>
        <span>被大家不记名投票推举的那个</span>
      </div>
      <div class="btnb" id="btnb6">
        <span>B</span>
        <span>当众举手或跑到你办公室自荐的那个</span>
      </div>
      <div class="btnc" id="btnc6">
        <span>C</span>
        <span>LEADER能吃吗？在我这只有分工没有领导</span>
      </div>
      <label class="A" onclick="a6()"><input type="radio" name="answer6" value="A" />A</label>
      <label class="B" onclick="b6()"><input type="radio" name="answer6" value="B" />B</label>
      <label class="C" onclick="c6()"><input type="radio" name="answer6" value="C" />C</label>
    </div>
  </div>
  <!-- 第5题 -->
  <div id="five">
    <img src="img/bg5.jpg" class="bg" onclick="qr5()">
    <div class="bbtn">
      <div class="btna" id="btna5">
        <span>A</span>
        <span>正式面谈，聊天打探，员工要啥我给啥，员工意愿比天大</span>
      </div>
      <div class="btnb" id="btnb5">
        <span>B</span>
        <span>比较同行，持平就好，运营成本太可怕</span>
      </div>
      <div class="btnc" id="btnc5">
        <span>C</span>
        <span>比市场水平高一点点就好，但是完成目标业绩就大幅提高</span>
      </div>
      <label class="A" onclick="a5()"><input type="radio" name="answer5" value="A" />A</label>
      <label class="B" onclick="b5()"><input type="radio" name="answer5" value="B" />B</label>
      <label class="C" onclick="c5()"><input type="radio" name="answer5" value="C" />C</label>
    </div>
  </div>
  <!-- 第4题 -->
  <div id="four">
    <img src="img/bg4.jpg" class="bg" onclick="qr4()">
    <div class="bbtn">
      <div class="btna" id="btna4">
        <span>A</span>
        <span>第一个冲出去，有啥事冲我来别动我员工</span>
      </div>
      <div class="btnb" id="btnb4">
        <span>B</span>
        <span>找个最有亲和力的妹子软言软语把客户劝到自己办公室谈判</span>
      </div>
      <div class="btnc" id="btnc4">
        <span>C</span>
        <span>找个肌肉膨胀度最高的汉子把客户带离办公区再说</span>
      </div>
      <label class="A" onclick="a4()"><input type="radio" name="answer4" value="A" />A</label>
      <label class="B" onclick="b4()"><input type="radio" name="answer4" value="B" />B</label>
      <label class="C" onclick="c4()"><input type="radio" name="answer4" value="C" />C</label>
    </div>
  </div>
  <!-- 第3题 -->
  <div id="three">
    <img src="img/bg3.jpg" class="bg" onclick="qr3()">
    <div class="bbtn">
      <div class="btna" id="btna3">
        <span>A</span>
        <span style='margin-top:6px;'>开展“认识世界一线奢侈品牌”、“香水挨个闻”、“绅士名媛养成”一系列的培训活动</span>
      </div>
      <div class="btnb" id="btnb3">
        <span>B</span>
        <span>西装领带制服高跟鞋给老子穿起来，这是规定</span>
      </div>
      <div class="btnc" id="btnc3">
        <span>C</span>
        <span>要不要和老板一起逛个街啊？实报实销</span>
      </div>
      <label class="A" onclick="a3()"><input type="radio" name="answer3" value="A" />A</label>
      <label class="B" onclick="b3()"><input type="radio" name="answer3" value="B" />B</label>
      <label class="C" onclick="c3()"><input type="radio" name="answer3" value="C" />C</label>
    </div>
  </div>
  <!-- 第2题 -->
  <div id="two">
    <img src="img/bg2.jpg" class="bg" onclick="qr2()">
    <div class="bbtn">
      <div class="btna" id="btna2">
        <span>A</span>
        <span>假装路过，用老板的威严制止争吵，午餐时也不能如此家长里短</span>
      </div>
      <div class="btnb" id="btnb2">
        <span>B</span>
        <span>安排其他同事拉架， 授意HR记录员工兴趣，工作中按兴趣分工</span>
      </div>
      <div class="btnc" id="btnc2">
        <span>C</span>
        <span>挥泪跟黄牛买相声和话剧门票各2张作为当月业绩前两名的奖励</span>
      </div>
      <label class="A" onclick="a2()"><input type="radio" name="answer2" value="A" />A</label>
      <label class="B" onclick="b2()"><input type="radio" name="answer2" value="B" />B</label>
      <label class="C" onclick="c2()"><input type="radio" name="answer2" value="C" />C</label>
    </div>
  </div>
  	<!-- 第1题 -->
  <div id="one">
    <img src="img/bg.jpg" class="bg" onclick="qr()">
    <div class="bbtn">
      <div class="btna" id="btna">
        <span>A</span>
        <span>当老板傻吗！大发雷霆，当场扣钱，做好规矩，以儆效尤</span>
      </div>
      <div class="btnb" id="btnb">
        <span>B</span>
        <span>交由其主管领导面谈，劝导其面对现实人生</span>
      </div>
      <div class="btnc" id="btnc">
        <span>C</span>
        <span style="margin-top:6px;">调入创意部，三天内拿出牛B推广方案并坦诚真实迟到原因，可换取30次/月迟到权</span>
      </div>
      <label class="A" onclick="a()"><input type="radio" name="answer" value="A" />A</label>
      <label class="B" onclick="b()"><input type="radio" name="answer" value="B" />B</label>
      <label class="C" onclick="c()"><input type="radio" name="answer" value="C" />C</label>
    </div>
  </div> 
	<!-- 开场图2 -->
  <div id="z2">
    <img src="img/02.jpg" alt="" class="bg">
    <img src="img/btn_cs.png" alt="" style="position:absolute;width:45%;right:9%;top:88%;" onclick="x2()">
  </div>
  <!-- 开场图1 -->
  <div id="z1">
    <img src="img/01.jpg" alt="" class="bg">
    <img src="img/btn_cj.png" alt="" style="position:absolute;width:60%;right:0%;top:80%;" onclick="x1()">
  </div>
  <!-- 失败图2 -->
  <div id="w2" style="display:none;">
    <img src="img/w2.jpg" alt="" class="bg" onclick="again()">
  </div>
  <!-- 失败图1 -->
  <div id="w1" style="display:none;">
    <img src="img/w1.jpg" alt="" class="bg" onclick="again()">
  </div>
	</form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./lib/jquery/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./lib/bootstrap/js/bootstrap.js"></script>
    <script src="js/dialog.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>
<script>
        $(".btn-primary").on("click",function(){
          $.ajax({
          url:'add.php',
          data:$('form').serialize(),
          type:'POST',
          success:function(m){
// alert(m);
            if(m=='chong'){
              Alert('请勿重复提交!');
            }
            if(m=='ok'){
              Alert('提交成功!');
              $("input[name='name']").val('');
              $("input[name='tel']").val('');
              $("input[name='num']").val('');
            }  
            if(m=='m'){
              Alert('报名人数已满!');
              $("input[name='name']").val('');
              $("input[name='tel']").val('');
              $("input[name='num']").val('');
            }
            var deferred = $.Deferred();         
            if(m=='tel'){
              Alert('手机号错误!');
              $("input[name='tel']").val('');
            }           
            if(m=='wan'){
              Alert('请完善个人信息!');
            }
            if(m=='sb'){
              alert("插入数据库失败！");
            }
          }
          });
        });
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
   title: '做完10道题，85%的人知道自己当不了老板',
      desc: '公司都这样了，老板能管管吗',
      link: 'http://xyt.xy-tang.com/yin/bm/dat/',
      imgUrl: 'http://xyt.xy-tang.com/yin/bm/dat/share.jpg'}
      wx.onMenuShareTimeline(shareinfo);
 wx.onMenuShareAppMessage(shareinfo);
  });
 //debug
        // wx.error(function(res){
        //   alert(res.errMsg);
        // });
</script>

<!--百度统计代码-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?dc65728722ac638c0ef4950fa6d589e4";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
