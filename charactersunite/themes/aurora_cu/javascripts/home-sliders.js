// FLEXSLIDER for homepage
(function ($) {
  Drupal.behaviors.homeSlides = {
    attach: function (context, settings) {
      $mainslider = $('#main-slider');
      $secondaryslider = $('.secondary-slider');

      $slideshow = (settings.homeSlides.slideshow !== null)? settings.homeSlides.slideshow : false;
      $slideshowSpeed = (settings.homeSlides.slideshowSpeed !== null)? settings.homeSlides.slideshowSpeed : 7000;

      $(document).ready(function() {
        $mainslider.flexslider({
          animation: 'slide',
          controlNav: true,
          directionNav: true,
          slideshow: true,
          slideshowSpeed: 7000,
          pauseOnHover: true,
          before: function(slider) {
            var target = slider.animatingTo,
              currentSlide = slider.currentSlide;
            $secondaryslider.each(function (index, element) {
              var flexslider = $(element).data('flexslider');
              // Setting the animation direction of the secondary slider to be the
              // same as the primary slider.
              // but ONLY if we have more than one list item
              // else the main slider breaks
              if ($(this).find('li').length > 1) {
                flexslider.direction = slider.direction;
                flexslider.flexAnimate(target, true);
              }
            });
          }
        });
        $secondaryslider.flexslider({
          animation: 'slide',
          controlNav: false,
          directionNav: false,
          slideshow: false,
          touch: false
        });
      });

    },
  };

}(jQuery));
