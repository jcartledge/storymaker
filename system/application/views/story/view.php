<div class="story-owner"> Author: <?php echo $story->username; ?></div> 
<div class="story">
  <h2 class="story-title"><?php echo $story->title; ?></h2>
  <h3 class="story-description"><?php echo $story->description; ?></h3>
  <?php echo $this->load->view('story/pager', array('story' => $story, 'class' => 'top')); ?>
  <div class="story-items">
    <?php foreach($story->items as $item) echo $this->load->view('item/view', array('item' => $item, 'page' => $story->page)); ?>
  </div>
  <?php echo $this->load->view('story/pager', array('story' => $story, 'class' => 'bottom')); ?>
  <a class="comments-link" href="/comment/story/<?php echo $story->id; ?>">Comments</a>
</div>
