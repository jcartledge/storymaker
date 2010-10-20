<?php

class Story_model extends Model {

  function list_all() {
    $this->begin_basic_stories_query();
    return $this->db->get()->result();
  }

  function list_latest($num = 3) {
    $this->begin_basic_stories_query($num);
    $this->db->order_by('id DESC');
    return $this->db->get()->result();
  }

  function list_popular($num = 3) {
    $this->begin_basic_stories_query($num);
    $this->db->order_by('viewed DESC');
    return $this->db->get()->result();
  }

  function list_random($num = 3) {
    $this->begin_basic_stories_query($num);
    $this->db->order_by('', 'RANDOM');
    return $this->db->get()->result();
  }

  private function begin_basic_stories_query($num = NULL) {
    $this->db->select('stories.*, users.username');
    $this->db->from('stories');
    $this->db->join('users', 'users.id = stories.user_id');
    if($num) $this->db->limit($num);
  }

  function load($id, $page = 1) {
    //@TODO: increment viewed count for this story
    $this->begin_basic_stories_query();
    $this->db->where(array('stories.id' => $id));
    $story = array_pop($this->db->get()->result());
    if($story->layout == 'default') $story->layout = 'narrative';
    $story->page = $page;
    $story->pages = $this->count_pages($id, $story->items_per_page);
    $story->items = $this->load_items($id, $page, $story->items_per_page);
    return $story;
  }

  function load_items($id, $page = 1, $items_per_page = 10) {
    $this->begin_basic_items_query($id);
    $this->db->limit($items_per_page, $items_per_page * ($page - 1));
    return $this->db->get()->result();
  }

  function load_comments($id) {
    $this->db->from('comments');
    $this->db->where(array('story_id' => $id));
    $this->db->order_by('created_at');
    return $this->db->get()->result();
  }

  function search($q) {
    $this->begin_basic_stories_query();
    $this->db->like('title', $q);
    $this->db->or_like('description', $q);
    return $this->db->get()->result();
  }

  private function begin_basic_items_query($id) {
    $this->db->select('items.*, users.username');
    $this->db->from('items');
    $this->db->join('users', 'users.id = items.user_id');
    $this->db->join('items_stories', 'items.id = items_stories.item_id');
    $this->db->where(array('items_stories.story_id' => $id));
    $this->db->order_by('position');
  }

  private function count_pages($id, $items_per_page) {
    $this->begin_basic_items_query($id);
    return ceil($this->db->count_all_results() / $items_per_page);
  }
}
