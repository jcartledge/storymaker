<?php

function attachment_type($mimetype) {
  $types = array(
    'object video'  => array('video/mpeg', 'video/avi', 'video/x-msvideo', 'video/quicktime'), 
    'flash video'   => array('application/x-flash-video'),
    'mp3 audio'     => array('audio/mp3', 'audio/mpeg'),
    'object audio'  => array('audio/aiff', 'audio/wav'),
    'image'         => array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png'),
    'download'      => array('application/msword', 'application/pdf')
  );
  foreach($types as $type => $mimetypes) {
    if(array_search($mimetype, $mimetypes) !== false) return $type;
  }
  return 'unknown';
}

function attachment_icon($mimetype) {
  $url = '/images/icons';
  switch(attachment_type($mimetype)) {
  case 'object video':
  case 'flash video':
    return "{$url}/film.png";
  case 'mp3 audio':
  case 'object audio':
    return "{$url}/sound.png";
  case 'image':
    return "{$url}/image.png";
  case 'download':
  case 'unknown':
  default:
    return "{$url}/text_dropcaps.png";
  }
}

function attachment_view($attachment, $description, $mimetype) {
  switch(attachment_type($mimetype)) {
  case 'object video':
  case 'object audio':
    $view = "attachment/object";
    break;
  case 'flash video':
    $view = "attachment/flv";
    break;
  case 'mp3 audio':
    $view = "attachment/mp3";
    break;
  case 'image':
    $view = "attachment/image";
    break;
  case 'download':
  case 'unknown':
  default:
    $view = "attachment/download";
  }
  $ci = get_instance();
  return $ci->load->view($view, array('attachment' => $attachment, 'description' => $description));
}
