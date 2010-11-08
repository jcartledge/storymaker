<?php

class Item_model extends Model {

  function list_by_user($user_id, $num = 10) {
    $this->begin_basic_items_query($num);
    $this->db->where(array('users.id' => $user_id));
    return $this->db->get()->result();
  }

  private function begin_basic_items_query($id) {
    $this->db->select('items.*');
    $this->db->from('items');
    $this->db->join('users', 'users.id = items.user_id');
  }

}
