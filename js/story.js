$(function() {
  $('.comments-link').prepend('Show ').after('<div class="comments-container" style="display:none;"/>').click(function() {
    $('.comments-container').toggle('slide');
    var l = $('.comments-link').html();
    l = (l.match(/^Show/)) ? l.replace(/^Show/, 'Hide') : l.replace(/^Hide/, 'Show');
    $('.comments-link').html(l);
    return false;
  });
  $('.comments-container').load($('.comments-link')[0].href + ' .comments');
  $('.comment-form').live('submit', function() {
    var f = $('.comment-form')[0];
    $.post(f.action, $(f).serialize(), function(data) {
      $('.comments-container').html(data);
    });
    return false;
  });
});
