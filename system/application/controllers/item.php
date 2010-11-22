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
    $this->load->helper('url');
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
    $this->form_validation->set_rules('title', 'title', 'required');
    $this->form_validation->set_rules('title', 'title-unique', 'callback_check_title');
    $this->form_validation->set_message('check_title', 'There is already an item with this title - please choose another.');
    $this->form_validation->set_rules('type', 'type', 'required');
    $this->form_validation->set_rules('year', 'year', 'numeric|exact_length[4]');
    if(isset($_POST['type'])) switch($_POST['type']) {
      case 'text':
        $this->form_validation->set_rules('content', 'text', 'required');
        break;
      case 'image':
        $this->form_validation->set_rules('image-url', 'image URL', 'callback_check_image');
        $this->form_validation->set_message('check_image', 'You need to provide an image URL or upload an image file.');
        break;
      case 'document':
        $this->form_validation->set_rules('document-file', 'document file', 'required');
        break;
      case 'video':
        $this->form_validation->set_rules('video-url', 'video url', 'callback_check_video');
        $this->form_validation->set_message('check_video', 'You need to provide an video URL or upload an video file.');
    }
    if($this->form_validation->run()) {
      $item_id = $this->Item_model->save();
      if($item_id) redirect('/manage');
    }
    $data['themes'] = $this->Item_model->get_all_themes();
    $data['type'] = isset($_POST['type']) ? $_POST['type'] : '';
    $this->layout->view('item/add', $data);
  }

  function delete($id) {
    if($_POST) {
      $this->Item_model->delete($id);
      //set message?
      if(isset($_POST['url'])) redirect($_POST['url']);
    } else {
      $data['item'] = $this->Item_model->load($id);
      $data['url'] = $_SERVER['HTTP_REFERER'];
      $this->layout->view('item/delete', $data);
    }
  }
  function check_title($title) {
    return $this->Item_model->check_title($title);
  }

  function check_image($url) {
    return($url || $this->input->post('image-file'));
  }

  function check_video($url) {
    return($url || $this->input->post('video-file'));
  }

  function years() {
    header('Content-type: application/json');
    echo json_encode($this->Item_model->years($this->input->get('term')));
  }

  function countries() {
    header('Content-type: application/json');
    return json_encode($this->Item_model->countries($this->input->get('term')));
  }

  function places() {
    header('Content-type: application/json');
    return json_encode($this->Item_model->places($this->input->get('term')));
  }
}
