$(function() {
  $('.item-attachment img').each(function() { this.src = this.parentNode.href; });
});
