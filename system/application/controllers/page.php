<?php

class Page extends Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('layout');
    $this->load->library('tank_auth');
    $this->layout->setLayout('layouts/main');
    $this->load->helper('url');
    $this->load->helper('form');
  }

  function index() {
    $this->load->helper('thumbnail');
    $this->load->model('Story_model', '', TRUE);
    $data['homepage_stories'] = $this->Story_model->homepage_stories();
    $this->layout->view($this->template_path('home'), $data);
  }

  function about() {
    $this->layout->view($this->template_path('about'));
  }

  function disclaimer() {
    $this->layout->view($this->template_path('disclaimer'));
  }

  function privacy() {
    $this->layout->view($this->template_path('privacy'));
  }

  function copyright() {
    $this->layout->view($this->template_path('copyright'));
  }

  function thanks() {
    $this->layout->view($this->template_path('thanks'));
  }

  function template_path($pagename) {
    return sprintf('pages/%s%s', $this->db->dbprefix, $pagename);
  }
}
