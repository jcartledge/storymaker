$(function(){
    $('body').append('<div class="loading" style="position:absolute; top:0; left:0; width:100%; height:100%; background-color:#333; opacity:0.9;"><img src="/images/ajax-loader.gif"></div>');
    $('.loading img').centerInClient();
  var ww = $(window).width(), wh = $(window).height();
  $('.item-attachment img').hide().each(function() {
    var el = $(this);
    this.src = this.parentNode.href;
  }).addClass('instant');
  $('.item-attachment').draggable({
    stack: '.item-attachment',
    stop: function(event, ui) {
      var ia = $(this),
          data = {
            story_id: $('.story')[0].id,
            item_id:  ia.parent('.story-item')[0].id,
            pos_x:    ia.offset()['left'],
            pos_y:    ia.offset()['top']
          };
      ia.css({opacity: 0.5});
      $.get('/item/position', data, function() { ia.css({opacity: 1.0}); });
    }
  });
  $('.item-attachment a').click(function() { return false; });
});

function instant_done() {
  $('.item-attachment canvas').show();
  $('.loading').fadeOut();
}
