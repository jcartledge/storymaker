<form class="add-story" action="<?php echo site_url('story/add'); ?>" method="post">
  <h2>Build a story</h2>
  <label for="story-title">Give your story a name</label>
  <?php echo form_error('story-title'); ?>
  <input class="long" name="story-title" value="<?php echo set_value('story-title'); ?>">
  <br>
  <label for="story-description">Please provide a brief description of the story</label>
  <?php echo form_error('story-description'); ?>
  <textarea name="story-description"><?php echo set_value('story-description'); ?></textarea>
  <br>
  <input type="submit" value="Next add items to your story">
</form>
