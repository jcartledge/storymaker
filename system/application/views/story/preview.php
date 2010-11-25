<div class="story-preview" id="<?php echo $story->id; ?>">
  <p class="story-title"><strong><?php echo $story->title; ?></strong></p>
  <p class="story-owner"> Author: <em><?php echo $story->username; ?></em></p>
  <p class="story-description"><?php echo $story->description; ?></p>
  <a href="<?php echo site_url('story/view/' . $story->id); ?>">View story</a>
</div>
