<?php

class Manage extends Controller {

  function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('tank_auth');
    if(!$this->tank_auth->is_logged_in()) {
      $this->output->set_status_header('401');
      redirect('');
    }
    $this->load->model('Story_model', '', TRUE);
    $this->load->model('Item_model', '', TRUE);
    $this->load->library('layout');
    $this->layout->setLayout('layouts/manage');
    $this->load->helper('attachment');
    $this->load->helper('thumbnail');
    $this->data['auth'] = $this->tank_auth;
  }

  function index() {
    $data = $this->data;
    $data['stories'] = $this->Story_model->list_by_user($this->tank_auth->get_user_id());
    $data['items'] = $this->Item_model->list_by_user($this->tank_auth->get_user_id());
    $this->layout->view('manage/index', $data);
  }
}
