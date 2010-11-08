<?php

class Item extends Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('Story_model', '', TRUE);
		$this->load->library('tank_auth');
  }

  function position() {
    $story = $this->Story_model->load($_GET['story_id']);
    if($story->username == $this->tank_auth->get_username()) {
      $this->Story_model->update_item_position($_GET);
    }
  }
}
