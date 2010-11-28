<?php
$num_pages = ceil($num_items / $page_size);
$page = $this->input->get('item-page');
$show_form = isset($items_username) && $this->tank_auth->is_admin();
if(!$page) $page = 1;
if(!is_callable('item_pager_link')) {
  function item_pager_link($page = NULL) {
    $url = parse_url($_SERVER['REQUEST_URI']);
    $query = array();
    if(isset($url['query'])) parse_str($url['query'], $query);
    if($page) $query['item-page'] = $page;
    $url['query'] = http_build_query($query);
    return sprintf('%s?%s', $url['path'], $url['query']);
  }
}
?>
<div class="pager">
  <?php if($page > 1) { ?><a class="prev" href="<?php echo item_pager_link($page - 1); ?>">Previous</a><?php } ?>
  <?php if($page < $num_pages) { ?><a class="next" href="<?php echo item_pager_link($page + 1); ?>">Next</a><?php } ?>
  <?php if($show_form) { ?><form class="items-user-form" action="<?php echo item_pager_link(); ?>"><?php } ?>
  <?php if(isset($_GET['stories_username'])) { ?><input type="hidden" name="stories_username" value="<?php echo $_GET['stories_username']; ?>"><?php } ?>
    <p>
      <?php if($num_items) { ?>Showing <?php $first = 1 + ($page_size * ($page - 1)); echo $first; ?> to <?php echo $first + count($items) - 1; ?>
      of <?php echo $num_items; } else { ?>No <?php } ?>
      item<?php if($num_items != 1) echo 's'; ?>
      <?php if(isset($items_username)) { ?>by <em><?php echo ($show_form) ? 
        form_dropdown('items_username', $this->tank_auth->userlist(), $items_username) . '<input type="submit" value="select user">':
        $items_username; ?></em><?php } ?>
      <?php if($item_search) echo " matching <em>{$item_search}</em>"; ?>
    </p>
      <?php if($show_form) { ?></form><?php } ?>
</div>
