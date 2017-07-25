/* common function */
function hasClass(elements, cName) {
	return !!elements.className.match(new RegExp("(\\s|^)" + cName + "(\\s|$)"));
};
function addClass(elements, cName) {
	if (!hasClass(elements, cName)) {
		elements.className += " " + cName;
	};
};
function removeClass(elements, cName) {
	if (hasClass(elements, cName)) {
		elements.className = elements.className.replace(new RegExp("(\\s|^)" + cName + "(\\s|$)"), " ");
	};
};


var timer;
 
nodes = document.getElementsByClassName("red-dot");

function light(boolen){
	
}

var flag = false
function toggle(){
	if(!flag){
		trigger();
	}else{
		cancel(event);
	}
}

function trigger(){

	light(true);
	flag = true;
	shareFlag = 0;
	
}

function cancel(event){

	light(false);
	flag = false;
	
	setTimeout(function(){
		shareFlag = 1;
	},1000);
	event.preventDefault();
	return true;
}

 
/*  common function */
function ajaxGet(url,callback){	
	var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET",url,true);
    xmlHttp.onreadystatechange= function(){
	    if (xmlHttp.readyState==4 && xmlHttp.status==200){
			callback&&callback(xmlHttp.responseText);                          
	    }		
	}
    xmlHttp.send();
}





function updateRecord(score, data){	
	// var record = {"record":score, "record_data":data};
	// if((recordOrder===1) && (+score >= +reScore)){
	// 	/*updateStorage(data);*/
	// 	 ajaxPost(recordServer,record, function(){
	// 	 	reScore = score;
	// 		setTip();
	// 	 })		
	// }else if(recordOrder===2 ){
	// 	if(!(+reScore) ||  +score <= +reScore){
	// 		/*updateStorage(data);*/
	// 		ajaxPost(recordServer,record, function(){
	// 			reScore = score;
	// 			setTip();
	// 		})			
	// 	}
	// }
} 


 
function commonGameOver(score, propor, data){
	show_score_inform((score*100).toFixed(0))
}
  
function commonMoreGame(){
	// location.href = moreUrl;
}