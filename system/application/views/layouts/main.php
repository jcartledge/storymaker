<html>
  <head>
    <title><?php echo isset($title) ? $title : 'Small Histories'; ?></title>
    <link rel="stylesheet" href="/css/global.css" type="text/css">
    <link rel="stylesheet" href="/css/main.css" type="text/css">
  </head>
  <body>
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
