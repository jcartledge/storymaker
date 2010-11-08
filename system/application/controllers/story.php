<?php

class Story extends Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Story_model', '', TRUE);
    $this->load->library('layout');
		$this->load->library('tank_auth');
    $this->layout->setLayout('layouts/main');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->helper('attachment');
    $this->load->helper('thumbnail');
  }

  function index() {
    $data['stories'] = $this->Story_model->list_all();
    $this->layout->view('story/list', $data);
  }

  function view($id, $page = 1) {
    $data['story'] = $this->Story_model->load($id, $page);
    $data['owner'] = ($data['story']->username == $this->tank_auth->get_username());
    $this->layout->setLayout('layouts/story');
    $this->layout->view('story/view', $data);
  }

  function search() {
    $data['search'] = htmlspecialchars($_GET['q']);
    $data['stories'] = $this->Story_model->search(mysql_real_escape_string($_GET['q']));
    $this->layout->view('story/search', $data);
  }
}
