<?php

class Story_model extends Model {

  function list_all() {
    $this->begin_basic_list_query();
    return $this->db->get()->result();
  }

  function list_latest($num = 3) {
    $this->begin_basic_list_query($num);
    $this->db->order_by('id DESC');
    return $this->db->get()->result();
  }

  function list_popular($num = 3) {
    $this->begin_basic_list_query($num);
    $this->db->order_by('viewed DESC');
    return $this->db->get()->result();
  }

  function list_random($num = 3) {
    $this->begin_basic_list_query($num);
    $this->db->order_by('', 'RANDOM');
    return $this->db->get()->result();
  }

  private function begin_basic_list_query($num = NULL) {
    $this->db->select('stories.*, users.username');
    $this->db->from('stories');
    $this->db->join('users', 'users.id = stories.user_id');
    if($num) $this->db->limit($num);
  }

  function load($id) {
    //@TODO: increment viewed count for this story
    $this->db->from('stories');
    $this->db->where(array('id' => $id));
    $story = array_pop($this->db->get()->result());
    $story->items = $this->load_items($id);
    $story->comments = $this->load_comments($id);
    return $story;
  }

  function load_items($id) {
    $this->db->from('items');
    $this->db->join('items_stories', 'items.id = items_stories.item_id');
    $this->db->where(array('items_stories.story_id' => $id));
    $this->db->order_by('position');
    return $this->db->get()->result();
  }

  function load_comments($id) {
    $this->db->from('comments');
    $this->db->where(array('story_id' => $id));
    $this->db->order_by('id');
    return $this->db->get()->result();
  }

  function search($q) {
    $this->begin_basic_list_query();
    $this->db->like('title', $q);
    $this->db->or_like('description', $q);
    return $this->db->get()->result();
  }
}
