<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo isset($title) ? $title : $this->config->item('title'); ?></title>
    <script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
    <script src="<?php echo site_url('js/jquery-ui-1.8.6.custom.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo site_url('css/global.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('css/auth.css'); ?>" type="text/css">
  </head>
  <body>
    <?php echo $this->load->view('manage/nav'); ?>
    <h1><a href="<?php echo site_url(); ?>"><?php echo $this->config->item('site_name'); ?></a></h1>
    <div id="content">
      <?php echo $content_for_layout; ?>
    </div>
    <?php echo $this->load->view('footer'); ?>
    <script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
    <script type="text/javascript">
      _uacct = "UA-2295761-1";
      urchinTracker();
    </script>
  </body>
</html>
