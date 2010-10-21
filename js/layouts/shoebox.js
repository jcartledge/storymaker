$.fn.centerInClient = function(options) {
    /// <summary>Centers the selected items in the browser window. Takes into account scroll position.
    /// Ideally the selected set should only match a single element.
    /// </summary>    
    /// <param name="fn" type="Function">Optional function called when centering is complete. Passed DOM element as parameter</param>    
    /// <param name="forceAbsolute" type="Boolean">if true forces the element to be removed from the document flow 
    ///  and attached to the body element to ensure proper absolute positioning. 
    /// Be aware that this may cause ID hierachy for CSS styles to be affected.
    /// </param>
    /// <returns type="jQuery" />
    var opt = { forceAbsolute: false,
                container: window,    // selector of element to center in
                completeHandler: null
              };
    $.extend(opt, options);
   
    return this.each(function(i) {
        var el = $(this);
        var jWin = $(opt.container);
        var isWin = opt.container == window;

        // force to the top of document to ENSURE that 
        // document absolute positioning is available
        if (opt.forceAbsolute) {
            if (isWin)
                el.remove().appendTo("body");
            else
                el.remove().appendTo(jWin.get(0));
        }

        // have to make absolute
        el.css("position", "absolute");

        // height is off a bit so fudge it
        var heightFudge = isWin ? 2.0 : 1.8;

        var x = (isWin ? jWin.width() : jWin.outerWidth()) / 2 - el.outerWidth() / 2;
        var y = (isWin ? jWin.height() : jWin.outerHeight()) / heightFudge - el.outerHeight() / 2;

        el.css("left", x + jWin.scrollLeft());
        el.css("top", y + jWin.scrollTop());

        // if specified make callback and pass element
        if (opt.completeHandler)
            opt.completeHandler(this);
    });
}

$(function(){
    $('body').append('<div class="loading" style="position:absolute; top:0; left:0; width:100%; height:100%; background-color:#333; opacity:0.9;"><img src="/images/ajax-loader.gif"></div>');
    $('.loading img').centerInClient();
  var ww = $(window).width(), wh = $(window).height();
  $('.item-attachment img').hide().each(function() {
    var el = $(this),
        l = Math.random() * (ww - 500) + 'px',
        t = Math.random() * (wh - 500) + 'px';
    el.css({'position': 'absolute', 'top': t, 'left': l});
    this.src = this.parentNode.href;
  }).addClass('instant');
  $('.item-attachment').draggable({'stack': '.item-attachment'});
  $('.item-attachment a').click(function() { return false; });
});

function instant_done() {
  $('.item-attachment canvas').show();
  $('.loading').fadeOut();
}

