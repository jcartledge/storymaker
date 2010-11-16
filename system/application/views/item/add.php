<form class="add-item" action="" method="post">
  <label for="title">Item name</label>
  <?php echo form_error('title'); ?>
  <input name="title" value="<?php echo set_value('title'); ?>">

  <?php echo form_error('type'); ?>

  <label><input type="radio" name="type" <?php if($type == 'text') echo 'checked="checked" '; ?>value="text">Text</label>
    <?php echo form_error('content'); ?>
    <div class="<?php if($type == 'text') echo 'open-at-start '; ?>text-item">
    <textarea name="content"><?php echo set_value('content'); ?></textarea>
  </div>

  <label><input type="radio" name="type" <?php if($type == 'image') echo 'checked="checked" '; ?>value="image">Image</label>
  <div class="<?php if($type == 'image') echo 'open-at-start '; ?>image-item">
    <?php echo form_error('image-url'); ?>
    <label for="image-url">Link to an image on the web</label>
    <input name="image-url" value="<?php echo set_value('image-url'); ?>">
    <p>Or</p>
    <label for="image-file">Upload an image</label>
    <input type="file" name="image-file">
  </div>

  <label><input type="radio" name="type" <?php if($type == 'document') echo 'checked="checked" '; ?>value="document">Document</label>
  <div class="<?php if($type == 'document') echo 'open-at-start '; ?>document-item">
    <?php echo form_error('document-file'); ?>
    <label for="document-file">Upload a document</label>
    <input type="file" name="document-file">
  </div>

  <label><input type="radio" name="type" <?php if($type == 'video') echo 'checked="checked" '; ?>value="video">Video</label>
  <div class="<?php if($type == 'video') echo 'open-at-start '; ?>video-item">
    <?php echo form_error('video-url'); ?>
    <label for="video-url">Link to a video on the web</label>
    <input name="video-url" value="<?php echo set_value('video-url'); ?>">
    <p>Or</p>
    <label for="video-file">Upload a video</label>
    <input type="file" name="video-file">
  </div>

  <h3>Themes for this item</h3>
  <p>Please select one or more of the following themes:</p>
  <fieldgroup class="themes">
    <?php if(isset($themes)) foreach($themes as $theme) { ?><label>
    <input type="checkbox" name="themes[]" value="<?php echo $theme; ?>"><?php echo $theme; ?>
    </label><?php } ?><p>&nbsp;</p>
  </fieldgroup>
  <p>or enter your own themes separated by commas:</p>
  <input name="themes[]">

  <?php if(isset($story)) { ?><input type="hidden" name="story_id" value="<?php echo $story->id; ?>"><?php } ?>
  <input type="submit" value="Add this item">
</form>

<script>
$(function(){
  $('.add-item div').not('.open-at-start').hide();
  $('.add-item input[name=type]').change(function(){
    $('.add-item div').slideUp('fast');
    $('.' + this.value + '-item').slideDown('fast');
  });
});
</script>
