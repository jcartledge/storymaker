<h2>Build a story</h2>
<form class="item-search" action="" method="get">
  <input type="search" placeholder="Search for items to add" name="item-search" value="<?php echo $item_search; ?>">
  <input type="submit" value="go">
</form>
<form class="edit-story" action="" method="post">
  <fieldset>
  <h3>Add items to your story</h3>
  <p>
    Showing <?php echo count($items); ?>
    of <?php echo $num_items; ?> unused
    item<?php if($num_items != 1) echo 's'; ?><?php if($item_search) echo " matching <em>{$item_search}</em>"; ?>.
  </p>
    <ul class="items"><?php foreach($items as $item) {?>
      <li>
        <input type="checkbox" name="items[]" value="<?php echo $item->id; ?>">
        <img src="<?php echo attachment_icon($item->mimetype); ?>" title="<?php echo $item->mimetype; ?>">
        <?php echo anchor('/item/view/' . $item->id, $item->title, array('class' => 'item')); ?>
      </li>
    <?php } ?></ul>
    <input type="submit" value="Add to story">
  </fieldset>
  <!-- new item form here -->
</form>
<div class="edit-story-items">
  <h3><?php echo count($story->items); ?> item<?php if(count($story->items) != 1) echo 's'; ?> in <em><?php echo $story->title; ?></em></h3>
  <?php $this->load->view('item/manage-list', array('items' => $story->items, 'actions' => array('remove', 'move'))); ?>
</div>
<script>
$(function(){
  $('a.item').click(function(){
    var self = $(this);
    var container = self.next('.item-preview');
    if(container.length) {
      self.toggleClass('open');
      container.slideToggle();
    } else {
      self.addClass('loading');
      container = $('<div class="item-preview" visibility="hidden">');
      container.insertAfter(self).load(this.href, [], function(){
        self.removeClass('loading');
        self.addClass('open');
        container.slideDown('slow');
      });
    }
    return false;
  });
});
</script>
