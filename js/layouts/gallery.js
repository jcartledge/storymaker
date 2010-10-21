$(function() {
  $('.story-item a').lightBox();
  var w = 330;
  $('.story-item').each(function() { w += this.offsetWidth + 50; });
  $('body')[0].style.width = w + 'px';
  $('html')[0].style.width = w + 'px';
  $('#content')[0].style.width = w + 'px';
});
