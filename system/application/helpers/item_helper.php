<?php

/*
 * provide standard action links for working with items
 * - move
 * - edit
 * - delete
 * - remove
 */
function item_action($name, $item) {
  switch($name) {
    case 'move':
      return
        anchor('/story/item_up/' . $item->story_id . '/' . $item->id, icon('arrow_up')) .
        anchor('/story/item_down/' . $item->story_id . '/' . $item->id, icon('arrow_down'));
    case 'edit':
      return anchor('/item/edit/' . $item->id, icon('pencil'));
    case 'delete':
      return anchor('/item/delete/' . $item->id, icon('delete'));
    case 'remove':
      return anchor('/story/remove/' . $item->story_id . '/' . $item->id, icon('delete'));
  }
}
