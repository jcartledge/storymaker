<h2>Build a story</h2>
Add items to your story
<form class="item-search">
</form>
<?php echo $this->load->view('/story/edit/')
<form class="edit-story" action="/story/edit/<?php echo $story->id; ?>" method="post">
  <fieldset>
    <ul class="items"><?php foreach($items as $item) {?>
      <li><input type="checkbox" name="items[]" value="<?php echo $item->id; ?>"><?php echo $item->title; ?></li>
    <?php } ?></ul>
  </fieldset>
</form>
