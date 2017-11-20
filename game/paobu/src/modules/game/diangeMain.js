
function diangeMain(){
	//alert("dian main");
	
	//getPara();
	gScore = 0;
	gSheepCaught = 0;
	gSpeedX = 0;
	
	gGX = 0;
	
	gDgMinX = 150*gCScale;
	gDgMaxX = 650*gCScale;
	
	gTraceText = "hh";
	
	gStartLevel = 0;
	gLevel = 5;
	
	gRoadSpeed = 5;
	gDiangeSpeed = 3;
	//loadLevelXml("liandata.xml?r="+Math.random());
	
	gIsAndroid = isAndroid();
	
	gObstaclePicArr = [];
	gSheepPicArr = [];
	
	//alert("gamedata:"+gGameDataArr);
	//gItemPicArr=[];
	
	preloadPics();
}



//获取页面传递的参数

function getPara(){
	var Request = new Object();
	Request = GetRequest();
	gStartLevel = 1;
	if(Request["level"]!=undefined){
		gStartLevel = Number(Request["level"]);
	}
}

//js获取url中的参数方法
/*
使用方法：
var Request = new Object();
Request = GetRequest();
var 参数1,参数2,参数3,参数N;
参数1 = Request['参数1'];
参数2 = Request['参数2'];
参数3 = Request['参数3'];
参数N = Request['参数N'];
*/

function GetRequest() {
   var url = location.search; //获取url中"?"符后的字串
   var theRequest = new Object();
   if (url.indexOf("?") != -1) {
      var str = url.substr(1);
      strs = str.split("&");
      for(var i = 0; i < strs.length; i ++) {
         theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);
      }
   }
   return theRequest;
}




//判断设备是否为移动设备
function isMobile() {
    var sUserAgent= navigator.userAgent.toLowerCase();
    var bIsIpad= sUserAgent.match(/ipad/i) == "ipad";
    var bIsIphoneOs= sUserAgent.match(/iphone os/i) == "iphone os";
	var bIsMidp= sUserAgent.match(/midp/i) == "midp";
	var bIsUc7= sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
	var bIsUc= sUserAgent.match(/ucweb/i) == "ucweb";
	var bIsAndroid= sUserAgent.match(/android/i) == "android";
	var bIsCE= sUserAgent.match(/windows ce/i) == "windows ce";
	var bIsWM= sUserAgent.match(/windows mobile/i) == "windows mobile";
	if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
		//alert(bIsIpad +"/"+ bIsIphoneOs +"/"+ bIsMidp +"/"+ bIsUc7 +"/"+ bIsUc +"/"+ bIsAndroid +"/"+ bIsCE +"/"+ bIsWM);
		return true;
	} else {
		return false;
	}
}

//判断是否要小石子
function isLow(){
	return isAndroid();
}

//判断是否为Android设备
function isAndroid(){
	var sUserAgent= navigator.userAgent.toLowerCase();
	
	/*
    var bIsIpad= sUserAgent.match(/ipad/i) == "ipad";
    var bIsIphoneOs= sUserAgent.match(/iphone os/i) == "iphone os";
	var bIsAndroid= sUserAgent.match(/android/i) == "android";
	*/
	
	if(sUserAgent.match(/android/i) == "android"){
		return true;
	}else{
		return false;
	}

}

//判断是否为UC浏览器
function isUC(){
	var sUserAgent= navigator.userAgent.toLowerCase();
	var bIsUc7= sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
	var bIsUc= sUserAgent.match(/ucweb/i) == "ucweb";
	if(bIsUc7 || bIsUc){
		return true;
	}else{
		return false;
	}
}

//js获取url中的参数方法
/*
使用方法：
var Request = new Object();
Request = GetRequest();
var 参数1,参数2,参数3,参数N;
参数1 = Request['参数1'];
参数2 = Request['参数2'];
参数3 = Request['参数3'];
参数N = Request['参数N'];
*/

function GetRequest() {
   var url = location.search; //获取url中"?"符后的字串
   var theRequest = new Object();
   if (url.indexOf("?") != -1) {
      var str = url.substr(1);
      strs = str.split("&");
      for(var i = 0; i < strs.length; i ++) {
         theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);
      }
   }
   return theRequest;
}



