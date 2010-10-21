<form class="search-form" action="/story/search" method = "get">
  <input type="search" placeholder="Search" value="<?php echo isset($search) ? $search : ''; ?>" name="q">
  <input type="submit" value="Go">
</form>
