$(function() {
  $('.item-title').css('cursor', 'pointer').each(function(){ 
    var content = $($(this).nextAll('.item-stories')[0]);
    $(this).click(function(e){
      content.css({position: 'absolute', top: e.pageY, left: e.pageX }).toggle();
    });
  });
  $('.comments-link')
    .css({position: 'fixed', top: '40%', right: '0px'})
    .html('<img src="' + window.base_url + '/images/comments-tab.png">')
    .after('<div class="comments-container" style="background: white; border-left: 2px solid #BBB; width:400px; height:100%; position:fixed; top:0px; right:-400px; overflow:scroll; "/>')
    .click(function() {
      $(this).css({'z-index': 10000});
      $('.comments-container').css({'z-index': 10000});
      if($(this).css('right') == '0px') {
        $(this).animate({right: '400px'});
        $('.comments-container').animate({right: '0px'});
      } else {
        $(this).animate({right: '0px'});
        $('.comments-container').animate({right: '-400px'});
      }
      return false;
    })
    .show();
  $('.comments-container').load($('.comments-link')[0].href + ' .comments');
  $('.comment-form').live('submit', function() {
    $('.comments').css({opacity: 0.5});
    var f = $('.comment-form');
    $.post(f[0].action, f.serialize(), function(data) {
      $('.comments').replaceWith($(data).find('.comments'));
    });
    return false;
  });
});
