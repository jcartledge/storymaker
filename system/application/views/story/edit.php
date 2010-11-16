<h2>Build a story</h2>
Add items to your story
<form class="item-search" action="/story/edit/<?php echo $story->id; ?>" method="get">
  <input type="search" placeholder="Search for items to add" name="item-search" value="<?php echo $item_search; ?>">
  <input type="submit" value="go">
</form>
<form class="edit-story" action="/story/edit/<?php echo $story->id; ?>" method="post">
  <fieldset>
  <p>
    Showing <?php echo count($items); ?> of 
    <?php echo $num_items; ?> item<?php if($num_items != 1) echo 's'; ?><?php if($item_search) echo " matching <em>{$item_search}</em>"; ?>.
  </p>
    <ul class="items"><?php foreach($items as $item) {?>
      <li><input type="checkbox" name="items[]" value="<?php echo $item->id; ?>"><?php echo $item->title; ?></li>
    <?php } ?></ul>
  </fieldset>
</form>
