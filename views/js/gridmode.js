(function ($) {
	$(document).ready(function(){
		
	});
	$(window).load(function(){
		// initialize Isotope
		var $container = $('.grid').isotope({
		  	itemSelector: '.zl_postgrid'
		});
		// layout Isotope again after all images have loaded
		$container.imagesLoaded( function() {
		  $container.isotope('layout');
		});
	})
})(jQuery);