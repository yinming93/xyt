/* 播放视频 */
$(function(){
	$('.pf').click(function(){
		
		var src = $(this).attr('_data');
		var hstr = '<iframe class="vid_box" src="'+src+'" frameborder="0" height="0" width="0" style="width:100%; 	height:100%;"></iframe>';
		$('.video').append(hstr);
	})
})
$(function(){
	$('.txti img').eq(1).css('margin-top','-5px');
	/* 加载公用html头部 尾部 */
	$('.main').load('header.html');
	$('#footer').load('footer.html');
	$('#botton').load('botton.html',function(){
		
		var idx = $(this).attr('_idx');
		if(typeof idx != 'undefined'){
			
			$('.botton').find('li').eq(idx).addClass('cur').siblings('li').removeClass('cur');
		}
	});
})

$(function(){
	var reg_tel = /^(1[3|4|5|8][0-9]\d{4,8})|((([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?)$/;//电话或手机
	$('.btn').click(function(){
		var name = $('.name').val();
		var tips = $('.tel').val();
		var zx = $('.zx').val();
		
		var _ts = $('.t_txt');

		var fla = true;
		
		if(name == '请输入您姓名' || tips == '请输入您的联系方式' || zx == '请输入您要咨询的问题以及疑问'){
			_ts.html('信息不能为空');
			fla = false;
		}else{
			if(!reg_tel.test(tips)){
				_ts.html('电话号码格式不正确');
				fla = false;
			}
			if(fla){
				_ts.html('');
				var postdata = 'name='+name+'&tel='+tips+'&zx='+zx;
				$.ajax({
					url:"php/demo.php",
					type:"POST",
					data:postdata,
					success:function(data){
						var s_html = '<div id="ts" class="ts"></div>';
						$('body').append(s_html);
						var str = '';
						if(data==1){
							str = '恭喜！您已成功报名！';
						} else {
							str = '提交失败请重试！';
						}
						$('.ts').html(str);
						$('#ts').animate({top:'50%',opacity:1,'z-index':99999999},800,function(){
							$('.name').val('请输入您姓名');
							$('.tel').val('请输入您的联系方式');
							$('.zx').val('请输入您要咨询的问题以及疑问');
							setTimeout(function(){
								$('.ts').remove();
							},1000)
						});		
					}
				});
			}
		}
	})
	/* 去掉文本框默认文字 */
	$('.djb input,.djb textarea').focus(function(){
		
		var df = $(this).attr('defualt');
		if($(this).val() == df){
			$(this).val('');
		}
		
	})
	$('.djb input,.djb textarea').blur(function(){
		
		var df = $(this).attr('defualt');
		if($(this).val() == ''){
			$(this).val(df);
		}
	})
})