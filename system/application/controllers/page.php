<?php

class Page extends Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('layout');
    $this->layout->setLayout('layouts/main');
    $this->load->helper('url');
    $this->load->helper('form');
  }

  function index() {
    $this->load->helper('thumbnail');
    $this->load->model('Story_model', '', TRUE);
    $data['homepage_stories'] = $this->Story_model->homepage_stories();
    $this->layout->view('pages/home', $data);
  }

  function about() {
    $this->layout->view('pages/about');
  }

  function disclaimer() {
    $this->layout->view('pages/disclaimer');
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
