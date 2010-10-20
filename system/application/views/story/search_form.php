<form class="search-form" action="/story/search" method = "get">
  Search: <input type="search" value="<?php echo isset($search) ? $search : ''; ?>" name="q">
  <input type="submit" value="Go">
</form>
