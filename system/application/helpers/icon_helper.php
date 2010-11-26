<?php

/**
 * shorthand for a silk icon image tag
 */
function icon($name) {
  $url = site_url(sprintf('images/silk/%s.png', $name));
  $names = array('pencil' => 'edit');
  if(isset($names[$name])) $name = $names[$name];
  $pretty_name = ucfirst(str_replace('-', ' ', $name));
  return sprintf('<img title="%s" class="icon %s" src="%s">', $pretty_name, $name, $url);
}
