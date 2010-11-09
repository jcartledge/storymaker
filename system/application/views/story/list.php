<?php if(isset($h2)) { ?><h2><?php echo $h2; ?></h2><?php } ?>
<ul><?php foreach ($stories as $story) { ?>
  <li>
    <p><?php echo anchor('/story/view/' . $story->id, $story->title); ?> [<?php echo $story->username . ' - ' . $story->layout; ?>]</p>
    <?php echo $story->description; ?>
  </li>
<?php } ?></ul>

