<?php

class Item_model extends Model {

  function list_by_user($user_id, $limit = 10) {
    $this->begin_basic_items_query($limit);
    $this->db->where(array('users.id' => $user_id));
    return $this->db->get()->result();
  }

  function search($str = '', $limit = 25, $story_id = NULL) {
    $this->begin_search_query($str, $limit, $story_id);
    return $this->db->get()->result();
  }

  function count($str = '', $story_id = NULL) {
    $this->begin_search_query($str, 0, $story_id);
    return $this->db->count_all_results();
  }

  private function begin_search_query($str = '', $limit = 0, $story_id = NULL) {
    $this->begin_basic_items_query($limit);
    if($str) $this->db->like('title', $str)->or_like('content', $str)->or_like('description', $str);
    if($story_id) $this->exclude_story($story_id);
  }

  private function begin_basic_items_query($limit = 0) {
    $this->db->select('items.*');
    $this->db->from('items');
    $this->db->join('users', 'users.id = items.user_id');
    if($limit) $this->db->limit($limit);
  }

  private function exclude_story($story_id) {
    $this->db->join('items_stories', 'items_stories.item_id = items.id');
    $this->db->where('items_stories.story_id !=', $story_id);
  }

}
