<ul><?php foreach ($items as $item) { ?>
  <li>
    <?php echo anchor('/item/edit/' . $item->id, icon('pencil')); ?>
    <?php echo $item->title; ?>
  </li>
<?php } ?></ul>

