//////////////////////////////
//							//
//	JafarSprite.js 			// 
// 							//
//	version 1.0 alpha		//
//							//
//  Created: 2013.3.20		//
//	Modified: 2013.10.25 	//
//  Debug: 2014.4.19    	//
//	Modified: 2014.4.22 	//
//	Modified: 2014.11.24 	//
//							//
//	Jafar Yang ,  CNTV.CN	//
//							//
//  中国网络电视台  杨大城	//
//							//
//////////////////////////////
 
function Sprite()  
{

	//gDB.trace("new sprite");
	
	this._name = null;
	this._iamhere = true;
	this._parent = null;
	
	//mask试验区
	this._haveMask = false;
	this._maskImg = null;
	//this._mask = null;
	this._maskDraw = null;
	
	//mask试验区结束
	

	this._subArr = [];

	this._waitForAddChildArr = [];
	this._waitForRemoveChildArr = [];
	
	this._imgArr=[];
	this._updateNum = 0;
	this._status = 0;
	this._currentFrame = 1;
	this._frameDelayFrames = 1;
	
	this._sourceWidth = 0;
	this._sourceHeight = 0;
	
	this._x = 0;
	this._y = 0;
	this._cx = 0;//中心点位置x
	this._cy = 0;//中心点位置y
	this._xscale = 1;
	this._yscale = 1;
	this._width = 0;
	this._height = 0;
	this._alpha = 1;
	this._rotation = 0;
	this._visible = true;
	this._flipH = false;
	this._filpHPoint = 0;
	this._depth = 0;
	this._holded = false; //是否被鼠标点中，或者被手指点中
	
	this._sx = 0;
	this._sy = 0;
	this._swidth = 100;
	this._sheight = 100;
	
	
	
	//参数绝对渲染值
	this._Render_x = 0;
	this._Render_y = 0;
	this._Render_cx = 0;//中心点位置x
	this._Render_cy = 0;//中心点位置y
	this._Render_xscale = 1;
	this._Render_yscale = 1;
	this._Render_width = 100;
	this._Render_height = 100;
	this._Render_alpha = 1;
	this._Render_rotation = 0;
	this._Render_visible = true;
	this._Render_depth = 0;
	
	this._Render_mode = 0;
	this._Render_sx = 0;
	this._Render_sy = 0;
	this._Render_swidth = 100;
	this._Render_sheight = 100;
	
	
	this._playStatus = 1;
	this._isRoot = false;
	
	this._xmouse=0;
	this._ymouse=0;
	
	//this._startTouchEvents();
	//this._startMouseEvents();
	//return this;
}
/*
//---------------------------------------------------
//操控方法群
//---------------------------------------------------
*/
Sprite.prototype.stop = function(){
		this._playStatus = 0;
}; 

Sprite.prototype.play = function(){
		this._playStatus = 1;
}; 

Sprite.prototype.gotoAndStop = function(frameNum){
	if(frameNum>0 && frameNum<=this._imgArr.length){
		this._currentFrame = frameNum;
		this._playStatus = 0;
	}
}; 

Sprite.prototype.gotoAndPlay = function(frameNum){
	if(frameNum>0 && frameNum<=this._imgArr.length){
		this._currentFrame = frameNum;
		this._playStatus = 1;
	}
}; 

Sprite.prototype.nextFrame = function(){
	if(this._currentFrame<this._imgArr.length){
		this._currentFrame++;
	}
}

Sprite.prototype.prevFrame = function(){
	if(this._currentFrame>1){
		this._currentFrame--;
	}
}

/*
//---------------------------------------------------
//设置方法群
//---------------------------------------------------
*/


//mask试验区
Sprite.prototype.setMask = function(maskImgSrc){
	//gDB.trace("setDepth:"+dp);
	this._haveMask = true;
	this._maskImg = document.createElement('img'); 
	this._maskImg.src = maskImgSrc;
	//this._mask = document.createElement('canvas');
	this._maskDraw = document.createElement('canvas');
}
//mask试验区结束

Sprite.prototype.setDepth = function(dp){
	//gDB.trace("setDepth:"+dp);
	this._depth = dp;
	//this._parent._subsDepthSort();
}

