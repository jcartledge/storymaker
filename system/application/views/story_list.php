<ul><?php foreach ($stories as $story) { ?>
  <li>
    <p><?php echo anchor('/story/view/' . $story->id, $story->title); ?> [<?php echo $story->username; ?>]</p>
    <?php echo $story->description; ?>
  </li>
<?php } ?></ul>

