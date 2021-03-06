<?php $this->load->helper(array('icon', 'item')); ?>
<?php if(!isset($hide_pager)) {
  $data = array('page_size' => $page_size, 'num_items' => $num_items);
  echo $this->load->view('item/pager', $data);
} ?>
<ul><?php foreach ($items as $item) { ?>
  <li<?php if($item->user_id == $this->tank_auth->get_user_id()) echo ' class="your-item"'; ?>>
    <?php if(isset($actions)) foreach($actions as $action) echo item_action($action, $item); ?>
    <small class="item-username"><?php echo $item->username; ?></small>
    <img src="<?php echo attachment_icon($item->mimetype); ?>" title="<?php echo $item->mimetype; ?>">
    <?php echo anchor('/item/view/' . $item->id, $item->title, array('class' => 'item')); ?>
  </li><?php } ?>
  <?php if(!count($items)) { ?><li class="empty">There are no items to display.</li><?php } ?>
</ul>
