//加载进度
// var sceneImages=[
//     "card1.png",
//     "card2.png",
//     "card3.png",
//     "card4.png",
//     "card5.png",
//     "card6.png",
//     "scene1.png",
//     "scene2.png",
//     "scene3.png",
//     "scene4.png",
//     "scene5.png",
//     "scene6.png",
//     "icon1.png",
//     "icon2.png",
//     "icon3.png",
//     "icon4.png",
//     "icon5.png",
//     "icon6.png"
// ];
// function loadImages(arr,fn,fnError){
//     var count=0;
//     var json={};
//     for(var i=0;i<arr.length;i++){
//         var oImg=new Image();
//         (function(index){
//                 oImg.onload=function(){
//                 var name=arr[index].split('.')[0];
//                 json[name]=this;
//                 count++;
//                 $("#load").text(parseInt(count/arr.length)*100);
//                 $(".heart").height(parseInt(count/arr.length)*100+"%");
//                 if(count==arr.length){
//                     fn(json)
//                 }
//             };
//             oImg.onerror=function(){
//                 fnError();
//             };
//             oImg.src='image/'+arr[i];
//         })(i);
//     }
// }
// loadImages(sceneImages,function(){
//     setTimeout(function(){
//         tapOn(".page1",".page2");
//     },1000)
// })
//加载
$(function(){
    $(document).on("touchmove",function(e){
        e.preventDefault();
    })
    //判断是ios还是安卓
    var isIos;
    function isUA(){
        var ua = navigator.userAgent.toLowerCase();
        if (/iphone|ipad|ipod/.test(ua)){
            isIos=true;
        }
    }   
    isUA();
    FastClick.attach(document.body);
    function load(fn){
        var downImg = 0;
        timer=setInterval(function(){
            downImg+=4;
            $("#load").text(downImg);
            $(".heart").height(downImg+"%");
            if(downImg>=100){
                clearInterval(timer);
                fn();            
            };
        },100)
    }
    load(function(){
        tapOn(".page1",".page2");
    });
    //页面切换
    function tapOn(obj1,obj2){
        $(obj1).removeClass("active");
        $(obj2).addClass("active");
    };
    //返回
    $("#return1").on("click",function(){
        tapOn(".page3",".page2");
        $(".page3>div").removeClass("active");
        $("input").val("");
    })
    //选择卡片
    var cur;
    $("#cardlist li").on("click",function(){
        cur=$(this).index();
        tapOn(".page2",".page3");
        $(".page3>div").eq(cur).addClass("active");
    })
    //制作卡片
    $(".btn").on("click",function(){ 
        docard();
    })
    function docard(){
        switch(cur){
            case 0:
                card1();
                break;
            case 1:
                card2();
                break;
            case 2:
                card3();
                break;
            case 3:
                card4();
                break;
            case 4:
                card5();
                break;
            case 5:
                card6();
                break;        
        }  
    }
    function topic(){ 
        html2canvas($(".page4 .card").eq(cur)); 
    }
    function card1(){
        var name=$("#name1").val();
        var num=$("#subway").val();
        if(name && num){
            $("#namemsg1").text(name);
            $("#num1").text(num+"号线");
            time();
            topic();
        }
    }
    function card2(){
        var name=$("#name2").val();
        var num=$("#quota").val();
        if(name && num && entest(name)){
            $("#namemsg2").text(name.toUpperCase());
            $("#num2").text(num);
            topic();
        }
    }
    //英文验证
    function entest(name){
        var reg=/^([A-Za-z]+\s?)*[A-Za-z]$/;
        if(reg.test(name)){
            return true;
        }else{
            alert("请输入英文名字");
        }
    }
    //选择额度
    $("#quota").on("click",function(){    
        //if($("#mlist").css("display")=="block"){
            //$("#mlist").hide();
           // $(".btn").css("margin-top","9.6rem");
        // }else{ 
        //     $(this).val(""); 
            $("#mlist").show(); 
            $(this).hide();
            $(".btn").css("margin-top","10.5rem");
        // }
    })
    $("#mlist span").on("click",function(){
        $(this).addClass("selnum").siblings().removeClass("selnum");
        $("#mlist").hide();
        $(".btn").css("margin-top","9.6rem");
        $("#quota").val($(this).text());
        $("#quota").show(); 
    })
    function card3(){
        var name=$("#name3").val();
        var num=$("#together").val();
        if(name && num){
            $("#namemsg3").text(name);
            $("#num3").text(num);
            topic();
        }
    }
    function card4(){
        var name=$("#name4").val();
        var num=$("#serial").val();
        if(name && num &&serialtest(num)){
            $("#namemsg4,#namemsg4-2").text(name);    
            $("#num4").text(num);
            time();
            topic();
        }
    }
    function serialtest(name) {
        var reg=/^([\dA-Za-z]+\s?)*[\dA-Za-z]$/;;
        if(reg.test(name)){
            return true;
        }else{
            alert("请输入英文或者数字");
        }
    }
    function card5(){
        var name=$("#name5").val();
        var num=$("#another").val();
        if(name && num){
            $("#namemsg5").text(num);
            $("#num5").text(name);
            topic();
        }
    }
    function card6(){
        var name=$("#name6").val();
        var num=$("#school").val();
        if(name && num){
            $("#namemsg6").text(name);
            $("#num6").text(num);
            time();
            topic();
        }
    }
    function time(){
        var myDate = new Date();
        $(".month").text(parseInt(myDate.getMonth())+1);
        $(".day").text(myDate.getDate());
    }
    function word(){
        var textarry=['可以“承包地铁”','可以制作“黑卡”','可以制作“环球旅行合同”','可以制作“小行星命名证书”','可以制作“卖身契”','可以制作“毕业证书”'];
        $("#word").text(textarry[cur]);
    }
    //canvas
    function html2canvas(obj){
        var gd=document.getElementById("c1");
        // var ratio=parseInt($(window).width())*16/375;
        var tScale=window.devicePixelRatio,tWidth=parseInt($(gd).css("width")),tHeight=parseInt($(gd).css("height"));
        gd.width = tWidth * tScale;
        gd.height = tHeight * tScale;        
        var context = gd.getContext("2d");
        //画图
        var pic=obj.find("img");
        var oImg={
            ele:pic[0],
            l:parseInt(pic.css("left")),
            t:parseInt(pic.css("top")),
            w:parseInt(pic.css("width")),
            h:parseInt(pic.css("height"))
        };
        context.drawImage(oImg.ele,oImg.l,oImg.t,oImg.w* tScale,oImg.h* tScale);       
        //写文字
        var textarr=obj.find("p"),textobj;
        for(var i=0;i<textarr.length;i++){
            var ele=$(textarr[i]);
            textobj={
                color:ele.css("color"),
                fSize:parseInt(ele.css("font-size"))*tScale,
                word:ele.text(),
                l:parseInt(ele.css("left"))*tScale,
                t:parseInt(ele.css("top"))*tScale,
                maxw:parseInt(ele.css("max-width"))*tScale || parseInt(ele.css("width"))*tScale
            }
            if(ele.css("width")!="auto"){
                //根据文字长度决定居中显示还是靠左显示
                var dis=(parseInt(ele.css("width"))*tScale-parseInt(context.measureText(ele.text()).width))/2;
                textobj.c=dis>0?dis:0;              
            }else{
                textobj.c=0;
            }
            context.textBaseline = "middle";
            context.fillStyle = textobj.color;
            if(ele.data("bold")=="bold"){
                context.font =  "bold "+textobj.fSize+"px sans-serif";
            }else{
                context.font =  textobj.fSize+"px sans-serif";
            }
            context.fillText(textobj.word,textobj.l+textobj.c,textobj.t+textobj.fSize/1.2,textobj.maxw);            
        }        
        if(isIos){
            success(gd.toDataURL());
        }else{
            upImg();   
        }                     
    }
    function success(src){
        $("#result").attr("src",src); 
        word();
        $("#docard").show();
        tapOn(".page3",".page4");           
    }
    function upImg(){
        var gd=document.getElementById("c1");
        $.ajax({
            type: "get",
            url: "http://case.h6app.com/Api/getToken?bucket=weipai",
            dataType: "json",
            success: function(data) {
                putb64(gd.toDataURL(), data.uptoken, function(cid) {
                    var img=new Image();
                    var src = 'http://7xobbd.com2.z0.glb.qiniucdn.com/' + cid;
                    img.src=src;
                    img.onload=function(){
                        success(src);
                    }
                }, function(){             
            });
        }
     });
    }
    function putb64(pic, token, sf, ef) {
        var pic = pic.split(',')[1];
        var url = "http://up.qiniu.com/putb64/-1";
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
             if (xhr.readyState == 4) {
                var data = JSON.parse(xhr.responseText);
                if (data && data.key) {
                    if (sf) sf(data.key);
                } else {
                    if (ef) ef();
                }
            }
        }
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/octet-stream");
        xhr.setRequestHeader("Authorization", "UpToken " + token);
        xhr.send(pic);
    }
})