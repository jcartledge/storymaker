<html>
  <head>
    <title><?php echo isset($title) ? $title : 'Small Histories'; ?></title>
  </head>
  <body>
    <a href="/"><img src="/images/homepage.png" alt="Small Histories - a site on the web for the collection and sharing of personal stories"></a>
    <?php echo $content_for_layout; ?>
    <script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
    <script type="text/javascript">
      _uacct = "UA-2295761-1";
      urchinTracker();
    </script>
  </body>
</html>
