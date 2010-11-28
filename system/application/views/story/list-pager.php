<?php
$num_pages = ceil($num_stories / $page_size);
$page = $this->input->get('story-page');
if(!$page) $page = 1;
if(!is_callable('story_pager_link')) {
  function story_pager_link($page = NULL) {
    $url = parse_url($_SERVER['REQUEST_URI']);
    $query = array();
    if(isset($url['query'])) parse_str($url['query'], $query);
    if($page) $query['story-page'] = $page;
    $url['query'] = http_build_query($query);
    return sprintf('%s?%s', $url['path'], $url['query']);
  }
}
?>
<div class="pager">
  <?php if($page > 1) { ?><a class="prev" href="<?php echo story_pager_link($page - 1); ?>">Previous</a><?php } ?>
  <?php if($page < $num_pages) { ?><a class="next" href="<?php echo story_pager_link($page + 1); ?>">Next</a><?php } ?>
  <form class="stories-user-form" action="<?php echo story_pager_link(); ?>">
  <?php if(isset($_GET['items_username'])) { ?><input type="hidden" name="items_username" value="<?php echo $_GET['items_username']; ?>"><?php } ?>
    <p>
      <?php if($num_stories) { ?>Showing <?php $first = 1 + ($page_size * ($page - 1)); echo $first; ?> to <?php echo $first + count($stories) - 1; ?>
  of <?php echo $num_stories; } else echo 'No '; ?>
      <?php echo($num_stories == 1) ? 'story' : 'stories'; ?>
      <?php if(isset($stories_username)) { ?>by <em><?php echo ($this->tank_auth->is_admin()) ? 
        form_dropdown('stories_username', $this->tank_auth->userlist(), $stories_username) . '<input type="submit" value="select user">' :
        $stories_username; ?></em><?php } ?>
      <?php if($story_search) echo " matching <em>{$story_search}</em>"; ?>
    </p>
  
  </form>
</div>
