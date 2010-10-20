<div class="comments">
  <?php foreach($comments as $comment) echo $this->load->view('comment/view', array('comment' => $comment)); ?>
  <?php echo $this->load->view('comment/form'); ?>
</div>
