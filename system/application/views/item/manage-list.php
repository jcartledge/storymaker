<ul><?php foreach ($items as $item) { ?>
  <li>
    <?php echo $item->title; ?>
    [<?php echo anchor('/item/edit/' . $item->id, 'edit'); ?>]
  </li>
<?php } ?></ul>

