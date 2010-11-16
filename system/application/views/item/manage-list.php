<?php $this->load->helper(array('icon', 'item')); ?>
<ul><?php foreach ($items as $item) { ?>
  <li>
    <?php if(isset($actions)) foreach($actions as $action) echo item_action($action, $item); ?>
    <img src="<?php echo attachment_icon($item->mimetype); ?>" title="<?php echo $item->mimetype; ?>">
    <?php echo anchor('/item/view/' . $item->id, $item->title, array('class' => 'item')); ?>
  </li>
<?php } ?></ul>

