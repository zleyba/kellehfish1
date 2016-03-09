/**
 * Created by zleyba on 2/2/16.
 */
$(document).ready(function() {
	$(window).on('scroll', function() {
		if (Math.round($(window).scrollTop()) > 100) {
			$('.navbar').addClass('scrolled');
		} else {
			$('.navbar').removeClass('scrolled');
		}
	});
});