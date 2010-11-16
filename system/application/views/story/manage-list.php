<?php $this->load->helper(array('icon', 'story')); ?>
<ul><?php foreach ($stories as $story) { ?>
  <li>
    <?php if(isset($actions)) foreach($actions as $action) echo story_action($action, $story); ?>
    <?php echo anchor('/story/view/' . $story->id, $story->title, array('class' => 'story')); ?>
  </li>
<?php } ?></ul>

