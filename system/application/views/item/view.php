<div class="story-item">
  <div id="<?php echo $item->id; ?>" class="item-page-<?php echo $page; ?>">
    <h3 class="item-title">
      <img src="/images/book.gif"> <?php echo $item->title; ?>
    </h3>

    <?php if($item->attachment) { ?><div class="item-attachment">
      <?php echo attachment_view($item->attachment, $item->description, $item->mimetype); ?>
    </div><?php } ?>

    <p><?php echo $item->description; ?></p>

    <?php echo nl2br($item->content); ?>

    <?php if($item->year) { ?><dl class="item-year">
      <dt>Year: </dt>
      <dd><?php echo $item->year; ?></dd>
    </dl><?php } ?>
    <?php if($item->country) { ?><dl class="item-country">
      <dt>Country: </dt>
      <dd><?php echo $item->country; ?></dd>
    </dl><?php } ?>
    <?php if($item->place) { ?><dl class="item-place">
      <dt>Place: </dt>
      <dd><?php echo $item->place; ?></dd>
    </dl><?php } ?>   
  </div>
</div>
