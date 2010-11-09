<form class="add-story" action="/story/add" method="post">
  <h2>Build a story</h2>
  Give your story a name
  <fieldset>
    <label for="story-title">Story title</label>
    <?php echo form_error('story-title'); ?>
    <input name="story-title" value="<?php echo set_value('story-title'); ?>">
    <label for="story-description">About this story</label>
    <?php echo form_error('story-description'); ?>
    <textarea name="story-description"><?php echo set_value('story-description'); ?></textarea>
  </fieldset>
  <input type="submit" value="Next add items to your story">
</form>
