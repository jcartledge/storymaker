<div class="items">
  <a class="add-item" href="/item/add">Add an item</a>
  <h2>My items</h2>
  <?php echo $this->load->view('item/manage-list', array('items' => $items)); ?>
</div>
<div class="stories">
  <a class="add-story" href="/story/add">Add a story</a>
  <h2>My stories</h2>
  <?php echo $this->load->view('story/manage-list', array('stories' => $stories)); ?>
</div>
