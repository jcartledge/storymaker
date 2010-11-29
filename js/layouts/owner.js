$(function() {
  switch(window.layout) {
    case 'scrapbook':
      $('.item-attachment').draggable({
        stack: '.item-attachment',
        stop: function(event, ui) {
          var ia = $(this),
          data = {
            story_id: $('.story')[0].id,
            item_id:  ia.parent('.story-item')[0].id,
            pos_x:    ia.offset()['left'],
            pos_y:    ia.offset()['top']
          };
          ia.css({opacity: 0.5});
          $.get('/teachingmen/item/position', data, function() { ia.css({opacity: 1.0}); });
        }
      });
      break
  }
});
