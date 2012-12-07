
BannerRotator = function(selector) {
	this.containerCount =  4;
	this.switchPause = 4000;
	this.switchDelay = 100;

	if ($(selector).length == 0) {
		return;
	}

	this.bannerCount = $(selector + " div.tx-randombanners-item").length;

	this.initialize = function() {
		this.combinations = this.createCombinations(this.containerCount, this.generateIterativeArray(this.bannerCount));
		this.hitCombinations = [];

		for (i = 1; i < this.containerCount; i++) {
			$(selector + " .tx-randombanners:eq(0)").clone().insertAfter(selector + " .tx-randombanners:eq(0)").hide();
		}
		for (i = 1; i < this.containerCount; i+=2) {
			$(selector + " .tx-randombanners").eq(i).addClass('rightbanner');
		}
		this.animate();
	};

	this.generateIterativeArray = function(limit) {
		array = [];
		for (i = 0; i < limit; i++) {
			array.push(i);
		}
		return array;
	};

	this.activateCombination = function(combination) {
		indexOrder = this.generateOrdering();
		this.activateBannerInBox(0, indexOrder, combination);
	};

	this.activateBannerInBox = function(iterationIndex, indexOrder , combination) {
		var self = this;
		boxId = indexOrder[iterationIndex];
		$(selector + " .tx-randombanners").eq(boxId).find('.tx-randombanners-item').hide().eq(combination[boxId]).fadeIn(this.switchDelay, function() {
			if (iterationIndex < indexOrder.length - 1) {
				self.activateBannerInBox(iterationIndex + 1, indexOrder, combination);
			}
		});
		$(selector + " .tx-randombanners").eq(boxId).show();
	};

	this.generateOrdering = function() {
		orderings = this.createCombinations(this.containerCount, this.generateIterativeArray(this.containerCount));
		return orderings[Math.floor((Math.random() * orderings.length))];
	};

	this.animate = function() {
		if (this.combinations.length == 0 && this.hitCombinations.length > 0) {
			this.combinations = this.hitCombinations;
			this.hitCombinations = [];
		}
		nextCombinationIndex = Math.floor((Math.random() * this.combinations.length));
		this.activateCombination(this.combinations[nextCombinationIndex]);
		this.hitCombinations.push(this.combinations[nextCombinationIndex]);
		this.combinations.slice(nextCombinationIndex, 1);

		var self = this;
		window.setTimeout(function() {self.animate()}, this.switchPause);
	};

	this.createCombinations = function(num, source) {
		var combinations = [];
		if (num == 1) {
			for (i = 0; i < source.length; i++) {
				combinations.push([source[i]]);
			}
		} else {
			for (var i = 0; i < source.length; i++) {
				var newSource = source.slice(0);
				newSource.splice(i, 1);
				var subCombinations = this.createCombinations(num - 1, newSource);
				for (j = 0; j < subCombinations.length; j++) {
					var currentCombination = [source[i]].concat(subCombinations[j]);
					combinations.push(currentCombination);
				}
			}
		}
		return combinations;
	};
};

function clickBanner(el) {
	$.ajax({
		url: '/index.php?type=69&tx_randombanners_list[action]=show&tx_randombanners_list[banner]=' + parseInt($(el).attr('data-itemId')) +'&tx_randombanners_list[controller]=Banner',
		success: function(backData) {
			return true;
		}
	});
}

function initBanners() {
	/* platin members at the left navigation */
	if($(".d.navigationbanners .tx-randombanners").length > 0) {
		var container = $('#randombanners .tx-randombanners');
		var banners = $(".d.navigationbanners .tx-randombanners-item");
		var numBanners = banners.length;
		for(var i=0; i< 4; i++) {
			var banner = banners[Math.floor(Math.random() * numBanners)];
			container.prepend(banner);
		}

		banners.each(function(){
			if($(this).index() > 1)
				$(this).css("display","none");
		});
		$(".d.navigationbanners .tx-randombanners-item:eq(0), .d.navigationbanners .tx-randombanners-item:eq(1)").addClass("shown");
	}


	/* platin members at the homepage */
	if($(".gc .tx-randombanners").length > 0) {

	}
}


$(document).ready(function() {
	if ($('#randombanners')) {
		initBanners();
		var rotator = new BannerRotator("#randombanners");
		rotator.initialize();
	}
});