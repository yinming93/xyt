// JavaScript Document
$(function(){
	var ww = $('.ibox').width();
	$('.ibox').height(ww/640*757);
	
	var i = 0;
	var len = $('.ibox img').length;
	setInterval(function(){
		i++;
		if(i > (len-1)){
			i = 0;
		}
		$('.ibox img').eq(i).animate({opacity:1},800).siblings('img').animate({opacity:0},500);
	},3000)
})

/* 导航 */
$(function(){
	
	/* 设置高 */
	var ww = $('body').width();
	var bfb = 757*(ww/640);
	$('.dhm').height(bfb);
	
	/* 加载时显示导航 */
	//dhshow();
		/* 自动隐藏导航 */
	setTimeout(function(){dhhide();},2000)
	/* 点击显示 */
	$('.dh,.mdh').live('click',function(){dhshow();})
	/* 点击隐藏 */
	$('.dhgb').click(function(){dhhide();})
	/* 导航显示 */
	function dhshow(){
		/* 导航高度大于屏幕高度可以滚动 */
		//touch();
		/* 获取滚动条位置 */
		//sllt = document.body.scrollTop;
		/* 禁用滚动条 */
		var idx = $('#footer').attr('_idx');
		$('.dhbox').find('li').eq(idx).addClass('cur').siblings('li').removeClass('cur');
		
		$('.dhm').css({'display':'block','z-index':99});
		var i = 0;
		var st = setInterval(function(){
			i++;
			if(i == 1000 || (1*i) == 100){
				
				clearInterval(st);
				$('.dhgb').css('display','block');
			}
			$('.dhbox').css('height',(1*i)+'%');
			$('.zlian').css('top',(1*i)+'%')
		},1)
	}
	/* 导航隐藏 */
	function dhhide(){
		var i = 0;
		var st = setInterval(function(){
			i++;
			if(i == 1000 || (1*i) == 100){
				clearInterval(st);
				$('.dhm').css('z-index','2');
			}
			$('.dhbox').css('height',100-(1*i)+'%');
			$('.zlian').css('top',97-(1*i)+'%')
		},1)
	}
	/* 导航滑动*/

	var _this = $('.zlian');
	_this[0].ontouchstart = function(e){
		
		var dhbox = $('.dhbox').height();
		if(dhbox > 0) { dhhide(); }
		else { dhshow(); }
		e.preventDefault();
	}
	/* 导航滑动
	function touch(){
		var _this = $('.dhm');
		var h = _this.height();
		var wh = $(window).height();
		_this.attr("translateY","0")
		//导航高大于 屏幕高 可以滑动
			
			_this[0].ontouchstart = function(e){
				
				var t = $(this).attr('translateY') - 0;
				var disy = e.touches[0].pageY - t;
				var y = 0;
				
				this.ontouchmove = function(e){
					
					y = e.touches[0].pageY;
					var top = y - disy;
					
						if(top > 0)top = 0;
						if(top < h-wh) top = h-wh;
						$(this).css("-webkit-transition-duration","0").css("-webkit-transform","translateY("+top+"px)").attr({"translateY":top});
					
					e.stopPropagation();	
				}
				e.stopPropagation();
			}
			
	} */
})