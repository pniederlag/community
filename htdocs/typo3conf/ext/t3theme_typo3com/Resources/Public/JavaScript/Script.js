jQuery.noConflict();

(function($) {

	//------------------------------------------------------------------------------------------------------------------
	// main navigation
	//------------------------------------------------------------------------------------------------------------------
	$('.header-burger-menu-link').click( function() {
		$(this).toggleClass('active');

		$('.burger-navigation')
			.toggleClass('closed')
			.toggleClass('open');
	});

	var $isotopeItems = $('.isotope-items');
	if ($isotopeItems.length > 0) {
		$isotopeItems.mixItUp({
			animation: {
				animateChangeLayout: true,
				duration: 200,
				effects: 'fade'
			},
			callbacks: {
				onMixEnd: function () {
					$(window).trigger('calculate.bk2k.equalheight');
					adjustIsotopeContainerHeights($isotopeItems);
				}
			},
			selectors: {
				target: '.isotope-item'
			}
		});

		$(window).on('resize', function() {
			adjustIsotopeContainerHeights($isotopeItems);
		});
	}

	/**
	 * Find items per row and adjust height
	 * @param {Object} $itemContainer
	 */
	function adjustIsotopeContainerHeights($itemContainer) {
		var groups = {},
			$items = $itemContainer.find('[data-isotope="equalheight"]'),
			y = Math.ceil($items.first().offset().top),
			maxHeight = -1;

		// Initially, reset the height of each element
		$items.height('auto');

		$items.each(function(index, item) {
			var $item = $(item),
				positionY = Math.ceil($item.offset().top);

			if (positionY !== y || $items.length === index + 1) {
				if (typeof groups[y] !== 'undefined') {
					groups[y].maxHeight = maxHeight;
				}
				y = positionY;
				maxHeight = -1;
			}

			if (maxHeight < $item.height()) {
				maxHeight = $item.height();
			}

			if (typeof groups[y] === 'undefined') {
				groups[y] = {
					maxHeight: maxHeight,
					items: []
				};
			}
			groups[y].items.push($item);
		});
		$.each(groups, function(y, group) {
			$.each(group.items, function(_, item) {
				$(item).height(group.maxHeight);
			});
		});
	}
})(jQuery);
