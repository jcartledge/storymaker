<?php $this->load->helper(array('icon', 'item')); ?>
<ul><?php foreach ($items as $item) { ?>
  <li>
    <?php if(isset($actions)) foreach($actions as $action) echo item_action($action, $item); ?>
    <?php echo $item->title; ?>
  </li>
<?php } ?></ul>

