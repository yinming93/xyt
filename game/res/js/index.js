var idx = 0;
function run(){
    var timeText = '';
    if (that == 0) 
    {
        timeText = 'timer0';
    }
    else if (that == 1) 
    {
        timeText = 'timer1';
    }
    else if (that == 2) 
    {
        timeText = 'timer2';
    }
    else if (that == 3) 
    {
        timeText = 'timer3';
    }
    var s = document.getElementById(timeText);
    if(s.innerHTML == 99999){
        //clearInterval(idx);
    //window.location.href='regform.shtml';
    showTan('tanBg');
    return false;
    }
    s.innerHTML = s.innerHTML * 1 + 1;
    console.log(s.innerHTML);
}
//window.setInterval("run('timer');", 1000);

    $('#start_btn').click(function(){
        $('#increase').css('display','block');
        $('#bg1').css('display','none');
        //$('#ready').css('display','block');
    });
    // $('#bg6_btn').click(function(){
    //     $('#bg7').css('display','block');
    //     $('#bg6').css('display','none');
    // });

    $('#bg6_btn').click(function(){
        activityLogin.couponLogin({
            login_form : '.input-form',
            login_buttion : '.login-button',
            login_show : function() {
                showTan('login')
            },
            activity_id: constant.acitvityId,
            succses_code: {
                200: function (msg) {
                    $('#bg7').css('display','block')
                    $('#bg6').css('display','none')
                    if (msg.title.indexOf('5')) {
                        $('.bg7_con p span').html('5')
                    } else {
                        $('.bg7_con p span').html('20')
                    }
                    hideTan('login')
                }, 
                205: function () {
                    hideTan('login')
                    showTan('tanBg1')
                }
            }
        })
    })
    
    $('#tanBg1 a.btn_gb').click(function (e) {
        $('#bg7').css('display','block')
        $('#bg6').css('display','none')
        $('.bg7_con').html('').addClass('has-coupon')
        hideTan('tanBg1')
    })

    $('.bg7_div .btn_1').click(function (e) {
        envConstant.synthesislink('dianping://cinemalist?movieid=37930', 'http://evt.dianping.com/synthesislink/7637.html')
    })
    
    $('.ready_p2').get(0).addEventListener('webkitAnimationEnd', function(){

        hideTan('ready'); //准备的弹窗
        $('.puzzle1_img').css('display','none');  //原图

        idx = window.setInterval(run, 1000);    //开始倒计时
    });
/* 插入音乐 */
   /*  function music(mic,lop){
        var url =  mic;
        var audio = document.createElement("audio");
        audio.preload="auto";
        audio.loop = lop;
        var source = document.createElement("source");
        audio.id = "audio";
        source.type = "audio/mpeg";
        source.src = url;
    // 音乐循环
    //    audio.addEventListener("ended", function() {
    //        audio.play();
    //    }, false);
        audio.appendChild(source);
    //audio.play();
        return audio;
} */
/* var bgMusic= music("../res/music.mp3","loop");
bgMusic.play();
var audioBtn = document.getElementById('audio');
var audioKey = false;
audioBtn.onclick = function(){
    if(audioKey){
        audioKey=false;
        audioBtn.className = 'sp';   
        bgMusic.play();
    }else{
        audioKey=true;
        audioBtn.className='sp play'
         bgMusic.pause();
    }
}; */
//弹窗函数
function showTan(id)
{
    document.getElementById(id).style.display = "block";
}
//关闭函数
function hideTan(id)
{
    document.getElementById(id).style.display = "none";
}
// showTan('login');

