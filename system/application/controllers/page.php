<?php

class Page extends Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('layout');
    $this->load->helper('url');
    $this->load->helper('form');
  }

  function index() {
    $this->load->model('Story_model', '', TRUE);
    $data['latest_stories'] = $this->Story_model->list_latest();
    $data['popular_stories'] = $this->Story_model->list_popular();
    $data['random_stories'] = $this->Story_model->list_random();
    $this->layout->view('pages/home', $data);
  }

  function about() {
    $this->layout->view('pages/about');
  }

  function disclaimer() {
    $this->layout->view('page/disclaimer');
  }

  function privacy() {
    $this->layout->view('pages/privacy');
  }

  function copyright() {
    $this->layout->view('pages/copyright');
  }

  function thanks() {
    $this->layout->view('pages/thanks');
  }
}
