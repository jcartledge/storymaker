<?php if($story->pages > 1) { ?>
<div class="pager <?php echo $class; ?>">
  <?php if($story->page == 1) { ?>&lt; prev
  <?php } else { ?><a href="<?php echo site_url('story/view/' . $story->id . '/' . ($story->page - 1)); ?>">&lt; prev</a>
  <?php } ?> | <?php echo $story->page . " of " . $story->pages; ?> |
  <?php if($story->page == $story->pages) { ?>next &gt;
  <?php } else { ?><a href="<?php echo site_url('story/view/' . $story->id . '/' . ($story->page + 1)); ?>">next &gt;</a>
  <?php } ?>

</div>
<?php } ?>
