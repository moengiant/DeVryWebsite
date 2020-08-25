// More about Devry
$(function moreAbout() {	  
    var time = 500;
    var hideDelay = 100;
    var hideDelayTimer = null;
    var beingShown = false;
    var shown = false;
    var trigger = $('#more-about-call', this);
    var info = $('#more-about', this).css('opacity', 0);
    $([trigger.get(0), info.get(0)]).mouseover(function () {
        if (hideDelayTimer) clearTimeout(hideDelayTimer);
        if (beingShown || shown) {
            // don't trigger the animation again
            return;
        } else {
            // reset position of info box
            beingShown = true;
           	info.css({
                bottom: 40,
                display: 'block'
            }).animate({
                bottom: '+=' + 10 + 'px',
                opacity: 1
            }, time, 'swing', function() {
                beingShown = false;
                shown = true;
            });
		}
		return false;
	}).mouseout(function () {
		if (hideDelayTimer) clearTimeout(hideDelayTimer);
	        hideDelayTimer = setTimeout(function () {
			hideDelayTimer = null;
			info.animate({
				bottom: '-=' + 10 + 'px',
				opacity: 0
			}, time, 'swing', function () {
				shown = false;
				info.css('display', 'none');
			});
		}, hideDelay);
		return false;
	});
});
$(function sitemap() {	  
    var time1 = 500;
    var hideDelay1 = 100;
    var hideDelayTimer1 = null;
    var beingShown1 = false;
    var shown1 = false;
    var trigger1 = $('#sitemap-call', this);
    var info1 = $('#sitemap', this).css('opacity', 0);
    $([trigger1.get(0), info1.get(0)]).mouseover(function () {
        if (hideDelayTimer1) clearTimeout(hideDelayTimer1);
        if (beingShown1 || shown1) {
            // don't trigger the animation again
            return;
        } else {
            // reset position of info box
            beingShown1 = true;
           	info1.css({
                bottom: 40,
                display: 'block'
            }).animate({
                bottom: '+=' + 10 + 'px',
                opacity: 1
            }, time1, 'swing', function() {
                beingShown1 = false;
                shown1 = true;
            });
		}
		return false;
	}).mouseout(function () {
		if (hideDelayTimer1) clearTimeout(hideDelayTimer1);
	        hideDelayTimer1 = setTimeout(function () {
			hideDelayTimer1 = null;
			info1.animate({
				bottom: '-=' + 10 + 'px',
				opacity: 0
			}, time1, 'swing', function () {
				shown1 = false;
				info1.css('display', 'none');
			});
		}, hideDelay1);
		return false;
	});
});

$(document).ready(function (){
	$("p:contains('\»')").each(function(){
		text = "";
		var html = "";
		$(this).find("br").replaceWith("~-");
		var html =	$(this).html().split("~-");
		$(this).empty();
		for(var pl = 0; pl < html.length; pl++){
			if(html[pl].toLowerCase().indexOf("span")==-1){
				var s = html[pl].replace("»","");
				$(this).append("<div class='t_i_12'>"+s+"</div>")
			}else{
				$(this).append(html[pl]);
			}
		}	
	});
	$("p:contains('&raquo;')").each(function(){
		text = "";
		var html = "";
		$(this).find("br").replaceWith("~-");
		var html =	$(this).html().split("~-");
		$(this).empty();
		for(var pl = 0; pl < html.length; pl++){
			if(html[pl].toLowerCase().indexOf("span")==-1){
				var s = html[pl].replace("»","");
				$(this).append("<div class='t_i_12'>"+s+"</div>")
			}else{
				$(this).append(html[pl]);
			}
		}	
	});
});

