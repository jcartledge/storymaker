<form class="search-form" action="/story/search" method = "get">
  Search Small Histories: <input type="search" value="<?php echo isset($search) ? $search : ''; ?>" name="q">
  <input type="submit" value="Go">
</form>