Sprite.prototype.getDepth = function(){
	return this._depth;
}

Sprite.prototype.IamRoot = function(intervalTime){
	this._isRoot = true;
	this._parent = null;
	this._name = "Root";
	this._playStatus = 1;
	this._startEnterframeRoot(intervalTime);
	this._startTouchEvents();
	this._startMouseEvents();
}

Sprite.prototype.setParent = function(parent){
	this._parent = parent;
	parent._subArr.push(this);
}

Sprite.prototype.setVisible = function(bol){
	this._visible = bol;
}

Sprite.prototype.setImgArr = function(imgVO){
	this._imgArr = imgVO._imgArr;
	this._x = imgVO._x;
	this._y = imgVO._y;
	this._cx = imgVO._cx;
	this._cy = imgVO._cy;
	this._frameDelayFrames = imgVO._frameDelayFrames;
}

Sprite.prototype.getInstanceAtDepth = function(depth){
	var tmpSptite = {};
	for(var i=0;i<this._subArr.length;i++){
		if(this._subArr[i]._depth==depth){
			tmpSptite = this._subArr[i];
		}
	}
	return tmpSptite;
}

Sprite.prototype.getNextHighestDepth = function(){
	if(this._subArr.length>0){
		return this._subArr[this._subArr.length-1]._depth+1;
	}else{
		return 0;
	}
}

Sprite.prototype.swapDepths = function(obj){
	if(obj._depth!=undefined){
		var tmpDepth = obj._depth;
		obj._depth = this._depth;
		this._depth = tmpDepth;
		//this._parent._subsDepthSort();
	}
}

/*
//---------------------------------------------------
//内部机制方法群
//---------------------------------------------------
*/

//层级渲染机制组
Sprite.prototype._startEnterframeRoot = function(intervalTime){
	this._roottimer = setInterval(this._enterframe,intervalTime);
}

Sprite.prototype._subsDepthSort = function(){
	if(this._subArr.length>1){
		this._subArr.sort(this._createComparisonFunction("_depth"));
		/*
		gDB.trace("_subArr:------------------------------");
		for(var i=0;i<this._subArr.length;i++){
			gDB.trace(this._subArr[i]._name);
		}
		*/
	}
}
Sprite.prototype._createComparisonFunction = function(propertyName){
	
	return function(object1, object2){
		var value1 = object1[propertyName];
		var value2 = object2[propertyName];
		if (value1 < value2){
			return -1;
		} else if (value1 > value2){
			return 1;
		} else {
			return 0;
		}
	} ;
}

Sprite.prototype.removeMe = function(){
	for(var i=0;i<this._parent._subArr.length;i++){
		if(this._parent._subArr[i]==this){
			this._parent._subArr.splice(i,1);
		}
	}
}

Sprite.prototype._enterframe = function(){ 
	
	var me;
	if(this._iamhere){
		me = this;
	}else{
		me = gRootSprite;
		gCtx.clearRect(0,0,gCanvas.getAttribute("width"),gCanvas.getAttribute("height"));
	
	}
	
	me.onEnterFrame();
	
	if(me._playStatus==1){
		me._updateNum++;
		if(me._updateNum%me._frameDelayFrames==0){
			me._currentFrame ++;
			if(me._currentFrame>me._imgArr.length){
				me._currentFrame=1;
			}
		}
	}
	
	me._subsDepthSort();
	me._render();
	
	
	if(me._subArr.length>=1){
		for(var i=0;i<me._subArr.length; i++){
			me._subArr[i]._enterframe();
		}
	}
	
	me._changeChild();
};