function preloadPics(){
	//alert("preload:"+gImagePath);
	var picArr = [];
	//alert("gGameImgPath:"+gGameImgPath);
	/*
	if(gGameImgPath && gGameImgPath!=""){
		gImagePath = gGameImgPath;
	}
	*/
	//alert("ready to preload");
	
	gBgFarPic = gImagePath + "bgfar.jpg"
	picArr.push(gBgFarPic);
	
	gBgPic = gImagePath + "ground.png";
	picArr.push(gBgPic);
	
	/*
	gCommentPic = gImagePath + "comment.png";
	picArr.push(gCommentPic);
	gHandSetPic = gImagePath + "handset.png";
	picArr.push(gHandSetPic);
	*/
	
	gObstacle1Pic = gImagePath + "obstacle1.png";
	picArr.push(gObstacle1Pic);
	gObstaclePicArr.push(gObstacle1Pic);
	
	gObstacle2Pic = gImagePath + "obstacle2.png";
	picArr.push(gObstacle1Pic);
	gObstaclePicArr.push(gObstacle2Pic);
	
	gObstacle3Pic = gImagePath + "obstacle3.png";
	picArr.push(gObstacle1Pic);
	gObstaclePicArr.push(gObstacle3Pic);
	
	
	gSheepPicArr[0] = [];
	gSheepY1Pic = gImagePath + "sheepY1.png";
	picArr.push(gSheepY1Pic);
	gSheepPicArr[0].push(gSheepY1Pic);
	gSheepY2Pic = gImagePath + "sheepY2.png";
	picArr.push(gSheepY2Pic);
	gSheepPicArr[0].push(gSheepY2Pic);
	gSheepY3Pic = gImagePath + "sheepY3.png";
	picArr.push(gSheepY3Pic);
	gSheepPicArr[0].push(gSheepY3Pic);
	gSheepY4Pic = gImagePath + "sheepY4.png";
	picArr.push(gSheepY4Pic);
	gSheepPicArr[0].push(gSheepY4Pic);
	gSheepY5Pic = gImagePath + "sheepY5.png";
	picArr.push(gSheepY5Pic);
	gSheepPicArr[0].push(gSheepY5Pic);
	
	
	gSheepPicArr[1] = [];
	gSheepW1Pic = gImagePath + "sheepW1.png";
	picArr.push(gSheepW1Pic);
	gSheepPicArr[1].push(gSheepW1Pic);
	gSheepW2Pic = gImagePath + "sheepW2.png";
	picArr.push(gSheepW2Pic);
	gSheepPicArr[1].push(gSheepW2Pic);
	gSheepW3Pic = gImagePath + "sheepW3.png";
	picArr.push(gSheepW3Pic);
	gSheepPicArr[1].push(gSheepW3Pic);
	
	gSheepPicArr[2] = [];
	gSheepP1Pic = gImagePath + "sheepP1.png";
	picArr.push(gSheepP1Pic);
	gSheepPicArr[2].push(gSheepP1Pic);
	gSheepP2Pic = gImagePath + "sheepP2.png";
	picArr.push(gSheepP2Pic);
	gSheepPicArr[2].push(gSheepP2Pic);
	gSheepP3Pic = gImagePath + "sheepP3.png";
	picArr.push(gSheepP3Pic);
	gSheepPicArr[2].push(gSheepP3Pic);
	
	
	
	gTreeAPic = gImagePath + "treeA.png";
	picArr.push(gTreeAPic);
	gTreeBPic = gImagePath + "treeB.png";
	picArr.push(gTreeBPic);
	gTreeCPic = gImagePath + "treeC.png";
	picArr.push(gTreeCPic);
	 
	gKuchaPic = gImagePath + "kucha.png";
	picArr.push(gKuchaPic);
	 
	gAdd5Pic = gImagePath + "add5.png";
	picArr.push(gAdd5Pic);
	gAdd10Pic = gImagePath + "add10.png";
	picArr.push(gAdd10Pic);
	gAdd30Pic = gImagePath + "add30.png";
	picArr.push(gAdd30Pic);
	gD10Pic = gImagePath + "d10.png";
	picArr.push(gD10Pic);
	
	
	gDgRunPic1 = gImagePath + "dgRun1.png";
	gDgRunPic2 = gImagePath + "dgRun2.png";
	picArr.push(gDgRunPic1);
	picArr.push(gDgRunPic2);

	
	gDgDownPic1 = gDgRunPic1
	gDgDownPic2 = gDgRunPic2

	
	if(!isLow()){
		gBgAniPic1 = gImagePath + "groundAni0001.png";
		gBgAniPic2 = gImagePath + "groundAni0002.png";
		gBgAniPic3 = gImagePath + "groundAni0003.png";
		gBgAniPic4 = gImagePath + "groundAni0004.png";
		picArr.push(gBgAniPic1);
		picArr.push(gBgAniPic2);
		picArr.push(gBgAniPic3);
		picArr.push(gBgAniPic4);
	}
	
	gTimeBarPic = gImagePath + "timeBan.png";
	picArr.push(gTimeBarPic);
	gTimeBarNPic = gImagePath + "timeBanN.png";
	picArr.push(gTimeBarNPic);
	
	gScoreBarPic = gImagePath + "coinBan.png";
	picArr.push(gScoreBarPic);
	
	
	gDidaPic = gImagePath + "dida.png";
	picArr.push(gDidaPic);
	
	
	loadPics(picArr,preloadPicsOK);
}

function preloadPicsOK(){
	//alert("ok");
	initGame();
}

///////// loading 图片通用方法
function loadPics(srcArr,callback){
	loadNum = srcArr.length;
	loadCallback = callback;
	for(var i=0;i<srcArr.length;i++){
		this["loadimg"+i] = document.createElement('img');
		this["loadimg"+i].addEventListener('load', loadedOneOK, false);
		this["loadimg"+i].src = srcArr[i];
	}
	function loadedOneOK(){
		loadNum--;
		if(loadNum<=0){
			loadNum = 0;
			loadCallback();
		}
	}
}


function initGame(){

	gLock = true;
	gState = "normal";
	
	initObjects();
	initOrientation();
	onFlashInitComplete();
	//startGame();
}

function startGame(){
	gLock = false;
}

