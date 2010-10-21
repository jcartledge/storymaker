<?php

class Item extends Controller {
  function position() {
    $this->load->model('Story_model', '', TRUE);
    $this->Story_model->update_item_position($_GET);
  }
}