function puzzle(id1,id2,picture,position,id3,id4){
    var aLi = document.getElementById(id1).getElementsByTagName('li');
    var oDrag = document.getElementById(id2);
    var aColorArr = picture;
    var aNum =[0,1,2,3,4,5,6,7,8];
    var pNum = position;      //图片开始的位置
    var tNum = [];
    var cNum = [];
    var tag = false;
    var count = 0;
    var reArr = [];
   var posArr = [];
//   var reNum = 0;
    var moveX,moveY,that,thatNum,num,pX= 0,pY=0;
    var iNum =[];//移动的位置
    console.log(pNum);
    for(var i=0; i<aLi.length; i++){
        aLi[i].index = i;
        aLi[aNum[i]].style.background = 'url('+aColorArr[pNum[i]]+')';
        aLi[aNum[i]].style.backgroundSize = '96px 116px';
        aLi[i].addEventListener('touchstart',function(ev){

            that =  this.index;
            posArr.push(this.getAttribute('position').split(" "));
            oDrag.style.display = 'block';
            oDrag.style.left = posArr[0][0]+'px';
            oDrag.style.top = posArr[0][1]+'px';
            oDrag.style.background = 'url('+aColorArr[pNum[this.index]]+')';
            oDrag.style.backgroundSize = '96px 116px';

        });
        aLi[i].addEventListener('touchmove',function(ev){
            ev.preventDefault();
            pX = ev.touches[0].pageX;
            pY = ev.touches[0].pageY;
            moveX = ev.touches[0].pageX-60;
            moveY = ev.touches[0].pageY-116;

            console.log(moveX+"|"+moveY);
            oDrag.style.left =moveX +'px';
            oDrag.style.top =moveY +'px';

        });
        aLi[i].addEventListener('touchend',function(ev){
            console.log(pX)
//            console.log(ev.pageX+'|'+ev.pageY);
            if(pX==0){
                pX=0;
                oDrag.style.display = 'none';
                posArr=[];
                return false
            }
            thatNum = pNum[that];
            // console.log(thatNum)
//                (ev.touches[0].pageX-48)/96
//                (ev.touches[0].pageY-58)/116

            iNum.push(Math.round(Math.abs(moveY/116)));
            iNum.push(Math.round(moveX/116));
            num = iNum[0]*2+iNum[1]+iNum[0]
            console.log('移到'+num);
            if(moveX>=290||moveX<=-90||moveY>=350||moveY<=-90||num>=9||num<0){
                oDrag.style.display = 'none';
                iNum=[];
                posArr = [];
                num = null;
                thatNum = null;
                return false;
            }

            // console.log(iNum);
            aLi[that].style.background = 'url('+aColorArr[pNum[num]]+')';//当前
            aLi[num].style.background = 'url('+aColorArr[thatNum]+')';//被移到
            aLi[that].style.backgroundSize = '96px 116px';
            aLi[num].style.backgroundSize = '96px 116px';
            oDrag.style.display = 'none';
            pNum[that] = pNum[num];
            pNum[num] = thatNum;
            console.log(pNum);
            iNum=[];
            posArr = [];
            num = null;
            thatNum = null;
            pX=0
//            moveX=null;
//            moveY=null;
            for (var k = 0; k < pNum.length; k++){
                if (pNum[k] != aNum[k]){
                    count=0;
                    break;
                }else{
                    count++;
                    console.log(count);
                    if (count == aNum.length - 1) {
                        tag = true;
                    }
                }
            }
            if(tag){
                tag=false;
                //alert('两边相等')
                //$(id3).css('display','none');
                //$(id4).css('display','block');
                window.clearInterval( idx );
                setTimeout(function(){
                $('.puzzle1_img').css('display','block');
                $('.complete').css('display','block');
				
				
                },1000);
                setTimeout(function (){
                   // page++;
                    //alert(page);
                    document.getElementById(id3).style.display = "none";
                    document.getElementById(id4).style.display = "block";
                    //$(id5).css('display','block');
                   // $('.complete').css('display','none');
                    //showTan('ready');
                    // idx = window.setInterval("run('timer1');", 1000);    //添加倒计时
                }, 2500);
                // window.setInterval("run('timer1');", 1000);
            }
        })
    }
};
puzzle(
        'Cont',
        'Drag',
        [
        '../res/puzzle1_img0.png',
        '../res/puzzle1_img1.png',
        '../res/puzzle1_img2.png',
        '../res/puzzle1_img3.png',
        '../res/puzzle1_img4.png',
        '../res/puzzle1_img5.png',
        '../res/puzzle1_img6.png',
        '../res/puzzle1_img7.png',
        '../res/puzzle1_img8.png'
        ],
        [7,3,5,8,6,2,1,4,0],     //每个图片开始的位置
        'bg2',
        'bg6'
    );
puzzle(
        'Cont1',
        'Drag1',
        [
        '../res/puzzle2_img0.png',
        '../res/puzzle2_img1.png',
        '../res/puzzle2_img2.png',
        '../res/puzzle2_img3.png',
        '../res/puzzle2_img4.png',
        '../res/puzzle2_img5.png',
        '../res/puzzle2_img6.png',
        '../res/puzzle2_img7.png',
        '../res/puzzle2_img8.png'
        ],
        [7,6,2,8,3,5,1,4,0],     //每个图片开始的位置
        'bg3',
        'bg6'
    );
