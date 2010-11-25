<div class="items">
  <h2>My items</h2>
  <a class="add-item" href="<?php echo site_url('item/add'); ?>"><?php echo icon('add'); ?> Add an item</a>
  <?php echo $this->load->view('item/manage-list', array('items' => $items, 'actions' => array('delete'))); ?>
</div>
<div class="stories">
  <h2>My stories</h2>
  <a class="add-story" href="<?php echo site_url('story/add'); ?>"><?php echo icon('add'); ?> Add a story</a>
  <?php echo $this->load->view('story/manage-list', array('stories' => $stories, 'actions' => array('edit'))); ?>
</div>
<script>
$(function(){
  $('a.item').live('click', function(){
    var self = $(this);
    var container = self.next('.item-preview');
    if(container.length) {
      self.toggleClass('open');
      container.slideToggle();
    } else {
      self.addClass('loading');
      container = $('<div class="item-preview" visibility="hidden">');
      container.insertAfter(self).load(this.href, [], function(){
        self.removeClass('loading');
        self.addClass('open');
        container.slideDown('slow');
        $('.item-attachment a').lightBox();
      });
    }
    return false;
  });
  $('a.story').live('click', function(){
    var self = $(this);
    var container = self.next('.item-preview');
    if(container.length) {
      self.toggleClass('open');
      container.slideToggle();
    } else {
      self.addClass('loading');
      container = $('<div class="story-preview" visibility="hidden">');
      container.insertAfter(self).load(this.href.replace(/view/, 'preview') + ' .story-preview', [], function(){
        self.removeClass('loading');
        self.addClass('open');
        container.slideDown('slow');
      });
    }
    return false;
  });
});
</script>
