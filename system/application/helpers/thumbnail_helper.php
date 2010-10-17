<?php

function thumbnail_url($image_url) {
  $filespec = dirname($_SERVER['SCRIPT_FILENAME']) . $image_url;
  $thumb_dir = dirname($filespec) . DIRECTORY_SEPARATOR . 'thumbs';
  if(!is_dir($thumb_dir)) mkdir($thumb_dir, 0777, TRUE);
  $thumb_filespec = $thumb_dir . DIRECTORY_SEPARATOR . basename($image_url);
  if(!file_exists($thumb_filespec)) {
    $ci = get_instance();
    $ci->load->library('image_lib');
    $config['source_image'] = $filespec;
    $config['new_image'] = $thumb_filespec;
    $config['width'] = 200;
    $config['height'] = 200;
    $config['maintain_ratio'] = TRUE;
    $ci->image_lib->initialize($config);
    $ci->image_lib->resize();
  }
  return str_replace(dirname($_SERVER['SCRIPT_FILENAME']), '', $thumb_filespec);
}
