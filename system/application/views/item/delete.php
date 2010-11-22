<h2>Delete <em><?php echo $item->title; ?></em>?</h2>
<p>The item <em><?php echo $item->title; ?></em> is used in <?php echo $item->num_stories == 1 ? '1 story' : $item->num_stories . ' stories'; ?>.</p>
<form method="post" class="delete-item">
  <input type="hidden" name="url" value="<?php echo $url; ?>"/>
  <a href="<?php echo $url; ?>">Cancel</a>
  <input style="display:inline;" type="submit" value="Delete"/>
</form>
