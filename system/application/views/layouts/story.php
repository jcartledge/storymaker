<html>
  <head>
    <script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
    <script src="/js/jquery-ui-1.8.6.custom.min.js"></script>
    <script src="/js/jquery.lightbox-0.5.pack.js"></script>
    <script src="/js/jquery.cycle.lite.min.js"></script>
    <script src="/js/jquery.center.js"></script>
    <script src="/js/instant.js"></script>
    <script src="/js/story.js"></script>
    <script src="/js/layouts/<?php echo $story->layout; ?>.js"></script>
<?php if($owner){ ?>
    <script>window.layout = "<?php echo $story->layout; ?>";</script>
    <script src="/js/layouts/owner.js"></script>
<?php } ?>
    <link rel="stylesheet" href="/css/global.css" type="text/css">
    <link rel="stylesheet" href="/css/story.css" type="text/css">
    <link rel="stylesheet" href="/css/jquery.lightbox-0.5.css" type="text/css">
    <link rel="stylesheet" href="/css/layouts/<?php echo $story->layout; ?>.css" type="text/css">
    <title><?php echo isset($title) ? $title : 'Small Histories'; ?></title>
  </head>
  <body class="story-page <?php echo $story->layout; ?>-layout">
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