Sprite.prototype._changeChild = function(){
	
	//removeChild
	if(this._waitForRemoveChildArr.length>0){
		for(var i=0;i<this._waitForRemoveChildArr.length;i++){
			for(var j=0;j<this._subArr.length;j++){
				if(this._subArr[j]==this._waitForRemoveChildArr[i].sub){
					this._waitForRemoveChildArr[i].sub._parent = null;
					this._subArr.splice(j,1);
				}
			}
			
		}
	}
	this._waitForRemoveChildArr=[];
	
	//addChild
	if(this._waitForAddChildArr.length>0){
			for(var i=0;i<this._waitForAddChildArr.length;i++){
				this._waitForAddChildArr[i].sub._parent = this;
				this._subArr.push(this._waitForAddChildArr[i].sub);
				if(this._waitForAddChildArr[i].depth!=undefined){
				this._waitForAddChildArr[i].sub.setDepth(this._waitForAddChildArr[i].depth);
			}

		}
	
	}
	this._waitForAddChildArr=[];
};

Sprite.prototype._render = function(){
	if(this._visible){

		this._draw();

		
	}
};

Sprite.prototype._draw = function(){
	
	if(this._isRoot){
		
			this._Render_x = this._x;
			this._Render_y = this._y;
			this._Render_cx = this._cx;
			this._Render_cy = this._cy;
			this._Render_xscale = this._xscale;
			this._Render_yscale = this._yscale;
			this._Render_width = this._sourceWidth;
			this._Render_height = this._sourceHeight;
			this._Render_alpha = this._alpha;
			this._Render_rotation = this._rotation;
			this._Render_visible = this._visible;
		
		}else{
			/*
			this._Render_rotation = this._parent._Render_rotation + this._rotation;
			this._Render_cx = this._cx * this._xscale;
			this._Render_cy = this._cy * this._yscale;
			this._Render_xscale = this._parent._Render_xscale * this._xscale;
			this._Render_yscale = this._parent._Render_yscale * this._yscale;
			this._Render_width = this._Render_xscale * this._sourceWidth;
			this._Render_height = this._Render_yscale * this._sourceHeight;
			this._Render_tempParentRot = Math.atan(this._y/this._x);
			this._Render_tempR = Math.pow(Math.pow(this._x*this._parent._Render_xscale,2)+Math.pow(this._y*this._parent._Render_yscale,2),0.5);
			this._Render_x = this._parent._Render_x + this._Render_tempR/Math.sin(this._Render_tempParentRot+(this._Render_rotation/180)*Math.PI);
			this._Render_y = this._parent._Render_y + this._Render_tempR/Math.cos(this._Render_tempParentRot+(this._Render_rotation/180)*Math.PI);
			this._Render_alpha = this._parent._Render_alpha * this._alpha;
			*/
			
			
			this._Render_x = this._parent._Render_x + this._x * this._parent._Render_xscale;
			this._Render_y = this._parent._Render_y + this._y * this._parent._Render_yscale;
			this._Render_cx = this._cx * this._xscale;
			this._Render_cy = this._cy * this._yscale;
			this._Render_xscale = this._parent._Render_xscale * this._xscale;
			this._Render_yscale = this._parent._Render_yscale * this._yscale;
			this._Render_width = this._Render_xscale * this._sourceWidth;
			this._Render_height = this._Render_yscale * this._sourceHeight;
			this._Render_alpha = this._parent._Render_alpha * this._alpha;
			this._Render_rotation = this._parent._Render_rotation + this._rotation;			
			
			this._Render_sx = this._sx;
			this._Render_sy = this._sy;
			this._Render_swidth = this._swidth;
			this._Render_sheight = this._sheight;
			
			if(this._Render_sx<0){
				this._Render_sx = 0;
			}
			if(this._Render_sy<0){
				this._Render_sy = 0;
			}
			
			
			if(this._parent._Render_visible==false || this._parent._Render_visible==0){
				this._Render_visible = false;
			}else{
				this._Render_visible = this._visible;
			}
			
		}
	
	if(this._imgArr.length>=1 || this.text!=undefined || this._drawShape!=undefined){
			
		gCtx.translate(this._Render_x,this._Render_y);
		gCtx.rotate(this._Render_rotation*Math.PI/180);
		
		var tmpAlpha;
		if(this._Render_alpha<0){
			tmpAlpha = 0;
		}else if(this._Render_alpha>1){
			tmpAlpha = 1;
		}else{
			tmpAlpha = this._Render_alpha;
		}
		gCtx.globalAlpha = tmpAlpha;
		
		
		if(this._flipH){
			//gCtx.translate(gRootSprite._width,0);
			gCtx.translate(this._filpHPoint*gCScale,0);
			gCtx.scale(-1,1);
	
		}
		this._drawContent();
		//gCtx.drawImage(this._imgArr[this._currentFrame-1],this._Render_cx,this._Render_cy,this._Render_width,this._Render_height);
		if(this._flipH){
			//gCtx.translate(gRootSprite._width,0);
			gCtx.translate(this._filpHPoint*gCScale,0);
			gCtx.scale(-1,1);
	
		}
		
		
		gCtx.rotate(-this._Render_rotation*Math.PI/180);
		gCtx.translate(-this._Render_x,-this._Render_y);
		gCtx.restore();
		

	}
}
Sprite.prototype._drawContent = function(){
	
	if( !((this._Render_cx+this._Render_width<0) || 
		(this._Render_cy+this._Render_height<0) || 
		(this._Render_cx > gCanvas.getAttribute("width")) || 
		(this._Render_cy > gCanvas.getAttribute("height")) )
	
	){
		
		if(!this._haveMask){
			if(this._Render_mode == 1){
				gCtx.drawImage(this._imgArr[this._currentFrame-1],this._Render_sx,this._Render_sy,this._Render_swidth,this._Render_sheight,this._Render_cx,this._Render_cy,this._Render_width,this._Render_height);
			}else{
				gCtx.drawImage(this._imgArr[this._currentFrame-1],this._Render_cx,this._Render_cy,this._Render_width,this._Render_height);
			}
		}else{
		
			var tmpMaskDrawCtx = this._maskDraw.getContext('2d');

			//tmpMaskDrawCtx.drawImage(this._maskImg,0,0);
			tmpMaskDrawCtx.drawImage(this._maskImg,this._Render_cx,this._Render_cy,this._Render_width,this._Render_height);
			tmpMaskDrawCtx.globalCompositeOperation = 'source-atop';
			if(this._Render_mode == 1){
				tmpMaskDrawCtx.drawImage(this._imgArr[this._currentFrame-1],this._Render_sx,this._Render_sy,this._Render_swidth,this._Render_sheight,this._Render_cx,this._Render_cy,this._Render_width,this._Render_height);
			}else{
				tmpMaskDrawCtx.drawImage(this._imgArr[this._currentFrame-1],this._Render_cx,this._Render_cy,this._Render_width,this._Render_height);
			}

			
			
			gCtx.drawImage(this._maskDraw, 0, 0);
		}
		
	}
	
}
Sprite.prototype.onEnterFrame = function(){  
	//gDB.trace("test onEnterFrame" );
}; 

