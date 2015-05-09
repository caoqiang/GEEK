/**
 * Created by Administrator on 2015/5/2.
 */
//查看
$(".view").click(function(){
    var arr= [];

    //添加遮盖效果
   var maskwidth=$(document).width();
    var maskheight=$(document).height();
    $('<div class="mask"></div>').appendTo($('body'));
    $('div.mask').css({
        'opacity':0.4,
        'background':'#000',
        'position':'absolute',
        'top':0,
        'left':0,
        'width':maskwidth,
        'height':maskheight,
        'z-index':2

    });


    $(this).parent().siblings().each(function(){
        arr.push($(this).text());
    });

    $(".popdiv").show().children().each(function(i){
        $(this).children('span').text(arr[i]);
    });

//关闭
  $('.close').click(function () {
      $(this).parent().hide();
      $('.mask').remove();
  });
})
//删除

    $('a.delete').click(function () {
     $(this).parents('tr').remove();
    });
