<?php

/*
 * provide standard action links for working with stories
 * - edit
 * - delete
 */
function story_action($name, $story) {
  $attrs = array('class' => 'icon');
  switch($name) {
    case 'edit':
      return anchor('/story/edit/' . $story->id, icon('pencil'), $attrs);
    case 'delete':
      return anchor('/story/delete/' . $story->id, icon('delete'), $attrs);
  }
}
