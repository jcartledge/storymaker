<ul><?php foreach ($stories as $story) { ?>
  <li>
    <?php echo anchor('/story/edit/' . $story->id, icon('pencil')); ?>
    <?php echo anchor('/story/view/' . $story->id, $story->title); ?>
  </li>
<?php } ?></ul>

