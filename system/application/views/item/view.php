<div class="story-item" id="<?php echo $item->id; ?>">
    <h3 class="item-title"><img src="<?php echo site_url('images/book.gif'); ?>"> <?php echo $item->title; ?></h3>
    <?php if($item->attachment) { ?><div <?php if (isset($story) && $story->layout == 'scrapbook' && !is_null($item->pos_x)) { ?>
      style="position:absolute; left:<?php echo $item->pos_x; ?>px; top:<?php echo $item->pos_y; ?>;"<?php } ?>
      class="item-attachment">
      <?php echo attachment_view($item->attachment, $item->description, $item->mimetype); ?>
    </div><?php } ?>
    <p><?php echo $item->description; ?></p>
    <div class="story-body"><?php echo nl2br($item->content); ?></div>
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
  <br style="clear:left;">
</div>
