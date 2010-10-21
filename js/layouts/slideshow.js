$(function() {
  $('.item-attachment img').each(function() { this.src = this.parentNode.href; });
  $('.story-items')
    .before('<a href="" class="prev">previous</a> <a href="" class="next">next</a>')
    .cycle({ prev: '.prev', next: '.next', pause: true, timeout: 15000 });
});
