<p><strong>What is this site about?</strong></p>
<p>Small Histories is a place on the web to keep, share and compare your personal stories. Its purpose is to record and present different people's life stories to the online world - stories that may otherwise be lost, and that others may not have seen. </p>     <p>It's also designed to  link your stories to those of other people so your stories can be illuminated in new ways by offering different perspectives on times, events, people or experiences. </p>
<p>This site is the basis for my PhD research  at the Animation and Interactive Multimedia centre, RMIT University, Melbourne, Australia. </p>

<p><strong>How does it work?</strong></p>
<p>Once you're a member of this site you will be able to log in and upload items (text, images, video, sound and other files), then order them in a way that creates a story.</p>
<p>As part of this process, you will be asked to link to at least one item already uploaded to the site.</p>
<p>Lastly, you will choose how you want your story to be presented. Anybody visiting the website, member or not, will then be able to view your story.</p>
<p>The public website with other people's stories is <a href="http://www.smallhistories.com/" target="_blank" class="whiteLink">here</a>.</p>
<p>If you would like to add a story, you can become a member by emailing me here: stefan.schutt (at) vu.edu.au</p>
<p>If you are a member you can <a href="/auth/login">log in here</a></p>
<p><strong>NOTE: THIS SITE IS UNFINISHED AND IN DEVELOPMENT. STAY TUNED - IT'S BEING FIDDLED WITH AND TUNED UP AS YOU READ. (JUNE 2007)</strong></p>

<div class="latest-stories">
  <h3>Latest stories</h3>
  <?php echo $this->load->view('story_list', array('stories' => $latest_stories)); ?>
</div>

<div class="popular-stories">
  <h3>Popular stories</h3>
  <?php echo $this->load->view('story_list', array('stories' => $popular_stories)); ?>
</div>

<div class="random-stories">
  <h3>Random stories</h3>
  <?php echo $this->load->view('story_list', array('stories' => $random_stories)); ?>
</div>

<?php echo $this->load->view('story_search_form'); ?>

<a href="/story">All stories</a>
