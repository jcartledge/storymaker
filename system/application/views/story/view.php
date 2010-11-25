<div class="story" id="<?php echo $story->id; ?>">
  <h2 class="story-title"><?php echo $story->title; ?></h2>
  <p class="story-owner"> Author: <?php echo $story->username; ?></p> 
  <h3 class="story-description"><?php echo $story->description; ?></h3>
  <?php echo $this->load->view('story/pager', array('story' => $story, 'class' => 'top')); ?>
  <div class="story-items">
    <?php foreach($story->items as $item) echo $this->load->view('item/view', array('item' => $item, 'page' => $story->page)); ?>
  </div>
  <?php echo $this->load->view('story/pager', array('story' => $story, 'class' => 'bottom')); ?>
</div>
<a class="comments-link" href="<?php echo site_url('comment/story/' . $story->id); ?>">Comments</a>
