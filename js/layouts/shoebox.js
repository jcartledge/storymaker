$(function(){
  var ww = $(window).width(), wh = $(window).height();
  $('.item-attachment img').each(function() {
    var el = $(this),
        w = el.width(), h = el.height(),
        l = Math.random() * (ww - w) + 'px',
        t = Math.random() * (wh - h) + 'px';
    el.css({'position': 'absolute', 'top': t, 'left': l});
    this.src = this.parentNode.href;
  }).addClass('instant');
});
