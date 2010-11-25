<?php
//print_r($_SERVER);
function thumbnail_url($image_url) {
  $filespec = $_SERVER['DOCUMENT_ROOT'] . $image_url;
  if(!file_exists($filespec)) {
    // @TODO: handle remote thumb here
    return '/images/not-found.gif';
  }
  $thumb_dir = dirname($filespec) . DIRECTORY_SEPARATOR . 'thumbs';
  if(!is_dir($thumb_dir)) mkdir($thumb_dir, 0777, TRUE);
  $thumb_filespec = $thumb_dir . DIRECTORY_SEPARATOR . basename($image_url);
  if(!file_exists($thumb_filespec)) {
    list($w, $h) = getimagesize($filespec);
    $ci = get_instance();
    $ci->load->library('image_lib');
    $config['source_image'] = $filespec;
    $config['new_image'] = $thumb_filespec;
    $config['width'] = 300;
    $config['height'] = 300;
    $config['maintain_ratio'] = TRUE;
    $config['master_dim'] = ($w > $h) ? 'width' : 'height';
    $ci->image_lib->initialize($config);
    $ci->image_lib->resize();
  }
  return str_replace($_SERVER['DOCUMENT_ROOT'], '', $thumb_filespec);
}

