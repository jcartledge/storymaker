$(function(){
    $('body').append('<div class="loading" style="position:absolute; top:0; left:0; width:100%; height:100%; background-color:#333; opacity:0.9;"><img src="/images/ajax-loader.gif"></div>');
    $('.loading img').centerInClient();
  var ww = $(window).width(), wh = $(window).height();
  $('.item-attachment img').hide().each(function() {
    var el = $(this),
        l = Math.random() * (ww - 500) + 'px',
        t = Math.random() * (wh - 500) + 'px';
    el.css({'position': 'absolute', 'top': t, 'left': l});
    this.src = this.parentNode.href;
  }).addClass('instant');
  $('.item-attachment').draggable({'stack': '.item-attachment'});
  $('.item-attachment a').click(function() { return false; });
});

function instant_done() {
  $('.item-attachment canvas').show();
  $('.loading').fadeOut();
}

