<?php $this->load->helper(array('icon', 'item')); ?>
<?php if(!isset($hide_pager) && count($items) && (count($items) < $num_items)) {
  $data = array('page_size' => $page_size, 'num_items' => $num_items);
  if(isset($username)) $data['username'] = $username;
  echo $this->load->view('item/pager', $data);
} ?>
<ul><?php foreach ($items as $item) { ?>
  <li>
    <?php if(isset($actions)) foreach($actions as $action) echo item_action($action, $item); ?>
    <img src="<?php echo attachment_icon($item->mimetype); ?>" title="<?php echo $item->mimetype; ?>">
    <?php echo anchor('/item/view/' . $item->id, $item->title, array('class' => 'item')); ?>
  </li><?php } ?>
</ul>
<?php if(!count($items)) { ?><p>You don't have any items yet.</p><?php } ?>

