<?php

/**
 * shorthand for a silk icon image tag
 */
function icon($name) {
  return sprintf('<img class="icon %s" src="/images/silk/%s.png">', $name, $name);
}
