<?php

class Item extends Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('Story_model', '', TRUE);
    $this->load->model('Item_model', '', TRUE);
    $this->load->library('tank_auth');
    $this->load->helper('attachment');
    $this->load->helper('thumbnail');
  }

  function position() {
    $story = $this->Story_model->load($_GET['story_id']);
    if($story->username == $this->tank_auth->get_username()) {
      $this->Story_model->update_item_position($_GET);
    }
  }

  function view($item_id) {
    $data['item'] = $this->Item_model->load($item_id);
    $this->load->view('item/view', $data);
  }
}
