$(function() {
  $('.comments-link').after('<div class="comments-container" style="display:none;"/>').click(function() {
    $('.comments-container').toggle('slide');
    return false;
  });
  $('.comments-container').load($('.comments-link')[0].href + ' .comments');
});
