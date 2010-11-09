<ul><?php foreach ($stories as $story) { ?>
  <li>
    <?php echo $story->title; ?>
    [<?php echo anchor('/story/view/' . $story->id, 'view'); ?>]
    [<?php echo anchor('/story/edit/' . $story->id, 'edit'); ?>]
  </li>
<?php } ?></ul>

