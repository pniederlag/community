
function clickBanner(el) {
	$.ajax({
		url: 'index.php?type=69&tx_randombanners_list[action]=show&tx_randombanners_list[banner]=' + parseInt($(el).attr('rel')) +'&tx_randombanners_list[controller]=Banner',
		success: function(backData) {
			return true;
		}
	});
}

$(document).ready(function() {
	if ($('#randombanners').length > 0) {
		$.ajax({
			url: 'index.php?type=69&tx_randombanners_list[action]=list&tx_randombanners_list[controller]=Banner&tx_randombanners_list[numberOfBannersShown]=4',
			success: function(html) {
				$('#randombanners').append(html);
			}
		});
	}
});

//http://www.deploy.dev.t3o-relaunch-week.de/home.html?tx_randombanners_list%5Bbanner%5D=6&tx_randombanners_list%5Baction%5D=show&tx_randombanners_list%5Bcontroller%5D=Banner
//http://www.deploy.dev.t3o-relaunch-week.de/home.html?tx_randombanners_list%5Bbanner%5D=2&tx_randombanners_list%5Baction%5D=show&tx_randombanners_list%5Bcontroller%5D=Banner