Sprite.prototype.addChild = function(sub,depth){  
	var obj = new Object();
	obj.sub = sub;
	obj.depth = depth;
	this._waitForAddChildArr.push(obj);
	
	/*
	sub._parent = this;
	this._subArr.push(sub);
	if(depth!=undefined){
		sub.setDepth(depth);
	}
	*/
}; 
Sprite.prototype.removeChild = function(sub){
	var obj = new Object();
	obj.sub = sub;
	this._waitForRemoveChildArr.push(obj);
	/*
	for(var i=0;i<this._subArr.length;i++){
		if(this._subArr[i]==sub){
			this._subArr.splice(i,1);
		}
	}
	*/
}

//操控事件监听机制组

Sprite.prototype._startTouchEvents = function(){
	
	//gDB.trace("_startTouchEvents");
	
	gCanvas.addEventListener("touchstart",this._touchStartRoot,false);
	gCanvas.addEventListener("touchmove",this._touchMoveRoot,false);
	gCanvas.addEventListener("touchend",this._touchEndRoot,false);
	
	this._touchstartArr = [];
	this._touchmoveArr = [];
	this._touchendArr = [];
}
Sprite.prototype._startMouseEvents = function(){

	//gDB.trace("_startMouseEvents");

	gCanvas.addEventListener('mousedown', this._mouseDownRoot, false);
	gCanvas.addEventListener('mousemove', this._mouseMoveRoot, false);
	gCanvas.addEventListener('mouseup', this._mouseUpRoot, false);
	
	this._mousedownArr = [];
	this._mousemoveArr = [];
	this._mouseupArr = [];	
}

