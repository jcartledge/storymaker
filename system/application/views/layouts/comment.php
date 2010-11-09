<html>
  <head>
    <title><?php echo isset($title) ? $title : 'Small Histories'; ?></title>
    <script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
    <script src="/js/jquery-ui-1.8.5.custom.min.js"></script>
    <link rel="stylesheet" href="/css/global.css" type="text/css">
    <link rel="stylesheet" href="/css/main.css" type="text/css">
  </head>
  <body>
    <div id="content">
      <?php echo $content_for_layout; ?>
    </div>
  </body>
</html>
