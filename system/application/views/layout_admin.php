<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="/css/omni_style.css" rel="stylesheet" type="text/css">
    <title>ADMIN :: <?php echo $this->title; ?></title>
    <?php echo Controller::scriptTags(); ?>
    <?php echo Controller::linkTags(); ?>
  </head>
  <body>
    <div id="header"><a href="http://www.smallhistories.com/"><img src="/images/SHgreylogo.gif" width="178" height="24"  border="0"></a></div>
    <?php echo $this->render($this->load-view('admin_nav'); ?>
    <div id="mainadmin">
      <?php echo $content_for_layout; ?>
    </div>
    <script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
    </script>
    <script type="text/javascript">
      _uacct = "UA-2295761-1";
      urchinTracker();
    </script>
  </body>
</html>