Sprite.prototype._touchStartRoot = function(e){
	gRootSprite._xmouse = e.touches[0].pageX - gCanvas.getBoundingClientRect().left;;
	//gRootSprite._ymouse = e.touches[0].pageY - gCanvas.getBoundingClientRect().top;
	
	//gRootSprite._xmouse = e.touches[0].pageX - gCanvas.offsetLeft;
	gRootSprite._ymouse = e.touches[0].pageY - gCanvas.offsetTop;

	
	if(gRootSprite._touchstartArr.length>=1){
		for(var i=0;i<gRootSprite._touchstartArr.length; i++){
			if(gRootSprite._touchstartArr[i]._visible!=false){
				gRootSprite._touchstartArr[i]._touchStartTest(gRootSprite._xmouse,gRootSprite._ymouse);
			}
		}
	}
}
Sprite.prototype._touchMoveRoot = function(e){
	gRootSprite._xmouse = e.touches[0].pageX - gCanvas.getBoundingClientRect().left;;
	//gRootSprite._ymouse = e.touches[0].pageY - gCanvas.getBoundingClientRect().top;
	
	//gRootSprite._xmouse = e.touches[0].pageX - gCanvas.offsetLeft;
	gRootSprite._ymouse = e.touches[0].pageY - gCanvas.offsetTop;
	
	if(gRootSprite._touchmoveArr.length>=1){
		for(var i=0;i<gRootSprite._touchmoveArr.length; i++){
			if(gRootSprite._touchmoveArr[i]._visible!=false){
				gRootSprite._touchmoveArr[i]._touchMoveTest(gRootSprite._xmouse,gRootSprite._ymouse);
			}
		}
	}
}
Sprite.prototype._touchEndRoot = function(e){
	
	if(gRootSprite._touchendArr.length>=1){
		for(var i=0;i<gRootSprite._touchendArr.length; i++){
			if(gRootSprite._touchendArr[i]._visible!=false){
				gRootSprite._touchendArr[i]._touchEndTest(e);
			}
		}
	}
}
Sprite.prototype._mouseDownRoot = function(e){
	gRootSprite._xmouse = e.pageX - gCanvas.getBoundingClientRect().left;
	//gRootSprite._ymouse = e.pageY - gCanvas.getBoundingClientRect().top;
	
	//gRootSprite._xmouse = e.pageX - gCanvas.offsetLeft;
	gRootSprite._ymouse = e.pageY - gCanvas.offsetTop;
	
	if(gRootSprite._mousedownArr.length>=1){
		for(var i=0;i<gRootSprite._mousedownArr.length; i++){
			if(gRootSprite._mousedownArr[i]._visible!=false){
				gRootSprite._mousedownArr[i]._mouseDownTest(gRootSprite._xmouse,gRootSprite._ymouse);
			}
		}
	}
}
Sprite.prototype._mouseMoveRoot = function(e){
	gRootSprite._xmouse = e.pageX - gCanvas.getBoundingClientRect().left;
	//gRootSprite._ymouse = e.pageY - gCanvas.getBoundingClientRect().top;
	
	//gRootSprite._xmouse = e.pageX - gCanvas.offsetLeft;
	gRootSprite._ymouse = e.pageY - gCanvas.offsetTop;
	if(gRootSprite._mousemoveArr.length>=1){
		for(var i=0;i<gRootSprite._mousemoveArr.length; i++){
			if(gRootSprite._mousemoveArr[i]._visible!=false){
				gRootSprite._mousemoveArr[i]._mouseMoveTest(gRootSprite._xmouse,gRootSprite._ymouse);
			}
		}
	}
}
Sprite.prototype._mouseUpRoot = function(e){
	gRootSprite._xmouse = e.pageX - gCanvas.getBoundingClientRect().left;
	//gRootSprite._ymouse = e.pageY - gCanvas.getBoundingClientRect().top;
	
	//gRootSprite._xmouse = e.pageX - gCanvas.offsetLeft;
	gRootSprite._ymouse = e.pageY - gCanvas.offsetTop;
	if(gRootSprite._mouseupArr.length>=1){
		for(var i=0;i<gRootSprite._mouseupArr.length; i++){
			if(gRootSprite._mouseupArr[i]._visible!=false){
				gRootSprite._mouseupArr[i]._mouseUpTest(gRootSprite._xmouse,gRootSprite._ymouse);
			}
		}
	}	
}


