<html>
  <head>
    <script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
    <script src="/js/jquery-ui-1.8.5.custom.min.js"></script>
    <script src="/js/jquery.lightbox-0.5.pack.js"></script>
    <script src="/js/jquery.cycle.lite.min.js"></script>
    <script src="/js/instant.js"></script>
    <script src="/js/story.js"></script>
    <script src="/js/layouts/<?php echo $story->layout; ?>.js"></script>
    <link rel="stylesheet" href="/css/global.css" type="text/css">
    <link rel="stylesheet" href="/css/story.css" type="text/css">
    <link rel="stylesheet" href="/css/jquery.lightbox-0.5.css" type="text/css">
    <link rel="stylesheet" href="/css/layouts/<?php echo $story->layout; ?>.css" type="text/css">
    <title><?php echo isset($title) ? $title : 'Small Histories'; ?></title>
  </head>
  <body class="story-page <?php echo $story->layout; ?>-layout">
    <h1><a href="/">Small Histories</a></h1>
    <div id="content">
      <?php echo $content_for_layout; ?>
      <?php echo $this->load->view('footer'); ?>
    </div>
    <script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
    <script type="text/javascript">
      _uacct = "UA-2295761-1";
      urchinTracker();
    </script>
  </body>
</html>