function initObjects(){
	
	gBgFar = new Sprite();
	gBgFar._sourceWidth = 768 * gCScale;
	//gBgFar._sourceHeight =  1152 * gCScale;
	gBgFar._sourceHeight =  1366 * gCScale;
	gBgFar._x = 0*gCScale;
	gBgFar._y = 0*gCScale;
	gBgFar._imgArr=[new Image()];
	gBgFar._imgArr[0].src = gBgFarPic;

	gRootSprite.addChild(gBgFar,-5);
	
	
	gBg =  new Sprite();
	gBg._sourceWidth = 768 * gCScale;
	gBg._sourceHeight =  1152 * gCScale;
	gBg._x = 0*gCScale;
	gBg._y = -50*gCScale;
	gBg._imgArr=[new Image()];
	gBg._imgArr[0].src = gBgPic;
	gBg.ani = new Sprite();
	if(!isLow()){
		
		gBg.ani._sourceWidth = 768 * gCScale;
		gBg.ani._sourceHeight =  1152 * gCScale;
		gBg.ani._xscale = 1.1;
		//gBg.ani._sourceHeight =  1100 * gCScale;
		gBg.ani._x = -38*gCScale;
		gBg.ani._y = 34*gCScale;
		gBg.ani._imgArr=[new Image(),new Image(),new Image(),new Image()];
		gBg.ani._imgArr[0].src = gBgAniPic1;
		gBg.ani._imgArr[1].src = gBgAniPic2;
		gBg.ani._imgArr[2].src = gBgAniPic3;
		gBg.ani._imgArr[3].src = gBgAniPic4;
	
		
	}
	gBg.addChild(gBg.ani);
	gRootSprite.addChild(gBg,0);
	
	gKucha = new Sprite();
	gKucha._sourceWidth = 307 * gCScale;
	gKucha._sourceHeight =  371 * gCScale;
	gKucha._x = 322*gCScale;
	gKucha._y = 330*gCScale;
	gKucha._xscale = gKucha._yscale = 0.4;
	gKucha.firstX = gKucha._x;
	gKucha.firstY = gKucha._y;
	gKucha.firstS = gKucha._xscale;
	gKucha.firstA = 0.9;
	gKucha.tagX = 258*gCScale;
	gKucha.tagY = 60*gCScale;
	gKucha.tagA = 1.0;
	gKucha.tagS = 0.8;
	gKucha._imgArr=[new Image()];
	gKucha._imgArr[0].src = gKuchaPic;
	gKucha.state = "far";
	gKucha.step = 0;
	gKucha.m =0;
//	gKucha.farSteps = 1950;距离
	gKucha.farSteps = 1950;
	gKucha.nearSteps =50;
	gKucha.onEnterFrame = function(){
		if(!gLock){
		this.step++;
		this.m++;
		if(this.state=="far"){
			if(this.step>this.farSteps-70 && this.step<this.farSteps){
				//停止产生新东西
				gAllSprite.newing = false;
			}else if(this.step>=this.farSteps){
				this.state = "near";
				//this.setDepth(18);
				
				this.firstX = this._x;
				this.firstY = this._y;
				this.firstS = this._xscale;
				this.tagX =110*gCScale;
				this.tagY = -200*gCScale;
				this.tagS = 0.4;
				this.step=0;
				//this.nearSteps = 150;
				
				
				//gAllSprite.newing = false;
				//打断
				/*
				this.state = "break";
				stopRoad();
				*/
				
			}else{
				var prg = this.step/this.farSteps;
				this._x = this.firstX+(this.tagX-this.firstX)*prg*prg*prg*prg;
				this._y = this.firstY+(this.tagY-this.firstY)*prg*prg*prg*prg;
				this._xscale = this._yscale = this.firstS+(this.tagS-this.firstS)*prg*prg*prg*prg;
				this._alpha = this.firstA+(this.tagA-this.firstA)*prg*prg*prg*prg;
			}
		}else if(this.state=="near"){
			if(this.step>=this.nearSteps){
				//打断
				this.state = "break";
				stopRoad();
				showDida();
				gDg.intoKucha();
				
			}else{
				/*
				var prg = this.step/this.nearSteps;
				this._x = this.firstX+(this.tagX-this.firstX)*prg*prg*prg;
				this._y = this.firstY+(this.tagY-this.firstY)*prg*prg*prg;
				this._xscale = this._yscale = this.firstS+(this.tagS-this.firstS)*prg*prg*prg;
				*/
			}
			//gRootSprite.removeChild(this);
			//gAllSprite.addChild(this);
			//this.extend(ItemOnRoad);
		}
		}
	}
	gRootSprite.addChild(gKucha,-2);
	
	gAllSprite = new Sprite();
	gAllSprite._sourceWidth = 768 * gCScale;
	gAllSprite._sourceHeight =  1152 * gCScale;
	//gAllSprite._width = 768 * gCScale;
	//gAllSprite._height = 1152 * gCScale;
	gAllSprite._x = 0*gCScale;
	gAllSprite._y = 50*gCScale;
	gAllSprite.nowDepth = 0;
	gAllSprite.newing = true;

	gRootSprite.addChild(gAllSprite,10);
	
	
	


	
	gDg = new Sprite();
	gDg._x = 300*gCScale;
	gDg._y = 500*gCScale;
	gDg._name = "dg";
	gDg.step = 700;
	gAllSprite.addChild(gDg,1000);
	
	gDg.gDgRun = new Sprite();
	gDg.gDgRun._sourceWidth = 230 * gCScale;
	gDg.gDgRun._sourceHeight =  280 * gCScale;
	gDg.gDgRun._x = -150*gCScale;
	gDg.gDgRun._y = 0*gCScale;
	gDg.gDgRun._imgArr=[new Image(),new Image()];
	gDg.gDgRun._imgArr[0].src = gDgRunPic1;
	gDg.gDgRun._imgArr[1].src = gDgRunPic2;
	gDg.gDgRun._frameDelayFrames = 3;
	
	gDg.gDgRun.onEnterFrame = function(){
		if(this._currentFrame==4){
			this.stop();
			if(this.wait==-1){
				this.wait = this._frameDelayFrames-1;
			}else{
				this.wait--;
				if(this.wait<=0){
					this.wait=-1;
					this.gotoAndPlay(1);
				}
			}
		}else{
			this.wait=-1;
		}
	}
	
	gDg.addChild(gDg.gDgRun);
	
	/*
	gDg.gDgDown = new Sprite();
	gDg.gDgDown._sourceWidth = 230 * gCScale;
	gDg.gDgDown._sourceHeight =  280 * gCScale;
	gDg.gDgDown._x = -150*gCScale;
	gDg.gDgDown._y = 0*gCScale;
	gDg.gDgDown._imgArr=[new Image(),new Image()];
	gDg.gDgDown._imgArr[0].src = gDgDownPic1;
	gDg.gDgDown._imgArr[1].src = gDgDownPic2;
	gDg.gDgDown._frameDelayFrames = 3;
	gDg.gDgDown._visible = false;
	gDg.addChild(gDg.gDgDown);
	*/
	
	gDg.onEnterFrame = function(){
	  //if(!gLock){
		this._x+=gSpeedX;
		if(this._x<gDgMinX){
			this._x = gDgMinX;
		}else if(this._x>gDgMaxX){
			this._x = gDgMaxX;
		}
		//}
	}
	
	gDg.down = function(){
		//this.gDgDown._visible = true;
		//this.gDgRun._visible = false;
		//this.gDgDown.ff = 6;
		//this.gDgRun.gotoAndPlay(5);
	}
	
	gDg.intoKucha = function(){
		this.tagX = 370*gCScale;
		this.tagY = 260*gCScale;
		this.tagA = 0;
		this.tagS = 0;
		this.intoSpeed = 12;
		this.onEnterFrame = function(){
		if(!gLock){
			this._x+=(this.tagX-this._x)/this.intoSpeed;
			this._y+=(this.tagY-this._y)/this.intoSpeed;
			this._alpha+=(this.tagA-this._alpha)/this.intoSpeed;
			this._xscale = this._yscale = this._xscale+(this.tagS-this._xscale)/this.intoSpeed;
			if(Math.abs(this._y-this.tagY)<1){
				this._alpha = 0;
				this._visible = false;
				this.onEnterFrame = function(){}
				gameOver();
			}
			}
		}
	}
	
	
	
	
	initPool(3);
	
	
	gAllSprite.onEnterFrame = function(){
	
	  if(!gLock){	
		for(var i=0;i<this._subArr.length;i++){
			if(this._subArr[i]._name!="dg"){
				this._subArr[i]._depth = this._subArr[i].step;
				//gTraceText += "/"+this._subArr[i]._name;
				if(this._subArr[i].spec=="obstacle"){
					if(this._subArr[i].step>(gDg.step-10) && this._subArr[i].step<(gDg.step+10)){
						this._subArr[i].ifHit(panduan(this._subArr[i]));
					}
				}else{
					if(this._subArr[i].step>(gDg.step-30) && this._subArr[i].step<(gDg.step+30)){
						this._subArr[i].ifHit(panduan(this._subArr[i]));
					}
				}
			}
		}
		//this._subsDepthSort();
		
		
		//控制游戏难度，及等级
		
		var tps = gKucha.step;
		if(tps<380){
			gLevel = 1;
		}else if(tps>=380 && tps<400){
			gLevel = 0;
		}else if(tps>=400 && tps<780){
			gLevel = 2;
		}else if(tps>=780 && tps<800){
			gLevel = 0;
		}else if(tps>=800 && tps<1180){
			gLevel = 3;
		}else if(tps>=1180 && tps<1200){
			gLevel = 0;
		}else if(tps>=1200 && tps<1580){
			gLevel = 4;
		}else if(tps>=1580 && tps<1600){
			gLevel = 0;
		}else if(tps>=1600){
			gLevel = 5;
		}
		
		
		var jiange = 20;
		var yb = 100; 
		
		
		if(gLevel==0){
			
		}else if(gLevel==1){
			jiange = 15;
			yb = 100;
		}else if(gLevel==2){
			jiange = 10;
			yb = 90;
		}else if(gLevel==3){
			jiange = 8;
			yb = 50;
		}else if(gLevel==4){
			jiange = 8;
			yb = 100;
		}else if(gLevel==5){
			jiange = 8;
			yb = 80;
		}
		
		
		if(this.newing == true && gKucha.step%jiange==0 && gLevel!=0){
			var tmpRnd = Math.random()*100;
			if(tmpRnd<=yb){
				addOneSheep();
				
			}else if(tmpRnd>yb && tmpRnd<=101){
				addOneObstacle();
			}
		}
		
		if(this.newing == true && gKucha.step%30==0){
			addOneTree();
		}
		//gTraceText = "add:"+this._waitForAddChildArr.length +" / remove:" + this._waitForRemoveChildArr.length;
		//gTraceText = gRoadItemsPool.length;
		}
	}
	
	
	gEffectSprite = new Sprite();
	gEffectSprite._sourceWidth = 768 * gCScale;
	gEffectSprite._sourceHeight =  1152 * gCScale;
	//gAllSprite._width = 768 * gCScale;
	//gAllSprite._height = 1152 * gCScale;
	gEffectSprite._x = 0*gCScale;
	gEffectSprite._y = 0*gCScale;

	gRootSprite.addChild(gEffectSprite,30);
	
	
	/*
	gAddScoreSprite = new Sprite();
	gAddScoreSprite.state = "normal";
	gAddScoreSprite.riseSpeed = 8;
	gAddScoreSprite._x = 360*gCScale;
	gAddScoreSprite._y = 300*gCScale;
	
	gAddScoreSprite.add5 = new Sprite();
	gAddScoreSprite.add5._sourceWidth = 49*gCScale;
	gAddScoreSprite.add5._sourceHeight = 33*gCScale;
	gAddScoreSprite.add5._xscale = gAddScoreSprite.add5._yscale = 2.0;
	gAddScoreSprite.add5._imgArr=[new Image(),new Image()];
	gAddScoreSprite.add5._imgArr[0].src = gAdd5aPic;
	gAddScoreSprite.add5._imgArr[1].src = gAdd5bPic;
	gAddScoreSprite.add5._visible = false;
	gAddScoreSprite.addChild(gAddScoreSprite.add5);
	
	gAddScoreSprite.d1 = new Sprite();
	gAddScoreSprite.d1._sourceWidth = 32*gCScale;
	gAddScoreSprite.d1._sourceHeight = 34*gCScale;
	gAddScoreSprite.d1._xscale = gAddScoreSprite.d1._yscale = 2.0;
	gAddScoreSprite.d1._imgArr=[new Image()];
	gAddScoreSprite.d1._imgArr[0].src = gD1Pic;
	gAddScoreSprite.d1._visible = false;
	gAddScoreSprite.addChild(gAddScoreSprite.d1);
	
	gAddScoreSprite.showAdd5=function(){
		this.d1._visible = false;
		this.d1.onEnterFrame = function(){};
		this.moveSprite(this.add5);
	}
	gAddScoreSprite.showD1=function(){
		this.add5._visible = false;
		this.add5.onEnterFrame = function(){};
		this.moveSprite(this.d1);
	}
	
	gAddScoreSprite.moveSprite=function(mc){

		mc._y=0;
		mc._visible = true;
		mc.tagY = -100;
		mc.speed = this.riseSpeed;
		mc.waitNum = 2;
		mc.onEnterFrame = function(){
			this._y+=(this.tagY-this._y)/this.speed;
			
			if(this._y-this.tagY<0.3){
				this._y = this.tagY;
				this.waitNum--;
				if(this.waitNum<=0){
					this.onEnterFrame = function(){};
					this._visible = false;
				}
			}
		}
		
	}
	 
	gRootSprite.addChild(gAddScoreSprite);
	*/
	
	 gScoreBoardBar = new Sprite();
	 gScoreBoardBar._sourceWidth = 199 * gCScale;
	 gScoreBoardBar._sourceHeight =  66 * gCScale;
	 gScoreBoardBar._x = 550*gCScale;
	 gScoreBoardBar._y = 20*gCScale;
	 gScoreBoardBar._imgArr = [new Image()];
	 gScoreBoardBar._imgArr[0].src = gScoreBarPic;
	 gRootSprite.addChild(gScoreBoardBar,59);
	
	 gScoreBoard = new TextSprite();
	 gScoreBoard.text = "";
	 if(!isMobile()){
	 	gScoreBoard.font = "bold "+Math.floor(28*gCScale)+"px Microsoft Yahei";
	 	 gScoreBoard._y = 45*gCScale;
	 }else{
		gScoreBoard.font = "bold "+Math.floor(32*gCScale)+"px Microsoft Yahei";
		 gScoreBoard._y = 43*gCScale;
	 }
	 
	 gScoreBoard.fillStyle = "#FFFFFF";
	 gScoreBoard.textAlign = 'right';
	 gScoreBoard._x = 160*gCScale;
	
	 gScoreBoard._sourceWidth = 360;
	 gScoreBoard._sourceHeight = 50;
	 
	 gScoreBoard.onEnterFrame = function(){
		//this.text = "得分："+gScore;

		//this.text = gScore+" m";
		var tp = String(gScore);
		
		document.cookie="code="+tp;
		
		this.text = tp;
		
		//this.text = testText;
		//this.text = gTraceText;
		//gScoreBoardShadow.text = this.text;
		//this.text =testVar;
		//this.text = gCScale;
	 }
	 gScoreBoardBar.addChild(gScoreBoard,60);

	/*
	 gScoreBoardShadow = new TextSprite();
	 gScoreBoardShadow.text = "";
	 gScoreBoardShadow.font = gScoreBoard.font
	 gScoreBoardShadow.fillStyle = "#000000";
	 gScoreBoardShadow.textAlign = 'left';
	 gScoreBoardShadow._x = gScoreBoard._x+4*gCScale;
	 gScoreBoardShadow._y = gScoreBoard._y+4*gCScale;
	 gScoreBoardShadow._sourceWidth = 360;
	 gScoreBoardShadow._sourceHeight = 50;
	 gScoreBoardShadow._alpha = 0.2;
	 gRootSprite.addChild(gScoreBoardShadow,59);
	 */
	 
	 
	 
	 //时间进度
	 gTimeBar = new Sprite();
	 gTimeBar._sourceWidth = 263 * gCScale;
	 gTimeBar._sourceHeight =  48 * gCScale;
	 gTimeBar._x = 50*gCScale;
	 gTimeBar._y = 30*gCScale;
	 gTimeBar._imgArr=[new Image()];
	 gTimeBar._imgArr[0].src = gTimeBarPic;
	 
	 gTimeBar.tiao = new Sprite();
	 gTimeBar.tiao ._sourceWidth = 120 * gCScale;
	 gTimeBar.tiao ._sourceHeight =  41 * gCScale;
	 gTimeBar.tiao ._yscale =  0.5;
	 gTimeBar.tiao ._x = 20*gCScale;
	 gTimeBar.tiao ._y = 14*gCScale;
	 gTimeBar.tiao ._imgArr=[new Image()];
	 gTimeBar.tiao ._imgArr[0].src = gTimeBarNPic;
	 gTimeBar.tiao.onEnterFrame = function(){
	 	var allS = gKucha.farSteps+gKucha.nearSteps;
	 	this._xscale=(allS-gKucha.m)/allS;
	 
	 }
	 gTimeBar.addChild(gTimeBar.tiao);
	 
	 gRootSprite.addChild(gTimeBar,64);
	 
	 gTimeBoard = new TextSprite();
	 gTimeBoard.text = "";
	 if(!isMobile()){
	 	gTimeBoard.font = "bold "+Math.floor(28*gCScale)+"px Microsoft Yahei";
	 	gTimeBoard._y = 36*gCScale;
	 }else{
		gTimeBoard.font = "bold "+Math.floor(32*gCScale)+"px Microsoft Yahei";
		gTimeBoard._y = 34*gCScale;
	 }
	 gTimeBoard.fillStyle = "#FFFFFF";
	 gTimeBoard.textAlign = 'right';
	 gTimeBoard._x = 250*gCScale;
	 
	 gTimeBoard._sourceWidth = 410;
	 gTimeBoard._sourceHeight = 50;
	 
	 /*
	 gTimeBoard.onEnterFrame = function(){
		
		var tp = gKucha.farSteps+gKucha.nearSteps-gKucha.m;
		if(tp<0){
			tp=0;
		}

		this.text = "距离: "+tp+" 米";
		gTimeBoardShadow.text = this.text;

	 }
	 */
	 
	 gTimeBoard.onEnterFrame = function(){
	 	//this.text = "剩余时间:";
	 	var tp = gKucha.farSteps+gKucha.nearSteps-gKucha.m;
		if(tp<0){
			tp=0;
		}
	 	this.text = tp+"米";
	 	//gTimeBoardShadow.text = this.text;
	 }
	 
	 gTimeBar.addChild(gTimeBoard,62);
	/*
	 gTimeBoardShadow = new TextSprite();
	 gTimeBoardShadow.text = "";
	 gTimeBoardShadow.font = gScoreBoard.font
	 gTimeBoardShadow.fillStyle = "#000000";
	 gTimeBoardShadow.textAlign = 'left';
	 gTimeBoardShadow._x = gTimeBoard._x+4*gCScale;
	 gTimeBoardShadow._y = gTimeBoard._y+4*gCScale;
	 gTimeBoardShadow._sourceWidth = 410;
	 gTimeBoardShadow._sourceHeight = 50;
	 gTimeBoardShadow._alpha = 0.2;
	 gRootSprite.addChild(gTimeBoardShadow,61);
	 */
	 
	 /*
	 gDB = new TextSprite();
	 gDB.text = "";
	 gDB.font =  "bold "+Math.floor(28*gCScale)+"px Microsoft Yahei";
	 gDB.fillStyle = "#000000";
	 gDB.textAlign = 'left';
	 gDB._x = 20*gCScale;
	 gDB._y = 200*gCScale;
	 gDB._sourceWidth = 410;
	 gDB._sourceHeight = 50;
	 gDB.onEnterFrame = function(){
		this.text = testText;
	 }
	 
	 gRootSprite.addChild(gDB,66);
	 */
	
}