Sprite.prototype._touchStartTest = function(x,y,e){
	if(this._testHit(x,y)){
		this._holded = true;
		this.onTouchStart(e);
	}
}
Sprite.prototype._touchMoveTest = function(x,y,e){
	if(this._testHit(x,y)){
		this.onTouchMove(e);
	}
}
Sprite.prototype._touchEndTest = function(e){
	if(this._testHit(gRootSprite._xmouse,gRootSprite._ymouse)){
		this._holded = false;
		this.onTouchEnd(e);
	}else{
		if(this._holded == true){
			this._holded = false;
			this.onTouchEndOutside(e);
		}
	}
}
Sprite.prototype._mouseDownTest = function(x,y,e){
	if(this._testHit(x,y)){
		this._holded = true;
		this.onMouseDown(e);
	}
}
Sprite.prototype._mouseMoveTest = function(x,y,e){
	if(this._testHit(x,y)){
		this.onMouseMove(e);
	}
}
Sprite.prototype._mouseUpTest = function(x,y,e){
	if(this._testHit(x,y)){
		this._holded = false;
		this.onMouseUp(e);
	}else{
		if(this._holded == true){
			this._holded = false;
			this.onMouseUpOutside(e);
		}
	}
}


Sprite.prototype.onTouchStart = function(e){  
	//gDB.trace("onTouchStart");
}; 
Sprite.prototype.onTouchMove = function(e){
	//gDB.trace("onTouchMove");
}
Sprite.prototype.onTouchEnd = function(e){
	//gDB.trace("onTouchEnd");
}
Sprite.prototype.onTouchEndOutside = function(e){
	//gDB.trace("onTouchEndOutside");
}
Sprite.prototype.onMouseDown = function(e){  
	//gDB.trace("onMouseDown");
}; 
Sprite.prototype.onMouseMove = function(e){
	//gDB.trace("onMouseMove");
}
Sprite.prototype.onMouseUp = function(e){
	//gDB.trace("onMouseUp");
}
Sprite.prototype.onMouseUpOutside = function(e){
	//gDB.trace("onMouseUpOutside");
}

//添加及删除各操控事件的方法
Sprite.prototype.addEventMouseDown = function(){
	var havehad = false;
	for(var i=0; i<gRootSprite._mousedownArr.length;i++){
		if(gRootSprite._mousedownArr[i]==this){
			havehad = true;
		}
	}
	if(havehad == false){
		gRootSprite._mousedownArr.push(this);
	}
}
Sprite.prototype.removeEventMouseDown = function(){
	for(var i=0; i<gRootSprite._mousedownArr.length;i++){
		if(gRootSprite._mousedownArr[i]==this){
			gRootSprite._mousedownArr.splice(i,1);
		}
	}
}

Sprite.prototype.addEventMouseMove = function(){
	var havehad = false;
	for(var i=0; i<gRootSprite._mousemoveArr.length;i++){
		if(gRootSprite._mousemoveArr[i]==this){
			havehad = true;
		}
	}
	if(havehad == false){
		gRootSprite._mousemoveArr.push(this);
	}
}
Sprite.prototype.removeEventMouseMove = function(){
	for(var i=0; i<gRootSprite._mousemoveArr.length;i++){
		if(gRootSprite._mousemoveArr[i]==this){
			gRootSprite._mousemoveArr.splice(i,1);
		}
	}
}

Sprite.prototype.addEventMouseUp = function(){
	var havehad = false;
	for(var i=0; i<gRootSprite._mouseupArr.length;i++){
		if(gRootSprite._mouseupArr[i]==this){
			havehad = true;
		}
	}
	if(havehad == false){
		gRootSprite._mouseupArr.push(this);
	}
}
Sprite.prototype.removeEventMouseUp = function(){
	for(var i=0; i<gRootSprite._mouseupArr.length;i++){
		if(gRootSprite._mouseupArr[i]==this){
			gRootSprite._mouseupArr.splice(i,1);
		}
	}
}

