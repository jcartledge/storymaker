<?php

/**
 * shorthand for a silk icon image tag
 */
function icon($name) {
  $url = site_url(sprintf('images/silk/%s.png, $name'));
  return sprintf('<img class="icon %s" src="%s">', $name, $url  );
}