function showDida(){
	gDida = new Sprite();
	gDida._sourceWidth = 318 * gCScale;
	gDida._sourceHeight =  86 * gCScale;
	gDida._x = 220*gCScale;
	gDida._y = 330*gCScale;
	gDida._imgArr=[new Image()];
	gDida._imgArr[0].src = gDidaPic;
	
	gRootSprite.addChild(gDida,200);	
	
	flashMc(gDida,4,10);
}


function stopRoad(){
	gRoadSpeed = 0;
	gBg.ani.stop();
	gAllSprite.onEnterFrame=function(){};
}

//路上道具对象池

function initPool(num){
	gRoadItemsPool = [];
	for(var i=0;i<num;i++){
		addNewToPool();	
	}
	
}
function getOneFromPool(){
	var tmp = null;
	if(gRoadItemsPool.length>0){
		for(var i=0;i<gRoadItemsPool.length;i++){
			if(gRoadItemsPool[i].inUse==false){
				tmp = gRoadItemsPool[i];
				//return tmp;
			}
		}
		if(tmp==null){
			tmp = addNewToPool();
		}
	}else{
		tmp = addNewToPool();
	}
	//gTraceText = String(tmp);
	return tmp;
}
function addNewToPool(){
	var tmpItem = new ItemOnRoad();
	tmpItem.inUse = false;
	gRoadItemsPool.push(tmpItem);
	return tmpItem;
}
function returnOneToPool(item){
	item.inUse = false;
	item.haveHit = false;
	item._x = 10000*gCScale;
	item._y = 10000*gCScale;
	//gTraceText = item._depth;
	item._parent.removeChild(item);
}

