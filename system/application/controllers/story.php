<?php

class Story extends Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Story_model', '', TRUE);
    $this->load->library('layout');
    $this->layout->setLayout('layouts/main');
    $this->load->helper('url');
    $this->load->helper('form');
  }

  function index() {
    $data['stories'] = $this->Story_model->list_all();
    $this->layout->view('story/list', $data);
  }

  function view($id) {
    $data['story'] = $this->Story_model->load($id);
    $this->layout->setLayout('layouts/story');
    $this->layout->view('story/view', $data);
  }

  function search() {
    $data['search'] = htmlspecialchars($_GET['q']);
    $data['stories'] = $this->Story_model->search(mysql_real_escape_string($_GET['q']));
    $this->layout->view('story/search', $data);
  }
}
