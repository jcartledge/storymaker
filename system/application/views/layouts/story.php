<html>
  <head>
    <script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
    <script src="/js/jquery.lightbox-0.5.pack.js"></script>
    <link rel="stylesheet" href="/css/jquery.lightbox-0.5.css" type="text/css">
    <title><?php echo isset($title) ? $title : 'Small Histories'; ?></title>
  </head>
  <body>
    <a href="/"><img src="/images/homepage.png" alt="Small Histories - a site on the web for the collection and sharing of personal stories"></a>
    <?php echo $content_for_layout; ?>
    <script>$(function(){ $('.story-item a').lightBox(); });</script>
    <script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
    <script type="text/javascript">
      _uacct = "UA-2295761-1";
      urchinTracker();
    </script>
  </body>
</html>
