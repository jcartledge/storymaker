<?php

class Comment extends Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Story_model', '', TRUE);
    $this->load->library('layout');
    $this->layout->setLayout('layouts/main');
    $this->load->helper('url');
    $this->load->helper('form');
  }

  function story($story_id) {
    $data['comments'] = $this->Story_model->load_comments($story_id);
    $this->layout->view('comment/story', $data);
  }

  function search() {
    $data['search'] = htmlspecialchars($_GET['q']);
    $data['stories'] = $this->Story_model->search(mysql_real_escape_string($_GET['q']));
    $this->layout->view('story/search', $data);
  }
}