Sprite.prototype.addEventTouchStart = function(){
	var havehad = false;
	for(var i=0; i<gRootSprite._touchstartArr.length;i++){
		if(gRootSprite._touchstartArr[i]==this){
			havehad = true;
		}
	}
	if(havehad == false){
		gRootSprite._touchstartArr.push(this);
	}
}
Sprite.prototype.removeEventTouchStart = function(){
	for(var i=0; i<gRootSprite._touchstartArr.length;i++){
		if(gRootSprite._touchstartArr[i]==this){
			gRootSprite._touchstartArr.splice(i,1);
		}
	}
}

Sprite.prototype.addEventTouchMove = function(){
	var havehad = false;
	for(var i=0; i<gRootSprite._touchmoveArr.length;i++){
		if(gRootSprite._touchmoveArr[i]==this){
			havehad = true;
		}
	}
	if(havehad == false){
		gRootSprite._touchmoveArr.push(this);
	}
}
Sprite.prototype.removeEventTouchMove = function(){
	for(var i=0; i<gRootSprite._touchmoveArr.length;i++){
		if(gRootSprite._touchmoveArr[i]==this){
			gRootSprite._touchmoveArr.splice(i,1);
		}
	}
}

Sprite.prototype.addEventTouchEnd = function(){
	var havehad = false;
	for(var i=0; i<gRootSprite._touchendArr.length;i++){
		if(gRootSprite._touchendArr[i]==this){
			havehad = true;
		}
	}
	if(havehad == false){
		gRootSprite._touchendArr.push(this);
	}
}
Sprite.prototype.removeEventTouchEnd = function(){
	for(var i=0; i<gRootSprite._touchendArr.length;i++){
		if(gRootSprite._touchendArr[i]==this){
			gRootSprite._touchendArr.splice(i,1);
		}
	}
}

///////////////////////////////////////////////////////////////////////
Sprite.prototype._testHit = function(x,y){
	//alert("testHit: "+gCanvas.offsetLeft);
	if(x>= this._Render_x + this._Render_cx && x<= this._Render_x + this._Render_cx +this._Render_width && y>=this._Render_y + this._Render_cy && y<= this._Render_y+ this._Render_cy + this._Render_height){
	//if(x>= this._Render_x + this._Render_cx + gCanvas.Left   && x<= this._Render_x + this._Render_cx +this._Render_width + gCanvas.Left && y>=this._Render_y + this._Render_cy + gCanvas.Top && y<= this._Render_y+ this._Render_cy + this._Render_height + gCanvas.Top){
		return true;
	}else{
		return false;
	}
}


// 取得座標
/*
function _getLocalCoords(elem, ev) {
		var ox = 0, oy = 0;
		var first;
		var pageX, pageY;
	 
		while (elem != null) {
			ox += elem.offsetLeft;
			oy += elem.offsetTop;
			elem = elem.offsetParent;
		}
		if (ev.hasOwnProperty('changedTouches')) {
			first = ev.changedTouches[0];
			pageX = first.pageX;
			pageY = first.pageY;
		} else {
			pageX = ev.pageX;
			pageY = ev.pageY;
		}
		return { 'x': pageX - ox, 'y': pageY - oy };
}
*/



/////////////////////////////////////////////////////
//附属类及方法

/*
//---------------------------------------------------
//初始化gRootSprite方法
//---------------------------------------------------
*/
function initRootSprite(canvasID,fps){
	//alert(canvasID);
	_browserTest();
	//_isUC();
	var a_canvas = document.getElementById(canvasID);
	var ctx = a_canvas.getContext("2d");

	//a_canvas.width = 320;
	//a_canvas.height = 374;

	gCtx = ctx;
	gCanvas = a_canvas;

	gRootSprite = new Sprite();
	gRootSprite._width = a_canvas.width;
	gRootSprite._height = a_canvas.height;
	gFps = fps;
	gTimePerFrame = 1000/gFps;
	gRootSprite.IamRoot(gTimePerFrame);
}

