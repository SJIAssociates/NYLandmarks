export default {
  init() {
    // JavaScript to be fired on all pages
    function menuMorph(){
			$('.sitewrapper').toggleClass('openNav');
			$('.middle').toggleClass('hidemiddle');
			$('.bottom').toggleClass('rotateup');
			$('.top').toggleClass('rotatedown');
			$('.menu-toggle').toggleClass('collapse');
			$('#mobile-nav').toggleClass('open');
		}
		$('.menu-toggle').click(menuMorph);

    $('.ctct-disclosure a').attr('rel', 'noopener');

    // Check if element is scrolled into view
    function isScrolledIntoView(elem) {
      var docViewTop = $(window).scrollTop();
      var docViewBottom = docViewTop + $(window).height();

      var elemTop = $(elem).offset().top;
      var elemBottom = elemTop + $(elem).height();

      return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }
    // If element is scrolled into view, fade it in

    $(window).scroll(function() {
      $('.scroll-animations .animate__animated').each(function() {
        if (isScrolledIntoView(this) === true) {
          $(this).addClass('animate__fadeIn');
        }
      });
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
