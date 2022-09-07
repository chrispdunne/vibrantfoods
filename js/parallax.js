(function ($) {
  $( document ).ready( function() {
    const items = $('.parallaxBG');
    
    const handleScroll = function() {
      items.each(function(){
        const el = $(this);
        const y = window.scrollY + window.innerHeight;
        const elY = el.offset().top;
        const progress = 1 - (elY / y);
        if (y >= elY || elY < window.innerHeight) {
          el.css('transform', 'rotate(90deg) translateX(' + 300 * progress + '%)');
        }  
      });
    }
    
    $( window ).scroll(function() {
      handleScroll();
    });

  });
})(jQuery);