/*
//---------------------------------------------------
//继承方法扩展
//---------------------------------------------------
*/
 Function.prototype.extend = function(superClass){  
        if(typeof superClass !== 'function'){  
            throw new Error('fatal error:Function.prototype.extend expects a constructor of class');  
        }  
		var F = function(){}; //创建一个中间函数对象以获取父类的原型对象  
        F.prototype = superClass.prototype; //设置原型对象  
        this.prototype = new F(); //实例化F, 继承父类的原型中的属性和方法，而无需调用父类的构造函数实例化无关的父类成员  
        this.prototype.constructor = this; //设置构造函数指向自己  
        this.superClass = superClass; //同时，添加一个指向父类构造函数的引用，方便调用父类方法或者调用父类构造函数  
          
        return this;  
	}

/*
//---------------------------------------------------
//ImgFrame
//---------------------------------------------------
*/

function ImgFrame(){
	this._src = "";
	this._x = 0;
	this._y = 0;
	this._cx = 0;
	this._cy = 0;
	this._rotation = 0;
	this._alpha = 1;
	this._bw = 1;//宽度放缩比
	this._bh = 1;//高度放缩比
}

ImgFrame.prototype.render = function(parentImgFrame){
	gCtx.translate(this._x+parentImgFrame._x,this._y+parentImgFrame._y);
	gCtx.rotate((this._rotation*Math.PI/180)+parentImgFrame._rotation);
	gCtx.globalAlpha = this._alpha*parentImgFrame._alpha;
	gCtx.drawImage(this._src,parentImgFrame._x-this._cx,parentImgFrame._y-this._cy,this._width*parentImgFrame._bw,this._height*parentImgFrame._bh);
	gCtx.restore();
}

/*
//---------------------------------------------------
//TextSprite
//---------------------------------------------------
*/

function TextSprite(){
		TextSprite.superClass.call(this); 
		this.text = "";
		this.font = "normal 14px tahoma";
		this.fillStyle = '#FFFFFF'; 
		this.textAlign = 'center';  
		
		this._sourceWidth = 0;
		this._sourceHeight = 0;
		
		this._drawContent = function(){
			gCtx.font = this._setFontScale(this.font,this._Render_xscale);
			//gCtx.font = this.font;
			gCtx.fillStyle = this.fillStyle; 
			gCtx.textAlign = this.textAlign;  
			gCtx.fillText(this.text, this._Render_cx,this._Render_cy,this._Render_width);
		}
		this._setFontScale = function(font,scale){
			var tmpFontArr = font.split(" ");
			var size = Math.ceil(Number(tmpFontArr[1].substr(0,tmpFontArr[1].length-2))*scale);
			return tmpFontArr[0] + " " +size +"px "+tmpFontArr[2];
		}
}
TextSprite.extend(Sprite);

/*
//---------------------------------------------------
//ShapeSprite
//---------------------------------------------------
*/

function ShapeSprite(){
		ShapeSprite.superClass.call(this); 

		this._sourceWidth = 0;
		this._sourceHeight = 0;
		this._drawShape = function(){
		
		}
		
		this._drawContent = function(){
			this._drawShape();
		}
		
}
ShapeSprite.extend(Sprite);


/*
//-----------------------------------------------------
//附加浏览器兼容提示，UC浏览器兼容不好
//-----------------------------------------------------
*/

//判断是否为不兼容浏览器
function _browserTest(){
	if(_isUC()){
		alert("This page may not work in your current browser.");
	}
}

//判断是否为UC浏览器
function _isUC(){
	var sUserAgent= navigator.userAgent.toLowerCase();
	var bIsUc7= sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
	var bIsUc= sUserAgent.match(/ucweb/i) == "ucweb";
	var bIsUc2= sUserAgent.match(/ucbrowser/i) == "ucbrowser";
	
	//alert(bIsUc2);
	if(bIsUc7 || bIsUc || bIsUc2){
		return true;
	}else{
		return false;
	}
}

