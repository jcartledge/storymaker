<h2>Build a story</h2>
<form class="item-search" action="" method="get">
  <input type="search" placeholder="Filter the list of items" name="item-search" value="<?php echo $item_search; ?>">
  <input type="submit" value="Filter">
</form>
<form class="edit-story" action="" method="post">
  <h3>Add items to your story</h3>
    <?php if(count($items) < $num_items) {
      echo $this->load->view('item/pager', array('page_size' => $page_size, 'num_items' => $num_items));
    } ?>
    <ul class="items"><?php foreach($items as $item) {?>
      <li>
        <input type="checkbox" name="items[]" value="<?php echo $item->id; ?>">
        <img src="<?php echo attachment_icon($item->mimetype); ?>" title="<?php echo $item->mimetype; ?>">
        <?php echo anchor('/item/view/' . $item->id, $item->title, array('class' => 'item')); ?>
      </li>
    <?php } ?></ul>
    <input type="submit" value="Add to story">
  <!-- new item form here -->
</form>
<div class="edit-story-items items">
  <h3><?php echo count($story->items); ?> item<?php if(count($story->items) != 1) echo 's'; ?> in <em><?php echo $story->title; ?></em></h3>
  <form class="edit-story-layout" method="post" action="">
    <?php echo form_dropdown('layout', array(
      'narrative' => 'narrative',
      'slideshow' => 'slideshow',
      'shoebox' => 'shoebox',
      'gallery' => 'gallery',
      'scrapbook' => 'scrapbook'
    ), $story->layout);
    ?>
    <input type="submit" value="Set layout">
    <a href="<?php echo site_url('story/layout/' . $story->id); ?>">Choose a layout</a>.
  </form>
  <?php $this->load->view('item/manage-list', array('items' => $story->items, 'actions' => array('remove', 'move'), 'hide_pager' => 1)); ?>
</div>
<script>
$(function(){
  $('.edit-story-layout select').live('change', function(){
    var form = $('.edit-story-layout');
    $.post(form[0].action, form.serialize(), function(data){
      $('.edit-story').replaceWith($(data).find('.edit-story'));
      $('.edit-story-items').replaceWith($(data).find('.edit-story-items'));
      refresh_sortables();
    });
  });
  $('a.item').live('click', function(){
    var self = $(this);
    var container = self.next('.item-preview');
    if(container.length) {
      $('.item-preview').not(container).slideUp();
      container.slideToggle();
    } else {
      self.addClass('loading');
      container = $('<div class="item-preview">');
      container.load(this.href, [], function(){
        $(this).hide().insertAfter(self)
        self.removeClass('loading');
        $('.item-preview').slideUp();
        $(this).slideDown();
        $('.item-attachment a').lightBox();
      });
    }
    return false;
  });
  function refresh_sortables() {
    $('.arrow_up, .arrow_down, .delete, input[type=checkbox], input[type=submit]').remove();
    $('.edit-story ul,').sortable({
      revert: 200,
      connectWith: '.edit-story-items ul'
    });
    $('.edit-story-items ul,').sortable({
      revert: 200,
      connectWith: '.edit-story ul',
      update: function() {
        var data = {
          'items[]': $.makeArray($('.edit-story-items a.item').map(function(){ return this.href.match(/[\d]+$/); })),
          replace: true
        };
        $.post(location.href, data, function(data) {
          $('.edit-story').replaceWith($(data).find('.edit-story'));
          $('.edit-story-items').replaceWith($(data).find('.edit-story-items'));
          refresh_sortables();
        });
      }
    });
  }
  refresh_sortables();
});
</script>
<br>
