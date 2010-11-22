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
    $this->load->helper('icon');
  }

  function index() {
    $user_id = $this->tank_auth->get_user_id();
    $data['username'] = $this->tank_auth->get_username();
    $data['search'] = $this->input->get('q');
    $data['page_size'] = 15;
    $data['stories'] = $this->Story_model->list_by_user($user_id, $data['page_size'], $data['search']);
    $data['num_stories'] = $this->Story_model->count($data['search'], $user_id);
    $data['story_search'] = $data['search'];
    $data['items'] = $this->Item_model->list_by_user($user_id, $data['page_size'], $data['search']);
    $data['num_items'] = $this->Item_model->count($data['search'], NULL, $user_id);
    $data['item_search'] = $data['search'];
    $this->layout->view('manage/index', $data);
  }
}
