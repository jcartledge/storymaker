<html>
  <head>
    <title><?php echo isset($title) ? $title : 'Small Histories'; ?></title>
    <script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
    <script src="/js/jquery-ui-1.8.6.custom.min.js"></script>
    <script src="/js/instant.js"></script>
    <script src="/js/jquery.cycle.lite.min.js"></script>
    <link rel="stylesheet" href="/css/global.css" type="text/css">
    <link rel="stylesheet" href="/css/manage.css" type="text/css">
    <link rel="stylesheet" href="/css/main.css" type="text/css">
  </head>
  <body>
    <?php echo $this->load->view('manage/nav'); ?>
    <h1><a href="/">Small Histories</a></h1>
    <?php echo $this->load->view('story/search_form'); ?>
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