function addOneSheep(){
	var tmp = getOneFromPool();
	tmp.inUse = true;
	tmp._sourceWidth = 221 * gCScale;
	tmp._sourceHeight =  142 * gCScale;
	tmp._cx = -tmp._sourceWidth/2;
	//gSheep._cy = -gSheep._sourceHeight/2;
	tmp.allSteps = 700;	
	tmp.firstStep = 450;
	
	
	var tmpRand = Math.round(Math.random()*100);
	var specNum = 0;
	if(tmpRand<=80){
		specNum = 0;
		tmp.spec = "sheepYellow";
	}else if(tmpRand>80 && tmpRand<=96){
		specNum = 1;
		tmp.spec = "sheepWhite";
	}else if(tmpRand>96){
		specNum = 2;
		tmp.spec = "sheepPink";
	}
	
	tmp._imgArr=[new Image()];
	//tmp._imgArr[0].src = gSheepNormalPic;
	tmp._imgArr[0].src = gSheepPicArr[specNum][Math.floor(Math.random()*gSheepPicArr[specNum].length)];
	tmp.born(((Math.random()*400-200)*gCScale));
	
	tmp.onHitDg = function(){
		//gScore+=5;
		//returnOneToPool(this);
		//showResult("false");
		this.haveHit = true;
		gSheepCaught++;
		if(this.spec=="sheepYellow"){
			gScore+=5;
			addScoreShow("a5",this);
		}else if(this.spec=="sheepWhite"){
			gScore+=10;
			addScoreShow("a10",this);
		}else if(this.spec=="sheepPink"){
			gScore+=30;
			addScoreShow("a30",this);
		}
		returnOneToPool(this);
	}
	
	/*
	tmp.onEnterFrame = function(){

	}
	*/
	
	gAllSprite.nowDepth--;
	gAllSprite.addChild(tmp,gAllSprite.nowDepth);
}
function addOneObstacle(){
	var tmp = getOneFromPool();
	tmp.inUse = true;
	tmp._sourceWidth = 170 * gCScale;
	tmp._sourceHeight =  80 * gCScale;
	tmp._cx = -tmp._sourceWidth/2;
	//gSheep._cy = -gSheep._sourceHeight/2;
	tmp.allSteps = 700;	
	tmp.firstStep = 450;
	tmp.spec = "obstacle";
	tmp.haveHit = false;
	
	tmp._imgArr=[new Image()];
	tmp.specNum = Math.floor(Math.random()*gObstaclePicArr.length);
	tmp._imgArr[0].src = gObstaclePicArr[tmp.specNum];
	tmp.born(((Math.random()*400-200)*gCScale));
	
	tmp.onHitDg = function(){
		if(this.haveHit==false){
			gScore-=10;
			//returnOneToPool(this);
			this.haveHit = true;
			//showResult("false");
			gDg.down();
			addScoreShow("d10",this);
		}
	}
	
	/*
	tmp.onEnterFrame = function(){

	}
	*/
	
	gAllSprite.nowDepth--;
	gAllSprite.addChild(tmp,gAllSprite.nowDepth);
}

