window.onload = function(){
	document.addEventListener("touchmove",function(e){e.preventDefault()},false)
	
	window.alert = function(name){
	    var iframe = document.createElement("IFRAME");
	    iframe.style.display="none";
	    iframe.setAttribute("src", 'data:text/plain,');
	    document.documentElement.appendChild(iframe);
	    window.frames[0].window.alert(name);
	    iframe.parentNode.removeChild(iframe);
	}
		
	var arry= [
		{"id":"059586","name1":"朝阳区太阳宫北街1号院太阳","name2":"公元5号楼2单元305","date":"2017年2月8日","lou":"22层","mian":"162.28","shimian":"147.61"},
		
		{"id":"059566","name1":"朝阳区朝阳公园南路8号棕榈","name2":"泉国际公寓10楼512","date":"2017年2月9日","lou":"32层","mian":"158.41","shimian":"143.91"},
		
		{"id":"059534","name1":"朝阳区林萃东路国奥村2号院","name2":"C1号楼1单元204室","date":"2017年2月10日","lou":"6层","mian":"175.53","shimian":"160.34"},
		
		{"id":"059562","name1":"朝阳区太阳宫北街1号院太阳","name2":"公元3号楼1单元1103","date":"2017年2月8日","lou":"22层","mian":"165.23","shimian":"150.47"},
		
		{"id":"059583","name1":"朝阳区朝阳公园南路8号棕榈","name2":"泉国际公寓8楼305","date":"2017年2月9日","lou":"32层","mian":"162.52","shimian":"147.23"},
		
		{"id":"059516","name1":"朝阳区林萃东路国奥村2号院","name2":"D1号楼2单元101室","date":"2017年2月10日","lou":"3层","mian":"172.27","shimian":"157.39"},
		
		{"id":"059530","name1":"北京市朝阳区东四环北路7号","name2":"东山墅80号楼02号","date":"2017年2月8日","lou":"3层","mian":"774.60","shimian":"759.74"},
		
		{"id":"059572","name1":"朝阳区紫玉东路1号紫玉山庄","name2":"55号楼1层","date":"2017年2月9日","lou":"3层","mian":"332.28","shimian":"317.30"},
		
	]
	
	$("#lover_one").css("width",$(window).width()+"px");
	$("#lover_one").css("height",$(window).height()+"px");
		
	$('.myName').focus(function (){ 
		$('.myName').css("background","#ffc5e5")
	}) 
	$('.myName').blur(function (){ 
		if($('.myName').val()==""){
			$('.myName').css("background","#ffc5e5 url(../img/home_myName.png) no-repeat center center;")
		}
		
	}) 	
	
	$('.myName2').focus(function (){ 
		$('.myName2').css("background","#ffc5e5")
	}) 
	$('.myName2').blur(function (){ 
		if($('.myName2').val()==""){
			$('.myName2').css("background","#ffc5e5 url(../img/home_myName.png) no-repeat center center;")
		}
		
	}) 
	
	var ning = 0;
	$(".home_btn").on("touchstart",function(){
		if($('.myName').val() == ""){
			alert("本人姓名必填")
		}else{
			$("#lover_one").hide();
			$("#lover_two").show();
			if($('.myName2').val() == ""){
				ning = 1;
			}else{
				ning = 2;
			}
			
			tobase64();
			$(".newthisImg").show();
		}
			
	})
	$(".two_btn").on("touchstart",function(){
		$("#lover_one").show();
		$("#lover_two").hide();
		
		$('.myName').val("");  
		$('.myName2').val("");  
		
		$('.myName').css("background","#ffc5e5 url(../img/home_myName.png) no-repeat center center;")
		$('.myName2').css("background","#ffc5e5 url(../img/home_myName.png) no-repeat center center;")
		
	})
	

	var _width=515;
	var _height=646;
	function tobase64(){
		var jd = cavasJD();
		
         var imagebg=new Image()
         
		 imagebg.src="img/end_fcz_bg.jpg";
		 
		 imagebg.onload=function(){
		 	
			 var image=new Image()

				 var canvas = document.createElement("canvas");
				 var ctx = canvas.getContext("2d");
				 canvas.width=_width
				 canvas.height=_height
				 ctx.drawImage(imagebg,0,0,canvas.width,canvas.height)
	 
				 ctx.drawImage(jd,0,0,jd.width,jd.height)


				 //console.log(canvas.toDataURL())
				 $(".thisImg").attr("src",canvas.toDataURL())
				 $(".newthisImg").attr("src",canvas.toDataURL())

		}
		

	}
	
	function cavasJD(){
		
		var rom =Math.round(Math.random()*(arry.length-1))
		console.log(rom)
		
		var canvas = document.createElement("canvas");
		var ctx = canvas.getContext("2d");
		
		canvas.width=_width
		canvas.height=_height
		
		ctx.translate(_width/2, _height/2);
		ctx.rotate(6.5*Math.PI/180);
		
		
		//设置字体样式
		ctx.font = "14px 微软雅黑";
		
		//设置字体填充颜色
		ctx.fillStyle = "#868e93";
		
		//开始绘制文字
		var str=$(".myName").val()
		ctx.fillText(str, 140-_width/2, 107-_height/2);
		
		var str2=$(".myName2").val()
		ctx.fillText(str2, 215-_width/2, 106-_height/2);
		 
		var str3_1=arry[rom].name1;
		ctx.fillText(str3_1, 150-_width/2, 182-_height/2);
		
		var str3_2=arry[rom].name2;
		ctx.fillText(str3_2, 150-_width/2, 198-_height/2);
		
		var str4;
		if(ning == 1){
			str4="单独所有";
		}else{
			str4="共同共有";
		}
		ctx.fillText(str4, 200-_width/2, 139-_height/2);
		
		var str5=arry[rom].id;
		ctx.fillText(str5, 260-_width/2, 68-_height/2);
		
		var str6=arry[rom].date;
		ctx.fillText(str6, 180-_width/2, 228-_height/2);
		
		var str7=arry[rom].lou;
		ctx.fillText(str7, 86-_width/2, 371-_height/2);
		var str8=arry[rom].mian;
		ctx.fillText(str8, 136-_width/2, 371-_height/2);
		var str9=arry[rom].shimian;
		ctx.fillText(str9, 206-_width/2, 371-_height/2);
		
		return canvas;
	}
	
	
	

}