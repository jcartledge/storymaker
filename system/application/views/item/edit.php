<h2>Edit <em><?php echo $item->title; ?></em></h2>
<p>Required fields are marked with a <span class="required">*</span>.</p>
<form class="edit-item" action="" method="post" enctype="multipart/form-data">

  <label for="title">Edit the item's name <span class="required">*</span></label>
  <?php echo form_error('title'); ?>
  <input class="long" name="title" value="<?php echo set_value('title', $item->title); ?>"><br>

  <label for="description">Edit the description <span class="required">*</span></label>
  <?php echo form_error('description'); ?>
  <textarea name="description"><?php echo set_value('description', $item->description); ?></textarea><br>

  <?php if($item->type == 'text') { ?>
  <input type="hidden" name="type" value="text">
  <?php echo form_error('content'); ?>
  <div class="<?php if($type == 'text') echo 'open-at-start '; ?>text-item">
    <textarea name="content"><?php echo set_value('content', $item->content); ?></textarea>
  </div>
  <?php } ?>

  <?php if($item->type == 'image') { ?>
  <input type="hidden" name="type" value="image">
  <div class="image-item">
    <?php echo attachment_view($item->attachment, $item->description, $item->mimetype); ?>
    <?php echo form_error('image-url'); ?>
    <label for="image-file">Upload a new image</label>
    <input type="file" name="image-file">
    <br>
    <label for="image-url">Or link to an image on the web</label>
    <input class="long" name="image-url" value="<?php echo set_value('image-url'); ?>">
  </div>
  <?php } ?>

  <?php if($item->type == 'document') { ?>
  <input type="hidden" name="type" value="document">
  <div class=">document-item">
    <?php echo attachment_view($item->attachment, $item->description, $item->mimetype); ?>
    <?php echo form_error('document-file'); ?>
    <label for="document-file">Upload a document</label>
    <input type="file" name="document-file">
  </div>
  <?php } ?>

  <?php if($item->type == 'video') { ?>
  <input type="hidden" name="type" <?php if($type == 'video') echo 'checked="checked" '; ?>value="video">Video</label>
  <div class="video-item">
    <?php echo attachment_view($item->attachment, $item->description, $item->mimetype); ?>
    <?php echo form_error('video-url'); ?>
    <label for="video-file">Upload a new video</label>
    <input type="file" name="video-file">
    <br>
    <label for="video-url">Or link to a video on the web.</label>
    <p>This works for youtube and vimeo.<br>Paste the URL of the page containing the video here:</p>
    <input class="long" name="video-url" value="<?php echo set_value('video-url'); ?>">
  </div>
  <?php } ?>

  <h3>Year, country, place</h3>
  <?php echo form_error('year'); ?>
  <?php echo form_error('country'); ?>
  <div class="year-field">
    <label for="year">Year</label>
    <input class="year" name="year" value="<?php echo set_value('year', $item->year); ?>">
  </div>
  <div class="country-field">
    <label for="country">Country</label>
    <input class="country" name="country" value="<?php echo set_value('country', $item->country); ?>">
  </div>
  <br>
  <?php echo form_error('place'); ?>
  <div class="place-field">
    <label for="place">Place</label>
    <input class="place long" name="place" value="<?php echo set_value('place', $item->place); ?>">
  </div>
  <br>

  <!--
  <h3>Themes for this item</h3>
  <?php $has_themes = (isset($themes) && count($themes)); if($has_themes) { ?>
  <fieldgroup class="themes">
    <p>Please select one or more of the following themes:</p>
    <?php foreach($themes as $theme) { ?><label>
    <input type="checkbox" name="themes[]" value="<?php echo $theme; ?>"><?php echo $theme; ?>
    </label><?php } ?><p>&nbsp;</p>
  </fieldgroup>
  <?php } ?>
  <p><?php if($has_themes) { ?>Or enter your own<?php } else { ?>Enter some<?php } ?> themes separated by commas:</p>
  <input class="long" name="themes[]">
  -->

  <br>
  <input type="submit" value="Save changes">
</form>

<script>
$(function(){
  $('.year').autocomplete({source: '/item/years'});
  $('.country').autocomplete({source: '/item/countries'});
  $('.place').autocomplete({source: '/item/places'});
});
</script>
