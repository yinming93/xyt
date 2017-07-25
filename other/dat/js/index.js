function x1() {
  document.getElementById('z1').style.display='none';
}
function x2() {
  document.getElementById('z2').style.display='none';
}
  var code = 0;
  function a(){
    document.getElementById('btna').style.background='#FCDD1E';
    document.getElementById('btnb').style.background='white';
    document.getElementById('btnc').style.background='white';
  }
  function b(){
    document.getElementById('btna').style.background='white';
    document.getElementById('btnb').style.background='#FCDD1E';
    document.getElementById('btnc').style.background='white';
  }
  function c(){
    document.getElementById('btna').style.background='white';
    document.getElementById('btnb').style.background='white';
    document.getElementById('btnc').style.background='#FCDD1E';
  }
  function qr(){
    var list= $('input:radio[name="answer"]:checked').val();
    if(list==null){
        Alert("你还没有作答此题!");
        return false;
    }
    else{
        document.getElementById('one').style.display='none';
        if(list=='C'){
          code=code+1;
        }
    }           
  }
  function a2(){
    document.getElementById('btna2').style.background='#FCDD1E';
    document.getElementById('btnb2').style.background='white';
    document.getElementById('btnc2').style.background='white';
  }
  function b2(){
    document.getElementById('btna2').style.background='white';
    document.getElementById('btnb2').style.background='#FCDD1E';
    document.getElementById('btnc2').style.background='white';
  }
  function c2(){
    document.getElementById('btna2').style.background='white';
    document.getElementById('btnb2').style.background='white';
    document.getElementById('btnc2').style.background='#FCDD1E';
  }
  function qr2(){
    var list= $('input:radio[name="answer2"]:checked').val();
    if(list==null){
        Alert("你还没有作答此题!");
        return false;
    }
    else{
        document.getElementById('two').style.display='none';
        if(list=='B'||list=='C'){
          code=code+1;
        }
    }           
  }
   function a3(){
    document.getElementById('btna3').style.background='#FCDD1E';
    document.getElementById('btnb3').style.background='white';
    document.getElementById('btnc3').style.background='white';
  }
  function b3(){
    document.getElementById('btna3').style.background='white';
    document.getElementById('btnb3').style.background='#FCDD1E';
    document.getElementById('btnc3').style.background='white';
  }
  function c3(){
    document.getElementById('btna3').style.background='white';
    document.getElementById('btnb3').style.background='white';
    document.getElementById('btnc3').style.background='#FCDD1E';
  }
  function qr3(){
    var list= $('input:radio[name="answer3"]:checked').val();
    if(list==null){
        Alert("你还没有作答此题!");
        return false;
    }
    else{
        document.getElementById('three').style.display='none';
        if(list=='A'){
          code=code+1;
        }
    }           
  }
   function a4(){
    document.getElementById('btna4').style.background='#FCDD1E';
    document.getElementById('btnb4').style.background='white';
    document.getElementById('btnc4').style.background='white';
  }
  function b4(){
    document.getElementById('btna4').style.background='white';
    document.getElementById('btnb4').style.background='#FCDD1E';
    document.getElementById('btnc4').style.background='white';
  }
  function c4(){
    document.getElementById('btna4').style.background='white';
    document.getElementById('btnb4').style.background='white';
    document.getElementById('btnc4').style.background='#FCDD1E';
  }
  function qr4(){
    var list= $('input:radio[name="answer4"]:checked').val();
    if(list==null){
        Alert("你还没有作答此题!");
        return false;
    }
    else{
        document.getElementById('four').style.display='none';
        if(list=='A'){
          code=code+1;
        }
    }           
  }
   function a5(){
    document.getElementById('btna5').style.background='#FCDD1E';
    document.getElementById('btnb5').style.background='white';
    document.getElementById('btnc5').style.background='white';
  }
  function b5(){
    document.getElementById('btna5').style.background='white';
    document.getElementById('btnb5').style.background='#FCDD1E';
    document.getElementById('btnc5').style.background='white';
  }
  function c5(){
    document.getElementById('btna5').style.background='white';
    document.getElementById('btnb5').style.background='white';
    document.getElementById('btnc5').style.background='#FCDD1E';
  }
  function qr5(){
    var list= $('input:radio[name="answer5"]:checked').val();
    if(list==null){
        Alert("你还没有作答此题!");
        return false;
    }else if(list=='A'){
        document.getElementById('w1').style.display='block';
    }else{
        document.getElementById('five').style.display='none';
        if(list=='C'){
          code=code+1;
        }
       
    }           
  }
  function a6(){
    document.getElementById('btna6').style.background='#FCDD1E';
    document.getElementById('btnb6').style.background='white';
    document.getElementById('btnc6').style.background='white';
  }
  function b6(){
    document.getElementById('btna6').style.background='white';
    document.getElementById('btnb6').style.background='#FCDD1E';
    document.getElementById('btnc6').style.background='white';
  }
  function c6(){
    document.getElementById('btna6').style.background='white';
    document.getElementById('btnb6').style.background='white';
    document.getElementById('btnc6').style.background='#FCDD1E';
  }
  function qr6(){
    var list= $('input:radio[name="answer6"]:checked').val();
    if(list==null){
        Alert("你还没有作答此题!");
        return false;
    }
    else{
        document.getElementById('six').style.display='none';
        if(list=='C'){
          code=code+1;
        }
    }           
  }
  function a7(){
    document.getElementById('btna7').style.background='#FCDD1E';
    document.getElementById('btnb7').style.background='white';
    document.getElementById('btnc7').style.background='white';
  }
  function b7(){
    document.getElementById('btna7').style.background='white';
    document.getElementById('btnb7').style.background='#FCDD1E';
    document.getElementById('btnc7').style.background='white';
  }
  function c7(){
    document.getElementById('btna7').style.background='white';
    document.getElementById('btnb7').style.background='white';
    document.getElementById('btnc7').style.background='#FCDD1E';
  }
  function qr7(){
    var list= $('input:radio[name="answer7"]:checked').val();
    if(list==null){
        Alert("你还没有作答此题!");
        return false;
    }else if(list=='C'){
        document.getElementById('w2').style.display='block';
    }else{
        document.getElementById('seven').style.display='none';
        if(list=='B'){
          code=code+1;
        }
    }           
  }
  function a8(){
    document.getElementById('btna8').style.background='#FCDD1E';
    document.getElementById('btnb8').style.background='white';
    document.getElementById('btnc8').style.background='white';
  }
  function b8(){
    document.getElementById('btna8').style.background='white';
    document.getElementById('btnb8').style.background='#FCDD1E';
    document.getElementById('btnc8').style.background='white';
  }
  function c8(){
    document.getElementById('btna8').style.background='white';
    document.getElementById('btnb8').style.background='white';
    document.getElementById('btnc8').style.background='#FCDD1E';
  }
  function qr8(){
    var list= $('input:radio[name="answer8"]:checked').val();
    if(list==null){
        Alert("你还没有作答此题!");
        return false;
    }
    else{
        document.getElementById('eight').style.display='none';
        if(list=='B'){
          code=code+1;
        }
    }           
  }
  function a9(){
    document.getElementById('btna9').style.background='#FCDD1E';
    document.getElementById('btnb9').style.background='white';
    document.getElementById('btnc9').style.background='white';
  }
  function b9(){
    document.getElementById('btna9').style.background='white';
    document.getElementById('btnb9').style.background='#FCDD1E';
    document.getElementById('btnc9').style.background='white';
  }
  function c9(){
    document.getElementById('btna9').style.background='white';
    document.getElementById('btnb9').style.background='white';
    document.getElementById('btnc9').style.background='#FCDD1E';
  }
  function qr9(){
    var list= $('input:radio[name="answer9"]:checked').val();
    if(list==null){
        Alert("你还没有作答此题!");
        return false;
    }
    else{
        document.getElementById('nine').style.display='none';
        if(list=='A'){
          code=code+1;
        }
    }           
  }
  function a10(){
    document.getElementById('btna10').style.background='#FCDD1E';
    document.getElementById('btnb10').style.background='white';
    document.getElementById('btnc10').style.background='white';
  }
  function b10(){
    document.getElementById('btna10').style.background='white';
    document.getElementById('btnb10').style.background='#FCDD1E';
    document.getElementById('btnc10').style.background='white';
  }
  function c10(){
    document.getElementById('btna10').style.background='white';
    document.getElementById('btnb10').style.background='white';
    document.getElementById('btnc10').style.background='#FCDD1E';
  }
  function qr10(){
    var list= $('input:radio[name="answer10"]:checked').val();
    if(list==null){
        Alert("你还没有作答此题!");
        return false;
    }
    else{
      document.getElementById('ten').style.display='none';
      if(list=='C'){
      code=code+1;
      }
      if(code>5){
        var element = document.getElementById('last');
        element.src = "img/congratulations.jpg";
        document.getElementById('last2').innerHTML='恭喜你一共答对了';
      }  
      document.getElementById('code').innerHTML=code;
      document.getElementById('code1').innerHTML=code;
      rd=Math.round(Math.random()*9);
      rd2=Math.round(Math.random()*9);
    } 
    if(code>=10){
      rd=0;
      rd2=0;
    }
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
   title: '我打败了全国'+code+rd+'.'+rd2+'%的老板，你也快来测测吧！',
      desc: '公司都这样了，老板能管管吗',
      link: 'http://xyt.xy-tang.com/yin/bm/dat/',
      imgUrl: 'http://xyt.xy-tang.com/yin/bm/dat/share.jpg'}
      wx.onMenuShareTimeline(shareinfo);
 wx.onMenuShareAppMessage(shareinfo);
  });          
  }

function again(){
  window.location.href='http://xyt.xy-tang.com/yin/bm/dat/';
}