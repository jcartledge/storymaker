<html>
  <head>
  <script>window.base_url = "<?php echo base_url(); ?>";</script>
    <script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
    <script src="<?php echo site_url('js/jquery-ui-1.8.6.custom.min.js'); ?>"></script>
    <script src="<?php echo site_url('js/jquery.lightbox-0.5.pack.js'); ?>"></script>
    <script src="<?php echo site_url('js/jquery.cycle.lite.min.js'); ?>"></script>
    <script src="<?php echo site_url('js/jquery.center.js'); ?>"></script>
    <script src="<?php echo site_url('js/instant.js'); ?>"></script>
    <script src="<?php echo site_url('js/story.js'); ?>"></script>
    <script src="<?php echo site_url('js/layouts/' . $story->layout . '.js'); ?>"></script>
<?php if($owner){ ?>
    <script>window.layout = "<?php echo $story->layout; ?>";</script>
    <script src="<?php echo site_url('js/layouts/owner.js'); ?>"></script>
<?php } ?>
    <link rel="stylesheet" href="<?php echo site_url('css/global.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('css/story.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('css/jquery.lightbox-0.5.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('css/layouts/' . $story->layout . '.css'); ?>" type="text/css">
    <title><?php echo isset($title) ? $title : 'Small Histories'; ?></title>
  </head>
  <body class="story-page <?php echo $story->layout; ?>-layout">
    <?php echo $this->load->view('manage/nav'); ?>
    <h1><a href="<?php echo site_url(''); ?>">Small Histories</a></h1>
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
