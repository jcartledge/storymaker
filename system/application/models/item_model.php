<?php

class Item_model extends Model {

  function list_by_user($user_id, $limit = 10) {
    $this->begin_basic_items_query($limit);
    $this->db->where(array('users.id' => $user_id));
    return $this->db->get()->result();
  }

  function search($str = '', $limit = 25) {
    $this->begin_basic_items_query($limit);
    if($str) $this->db->like('title', $str)->or_like('content', $str)->or_like('description', $str);
    return $this->db->get()->result();
  }

  private function begin_basic_items_query($limit = 0) {
    $this->db->select('items.*');
    $this->db->from('items');
    $this->db->join('users', 'users.id = items.user_id');
    if($limit) $this->db->limit($limit);
  }

}
