export default {
  init() {
    // JavaScript to be fired on the home page

    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
          loop:true,
          margin:10,
          items: 1,
          animateOut: 'fadeOut',
          animateIn: 'animate__fadeIn',
          center: true,
          autoplay:true,
          autoplayTimeout:5000,
          autoplayHoverPause:false,
        });
      });
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
