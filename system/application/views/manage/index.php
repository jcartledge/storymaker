<div class="items">
  <h2>My items</h2>
  <a class="add-item" href="<?php echo site_url('item/add'); ?>"><?php echo icon('add'); ?> Add an item</a>
  <?php echo $this->load->view('item/manage-list', array('items' => $items, 'actions' => array('delete'))); ?>
</div>
<div class="stories">
  <h2>My stories</h2>
  <a class="add-story" href="<?php echo site_url('story/add'); ?>"><?php echo icon('add'); ?> Add a story</a>
  <?php echo $this->load->view('story/manage-list', array('stories' => $stories, 'actions' => array('delete', 'edit'))); ?>
</div>
<script>
$(function(){
  $('img.icon').tooltip({ showURL:false });
  $('a.item').live('click', function(){
    var self = $(this);
    var container = self.next('.item-preview');
    if(container.length) {
      $('.item-preview').not(container).slideUp();
      container.slideToggle();
    } else {
      self.addClass('loading');
      container = $('<div class="item-preview">');
      container.load(this.href, [], function(){
        $(this).hide().insertAfter(self)
        self.removeClass('loading');
        $('.item-preview').slideUp();
        $(this).slideDown();
        $('.item-attachment a').lightBox();
      });
    }
    return false;
  });
  $('a.story').live('click', function(){
    var self = $(this);
    var container = self.next('.story-preview');
    if(container.length) {
      $('.story-preview').not(container).slideUp();
      container.slideToggle();
    } else {
      self.addClass('loading');
      container = $('<div class="story-preview">');
      container.load(this.href.replace(/view/, 'preview') + ' .story-preview>*', [], function(){
        $(this).hide().insertAfter(self);
        self.removeClass('loading');
        $('.story-preview').slideUp();
        $(this).slideDown();
      });
    }
    return false;
  });
});
</script>
