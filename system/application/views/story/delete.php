<h2>Delete <em><?php echo $story->title; ?></em>?</h2>
<p>Do you really want to delete this story? You won't be able to get it back!</p>
<form method="post" class="delete-story">
  <input type="hidden" name="url" value="<?php echo $url; ?>"/>
  <a href="<?php echo $url; ?>">Cancel</a>
  <input style="display:inline;" type="submit" value="Delete"/>
</form>
