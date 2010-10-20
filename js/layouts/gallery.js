$(function() {
  $('.story-item a').lightBox();
  var w = 100;
  $('.story-item').each(function() { w += this.offsetWidth + 20; });
  $('body')[0].style.width = w + 'px';
  $('html')[0].style.width = w + 'px';
  $('#content')[0].style.width = w + 'px';
});
