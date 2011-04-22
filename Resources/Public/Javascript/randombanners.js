
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
			url: 'index.php?type=69&tx_randombanners_list[action]=list&tx_randombanners_list[controller]=Banner&tx_randombanners_list[numberOfBannersShown]=' + parseInt($('#randombannersNumber').html()),
			success: function(html) {
				$('#randombanners').append(html);
			}
		});
	}
});