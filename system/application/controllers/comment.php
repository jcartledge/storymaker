<?php

class Comment extends Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Story_model', '', TRUE);
    $this->load->library('layout');
    $this->load->library('tank_auth');
    $this->layout->setLayout('layouts/comment');
    $this->load->helper('url');
    $this->load->helper('form');
  }

  function story($story_id) {
    $data['comments'] = $this->Story_model->load_comments($story_id);
    $data['story_id'] = $story_id;
    $this->layout->view('comment/story', $data);
  }

  function post($story_id) {

    $comment = array(
      'author'  => $this->input->post('commenter'),
      'title'   => $this->input->post('title'),
      'comment' => $this->input->post('comment')
    );
    $this->Story_model->save_comment($story_id, $comment);
    $this->story($story_id);
  }
}
