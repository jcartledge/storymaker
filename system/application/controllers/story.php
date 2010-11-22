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
    $data['h2'] = 'All stories';
    $this->layout->view('story/list', $data);
  }

  function view($id, $page = 1) {
    $data['story'] = $this->Story_model->load($id, $page);
    $data['owner'] = ($data['story']->username == $this->tank_auth->get_username());
    $this->layout->setLayout('layouts/story');
    $this->layout->view('story/view', $data);
  }

  function preview($id) {
    $data['story'] = $this->Story_model->load($id);
    $data['owner'] = ($data['story']->username == $this->tank_auth->get_username());
    $this->layout->setLayout('layouts/story');
    $this->layout->view('story/preview', $data);
  }

  function search() {
    $data['search'] = htmlspecialchars($_GET['q']);
    $data['stories'] = $this->Story_model->search(mysql_real_escape_string($_GET['q']));
    $this->layout->view('story/search', $data);
  }

  function add() {
    if(!$this->tank_auth->is_logged_in()) {
      $this->output->set_status_header('401');
      redirect('');
    }
    $this->load->library('form_validation');
    $this->form_validation->set_rules('story-title', 'title', 'required');
    $this->form_validation->set_rules('story-title', 'title-unique', 'callback_check_title');
    $this->form_validation->set_message('check_title', 'There is already a story with this title - please choose another.');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('story-description', 'description', 'required');
    if($this->form_validation->run()) {
      $story_id = $this->Story_model->save(array(
        'user_id'     => $this->tank_auth->get_user_id(),
        'title'       => $_POST['story-title'],
        'description' => $_POST['story-description']
      ));
      if($story_id) redirect('/story/edit/' . $story_id);
    }
    $this->layout->view('story/add');
  }

  function edit($id) {
    $authorized = FALSE;
    if($this->tank_auth->is_logged_in()) {
      $story = $this->Story_model->load($id, 0);
      $authorized = ($story->user_id == $this->tank_auth->get_user_id());
    }
    if(!$authorized) {
      $this->output->set_status_header('401');
      redirect('');
    }
    if(isset($_POST['items'])) {
      $story = $this->Story_model->save_items($id, $_POST['items']);
    }
    if(isset($_POST['layout'])) {
      $story = $this->Story_model->save(array('id' => $id, 'layout' => $_POST['layout']));
    }
    $data['story'] = $story;
    $this->load->model('Item_model');
    $data['item_search'] = isset($_GET['item-search']) ? $_GET['item-search'] : '';
    $data['page_size'] = 15;
    $data['items'] = $this->Item_model->search($data['item_search'], $data['page_size'], $id);
    $data['num_items'] = $this->Item_model->count($data['item_search'], $id);
    $this->layout->view('story/edit', $data);
  }

  function remove($story_id, $item_id) {
    $this->Story_model->remove_item($story_id, $item_id);
    redirect($_SERVER['HTTP_REFERER']);
  }

  function item_up($story_id, $item_id) {
    $this->Story_model->move_item_up($story_id, $item_id);
    redirect($_SERVER['HTTP_REFERER']);
  }

  function item_down($story_id, $item_id) {
    $this->Story_model->move_item_down($story_id, $item_id);
    redirect($_SERVER['HTTP_REFERER']);
  }

  function check_title($title) {
    return $this->Story_model->check_title($title);
  }
}
