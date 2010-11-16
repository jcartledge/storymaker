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
    $exclude_ids = array();
    if($story_id) {
      $this->load->model('Story_model', '', TRUE);
      $exclude_ids = $this->Story_model->item_ids($story_id);
    }
    $this->begin_basic_items_query($limit, $exclude_ids);
    if($str) {
      $str = $this->db->escape("%$str%");
      $this->db->where("(title LIKE $str OR content LIKE $str OR description LIKE $str)", NULL, FALSE);
    }
  }

  private function begin_basic_items_query($limit = 0, $exclude_ids = array()) {
    $this->db->select('items.*');
    $this->db->from('items');
    $this->db->join('users', 'users.id = items.user_id');
    if($exclude_ids) $this->db->where_not_in('items.id', $exclude_ids);
    if($limit) $this->db->limit($limit);
  }

}