function addOneTree(){
	var tmp = getOneFromPool();
	tmp.inUse = true;
	tmp._sourceWidth = 200 * 8 * gCScale;
	tmp._sourceHeight =  150 * 8 * gCScale;
	tmp._cx = -tmp._sourceWidth/2;
	//tmp._xscale = tmp._yscale = 4.0;
	//gSheep._cy = -gSheep._sourceHeight/2;
	tmp.spec = "tree";
	
	tmp.allSteps = 700*2;	
	tmp.firstStep = 450*1.7;
	
	//tmp._alpha = 0;
	var tmptreeArr = [gTreeAPic,gTreeBPic,gTreeCPic]
	
	tmp._imgArr=[new Image()];
	tmp._imgArr[0].src = tmptreeArr[Math.floor(Math.random()*3)];


	var tmpX = (Math.random()*800+2400)*gCScale;
	if(Math.random()*100<50){
	    tmpX*=-1;
	}
	tmp.born(tmpX);
	
	tmp.onHitDg = function(){
		returnOneToPool(this);
	}
	
	/*
	tmp.onEnterFrame = function(){

	}
	*/
	
	gAllSprite.nowDepth--;
	gAllSprite.addChild(tmp,gAllSprite.nowDepth);
}


//效果对象池
initShowPool(3);
function initShowPool(num){
	gShowItemsPool = [];
	for(var i=0;i<num;i++){
		addNewToShowPool();	
	}
	
}
function getOneFromShowPool(){
	var tmp = null;
	if(gShowItemsPool.length>0){
		for(var i=0;i<gShowItemsPool.length;i++){
			if(gShowItemsPool[i].inUse==false){
				tmp = gShowItemsPool[i];
				//return tmp;
			}
		}
		if(tmp==null){
			tmp = addNewToShowPool();
		}
	}else{
		tmp = addNewToShowPool();
	}
	//gTraceText = String(tmp);
	document.cookie="num="+tmp;
	return tmp;
}
function addNewToShowPool(){
	var tmpItem = new Sprite();
	tmpItem.inUse = false;
	gShowItemsPool.push(tmpItem);
	return tmpItem;
}
function returnOneToShowPool(item){
	item.inUse = false;
	item._x = 10000*gCScale;
	item._y = 10000*gCScale;
	//gTraceText = item._depth;
	item._parent.removeChild(item);
}
function addScoreShow(mode,tagSprite){
	var tmp = getOneFromShowPool();
	tmp.inUse = true;
	tmp._alpha = 1;
	tmp._sourceWidth = 200 * gCScale;
	tmp._sourceHeight =  150 * gCScale;
	tmp._cx = -tmp._sourceWidth/2;
	tmp._xscale = tmp._yscale = 0.8;
	//gSheep._cy = -gSheep._sourceHeight/2;
	
	tmp._imgArr=[new Image()];
	if(mode=="a5"){
		tmp.spec = "a5";
		tmp._imgArr[0].src = gAdd5Pic;
	}else if(mode=="a10"){
		tmp.spec = "a10";
		tmp._imgArr[0].src = gAdd10Pic;
	}else if(mode=="a30"){
		tmp.spec = "a30";
		tmp._imgArr[0].src = gAdd30Pic;
	}else if(mode=="d10"){
		tmp.spec = "d10";
		tmp._imgArr[0].src = gD10Pic;
	}
	tmp._x = tagSprite._x;
	tmp._y = tagSprite._y;
	tmp.tagY = tmp._y-300*gCScale;
	tmp.onEnterFrame = function(){
	   if(!gLock){
		this._y+=(this.tagY-this._y)/6;
		if(Math.abs(this._y-this.tagY)<=100){
			this._alpha*=0.9;
		}
		
		if(Math.abs(this._y-this.tagY)<=1){
			this._y=this.tagY;
			this.waitForRemove = 3;
			this.onEnterFrame = function(){
				this.waitForRemove--;
				if(this.waitForRemove<=0){
					this.onEnterFrame = function(){};
					returnOneToShowPool(this);
				}
			}
		  }	
		}
	}
	gEffectSprite.addChild(tmp);
}

