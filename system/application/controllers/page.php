<?php

class Page extends Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('layout');
    $this->load->library('tank_auth');
    $this->layout->setLayout('layouts/main');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->data['auth'] = $this->tank_auth;
  }

  function index() {
    $this->load->helper('thumbnail');
    $this->load->model('Story_model', '', TRUE);
    $data = $this->data;
    $data['homepage_stories'] = $this->Story_model->homepage_stories();
    $this->layout->view('pages/home', $data);
  }

  function about() {
    $data = $this->data;
    $this->layout->view('pages/about');
  }

  function disclaimer() {
    $data = $this->data;
    $this->layout->view('pages/disclaimer');
  }

  function privacy() {
    $data = $this->data;
    $this->layout->view('pages/privacy');
  }

  function copyright() {
    $data = $this->data;
    $this->layout->view('pages/copyright');
  }

  function thanks() {
    $data = $this->data;
    $this->layout->view('pages/thanks');
  }
}
