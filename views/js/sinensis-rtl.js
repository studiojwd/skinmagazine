
/* Instagram Feed */
function instagram() {
	(function ($) {
		'use strict';
		if ($('body').has('#instafeed')) {
			$('#instafeed').each(function () {
				var instaID = $('#instafeed');
				var instalink = instaID.find('.zl_insta').find('a');
				var fetch = instaID.data('number');
				var userid = instaID.data('user');
				var accesstoken = instaID.data('actok');
				var feed = new Instafeed({
					get: 'user',
					userId: userid,
					accessToken: accesstoken,
					limit: fetch,
					resolution: 'thumbnail',
					template: '<div class="small-4 column"> <div class="zl_insta" title="{{caption}}"> <div> <a href="{{link}}" target="_blank" class="abs" rel="prettyPhoto[pp_gal_insta]"><img src="{{image}}" alt=""/></a>  </div> </div> </div>'/*,
					after: function () {
						$('#instafeed .zl_insta a').prettyPhoto(prettOptions);
					},
					success: function () {
						$('#instafeed .zl_insta a').prettyPhoto(prettOptions);
					}*/
				});
				feed.run();
			});
		}
		
	})(jQuery);

}

/* Flickr */
function flickrInit() {
	(function ($) {
		'use strict';
		if ($('body').has('.flickr')) {
			$('.flickr').each(function () {
				var $this = $(this);
				var append = $this.find('.flickrdom');
				var id = append.data('id');
				var fetch = append.data('itemfetch');
				$this.jflickrfeed({
					limit: fetch,
					qstrings: {
						id: id
					},
					itemTemplate: '<div class="small-4 column"> <div class="zl_insta"> <a href="{{image_b}}" rel="prettyPhoto[pp_gal_insta]"><img src="{{image_s}}" alt="{{title}}" /></a></div></div>'
				}, function (data) {
					//$('.flickr a').prettyPhoto(prettOptions);
				});
			});
		}
	})(jQuery);
}


/* Theme effects */
function thememandatory(){
	(function ($) {
		'use strict';

		/* Search Effect */
		$('.zl_srctrigger, .m_src_tr').click(function(){
			$('.zl_searchscreen').fadeIn(200);
			$('.zl_src_form input').focus();
			$('.searchlabel').addClass('animated fadeInDown').removeClass('fadeOutUp')
			$('.zl_src_form input').addClass('animated fadeInUp').removeClass('fadeOutDown')
		});

		/* close search */
		$('.zlsrc_closer').click(function(){
			$('.searchlabel').removeClass('fadeInDown').addClass('fadeOutUp');
			$('.zl_src_form input').removeClass('fadeInUp').addClass('fadeOutDown');
			$('.zl_searchscreen').delay( 800 ).fadeOut(200);
		});

		/* Close search with Esc Key */
		$('.zl_searchscreen').keyup(function(e) {
		  	if (e.keyCode == 27) { 
		  		$('.searchlabel').removeClass('fadeInDown').addClass('fadeOutUp');
				$('.zl_src_form input').removeClass('fadeInUp').addClass('fadeOutDown');
				$('.zl_searchscreen').delay( 800 ).fadeOut(200);
		  	}   // esc
		});


		// Footer
		$('.zl_morefooter').click(function(){
			$('.mf_content').slideToggle();
			$('html, body').animate({
		        scrollTop: $(".mf_content").offset().top
		    }, 500);
		});

		// Wrap Span
		$("#zl_footer h3.widget-title").each(function(){
			$(this).wrapInner('<span>');
		});
		
		// Social
		$('.prettySocial').prettySocial();

		// Responsive Video
		$(".zl_content").fitVids();

		// Responsive Top Menu
		$('.zl_tbmt').funcToggle('click', function() {
		   	$('.m_zl_topmenu').show();
			$('.zl_tbmt .fa').toggleClass('fa-navicon fa-close');
		}, function() {
		    $('.m_zl_topmenu').hide();
			$('.zl_tbmt .fa').toggleClass('fa-close fa-navicon');
		});


		// Responsive Category Menu
		$('.zl_m_nav').funcToggle('click', function() {
		   	$('.m_cat_menu').show();
		}, function() {
		    $('.m_cat_menu').hide();
		});

		// Lightbox Gallery 
		 $('.format-image .zl_postthumb a, .gallery-item a').magnificPopup({
			type: 'image',
			closeOnContentClick: true,
			closeBtnInside: false,
			fixedContentPos: true,
			mainClass: 'mfp-no-margins mfp-with-zoom', 
			image: {
				verticalFit: true
			},
			zoom: {
				enabled: true,
				duration: 300 // don't foget to change the duration also in CSS
			}
        });

		// Lightbox Gallery 
		 $('.gallery-item a, .tiled-gallery-item a, .post-gallery a').magnificPopup({
			type: 'image',
			closeOnContentClick: true,
			closeBtnInside: false,
			fixedContentPos: true,
			mainClass: 'mfp-no-margins mfp-with-zoom', 
			image: {
				verticalFit: true
			},
			zoom: {
				enabled: true,
				duration: 300 // don't foget to change the duration also in CSS
			},
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			},
        });

	})(jQuery);
}


function featuredSlider(){
	(function ($) {
		'use strict';
		if($('#featuredslider').length){
			$('#featuredslider').owlCarousel({
			    items:2,
			    loop:true,
			    rtl: true,
			    autoHeight: false,
			    onInitialized : function(){
			    	$('.slideLoader').addClass('zl_is_loaded');
			    },
			    responsive:{
				    0:{
			            items:1,
			        },
			        600:{
			            items:1,
			        },
			        800:{
			            items:2,
			        }
		        }
			});
		}
		
	})(jQuery);
}

function slideGallery(){
	(function ($) {
		'use strict';
		if($('.post-gallery').length){
			$('.post-gallery').each(function(){
				$(this).owlCarousel({
				    items:1,
				    loop: false,
				    dots: false,
				    nav: true,
				    rtl: true,
				    navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
				    autoHeight: false
				});
			});
		}
	})(jQuery);
}


function postSlide(){
	(function ($) {
		'use strict';
		if($('.zl_psw').length){
			$('.zl_psw').each(function(){
				$(this).owlCarousel({
				    items: 1,
				    dots: false,
				    nav: true,
				    navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
				    autoHeight: false,
				    rtl: true,
				    animateIn: 'fadeIn',
				    animateOut: 'fadeOut',
				});
			});
		}
	})(jQuery);
}


function twitterSlide(){
	(function ($) {
		'use strict';
		$('.zl_twitter_slide').owlCarousel({
		    items:1,
		    loop:true,
		    rtl: true,
		    autoHeight: true
		});
	})(jQuery);
}



// Fire the functions
(function ($) {

	$(window).load(function() {
		'use strict';
	 	$('.tiled-gallery').fadeIn();
	});
	$(document).ready(function(){
		instagram();
		featuredSlider();
	 	postSlide();
	 	slideGallery();
		flickrInit();
		thememandatory();
		twitterSlide();
	});
})(jQuery);