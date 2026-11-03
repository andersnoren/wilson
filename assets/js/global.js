jQuery(document).ready(function($) {

	// Toggle mobile-menu
	$(".nav-toggle").on("click", function(){	
		$(this).toggleClass("active");
		$(this).attr("aria-expanded", $(this).hasClass("active") ? "true" : "false");
		$(".mobile-menu").slideToggle();
	});
		
	// Show mobile-menu > 800
	$(window).on("resize", function() {
		if ($(window).width() > 800) {
			$(".toggle").removeClass("active").attr("aria-expanded", "false");
			$(".mobile-menu").hide();
		}
	});
	
			
	// resize videos after container
	var vidSelector = ".post iframe, .post object, .post video, .post embed, .widget-content iframe, .widget-content object, .widget-content iframe";	
	var resizeVideo = function(sSel) {
		$( sSel ).each(function() {
			var $video = $(this),
				$container = $video.parent(),
				iTargetWidth = $container.width();

			if ( !$video.attr("data-origwidth") ) {
				$video.attr("data-origwidth", $video.attr("width"));
				$video.attr("data-origheight", $video.attr("height"));
			}

			var ratio = iTargetWidth / $video.attr("data-origwidth");

			$video.css("width", iTargetWidth + "px");
			$video.css("height", ( $video.attr("data-origheight") * ratio ) + "px");
		});
	};

	resizeVideo(vidSelector);

	$(window).on("resize", function() {
		resizeVideo(vidSelector);
	});
	
	// Smooth scroll to header
    $('.tothetop').on("click", function(){
		$('html,body').animate({scrollTop: 0}, 500);
		$(this).off("mouseenter mouseleave");
        return false;
    });
	

});