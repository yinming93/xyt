
function enterInfo()
{
	window.setTimeout(function(){enterHome();},0);
	
	var enterHome=function() {
		var myS6=$('.s6-container').s6();
		setTimeout(function(){
			myS6.swipeNext();
		},500);
		s6SlidePlay(myS6);
		
		$('.s6-slide').mousedown(function(event){
			if(s6Timeout){
				clearTimeout(s6Timeout);
				s6Timeout=null;
			}
		});
		
		$('.s6-container')[0].addEventListener('touchmove',removeRotation);
		function removeRotation(){
			$('.s6-container')[0].removeEventListener('touchmove',removeRotation);
			clearTimeout(s6Timeout);
		}
	}
	
	var s6SlidePlay=function(S6){
		var myS6=S6;
		s6Timeout=setTimeout(rotation3d,2000);
	
		function rotation3d(){
			clearTimeout(s6Timeout);
			s6Timeout=setTimeout(rotation3d,2000);
			myS6.swipeNext();
		}
	}
}

jQuery(document).ready(function(e) {
	enterInfo();
})