puzzle(
        'Cont2',
        'Drag2',
        [
        '../res/puzzle3_img0.png',
        '../res/puzzle3_img1.png',
        '../res/puzzle3_img2.png',
        '../res/puzzle3_img3.png',
        '../res/puzzle3_img4.png',
        '../res/puzzle3_img5.png',
        '../res/puzzle3_img6.png',
        '../res/puzzle3_img7.png',
        '../res/puzzle3_img8.png'
        ],
        [7,2,6,8,3,5,1,4,0],      //每个图片开始的位置
        'bg4',
        'bg6'
    );
puzzle(
        'Cont3',
        'Drag3',
        [
        '../res/puzzle4_img0.png',
        '../res/puzzle4_img1.png',
        '../res/puzzle4_img2.png',
        '../res/puzzle4_img3.png',
        '../res/puzzle4_img4.png',
        '../res/puzzle4_img5.png',
        '../res/puzzle4_img6.png',
        '../res/puzzle4_img7.png',
        '../res/puzzle4_img8.png'
        ],
        [7,2,6,8,3,5,1,4,0],     //每个图片开始的位置
        'bg5',
        'bg6'
    );
    //再来一次
    document.getElementById('again').onclick = function(){
        playAgain();

    }
    function playAgain(){
        //page--;
        var timeText = '';
        if (that == 0) 
        {
            timeText = 'timer0';
        }
        else if (that == 1) 
        {
            timeText = 'timer1';
        }
        else if (that == 2) 
        {
            timeText = 'timer2';
        }
        else if (that == 3) 
        {
            timeText = 'timer3';
        }
        document.getElementById(timeText).innerHTML=0;
        hideTan('tanBg');
        //alert(timeText);
        if (that == 0) 
        {
            puzzle(
                'Cont',
                'Drag',
                [
                '../res/puzzle1_img0.png',
                '../res/puzzle1_img1.png',
                '../res/puzzle1_img2.png',
                '../res/puzzle1_img3.png',
                '../res/puzzle1_img4.png',
                '../res/puzzle1_img5.png',
                '../res/puzzle1_img6.png',
                '../res/puzzle1_img7.png',
                '../res/puzzle1_img8.png'
                ],
                [7,3,5,8,6,2,1,4,0],     //每个图片开始的位置
                'bg2',
                'bg6'
            );
        }
        else if (that == 1) 
            {
                puzzle(
                    'Cont1',
                    'Drag1',
                    [
                    '../res/puzzle2_img0.png',
                    '../res/puzzle2_img1.png',
                    '../res/puzzle2_img2.png',
                    '../res/puzzle2_img3.png',
                    '../res/puzzle2_img4.png',
                    '../res/puzzle2_img5.png',
                    '../res/puzzle2_img6.png',
                    '../res/puzzle2_img7.png',
                    '../res/puzzle2_img8.png'
                    ],
                    [7,6,2,8,3,5,1,4,0],     //每个图片开始的位置
                    'bg3',
                    'bg6'
                );
            }
            else if (that == 2) 
            {
                puzzle(
                    'Cont2',
                    'Drag2',
                    [
                    '../res/puzzle3_img0.png',
                    '../res/puzzle3_img1.png',
                    '../res/puzzle3_img2.png',
                    '../res/puzzle3_img3.png',
                    '../res/puzzle3_img4.png',
                    '../res/puzzle3_img5.png',
                    '../res/puzzle3_img6.png',
                    '../res/puzzle3_img7.png',
                    '../res/puzzle3_img8.png'
                    ],
                    [7,2,6,8,3,5,1,4,0],      //每个图片开始的位置
                    'bg4',
                    'bg6'
                );
            }
            else if (that == 3) 
            {
                puzzle(
                    'Cont3',
                    'Drag3',
                    [
                    '../res/puzzle4_img0.png',
                    '../res/puzzle4_img1.png',
                    '../res/puzzle4_img2.png',
                    '../res/puzzle4_img3.png',
                    '../res/puzzle4_img4.png',
                    '../res/puzzle4_img5.png',
                    '../res/puzzle4_img6.png',
                    '../res/puzzle4_img7.png',
                    '../res/puzzle4_img8.png'
                    ],
                    [7,2,6,8,3,5,1,4,0],     //每个图片开始的位置
                    'bg5',
                    'bg6'
                );
            }
    };
    //点击问号
    $('.btn_wen').click(function(){
        $('.puzzle1_img').css('display','block');
        setTimeout(function (){
        $('.puzzle1_img').css('display','none');
        }, 3000);
    });
    /*加载*/
    var load = document.getElementById('loading');
    var imgPath = '../res/';
    var loadingPage = (function () {
        var imgSources = [
        "loading.jpg",
		"gzbtn.png",
		"stabtn.png",
		"gz2.png",
        "sp.png",
		"sl.png",
		"sp.png",
		"again.png",
		"phb.png",
		"e1.png",
		"e2.png",
		"e3.png",
		"e4.png",
		"e5.png",
        "bg1.jpg",
        "bg1_2.png",
        "bg1_3.png",
        "btn_wen.png",
        "bg2.jpg",
        "increase.jpg",
        "increase_bg1_1.jpg",
        "increase_bg1_2.jpg",
        "increase_bg1_3.jpg",
        "increase_bg1_4.jpg",
        "increase_bg2_1.jpg",
        "increase_bg2_2.jpg",
        "increase_bg2_3.jpg",
        "increase_bg2_4.jpg",
        "increase_img1.jpg",
        "increase_img2.jpg",
        "increase_img3.jpg",
        "increase_img4.jpg",
        "puzzle1_img.jpg",
        "puzzle1_img0.png",
        "puzzle1_img1.png",
        "puzzle1_img2.png",
        "puzzle1_img3.png",
        "puzzle1_img4.png",
        "puzzle1_img5.png",
        "puzzle1_img6.png",
        "puzzle1_img7.png",
        "puzzle1_img8.png",
        "z1.jpg",
        "huo.png",
        "xbg_1.png",
        "xbg_2.png",
        "fx.png",
        "bg3.jpg",
       
        "bg4.jpg",
       
        "bg5.jpg",
       
        "bg6.jpg",
        "bg7_img1.png",
        "bg7.jpg",
        "fx1.png"
        ];
        for (var i = 0; i < imgSources.length; i++) {
            imgSources[i] = (imgPath + imgSources[i]);
        };
        var loadImage = function (path, callback) {
            var img = new Image();
            img.onload = function () {
                img.onload = null;
                callback(path);
            };
            img.src = path;
        };
        var imgLoader = function (imgs, callback) {
            var len = imgs.length, i = 0;
            while (imgs.length) {
                loadImage(imgs.shift(), function (path) {
                    callback(path, ++i, len);
                })
            }
        };
        var rateNum = document.getElementById('loading_rate');
        var rateT = document.getElementById('loading_t');
        var bar = document.getElementById('bar');
        var percent = 0;
        imgLoader(imgSources, function (path, curNum, total) {
            percent = curNum / total;
            //$("#pgs2").attr("value", Math.floor(percent * 212));

            rateNum.innerHTML = Math.floor(percent * 100) ;
            rateT.style.width = Math.floor(percent * 100) ;
            if (percent == 1) {
                setTimeout(function () {
                    $('#loading').css('display', 'none');
                    $('#increase').css('display','block');
                }, 500);
            }
        });
    })();


    var oIncrease = document.getElementById('increase');
    var aSel = oIncrease.getElementsByTagName('li');
    var that;
    for(var i=0; i<aSel.length; i++){
        aSel[i].index = i;
        aSel[i].onclick = function(){
            that = this.index;
            aSel[this.index].className = 'on'+(this.index+1);
            setTimeout(function(){
                oIncrease.style.display = 'none';
                document.getElementById('bg'+(that+2)).style.display = 'block';
                document.getElementById('ready').style.display = 'block';
                // ('#ready').css('display','block');
            },1000)
            
        }
    };

   /*  var bg6Btn1 = document.getElementById('bg6_btn1');
    bg6Btn1.onclick = function(){
       // console.log(that);
        document.getElementById('increase').style.display = 'block';
        document.getElementById('bg6').style.display = 'none';
        //console.log('complete'+that)
        $('.complete').css('display','none');
        aSel[that].className = 'li'+(that+1);
        playAgain();
    }; */