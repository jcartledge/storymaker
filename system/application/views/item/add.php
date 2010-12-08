<h2>Add an item</h2>
<?php if($story) { ?><p>This item will be added to the story <em><?php echo $story->title; ?></em><?php } ?>
<p>Required fields are marked with a <span class="required">*</span>.</p>
<form class="add-item" action="" method="post" enctype="multipart/form-data">
  <label for="title">Name the item <span class="required">*</span></label>
  <?php echo form_error('title'); ?>
  <input class="long" name="title" value="<?php echo set_value('title'); ?>"><br>

  <label for="description">Describe the item <span class="required">*</span></label>
  <?php echo form_error('description'); ?>
  <textarea name="description"><?php echo set_value('description'); ?></textarea><br>

  <?php echo form_error('type'); ?>

  <p>Choose the type of item <span class="required">*</span></p>
  <label><input type="radio" name="type" <?php if($type == 'text') echo 'checked="checked" '; ?>value="text">Text</label>
  <?php echo form_error('content'); ?>
  <div class="<?php if($type == 'text') echo 'open-at-start '; ?>text-item">
    <p>Enter or paste the item text below</p>
    <textarea name="content"><?php echo set_value('content'); ?></textarea>
  </div>

  <label><input type="radio" name="type" <?php if($type == 'image') echo 'checked="checked" '; ?>value="image">Image</label>
  <div class="<?php if($type == 'image') echo 'open-at-start '; ?>image-item">
    <?php echo form_error('image-url'); ?>
    <label for="image-file">Upload an image</label>
    <input type="file" name="image-file">
    <br>
    <label for="image-url">Or link to an image on the web</label>
    <input class="long" name="image-url" value="<?php echo set_value('image-url'); ?>">
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
    <label for="video-file">Upload a video</label>
    <input type="file" name="video-file">
    <br>
    <label for="video-url">Or link to a video on the web.</label>
    <p>This works for youtube and vimeo.<br>Paste the URL of the page containing the video here:</p>
    <input class="long" name="video-url" value="<?php echo set_value('video-url'); ?>">
  </div>

  <h3>Year, country, place</h3>
  <?php echo form_error('year'); ?>
  <?php echo form_error('country'); ?>
  <div class="year-field">
    <label for="year">Year</label>
    <input class="year" name="year" value="<?php echo set_value('year'); ?>">
  </div>
  <div class="country-field">
    <label for="country">Country</label>
    <input class="country" name="country" value="<?php echo set_value('country'); ?>">
  </div>
  <br>
  <?php echo form_error('place'); ?>
  <div class="place-field">
    <label for="place">Place</label>
    <input class="place long" name="place" value="<?php echo set_value('place'); ?>">
  </div>
  <br>

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
  <br>
  <?php if($story) { ?><input type="hidden" name="story_id" value="<?php echo $story->id; ?>"><?php } ?>
  <input type="submit" value="Add this item">
</form>

<script>
$(function(){
  $.fn.fix_radios = function() {
    function focus() {
      // if this isn't checked then no option is yet selected. bail
      if ( !this.checked ) return;
      // if this wasn't already checked, manually fire a change event
      if ( !this.was_checked ) {
        $( this ).change();
      }
    }

    function change( e ) {
      // shortcut if already checked to stop IE firing again
      if ( this.was_checked ) {
        e.stopImmediatePropagation();
        return;
      }
      // reset all the was_checked properties
      $( "input[name=" + this.name + "]" ).each( function() {
        this.was_checked = this.checked;
      } );
    }
    // attach the handlers and return so chaining works
    return this.focus( focus ).change( change );
  }
  // attach it to all radios on document ready
  $( "input[type=radio]" ).fix_radios();
  var item_divs = $('div.text-item, div.image-item, div.document-item, div.video-item')
    item_divs.not('.open-at-start').hide();
  $(':radio').change(function(){
    item_divs.slideUp('fast');
    $('.' + this.value + '-item').slideDown('fast');
  });
  $('.year').autocomplete({source: ["1981", "1982", "1983"]});
  $('.country').autocomplete({source: '/teachingmen/item/countries'});
  $('.place').autocomplete({source: '/teachingmen/item/places'});
});
</script>
