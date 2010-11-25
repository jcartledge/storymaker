<form class="search-form" action="<?php echo site_url('story/search'); ?>" method = "get">
  <input type="search" placeholder="Search" value="<?php echo isset($search) ? $search : ''; ?>" name="q">
  <input type="submit" value="Go">
</form>
