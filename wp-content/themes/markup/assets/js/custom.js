/* Custom JS File */

(function($) {

	"use strict";

	jQuery(document).ready(function() {
    	// Slider JS
    	$('.banner-slider').slick({
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 10000,
			dots: false,
			arrows: true,
			nextArrow: '<button class="slick-arrow next-arrow"><i class="fa fa-angle-right"></i></button>',
            prevArrow: '<button class="slick-arrow prev-arrow"><i class="fa fa-angle-left"></i></button>',
            appendArrows: '.banner-nav',
	      	
    	})


        // Boxes Section
	    $('.promo-three').slick({
	        dots: true,
	        infinite: true,
	        speed: 500,
	        slidesToShow: 3,
	        slidesToScroll: 3,
	        arrows: false,
	        responsive: [
				{
				  breakpoint: 767,
				  settings: {
				    slidesToShow: 1,
	        		slidesToScroll: 1,
				  }
				}
			]
	    });
		// Initialize gototop for carousel
		if ( $('#toTop').length > 0 ) {
		    // Hide the toTop button when the page loads.
		    $("#toTop").css("display", "none");

		      // This function runs every time the user scrolls the page.
		      $(window).scroll(function(){
		        // Check weather the user has scrolled down (if "scrollTop()"" is more than 0)
		        if($(window).scrollTop() > 0){
		          // If it's more than or equal to 0, show the toTop button.
		          $("#toTop").fadeIn("slow");
		      }
		      else {
		          // If it's less than 0 (at the top), hide the toTop button.
		          $("#toTop").fadeOut("slow");
		      }
		  	});

			// When the user clicks the toTop button, we want the page to scroll to the top.
			jQuery("#toTop").click(function(event){

				// Disable the default behaviour when a user clicks an empty anchor link.
				// (The page jumps to the top instead of // animating)
				event.preventDefault();
				// Animate the scrolling motion.
				jQuery("html, body").animate({
					scrollTop:0
				},"slow");
			});
	  	}
	    
 	}); 
 	
})(jQuery);