Zepto(function($){
  /* load start */
  addEventListener('load', function(){ setTimeout(function(){
      window.scrollTo(0,1);}, 0); 
      //首页幻灯
      var inSlider=$('#J_inSlider');
      var indexMenuShort=$('.index-menu .short img');
      var indexMenuUpH=$('.index-menu li,.index-menu .long img');
      //视窗改变
      if(inSlider.size()>0){
          inSlider.height(inSlider.width()/1.575);
          inSlider.slider();
      }
      //更新菜单高度
      var indexShortH=indexMenuShort.height();
      indexMenuUpH.height(indexShortH);

  }, false);
  //通用导航显示隐藏
  var baseNav=$('.plug-menu');
  baseNav.click(function(){
    var span = $(this).find('span');
    if(span.attr('class') == 'open'){
            span.removeClass('open');
            span.addClass('close');
            $('.plug-btn').removeClass('open');
            $('.plug-btn').addClass('close');
    }else{
            span.removeClass('close');
            span.addClass('open');
            $('.plug-btn').removeClass('close');
            $('.plug-btn').addClass('open');
    }
  });
  baseNav.on('touchmove',function(event){event.preventDefault();});
  //项目详情页，展开更多
  var projecDMore=$('.superpage a.more');
 
  projecDMore.click(function(){
	  
	  //if($(this).attr('key')==null){return;}
	  var projectDIntro=$('#J_detailContent'+$(this).attr('key')+' .intro');
      var projectDTxt=$('#J_detailContent'+$(this).attr('key')+' .txt');
      
	  if($(this).hasClass('more-click')){
      
      $(this).removeClass('more-click').html('更多<span></span>');
      projectDIntro.show();
      projectDTxt.hide();
    }else{
      $(this).addClass('more-click').html('收起<span></span>');
      projectDIntro.hide();
      projectDTxt.show();
    }
  });
  

  /* load end */
});