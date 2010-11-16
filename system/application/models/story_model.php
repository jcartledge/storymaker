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

  function list_by_user($user_id, $num = 10) {
    $this->begin_basic_stories_query($num);
    $this->db->where(array('users.id' => $user_id));
    return $this->db->get()->result();
  }

  function homepage_stories () {
    return $this->db->query('SELECT 
      items_stories.story_id,
      stories.title,
      items.attachment,
      items.description
      FROM items, items_stories, stories
      WHERE mimetype="image/jpeg" 
      and items_stories.item_id = items.id
      and items_stories.story_id = stories.id
      order by rand() limit 10')->result();
  }

  private function begin_basic_stories_query($num = NULL) {
    $this->db->select('stories.*, users.username');
    $this->db->from('stories');
    $this->db->join('users', 'users.id = stories.user_id');
    if($num) $this->db->limit($num);
  }

  function load($id, $page = 1) {
    $this->begin_basic_stories_query();
    $this->db->where(array('stories.id' => $id));
    $story = array_pop($this->db->get()->result());
    if($story->layout == 'default') $story->layout = 'narrative';
    if($story->layout == 'slideshow' || $story->layout == 'shoebox') {
      $story->page = 0;
      $story->pages = 0;
    } else {
      $story->page = $page;
      $story->pages = $this->count_pages($id, $story->items_per_page);
    }
    $where = ($story->layout == 'gallery' || $story->layout == 'shoebox') ? 'mimetype LIKE "image/%"' : NULL;
    $story->items = $this->load_items($id, $page, $story->items_per_page, $where);
    return $story;
  }

  function save($data) {
    if(isset($data['id'])) {
      // update
    } else {
      $data['created_at'] = date('Y-m-d H:i:s', time());
      $data['viewed'] = 0;
      $this->db->insert('stories', $data);
      return $this->db->insert_id();
    }
  }

  function save_items($id, $items) {
    $position = $this->next_item_story_position($id);
    foreach($items as $item_id) {
      $item_story = array('story_id' => $id, 'item_id' => $item_id);
      if(!$this->item_story_exists($item_story)) {
        $item_story['position'] = $position++;
        $this->db->insert('items_stories', $item_story);
      }
    }
    return $this->load($id, 0);
  }

  private function max_item_story_position($story_id) {
    $this->sort_items_stories($story_id);
    $q = $this->db->query("SELECT MAX(position) AS pos FROM items_stories WHERE story_id = $story_id");
    $row = $q->result();
    return is_string($row[0]->pos) ? $row[0]->pos : '0';
  }

  private function next_item_story_position($story_id) {
    $this->sort_items_stories($story_id);
    $q = $this->db->query("SELECT MAX(position) + 1 AS pos FROM items_stories WHERE story_id = $story_id");
    $row = $q->result();
    return is_string($row[0]->pos) ? $row[0]->pos : '1';
  }

  private function sort_items_stories($story_id) {
    $position = 1;
    $items = $this->load_items($story_id, 0);
    foreach($items as $item) {
      $this->update_item_position(array(
        'item_id' => $item->id,
        'story_id' => $story_id,
        'position' => $position++
      ));
    }
  }

  private function item_story_exists($data) {
    return !!$this->db->from('items_stories')->where($data)->count_all_results();
  }

  private function item_story_position($data) {
    $result = $this->db->from('items_stories')->where($data)->get()->result();
    return $result[0]->position;
  }

  function remove_item($story_id, $item_id) {
    $this->db->delete('items_stories', array('story_id' => $story_id, 'item_id' => $item_id));
    $this->sort_items_stories($story_id);
  }

  function move_item_up($story_id, $item_id) {
    $this->sort_items_stories($story_id);
    $pos = $this->item_story_position(array('item_id' => $item_id, 'story_id' => $story_id));
    if($pos == 1) return;
    $next_pos = $pos - 1;
    $this->db
      ->where(array('story_id' => $story_id, 'position' => $next_pos))
      ->update('items_stories', array('position' => 0));
    $this->db
      ->where(array('story_id' => $story_id, 'item_id' => $item_id))
      ->update('items_stories', array('position' => $next_pos));
    $this->db
      ->where(array('story_id' => $story_id, 'position' => 0))
      ->update('items_stories', array('position' => $pos));
  }

  function move_item_down($story_id, $item_id) {
    $this->sort_items_stories($story_id);
    $pos = $this->item_story_position(array('item_id' => $item_id, 'story_id' => $story_id));
    if($pos == $this->max_item_story_position($story_id)) return;
    $next_pos = $pos + 1;
    $this->db
      ->where(array('story_id' => $story_id, 'position' => $next_pos))
      ->update('items_stories', array('position' => 0));
    $this->db
      ->where(array('story_id' => $story_id, 'item_id' => $item_id))
      ->update('items_stories', array('position' => $next_pos));
    $this->db
      ->where(array('story_id' => $story_id, 'position' => 0))
      ->update('items_stories', array('position' => $pos));
  }

  /**
   * validates uniqueness of title
   * @param $title
   * @return bool validity
   */
  function check_title($title) {
    return !$this->db->from('stories')->like('title', $title)->count_all_results();
  }

  function load_items($id, $page = 1, $items_per_page = 10, $where = NULL) {
    $this->begin_basic_items_query($id);
    if($where) $this->db->where($where);
    if($page && $items_per_page) $this->db->limit($items_per_page, $items_per_page * ($page - 1));
    return $this->db->get()->result();
  }

  function item_ids($id) {
    $items = $this->load_items($id, 0);
    $item_ids = array();
    foreach($items as $item) $item_ids[] = $item->id;
    return $item_ids;
  }

  function load_comments($id) {
    $this->db->from('comments');
    $this->db->where(array('story_id' => $id));
    $this->db->order_by('created_at');
    return $this->db->get()->result();
  }

  function save_comment($id, $comment) {
    $comment['story_id'] = $id;
    $comment['created_at'] = date('Y-m-d H:i:s');
    $akismet_config = array(
      'blog_url' => 'http://www.smallhistories.com/',
      'api_key' => 'b2f37326d1f0',
      'comment' => $comment
    );
    $this->load->library('akismet');
    $this->akismet->init($akismet_config);
    if(!$this->akismet->is_spam()) $this->db->insert('comments', $comment);
  }

  function search($q) {
    $this->begin_basic_stories_query();
    $this->db->like('title', $q);
    $this->db->or_like('description', $q);
    return $this->db->get()->result();
  }

  function update_item_position($data) {
    $this->db->where('item_id = ' . $data['item_id']);
    $this->db->where('story_id = ' . $data['story_id']);
    $this->db->update('items_stories', $data);
  }

  private function begin_basic_items_query($id) {
    $this->db->select('items.*, items_stories.pos_x, items_stories.pos_y, items_stories.story_id, users.username');
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
