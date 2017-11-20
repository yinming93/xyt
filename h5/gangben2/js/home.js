$(function () {
  
	$(window).resize(function () {
		$('Canvas').width($(window).width());
		$('Canvas').height($(window).height());
	}).trigger('resize');
   
    canvas.init();

});
var canvas = (function () {

    var stage, w, h,scaleX,scaleY, loader,pageloader;
	var quesNum = 1;
	var score = 0;
	var block = true;
	var checkonshadow1,checkonshadow2,checkonshadow3,checkonshadow4;
	var loadingImg = [
        {src: "loading.jpg", id: "loadingbg"},
        {src: "eyelight.png", id: "eye"},
		{src: "light1.png", id: "light1"},
		{src: "loadline.png", id: "loadline"}
    ];
	
    var homeImg = [
        {src: "homebg.png", id: "homebg"},
        {src: "homebao.png", id: "bao1"},
		{src: "homebao2.png", id: "bao2"},
		{src: "homecopy.png", id: "homecopy"},
		{src: "homebaoeye.png", id: "homebaoeye"},
		{src: "homecycle.png", id: "homecycle"},
		{src: "homehz.png", id: "homehz"},
		{src: "homeline.png", id: "homeline"},
		{src: "question/p1bg.jpg", id: "p1bg"},
		{src: "question/p2bg.jpg", id: "p2bg"},
		{src: "question/p3bg.jpg", id: "p3bg"},
		{src: "question/p4bg.jpg", id: "p4bg"},
		{src: "question/p5bg.jpg", id: "p5bg"},
		{src: "question/p6bg.jpg", id: "p6bg"},
		{src: "question/p1num.png", id: "p1num"},
		{src: "question/p2num.png", id: "p2num"},
		{src: "question/p3num.png", id: "p3num"},
		{src: "question/p4num.png", id: "p4num"},
		{src: "question/p5num.png", id: "p5num"},
		{src: "question/p6num.png", id: "p6num"},
		{src: "question/cy.png", id: "cy"},
		{src: "question/checkonshadow.png", id: "checkonshadow"}
    ];
	
	
	var luckydraw = [
        {src: "Rbg.png", id: "Rbg"},
		{src: "rule.png", id: "rule"},
		{src: "shake.png", id: "shake"},
    ];

	var tick = {
        funs: {},
        init: function (event) {
            tick.run(tick.funs);
            stage.update(event);
        },
        run: function (funs) {
            for (var key in funs) {
                funs[key]();  
            }
        },
        clear: function () {
            console.log('clear');
            tick.funs = {};
        }
    }
	
	createjs.Ticker.timingMode = createjs.Ticker.RAF;
    createjs.Ticker.addEventListener("tick", tick.init);
	
    return {
        init: function () {
			createjs.CSSPlugin.install(createjs.Tween);
            stage = new createjs.Stage("myCanvas");
            createjs.Touch.enable(stage);
			w = stage.canvas.width;
            h = stage.canvas.height;
			scaleX = w / 640;
            scaleY = 1;
			
            loader = new createjs.LoadQueue(false);
            loader.addEventListener("complete", loading);
            loader.loadManifest(loadingImg, true, "images/");
			
				
		
		$('.question .button a').on('touchstart',function(e){
				if(block == false){
					return false
				}
				block = false
				$('#bomemusic2')[0].play()
				var num=$('.button').attr('data-id')
				var index = $(this).index()
				quesNum = parseInt(num)+1;
				switch(index){
					case 0:
						createjs.Tween.get(checkonshadow1)
						.to({alpha:1})
						createjs.Tween.get(checkonshadow2)
						.to({alpha:0})
						createjs.Tween.get(checkonshadow3)
						.to({alpha:0})
						createjs.Tween.get(checkonshadow4)
						.to({alpha:0})
					break
					case 1:
						createjs.Tween.get(checkonshadow1)
						.to({alpha:0})
						createjs.Tween.get(checkonshadow2)
						.to({alpha:1})
						createjs.Tween.get(checkonshadow3)
						.to({alpha:0})
						createjs.Tween.get(checkonshadow4)
						.to({alpha:0})
					break
					case 2:
						createjs.Tween.get(checkonshadow1)
						.to({alpha:0})
						createjs.Tween.get(checkonshadow2)
						.to({alpha:0})
						createjs.Tween.get(checkonshadow3)
						.to({alpha:1})
						createjs.Tween.get(checkonshadow4)
						.to({alpha:0})
					break
					case 3:
						createjs.Tween.get(checkonshadow1)
						.to({alpha:0})
						createjs.Tween.get(checkonshadow2)
						.to({alpha:0})
						createjs.Tween.get(checkonshadow3)
						.to({alpha:0})
						createjs.Tween.get(checkonshadow4)
						.to({alpha:1})
					break
				}
				score = Math.floor(score+index)  
				if(quesNum > 5){
					console.log('final',score)
					
						if(score>=0 && score<=4){
							setTimeout(function(){
								//window.location.href='http://'+window.location.host+'/r1.php';
								window.location.href='../gbnew/';
							},500)
						}
						if(score>=5 && score<=9){
							setTimeout(function(){
								//window.location.href='http://'+window.location.host+'/r2.php';
									window.location.href='../gbnew/';
							},500)
						}
						if(score>=10 && score<=14){
							setTimeout(function(){
								//window.location.href='http://'+window.location.host+'/r3.php';
									window.location.href='../gbnew/';
							},500)
						}
						if(score>=15){
							setTimeout(function(){
								//window.location.href='http://'+window.location.host+'/r4.php';
									window.location.href='../gbnew/';
							},500)
							
						}
						
				}else{
					
					setTimeout(function(){
						$('.button').attr('data-id',quesNum)
						$('.page').addClass('pagerotate').fadeOut(500)
					},500)
					
					setTimeout(function(){
						$('.page').removeClass('pagerotate').fadeIn()
						question(quesNum)
						
					},1000)
				}
			
			})
			
        }
    };


    function loading() {
	
		
		var loadContainer = new createjs.Container();
		var loadingbg = new createjs.Bitmap(loader.getResult("loadingbg"));
		loadingbg.setTransform(0, 0, 1, 1);
		
		var eye = new createjs.Bitmap(loader.getResult("eye"));
		eye.setTransform(171*scaleX, 639*scaleY, 1, 1);
		eye.alpha = 0;
		
		var light1 = new createjs.Bitmap(loader.getResult("light1"));
		light1.setTransform(225*scaleX, 0, 1, 1);
		light1.alpha =0;
		
		var line = new createjs.Bitmap(loader.getResult("loadline"));
		line.setTransform(0, 0, 1, 1);
		line.alpha =0;
		
		var txt = new createjs.Text("0%", "20px Arial");
		txt.textAlign = "center";
		txt.x = 320*scaleX;
		txt.y = 480*scaleY;
		txt.color = '#fff';
		
		loadContainer.addChild(loadingbg);
		loadContainer.addChild(line);
		loadContainer.addChild(eye);
		loadContainer.addChild(light1);
		loadContainer.addChild(txt);
		
		
		var linealpha,lineX,lineY;
		
		setInterval(function(){
			 lineX = Math.random()*300;
			 lineY= 0;
			 linealpha =1;
			tick.funs.animationline = animationline;
		},500)
			
	
		
		function animationline() {
				linealpha -=0.01
				lineX -= 3
				lineY += 3
				line.alpha=linealpha
				line.setTransform(lineX, lineY, 1, 1);
				if(line.alpha <= 0){
					delete tick.funs['animationline'];
				}
            }
		
		stage.addChild(loadContainer);
		
		createjs.Tween.get(eye, {loop: true})
				.wait(100)
				.to({alpha:0,alpha:1},500) 
				.to({alpha:1,alpha:0},500)
				
		createjs.Tween.get(light1, {loop: true})
				.to({alpha:0,alpha:1},1000) 
				.to({alpha:1,alpha:0},1000)		
				
		createjs.Ticker.setFPS(20);
		createjs.Ticker.addEventListener("tick", stage);	
		
		pageloader = new createjs.LoadQueue(false);
		pageloader.addEventListener("progress", function(e){
				txt.text=	Math.floor(e.loaded*100)+'%'
			});
		
		pageloader.addEventListener("complete", pageInit);
        pageloader.loadManifest(homeImg, true, "images/");
		
	
    }
	
	
	
	function pageInit(){
			
		var pageContainer = new createjs.Container();
		
		var homebg = new createjs.Bitmap(pageloader.getResult("homebg"));
		homebg.setTransform(0, 0, 1, 1);
		
		var homecopy = new createjs.Bitmap(pageloader.getResult("homecopy"));
		homecopy.setTransform(0, 0, 1, 1);

		var bao1 = new createjs.Bitmap(pageloader.getResult("bao1"));
		bao1.setTransform(0, 492*scaleY, 1, 1);
		bao1.alpha = 1;
		
		var bao2 = new createjs.Bitmap(pageloader.getResult("bao2"));
		bao2.setTransform(0, 492*scaleY, 1, 1);
		bao2.alpha = 0;
		
		var homebaoeye = new createjs.Bitmap(pageloader.getResult("homebaoeye"));
		homebaoeye.setTransform(0, 640*scaleY, 1, 1);
		homebaoeye.alpha = 1;
		
		var homecycle = new createjs.Bitmap(pageloader.getResult("homecycle"));
		homecycle.setTransform(0, 0, 1, 1);
		homecycle.alpha = 1;
		
		var homehz = new createjs.Bitmap(pageloader.getResult("homehz"));
		homehz.setTransform(0, 800*scaleY, 1, 1);
	
		var homeline = new createjs.Bitmap(pageloader.getResult("homeline"));
		homeline.setTransform(0, 0, 1, 1);
		homeline.alpha = 1;
		
		
		
		
		
		pageContainer.addChild(homebg);
		pageContainer.addChild(homecycle);
		pageContainer.addChild(homeline);
		pageContainer.addChild(homecopy);
		pageContainer.addChild(bao1);
		pageContainer.addChild(bao2);
		pageContainer.addChild(homebaoeye);
		pageContainer.addChild(homehz);
		
		setTimeout(function(){
			$('.lnum').hide()
			stage.addChild(pageContainer);
			$('.home').show();
		},2000)
		
		
		createjs.Tween.get(bao1, {loop: true})
				.wait(1000)
				.to({alpha:1,alpha:0},200) 
				.wait(500)
				.to({alpha:0,alpha:1},200) 
				
		createjs.Tween.get(bao2, {loop: true})
				.wait(1000)
				.to({alpha:0,alpha:1},200) 
				.wait(500)
				.to({alpha:1,alpha:0},200) 
				
		createjs.Tween.get(homebaoeye, {loop: true})
				.wait(1000)
				.to({alpha:0,alpha:1},1000) 
				.wait(500)
				.to({alpha:1,alpha:0},1000)	
				
		createjs.Tween.get(homecycle, {loop: true})
				.to({x: 0, y: 30, alpha: 0.5}, 1000)
				.to({x: 30, y: 30, alpha: 1},1000)		
				.to({x: 30, y: 0, alpha: 0.5},1000)	
				.to({x: 0, y: 0, alpha: 1},1000)					
		
		createjs.Tween.get(homeline, {loop: true})
				.to({x: 0, y: 5, alpha: 0.5}, 100)
				.to({x: 5, y: 0, alpha: 1},100)	
		
		createjs.Ticker.setFPS(20);
		createjs.Ticker.addEventListener("tick", stage);	
		
	
		
		$('.home a').on('touchstart',function(){
			$('.home').hide();
			$('#bomemusic1')[0].play()
			$('#bgmusic')[0].volume = 0.5;
			setTimeout(function(){
				question(quesNum);
				$('.question').fadeIn();
				$('#bgmusic')[0].play()
				
			},500)
			
		})
		
	}
	
	function question(number){
		block = true
		$('Canvas').height('1008px');
		var pageContainer = new createjs.Container();
		
		var questionbg = new createjs.Bitmap(pageloader.getResult("p"+number+"bg"));
		questionbg.setTransform(0, 0, 1, 1);
		
		var pnum = new createjs.Bitmap(pageloader.getResult("p"+number+"num"));
		pnum.setTransform(234*scaleX, 148*scaleY, 1, 1);
		
		var cy1 = new createjs.Bitmap(pageloader.getResult("cy"));
		cy1.setTransform(240*scaleX, 205*scaleY, 1, 1);
		cy1.alpha = 1;
		cy1.regX = 35;
		cy1.regY = 35;
		
		createjs.Tween.get(cy1, {loop: true})
				.to({rotation: 360, x: 240*scaleX, y: 205*scaleY}, 4000)
		
		var cy2 = new createjs.Bitmap(pageloader.getResult("cy"));
		cy2.setTransform(400*scaleX, 205*scaleY, 1, 1);
		cy2.alpha = 1;
		cy2.regX = 35;
		cy2.regY = 35;
		
		createjs.Tween.get(cy2, {loop: true})
				.to({rotation: 360, x: 400*scaleX, y: 205*scaleY}, 4000)
		
		checkonshadow1 = new createjs.Bitmap(pageloader.getResult("checkonshadow"));
		checkonshadow1.setTransform(125, 433, 1, 1);
		checkonshadow1.alpha = 0;
		
		checkonshadow2 = new createjs.Bitmap(pageloader.getResult("checkonshadow"));
		checkonshadow2.setTransform(125,540, 1, 1);
		checkonshadow2.alpha = 0;
		
		checkonshadow3 = new createjs.Bitmap(pageloader.getResult("checkonshadow"));
		checkonshadow3.setTransform(125,650, 1, 1);
		checkonshadow3.alpha = 0;
		
		checkonshadow4 = new createjs.Bitmap(pageloader.getResult("checkonshadow"));
		checkonshadow4.setTransform(125,755, 1, 1);
		checkonshadow4.alpha = 0;
		
		pageContainer.addChild(questionbg);
		pageContainer.addChild(cy1);
		pageContainer.addChild(cy2);
		pageContainer.addChild(pnum);
		pageContainer.addChild(checkonshadow1,checkonshadow2,checkonshadow3,checkonshadow4);
		
		
		createjs.Ticker.setFPS(20);
		createjs.Ticker.addEventListener("tick", stage);
		stage.addChild(pageContainer);

		
	}




})();