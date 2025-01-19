gsap.registerPlugin(ScrollTrigger, ScrollSmoother);
ScrollSmoother.create({
	wrapper: '.wrapper',
	content: '.box'
});

(function($){
	$(document).ready(function(){ 

		Fancybox.bind("[data-fancybox]", {
  		// Your custom options
		});

		$(window).on('load resize', function(e){

			let gallery__item = $('.gallery__item');
			let gallery__item_width = gallery__item.width();
			let gallery__item_height = gallery__item_width * 0.75;

			gallery__item.height(gallery__item_height);
		});
		


	});
})(jQuery);