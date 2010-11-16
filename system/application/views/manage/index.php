<div class="items">
  <h2>My items</h2>
  <a class="add-item" href="/item/add"><?php echo icon('add'); ?> Add an item</a>
  <?php echo $this->load->view('item/manage-list', array('items' => $items)); ?>
</div>
<div class="stories">
  <h2>My stories</h2>
  <a class="add-story" href="/story/add"><?php echo icon('add'); ?> Add a story</a>
  <?php echo $this->load->view('story/manage-list', array('stories' => $stories)); ?>
</div>
