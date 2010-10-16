<?php

class Page extends Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('layout');
  }

	function index() {
		$this->layout->view('home_page');
	}

  function about() {
    $this->layout->view('about_page');
  }

  function disclaimer() {
    $this->layout->view('disclaimer_page');
  }

  function privacy() {
    $this->layout->view('privacy_page');
  }

  function copyright() {
    $this->layout->view('copyright_page');
  }

  function thanks() {
    $this->layout->view('thanks_page');
  }
}