function initOrientation(){
	

	window.addEventListener('deviceorientation', this.orientationListener, false);
	window.addEventListener('MozOrientation', this.orientationListener, false);
	window.addEventListener('devicemotion', this.orientationListener, false);

}

function orientationListener(e){
	var fx = 1;
	
	if(gIsAndroid){
		fx=-1;
		if(Math.abs(e.accelerationIncludingGravity.x)<8){
			gGX = e.accelerationIncludingGravity.x;
		}
	}else{
		gGX = e.accelerationIncludingGravity.x;
	}
	
	var tpax = fx*gGX;	
	gSpeedX = tpax*gDiangeSpeed;
	
}



function clickItem(item){
	if(gState == "normal"){
		item.maskG._visible = true;
		gSelectedItem = item;
		gState = "selectOne";
	}else if(gState == "selectOne"){
		if(gSelectedItem==item){
			item.maskG._visible = false;
			gState = "normal";
		}else{
			if(gSelectedItem==item.relation){
				showRight(gSelectedItem,item);
			}else{
				showWrong(gSelectedItem,item);
			}
		}
	}
}

function showRight(item1,item2){
	gState = "showRight";
	item1.maskG._visible = true;
	item2.maskG._visible = true;
	gShowNum = 2;
	flashMc(item1,1,4,showRightOne);
	flashMc(item2,1,4,showRightOne);
	showResult("right");
}

function showRightOne(mc){
	mc._visible = false;
	gShowNum--;
	if(gShowNum==0){
		showRightOK();
	}
}

function showRightOK(){
	
	/*
	alert(gSelectedItem.relation);
	gSelectedItem.relation._visible = false;
	alert(gSelectedItem);
	gSelectedItem._visible = false;
	*/
	gSelectedItem = null;
	
	if(panduan()){
		gState = "levelOver";
		//alert("game over");
		levelOver();
	}else{
		gState = "normal";
	}
}

function showWrong(item1,item2){
	gState = "showWrong";
	item1.maskG._visible = false;
	item2.maskG._visible = false;
	item1.maskR._visible = true;
	item2.maskR._visible = true;
	gShowNum = 2;
	flashMc(item1,4,6,showWrongOne);
	flashMc(item2,4,6,showWrongOne);
	
	showResult("wrong");
}

function showWrongOne(mc){
	gShowNum--;
	if(gShowNum==0){
		showWrongOK();
	}
}

function showWrongOK(){
	for(i=0;i<gTotalItemArr.length;i++){
		var tmpItem = gTotalItemArr[i];
		if(tmpItem._visible==true){
			tmpItem.maskG._visible = false;
			tmpItem.maskR._visible = false;
		}
	}
	gSelectedItem = null;
	gState = "normal";
}

function showResult(result){
	if(result=="right"){
		//gScore+=5;
		gAddScoreSprite.showAdd5();
	}else if(result=="wrong"){
		//gScore-=1;
		gAddScoreSprite.showD1();
	}
}

function panduan(item){
	var report = false;

	if(Math.abs((item._x)-(gDg._x-20*gCScale))<100*gCScale){
		report = true;
	}
	
	return report;
}

function ItemOnRoad(){

	ItemOnRoad.superClass.call(this); 
	
	this.centerX = 380*gCScale;
	this.firstY = 240*gCScale;
	this.lastY = 700*gCScale;
	this.firstScale = 0.001;
	this.endScale = 0.8;
	this.changeBi = this.endScale/this.firstScale;
	this.fenbu = 5;
	this.allSteps = 800;	
	this.firstStep = 300;
	this.inUse = false;
	this.step = this.firstStep;
	//this.stepBi=1;
	
	
	this.ItemOnRoad_flush_mc = new Sprite();
	this.ItemOnRoad_flush_mc._visible = false;
	this.addChild(this.ItemOnRoad_flush_mc);
	
	
	this.born = function(bx){
		
		//alert("bx:"+bx);
		this._x = this.centerX + bx*this.firstScale;
		this._y = 288*gCScale;
		this.firstX = this._x;
		this.lastX = (this._x-this.centerX)*this.changeBi+this.centerX;
		this._xscale=this._yscale = this.firstScale;
		this.step = this.firstStep;
		
		this.ItemOnRoad_flush_mc.onEnterFrame = function(){
			if(!gLock){
				this._parent.addStep(gRoadSpeed);
			}
			
		}
		
	}
	this.addStep = function(step){
		//this.step+=Math.round(step*this.stepBi);
		this.step+=step;
		if(this.step>=this.allSteps+100){
			//alert("end");
			//this.ItemOnRoad_flush_mc.onEnterFrame = function(){};
			//this._parent.removeChild(this);
			//this.born((Math.random()*400-200)*gCScale);
			//this.step = this.firstStep;
			//this.born(0);
			returnOneToPool(this);
		}
		this.position(this.step);
		
	}
	
	this.position = function(step){
		var prg = step/this.allSteps;
		var pbi = Math.pow(prg,this.fenbu)
		
		this.tagScale = (this.endScale-this.firstScale)*pbi + this.firstScale;
		this._xscale = this._yscale = this._xscale+(this.tagScale-this._xscale)/4;
		
		this.tagY = (this.lastY-this.firstY)*pbi + this.firstY;
		this._y = this._y+(this.tagY-this._y)/4;
		this._x = (this.lastX-this.firstX)*pbi + this.centerX;
	}
	
	this.ifHit = function(yes){
		if(yes){
			this.onHitDg();
		}
	}
	
	this.onHitDg = function(){
	
	}
	
}
ItemOnRoad.extend(Sprite);



