<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo isset($title) ? $title : 'Small Histories'; ?></title>
    <script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
    <script src="<?php echo site_url('js/jquery-ui-1.8.6.custom.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo site_url('css/global.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('css/main.css'); ?>" type="text/css">
  </head>
  <body>
    <div id="content">
      <?php echo $content_for_layout; ?>
    </div>
  </body>
</html>
