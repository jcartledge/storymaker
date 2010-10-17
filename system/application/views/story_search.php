<p>Search results for <em><?php echo $search; ?></em></p>
<div class="search-results">
  <?php if($stories) {
    echo $this->load->view('story_list', array('stories' => $stories)); 
  } else { ?>
  <p>No stories matched your query.</p>
  <?php } ?>
</div>
<?php echo $this->load->view('story_search_form', array('search' => $search)); ?>

