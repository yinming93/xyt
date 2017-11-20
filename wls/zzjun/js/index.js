		// 地区按钮点击
	$(".anniu").on('click',function(){
		$(this).siblings().css('display','block');
		$(this).parent().siblings().children().css('display','none');
		$('.anniu').css('display','block');
		// 地区按钮点击变色
		$(this).css('display','none');
		$(this).next().css('display','block');
		// 点击地区的时候，子分类样式全部清空
		$(this).parent().siblings().children().css('background','none');
		$(this).parent().siblings().children().css('color','white');

	})
		// 子区域点击变色
	$("span").on('click',function(){
		$(this).css('background','red');
		$(this).css('color','white');
		$(this).siblings().css('background','none');
		$(this).siblings().css('color','black');
	})

	// 子区域点击显示对应分类
	$('span').on('click',function(){
		t = $(this).attr("q");
		// alert(t);
		$('.'+t).parent().siblings().children().css('display','none');
		$('.'+t).css('display','block');

	})