//随机排序
function randomArr(arr){
	 var tempArr = [];
	 var tempArr2 = [];

	 var length = arr.length;
	// gDB.trace("arr0:"+arr);
	for (var i=0; i<length; i++)
    {
		tempArr[i] = i;
	}

    for (i=0; i<length; i++)
    {
		//gDB.trace(i);
       // tempArr2[i] = tempArr.splice(Math.floor(Math.random()* tempArr.length),1);
		tempArr2[i] = arr[tempArr.splice(Math.floor(Math.random()*tempArr.length),1)];
		//gDB.trace("mixArr.x:"+tempArr2[i].length);
    }

	return tempArr2;
}

//sprite闪烁方法
function flashMc(mc,frameswait,times,callback){
	mc.flashMcNum = 0;
	mc.flashMcWait = frameswait;
	if(times>=1){
		mc.flashMcTimes = times*2;
	}else{
		mc.flashMcTimes  = -3;
	}

		mc.flashMcCallbackFun = callback;

	mc.changeFlash = function(){
		if(this._alpha==1){
			this._alpha=0;
		}else{
			this._alpha=1;
		}
		this.flashMcTimes--;
		if(this.flashMcTimes==0){
			this.onEnterFrame = function(){}
			this.flashMcCallbackFun(this);
		}
	}
	mc.onEnterFrame = function(){
		this.flashMcNum++;
		if(this.flashMcNum>=this.flashMcWait){
			this.flashMcNum = 0;
			mc.changeFlash();
		}
	}

}

/*
//---------------------------------------------------
//ShowTextSprite  多行文本
//---------------------------------------------------
*/

function ShowTextSprite(){
	ShowTextSprite.superClass.call(this);

	this.font = "normal 14px Microsoft Yahei";
	this.fillStyle = "#d2d2d2";
	this.textAlign = "center";
	this.maxLines = 2;
	this.bytesPerLine = 30;
	this.lineHeight = 46;

	this.writeTextOnCanvas = function(ctx, lh, rw, text){

		var lineheight = lh;
		var text = text;


		function getTrueLength(str){//获取字符串的真实长度（字节长度）
			var len = str.length, truelen = 0;
			for(var x = 0; x < len; x++){
				if(str.charCodeAt(x) > 128){
					truelen += 2;
				}else{
					truelen += 1;
				}
			}
			return truelen;
		}
		function cutString(str, leng){//按字节长度截取字符串，返回substr截取位置
			var len = str.length, tlen = len, nlen = 0;
			for(var x = 0; x < len; x++){
				if(str.charCodeAt(x) > 128){
					if(nlen + 2 < leng){
						nlen += 2;
					}else{
						tlen = x;
						break;
					}
				}else{
					if(nlen + 1 < leng){
						nlen += 1;
					}else{
						tlen = x;
						break;
					}
				}
			}
			return tlen;
		}
		function isBiaoDian(cha){
			var biaodian = "，。；、）》！：”】";
			var isBD = false;
			for(var i=0;i<biaodian.length;i++){
				if(cha==biaodian.substr(i,1)){
					isBD = true;
				}
			}
			return isBD;
		}
		for(var i = 1; getTrueLength(text) > 0 && i<=this.maxLines; i++){


			var tl = cutString(text, rw);
			var huanhang = text.substr(0,tl).search("\n");
			if(huanhang!=-1){
				//alert(huanhang);
				tl = huanhang;
			}
			//alert(text.substr(tl,1)+":"+isBiaoDian(text.substr(tl,1)));
			if(isBiaoDian(text.substr(tl,1))){
				tl -= 1;
			}

			ctx.fillText(text.substr(0, tl).replace(/^\s+|\s+$/, ""), 10, i * lineheight);
			if(huanhang!=-1){
				text = text.substr(tl+1);
			}else{
				text = text.substr(tl);
			}
		}
	}
	this._drawContent = function(){
		gCtx.font = this.font;
		gCtx.fillStyle = this.fillStyle;
		gCtx.textAlign = this.textAlign;
		this.writeTextOnCanvas(gCtx, this.lineHeight, this.bytesPerLine, this.text);
	}
}
ShowTextSprite.extend(Sprite);


function levelOver(){
	//gGameOver(gScore,1);
	if(gStartLevel<gGameDataArr.length){
		gStartLevel++;
		
		reloadLevel();
	}else{
		gameOver();
	}
}

function clearLevel(){
	gRootSprite.removeChild(gQuestion);
	gRootSprite.removeChild(gAllSprite);
	gRootSprite.removeChild(gAddScoreSprite);
	gRootSprite.removeChild(gScoreBoard);
	gRootSprite.removeChild(gScoreBoardShadow);
	
}

function reloadLevel(){

	clearLevel();
	
	gItemPicArr=[];
	gTotalDuads = gGameDataArr[gStartLevel-1].length-1;
	
	preloadPics();
}

function gameOver(){
//	alert("game over");
/*	alert(gScore);
	alert(gSheepCaught);	*/
//	gGameOver(gScore,gSheepCaught);
	document.getElementById("txtAction").value = (gScore);
	document.getElementById("txtAction2").value = (gSheepCaught);
	form1.action = "result.php";
	form1.submit();
}
