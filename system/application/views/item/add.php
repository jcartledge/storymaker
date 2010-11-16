<form class="add-item" action="" method="post">
  <label for="title">Item name</label>
  <?php echo form_error('title'); ?>
  <input name="title" value="<?php echo set_value('title'); ?>">

  <?php echo form_error('type'); ?>

  <label><input type="radio" name="type" value="text">Text</label>
  <div class="text-item">
    <textarea name="content"><?php echo set_value('content'); ?></textarea>
  </div>

  <label><input type="radio" name="type" value="image">Image</label>
  <div class="image-item">
    <label for="image-file">Upload an image</label>
    <?php echo form_error('image-file'); ?>
    <input type="file" name="image-file">
    <p>Or</p>
    <label for="image-url">Link to an image on the web</label>
    <?php echo form_error('image-url'); ?>
  <input name="image-url" value="<?php echo set_value('image-url'); ?>">
  </div>

  <label><input type="radio" name="type" value="document">Document</label>
  <div class="document-item">
    <label for="document-file">Upload a document</label>
    <?php echo form_error('document-file'); ?>
    <input type="file" name="document-file">
  </div>

  <label><input type="radio" name="type" value="video">Video</label>
  <div class="video-item">
    <label for="video-file">Upload a video</label>
    <?php echo form_error('video-file'); ?>
    <input type="file" name="video-file">
    <p>Or</p>
    <label for="video-url">Link to a video on the web</label>
    <?php echo form_error('video-url'); ?>
    <input name="video-url" value="<?php echo set_value('video-url'); ?>">
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

  <input type="submit" value="Add this item">
</form>

<script>
$(function(){
  $('.add-item div').hide();
  $('.add-item input[name=type]').change(function(){
    $('.add-item div').slideUp('fast');
    $('.' + this.value + '-item').slideDown('fast');
  });
});
</script>
