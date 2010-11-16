<?php

class Item extends Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('Story_model', '', TRUE);
    $this->load->model('Item_model', '', TRUE);
    $this->load->library('tank_auth');
    $this->load->library('layout');
    $this->layout->setLayout('layouts/main');
    $this->load->helper('attachment');
    $this->load->helper('thumbnail');
  }

  function position() {
    $story = $this->Story_model->load($_GET['story_id']);
    if($story->username == $this->tank_auth->get_username()) {
      $this->Story_model->update_item_position($_GET);
    }
  }

  function view($item_id) {
    $data['item'] = $this->Item_model->load($item_id);
    $this->load->view('item/view', $data);
  }

  function add() {
    if(!$this->tank_auth->is_logged_in()) {
      $this->output->set_status_header('401');
      redirect('');
    }
    $this->load->library('form_validation');
    //@TODO: define validation rules
    if($this->form_validation->run()) {
      $item_id = $this->Item_model->save(array(
        'user_id'     => $this->tank_auth->get_user_id(),
        //@TODO: add the fields from $_POST here - prob just let the model work this out
      ));
      if($item_id) redirect('/item/edit/' . $item_id);
    }
    $data['themes'] = $this->Item_model->get_all_themes();
    $this->layout->view('item/add', $data);
  }
}
