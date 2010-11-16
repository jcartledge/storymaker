<?php

class Item_model extends Model {

  function load($item_id) {
    $this->begin_basic_items_query(1);
    $this->db->where('items.id', $item_id);
    $result = $this->db->get()->result();
    return $result[0];
  }

  function list_by_user($user_id, $limit = 10) {
    $this->begin_basic_items_query($limit);
    $this->db->where(array('users.id' => $user_id));
    return $this->db->get()->result();
  }

  function search($str = '', $limit = 25, $story_id = NULL) {
    $page = 1;
    if(isset($_GET['page'])) $page = $_GET['page'];
    $limit = array($limit, ($page - 1) * $limit);
    $this->begin_search_query($str, $limit, $story_id);
    return $this->db->get()->result();
  }

  function count($str = '', $story_id = NULL) {
    $this->begin_search_query($str, 0, $story_id);
    return $this->db->count_all_results();
  }

  function get_all_themes() {
    $themes = array();
    $themes_result = $this->db->select('theme')->from('themes')->get()->result();
    foreach($themes_result as $row) $themes[] = $row->theme;
    return $themes;
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

  /**
   * validates uniqueness of title
   * @param $title
   * @return bool validity
   */
  function check_title($title) {
    return !$this->db->from('items')->like('title', $title)->count_all_results();
  }

  private function begin_basic_items_query($limit = 0, $exclude_ids = array()) {
    $this->db->select('items.*');
    $this->db->from('items');
    $this->db->join('users', 'users.id = items.user_id');
    if($exclude_ids) $this->db->where_not_in('items.id', $exclude_ids);
    if($limit) call_user_func_array(array($this->db, 'limit'), (array)$limit);
  }

}
