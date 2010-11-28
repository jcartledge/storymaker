<?php $this->load->helper(array('icon', 'story')); ?>
<?php
  $data = array('page_size' => $page_size, 'num_stories' => $num_stories);
  echo $this->load->view('story/list-pager', $data);
?>
<ul><?php foreach ($stories as $story) { ?>
  <li>
    <?php if(isset($actions)) foreach($actions as $action) echo story_action($action, $story); ?>
    <?php echo anchor('/story/view/' . $story->id, $story->title, array('class' => 'story')); ?>
  </li><?php } ?>
  <?php if(!count($stories)) { ?><li>There are no stories to display.</li><?php } ?>
</ul>
