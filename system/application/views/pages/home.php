<h2>What is this site about?</h2>

<p>This website has been designed to help you keep, share and compare your teaching stories. It is an experiment in recording and presenting different people's workplace stories to the world and each other. It is based on the <a href="http://www.smallhistories.com/">Small Histories project and website</a>, a PhD project by Melbourne narrative researcher Stefan Schutt.</p>

<p>This site is part of <a href="http://www.teachingmen.com.au/">Teaching Men</a>, a research study by Ian Davis that explores how text and context, trope and history, narrative and construction operate within educational settings to produce and promote strategic styles of masculinity. This project highlights the importance of narrative, fictional and otherwise, in the practice and design of teaching, education and masculinity.</p>

<p>Ian and Stefan worked together on this site. Please let us know if you have any thoughts or comments about it.</p>

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
