<div class="story-owner"> Author: <?php echo $story->username; ?></div> 
<div class="story">
  <h3 class="story-title"><?php echo $story->title; ?></h3>
  <h4 class="story-description"><?php echo $story->description; ?></h4>
  <?php echo $this->load->view('story/pager', array('story' => $story, 'class' => 'top')); ?>
  <div class="story-items">
    <?php foreach($story->items as $item) echo $this->load->view('item/view', array('item' => $item, 'page' => $story->page)); ?>
  </div>
  <?php echo $this->load->view('story/pager', array('story' => $story, 'class' => 'bottom')); ?>
</div>
