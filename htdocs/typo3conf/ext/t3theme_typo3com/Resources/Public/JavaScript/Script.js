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

		// Isotope
		var $isotope = $('.isotope-items').isotope({
			itemSelector: '.isotope-item',
			layoutMode: 'fitRows',
			percentPosition: true,
			transitionDuration: '0.2s'
		});
		$isotope.on('layoutComplete', function() {
			$(window).trigger('calculate.bk2k.equalheight');
		});
		$isotope.imagesLoaded().progress( function() {
			$isotope.isotope('layout');
		});

		$(document).on('click', '.isotope-filter', function() {
			var $activeFilters = $('.isotope-filter.active'),
				$isotope = $(this).closest('.isotope-container').find('.isotope-items'),
				filterCfg = '*';

			if ($activeFilters.length > 0) {
				filterCfg = [];
				$activeFilters.each(function(_, filter) {
					var filterId = $(filter).data('category');
					filterCfg.push('[data-' + filterId + ']');
				});
				filterCfg = filterCfg.join(',');
			}

			$isotope.isotope({
				filter: filterCfg
			});
		});
	});
})(jQuery);