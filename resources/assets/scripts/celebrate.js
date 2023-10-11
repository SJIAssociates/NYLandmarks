/* eslint-disable */
(function($) {
  $(document).ready(function(){

    $('a[href*="#"]')
      // Remove links that don't actually link to anything
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function(event) {
        // On-page links
        if (
          location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
          &&
          location.hostname == this.hostname
        ) {
          // Figure out element to scroll to
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          // Does a scroll target exist?
          if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate({
              scrollTop: target.offset().top
            }, 1000, function() {
              // Callback after animation
              // Must change focus!
              var $target = $(target);
              $target.focus();
              if ($target.is(":focus")) { // Checking if the target was focused
                return false;
              } else {
                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                $target.focus(); // Set focus again
              };
            });
          }
        }
      });

    let slideAdjusted = false;

    const swiper = new Swiper('.swiper', {
      // Optional parameters
      slidesPerView: "auto",
      spaceBetween: 30,
      centeredSlides: true,
      allowTouchMove: false,
      centeredSlidesBounds: true,
      initialSlide: 0,
      watchSlidesProgress: true,
      centerInsufficientSlides: true,
      on: {
        click() {
          console.log('Click Event Start');
            //Close any Slides if they are open
            $('.slide-open').removeClass('slide-open');

            //Move to the slide that was clicked to center
            swiper.slideTo(this.clickedIndex);

            //Add the Class that Opens the Slide
            $(this.clickedSlide).addClass('slide-open');

            swiper.setTranslate(swiper)
            // let openTranslate = (this.clickedIndex * -330) + 600;
            // console.log(openTranslate);
            // $('.swiper-wrapper').css({transform: 'transform3d(5px, 0px, 0px)'});
        },
        navigationNext() {
          console.log("Navigate Next. Slider: " + swiper.translate);
          $('.slide-open').removeClass('slide-open');

        },
        navigationPrev() {

          // if( slideAdjusted == true ) {
          //   swiper.setTranslate(swiper.translate - 100);
          // }

          $('.slide-open').removeClass('slide-open');
        },
      },
      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    });

})(jQuery);
