<?php

class Story extends Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Story_model', '', TRUE);
    $this->load->library('layout');
    $this->load->helper('url');
    $this->load->helper('form');
  }

  function index() {
    $data['stories'] = $this->Story_model->list_all();
    $this->layout->view('story_list', $data);
  }

  function view($id) {
    $data['story'] = $this->Story_model->load($id);
    $this->layout->setLayout('story_layouts/' . $data['story']->layout);
    $this->layout->view('story', $data);
  }

  function search() {
    parse_str(array_pop(explode('?', $_SERVER['REQUEST_URI'], 2)), $_GET);
    $data['search'] = htmlspecialchars($_GET['q']);
    $data['stories'] = $this->Story_model->search(mysql_real_escape_string($_GET['q']));
    $this->layout->view('story_search', $data);
  }
}
