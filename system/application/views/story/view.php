<h2><?php echo $story->title; ?></h2>
<?php foreach($story->items as $item) echo $this->load->view('item/view', array('item' => $item)); ?>
<?php echo $this->load->view('story/pager', array('story' => $story)); ?>
