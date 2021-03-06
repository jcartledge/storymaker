<?php

class Item_model extends Model {

  function load($item_id) {
    $this->begin_basic_items_query(1);
    $this->db->where('items.id', $item_id);
    $result = $this->db->get()->result();
    $item = $result[0];
    $item->num_stories = $this->db->from('items_stories')->where('item_id', $item->id)->count_all_results();
    $this->load->helper('attachment');
    $item->type = item_type($item->mimetype);
    return $item;
  }

  function delete($item_id) {
    $this->db->delete('items_stories', array('item_id' => $item_id));
    $this->db->delete('items', array('id' => $item_id));
  }

  function list_by_user($username_or_id, $limit = 10, $str = '') {
    return $this->search($str, $limit, NULL, $username_or_id);
  }

  function search($str = '', $limit = 25, $story_id = NULL, $username_or_id = NULL) {
    $page = 1;
    if(isset($_GET['item-page'])) $page = $_GET['item-page'];
    $limit = array($limit, ($page - 1) * $limit);
    $this->begin_search_query($str, $limit, $story_id, $username_or_id);
    $this->db->order_by('id', 'desc');
    return $this->db->get()->result();
  }

  function count($str = '', $story_id = NULL, $username_or_id = NULL) {
    $this->begin_search_query($str, 0, $story_id, $username_or_id);
    return $this->db->count_all_results();
  }

  function get_all_themes() {
    $themes = array();
    $themes_result = $this->db->select('theme')->from('themes')->get()->result();
    foreach($themes_result as $row) $themes[] = $row->theme;
    return $themes;
  }

  function save($id = NULL) {
    $data = array();
    if(!$id) {
      $data['created_at'] = date('Y-m-d H:i:s', time());
      $data['user_id'] = $this->tank_auth->get_user_id();
    }
    $data['title'] = $this->input->post('title');
    $data['content'] = $this->input->post('content');
    $data['description'] = $this->input->post('description');
    $data['country'] = $this->input->post('country');
    $data['year'] = $this->input->post('year');
    $data['place'] = $this->input->post('place');
    //mimetype
    if(isset($_FILES['image-file']['type']) && $_FILES['image-file']['type']) {
      $attachment = $_FILES['image-file'];
    } elseif(isset($_FILES['document-file']['type']) && $_FILES['document-file']['type']) {
      $attachment = $_FILES['document-file'];
    } elseif(isset($_FILES['video-file']['type']) && $_FILES['video-file']['type']) {
      $attachment = $_FILES['video-file'];
    }
    if(isset($attachment)) {
      $data['attachment'] = $this->save_attachment($attachment);
      if($data['attachment']) {
        $data['mimetype'] = $attachment['type'];
      }
    } else {
      // handle other attachment types: embeds, links
      if($this->input->post('image-url')) {
        $image_url = $this->input->post('image-url');
        $data['mimetype'] = 'image/link';
        $data['attachment'] = $image_url;
      } elseif ($this->input->post('video-url')) {
        $video_url = $this->input->post('video-url');
        if(preg_match('/youtube/', $video_url)) {
          $data['mimetype'] = 'video/youtube';
          $data['attachment'] = $video_url;
        } else if(preg_match('/vimeo/', $video_url)) {
          $data['mimetype'] = 'video/vimeo';
          $data['attachment'] = $video_url;
        }
      }
    }
    if($id) {
      $this->db->where('id', $id);
      $this->db->update('items', $data);
      //$this->save_themes($this->input->post('themes'), $item_id);
      return $this->load($id);
    } else {
      $this->db->insert('items', $data);
      $item_id = $this->db->insert_id();
      $this->save_themes($this->input->post('themes'), $item_id);
      if($this->input->post('story_id')) {
        $this->load->model('Story_model');
        $this->Story_model->save_items($this->input->post('story_id'), $item_id);
      }
      return $item_id;
    }
  }

  private function save_themes($themes, $item_id) {
    if(!$themes) return;
    foreach($themes as $theme_chunk) foreach(explode(',', $theme_chunk) as $theme){
      $this->save_theme(trim($theme), $item_id);
    }
  }

  private function save_theme($theme, $item_id = NULL) {
    $theme = array('theme' => $theme);
    $theme_result = $this->db->select('id')->from('themes')->where($theme)->get()->result();
    if(count($theme_result)) {
      $theme_id = $theme_result[0]->id;
      $this->db->delete('items_themes', array('item_id' => $item_id, 'theme_id' => $theme_id));
    } else {
      $this->db->insert('themes', $theme);
      $theme_id = $this->db->insert_id();
    }
    $this->db->insert('items_themes', array('item_id' => $item_id, 'theme_id' => $theme_id));
  }

  private function save_attachment($file) {
    $this->load->helper('attachment');
    if(!is_array($file) || $file['error'] != 0) return;
    $type = attachment_type($file['type']);
    if(!isset($type)) return;
    $save_as = dirname($_SERVER['SCRIPT_FILENAME']) . "/attachments/{$type}/{$file['name']}";
    if(!move_uploaded_file($file['tmp_name'], $save_as)) die($file['tmp_name']);
    return str_replace('//', '', '/' . str_replace($_SERVER['DOCUMENT_ROOT'], '', $save_as));
  }

  private function begin_search_query($str = '', $limit = 0, $story_id = NULL, $username_or_id = NULL) {
    $exclude_ids = array();
    if($story_id) {
      $this->load->model('Story_model', '', TRUE);
      $exclude_ids = $this->Story_model->item_ids($story_id);
    }
    if($username_or_id) {
      if(preg_match('/^[\d]+$/', $username_or_id)) {
        $this->db->where(array('user_id' => $username_or_id));
      } else {
        $this->db->where(array('username' => $username_or_id));
      }
    }
    $this->begin_basic_items_query($limit, $exclude_ids);
    if($str) {
      $str = $this->db->escape("%$str%");
      $this->db->where("(title LIKE $str OR content LIKE $str OR description LIKE $str)", NULL, FALSE);
    }
  }

  private function begin_basic_items_query($limit = 0, $exclude_ids = array()) {
    $this->db->select('items.*');
    $this->db->select('users.username');
    $this->db->from('items');
    $this->db->join('users', 'users.id = items.user_id');
    if($exclude_ids) $this->db->where_not_in('items.id', $exclude_ids);
    if($limit) call_user_func_array(array($this->db, 'limit'), (array)$limit);
  }

  function years($str = '') {
    $this->db->select('year')->distinct()->from('items')->order_by('year');
    if($str) $this->db->like('year', $str);
    $years_result = $this->db->get()->result();
    $years = array();
    foreach($years_result as $row) $years[] = $row->year;
    return $years;
  }

  function countries($str = '') {
    $this->db->select('country')->distinct()->from('items')->order_by('country');
    if($str) $this->db->like('country', $str);
    $countries_result = $this->db->get()->result();
    $countries = array();
    foreach($countries_result as $row) $countries[] = $row->country;
    return $countries;
  }

  function places($str = '') {
    $this->db->select('place')->distinct()->from('items')->order_by('place');
    if($str) $this->db->like('place', $str);
    $places_result = $this->db->get()->result();
    $places = array();
    foreach($places_result as $row) $places[] = $row->place;
    return $places;
  }
}
