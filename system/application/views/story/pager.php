<?php if($story->pages > 1) { ?>
<div class="pager">
<?php foreach(range(1, $story->pages) as $page) { ?>
  <span class="pager-link"><?php if($page == $story->page) {
    echo $page;
  } else {
    echo anchor(sprintf('/story/view/%d/%d', $story->id, $page), $page);
  } ?></span>
<?php } ?>
</div>
<?php } ?>
