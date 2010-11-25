<h2>What is this site about?</h2>
<p>Small Histories is a place on the web to keep, share and compare your personal stories. Its purpose is to record and present different people's life stories to the online world - stories that may otherwise be lost, and that others may not have seen. </p>     <p>It's also designed to  link your stories to those of other people so your stories can be illuminated in new ways by offering different perspectives on times, events, people or experiences. </p>
<p>This site is the basis for my PhD research  at the Animation and Interactive Multimedia centre, RMIT University, Melbourne, Australia. </p>

<div class="homepage-stories">
  <?php foreach($homepage_stories as $homepage_story) { ?><div class="homepage-story">
    <a href="<?php echo site_url('story/view/' . $homepage_story->story_id); ?>">
      <img src="<?php echo thumbnail_url($homepage_story->attachment); ?>">
      <p><?php echo $homepage_story->title . ' - ' . $homepage_story->description; ?></p>
    </a>
  </div><?php } ?>
</div>
<script>$(function() {
  $('.homepage-story img').addClass('instant');
  $('.homepage-stories').cycle({timeout: 10000, pause: true});
});</script>

<a href="<?php echo site_url('story'); ?>">All stories</a>

<h2>How does it work?</h2>
<p>Once you're a member of this site you will be able to log in and upload items (text, images, video, sound and other files), then order them in a way that creates a story.</p>
<p>You will choose how you want your story to be presented. Anybody visiting the website, member or not, will then be able to view your story.</p>
<p>If you would like to add a story, you can become a member by emailing me here: stefan.schutt (at) vu.edu.au</p>
<p>If you are a member you can <a href="<?php echo site_url('auth/login'); ?>">log in here</a></p>

<p><strong>NOTE: THIS SITE IS UNFINISHED AND IN DEVELOPMENT. STAY TUNED - IT'S BEING FIDDLED WITH AND TUNED UP AS YOU READ.</strong></p>
