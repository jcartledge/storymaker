<?php echo form_open('/story/search', array('method' => 'get')); ?>
  Search: <?php echo form_input('q', isset($search) ? $search : ''); ?>
  <?php echo form_submit('search', 'Go'); ?>
<?php echo form_close(); ?>
