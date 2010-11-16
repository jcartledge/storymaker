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
      <li><input type="checkbox" name="items[]" value="<?php echo $item->id; ?>"><?php echo $item->title; ?></li>
    <?php } ?></ul>
    <input type="submit" value="Add to story">
  </fieldset>
  <!-- new item form here -->
</form>
<div class="edit-story-items">
  <h3><?php echo count($story->items); ?> item<?php if(count($story->items) != 1) echo 's'; ?> in <em><?php echo $story->title; ?></em></h3>
  <?php $this->load->view('item/manage-list', array('items' => $story->items, 'actions' => array('remove'))); ?>
</div>
