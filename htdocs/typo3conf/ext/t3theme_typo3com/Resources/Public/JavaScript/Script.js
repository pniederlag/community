jQuery.noConflict();

(function($) {
	$(document).ready(function() {

		//------------------------------------------------------------------------------------------------------------------
		// main navigation
		//------------------------------------------------------------------------------------------------------------------
		$('.header-burger-menu-link').click( function() {
			$(this).toggleClass('active');

			$('.burger-navigation')
				.toggleClass('closed')
				.toggleClass('open');
		});

	});
})(jQuery);