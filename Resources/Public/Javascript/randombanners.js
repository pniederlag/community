
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
                $(".d.navigationbanners .tx-randombanners-item").each(function(){
                    if($(this).index() > 1)
                        $(this).css("display","none");
                });
                $(".d.navigationbanners .tx-randombanners-item:eq(0), .d.navigationbanners .tx-randombanners-item:eq(1)").addClass("shown");

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
                $(".gc .tx-randombanners:eq(0) .tx-randombanners-item:eq(0), .gc .tx-randombanners:eq(1) .tx-randombanners-item:eq(1), .gc .tx-randombanners:eq(2) .tx-randombanners-item:eq(2), .gc .tx-randombanners:eq(3) .tx-randombanners-item:eq(3)").addClass("shown").fadeIn("slow");
			}
		});
	}
    $(document).everyTime(5000,function(){
        var first_shown = $(".d.navigationbanners #randombanners .shown:first").index(".tx-randombanners-item");
        var last_shown = $(".d.navigationbanners #randombanners .shown:last").index(".tx-randombanners-item");
        $(".d.navigationbanners #randombanners .shown").each(function(){
            $(this).removeClass("shown").fadeOut("slow",function(){
                if(last_shown == $(".d.navigationbanners .tx-randombanners-item:last").index(".tx-randombanners-item") && first_shown == 0){
                    $(".d.navigationbanners .tx-randombanners-item:eq(1), .d.navigationbanners .tx-randombanners-item:eq(2)").fadeIn("5000").addClass("shown");
                }
                else if(last_shown == $(".d.navigationbanners .tx-randombanners-item:last").index(".tx-randombanners-item")-1){
                    $(".d.navigationbanners .tx-randombanners-item:eq(0), .d.navigationbanners .tx-randombanners-item:last").fadeIn("5000").addClass("shown");
                }
                else if(last_shown == $(".d.navigationbanners .tx-randombanners-item:last").index(".tx-randombanners-item") && first_shown == $(".d.navigationbanners .tx-randombanners-item:last").index(".tx-randombanners-item")-1){
                    $(".d.navigationbanners .tx-randombanners-item:first, .d.navigationbanners .tx-randombanners-item:eq(1)").fadeIn("slow").addClass("shown");
                }
                else{
                    $(".d.navigationbanners .tx-randombanners-item:eq("+(last_shown+1)+"), .d.navigationbanners .tx-randombanners-item:eq("+(last_shown+2)+")").fadeIn("slow").addClass("shown");
                }
            });
        });
        $(".gc .tx-randombanners-item.shown").each(function(){
            var shown_index = $(this).index();
            var last_shown2 = $(this).index(".banner"+(shown_index));
            $(this).removeClass("shown").fadeOut("slow",function(){
                if(last_shown2 == $(".banner"+(shown_index)).length-1)
                    $(".banner"+(shown_index)+":first").fadeIn("slow").addClass("shown");
                else
                    $(".banner"+(shown_index)+":eq("+((last_shown2)+(1))+")").fadeIn("slow").addClass("shown");
            });
        });

    });
});