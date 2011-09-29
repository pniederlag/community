var banner_position_array = new Array();
function clickBanner(el) {
	$.ajax({
		url: 'index.php?type=69&tx_randombanners_list[action]=show&tx_randombanners_list[banner]=' + parseInt($(el).attr('rel')) +'&tx_randombanners_list[controller]=Banner',
		success: function(backData) {
			return true;
		}
	});
}

function initBanners() {
	/* platin members at the left navigation */
    if($(".d.navigationbanners .tx-randombanners").length > 0) {
        $(".d.navigationbanners .tx-randombanners-item").each(function(){
            if($(this).index() > 1)
                $(this).css("display","none");
        });
        $(".d.navigationbanners .tx-randombanners-item:eq(0), .d.navigationbanners .tx-randombanners-item:eq(1)").addClass("shown");
    }
    /* platin members at the homepage */
    if($(".gc .tx-randombanners").length > 0) {
		for(var banneri = 0; banneri < 4; banneri++) {
			banner_position_array[banneri] = banneri;
		}
        for(var bannerfields = 0; bannerfields < 3; bannerfields++)
            $(".gc .tx-randombanners:eq(0)").clone().insertAfter(".tx-randombanners:eq(0)");

        for(var bannerfields = 0; bannerfields < 4; bannerfields++){
            if(bannerfields%2 != 0)
                $(".gc .tx-randombanners:eq("+bannerfields+")").addClass("rightbanner");
            $(".gc .tx-randombanners:eq("+bannerfields+")").children(".tx-randombanners-item").addClass("banner"+((bannerfields)));
        }

        $(".gc .tx-randombanners-item").each(function(){
            $(this).css("display","none");
        });
        $(".gc .tx-randombanners:eq(0) .tx-randombanners-item:eq(0), .gc .tx-randombanners:eq(1) .tx-randombanners-item:eq(1), .gc .tx-randombanners:eq(2) .tx-randombanners-item:eq(2), .gc .tx-randombanners:eq(3) .tx-randombanners-item:eq(3)").addClass("shown").fadeIn("slow", function() {

		});

		banner_amount = $(".gc .tx-randombanners:first .tx-randombanners-item").length;
		var rotateNext = function() {
			var banneri = $(this).data('no');
			var next = (banneri + 1)%4;
			current_banner = banner_position_array[banneri];
			new_banner = banner_position_array[banneri] = (banner_position_array[banneri]-1+banner_amount)%banner_amount;
			$(".banner"+banneri+":eq("+current_banner+")").data('banners', {banneri: banneri, new_banner: new_banner}).fadeOut("slow", function() {
				$(".banner"+$(this).data('banners').banneri+":eq("+$(this).data('banners').new_banner+")").fadeIn("slow", function() { $(this).addClass("shown")});
			});
			$('.gc .tx-randombanners:eq(' + next + ')').data('no', next).oneTime((Math.PI + 1) * 1000 /* Why not? */, 'premiumbanner', rotateNext);
		}
		$('.gc .tx-randombanners:eq(0)').data('no', 0).oneTime((Math.PI + 1) * 1000 /* Why not? */, 'premiumbanner', rotateNext);
	}
	
	$(document).everyTime(5000,function(){
        if($(".d.navigationbanners .tx-randombanners").length > 0) {
            var first_shown = $(".d.navigationbanners #randombanners .shown:first").index(".tx-randombanners-item");
            var last_shown = $(".d.navigationbanners #randombanners .shown:last").index(".tx-randombanners-item");
            $(".d.navigationbanners #randombanners .shown").each(function(){
                $(this).removeClass("shown").fadeOut("slow",function(){
                    if(last_shown == $(".d.navigationbanners .tx-randombanners-item:last").index(".tx-randombanners-item") && first_shown == 0){
                        $(".d.navigationbanners .tx-randombanners-item:eq(1), .d.navigationbanners .tx-randombanners-item:eq(2)").fadeIn("slow").addClass("shown");
                    }
                    else if(last_shown == $(".d.navigationbanners .tx-randombanners-item:last").index(".tx-randombanners-item")-1){
                        $(".d.navigationbanners .tx-randombanners-item:eq(0), .d.navigationbanners .tx-randombanners-item:last").fadeIn("slow").addClass("shown");
                    }
                    else if(last_shown == $(".d.navigationbanners .tx-randombanners-item:last").index(".tx-randombanners-item") && first_shown == $(".d.navigationbanners .tx-randombanners-item:last").index(".tx-randombanners-item")-1){
                        $(".d.navigationbanners .tx-randombanners-item:first, .d.navigationbanners .tx-randombanners-item:eq(1)").fadeIn("slow").addClass("shown");
                    }
                    else{
                        $(".d.navigationbanners .tx-randombanners-item:eq("+(last_shown+1)+"), .d.navigationbanners .tx-randombanners-item:eq("+(last_shown+2)+")").fadeIn("slow").addClass("shown");
                    }
                });
            });
        }
	});
}


$(document).ready(function() {
	if ($('#randombanners').length > 0) {
		if($('#randombannersNumber')) {
			// if: load via ajax should be done
			$.ajax({
				url: 'index.php?type=69&tx_randombanners_list[action]=list&tx_randombanners_list[controller]=Banner&tx_randombanners_list[numberOfBannersShown]=' + parseInt($('#randombannersNumber').html()),
				success: function(html) {
					$('#randombanners').append(html);
					initBanners();
	            }
			});
		} else {
			initBanners();
		}
	}
    
});