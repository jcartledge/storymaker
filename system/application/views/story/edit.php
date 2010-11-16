<h2>Build a story</h2>
Add items to your story
<form class="item-search" action="" method="get">
  <input type="search" placeholder="Search for items to add" name="item-search" value="<?php echo $item_search; ?>">
  <input type="submit" value="go">
</form>
<form class="edit-story" action="" method="post">
  <fieldset>
  <p>
    Showing <?php echo count($items); ?>
    of <?php echo $num_items; ?>
    item<?php if($num_items != 1) echo 's'; ?><?php if($item_search) echo " matching <em>{$item_search}</em>"; ?>.
  </p>
    <ul class="items"><?php foreach($items as $item) {?>
      <li><input type="checkbox" name="items[]" value="<?php echo $item->id; ?>"><?php echo $item->title; ?></li>
    <?php } ?></ul>
  </fieldset>
  <!-- new item form here -->
  <input type="submit" value="Add to story">
</form>
<div class="story-items">
  <h3>Items in '<?php echo $story->title; ?>'</h3>
  <?php $this->load->view('item/manage-list', array('items' => $story->items)); ?>
</div>
